<?php


namespace App\Controllers;
 
use App\Models\Categorymodel;
use App\Models\Productmodel;
use App\Models\Subcategorymodel;
use App\Models\Bannersmodel;
use App\Models\Settings;
use App\Models\BlogModel;
use App\Models\CountryModel;
use App\Models\StateModel;
use App\Models\CityModel;
use App\Models\UserModel;
use App\Models\CmsModel;
use App\Models\Variationmodel;
use App\Models\Wishlistmodel;
use App\Models\User_shipping_addressmodel;
use App\Models\variationtypemodel;
use App\Models\Variationvaluemodel;
use App\Models\BlogcommentModel;
use App\Models\VariationsDetails;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use App\Models\Ordermodel;
use App\Models\Allsettingsmodel;
use App\Models\CartModel;

// require 'PHPMailer/src/Exception.php'; 
// require 'PHPMailer/src/PHPMailer.php'; 
// require 'PHPMailer/src/SMTP.php'; 



class Home extends BaseController
{
    protected $Categorymodel;
    protected $Subcategorymodel;
    protected $Bannersmodel;
    protected $Settings;
    protected $Productmodel;
    protected $BlogModel;
    protected $CountryModel;
    protected $StateModel;
    protected $CityModel;
    protected $UserModel;
    protected $CmsModel;
    protected $Variationmodel;
    protected $Wishlistmodel;
    protected $User_shipping_addressmodel;
    protected $variationtype;
    protected $BlogcommentModel;
    protected $Variationvaluemodel;
    protected $Ordermodel;
    protected $Allsettingsmodel;

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->Categorymodel = new Categorymodel($db);
        $this->Productmodel = new Productmodel($db);
        $this->Subcategorymodel = new Subcategorymodel($db);
        $this->Bannersmodel = new Bannersmodel($db);
        $this->Settings = new Settings($db);
        $this->BlogModel = new BlogModel($db);
        $this->CountryModel = new CountryModel($db);
        $this->StateModel = new StateModel($db);
        $this->CityModel = new CityModel($db);
        $this->UserModel = new UserModel($db);
        $this->CmsModel = new CmsModel($db);
        $this->Variationmodel = new Variationmodel($db);
        $this->Wishlistmodel = new Wishlistmodel($db);
        $this->variationtype = new variationtypemodel($db);
        $this->BlogcommentModel = new BlogcommentModel($db);
        $this->User_shipping_addressmodel = new User_shipping_addressmodel($db);
        $this->Variationvaluemodel = new Variationvaluemodel($db);
        $this->Ordermodel = new Ordermodel($db);
        $this->Allsettingsmodel = new Allsettingsmodel($db);
    }

    // public function returnRefund(){
    //     return view('return-refund-policy');
    // }

    public function returnRefund()
{
    $data['catdata'] = $this->Categorymodel->findAll();
    $data['subdata'] = [];

    foreach ($data['catdata'] as $cat) {
        $subcategories = $this->Subcategorymodel
            ->where('category_id', $cat['CategoryID'])
            ->findAll();

        $data['subdata'][$cat['CategoryID']] = $subcategories;
    }

    return view('return-refund-policy', $data);
}




    public function design($productId,$userid=null){
        $id= $productId;
        $data['user_id']=$userid;
        $VariationsDetails = new VariationsDetails();
        
        $data['all_product_data'] = $this->Productmodel->join('variations','variations.ProductID = products.ProductID')->where('products.ProductID',$id)->first();
        
        $data['prod'] = $this->Categorymodel->where('CategoryID', $data['all_product_data']['CategoryID'])->get()->getRow();
        $data['varia_dt']=$this->Variationmodel->where('ProductID',$data['all_product_data']['ProductID'])->get()->getResult('array');
        $data['all_variation_data'] = $this->Variationmodel->where('ProductID',$id)->findAll();
        
        $data['variation_data'] = $this->Variationmodel->select('v.*,v.VariationID as vid,vd.*,vv.*')->from('variations v')->join('VariationsDetails vd','v.VariationID=vd.VariationID','left')->join('variation_value vv','vv.VariationID=vd.VariationVlueID','left')->where('v.ProductID',$id)->groupBy('v.VariationID')->findAll();
        foreach($data['variation_data'] as $key=>$val){
            $tmp_data = $VariationsDetails->where('VariationID',$val['vid'])->findAll();
            $data['variation_data'][$key]['VariationVlueID']= array_column($tmp_data,'VariationVlueID');
        }
        $data['varrtype'] = $this->variationtype->get()->getResult('array');
        $variation_value_ids = array_column($data['variation_data'],'VariationVlueID');
        $mergedData = array_reduce($variation_value_ids, 'array_merge', []);
        $mergedData = array_unique($mergedData);
       $data['variationsval']=[];
        foreach($data['varrtype'] as $vares)
        {
            
            $data['variationsval'][$vares['VariationTypeID']] = $this->Variationvaluemodel->where('VariationTypeID',$vares['VariationTypeID'])->whereIn('VariationID',$mergedData)->findAll();
            // $data['variationsval'][$vares['VariationTypeID']] = $this->Variationvaluemodel->where('VariationTypeID',$vares['VariationTypeID'])->findAll();
            $data['getvariation'] = $this->Variationmodel->where('VariationTypeID',$vares['VariationTypeID'])->where('ProductID',$data['all_product_data']['ProductID'])->get()->getResult('array');
        }
        
        $data['variations_data'] = array();
        // print_r($data['variations_data']);
            $varIds = array();
            $defaultvariation = array();
            if(!empty($data['all_variation_data'])){
                foreach($data['all_variation_data'] as $variation){
                    if($variation['defaultProduct']==1){
                        $varId =  $variation['VariationID'];
                        $variation['variation'] = $VariationsDetails
                        ->join('variation_value','variation_value.VariationID=VariationsDetails.VariationVlueID')
                        ->where('VariationsDetails.VariationID', $varId)
                        //->groupBy('VariationsDetails.VariationVlueID')
                        ->findAll();
                        $defaultvariation =  $variation;
                    }
                    $varIds[] =  $variation['VariationID'];
                }
            }
            $data['varIds'] = $varIds;
            // print_r($data['varIds']);
           
            $data['defaultvariation'] = $defaultvariation;
            
            if(!empty($varIds)){
                $data['VariationVlues'] = $VariationsDetails
                    ->join('variation_value','variation_value.VariationID=VariationsDetails.VariationVlueID')
                    ->whereIN('VariationsDetails.VariationID', $varIds)
                    ->groupBy('VariationsDetails.VariationVlueID')
                    ->findAll();
                $data['VariationTypes'] = $VariationsDetails
                    ->select('variation_type.VariationTypeID,variation_type.VariationTypeName')
                    ->join('variation_value','variation_value.VariationID=VariationsDetails.VariationVlueID')
                    ->join('variation_type','variation_type.VariationTypeID=variation_value.VariationTypeID')
                    ->whereIN('VariationsDetails.VariationID', $varIds)
                    ->groupBy('variation_value.VariationTypeID')
                    ->findAll();
                    // print_r($data['VariationTypes']);
            //   echo $VariationsDetails->getLastQuery();
                
            }
            $CountryModel = new CountryModel();
            $data['countries'] = $CountryModel->findAll();
            $StateModel = new StateModel();
            $data['states'] = $StateModel->findAll();
            $data['catdata'] = $this->Categorymodel->findAll();
             $data['subdata']=[];
            foreach($data['catdata'] as $cat)
            {
                //$data['subdata']=$this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
                $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
                $data['subdata'][$cat['CategoryID']] = $subcategories;
            }
            
            // ====================================
            $CartModel = new CartModel();
            $data['is_in_cart'] = false;
            if ($userid) {
                $data['is_in_cart'] = $CartModel
                    ->where('user_id', $userid)
                    ->where('product_id', $id)
                    ->countAllResults() > 0;
            }
            // $data['is_in_cart_disabled'] = $data['is_in_cart'] ? 'disabled' : '';
            $data['is_in_cart_disabled'] = $data['is_in_cart'] ? 'disabled' : '';
            $data['is_in_cart_class'] = $data['is_in_cart'] ? 'btn-disabled' : '';
            // ====================
            
            // $data['all_review_data'] = $this->Reviewmodel->where('ProductID',$id)->findAll();
        return view('design',$data);
    }

    // public function index()
    // {
    //     $session = session();
    //     $user_id = $session->get('user_id');
    //     // echo $user_id;
        
    //     // $data['all_product_data'] = $this->Productmodel->join('variations','variations.ProductID = products.ProductID')->where('products.ProductID',$id)->first();
    //     $data['category'] = $this->Categorymodel
    //          ->join('products','products.CategoryID = categories.CategoryID')
    //          ->groupBy('products.CategoryID')
    //         ->where('ParentCategoryID', '0')
    //         ->findAll();
    //     //$catprod=[];
    //     $data['prod'] = [];
      
    //     foreach($data['category'] as $key=>$cat)    
    //     {
    //         $products = $this->Productmodel->where('CategoryID', $cat['CategoryID'])->get()->getResult('array');
    //         $data['prod'][$cat['CategoryID']] = $products;
    //         foreach($products as $varia)
    //         {
    //             $data['varia_dt'] = $this->Variationmodel->where('ProductID',$varia['ProductID'])->get()->getResult('array');
    //         }
    //     }
    //    // print_r($data['varia_dt']);
    //     $data['banner'] = $this->Bannersmodel->findAll();
    //     $data['product'] = $this->Productmodel->findAll();
    //     $data['allproduct'] = $this->Productmodel->findAll();
       
    //     // print_r($data['allproduct']);
        
    //     foreach($data['allproduct'] as $allprd)
    //     {
    //         $data['customers']=$this->Wishlistmodel->where('UserID', $user_id)->where('ProductID',$allprd['ProductID'])->first();
    //     }
    //       $data['all_cms_data'] = $this->CmsModel->findAll();
    //     // print_r($data['all_cms_data']);
    //     // die;
    //     $data['blog'] = $this->BlogModel
    //     ->join('categories','categories.CategoryID = blog.category')
    //     ->orderBy('blog.id', 'desc')->findAll(3);
    //     // print_r($data['blog']);
        
        
    //     $data['catdata'] = $this->Productmodel
    //          ->join('categories','categories.CategoryID = products.CategoryID')
    //           ->join('subcategory','subcategory.sub_category_id = products.SubCategoryID')
    //          ->groupBy('products.CategoryID')
    //         ->where('ParentCategoryID', '0')
    //         ->findAll();
            
    //     // $data['catdata'] = $this->Categorymodel->findAll();
    // //   echo "<pre>"; print_r($data['catdata']); die;
    //     $data['subdata']=[];
    //     foreach($data['catdata'] as $cat)
    //     {
    //         $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
    //         $data['subdata'][$cat['CategoryID']] = $subcategories;
    //        // $data['subdata']=$this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
    //     }
    //     // echo "<pre>"; print_r($data['subdata']);die;
    //      $data['user_id'] = $user_id;
        
    //     return view('index', $data);
    // }

    public function index()
{
    $session = session();
    $user_id = $session->get('user_id');
    
    $data['category'] = $this->Categorymodel
        ->join('products','products.CategoryID = categories.CategoryID')
        ->groupBy('products.CategoryID')
        ->where('ParentCategoryID', '0')
        ->findAll();

    $data['prod'] = [];
    foreach ($data['category'] as $key => $cat) {
        $products = $this->Productmodel->where('CategoryID', $cat['CategoryID'])->get()->getResult('array');
        $data['prod'][$cat['CategoryID']] = $products;
        foreach ($products as $varia) {
            $data['varia_dt'] = $this->Variationmodel->where('ProductID', $varia['ProductID'])->get()->getResult('array');
        }
    }

    $data['banner'] = $this->Bannersmodel->findAll();
    $data['product'] = $this->Productmodel->findAll();
    $data['allproduct'] = $this->Productmodel->findAll();

    foreach ($data['allproduct'] as $allprd) {
        $data['customers'] = $this->Wishlistmodel->where('UserID', $user_id)->where('ProductID', $allprd['ProductID'])->first();
    }

    $data['all_cms_data'] = $this->CmsModel->findAll();
    $data['blog'] = $this->BlogModel
        ->join('categories', 'categories.CategoryID = blog.category')
        ->orderBy('blog.id', 'desc')
        ->findAll(3);

    $data['catdata'] = $this->Productmodel
        ->join('categories', 'categories.CategoryID = products.CategoryID')
        ->join('subcategory', 'subcategory.sub_category_id = products.SubCategoryID')
        ->groupBy('products.CategoryID')
        ->where('ParentCategoryID', '0')
        ->findAll();

    $data['subdata'] = [];
    foreach ($data['catdata'] as $cat) {
        $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
        $data['subdata'][$cat['CategoryID']] = $subcategories;
    }

    // Add this for recently added products in descending order
    $data['recent_products'] = $this->Productmodel
        ->orderBy('created_at', 'DESC') // Change 'created_at' to the relevant column
        ->findAll(10);

    $data['user_id'] = $user_id;

    return view('index', $data);
}


    public function login()
    {
        $data['catdata'] = $this->Categorymodel->findAll();
        $data['subdata']=[];
        foreach($data['catdata'] as $cat)
        {
            //$data['subdata']=$this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $data['subdata'][$cat['CategoryID']] = $subcategories;
        }
        return view('login',$data);
    }
    
    public function customer_login()
    {
        $session = session();
         
        $email = $this->request->getPost('email');
        $password = md5($this->request->getPost('password'));
        
        $logdata = $this->UserModel->where('UserEmail',$email)->where('UserPassword',$password)->where('UserType',2)->first();
        
        if(!empty($logdata)){
           
                $ses_data = [
                    'user_id'       => $logdata['UserID'],
                    'email'     => $logdata['UserEmail'],
                    'type'        => $logdata['UserType'],
                    'logged_in'     => TRUE
                ];
                
                $session->set($ses_data);
                echo "1";
        
        }else{
          
            echo "2";
        }
        
    }
    
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(site_url('/login'));
    }
    public function register()
    {
        $data['catdata'] = $this->Categorymodel->findAll();
        $data['subdata']=[];
        foreach($data['catdata'] as $cat)
        {
            //$data['subdata']=$this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $data['subdata'][$cat['CategoryID']] = $subcategories;
        }
        $data['country'] = $this->CountryModel->findAll();
        return view('register',$data);
    }
    public function my_account()
    {
         $session = session();
        //   print_r($session);
         $id = $session->get('user_id');
        //  print_r($id);
        $data['profile_data'] = $this->UserModel->where('UserID', $id)->first();
        // print_r($data['profile_data']);
        

   
         $data['country'] = $this->CountryModel->findAll();
         $country_id = $data['profile_data']['UserState'];
         
  
          $data['state'] = $this->StateModel->where('CountryID', $country_id)->findAll();
        //   print_r($data['state']);
         
          $state_id = $data['profile_data']['UserCity'];
         
            $data['city'] = $this->CityModel->where('StateID', $state_id)->findAll();
            // print_r($data['city']);
            
        $data['catdata'] = $this->Categorymodel->findAll();
        $data['subdata']=[];
        foreach($data['catdata'] as $cat)
        {
            //$data['subdata']=$this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $data['subdata'][$cat['CategoryID']] = $subcategories;
        }
        return view('my_account' ,$data);
    }
    
    
     public function my_profile()
      {
          $session = session();
        //   print_r($session);
         $id = $session->get('user_id');
        //  print_r($id);
        $data['profile_data'] = $this->UserModel->where('UserID', $id)->first();
        // print_r($data['profile_data']);
        

   
         $data['country'] = $this->CountryModel->findAll();
         $country_id = $data['profile_data']['UserState'];
         
  
          $data['state'] = $this->StateModel->where('CountryID', $country_id)->findAll();
        //   print_r($data['state']);
         
          $state_id = $data['profile_data']['UserCity'];
         
            $data['city'] = $this->CityModel->where('StateID', $state_id)->findAll();
            
         
        return view('my_profile' ,$data);
    }

    public function mail()
    {
        return view('mail/mail');
    }
    
    public function getcountrystate()
    {
        $country = $this->request->getPost('country');
        $rescountry = $this->StateModel->where('CountryID',$country)->findAll();
         ?>
        <option value="">Choose state</option>
        <?php
        foreach($rescountry as $res)
        {
            ?>
            <option value="<?php echo $res['StateID'];?>"><?php echo $res['StateName']; ?></option>
            <?php
        }
        ?>
        <?php
       
    }
    
    public function getstatecity()
    {
        $state = $this->request->getPost('state');
        $resstate = $this->CityModel->where('StateID',$state)->findAll();
        ?>
        <option value="">Choose city</option>
        <?php
        foreach($resstate as $city)
        {
            ?>
            <option value="<?php echo $city['CityID'];?>"><?php echo $city['CityName']; ?></option>
            <?php
        }
        ?>
        <?php
    }
    
    public function save_register()
    {
      
    //   print_r($_POST);
        $firstname = $this->request->getPost('firstName');
        $lastname = $this->request->getPost('lastName');
        $password = md5($this->request->getPost('password'));
        $email = $this->request->getPost('emailAddress');
        $phoneNumber = $this->request->getPost('phoneNumber');
        $dob = $this->request->getPost('dob');
        $address1 = $this->request->getPost('address1');
        $address2 = $this->request->getPost('address2');
        $country = $this->request->getPost('country');
        $state = $this->request->getPost('state');
        $city = $this->request->getPost('city');
        $postcode = $this->request->getPost('postcode');
        
        $file_image = $this->request->getFile('profile_pic');
        $imgname=$file_image->getName();
        
        if(!empty($imgname))
        {
            $fileName = $file_image->getRandomName();
            $file_image->move('admin/public/upload_images', $fileName);
        }
        else
        {
            $fileName="default.jpg";
        }
        $email_check=$this->UserModel->where('UserEmail',$email)->get()->getResultArray();
        if(count($email_check)>0)
        {
            echo 0;
        }
        else 
        {
        $all_data=[
            'UserType'=>'2',
            'UserEmail'=>$email,
            'UserPassword'=>$password,
            'UserFirstName'=>$firstname,
            'UserLastName'=>$lastname,
            'DOB'=>$dob,
            'UserGander'=>"male",
            'UserProfile'=>$fileName,
            'UserCity'=>$city,
            'UserState'=>$state,
            'UserZip'=>$postcode,
            'UserPhone'=>$phoneNumber,
            'UserCountry'=>$country,
            'UserAddress'=>$address1,
            'UserAddress2'=>$address2
            ];
            
            // print_r($all_data);
            
            $res = $this->UserModel->insert($all_data); 
            $last_id = $this->UserModel->getInsertId(); 
            
            $all_user_data=[
            'user_id'=> $last_id,
            // 'UserEmail'=>$email,
            // 'UserPassword'=>$password,
            'first_name'=>$firstname,
            'last_name'=>$lastname,
            // 'DOB'=>$dob,
            // 'UserGander'=>"male",
            // 'UserProfile'=>$fileName,
            'city'=>$city,
            'state'=>$state,
            'zipcode'=>$postcode,
            'number'=>$phoneNumber,
            'country'=>$country,
            'address'=>$address1,
            // 'UserAddress2'=>$address2
            ];
            $res_data = $this->User_shipping_addressmodel->insert($all_user_data); 
            
            if($all_data && $all_user_data) { echo 1; } else { echo 0;}
            // echo $this->UserModel->getLastQuery();
            
        }
        
    }
    
    public function change_password()
    {
        $data['catdata'] = $this->Categorymodel->findAll();
        $data['subdata']=[];
        foreach($data['catdata'] as $cat)
        {
            //$data['subdata']=$this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $data['subdata'][$cat['CategoryID']] = $subcategories;
        }
        return view('change password',$data);
    }
    
    
    public function changed_password(){
        $session = session();

        $id = $session->get('user_id');
        // print_r($id);
        
        $current_password = md5($this->request->getPost('current_password')); 
        $new_password = $this->request->getPost('new_password'); 
        $confirm_password = $this->request->getPost('confirm_password'); 

        $data = $this->UserModel->where('UserPassword',$current_password)->where('UserID', $id)->first();
        
        if(!empty($data)){
            if($new_password==$confirm_password){
                $data = array(
                    'UserPassword' => md5($new_password)
                );
                $this->UserModel->set($data);
                $this->UserModel->where('UserID', $id);
                $update_password = $this->UserModel->update();
                if($update_password){
                    echo "1";
                }
                else{
                    echo "0";
                }
            }
            else{
               echo "2"; 
            }
        }
        else{
            echo "3"; 
        }

    }
    
    
    // public function update_account_form_data()
    // {
      
    // //   print_r($_POST);
    //     $user_id = $this->request->getPost('id');
    //     $firstname = $this->request->getPost('firstname');
    //     $lastname = $this->request->getPost('lastname');
    //     $email = $this->request->getPost('email');
    //     $phone = $this->request->getPost('phone');
    //     $address1 = $this->request->getPost('address1');
    //     $address2 = $this->request->getPost('address2');
    //     $country = $this->request->getPost('country');
    //     $state = $this->request->getPost('state');
    //     $city = $this->request->getPost('city');
    //     $zip = $this->request->getPost('zip');
        
    //   $add1 = "";
    //   if(!empty($address1)){
    //       $add1 = $address1;
    //   }
    //   else{
    //       $add1 = NULL;
    //   }
        
    //       $add2 = "";
    //   if(!empty($address2)){
    //       $add2 = $address2;
    //   }
    //   else{
    //       $add2 = NULL;
    //   }
      
       
    //      $email_check=$this->UserModel->where('UserEmail',$email)->get()->getResultArray();
    //     if(count($email_check)>0)
    //     {
    //         echo 0;
    //     }
    //     // else 
    //     {
    //     $all_data=[
    //         'UserType'=>'2',
    //         'UserEmail'=>$email,
    //         'UserFirstName'=>$firstname,
    //         'UserLastName'=>$lastname,
    //         'UserCity'=>$city,
    //         'UserState'=>$state,
    //         'UserZip'=>$zip,
    //         'UserPhone'=>$phone,
    //         'UserCountry'=>$country,
    //         'UserAddress'=>$add1,
    //         'UserAddress2'=>$add2,
           
    //         ];
    //         // print_r($all_data);
            
    //         $res = $this->UserModel->update($user_id, $all_data); 
            
    //      $all_user_data=[
    //         // 'user_id'=> $user_id,
    //         // 'UserEmail'=>$email,
    //         // 'UserPassword'=>$password,
    //         'first_name'=>$firstname,
    //         'last_name'=>$lastname,
    //         // 'DOB'=>$dob,
    //         // 'UserGander'=>"male",
    //         // 'UserProfile'=>$fileName,
    //         'city'=>$city,
    //         'state'=>$state,
    //         'zipcode'=>$postcode,
    //         'number'=>$phoneNumber,
    //         'country'=>$country,
    //         'address'=>$address1,
    //         // 'UserAddress2'=>$address2
    //         ];
    //         $res_data = $this->User_shipping_addressmodel->update($user_id, $all_user_data); 
            
    //         echo 1; 
            
    //     }
        
    // }
//     public function update_account_form_data()
// {
//     $user_id = $this->request->getPost('id');
//     $firstname = $this->request->getPost('firstname');
//     $lastname = $this->request->getPost('lastname');
//     $email = $this->request->getPost('email');
//     $phone = $this->request->getPost('phone');
//     $address1 = $this->request->getPost('address1');
//     $address2 = $this->request->getPost('address2');
//     $country = $this->request->getPost('country');
//     $state = $this->request->getPost('state');
//     $city = $this->request->getPost('city');
//     $zip = $this->request->getPost('zip');

//     $add1 = !empty($address1) ? $address1 : NULL;
//     $add2 = !empty($address2) ? $address2 : NULL;

//     $email_check = $this->UserModel->where('UserEmail', $email)->where('UserID !=', $user_id)->get()->getResultArray();


//     if (count($email_check) > 0) {
//         echo 0;
//     } else {
//         $all_data = [
//             'UserType' => '2',
//             'UserEmail' => $email,
//             'UserFirstName' => $firstname,
//             'UserLastName' => $lastname,
//             'UserCity' => $city,
//             'UserState' => $state,
//             'UserZip' => $zip,
//             'UserPhone' => $phone,
//             'UserCountry' => $country,
//             'UserAddress' => $add1,
//             'UserAddress2' => $add2,
//         ];

//         $res = $this->UserModel->update($user_id, $all_data);

//         // $all_user_data = [
//         //     'first_name' => $firstname,
//         //     'last_name' => $lastname,
//         //     'city' => $city,
//         //     'state' => $state,
//         //     'zipcode' => $zip, // Use the correct property name
//         //     'number' => $phone, // Use the correct property name
//         //     'country' => $country,
//         //     'address' => $add1,
//         // ];

//         // $res_data = $this->User_shipping_addressmodel->update($user_id, $all_user_data);

//         // if ($res && $res_data) {
//             echo 1;
//         // } else {
//         //     echo 0;
//         // }
//     }
// }
public function update_account_form_data()
{
    
    // die;
    
    $user_id = $this->request->getPost('id');
    $firstname = $this->request->getPost('firstname');
    $lastname = $this->request->getPost('lastname');
    $email = $this->request->getPost('email');
    $phone = $this->request->getPost('phone');
    $address1 = $this->request->getPost('address1');
    $address2 = $this->request->getPost('address2');
    $country = $this->request->getPost('country');
    $state = $this->request->getPost('state');
    $city = $this->request->getPost('city');
    $zip = $this->request->getPost('zip');

    $add1 = !empty($address1) ? $address1 : NULL;
    $add2 = !empty($address2) ? $address2 : NULL;
    
     $country_name = $this->CountryModel->where('CountryID',$country)->first();
        $state_name = $this->StateModel->where('StateID',$state)->first();
        $city_name = $this->CityModel->where('CityID',$city)->first();

    $email_check = $this->UserModel->where('UserEmail', $email)->where('UserID !=', $user_id)->get()->getResultArray();

    if (count($email_check) > 0) {
        echo 0;
    } else {
        $all_data = [
            'UserType' => '2',
            'UserEmail' => $email,
            'UserFirstName' => $firstname,
            'UserLastName' => $lastname,
            'UserCity' => $city,
            'UserState' => $state,
            'UserZip' => $zip,
            'UserPhone' => $phone,
            'UserCountry' => $country,
            'UserAddress' => $add1,
            'UserAddress2' => $add2,
        ];

        $res = $this->UserModel->update($user_id, $all_data);

        // Update data in another table
        $all_user_data = [
            // 'user_id' => $user_id,
            'first_name' => $firstname,
            'last_name' => $lastname,
           'city'=>$city_name['CityName'],
            'state'=>$state_name['StateName'],
            'country'=> $country_name['CountryName'],
            'zipcode' => $zip,
            'number' => $phone,
            'address' => $add1,
        ];

        $this->User_shipping_addressmodel->set($all_user_data)->where('user_id', $user_id)->update();

        if ($res) {
            echo 1;
        } else {
            echo 0;
        }
    }
}

   
    
public function fetchproduct()
    {
    $serchdt = $this->request->getPost('keyword');
    
    // Fetch a maximum of 6 products matching the search term
    $search_prd = $this->Productmodel->like('ProductName', $serchdt)
                                     ->orderBy('ProductName', 'DESC')
                                     ->findAll(5);  // Limit to 6 results

    helper('text');
    if (count($search_prd) > 0)
    {
        ?>
        <ul class="list-group" id="country-list" style="overflow: hidden;">
            <?php
            foreach ($search_prd as $prd)
            {
                $jsondt = json_decode($prd['ProductImage']);
                ?>
                <li class="list-group-item py-0 px-2" onClick="selectCountry('<?php echo $prd['ProductName']; ?>');" 
                    style="height:auto;border-bottom: #bbb9b9 1px solid !important">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="<?php echo base_url('admin/public/assets/img/product_images/' . $jsondt[0]); ?>" 
                                 style="height:35px;max-width: 75%;">
                        </div>
                        <div class="col-md-10">
                            <div class="row col-md-12 px-0" style="justify-content: space-between;">
                                <p style="display:block;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;margin-left: -20px;font-size:14px;">
                                    <?php echo $prd['ProductName']; ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </li>
                <?php
            }
            ?>
        </ul>
        <?php
    }
}
    
    /*public function fetchproduct()
    {
        $serchdt = $this->request->getVar('term');
        $search_prd = $this->Productmodel->like('ProductName',$serchdt)->orderBy('ProductName','DESC')->findAll();
        $proddata=[];
        helper('text');
        if(count($search_prd) > 0)
        {
            foreach($search_prd as $prd)
            {
                 $temp_array = array();
                 $temp_array['value'] = $prd['ProductName'];
                $temp_array['label'] = $prd["ProductName"];
                $proddata[] = $temp_array;
            }
        }
        else 
        {
            $proddata['value'] = '';
            $proddata['label'] = 'No Record Found';
        }
        echo json_encode($proddata);
    }*/
    
    
public function about_us()
    {
        // print_r($id);
    $data['catdata'] = $this->Categorymodel->findAll();
        $data['subdata']=[];
        foreach($data['catdata'] as $cat)
        {
            $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $data['subdata'][$cat['CategoryID']] = $subcategories;
           // $data['subdata']=$this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
        }
   $data['all_cms_data'] = $this->CmsModel->where('CmsID',52)->first();
//   print_r($data['all_cms_data']);
        return view('about_us', $data);
    }
    
    
public function all_faqs()
    {
        // print_r($id);
        // die;
    $data['catdata'] = $this->Categorymodel->findAll();
        $data['subdata']=[];
        foreach($data['catdata'] as $cat)
        {
            $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $data['subdata'][$cat['CategoryID']] = $subcategories;
           // $data['subdata']=$this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
        }
   $data['all_cms_data'] = $this->CmsModel->select('cms.*, cms_faq.*')
            ->join('cms_faq', 'cms_faq.CmsID = cms.CmsID')->where('cms_faq.CmsID',65)->first();
//   print_r($data['all_cms_data']);
        return view('all_faqs', $data);
    }
    
     public function all_terms_conditions()
    {
        // print_r($id);
        // die;
         $data['catdata'] = $this->Categorymodel->findAll();
        $data['subdata']=[];
        foreach($data['catdata'] as $cat)
        {
            $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $data['subdata'][$cat['CategoryID']] = $subcategories;
           // $data['subdata']=$this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
        }
   $data['all_cms_data'] = $this->CmsModel->where('CmsID',69)->first();
//   $data['all_cms_data'] = $this->CmsModel->select('cmscms_faq.*')
//             ->join('cms_faq', 'cms_faq.CmsID = cms.CmsID')->where('cms_faq.CmsID',$id)->first();
//   print_r($data['all_cms_data']);
        return view('all_terms_conditions', $data);
    }
    
    public function privacy_policy()
    {
         $data['catdata'] = $this->Categorymodel->findAll();
        $data['subdata']=[];
        foreach($data['catdata'] as $cat)
        {
            $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $data['subdata'][$cat['CategoryID']] = $subcategories;
        }
        $data['all_cms_data'] = $this->CmsModel->where('CmsID',80)->first();
        return view('privacy_policy', $data);
    }
    
     public function return_refund_policy()
    {
         $data['catdata'] = $this->Categorymodel->findAll();
        $data['subdata']=[];
        foreach($data['catdata'] as $cat)
        {
            $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $data['subdata'][$cat['CategoryID']] = $subcategories;
        }
        $data['all_cms_data'] = $this->CmsModel->where('CmsID',81)->first();
        return view('return-refund-policy', $data);
    }
    
     public function forget_password()
    {
         $data['catdata'] = $this->Categorymodel->findAll();
        $data['subdata']=[];
        foreach($data['catdata'] as $cat)
        {
            $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $data['subdata'][$cat['CategoryID']] = $subcategories;
        }
        return view('forget_password', $data);
    }
    
    public function send_forget_password_email(){
   
        $forgot_mail = $_POST['forgotEmail'];

       
        $data = $this->UserModel->where('UserEmail', $forgot_mail)->where('UserType',2)->first();
        
        
        
        $email_count = $this->UserModel->where('UserEmail', $forgot_mail)->where('UserType',2)->countAllResults();

        


        if($email_count>0){
          
            
            $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
 
   
            $key = substr(str_shuffle($str_result),0, 16);
                       
              $id = $data['UserID'];
              $name = $data['UserFirstName'];
            //  $upd_forgot_pass_key = $this->user_model->set('forgot_pass_key', $key)->where('email',$forgot_mail)->update();
           
             $link = base_url();
            //  echo $link;

             
            // $link = "localhost/wedding/admin/";
            $subject = 'Forgot Password'; 
            $base_url = base_url('reset_password/'.base64_encode($data['UserID'])."/".$key);
                    // echo $base_url;
                    // die;
                    
           
            // $email_check='sohelpinjari.fablead@gmail.com';
            
            
            // require 'PHPMailer/src/Exception.php'; 
            // require 'PHPMailer/src/PHPMailer.php'; 
            // require 'PHPMailer/src/SMTP.php'; 
            
           
            
            // $mail = new PHPMailer;
            $mail = new PHPMailer(true);
            // $mail->isMail();
            
             try {
         
         
            $mail->isSMTP();
            // $mail->SMTPDebug = '2'; // Enable verbose debugging
            $mail->Host = 'fableadtechnolabs.com';
            
            
            
            
            $mail->SMTPAuth = true;
            $mail->Username = 'smtp@fableadtechnolabs.com';
            $mail->Password = '#w8(_4@wdc0M';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port     = 465; //Enable verbose debug output
                                        
            //Recipients
            $mail->setFrom('smtp@fableadtechnolabs.com', 'fableadtechnolabs-com');
            $mail->addAddress($forgot_mail);     //Add a recipient
     
            //Content
            $mail->isHTML(true); //Set email format to HTML
          
           $message = '
            <!doctype html>
            <html lang="en-US">
            
            <head>
                <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
                
                <meta name="description" content="Reset Password Email Template.">
                <style type="text/css">
                    a:hover {text-decoration: underline !important;}
                </style>
            </head>
            
            <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
                
                <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8"
                    style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: "Open Sans", sans-serif;">
                    <tr>
                        <td>
                            <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0"
                                align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="height:80px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;">
                                      
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:20px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0"
                                            style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                            <tr>
                                                <td style="height:40px;">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:0 35px;">
                                                    <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:"Rubik",sans-serif;">Hi '.$name.'!</h1>
                                                    <span
                                                        style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                                    <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                                      Reset your password.
                                                    </p>
                                                    <a href="'.$base_url.'"
                                                        style="background:#20e277;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Reset
                                                        Password
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="height:40px;">&nbsp;</td>
                                            </tr>
                                        </table>
                                    </td>
                                <tr>
                                    <td style="height:20px;">&nbsp;</td>
                                </tr>
                                
                                <tr>
                                    <td style="height:80px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <!--/100% body table-->
            </body>
            
            </html>';
            $mail->Subject = 'Forgot Password';
            $mail->Body    =  $message;
 
        
                
                if($mail->send()) {
                   
                    $data = [
                        'forgot_pass_key' => $key
                    ];
                    
                    $db = \Config\Database::connect();
                   $db->table('users')
                        ->where('UserID', $id)
                        ->update($data);
            
                   
                    echo "1";
                }
                
            } catch (Exception $e) {
                   echo "2 - " . $e->getMessage();
                // echo "2";
            }
            
        }else{
            echo "3";
        }
        
    }
    
      public function reset_password($id,$reset_password_key){
        $data['UserID']=base64_decode($id);
        $data['reset_password_key']=$reset_password_key;
       
        $check_reset_password_key = $this->UserModel->where('forgot_pass_key',$reset_password_key)->first();
        if(!empty($check_reset_password_key) && !empty($check_reset_password_key['forgot_pass_key'])){
            $data['forget_password_key'] = $check_reset_password_key['forgot_pass_key'];
        }
        else{
            $data['forget_password_key'] = NULL;
        }
        
        return view('reset_password',$data);
    }
      public function change_reset_password()
    {
        $new_password = $this->request->getPost('new_password');
        $confirm_password = $this->request->getPost('confirm_password');
        $id = $this->request->getPost('userid');
        $reset_password_key = $this->request->getPost('reset_password_key');
        
        if($confirm_password==$new_password){
            $data = array(
                "UserPassword" => md5($new_password),
                "forgot_pass_key" => NULL
            );
            
            $update_password = $this->UserModel->set($data)->where('UserID',$id)->where('forgot_pass_key',$reset_password_key)->update();
            
            if ($update_password) 
            {
                echo "1";
            }
            else 
            {
                echo "2";
            }
        }
        else{
            // $response = array('status'=>'fail','message'=>'Confirm password does not matched with new password');
            echo "3";
        }
        
      
    }
    // public function send_email_data(){
   
    //     $email = $_POST['email'];

       
    //     $data = $this->UserModel->where('UserEmail', $email)->where('UserType',2)->first();
        
        
        
    //     $email_count = $this->UserModel->where('UserEmail', $email)->where('UserType',2)->countAllResults();

        


    //     if($email_count>0){
          
            
    //         // $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
 
   
    //         // $key = substr(str_shuffle($str_result),0, 16);
                       
    //           $id = $data['UserID'];
    //           $name = $data['UserFirstName'];
    //         //  $upd_forgot_pass_key = $this->user_model->set('forgot_pass_key', $key)->where('email',$forgot_mail)->update();
           
    //         //  $link = base_url();
    //         //  echo $link;

             
    //         // $link = "localhost/wedding/admin/";
    //         $subject = 'Subcription'; 
    //         // $base_url = base_url('reset_password/'.base64_encode($data['UserID'])."/".$key);
    //                 // echo $base_url;
    //                 // die;
                    
           
    //         // $email_check='sohelpinjari.fablead@gmail.com';
            
            
    //         // require 'PHPMailer/src/Exception.php'; 
    //         // require 'PHPMailer/src/PHPMailer.php'; 
    //         // require 'PHPMailer/src/SMTP.php'; 
            
           
            
    //         // $mail = new PHPMailer;
    //         $mail = new PHPMailer(true);
    //         // $mail->isMail();
            
    //          try {
         
         
    //         $mail->isSMTP();
    //         // $mail->SMTPDebug = '2'; // Enable verbose debugging
    //         $mail->Host = 'fableadtechnolabs.com';
            
            
            
            
    //         $mail->SMTPAuth = true;
    //         $mail->Username = 'smtp@fableadtechnolabs.com';
    //         $mail->Password = '#w8(_4@wdc0M';
    //         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    //         $mail->Port     = 465; //Enable verbose debug output
                                        
    //         //Recipients
    //         $mail->setFrom('smtp@fableadtechnolabs.com', 'fableadtechnolabs-com');
    //         $mail->addAddress($email);     //Add a recipient
     
    //         //Content
    //         $mail->isHTML(true); //Set email format to HTML
    //         $message = ' <!doctype html>
    //             <html lang="en-US">
                
    //             <head>
    //                 <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
                    
    //                 <meta name="description" content="Reset Password Email Template.">
    //                 <style type="text/css">
    //                     a:hover {text-decoration: underline !important;}
    //                 </style>
    //             </head>
                
    //             <body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
    //             <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:"Rubik",sans-serif;">Login Detail!</h1>
    //             <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
    //                                                  <p> Your Name is: '.$name.'</p>
    //                                                  <p> Your Email is: '.$email.'</p>
                                                     
                                                     
    //             </body>
    //             </html>';
          
           
    //         $mail->Subject = 'Subcription';
    //         $mail->Body    =  $message;
 
        
                
    //             if($mail->send()) {
                   
    //             //     $data = [
    //             //         'forgot_pass_key' => $key
    //             //     ];
                    
    //             //     $db = \Config\Database::connect();
    //             //   $db->table('users')
    //             //         ->where('UserID', $id)
    //             //         ->update($data);
            
                   
    //                 echo "1";
    //             }
                
    //         } catch (Exception $e) {
    //               echo "2 - " . $e->getMessage();
    //             // echo "2";
    //         }
            
    //     }else{
    //         echo "3";
    //     }
        
    // }
    public function send_email_data()
    {
        // Validate input
        if (!isset($_POST['email'])) {
            echo "Invalid input";
            return;
        }
    
        $email = $_POST['email'];
        $data = $this->UserModel->where('UserEmail', $email)->where('UserType', 2)->first();
        
        if (!$data) {
            echo "User not found";
            return;
        }
    
        $email_count = $this->UserModel->where('UserEmail', $email)->where('UserType', 2)->countAllResults();
    
        if ($email_count > 0) {
            $id = $data['UserID'];
            $firstName = $data['UserFirstName'];
            $lastName = $data['UserLastName'];
             $phone = $data['UserPhone'];
    
            // Compose the email content
            $subject = 'Subscription';
            $message = '<!DOCTYPE html>
    <html lang="en-US">
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
        <meta name="description" content="Reset Password Email Template.">
        <style type="text/css">a:hover {text-decoration: underline !important;}</style>
    </head>
    <body marginheight="0" topmargin="0" marginwidth="0" style="text-align:center;margin: 0px; background-color: #fff;" leftmargin="0">
        <img src="https://pharmaxy.org/phmxy-admin/public/upload_images/jpg/1x/Asset_2012_100.jpg" alt="Product Image" style="max-width: 200px;">
        <h1 style="color:#000; font-weight:500; margin:0;font-size:32px;font-family:"Rubik", sans-serif;">Subscriber Details</h1>
        <span style="display:inline-block; vertical-align:middle; margin:-5px 0 7px; border-bottom:1px solid #cecece; width:100px;"></span>
    
        <!-- Table to align customer details -->
        <table align="center" cellpadding="5" cellspacing="0" style="margin: 20px auto; border-collapse: collapse; font-family:"Rubik", sans-serif;">
            <tr>
                <td style="color: #000; font-weight: 600; text-align: right;">Customer Name:</td>
                <td style="color: #0147e0; font-weight: 500; text-align: left;text-transform:capitalize;">'.$firstName.' '.$lastName.'</td>
            </tr>
            <tr>
                <td style="color: #000; font-weight: 600; text-align: right;">Customer Email:</td>
                <td style="color: #0147e0; font-weight: 500; text-align: left;">'.$email.'</td>
            </tr>
            <tr>
                <td style="color: #000; font-weight: 600; text-align: right;">Customer Phone:</td>
                <td style="color: #0147e0; font-weight: 500; text-align: left;">'.$phone.'</td>
            </tr>
        </table>
    
        <!-- Footer -->
        <div style="text-align: center; margin-top: 20px;">
            <p style="color: #888;">Copyright © ' . date("Y") . ' Ecom - All Rights Reserved.</p>
        </div>
    </body>
    </html>
    ';
                        
                   $Settings = new Allsettingsmodel();
        $settingsData = $Settings->first(); // Get the first setting
        if (!$settingsData) {
            return json_encode(['status' => 'fail', 'message' => 'Settings not found.']);
        }
        
        $emailadmin = $settingsData['Email'];
         
    
            // Use EmailSender library to send email
            $emailSender = new \App\Libraries\EmailSender();
            $isMailSent = $emailSender->sendEmail($emailadmin, $subject, $message);
    
            // Check if the email was sent successfully
            if ($isMailSent) {
                echo "1";  // Email sent successfully
            } else {
                echo "2 - Error sending email";  // Failed to send email
            }
        } else {
            echo "3";  // No users found
        }
    }


    // cancel ord3er---------------------
public function cancel_order() {
    $userID = $this->request->getPost('userId');
    $OrderID = $this->request->getPost('OrderID');

    if (!$userID) {
        return json_encode(['status' => 'fail', 'message' => 'userId is required.']);
    }

    if (!$OrderID) {
        return json_encode(['status' => 'fail', 'message' => 'OrderID is required.']);
    }

    // Fetch user data from User_shipping_addressmodel
    $usersData = $this->User_shipping_addressmodel->where('user_id', $userID)->first();

    // If no shipping data, get data from UserModel
    if (empty($usersData) || empty($usersData['email'])) {
        $usersData = $this->UserModel->where('UserID', $userID)->first();

        if (empty($usersData) || empty($usersData['UserEmail'])) {
            return json_encode(['status' => 'fail', 'message' => 'User data not found.']);
        }
    }

    // Fetch the order details
    $order = $this->Ordermodel->where('UserID', $userID)
                               ->where('OrderID', $OrderID)
                               ->where('OrderStatus', 'pending')
                               ->first();

    if (empty($order)) {
        return json_encode(['status' => 'fail', 'message' => 'Order status is not pending.']);
    }

    // Update the order status to 'Cancelled'
    $updated = $this->Ordermodel->where('OrderID', $OrderID)->set('OrderStatus', 'Cancelled')->update();

    if ($updated) {
        // Respond with success message
        echo json_encode(['status' => 'success', 'message' => 'Order canceled successfully.']);
        flush();

        // Send email to admin
        if (function_exists('fastcgi_finish_request')) {
            fastcgi_finish_request();
        }

        $admin = $this->Allsettingsmodel->first();
        $adminEmail = $admin['Email'];
        $logo = "https://ecomweb.fableadtechnolabs.com/admin/public/upload_images/1702970978_5ddd8499c96a9fe06ef1.png";
        
        $subject = 'Order Cancelled By Customer';
        $message = "<html><body>
            <div style='font-family: Arial, sans-serif; max-width: 600px; margin: auto; background-color: white; padding: 20px; border: solid 1px gainsboro; box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);'>
                <div style='text-align: center; margin-bottom: 20px;'>
                    <img src='$logo' alt='Logo'>
                    <h2 style='color: #333;'>Order Cancellation Confirmation</h2>
                </div>
                <section class='order-cancellation'>
                    <div style='margin-bottom: 20px;'>
                        <h3 style='color: #333; text-align: center;'>Order Details</h3>
                        <table style='width: 100%; border-collapse: collapse; margin-left: 136px;'>
                            <tr><th style='text-align: left; padding-right: 10px;'><strong>Order Number:</strong></th><td style='padding: 8px;'>" . ('#'.$order['OrderNumber'] ?? "N/A") . "</td></tr>
                            <tr><th style='text-align: left; padding-right: 10px;'><strong>User Name:</strong></th><td style='padding: 8px;'>" .
                            (($usersData['first_name'] ?? $usersData['UserFirstName']) . " " .
                            ($usersData['last_name'] ?? $usersData['UserLastName'])) . "</td></tr>
                            <tr><th style='text-align: left; padding-right: 10px;'><strong>User Email:</strong></th><td style='padding: 8px;'>" . ($usersData['email'] ?? $usersData['UserEmail']) . "</td></tr>
                            <tr><th style='text-align: left; padding-right: 10px;'><strong>Order Status:</strong></th><td style='padding: 8px; color: red;'>Cancelled</td></tr>
                        </table>
                    </div>
                    <div style='text-align: center;'>
                        <p style='color: red; font-size: 18px;'>" .
                            (($usersData['first_name'] ?? $usersData['UserFirstName']) . " " .
                            ($usersData['last_name'] ?? $usersData['UserLastName'])) . " order has been cancelled.</p>
                    </div>
                </section>
                <div style='text-align: center; margin-top: 20px;'>
                    <p style='color: #888;'>Copyright © 2024 Ecom - All Rights Reserved.</p>
                </div>
            </div>
            </body></html>";

        $emailSender = new \App\Libraries\EmailSender();
        $isMailSent = $emailSender->sendEmail($adminEmail, $subject, $message);


        // if (!$isMailSent) {
        //     log_message('error', 'Failed to send order cancellation email to admin.');
        // }
        if ($isMailSent) {
            echo "1"; 
        } else {
            echo "2 - Error sending email"; 
        }

    } else {
        return json_encode(['status' => 'fail', 'message' => 'Failed to update the order status.']);
    }
}

// ================

   
}
