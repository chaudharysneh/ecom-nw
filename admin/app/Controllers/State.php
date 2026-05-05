<?php

namespace App\Controllers;
use App\Models\BlogModel;
use App\Models\CountryModel;
use App\Models\StateModel;



class State extends BaseController
{
    
     public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        $db = \Config\Database::connect();
        $this->BlogModel = new BlogModel($db);
        $this->CountryModel = new CountryModel($db);
        $this->StateModel = new StateModel($db);
        

    }
    
     public function all_state()
    {
        $data['allstatedata'] = $this->StateModel->orderby('StateID','desc')->findAll();

        $data['allcountrydata'] = $this->CountryModel->findAll();
        
        // print_r($data['allcategorydata']);
        
      
        return view('all_state',$data);
    }

    public function add_state()
    {
        $data['allcountryydata'] = $this->CountryModel->findAll();
        
         $data['allstatsedata'] = $this->StateModel->findAll();
        // print_r($data['allcategorydata']);
        
        return view('add_state',$data);
    }
    
    
     public function save_state()
    {
        // echo "hii";
        
        
        $con_name = $this->request->getPost('con_name');
        
        $state_name = $this->request->getPost('state_name');
        
        $state_check = $this->StateModel->where('StateName',$state_name)->first();
        
        if($state_check){
            echo 2;
        }else{
        
            $data_insert=[
                 'CountryID'	=>	$this->request->getVar('con_name'),
                 'StateName'	=>	$this->request->getVar('state_name'),
            ];
            //  print_r($data_insert);die;
 
            $user_data = $this->StateModel->insert( $data_insert);
            if($user_data) {
                echo 1;
            }
            else
            {
                echo 0;
            }
    }
}
    
    
    
     public function edit_state($id)
    {
        $data['allstatedata'] = $this->CountryModel->findAll();
        
         $data['singlstatedata'] = $this->StateModel->where('StateID',$id)->first();
        //  print_r($data['singlebannersdata']);
        
        // $data['allcategorydata'] = $this->catagory->findAll();
            return view('edit_state',$data);
    }
    
    
     public function update_state()
    {
        // echo "hii";
        
        // print_r($_POST);
        
          $state_id = $this->request->getPost('state_id');
        // print_r($banner_id);
          $con_name = $this->request->getPost('con_name');
          
          $state_name = $this->request->getPost('state_name');
        
          $state_check = $this->StateModel->where('StateName',$state_name)->first();
        
        if($state_check){
            echo 2;
        }else{

            $data_update=[
                 'CountryID'	=>	$this->request->getVar('con_name'),
                 'StateName'	=>	$this->request->getVar('state_name'),
            ];
    
            // print_r($data_update);
            // die;
    
           
        $user_data = $this->StateModel->update($state_id, $data_update);
            if($user_data) {
                echo 1;
            }
            else
            {
                echo 0;
    
            }
    }
    }
    
    
     public function del_state(){
        //  echo "hii";
        
        $state_id=$this->request->getPost('state_ids');
        $this->StateModel->where('StateID', $state_id);
        
        $delete=$this->StateModel->delete(); 
       
       
            if($delete){
               
                echo 1;
            }else{
                echo 0;
            }
   
          }
    
}
?>