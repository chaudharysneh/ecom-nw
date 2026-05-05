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
use App\Models\Ordermodel;
use App\Models\Orderitemmodel;
use App\Models\User_shipping_addressmodel;



class Address extends BaseController
{
    protected $Categorymodel;
    protected $Subcategorymodel;
    protected $Bannersmodel;
    protected $Settings;
    protected $BlogModel;
    protected $CountryModel;
    protected $StateModel;
    protected $CityModel;
    protected $UserModel;
    protected $Ordermodel;
    protected $Orderitemmodel;
    protected $User_shipping_addressmodel;
    protected $session;

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
        $this->Ordermodel = new Ordermodel($db);
          $this->Orderitemmodel = new Orderitemmodel($db);
            $this->User_shipping_addressmodel = new User_shipping_addressmodel($db);
          $this->session = \Config\Services::session();
    }
    
    public function index()
    {
        $session = session();
        //   print_r($session);
         $auth_id = $session->get('user_id');
        // echo 'in';die;
        $data['all_address_data'] = $this->User_shipping_addressmodel->where('user_id',$auth_id)->findAll();
        // print_r($data['all_address_data']);
        // die;
         $data['catdata'] = $this->Categorymodel->findAll();
         $data['subdata']=[];
        foreach($data['catdata'] as $cat)
        {
            //$data['subdata']=$this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $data['subdata'][$cat['CategoryID']] = $subcategories;
        }
        return view('my_address', $data);
        //  return view('my_address');
    }
    
    public function add_address()
    
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
            $data['catdata'] = $this->Categorymodel->findAll();
         $data['subdata']=[];
        foreach($data['catdata'] as $cat)
        {
            //$data['subdata']=$this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $data['subdata'][$cat['CategoryID']] = $subcategories;
        }
            
        return view('add_address' ,$data);
    }
    
     public function save_address_form_data()
    {
      
     
      
     $session = session();
        //   print_r($session);
         $id = $session->get('user_id');
        $user_id = $this->request->getPost('id');
        $firstname = $this->request->getPost('firstname');
        $lastname = $this->request->getPost('lastname');
        // $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $address1 = $this->request->getPost('address1');
        // $address2 = $this->request->getPost('address2');
        $country = $this->request->getPost('country');
        $state = $this->request->getPost('state');
        $city = $this->request->getPost('city');
        $zip = $this->request->getPost('zip');
        
        $country_name = $this->CountryModel->where('CountryID',$country)->first();
        $state_name = $this->StateModel->where('StateID',$state)->first();
        $city_name = $this->CityModel->where('CityID',$city)->first();
        
        
      $add1 = "";
      if(!empty($address1)){
          $add1 = $address1;
      }
      else{
          $add1 = NULL;
      }
        
          $add2 = "";
    //   if(!empty($address2)){
    //       $add2 = $address2;
    //   }
    //   else{
    //       $add2 = NULL;
    //   }
      
       
        //  $email_check=$this->User_shipping_addressmodel->where('UserEmail',$email)->get()->getResultArray();
        // if(count($email_check)>0)
        // {
        //     echo 0;
        // }
        // // else 
        // {
        
        $all_data=[
            'user_id'=>$id,
            // 'UserEmail'=>$email,
            'first_name'=>$firstname,
            'last_name'=>$lastname,
            'city'=>$city_name['CityName'],
            'state'=>$state_name['StateName'],
            'country'=> $country_name['CountryName'],
            'zipcode'=>$zip,
            'address'=> $add1 ,
            'number'=> $phone,
            
           
            ];
        
            
            
            $res = $this->User_shipping_addressmodel->insert($all_data); 
            if($res){
                
                  echo 1;
            }
            else{
                 echo 0;
            }
            
          
        // }
        
    }

public function edit_address($id) {
     $id= base64_decode($id);
    $data['single_address_data'] = $this->User_shipping_addressmodel->where('id',$id)->first();
    
    $session = session();
        //   print_r($session);
         $u_id = $session->get('user_id');
        //  print_r($id);
        $data['profile_data'] = $this->UserModel->where('UserID', $u_id)->first();
        // print_r($data['profile_data']);
        

   
         $data['country'] = $this->CountryModel->findAll();
         $country_id = $data['profile_data']['UserState'];
         
  
          $data['state'] = $this->StateModel->where('CountryID', $country_id)->findAll();
        //   print_r($data['state']);
         
          $state_id = $data['profile_data']['UserCity'];
         
            $data['city'] = $this->CityModel->where('StateID', $state_id)->findAll();
            $data['catdata'] = $this->Categorymodel->findAll();
             foreach($data['catdata'] as $cat)
        {
            //$data['subdata']=$this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $data['subdata'][$cat['CategoryID']] = $subcategories;
        }
            
    return view('edit_address' ,$data);
}

public function update_address_form_data()
    {
      
    //   print_r($_POST);
     $session = session();
        //   print_r($session);
        
        $add_id = $this->request->getPost('add_id');
         $id = $session->get('user_id');
        $user_id = $this->request->getPost('id');
        $firstname = $this->request->getPost('firstname');
        $lastname = $this->request->getPost('lastname');
        // $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $address1 = $this->request->getPost('address1');
        // $address2 = $this->request->getPost('address2');
        $country = $this->request->getPost('country');
        $state = $this->request->getPost('state');
        $city = $this->request->getPost('city');
        $zip = $this->request->getPost('zip');
        
        $country_name = $this->CountryModel->where('CountryID',$country)->first();
        $state_name = $this->StateModel->where('StateID',$state)->first();
        $city_name = $this->CityModel->where('CityID',$city)->first();
        
        
      $add1 = "";
      if(!empty($address1)){
          $add1 = $address1;
      }
      else{
          $add1 = NULL;
      }
        
          $add2 = "";
    //   if(!empty($address2)){
    //       $add2 = $address2;
    //   }
    //   else{
    //       $add2 = NULL;
    //   }
      
       
        //  $email_check=$this->User_shipping_addressmodel->where('UserEmail',$email)->get()->getResultArray();
        // if(count($email_check)>0)
        // {
        //     echo 0;
        // }
        // // else 
        // {
        
        $all_data=[
            'user_id'=>$id,
            // 'UserEmail'=>$email,
            'first_name'=>$firstname,
            'last_name'=>$lastname,
            'city'=>$city_name['CityName'],
            'state'=>$state_name['StateName'],
            'country'=> $country_name['CountryName'],
            'zipcode'=>$zip,
            'address'=> $add1 ,
            'number'=> $phone,
            
           
            ];
        
            
            
            $res = $this->User_shipping_addressmodel->update($add_id, $all_data); 
            if($res){
                
                  echo 1;
            }
            else{
                 echo 0;
            }
            
          
        // }
        
    }
    
    public function delete_address(){
         $address_ids=$this->request->getPost('address_ids');
        $this->User_shipping_addressmodel->where('id',$address_ids);
            $delete=$this->User_shipping_addressmodel->delete(); 
       
       
            if($delete){
                echo 1;
            }else{
                echo 0;
            }
    }
    
    
}
