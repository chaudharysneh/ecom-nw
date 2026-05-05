<?php

namespace App\Controllers;
use App\Models\Categorymodel;
use App\Models\Productmodel;
use App\Models\Variationmodel;
use App\Models\variationtypemodel;
use App\Models\Optionmodel;
use App\Models\VariationsDetails;
use App\Models\CountryModel;
use App\Models\StateModel;
use App\Models\Wishlistmodel;
use App\Models\Template;

class Templates extends BaseController
{
    public function index(){

    }
    public function uploadTemplateImage(){
        
        $UserID = null;
        $image = $this->request->getFile('image');
        $productId = $this->request->getPost('productId');
        $type = $this->request->getPost('type');
       
        if ($image->isValid() && !$image->hasMoved()) {
            $mimeType = $image->guessExtension();
            $Template = new Template();
            $newName = $image->getRandomName();
            
            $image->move('./admin/public/assets/templates', $newName);
            $imagePath = 'admin/public/assets/templates/' . $newName;

            $sessionId = session('userSessionId');

            if ($sessionId) {
                // Session variable exists, retrieve its value
                $uniqueId = $sessionId;
            } else {
                // Session variable does not exist, create a new one
                $uniqueId = uniqid();
                session()->set('userSessionId', $uniqueId);
            }
            // Store the unique ID and image path in session
            $data = ['image' => $imagePath, 'UserID'=>$UserID, 'mime_type'=>$mimeType, 'type'=>$type , 'productId'=>$productId ,'session'=>$sessionId];
            $Template->insert($data);
            
            return $this->response->setJSON(['success' => true,'data'=>$data]);
          }
          return $this->response->setJSON(['success' => false, 'error' => 'Invalid file.']);
    }
    public function deleteTemplate(){
        $template_id = $this->request->getPost('template_id');
        if($template_id!=""){
            $Template = new Template();
            $Template->delete($template_id);
            return $this->response->setJSON(['success' => true,'msg'=>'delet successful']);
        }
        return $this->response->setJSON(['success' => false, 'error' => 'Invalid file.']);
        
        
    }
    
}