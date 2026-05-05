<?php
namespace App\Controllers\api;

use App\Models\Categorymodel;
use App\Models\Subcategorymodel;
use App\Models\Productmodel;
use App\Models\Wishlistmodel;
use App\Models\CartModel;
class Category extends BaseController
{
    protected $Categorymodel;
    protected $Subcategorymodel;
    protected $Productmodel;
    protected $Wishlistmodel;
    protected $CartModel;

    public function __construct()
    {
        $this->profileImagePath = base_url('admin/public/upload_images/');
        $this->productImagePath = base_url('admin/public/assets/img/product_images/');
        
        $db = \Config\Database::connect();
        $this->Categorymodel = new Categorymodel($db);
        $this->Subcategorymodel = new Subcategorymodel($db);
        $this->Productmodel = new Productmodel($db);
        $this->Wishlistmodel = new Wishlistmodel($db);
        $this->CartModel = new CartModel($db);
    }
    
    public function allCategory()
    {
        $categories = $this->Categorymodel->select("CategoryID,CONCAT('" . $this->profileImagePath . "', Catagoryimage) AS Catagoryimage,CategoryName,CategoryDesc")->where("ProductLive",1)->findAll();
        
        foreach($categories as $categorie){
            $subCategories1 = $this->Subcategorymodel->select("sub_category_id,category_id,sub_category")->where("category_id",$categorie['CategoryID'])->first();
            if(!empty($subCategories1)){
                $subCategories[] =$subCategories1;
            }
        }
        return json_encode(array("status"=>'success',"message"=>"All categories.","categories"=>$categories,"subCategories"=>$subCategories));
    }
    
    public function category()
    {
        $categories = $this->Categorymodel->select("CategoryID,CONCAT('" . $this->profileImagePath . "', Catagoryimage) AS Catagoryimage,CategoryName,CategoryDesc")->where("ProductLive",1)->findAll();
        
        return json_encode(array("status"=>'success',"message"=>"Main categories only.","categories"=>$categories));
    }
    
    public function subCategory()
    {
        $categoryID = $this->request->getPost("categoryID");
        if(!$categoryID){ return json_encode(array("status"=>"fail","message"=>"categoryID is required")); }
        
        $subCategories = $this->Subcategorymodel->select("sub_category_id,category_id,sub_category,CONCAT('" . $this->profileImagePath . "', sub_category_img) AS sub_category_img")->where("category_id",$categoryID)->findAll();
       
        return json_encode(array("status"=>'success',"message"=>"Sub category main category wise.","subCategories"=>$subCategories));
    }
    
    public function category_wice_product(){
        $category_id =  $this->request->getPost('category_id');
        $user_id = $this->request->getPost('user_id');
        if (!$category_id) {
            return json_encode(array("status" => "fail", "message" => "category_id is required."));
        }
        $product_data=$this->Productmodel->where('CategoryID',$category_id)->where('ProductLive',1)->findAll();
        if($product_data){
             foreach($product_data as $key=>$single_product){
            $product_img= json_decode($single_product['ProductImage']);
            $product_image=$product_img[0];
            $product_data[$key]['product_image1']=$this->productImagePath.$product_image;
            $product_id=$single_product['ProductID'];
            $wishlish_data=$this->Wishlistmodel->where('ProductID',$product_id)->where('UserID',$user_id)->first();
                if($wishlish_data){
                    $product_data[$key]['wishlist']= 1;
                }else{
                    $product_data[$key]['wishlist']= 0;
                }
                 $cart_data=$this->CartModel->where('product_id',$product_id)->where('user_id',$user_id)->first();   
                if($cart_data){
                    $product_data[$key]['incart']= 1;
                }else{
                    $product_data[$key]['incart']= 0;
                }
            }
             return json_encode(array("status"=>'success',"categories_wise_product"=>$product_data));
            
        }else{
            return json_encode(array("status" => 'fail', "message" => "results not found","categories_wise_product"=>[]));
        }
        
    }
    public function subcategory_wice_product(){
         $category_id =  $this->request->getPost('category_id');
         $subcategory_id=$this->request->getPost('subcategory_id');
          $user_id = $this->request->getPost('user_id');
         if (!$category_id) { 
            return json_encode(array("status" => "fail", "message" => "category_id is required."));
        }
        if (!$subcategory_id) {
            return json_encode(array("status" => "fail", "message" => "subcategory_id is required."));
        }
        
        $product_data=$this->Productmodel->where('CategoryID',$category_id)->where('SubCategoryID',$subcategory_id)->where('ProductLive',1)->findAll();
        if($product_data){
            foreach($product_data as $key=>$single_product){
            $product_img= json_decode($single_product['ProductImage']);
            $product_image=$product_img[0];
            $product_data[$key]['product_image1']=$this->productImagePath.$product_image;
             $product_id=$single_product['ProductID'];
            $wishlish_data=$this->Wishlistmodel->where('ProductID',$product_id)->where('UserID',$user_id)->first();
                if($wishlish_data){
                    $product_data[$key]['wishlist']= 1;
                }else{
                    $product_data[$key]['wishlist']= 0;
                }
                 $cart_data=$this->CartModel->where('product_id',$product_id)->where('user_id',$user_id)->first();   
                if($cart_data){
                    $product_data[$key]['incart']= 1;
                }else{
                    $product_data[$key]['incart']= 0;
                }
            }
             return json_encode(array("status"=>'success',"subcategories_wise_product"=>$product_data));
        }else{
            return json_encode(array("status" => 'fail', "message" => "results not found","subcategories_wise_product"=>[]));
        }
    }
}