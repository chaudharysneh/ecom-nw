<?php

namespace App\Controllers;
use App\Models\BlogModel;
use App\Models\CountryModel;
use App\Models\StateModel;
use App\Models\CityModel;



class City extends BaseController
{
    
     public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        $db = \Config\Database::connect();
        $this->BlogModel = new BlogModel($db);
        $this->CountryModel = new CountryModel($db);
        $this->StateModel = new StateModel($db);
        $this->CityModel = new CityModel($db);
        

    }
    
    public function all_city()
    {
        $data['allstatedata'] = $this->StateModel->findAll(); // Ensure correct case for 'DESC'
    
        // Fetch all city data
        $data['allcitydata'] = $this->CityModel->orderBy('CityID', 'DESC')->findAll();
        
        return view('all_city', $data);
    }
    
    public function add_city()
    {
        $data['allcitydata'] = $this->CityModel->findAll();
        
        $data['allstatsedata'] = $this->StateModel->findAll();
        // print_r($data['allcategorydata']);
        
        return view('add_city',$data);
    }
    
    
         public function save_city()
    {
    //     // echo "hii";
        
        
        $con_name = $this->request->getPost('con_name');
        
        $city_name = $this->request->getPost('city_name');
        
        $city_check = $this->CityModel->where('CityName',$city_name)->first();
        
        if($city_check){
                echo 2;
            }
            else{
       
            $data_insert=[
                 'StateID'	=>	$this->request->getVar('con_name'),
                 'CityName'	=>	$this->request->getVar('city_name'),
            ];
            // print_r($data_insert);
            // die;
 
            $user_data = $this->CityModel->insert( $data_insert);
            if($user_data) {
                echo 1;
            }
            else
            {
                echo 0;
            }
    }
    
    }
    
     public function edit_city($id)
    {
        $data['singlstatedata'] = $this->StateModel->findAll();
        
         $data['singlcitydata'] = $this->CityModel->where('CityID',$id)->first();
        //  print_r($data['singlebannersdata']);
        
        // $data['allcategorydata'] = $this->catagory->findAll();
            return view('edit_city',$data);
    }
    
    
     public function update_city()
    {
        // echo "hii";
        
        // print_r($_POST);
        
          $city_id = $this->request->getPost('city_id');
        // print_r($banner_id);
          $con_name = $this->request->getPost('con_name');
          
          $city_name = $this->request->getPost('city_name');
            
        $city_check = $this->CityModel->where('CityName',$city_name)->first();
        
        if($city_check){
                echo 2;
            }
            else{

            $data_update=[
                 'StateID'	=>	$this->request->getVar('con_name'),
                 'CityName'	=>	$this->request->getVar('city_name'),
            ];
    
            // print_r($data_update);
            // die;
    
           
        $user_data = $this->CityModel->update($city_id, $data_update);
            if($user_data) {
                echo 1;
            }
            else
            {
                echo 0;
    
            }
    }
    }
    
    
        public function del_city(){
        //  echo "hii";
        
        $city_id=$this->request->getPost('city_ids');
        $this->CityModel->where('CityID', $city_id);
        
        $delete=$this->CityModel->delete(); 
       
       
            if($delete){
               
                echo 1;
            }else{
                echo 0;
            }
   
          }
    
}
?>