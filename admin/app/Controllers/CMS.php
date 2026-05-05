<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CmsModel;
use App\Models\Cmsfaqsmodel;



class CMS extends Controller
{

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        $db = \Config\Database::connect();
        $this->Cms = new CmsModel($db);
        $this->Cmsfaqs = new Cmsfaqsmodel($db);
        // $this->Allsettings = new Allsettingsmodel($db);
             

        
        
    }
    
public function update_cms_status()
{
    $data = json_decode(file_get_contents("php://input"), true);
    $CmsID = $data['CmsID'];
    $CmsStatus = $data['CmsStatus'];

    // Using CmsModel to update the status
    $update = $this->Cms->update($CmsID, ['status' => $CmsStatus]);

    if ($update) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
}
    
    
    
     public function update_cms(){
        // print_r($_POST); 
        // die;
        $cms_id=$this->request->getpost('cmsid');
        $content = $this->request->getPost('htmlContent');
        $title = $this->request->getPost('title');
        $pageurl = $this->request->getPost('pageurl');
        $faq = $this->request->getPost('ischecked');
        $faq_question = $this->request->getPost('faq_question');
        $faq_answer = $this->request->getPost('faq_answer');
        
        
        $all_filed=[
            'CmsTitle'=> $title,
            'CmsContent'=>$content,
            'CmsUrl'=>$pageurl,
            'IsChecked'=>$faq

            ];
            // print_r($all_filed);
            // die;
       
            //  $data = $this->Cms->set($all_filed)->where('CmsID',$cms_id)->update();
                   $data = $this->Cms->update($cms_id, $all_filed);
            //  echo $this->Cms->getLastQuery();
            //  die;
            
            // print_r($data);
            // die;
         
            // if($faq==1) {
                
            $faq_que = json_encode($faq_question);
            // print_r($faq_que);
             $faq_ans = json_encode($faq_answer);
             
            //   print_r($faq_ans);
            $data_update = [
                
            'CmsID'=> $cms_id,
            'FaqQuestion'=>$faq_que,
            'FaqAnswer'=>$faq_ans

                
            ];
                
             $data=$this->Cmsfaqs->update($cms_id, $data_update);
            
            // }
            
            
            // print_r($faq_id);
            
            if($data){
                echo 1;
            }else{
                echo 0;
            }

        //return $this->response->setJSON(['success' => true]);
    }
  
    
    
     
    
    
    
   public function create()
    {
        // Handle the post creation logic here
        $content = $this->request->getPost('htmlContent') ?: 'N/A';
        $title = $this->request->getPost('title');
        $pageurl = $this->request->getPost('pageurl');
        $faq = $this->request->getPost('ischecked');
        $faq_question = $this->request->getPost('faq_question');
        $faq_answer = $this->request->getPost('faq_answer');
        


        $all_filed=[
            'CmsTitle'=> $title,
            'CmsContent'=>$content ?? 'N/A',
            'CmsUrl'=>$pageurl,
            'IsChecked'=>$faq

            ];
       
            $data=$this->Cms->insert($all_filed);
            $faq_id = $this->Cms->getInsertID();
            
            $faq_que = json_encode($faq_question);
            // print_r($faq_que);
             $faq_ans = json_encode($faq_answer);
             
            //   print_r($faq_ans);
            $data_insert = [
            'CmsID'=> $faq_id,
            'FaqQuestion'=>$faq_que,
            'FaqAnswer'=>$faq_ans

                
            ];
                
             $data=$this->Cmsfaqs->insert($data_insert);
            
            // print_r($faq_id);
            
            if($data){
                echo 1;
            }else{
                echo 0;
            }

        //return $this->response->setJSON(['success' => true]);
    }
   
    public function upload_image()
    {
        // Example image upload code
        if ($this->request->getMethod() === 'post' && !empty($_FILES)) {
            $image = $_FILES['upload'];
            
            // Specify the upload path
            $uploadPath = './uploads/';
            
            // Generate a unique filename
            $filename = uniqid() . '_' . $image['name'];
            
            // Move the uploaded file to the desired location
            move_uploaded_file($image['tmp_name'], $uploadPath . $filename);
            
            // Get the URL of the uploaded image
            $imageUrl = base_url('uploads/' . $filename);
            
            // Return the image URL as a JSON response
            //return $this->response->setJSON(['url' => $imageUrl]);
            $function_number = $_REQUEST['CKEditorFuncNum'];
            
            $message = "Image upload successfully";
            echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$imageUrl', '$message');</script>";
        }

        // Return an error JSON response if the image upload fails
        return $this->response->setJSON(['error' => ['message' => 'Image upload failed']]);
    }
}
