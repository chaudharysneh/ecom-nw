<?php

namespace App\Controllers;
use App\Models\BlogModel;
use App\Models\CountryModel;




class Country extends BaseController
{
    
     public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        $db = \Config\Database::connect();
        $this->BlogModel = new BlogModel($db);
         $this->CountryModel = new CountryModel($db);
        

    }
    
    public function all_country()
{
    $data['allcountryydata'] = $this->CountryModel->orderBy('CountryID', 'DESC')->findAll();

    return view('all_country', $data);
}

    public function add_country()
    {
        $data['allcountryydata'] = $this->CountryModel->findAll();
        // print_r($data['allcategorydata']);
        
        return view('add_country',$data);
    }
    
    
     public function save_country()
    {
        // echo "hii";
        
        
        $con_name = $this->request->getPost('con_name');
       
            $data_insert=[
                 'CountryName'	=>	$this->request->getVar('con_name'),
            ];
            // print_r($data_insert);
            // die;
            $country_check=$this->CountryModel->where('CountryName',$con_name)->first();
            if($country_check){
                echo 2;
            }
            else{
            $user_data = $this->CountryModel->insert( $data_insert);
            if($user_data) {
                echo 1;
            }
            else
            {
                echo 0;
            }
    }
}
    
    
     public function edit_country($id)
    {
         $data['singlcountrydata'] = $this->CountryModel->where('CountryID',$id)->first();
        //  print_r($data['singlebannersdata']);
        
        // $data['allcategorydata'] = $this->catagory->findAll();
            return view('edit_country',$data);
    }
    
    
     public function update_country()
    {
        // echo "hii";
        
        // print_r($_POST);
        
          $country_id = $this->request->getPost('country_id');
        // print_r($banner_id);
          $con_name = $this->request->getPost('con_name');
          
          $country_check=$this->CountryModel->where('CountryName',$con_name)->first();
            if($country_check){
                echo 2;
            }
            else{
     

            $data_update=[
                 'CountryName'	=>	$this->request->getVar('con_name'),
            ];
    
            // print_r($data_update);
            // die;
    
           
        $user_data = $this->CountryModel->update($country_id, $data_update);
            if($user_data) {
                echo 1;
            }
            else
            {
                echo 0;
    
            }
    }
    }
    
     public function del_country(){
        //  echo "hii";
        
        $country_id=$this->request->getPost('country_ids');
        $this->CountryModel->where('CountryID', $country_id);
        
        $delete=$this->CountryModel->delete(); 
       
       
            if($delete){
               
                echo 1;
            }else{
                echo 0;
            }
   
          }
    
}
?>