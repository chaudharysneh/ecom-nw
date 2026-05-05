<?php

namespace App\Controllers;
use App\Models\CouponModel;
use App\Models\FaqsModel;
use App\Models\SeoModel;
use App\Models\Ordermodel;
use App\Models\TestimonialModel;
use App\Models\EnquiryModel;
use App\Models\productmodel;
use App\Models\Orderitemmodel;
use App\Models\Ordercommentmodel;
use App\Models\catagorymodel;
use App\Models\UserModel;




class Coupon extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        $db = \Config\Database::connect();
        
             $this->coupons = new CouponModel($db);
             $this->faqs = new FaqsModel($db);
             $this->seo = new SeoModel($db);
             $this->Ordermodel = new Ordermodel($db);
             $this->testimonial = new TestimonialModel($db);
             $this->enquiry= new EnquiryModel($db);
             $this->product= new productmodel($db);
             $this->orderitem = new Orderitemmodel($db);
             $this->Ordercomment = new Ordercommentmodel($db);
              $this->catagory = new catagorymodel($db);
               $this->User = new UserModel($db);
           
    }
    
    
    public function index()
    {
         $data['coupon_data_value'] = $this->coupons->groupBy('CouponValue')->orderby('CouponID','DESC')->findAll();
           $data['coupons_data'] = $this->coupons->orderby('CouponID','DESC')->findAll();
        //  print_r($data['coupons_data']);
         
         $data['all_products_data'] = $this->product->findAll();
                //   print_r($data['all_products_data']);
        return view('all_coupons',$data);
    }
    
    //  public function index()
    // {
       
    //   $data_arr=[];
    //      $all_coupon_data = $this->coupons->findAll();
    //     foreach($all_coupon_data as $single_coupon_data){
    //         $product_id = $single_coupon_data['ProductID'];
            
    //         $user_data=$this->product->where('ProductID',$product_id)->first();
    //         print_r($user_data);
    //         die;
    //         $productname = $user_data['ProductName'];
    //         //  $user_last_name = $user_data['UserLastName'];
    //         //   $user_email = $user_data['UserEmail'];
              
    //           $new_arr['ProductName']=$productname;
    //             // $new_arr['UserLastName']=$user_last_name;
    //             //  $new_arr['UserEmail']=$user_email;
                 
                 
                 
                 
    //       $new_arr['ProductID']=$single_coupon_data['ProductID'];
    //       $new_arr['CategoryID']=$single_coupon_data['CategoryID'];
    //       $new_arr['UserID']=$single_coupon_data['UserID'];
    //       $new_arr['CouponName']=$single_coupon_data['CouponName'];
    //         $new_arr['ProductSpecification']=$single_coupon_data['ProductSpecification'];
    //          $new_arr['CouponCode']=$single_coupon_data['CouponCode'];
    //         $new_arr['CouponType']=$single_coupon_data['CouponType'];
    //           $new_arr['CouponValue']=$single_coupon_data['CouponValue'];
    //         $new_arr['UserStatus']=$single_coupon_data['UserStatus'];
    //         $new_arr['StartDate']=$single_coupon_data['StartDate'];
    //         $new_arr['EndDate']=$single_coupon_data['EndDate'];
    //          $new_arr['CouponLive']=$single_coupon_data['CouponLive'];
    //         $new_arr['Created_at']=$single_coupon_data['Created_at'];
    //         $new_arr['Updated_at']=$single_coupon_data['Updated_at'];
          
          
    //         array_push($data_arr,$new_arr);
    //     }
              
              
    //           print_r($data_arr);   
        
        
    //     $data['coupons_data']=$data_arr;
    //   return view('all_coupons',$data);
    // }
    
    
    
    
     public function add_coupons()
    {
        $data['all_catagory_data'] = $this->catagory->findAll();
            //  print_r($data['all_catagory_data']);
             $data['all_products_data'] = $this->product->findAll();
                //   print_r($data['all_products_data']);
                 $data['all_user_data'] = $this->User->findAll();
                //   print_r($data['all_user_data']);
        return view('add_coupons' ,$data);
    }
      public function save_coupons()
    {
        // print_r($_POST);
        $coupon_name = $this->request->getPost('coupon_name');
        $specification = $this->request->getPost('specification');
        $user_status = $this->request->getPost('user_status');
        
        $product_coupons = $this->request->getPost('product_coupons');
        $catagory_coupons = $this->request->getPost('catagory_coupons');
        $product_couponed = $this->request->getPost('product_couponed');
         $usertype_coupons = $this->request->getPost('usertype_coupons');
        
        $coupon_code = $this->request->getPost('coupon_code');
        $coupon_type = $this->request->getPost('coupon_type');
        $coupon_value = $this->request->getPost('coupon_value');
        $s_date = $this->request->getPost('s_date');
        $e_date = $this->request->getPost('e_date');
        
        $catagory_id = '';
        if(!empty($catagory_coupons)) {
            $catagory_coupon_string = implode(',',$catagory_coupons);
            
            $catagory_id = $catagory_coupon_string;
        }
        else{
            $catagory_id = '';
            
        }
        
        $product_id = '';
        if(!empty($product_couponed)) {
             $product_coupon_string = implode(',',$product_couponed);
            
            $product_id = $product_coupon_string;
        }
        else{
            $product_id = '';
            
        }
        
        $usertype_id = '';
        if(!empty($usertype_coupons)) {
             $usertype_coupon_string = implode(',',$usertype_coupons);
            
            $usertype_id = $usertype_coupon_string;
        }
        else{
            $usertype_id = '';
            
        }
        
        
        
        
        $all_feild=[
            'ProductCoupon' => $product_coupons,
            'CategoryID' => $catagory_id,
            'ProductID' => $product_id ,
            'UserID' => $usertype_id ,
            'CouponName' => $coupon_name ,
            'ProductSpecification' => $specification ,
            'UserStatus' => $user_status ,
            
            'CouponCode'  => $this->request->getVar('coupon_code'),
            'CouponType'  => $this->request->getVar('coupon_type'),
            'CouponValue'  => $this->request->getVar('coupon_value'),
            'StartDate'  => $this->request->getVar('s_date'),
            'EndDate'  => $this->request->getVar('e_date'),
            // 'CouponLive' =>
            ];
            
            // print_r($all_feild);
        
        $coupon_data=$this->coupons->insert($all_feild);
        if($coupon_data){
            echo 1;
        }else{
            echo 0;
        }
        
    }
    
      public function edit_coupons($id)
    {
        // print_r($id); die;
         $data['all_coupons_data']=$this->coupons->where('CouponID', $id)->first();
        //  print_r($data['all_coupons_data']);
          $data['all_catagory_data'] = $this->catagory->findAll();
            //  print_r($data['all_catagory_data']);
             $data['all_products_data'] = $this->product->findAll();
                //   print_r($data['all_products_data']);
                 $data['all_user_data'] = $this->User->findAll();
                //   print_r($data['all_user_data']);
        return view('edit_coupons',$data);
    }
      public function update_coupons()
    {
        // print_r($_POST);
        // die;
         $id = $this->request->getPost('id');
        //  print_r($id); die;
         $coupon_name = $this->request->getPost('coupon_name');
        $specification = $this->request->getPost('specification');
        $user_status = $this->request->getPost('user_status');
        
        $product_coupons = $this->request->getPost('product_coupons');
        $catagory_coupons = $this->request->getPost('catagory_coupons');
        $product_couponed = $this->request->getPost('product_couponed');
         $usertype_coupons = $this->request->getPost('usertype_coupons');
        
        $coupon_code = $this->request->getPost('coupon_code');
        $coupon_type = $this->request->getPost('coupon_type');
        $coupon_value = $this->request->getPost('coupon_value');
        $s_date = $this->request->getPost('s_date');
        $e_date = $this->request->getPost('e_date');
        
         $catagory_id = '';
        if(!empty($catagory_coupons) && $product_coupons==1) {
            $catagory_coupon_string = implode(',',$catagory_coupons);
            
            $catagory_id = $catagory_coupon_string;
        }
        else{
            $catagory_id = '';
            
        }
        
        $product_id = '';
        // print_r($product_couponed);
        if(!empty($product_couponed) && $product_coupons==2) {
             $product_coupon_string = implode(',',$product_couponed);
            
            $product_id = $product_coupon_string;
        }
        else{
            $product_id = '';
            
        }
        
        $usertype_id = '';
        if(!empty($usertype_coupons) && $product_coupons==3) {
             $usertype_coupon_string = implode(',',$usertype_coupons);
            
            $usertype_id = $usertype_coupon_string;
        }
        else{
            $usertype_id = '';
            
        }
        
        
        
        
        $all_field=[
            'ProductCoupon' => $product_coupons,
            'CategoryID' => $catagory_id,
            'ProductID' => $product_id ,
            'UserID' => $usertype_id ,
            'CouponName' => $coupon_name ,
            'ProductSpecification' => $specification ,
            'UserStatus' => $user_status ,
            
            'CouponCode'  => $this->request->getVar('coupon_code'),
            'CouponType'  => $this->request->getVar('coupon_type'),
            'CouponValue'  => $this->request->getVar('coupon_value'),
            'StartDate'  => $this->request->getVar('s_date'),
            'EndDate'  => $this->request->getVar('e_date'),
            // 'CouponLive' =>
            ];
            
            // print_r($all_field);
            // die;
            
            $coupon_data = $this->coupons->update($id,$all_field);
        if($coupon_data) {
            echo 1;
        }
        else
        {
            echo 0;

        }
    }
    
    
    
    //  public function search_data()
    // {
    //     echo "hii";
        
    //       $search = $this->request->getPost('search');
        
        
       
    // }
    
     public function del_coupons(){
        $coupons_ids=$this->request->getPost('coupons_ids');
        $this->coupons->where('CouponID',$coupons_ids);
            $delete=$this->coupons->delete(); 
       
       
            if($delete){
                echo 1;
            }else{
                echo 0;
            }
   
           }
           
    
    
      public function search_filter_data()
    {
        // echo "hi";
        // 
        // print_r($_POST);
        // $search_data = $this->request->getPost('search_data');
        $coupon_type_status = $this->request->getPost('coupon_type_status');
        // $all_products = $this->request->getPost('all_products');
        $date_from_selecter = $this->request->getPost('date_from_selecter');
        $date_to_selecter = $this->request->getPost('date_to_selecter');
        $discount_on = $this->request->getPost('discount_on');
        
        
        
           if(!empty($discount_on) && empty($coupon_type_status) && empty($date_from_selecter) && empty($date_to_selecter))
        {
            $qry_data = $this->coupons->where('CouponValue',$discount_on)->findAll();
            // echo $this->coupons->getLastQuery();
            
        }
        
        
         elseif(!empty($discount_on) && !empty($coupon_type_status) && empty($date_from_selecter) && empty($date_to_selecter))
        {
           $qry_data = $this->coupons->where('CouponValue',$discount_on)->where('CouponType',$coupon_type_status)->findAll();
        }
        
         elseif(!empty($discount_on) && !empty($coupon_type_status) && !empty($date_from_selecter) && empty($date_to_selecter))
        {
            // echo "brfbrf";
            $qry_data = $this->coupons->where('CouponValue',$discount_on)->where('CouponType',$coupon_type_status)->where('DATE(StartDate)',$date_from_selecter)->findAll();
            
        }
        
         elseif(!empty($discount_on) && !empty($coupon_type_status) && !empty($date_from_selecter) && !empty($date_to_selecter))
        {
            // echo "brfbrf";
            $qry_data = $this->coupons->where('CouponValue',$discount_on)->where('CouponType',$coupon_type_status)->where('DATE(StartDate)',$date_from_selecter)->where('DATE(EndDate)',$date_to_selecter)->findAll();
            
        }
        
        
        elseif(!empty($coupon_type_status) && empty($date_from_selecter) && empty($date_to_selecter))
        {
            $qry_data = $this->coupons->where('CouponType',$coupon_type_status)->findAll();
            // echo $this->coupons->getLastQuery();
            
        }
        
          elseif(!empty($coupon_type_status) && !empty($date_from_selecter) && empty($date_to_selecter))
        {
            $qry_data = $this->coupons->where('CouponType',$coupon_type_status)->where('StartDate', $date_from_selecter)->findAll();
            // echo $this->coupons->getLastQuery();
            
        }
        
        elseif(!empty($coupon_type_status) && empty($date_from_selecter) && !empty($date_to_selecter))
        {
            $qry_data = $this->coupons->where('CouponType',$coupon_type_status)->where('EndDate', $date_to_selecter)->findAll();
            // echo $this->coupons->getLastQuery();
            
        }
        
        
          elseif(!empty($coupon_type_status) && !empty($date_from_selecter) && !empty($date_to_selecter))
        {
            $qry_data = $this->coupons->where('CouponType',$coupon_type_status)->where('StartDate', $date_from_selecter)->where('DATE(EndDate)',$date_to_selecter)->findAll();
            // echo $this->coupons->getLastQuery();
            
        }
        
        
         elseif(!empty($date_from_selecter) && empty($date_to_selecter))
        {
            // echo "hii";
            
            $qry_data = $this->coupons->where('StartDate',$date_from_selecter)->findAll();
            // echo $this->coupons->getLastQuery();
            
        }
        
         elseif(!empty($date_from_selecter) && empty($date_to_selecter) && empty($discount_on) && empty($coupon_type_status) )
        {
            // echo "hii";
            
            $qry_data = $this->coupons->where('StartDate',$date_from_selecter)->findAll();
            // echo $this->coupons->getLastQuery();
            
        }
        
         elseif(!empty($date_from_selecter) && !empty($date_to_selecter))
        {
            // echo "hii";
            
            $qry_data = $this->coupons->where('StartDate',$date_from_selecter)->where('DATE(EndDate)',$date_to_selecter)->findAll();
            echo $this->coupons->getLastQuery();
            
        }
        
         elseif(!empty($date_from_selecter))
        {
            // echo "hii";
            
            $qry_data = $this->coupons->where('DATE(StartDate)',$date_from_selecter)->findAll();
            // echo $this->coupons->getLastQuery();
            
        }
        
         elseif(!empty($date_to_selecter))
        {
            // echo "hii";
            
            $qry_data = $this->coupons->where('DATE(EndDate)',$date_to_selecter)->findAll();
            // echo $this->coupons->getLastQuery();
            
        }
      
        
        
        else
        {
            $qry_data = $this->coupons->findAll();
            
        }
      

            $response = [];
            $i = 1;
            
            if (!empty($qry_data)) {
                foreach ($qry_data as $query) {
                    $response[] = [
                        'index' => $i,
                        'CouponName' => $query['CouponName'],
                        'ProductSpecification' => $query['ProductSpecification'],
                        'CouponCode' => $query['CouponCode'],
                        'CouponType' => ($query['CouponType'] == 1 ? "Percentage" : ($query['CouponType'] == 2 ? "Fixed" : "")),
                        'CouponValue' => $query['CouponValue'],
                        'DateRange' => [
                            'From' => date('d-m-Y', strtotime($query['StartDate'])),
                            'To' => date('d-m-Y', strtotime($query['EndDate']))
                        ],
                        'UserStatus' => $query['UserStatus'] == 1 ? '<i class="fa fa-check" style="color: green;"></i> Active' :
                            ($query['UserStatus'] == 2 ? '<i class="fa fa-check" style="color: red;"></i> Inactive' :
                            ($query['UserStatus'] == 3 ? 'Expired' : '')),
                        'Actions' => [
                            'Edit' => base_url('edit-coupons/' . $query['CouponID']),
                            'Delete' => [
                                'href' => 'javascript:void(0);',
                                'data-id' => $query['CouponID']
                            ]
                        ]
                    ];
                    $i++;
                }
            } else {
                $response[] = [
                    'message' => 'No Data Available'
                ];
            }
            
            // Return JSON response
            return $this->response->setJSON($response);
    
    
}
public function search_filter_data_old()
    {
        // echo "hi";
        // 
        // print_r($_POST);
        // $search_data = $this->request->getPost('search_data');
        $coupon_type_status = $this->request->getPost('coupon_type_status');
        // $all_products = $this->request->getPost('all_products');
        $date_from_selecter = $this->request->getPost('date_from_selecter');
        $date_to_selecter = $this->request->getPost('date_to_selecter');
        $discount_on = $this->request->getPost('discount_on');
        
        
        
           if(!empty($discount_on) && empty($coupon_type_status) && empty($date_from_selecter) && empty($date_to_selecter))
        {
            $qry_data = $this->coupons->where('CouponValue',$discount_on)->findAll();
            // echo $this->coupons->getLastQuery();
            
        }
        
        
         elseif(!empty($discount_on) && !empty($coupon_type_status) && empty($date_from_selecter) && empty($date_to_selecter))
        {
           $qry_data = $this->coupons->where('CouponValue',$discount_on)->where('CouponType',$coupon_type_status)->findAll();
        }
        
         elseif(!empty($discount_on) && !empty($coupon_type_status) && !empty($date_from_selecter) && empty($date_to_selecter))
        {
            // echo "brfbrf";
            $qry_data = $this->coupons->where('CouponValue',$discount_on)->where('CouponType',$coupon_type_status)->where('DATE(StartDate)',$date_from_selecter)->findAll();
            
        }
        
         elseif(!empty($discount_on) && !empty($coupon_type_status) && !empty($date_from_selecter) && !empty($date_to_selecter))
        {
            // echo "brfbrf";
            $qry_data = $this->coupons->where('CouponValue',$discount_on)->where('CouponType',$coupon_type_status)->where('DATE(StartDate)',$date_from_selecter)->where('DATE(EndDate)',$date_to_selecter)->findAll();
            
        }
        
        
        elseif(!empty($coupon_type_status) && empty($date_from_selecter) && empty($date_to_selecter))
        {
            $qry_data = $this->coupons->where('CouponType',$coupon_type_status)->findAll();
            // echo $this->coupons->getLastQuery();
            
        }
        
          elseif(!empty($coupon_type_status) && !empty($date_from_selecter) && empty($date_to_selecter))
        {
            $qry_data = $this->coupons->where('CouponType',$coupon_type_status)->where('StartDate', $date_from_selecter)->findAll();
            // echo $this->coupons->getLastQuery();
            
        }
        
        elseif(!empty($coupon_type_status) && empty($date_from_selecter) && !empty($date_to_selecter))
        {
            $qry_data = $this->coupons->where('CouponType',$coupon_type_status)->where('EndDate', $date_to_selecter)->findAll();
            // echo $this->coupons->getLastQuery();
            
        }
        
        
          elseif(!empty($coupon_type_status) && !empty($date_from_selecter) && !empty($date_to_selecter))
        {
            $qry_data = $this->coupons->where('CouponType',$coupon_type_status)->where('StartDate', $date_from_selecter)->where('DATE(EndDate)',$date_to_selecter)->findAll();
            // echo $this->coupons->getLastQuery();
            
        }
        
        
         elseif(!empty($date_from_selecter) && empty($date_to_selecter))
        {
            // echo "hii";
            
            $qry_data = $this->coupons->where('StartDate',$date_from_selecter)->findAll();
            // echo $this->coupons->getLastQuery();
            
        }
        
         elseif(!empty($date_from_selecter) && empty($date_to_selecter) && empty($discount_on) && empty($coupon_type_status) )
        {
            // echo "hii";
            
            $qry_data = $this->coupons->where('StartDate',$date_from_selecter)->findAll();
            // echo $this->coupons->getLastQuery();
            
        }
        
         elseif(!empty($date_from_selecter) && !empty($date_to_selecter))
        {
            // echo "hii";
            
            $qry_data = $this->coupons->where('StartDate',$date_from_selecter)->where('DATE(EndDate)',$date_to_selecter)->findAll();
            echo $this->coupons->getLastQuery();
            
        }
        
         elseif(!empty($date_from_selecter))
        {
            // echo "hii";
            
            $qry_data = $this->coupons->where('DATE(StartDate)',$date_from_selecter)->findAll();
            // echo $this->coupons->getLastQuery();
            
        }
        
         elseif(!empty($date_to_selecter))
        {
            // echo "hii";
            
            $qry_data = $this->coupons->where('DATE(EndDate)',$date_to_selecter)->findAll();
            // echo $this->coupons->getLastQuery();
            
        }
      
        
        
        else
        {
            $qry_data = $this->coupons->findAll();
            
        }

        


        $i = 1;
        if(!empty($qry_data)){
        foreach($qry_data as $query) {
            
            ?><tr>
                      <td scope="row"><?php echo $i; ?></td>
                   <td><?php echo $query['CouponName'];?></td>
                     <td><?php echo $query['ProductSpecification'];?></td>
                     
                      <td><?php echo $query['CouponCode'];?></td>
                      <td><?php if($query['CouponType']==1){echo "Percentage";}if($query['CouponType']==2){echo "Fixed";}  ?></td>
                      <td><?php echo $query['CouponValue'];?></td>
                      
                       <td><strong> From :</strong> <?php echo date('d-m-Y',strtotime($query['StartDate']));?>
                          <strong>To:</strong> <?php echo date('d-m-Y',strtotime($query['EndDate']));?>  </td>
                          
                            <td>
                                
                                <?php if($query['UserStatus']==1){echo '<i class="fa fa-check" style="color: green;"></i>'."Active";} ?>
                          
                           <?php  if($query['UserStatus']==2){echo  '<i class="fa fa-check" style="color: red;"></i>'. "Inactive";} 
                            if($query['UserStatus']==3){echo "Exepired";} ?></td>
                       <!--<td> -->
                           <?php //if($query['UserStatus']==1){echo "<i class='fa fa-toggle-on' style='color: green;'></i>";} if($query['UserStatus']==2){echo "<i class='fa fa-toggle-off' style='color: red';></i>";} if($query['UserStatus']==3){echo "Exepired";} ?>
                           <!--</td>-->
                
                      <td>
                      <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu" style="">
                <a class="dropdown-item" href="<?php //echo base_url(); ?>edit-coupons/<?= $query['CouponID'] ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item del_coupons_type" href="javascript:void(0);" data-id="<?= $query['CouponID'] ?>"> <i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
                    </tr>
            <?php
            $i++;
        }
        }
         else{
         ?>   
            <tr>
                <td colspan = "10" class="text-center"> No Data Available
                </td>
                </tr>
            <?php 
        
        
      
        
       
    }
    
}
    
}
   