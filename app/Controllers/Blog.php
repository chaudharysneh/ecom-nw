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
use App\Models\CmsModel;
use App\Models\Variationmodel;
use App\Models\Wishlistmodel;
use App\Models\User_shipping_addressmodel;
use App\Models\tagsmodel;
use App\Models\BlogcommentModel;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php'; 
require 'PHPMailer/src/PHPMailer.php'; 
require 'PHPMailer/src/SMTP.php'; 



class Blog extends BaseController
{
    protected $Categorymodel;
    protected $Subcategorymodel;
    protected $Bannersmodel;
    protected $Settings;
    protected $Productmodel;
    protected $BlogModel;
    protected $CountryModel;
    protected $StateModel;
    protected $CityModel;
    protected $UserModel;
    protected $CmsModel;
    protected $Variationmodel;
    protected $Wishlistmodel;
    protected $User_shipping_addressmodel;
    protected $tagsmodel;
    protected $BlogcommentModel;

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
        $this->CmsModel = new CmsModel($db);
        $this->Variationmodel = new Variationmodel($db);
        $this->Wishlistmodel = new Wishlistmodel($db);
         $this->tagsmodel = new tagsmodel($db);
        $this->BlogcommentModel = new BlogcommentModel($db);
        $this->User_shipping_addressmodel = new User_shipping_addressmodel($db);
         $this->session = \Config\Services::session();
         
    }
    
    public function index($categoryname, $title, $id, $category_id)
    {
        $blog_id = base64_decode($id);
        $cat_id = base64_decode($category_id);
    
        // Retrieve category data with blog join
        $data['catdata'] = $this->Categorymodel->join('blog', 'blog.category = categories.CategoryID')
                                               ->groupBy('blog.category')
                                               ->findAll();
    
        // Prepare subcategory data for each category
        $data['subdata'] = [];
        foreach($data['catdata'] as $cat) {
            $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])
                                                    ->get()
                                                    ->getResult('array');
            $data['subdata'][$cat['CategoryID']] = $subcategories;
        }
    
        // Fetch the blogs in the current category (limit to 3)
        $data['category_blog_data'] = $this->BlogModel
            ->select('blog_comment.*, blog.id, blog.title, blog.image, blog.description, blog.created_at, blog.category')
            ->join('blog_comment', 'blog_comment.blog_id = blog.id', 'left')
            ->where('blog.category', $cat_id)
            ->orderBy('blog.id', 'DESC')
            ->groupBy('blog.id')
            ->findAll(3);
    
        // Fetch the latest single blog entry for the category
        $data['single_blog_data'] = $this->BlogModel
            ->join('categories', 'blog.category = categories.CategoryID')
            ->where('blog.category', $cat_id)
            ->orderBy('blog.created_at', 'DESC')
            ->first();
    
        // Fetch the user data of the blog creator
        $admin_id = $data['single_blog_data']['created_by'];
        $data['user_dt'] = $this->UserModel->where('UserID', $admin_id)->first();
    
        // Fetch other blogs excluding the current blog (limit to 3)
        $current_blog_id = $data['single_blog_data']['id'];
        $data['all_blog_data'] = $this->BlogModel
            ->select('blog_comment.*, blog.id, blog.title, blog.image, blog.description, blog.created_at')
            ->join('blog_comment', 'blog_comment.blog_id = blog.id', 'left')
            ->where('blog.id !=', $current_blog_id)
            ->orderBy('blog.created_at', 'DESC')
            ->findAll(3);
    
        // Fetch all comments and count for the current blog
        $data['all_comment_data'] = $this->BlogcommentModel
            ->where('blog_id', $current_blog_id)
            ->findAll();
    
        $data['all_comment_count'] = $this->BlogcommentModel
            ->where('blog_id', $current_blog_id)
            ->countAllResults();
    
        // Load the blog view with all collected data
        return view('blog', $data);
    }


    public function get_blog($name,$id, $catagory_id = null,$category=null)
    {
        if(!empty($name) && !empty($id) && empty($category) && empty($catagory_id)) {
            
        
        $id= base64_decode($id);
     
        $data['catdata'] = $this->Categorymodel->join('blog','blog.category = categories.CategoryID')->groupBy('blog.category')->findAll();
        
         $data['subdata']=[];
        foreach($data['catdata'] as $cat)
        {
            //$data['subdata']=$this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $data['subdata'][$cat['CategoryID']] = $subcategories;
        }
        
$data['single_blog_data'] = $this->BlogModel->join('categories','blog.category = categories.CategoryID')->where('blog.category',$id)->orderBy('blog.created_at', 'DESC')->first();

$data['catagory_blog_data'] = $this->BlogModel->select('blog_comment.*,blog.id,blog.title,blog.image,blog.description,blog.created_at,blog.category')->join('blog_comment','blog_comment.blog_id = blog.id','left')->where('blog.category', $id)
->groupBy('blog_comment.blog_id')
->orderBy('blog.id', 'DESC')

->findAll(3);

$admin_id = $data['single_blog_data']['created_by'];
$data['user_dt'] = $this->UserModel->where('UserID',$admin_id)->first();
$blog_id = $data['single_blog_data']['id'];
$blogdata = $data['single_blog_data']['tags'];
$blogname = json_decode($blogdata);

$data['tag_data'] = $this->tagsmodel
    ->select('tagid, tagname')
    ->whereIn('tagid', $blogname)
    ->get()
    ->getResultArray();


// $data['all_blog_data'] = $this->BlogModel->select('blog_comment.*,blog.id,blog.title,blog.image,blog.description,blog.created_at')->join('blog_comment','blog_comment.blog_id = blog.id','left')->where('blog.id !=', $blog_id)->findAll(3);
// // print_r($data['all_blog_data']);
$data['all_blog_data'] = $this->BlogModel->select('blog_comment.*,blog.id,blog.title,blog.image,blog.description,blog.created_at')->join('blog_comment','blog_comment.blog_id = blog.id','left')->where('blog.id !=', $blog_id)->orderBy('blog.created_at')->findAll(3);
// echo $this->BlogModel->getLastQuery();
// print_r($data['all_blog_data']);


$data['all_tag_data'] = $this->tagsmodel->findAll();

$data['all_comment_data'] = $this->BlogcommentModel->where('blog_id', $blog_id)->findAll();
// print_r($data['all_comment_data']);
$data['all_comment_count'] = $this->BlogcommentModel->where('blog_id', $blog_id)->countAllResults();
}
else {
     $blog_id= base64_decode($id);
     $cat_id = base64_decode($catagory_id);
     
        $data['catdata'] = $this->Categorymodel->join('blog','blog.category = categories.CategoryID')->groupBy('blog.category')->findAll();
         $data['subdata']=[];
        foreach($data['catdata'] as $cat)
        {
            //$data['subdata']=$this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $data['subdata'][$cat['CategoryID']] = $subcategories;
        }
        
$data['single_blog_data'] = $this->BlogModel->join('categories','blog.category = categories.CategoryID')->where('blog.id',$blog_id)->first();
// print_r($data['single_blog_data']);
// die;

// $data['catagory_blog_data'] = $this->BlogModel->select('blog_comment.*,blog.id,blog.title,blog.image,blog.description,blog.created_at,blog.category')->join('blog_comment','blog_comment.blog_id = blog.id','left')
// ->where('blog.id',$blog_id)
// // ->groupBy('blog_comment.blog_id')
// ->orderBy('blog.created_at', 'DESC')->findAll(3);
// echo $this->BlogModel->getLastQuery();
// $data['catagory_blog_data'] = $this->BlogModel->select('blog_comment.*,blog.id,blog.title,blog.image,blog.description,blog.created_at,blog.category')->join('blog_comment','blog_comment.blog_id = blog.id','left')->where('blog.category', $cat_id)
// ->groupBy('blog_comment.blog_id')
// ->orderBy('blog.id', $blog_id)->findAll(3);


$data['catagory_blog_data'] = $this->BlogModel->select('blog_comment.*,blog.id,blog.title,blog.image,blog.description,blog.created_at,blog.category')->join('blog_comment','blog_comment.blog_id = blog.id','left')->where('blog.category',$cat_id)->orderBy('blog.id', $blog_id)->groupBy('blog.id',$blog_id)->findAll(3);
// print_r($data['catagory_blog_data']);
// die;

$admin_id = $data['single_blog_data']['created_by'];
$data['user_dt'] = $this->UserModel->where('UserID',$admin_id)->first();
$blog_id = $data['single_blog_data']['id'];
$blogdata = $data['single_blog_data']['tags'];
$blogname = json_decode($blogdata);

$data['tag_data'] = $this->tagsmodel
    ->select('tagid, tagname')
    ->whereIn('tagid', $blogname)
    ->get()
    ->getResultArray();

// print_r($data['tag_data']);
// die;

//$data['all_blog_data'] = $this->BlogModel->select('blog_comment.*,blog.id,blog.title,blog.image,blog.description,blog.created_at')->join('blog_comment','blog_comment.blog_id = blog.id','left')->where('blog.id !=', $blog_id)->findAll(3);
// print_r($data['all_blog_data']);

$data['all_blog_data'] = $this->BlogModel->select('blog_comment.*,blog.id,blog.title,blog.image,blog.description,blog.created_at')->join('blog_comment','blog_comment.blog_id = blog.id','left')->where('blog.id !=', $blog_id)->orderBy('blog.created_at')->findAll(3);
// echo $this->BlogModel->getLastQuery();
// print_r($data['all_blog_data']);


$data['all_tag_data'] = $this->tagsmodel->findAll();

$data['all_comment_data'] = $this->BlogcommentModel->where('blog_id', $blog_id)->findAll();
// print_r($data['all_comment_data']);
$data['all_comment_count'] = $this->BlogcommentModel->where('blog_id', $blog_id)->countAllResults();
    
    
}

return view('blog',$data);
        
    }
    
    
    public function get_tag_dtt($id)
    {
        $id= base64_decode($id);
     
    $data['catdata'] = $this->Categorymodel->join('blog','blog.category = categories.CategoryID')->groupBy('blog.category')->findAll();
         $data['subdata']=[];
        foreach($data['catdata'] as $cat)
        {
            //$data['subdata']=$this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $data['subdata'][$cat['CategoryID']] = $subcategories;
        }
        
$data['single_blog_data'] = $this->BlogModel
    ->join('categories', 'blog.category = categories.CategoryID', 'right')
    ->like('blog.tags', "\"$id\"", 'both')  // Assuming $id is a string
    ->orderBy('blog.created_at', 'DESC')
    ->first();


$data['catagory_blog_data'] = $this->BlogModel->select('blog_comment.*,blog.id,blog.title,blog.image,blog.description,blog.created_at')->join('blog_comment','blog_comment.blog_id = blog.id','left')->like('blog.tags', "\"$id\"", 'both')  // Assuming $id is a string
    ->orderBy('blog.created_at', 'DESC')->findAll(3);
// print_r($data['catagory_blog_data']);
// die;



$admin_id = $data['single_blog_data']['created_by'];
$data['user_dt'] = $this->UserModel->where('UserID',$admin_id)->first();
$blog_id = $data['single_blog_data']['id'];
$blogdata = $data['single_blog_data']['tags'];
$blogname = json_decode($blogdata);

$data['tag_data'] = $this->tagsmodel
    ->select('tagid, tagname')
    ->whereIn('tagid', $blogname)
    ->get()
    ->getResultArray();

// print_r($data['tag_data']);
// die;

//$data['all_blog_data'] = $this->BlogModel->select('blog_comment.*,blog.id,blog.title,blog.image,blog.description,blog.created_at')->join('blog_comment','blog_comment.blog_id = blog.id','left')->where('blog.id !=', $blog_id)->findAll(3);
// print_r($data['all_blog_data']);
$data['all_blog_data'] = $this->BlogModel->select('blog_comment.*,blog.id,blog.title,blog.image,blog.description,blog.created_at')->join('blog_comment','blog_comment.blog_id = blog.id','left')->where('blog.id !=', $blog_id)->orderBy('blog.created_at')->findAll(3);
// echo $this->BlogModel->getLastQuery();
// print_r($data['all_blog_data']);


$data['all_tag_data'] = $this->tagsmodel->findAll();

$data['all_comment_data'] = $this->BlogcommentModel->where('blog_id', $blog_id)->findAll();
// print_r($data['all_comment_data']);
$data['all_comment_count'] = $this->BlogcommentModel->where('blog_id', $blog_id)->countAllResults();

return view('blog',$data);
        
    }
    

    public function all_blog($category=null, $cat_id=null) {
            
       if(!empty($cat_id) && !empty($category))
       {
            
            $cat_id= base64_decode($cat_id);
           
        $session = session();
        $user_id = $session->get('user_id');
        $currentPage = (int) $this->request->getGet('page') ?: 1;
$perPage = 9;
$offset = ($currentPage - 1) * $perPage;

       
        $data['category'] = $this->Categorymodel
             ->join('products','products.CategoryID = categories.CategoryID')
             ->groupBy('products.CategoryID')
            ->where('ParentCategoryID', '0')
            ->findAll();
        //$catprod=[];
        $data['prod'] = [];
      
        foreach($data['category'] as $key=>$cat)    
        {
            $products = $this->Productmodel->where('CategoryID', $cat['CategoryID'])->get()->getResult('array');
            $data['prod'][$cat['CategoryID']] = $products;
            foreach($products as $varia)
            {
                $data['varia_dt'] = $this->Variationmodel->where('ProductID',$varia['ProductID'])->get()->getResult('array');
            }
        }
       // print_r($data['varia_dt']);
        $data['banner'] = $this->Bannersmodel->findAll();
        $data['product'] = $this->Productmodel->findAll();
        $data['allproduct'] = $this->Productmodel->findAll();
       
        // print_r($data['allproduct']);
        
        foreach($data['allproduct'] as $allprd)
        {
            $data['customers']=$this->Wishlistmodel->where('UserID', $user_id)->where('ProductID',$allprd['ProductID'])->first();
        }
          $data['all_cms_data'] = $this->CmsModel->findAll();
        // print_r($data['all_cms_data']);
        // die;
        $data['blog'] = $this->BlogModel->orderBy('id', 'desc')->findAll(3);
        
        $data['catdata'] = $this->Productmodel
             ->join('categories','categories.CategoryID = products.CategoryID')
              ->join('subcategory','subcategory.sub_category_id = products.SubCategoryID')
             ->groupBy('products.CategoryID')
            ->where('ParentCategoryID', '0')
            ->findAll();
     
        $data['subdata']=[];
        foreach($data['catdata'] as $cat)
        {
            $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $data['subdata'][$cat['CategoryID']] = $subcategories;
         
        }
       
         $data['user_id'] = $user_id;
        

$totalItems = $this->BlogModel
    ->select('blog_comment.blog_id')
    ->join('blog_comment', 'blog_comment.blog_id = blog.id', 'left')
    ->groupBy('blog_comment.blog_id')
    ->countAllResults();

$totalPages = ceil($totalItems / $perPage);

$data['all_blog_data'] = $this->BlogModel
    ->select('blog_comment.*, blog.id, blog.title, blog.image, blog.description, blog.created_at, blog.category', 'left')
    ->join('blog_comment', 'blog_comment.blog_id = blog.id', 'left')
    ->where('blog.category', $cat_id)
    ->groupBy('blog_comment.blog_id')  // Move the groupBy clause here
    ->orderBy('blog.created_at','DESC')
    ->limit($perPage, $offset)
    ->findAll();
  

$data['totalPages'] = $totalPages;
$data['currentPage'] = $currentPage ;


            
            
        }
     
        else  {
         
        $session = session();
        $user_id = $session->get('user_id');
       
        // echo $user_id;
        
        // $data['all_product_data'] = $this->Productmodel->join('variations','variations.ProductID = products.ProductID')->where('products.ProductID',$id)->first();
        $data['category'] = $this->Categorymodel
             ->join('products','products.CategoryID = categories.CategoryID')
             ->groupBy('products.CategoryID')
            ->where('ParentCategoryID', '0')
            ->findAll();
        //$catprod=[];
        $data['prod'] = [];
      
        foreach($data['category'] as $key=>$cat)    
        {
            $products = $this->Productmodel->where('CategoryID', $cat['CategoryID'])->get()->getResult('array');
            $data['prod'][$cat['CategoryID']] = $products;
            foreach($products as $varia)
            {
                $data['varia_dt'] = $this->Variationmodel->where('ProductID',$varia['ProductID'])->get()->getResult('array');
            }
        }
       // print_r($data['varia_dt']);
        $data['banner'] = $this->Bannersmodel->findAll();
        $data['product'] = $this->Productmodel->findAll();
        $data['allproduct'] = $this->Productmodel->findAll();
       
        // print_r($data['allproduct']);
        
        foreach($data['allproduct'] as $allprd)
        {
            $data['customers']=$this->Wishlistmodel->where('UserID', $user_id)->where('ProductID',$allprd['ProductID'])->first();
        }
          $data['all_cms_data'] = $this->CmsModel->findAll();
        // print_r($data['all_cms_data']);
        // die;
        $data['blog'] = $this->BlogModel->orderBy('id', 'desc')->findAll(3);
      
                  $data['catdata'] = $this->Categorymodel->join('blog','blog.category = categories.CategoryID')->groupBy('blog.category')->findAll();
            
        $data['subdata']=[];
        foreach($data['catdata'] as $cat)
        {
            $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $data['subdata'][$cat['CategoryID']] = $subcategories;
          
        }
         $data['user_id'] = $user_id;
        
  
   

$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$perPage = 9;
$offset = ($currentPage - 1) * $perPage;

$data['all_blog_data'] = $this->BlogModel
    ->select('blog.id as blg_id, blog.title, blog.image, blog.description, blog.category, blog.tags, blog.created_by, blog_comment.id as comment_id, blog_comment.*')
    ->join('blog_comment', 'blog_comment.blog_id = blog.id', 'left')
    ->groupBy('blog.id')
    ->orderBy('blog.created_at', 'DESC')
    ->findAll($perPage, $offset);
//  $lastQuery = $this->BlogModel->getLastQuery();
// echo $lastQuery;die;
    


$totalItems = $this->BlogModel
   
    ->countAllResults();

$totalPages = ceil($totalItems / $perPage);


$data['totalPages'] = $totalPages;
$data['currentPage'] = $currentPage ;

        }
    // print_r($data['all_blog_data']);die;
    
      return view('all_blog', $data);
        }
        
    
    public function send_comment_data()
    {
     
     $comm_id = $this->request->getPost('comm_id');
     $name = $this->request->getPost('name');
      $email = $this->request->getPost('email');
       $message = $this->request->getPost('message');
       
       $add_comment_data = [
           'blog_id' =>$comm_id,
           'comments' => $message,
           'name' => $name,
            'email' => $email,
           
           ];      
           
           $add_data = $this->BlogcommentModel->insert($add_comment_data);
           
           if($add_data)
           {
               echo 1;
           }
           else {
               echo 0;
           }
           
       
}

}
