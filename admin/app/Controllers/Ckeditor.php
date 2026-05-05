<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Ckeditor extends Controller
{
    // public function create()
    // {
    //     // Handle the post creation logic here
    //     $content = $this->request->getPost('content');

    //     return $this->response->setJSON(['success' => true]);
    // }
    
    public function upload_image_old()
    {
        // echo "hii";
        $file = $this->request->getFile('upload');
        // print_r($file);

        // if ($file->isValid() && !$file->hasMoved()) {
            if(isset($_FILES['upload']['name']) && !empty($_FILES['upload']['name'])) {
            // Generate a unique file name or use any desired logic
            $newName = $file->getRandomName();

            // Move the uploaded file to a desired directory
            $file->move('./uploads', $newName);
            $function_number = $_GET['CKEditorFuncNum'];
            // Get the URL of the uploaded image
            $imageUrl = base_url('uploads/' . $newName);
            $message = "";
            echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$imageUrl', '$message');</script>";
        
        } 
        
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
            return $this->response->setJSON(['url' => $imageUrl]);
            
        }

        // Return an error JSON response if the image upload fails
        return $this->response->setJSON(['error' => ['message' => 'Image upload failed']]);
    }
}
