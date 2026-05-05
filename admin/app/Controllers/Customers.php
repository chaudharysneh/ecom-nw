<?php

namespace App\Controllers;
use App\Models\CountryModel;
use App\Models\StateModel;
use App\Models\CityModel;
use App\Models\UserModel;
use App\Models\variationmodel;
use App\Models\variationtypemodel;
use App\Models\BrandModel;
use App\Models\User_shipping_addressmodel;


class Customers extends BaseController
{
    
    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        $db = \Config\Database::connect();
      
        $this->country= new CountryModel($db);
        $this->state= new StateModel($db);
        $this->city= new CityModel($db);
        $this->users= new UserModel($db);
        $this->variation=new variationmodel($db);
         $this->variationtype= new variationtypemodel($db);
          $this->brand = new BrandModel($db);
          $this->User_shipping_addressmodel = new User_shipping_addressmodel($db);

        
    }


    public function index()
    {
        // $data['customers_data'] = $this->users->findAll();
        $data['customers_data'] = $this->users->orderBy('UserID', 'desc')->findAll();
        //  print_r($data['customers_data']);
        //  die;
        // $this->from($this->users);
        // $this->order_by("name", "asc");
        // $query = $this->db->get(); 
        // print_r($query); die;
        //  return $query->result();

        return view('all_customers',$data);
    }

    public function add_customers()
    {
        $data['country'] = $this->country->findAll();
        
        // print_r($data['country']); die;
        return view('add_customers',$data);
    }


    public function view_customer_details($id)
    {
       $userdata= $this->users->where('UserID',$id)->first();
        $country_id = $userdata['UserCountry'];
         $city_id = $userdata['UserCity'];
         $state_id = $userdata['UserState'];
        if(!empty($country_id)){
            
            $country_data= $this->country->where('CountryID',$country_id)->first();
        // print_r($country_data); die;
        
        $country_name=$country_data['CountryName'];
         $data['country_name']=$country_name;
         
        }else{
            $data['country_name']="NA";
        }
        
         if(!empty($state_id)){
             
             $state_data=$this->state->where('StateID',$state_id)->first();
         $state_name=$state_data['StateName'];
         $data['state_name']=$state_name;
             
         }else{
             $data['state_name']="NA";
         }
         
         
         if(!empty($city_id)){
             
              $city_data=$this->city->where('CityID',$city_id)->first();
         $city_name=$city_data['CityName'];
         $data['city_name']=$city_name;
             
         }else{
             $data['city_name']="NA";
         }
         
        
        
        
        $data['customer_data']=$userdata;
        // print_r($data); die;
        return view('view_customer_details',$data);
    }

    public function edit_customer_details($id){
        // print_r($id); die;
        $data['country'] = $this->country->findAll();
        $data['state'] = $this->state->findAll();
        $data['city'] = $this->city->findAll();
        $data['customer_data']= $this->users->where('UserID',$id)->first();
        // print_r($data['customer_data']); die;
        return view('edit_customer_details',$data);
    }

    
    public function edit_customers()
    {
        // print_r($_POST);
        $id = $this->request->getPost('id');
        // print_r($id);

        $fname = $this->request->getPost('firstname');
        $lname = $this->request->getPost('lastname');
        $dob = $this->request->getPost('dob');
        // $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        // $password = $this->request->getPost('password');
        $address1 = $this->request->getPost('address1');
        $address2 = $this->request->getPost('address2');
        $country = $this->request->getPost('country');
        $state = $this->request->getPost('state');
        $city = $this->request->getPost('city');
        $postcode = $this->request->getPost('postcode'); 
        // return view('edit-customer-details');
        $old_pro_pic= $this->request->getPost('old_pro_pic');
        
        $file_image = $this->request->getFile('profile_pic');
        $imgname=$file_image->getName();
        if(!empty($imgname)){
            $fileName = $file_image->getRandomName();
        $file_image->move('public/upload_images', $fileName);
        }else{
            $fileName= $old_pro_pic;
        }
        
    //   print_r($fileName); die;
        $all_field=[
            'UserFirstName'  => $this->request->getVar('firstname'),
            'UserLastName'  => $this->request->getVar('lastname'),
            'DOB'  => $this->request->getVar('dob'),
            // 'UserEmail'  => $this->request->getVar('email'),
            'UserPhone'  => $this->request->getVar('phone'),
            // 'UserPassword'  => $this->request->getVar('password'),
            'UserAddress'  => $this->request->getVar('address1'),
            'UserAddress2'  => $this->request->getVar('address2'),
            'UserCountry'  => $this->request->getVar('country'),
            'UserState'  => $this->request->getVar('state'),
            'UserCity'  => $this->request->getVar('city'),
            'UserZip'  => $this->request->getVar('postcode'),
            'UserProfile' => $fileName,
            'UserType' => '2',

        ];

        $user_data = $this->users->update($id, $all_field);
        if($user_data) {
            echo 1;
        }
        else
        {
            echo 0;

        }

        



    }
    

    public function del_customer(){
        $customer_ids=$this->request->getPost('customer_ids');
        $this->users->where('UserID',$customer_ids);
            $delete=$this->users->delete(); 
       
       
            if($delete){
                echo 1;
            }else{
                echo 0;
            }
   
           }
         


           
    public function getStates() 
    {
    $countryId = $this->request->getPost('country_id'); 
    $stateModel = new StateModel();
    
    // Fetch states based on CountryID
    $states = $stateModel->where('CountryID', $countryId)->findAll();
    
    // Return the states as a JSON response
    return $this->response->setJSON(['states' => $states]);
    }

    public function getCities() {
        $stateId = $this->request->getPost('state_id'); 
        $cityModel = new CityModel();
        
        // Fetch cities based on StateID
        $cities = $cityModel->where('StateID', $stateId)->findAll();
        
        // Return the cities as a JSON response
        return $this->response->setJSON(['cities' => $cities]);
    }
    

    public function get_state_from_country(){
        // return view('edit_customer_details');
         $countryid=$_POST['countryid'];

         $state=$this->state->where('CountryID',$countryid)->findAll();
        //  print_r($state); die;
        echo json_encode($state);



    }
    public function get_city_from_state(){
        // return view('edit_customer_details');
         $stateid=$_POST['stateid'];

         $city=$this->city->where('StateID',$stateid)->findAll();
        //  print_r($state); die;
        echo json_encode($city);



    }
    public function save_customers(){
       
        //  print_r($_POST);
        $fname = $this->request->getPost('firstname');
        $lname = $this->request->getPost('lastname');
        $dob = $this->request->getPost('dob');
        $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $password = $this->request->getPost('password');
        $address1 = $this->request->getPost('address1');
        $address2 = $this->request->getPost('address2');
        $country = $this->request->getPost('country');
        $state = $this->request->getPost('state');
        $city = $this->request->getPost('city');
        $postcode = $this->request->getPost('postcode');
        
        $file_image = $this->request->getFile('profile_pic');
        $imgname=$file_image->getName();
        // print_r($imgname); die;
        if(!empty ($imgname))
        {
        $fileName = $file_image->getRandomName();
        $file_image->move('public/upload_images', $fileName);
        }else{
            $fileName="default.jpg";
        }
        // print_r($fileName); die;
        
        $email_check=$this->users->where('UserEmail',$email)->first();
        
        if($email_check){
            echo 2;
        }else{
            
        
        
        $all_field=[
            'UserFirstName'  => $this->request->getVar('firstname'),
            'UserLastName'  => $this->request->getVar('lastname'),
            'DOB'  => $this->request->getVar('dob'),
            'UserEmail'  => $this->request->getVar('email'),
            'UserPhone'  => $this->request->getVar('phone'),
            'UserPassword'  => md5 ($this->request->getVar('password')),
            'UserAddress'  => $this->request->getVar('address1'),
            'UserAddress2'  => $this->request->getVar('address2'),
            'UserCountry'  => $this->request->getVar('country'),
            'UserState'  => $this->request->getVar('state'),
            'UserCity'  => $this->request->getVar('city'),
            'UserZip'  => $this->request->getVar('postcode'),
            'UserProfile' => $fileName,
            'UserType' => '2',

        ];
// print_r($all_field); die;
        $user_data = $this->users->insert($all_field);
        $lastId = $this->users->getInsertID();
        $all_field2=[
            'user_id' => $lastId,
            'first_name' => $this->request->getVar('firstname'),
            'last_name' => $this->request->getVar('lastname'),
            'city' => $this->request->getVar('city'),
            'state' => $this->request->getVar('state'),
            'country' => $this->request->getVar('country'),
            'zipcode' => $this->request->getVar('postcode'),
            'address' => $this->request->getVar('address1'),
            'number'=> $this->request->getVar('phone'),
            ];
            $shipping_address_data=$this->User_shipping_addressmodel->insert($all_field2);
        if($user_data && $shipping_address_data) {
            echo 1;
        }
        else
        {
            echo 0;

        }

        
        }


    }
    
    
    public function search_filter_customer_details_data()
{
    

        $all_phone = $this->request->getPost('all_phone');
        $all_email = $this->request->getPost('all_email');
        $date_selectered = $this->request->getPost('date_selecter');

        // Format date to the same format as the database
        if (!empty($date_selectered)) {
            $date_selectered = date('Y-m-d', strtotime($date_selectered)); // Format the date as Y-m-d
        }

        // Construct the query based on filters
        if (!empty($all_email) && empty($all_phone) && empty($date_selectered)) {
            $qry_data = $this->users->where('UserEmail', $all_email)->findAll();
        } elseif (!empty($all_email) && !empty($all_phone) && empty($date_selectered)) {
            $qry_data = $this->users->where('UserEmail', $all_email)->where('UserPhone', $all_phone)->findAll();
        } elseif (!empty($all_email) && !empty($all_phone) && !empty($date_selectered)) {
            // Use raw SQL for the date comparison
            $qry_data = $this->users->where('UserEmail', $all_email)
                                    ->where('UserPhone', $all_phone)
                                    ->where('DATE(UserRegistrationDate) =', $date_selectered)
                                    ->findAll();
        } elseif (!empty($all_email) && !empty($date_selectered)) {
            $qry_data = $this->users->where('UserEmail', $all_email)
                                    ->where('DATE(UserRegistrationDate) =', $date_selectered)
                                    ->findAll();
        } elseif (!empty($all_phone) && empty($date_selectered)) {
            $qry_data = $this->users->where('UserPhone', $all_phone)->findAll();
        } elseif (!empty($all_phone) && !empty($date_selectered)) {
            $qry_data = $this->users->where('UserPhone', $all_phone)
                                    ->where('DATE(UserRegistrationDate) =', $date_selectered)
                                    ->findAll();
        } elseif (!empty($date_selectered)) {
            $qry_data = $this->users->where('DATE(UserRegistrationDate) =', $date_selectered)->findAll();
        } else {
            $qry_data = $this->users->findAll();
        }


    // Format data for JSON output
    $response_data = [];
    $i = 1;
    if (!empty($qry_data)) {
        foreach ($qry_data as $query) {
            $response_data[] = [
                'index' => $i,
                'first_name' => $query['UserFirstName'],
                'email' => $query['UserEmail'],
                'phone' => !empty($query['UserPhone']) ? $query['UserPhone'] : 'N/A',
                'registration_date' => date('d-m-Y', strtotime($query['UserRegistrationDate'])),
                'actions' => [
                    'view' => base_url() . 'view_customer_details/' . $query['UserID'],
                    'edit' => base_url() . 'edit-customer-details/' . $query['UserID'],
                    'delete' => $query['UserID']
                ]
            ];
            $i++;
        }
        
    } else {
        $response_data[] = ['message' => 'No Data Available'];
    }

    // Return JSON response
    return $this->response->setJSON($response_data);
}

    
    
    // brand..
    public function all_brands()
    {
        $data['all_brands_data'] = $this->brand->orderby('BrandID','DESC')->findAll();
        // print_r($data['all_tags_data']);
        // die;
        return view('all_brands',$data);
        
    }
    
    public function add_brands()
    {   
        
        return view('add_brands');
    }
    
     public function save_brands()
    { 
        // print_r($_POST); die;
        $name = $this->request->getPost('name');


        $data_insert=[
            'BrandName'	=>	$this->request->getVar('name'),
                   
        ];

        $user_data = $this->brand->insert($data_insert);
        if($user_data) {
            echo 1;
        }
        else
        {
            echo 0;

        }

      
    }
    
     public function edit_brands($id = null)
    {
        $data['all_brands_data']=$this->brand->where('BrandID', $id)->first();
        // print_r($data['all_tags_data']);
        return view('edit_brands',$data);
    }
    
     public function update_brands()
    {
        // print_r($_POST); die;
        // return view('edit_tag');

        $name = $this->request->getPost('brandname');
        $id= $this->request->getPost('id');


        $data_update=[
            'BrandName'	=>	$name,
            
                    
        ];


       $user_data = $this->brand->update($id, $data_update);

        if($user_data){
                 echo 1;
             }else{
                 echo 0;
             }
        

    }
    
    public function delete_brands_type(){
        $brandstype_id=$this->request->getPost('brandtype_ids');
        // print_r($brandstype_id); die;
         $this->brand->where('BrandID',$brandstype_id);
             $delete=$this->brand->delete(); 
        
        
             if($delete){
                 echo 1;
             }else{
                 echo 0;
             }
    
            }
    // brand ..
    
}

