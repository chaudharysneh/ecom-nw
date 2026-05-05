<?php

namespace App\Controllers;
use App\Models\BlogModel;
use App\Models\catagorymodel;
use App\Models\tagsmodel;
 


class Blog extends BaseController
{
    
     public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        $db = \Config\Database::connect();
        $this->BlogModel = new BlogModel($db);
         $this->catagory = new catagorymodel($db);
        $this->tagsmodel = new tagsmodel($db);

    }
    
    public function all_blog()
    {
        $data['allblogsdata'] = $this->BlogModel
            ->select('blog.*, categories.CategoryName') // Select necessary columns
            ->join('categories', 'categories.CategoryID = blog.category')
            ->orderBy('blog.created_at', 'DESC') // Replace 'created_at' with the column you want to order by
            ->findAll();
    
        $data['allcategorydata'] = $this->catagory->findAll();
        
        return view('all_blog', $data);
    }
    

    public function add_blog()
    {
        $data['allcategorydata'] = $this->catagory->findAll();
        // print_r($data['allcategorydata']);
        $data['tags']=$this->tagsmodel->findAll();
        return view('add_blog',$data);
    }
    
     public function save_blog()
    {
        // echo "hii";
         $session = session();

        $id = $session->get('admin_id');
        // print_r($id); die;
         $file_image = $this->request->getFile('blog_image');
 
         $bannerimg = "";

        if(isset($_FILES['blog_image']['name']) && !empty($_FILES['blog_image']['name'])){

            $fileName = $file_image->getRandomName();

            $file_image->move('public/upload_images', $fileName);
            $blogimg=$fileName;
        }
        
        else{
            $blogimg = "18.jpg";
        }
        
        
        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');
        $category_type = $this->request->getPost('category_type');
        $tags = $this->request->getPost('tags1');
        $createdby = $this->request->getPost('createdby');
    
        $tag_string='';
                if(!empty($tags)) {
                     $tag_string = json_encode($tags);
                }else{
                    $tag_string = NULL;
                }

        $data = $this->BlogModel->where('title', $title)->first();

            $data_insert=[
                 'title'	=>	$this->request->getVar('title'),
                 'image'	=>	$blogimg,
                 'description'	=>	$this->request->getPost('description'),
                 'category'	=>	$this->request->getPost('category_type'),
                 'tags' => $tag_string,
                 'created_by' => $id
                 
                 
            ];
            // print_r($data_insert);
            // die;
 
            $user_data = $this->BlogModel->insert( $data_insert);
            if($user_data) {
                echo 1;
            }
            else
            {
                echo 0;
            }
    }
     public function edit_blog($id)
    {
         $data['singleblogdata'] = $this->BlogModel->where('id',$id)->first();
        //  print_r($data['singleblogdata']['tags']); die;
         $data['tags']=$this->tagsmodel->findAll();
        $data['allcategorydata'] = $this->catagory->findAll();
            return view('edit_blog',$data);
    }
    
    
     public function update_blog()
    {
        // echo "hii";
        
        // print_r($_POST);
        $session = session();

        $id = $session->get('admin_id');
        
          $banner_id = $this->request->getPost('blog_id');
        // print_r($banner_id);
        $title = $this->request->getPost('title');
        $description = $this->request->getPost('description');
        $category_type = $this->request->getPost('category_type');
        
         $old_image = $this->request->getPost('old_image');
         $tags = $this->request->getPost('tags1');
        //  print_r($tags); die;
       $tag_string='';
                if(!empty($tags)) {
                     $tag_string = json_encode($tags);
                }else{
                    $tag_string = NULL;
                }


        
        
         $file_image = $this->request->getFile('blog_image');
        // $fileName = $file_image->getRandomName();
        // $file_image->move('public/upload_images', $fileName);
        $bannerimg = "";

        if(isset($_FILES['blog_image']['name']) && !empty($_FILES['blog_image']['name'])){

            $fileName = $file_image->getRandomName();

            $file_image->move('public/upload_images', $fileName);
            $blogimg=$fileName;
        }
        else{
            $blogimg = $old_image;
        }

            $data_update=[
                 'title'	=>	$this->request->getVar('title'),
                 'image'	=>	$blogimg,
                 'description'	=>	$this->request->getPost('description'),
                 'category'	=>	$this->request->getPost('category_type'),
                 'tags' => $tag_string,
                 'created_by' => $id
                 
                 
            ];
    
            // print_r($data_update);
            // die;
    
           
        $user_data = $this->BlogModel->update($banner_id, $data_update);
            if($user_data) {
                echo 1;
            }
            else
            {
                echo 0;
    
            }
    }
    
    
     public function del_blog(){
        //  echo "hii";
        
        $blog_id=$this->request->getPost('blog_ids');
        $this->BlogModel->where('id', $blog_id);
        
        $delete=$this->BlogModel->delete(); 
       
       
            if($delete){
               
                echo 1;
            }else{
                echo 0;
            }
   
          }
    
}
?>

