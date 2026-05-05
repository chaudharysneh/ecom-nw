<?php

namespace App\Controllers;
use App\Models\catagorymodel;
use App\Models\variationmodel;
use App\Models\variationtypemodel;
use App\Models\VariationValue;
use App\Models\subcategorymodel;
use App\Models\productmodel;
use App\Models\tagsmodel;
use App\Models\shippingmethodmodel;
use App\Models\optionvaluemodel;
use App\Models\BrandModel;
use App\Models\Allsettingsmodel;
use App\Models\VariationsDetail;
use App\Models\Orderitemmodel;
use App\Models\Ordermodel;
use App\Models\CartModel;
use App\Models\Reviewmodel;
use App\Models\TaxesclassModel;
use App\Models\CmsModel;



class Products extends BaseController
{

    public function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();
        $db = \Config\Database::connect();
        $this->catagory = new catagorymodel($db);
        $this->variation = new variationmodel($db);
        $this->variationtype= new variationtypemodel($db);
        $this->subcategory= new subcategorymodel($db);
        $this->product= new productmodel($db);
        $this->tags= new tagsmodel($db);
        $this->shippingmethod= new shippingmethodmodel($db);
        $this->optionvalue= new optionvaluemodel($db);
        $this->brand = new BrandModel($db);
        $this->Allsettings = new Allsettingsmodel($db);
        $this->Orderitemmodel = new Orderitemmodel($db); 
        $this->Ordermodel = new Ordermodel($db);
        $this->CartModel = new CartModel($db);
        $this->Reviewmodel = new Reviewmodel($db);
        $this->TaxesclassModel = new TaxesclassModel($db);
        $this->cms= new CmsModel($db);
        
    }



    public function index()
    {
        // $data['product_data'] = $this->product->findAll();
         $search_data = $this->request->getVar('search_data');
        $product_name = $this->request->getVar('product_name');
        if(!empty($search_data) && empty($product_name))
        {
            $filter_data = $this->product->like('ProductShortDesc',$search_data)->orLike('ProductLongDesc',$search_data)->orderBy('ProductID', 'desc')->paginate(6);
        }
        else if(!empty($product_name) && empty($search_data))
        {
            $filter_data = $this->product->where('ProductName',$product_name)->orderBy('ProductID', 'desc')->paginate(6);
        }
        else if(!empty($search_data) && !empty($product_name))
        {
            $filter_data = $this->product->where('ProductName',$product_name)->like('ProductShortDesc',$search_data)->orLike('ProductLongDesc',$search_data)->orderBy('ProductID', 'desc')->paginate(6);
        }
        else 
        {
            $filter_data = $this->product->orderBy('ProductID', 'DESC')->paginate(6);
        }
        
         $data = [
            'prdname'=>$product_name,
            'products'=>$this->product->orderBy('ProductID', 'DESC')->findAll(),
            'product_data' => $filter_data,
            'pager' => $this->product->pager
        ];

        return view('all_products',$data);
        
    }
    
//     public function all_products()
// {
//     $searchData = $this->request->getVar('search_data');
//     $productName = $this->request->getVar('product_name');
//     $page = $this->request->getVar('page') ?: 1; 

//     // Load the product model
//     $products_model = new \App\Models\ProductModel();

//     // Query to get products along with their categories
//     $products = $products_model
//         ->select('products.*, categories.CategoryName')  
//         ->join('categories', 'products.CategoryID = categories.CategoryID', 'left')
//         ->like('products.ProductName', $searchData)
//         ->like('products.ProductName', $productName)
//         ->paginate(6, 'default', $page);
        
 
//     $data = [
//     'products' => $products,
//     'pager' => $products_model->pager // Include the pager object
//     ];

//     // Return the response as JSON
//     return $this->response->setJSON($data); 
// }
// public function all_products()
// {
//     $searchData = $this->request->getVar('search_data');
//     $productName = $this->request->getVar('product_name');
//     $page = $this->request->getVar('page') ?: 1; 

//     // Load the product model
//     $products_model = new \App\Models\ProductModel();

//     // Initialize query builder with conditions based on filters
//     $products_model->select('products.*, categories.CategoryName')
//                   ->join('categories', 'products.CategoryID = categories.CategoryID', 'left');

//     // Apply search filters if provided
//     if ($searchData) {
//         $products_model->like('products.ProductName', $searchData);
//     }
//     if ($productName) {
//         $products_model->like('products.ProductName', $productName);
//     }

//     // Paginate results (6 items per page)
//     $products = $products_model->paginate(6, 'default', $page);
    
//     // Get the pager links for pagination
//     $pager = $products_model->pager;

//     $data = [
//         'products' => $products,
//         'pager' => $pager->links() // Generates HTML for pagination links
//     ];

//     // Return the response as JSON
//     return $this->response->setJSON($data); 
// }

public function all_products()
{
    $searchData = $this->request->getVar('search_data');
    $productName = $this->request->getVar('product_name');
    $page = $this->request->getVar('page') ?: 1; 

    // Load the product model
    $products_model = new \App\Models\ProductModel();

    // Initialize query builder with conditions based on filters
    $products_model->select('products.*, categories.CategoryName')
                  ->join('categories', 'products.CategoryID = categories.CategoryID', 'left')
                  ->orderBy('ProductID', 'DESC');

    // Apply search filters if provided
    if ($searchData) {
        $products_model->like('products.ProductName', $searchData);
    }
    if ($productName) {
        $products_model->like('products.ProductName', $productName);
    }

    // Paginate results (6 items per page)
    $products = $products_model->paginate(6, 'default', $page);
    
    // Get the pager links as HTML for pagination
    $pager = $products_model->pager->links();

    $data = [
        'products' => $products,
        'pager' => $pager // Send pager HTML
    ];

    // Return the response as JSON
    return $this->response->setJSON($data); 
}


    public function add_products()
    
    {
        $variationValueModel = new VariationValue();
        
        $data['categories'] = $this->catagory->findAll();
        $data['variation_type'] = $this->variationtype->findAll();
        foreach ($data['variation_type'] as $key => $variationType) {
            $variationTypeID = $variationType['VariationTypeID'];
            $variationValues = $variationValueModel->where('VariationTypeID', $variationTypeID)->findAll();
            $variationType['values'] = $variationValues;
            $data['variation_type'][$key] = $variationType;
            // Use the variation type and its associated values as needed
        }
        $data['variations'] = $this->optionvalue->findAll();
        $data['brands'] = $this->brand->findAll();
        $data['tags'] = $this->tags->findAll();
           $data['shipping_data'] = $this->shippingmethod->findAll();
           
          $data['tax_class']= $this->TaxesclassModel->findAll();
        // print_r($data['shipping_data']);
        //  print_r($data['variation_type']);
        //   print_r($data['tags']);
        
        return view('add_products',$data);
    }
    
     public function get_sub_category(){
        $category_id = $this->request->getPost('category_id');
        $subcategories = $this->subcategory->where('category_id',$category_id)->findAll();
        
        $html="";

        if(!empty($subcategories)){
            $html.="<option value=''>Select Sub Category</option>";
            foreach($subcategories as $sub_category){
                
                $html.="<option value='".$sub_category['sub_category_id']."'>".$sub_category['sub_category']."</option>";
            }
        }
        else{
            $html.="<option value=''>Select Sub Category</option>";
            $html.="<option disabled>Subcategory not found</option>";
        }

        echo $html;

    }

    public function get_variations(){
        $variation_type_id = $this->request->getPost('variation_type_id');
        // print_r($variation_type_id);
        $variations = $this->optionvalue->where('VariationTypeID',$variation_type_id)->findAll();
        // print_r($variations);
        
        // die;
        // $VariationID=$variations['VariationID'];
        // $variation_name=$variations['VariationName'];
            //  print_r($variation_name);
            // $variation_array = explode(",",$variation_name);
            // print_r (explode(" ",$str));
            // print_r($variation_array);
            // die;
        
        $html="";

        if(!empty($variations)){
            
            $html.="<option value=''>Select Variations</option>";
            foreach($variations as $variationval){
                // print_r($variationval);
                
                $html.="<option value='".$variationval['VariationID']."'>".$variationval['VariationName']."</option>";
            }
        }
        else{
            $html.="<option value=''>Select Variations</option>";
            $html.="<option disabled>Variations not found</option>";
        }

        echo $html;

    }
    
    //  public function get_variations(){
    //     $variation_type_id = $this->request->getPost('variation_type_id');
    //     $variations = $this->variation->where('VariationTypeID',$variation_type_id)->findAll();
        
    //     $html="";

    //     if(!empty($variations)){
    //         $html.="<option value=''>Select Variations</option>";
    //         foreach($variations as $variationval){
                
    //             $html.="<option value='".$variationval['VariationID']."'>".$variationval['VariationName']."</option>";
    //         }
    //     }
    //     else{
    //         $html.="<option value=''>Select Variations</option>";
    //         $html.="<option disabled>Variations not found</option>";
    //     }

    //     echo $html;

    // }
    
    public function save_product()
    { 
    // print_r($_POST); die;
        $product_type = $this->request->getPost('product_type');
        $product_name = $this->request->getPost('product_name');
        $product_desc = $this->request->getPost('product_desc');
        $product_sku = $this->request->getPost('product_sku');
        $category = $this->request->getPost('category');
        $subcategory = $this->request->getPost('subcategory');
        $tag = $this->request->getPost('tag');
        ;
        // $product_cart_desc = $this->request->getPost('product_cart_desc');
        $product_short_desc = $this->request->getPost('product_short_desc');
        $product_long_desc = $this->request->getPost('product_long_desc');
        //$product_price2 = $this->request->getPost('product_price2');
        // $product_stock = $this->request->getPost('product_stock');
        // $product_low_stock = $this->request->getPost('product_low_stock');
        $brand = $this->request->getPost('brand');
        // $variation_type = $this->request->getPost('variation_type');
        // print_r($variation_type);
        // $variation = $this->request->getPost('variation');
        //   print_r($variation);
        $stock_status = $this->request->getPost('stock_status');
        $product_weight = $this->request->getPost('product_weight');
        $product_dimension = $this->request->getPost('product_dimension');
        $shipping_methods = $this->request->getPost('shipping_methods');
        $product_quantity2 = $this->request->getPost('product_quantity2');
        $product_price2 = $this->request->getPost('product_price2');
        $variation_type = $this->request->getPost('variation_type');
        $variation = $this->request->getPost('variation');
        $product_quantity = $this->request->getPost('product_quantity');
        $product_price = $this->request->getPost('product_price');
        
        $product_sale_price2=$this->request->getPost('product_sale_price2');
        $product_sale_price = $this->request->getPost('product_sale_price');
        
        $tax_status2=$this->request->getPost('tax_status2');
        $tax_class2=$this->request->getPost('tax_class2');
        
        $tax_status=$this->request->getPost('tax_status');
        $tax_class=$this->request->getPost('tax_class');
       
        // $product_images = $this->request->getPost('$product_images');
        // print_r($product_price[0]); die;
        
        $tax_status_string='';
        if(!empty($tax_status)){
            $tax_status_string= implode(",",$tax_status);
            // $tax_status2="";
        }
        //  print_r($tax_status_string); die;
        $tax_class_string='';
        if(!empty($tax_class)){
            $tax_class_string= implode(",",$tax_class);
            // $tax_class2="";
        }
        //for slug
        $slug=str_replace(' ', '-', $product_name);
        // print_r($slug); die;
        // end slug
     
        $product_quantity_string='';
        if(!empty($product_quantity)) {
          $product_quantity_string = implode(",", $product_quantity);
        }
        
        $product_price_string='';
        if(!empty($product_price)) {
            $product_price_string = implode(",", $product_price);
        }
        $price='';
        if(!empty($product_price2))
        {
            $price=$product_price2;
        }
        else
        {
            // $price=array_sum($product_price);
            $price=$product_price[0];
            
        }
        
        $product_sale_price_string='';
        if(!empty($product_sale_price)) {
            $product_sale_price_string = implode(",", $product_sale_price);
        }
        $price2='';
         if(!empty($product_sale_price2))
        {
            $price2=$product_sale_price2;
        }
        else
        {
            // $price2=array_sum($product_sale_price);
            $price2=$product_sale_price[0];
        }
        

        $tag_string='';
        if(!empty($tag)) {
             $tag_string = json_encode($tag);
        }else{
            $tag_string = NULL;
        }
           
           
            $brand_data='';
        if(!empty($brand)) {
            $brand_data = $brand;
        }else{
            $brand_data = NULL;
        }
        
        
           
            $long_desc='';
        if(!empty($product_long_desc)) {
            $long_desc = $product_long_desc;
        }
        
        else{
            $long_desc = NULL;
        }
           
           
            $weight='';
        if(!empty($product_weight)) {
            $weight = $product_weight;
        }
        
        else{
            $weight = NULL;
        }
           
           
            $dimension='';
        if(!empty($product_dimension)) {
             $dimension = $product_dimension;
        }
        
        else{
            $dimension = NULL;
        }
           
        
        
        if($this->request->getFileMultiple('product_images'))
        {
            $files = $this->request->getFileMultiple('product_images');
            
            $products_img_arr = [];
            
            foreach ($files as $file) {
                
                if ($file->isValid() && ! $file->hasMoved())
                {
                    $newName = $file->getRandomName();
                    $file->move('public/assets/img/product_images', $newName);

                    $products_img_arr[] = $newName;
                    // $filesUploaded++;
                }
                 
            }

            $productimage = "";

            if(!empty($products_img_arr)){
                $productimage = json_encode($products_img_arr);
            }
            


            $data=array(
                'ProductSKU' => $product_sku,
                'CategoryID' => $category,
                'SubCategoryID' => $subcategory,
                // 'VariationTypeID' => $variation_type,
                // 'VariationID' => $variation,
                'BrandID' => $brand_data,
                'TagID' => $tag_string,
                'ProductName' => $product_name,
                'ProductPrice' => $product_price,
                // 'ProductCartDesc' => $product_cart_desc,
                'ProductShortDesc' => $product_short_desc,
                'ProductLongDesc' => $long_desc,
                'ProductImage' => $productimage,
                // 'ProductStock' => $product_stock,
                // 'ProductLowStock' => $product_low_stock,
                'Stock_Status' => $stock_status,
                'product_weight' => $weight,
                'product_dimensions' => $dimension,
                 'ProductPrice' => $price,
                'ProductStock' => $product_quantity2,
                'ProductType' => $product_type,
                'ShippingID' => $shipping_methods,
                'Sale_ProductPrice' => $price2,
                'is_taxable' => $tax_status2,
                'tax_class_id' => $tax_class2,
                'slug' => $slug
                
            );
            //  print_r($data); die;
          $add_product = $this->product->insert($data);
 
             $product_id = $this->product->getInsertID();

        $variation_type = $this->request->getPost('variation_type');
        $variations = $this->request->getPost('variation');
        $default = $this->request->getPost('default');
        
        $v_p=explode(",",$product_price_string);
        $v_s =explode(",",$product_quantity_string);
        
        $s_p=explode(",",$product_sale_price_string);
        $tax_s=explode(",",$tax_status_string);
        $tax_c=explode(",",$tax_class_string);


 $vari_img_arr=[];
        if(!empty($v_p)){
            $tmp_arr = array();
            foreach($v_p as $key => $val){
                $tmp = 'variation_image_'.(intval($key)+1);
                 $tmp_arr[$key+1] = $this->request->getFileMultiple($tmp);
            } 
            if(!empty($tmp_arr)){
                $firstElement = array_shift($tmp_arr);
                 array_push($tmp_arr, $firstElement);
            }
            //   print_r($tmp_arr); die;
           
                foreach($tmp_arr as $key1=>$val3){
                    // print_r($key1); die;
                    $tmp = 'variation_image_'.(intval($key1)+1);
                     $tmp_name = $this->request->getFileMultiple($tmp);
                    // print_r($tmp_name);
                    $j_arr=[];
                    foreach ($tmp_name as $key2=>$file2) {
                
                        if ($file2->isValid() && ! $file2->hasMoved())
                        {
                            // echo "<pre>";
                            // print_r($file2->getName());
                            // echo "</pre>";
                            $newName = $file2->getRandomName();
                            // $newName = $file2->getName();
                            $file2->move('public/assets/img/product_images', $newName);
        
                            $j_arr[] = $newName;
                            // $filesUploaded++;
                            
                        }
                 
                    }  $nn=json_encode($j_arr);
            // print_r($nn);
            array_push($vari_img_arr,$nn);
                    
                }
                // print_r($vari_img_arr);
                // die;
            if(!empty($vari_img_arr)){
                $firstElement = array_shift($vari_img_arr);
                 array_push($vari_img_arr, $firstElement);
            }
            // print_r($vari_img_arr);die;
                
            foreach($v_p as $v_k => $v_price){
                $defaultProduct = (isset($default[$v_k]))?($default[$v_k]):('0');
                $v_data = array(
                    'ProductID' => $product_id,
                    'VariationPrice' =>$v_price ,
                    'VariationStock' => $v_s[$v_k],
                    'defaultProduct'=>  $defaultProduct,
                    'ProductLive'=>'1',
                    'Sale_VariationPrice'=>$s_p[$v_k],
                    'product_variation_image'=>$vari_img_arr[$v_k],
                    'variation_is_taxable'=>$tax_s[$v_k],
                    // 'variation_tax_class_id'=>$tax_c[$v_k],
                );
                $v_id = $this->variation->insert($v_data);
                if(!empty($variations)){
                    $i=0;
                    foreach($variations as $key => $variation ){
                        
                        $variationsDetailModel = new VariationsDetail();
                        $variationValueID = $variation[$v_k];
                        $variationDetailData = [
                            'VariationID' => $v_id,
                            'VariationVlueID' => $variationValueID
                        ];
                        $variationsDetailModel->insert($variationDetailData);
                        
                        $i++;
                    }
                }

            }
        }

        
    

           if($product_id){
                echo "1";
           }
           else{
             echo "0";
           }

 
        }
        else{
            echo "2";
        }
}
    

    public function view_product_details($id)
    {
        $productdata= $this->product->where('ProductID',$id)->first();
        
    //     $tagid=$productdata['TagID'];
    //     // print_r(json_decode($tagid));die;
        
    //   if(!empty($tagid)){

    //         $tag_data= $this->tags->where('tagid',$tagid)->first();
    //     $tag_name=$tag_data['tagname'];
    //     // print_r($tag_name); die;
    //     $data['tagname']=$tag_name;

    //     }else{
    //         $data['tagname']="NA";
    //     }
    
    $tagid=$productdata['TagID'];
     
    $tagids=json_decode($tagid);
    //   print_r($tagids); die;
   
    $Tag_Name=[];
    if(!empty($tagid)){
        
        foreach($tagids as $val){
            $tag_data= $this->tags->where('tagid',$val)->first();
            $tag_name=$tag_data['tagname'];
            $new_arr['tagname']=$tag_name;
            array_push($Tag_Name,$new_arr);
        }
        $data['tagnameee']=$Tag_Name;
    // print_r($data['tagname']); die;
    }else{
         $data['tagnameee']= $Tag_Name;
    }
    
    // print_r($data['tagnameee']); die;
        
       
        $brandid=$productdata['BrandID'];
        
        if (!empty($brandid)) {
            $brand_data = $this->brand->where('BrandID', $brandid)->first();
            
            if ($brand_data !== null) {
                $data['brand_name'] = $brand_data['BrandName'];
            } else {
                $data['brand_name'] = "NA"; // No brand found with the given ID
            }
        } else {
            $data['brand_name'] = "NA"; // No BrandID provided
        }
        
        
        $categoryid=$productdata['CategoryID'];
        $category_data=$this->catagory->where('CategoryID',$categoryid)->first();
        $category_name=$category_data['CategoryName'];
        $data['categoryname']=$category_name;
        
        $subcategoryid=$productdata['SubCategoryID'];
        $subcategory_data=$this->subcategory->where('sub_category_id',$subcategoryid)->first();
        $subcategory_name=$subcategory_data['sub_category'];
        $data['subcategory_name']=$subcategory_name;
        
        $product_id=$productdata['ProductID'];
        // $variation_type_id=$productdata['VariationTypeID'];
        // // print_r($product_id); die;
        // $variation_data= $this->variation->where('VariationTypeID',$variation_type_id)->where('ProductID',$product_id)->findAll();
        // // print_r($variation_data); die;
        
        //  $product_id= 24;
        $variation_data= $this->variation->where('ProductID',$product_id)->findAll();
        // print_r($variation_data); die;
        // $color_name=[];
        // $size=[];
        // $material=[];
        $variation_detail=[];
        
        foreach($variation_data as $single_data){
            $variationtypeid=$single_data['VariationTypeID'];
            $variation_disply_name=$single_data['VariationName'];
            $variation_disply_price=$single_data['VariationPrice'];
            $variation_disply_stock=$single_data['VariationStock'];
            
            $variationtype_name_data=$this->variationtype->where('VariationTypeID',$variationtypeid)->first();
            // print_r($single_data);die;
            // $variationtype_name=$variationtype_name_data['VariationTypeName'];
            
            // print_r($variation_name);
            // if($variation_name=="color"){
            //     $new_arr['variation_name']=$variation_disply_name;
            //     $new_arr['variation_price']=$variation_disply_price;
            //     $new_arr['variation_stock']=$variation_disply_stock;
            //     array_push($color_name,$new_arr);
            //     // array_push($color_name,$variation_disply_price);
            //     // array_push($color_name,$variation_disply_stock);
            // }
            // if($variation_name=="size"){
            //     $new_arr['variation_name']=$variation_disply_name;
            //     $new_arr['variation_price']=$variation_disply_price;
            //     $new_arr['variation_stock']=$variation_disply_stock;
            //     array_push($size,$new_arr);
            // }
            // if($variation_name=="material"){
            //       $new_arr['variation_name']=$variation_disply_name;
            //     $new_arr['variation_price']=$variation_disply_price;
            //     $new_arr['variation_stock']=$variation_disply_stock;
            //     array_push($material,$new_arr);
            // }
            
            
             $new_arr['variation_name']=$variation_disply_name;
                $new_arr['variation_price']=$variation_disply_price;
                $new_arr['variation_stock']=$variation_disply_stock;
                // $new_arr['variationtype_name']=$variationtype_name;
                array_push($variation_detail,$new_arr);
                
           
        }
        
        $data['variation_detail']=$variation_detail;
        // print_r($variation_detail); die;
        // $data['color_name']=$color_name;
        // $data['size']=$size;
        // $data['material']=$material;
        
        
        // $data['size']=implode(",",$size);
        // $data['material']=implode(",",$material);
        // print_r($data); die;
        
        
      
        
        
        $data['product_data']=$productdata;
        // echo '<pre>';
        // print_r($data);die;
        
        return view('view_product_details',$data);
    }
    public function del_product()
{
    $product_ids = $this->request->getPost('product_ids');

    // Check if the product is in use
    $order_data = $this->Orderitemmodel->where('ProductID', $product_ids)->first();
    if ($order_data) {
        // Product is in use, cannot delete
        echo 2;
        return;
    }

    // Proceed to delete the product
    $delete = $this->product->where('ProductID', $product_ids)->delete();
    if ($delete) {
        // Delete associated variations, cart items, and reviews
        $this->variation->where('ProductID', $product_ids)->delete();
        $this->CartModel->where('product_id', $product_ids)->delete();
        $this->Reviewmodel->where('ProductID', $product_ids)->delete();
        
        echo 1; // Deletion successful
    } else {
        echo 0; // Deletion failed
    }
}


    public function edit_product_details($id){
            $variationsDetailModel = new VariationsDetail();
            $variationValueModel = new VariationValue();
            $data['all_product_data'] = $this->product->where('ProductID',$id)->first();
        
            $data['all_variations'] = $this->variation->where('ProductID', $id)->findAll();
            
    
            $data['variations_data'] = array();
                if(!empty($data['all_variations'])){
                    foreach($data['all_variations'] as $variation){
                        $VariationID = $variation['VariationID']; 
                        $data['variations_data'][$VariationID] = $variationsDetailModel->where('VariationID',$VariationID)->findAll();
                    }
                }
    
              
            $data['categories'] = $this->catagory->findAll();
             
            $sub_catagories_id = $data['all_product_data']['CategoryID'];
            
            $data['subcatagories'] = $this->subcategory->where('category_id',$sub_catagories_id)->findAll();
            
            $data['variation_type'] = $this->variationtype->findAll();
            foreach ($data['variation_type'] as $key => $variationType) {
                $variationTypeID = $variationType['VariationTypeID'];
                $variationValues = $variationValueModel->where('VariationTypeID', $variationTypeID)->findAll();
                $variationType['values'] = $variationValues;
                $data['variation_type'][$key] = $variationType;
                // Use the variation type and its associated values as needed
            }
             
            $data['variations'] = $this->optionvalue->findAll();
       
            $data['tags'] = $this->tags->findAll();
            
            $data['brand'] = $this->brand->findAll();
            
            $data['shipping_data'] = $this->shippingmethod->findAll();
            $data['tax_class']= $this->TaxesclassModel->findAll();
            // echo "<pre>";
            // print_r($data); die;
            return view('edit_product_details', $data);
    }
    public function update_product_details()
    {
        // echo "<pre>";
        // print_r($this->request->getPost());
        // print_r($_FILES);
        // echo "</pre>";
        // die; 
        // print_r($_POST); die;
        $product_id = $this->request->getPost('id');
        $product_type = $this->request->getPost('product_type');
        $product_name = $this->request->getPost('product_name');
        $product_desc = $this->request->getPost('product_desc');
        $product_sku = $this->request->getPost('product_sku');
        $category = $this->request->getPost('category');
        $subcategory = $this->request->getPost('subcategory');
        $tag = $this->request->getPost('tag');
        $product_short_desc = $this->request->getPost('product_short_desc');
        $product_long_desc = $this->request->getPost('product_long_desc');
        $product_price = $this->request->getPost('product_price');
        $brand = $this->request->getPost('brand');
        $stock_status = $this->request->getPost('stock_status');
        $product_weight = $this->request->getPost('product_weight');
        $product_dimension = $this->request->getPost('product_dimension');
        $shipping_methods = $this->request->getPost('shipping_methods');
        $product_quantity2 = $this->request->getPost('product_quantity2');
        $product_price2 = $this->request->getPost('product_price2');
        $variation_type = $this->request->getPost('variation_type');
        $variation = $this->request->getPost('variation');
        $product_quantity = $this->request->getPost('product_quantity');
        $product_price = $this->request->getPost('product_price');
        $old_image = $this->request->getPost('old_image');
             
        $product_sale_price2=$this->request->getPost('product_sale_price2');
        $product_sale_price = $this->request->getPost('product_sale_price');
        
        
         $tax_status2=$this->request->getPost('tax_status2');
        $tax_class2=$this->request->getPost('tax_class2');
        
        $tax_status=$this->request->getPost('tax_status');
        $tax_class=$this->request->getPost('tax_class');
       
        // $product_images = $this->request->getPost('$product_images');
        // print_r($product_price[0]); die;
        
        $tax_status_string='';
        if(!empty($tax_status)){
            $tax_status_string= implode(",",$tax_status);
            // $tax_status2="";
        }
        //  print_r($tax_status_string); die;
        $tax_class_string='';
        if(!empty($tax_class)){
            $tax_class_string= implode(",",$tax_class);
            // $tax_class2="";
        }
        // print_r($tax_class_string); die;
         //for slug
        $slug=str_replace(' ', '-', $product_name);
        // print_r($slug); die;
        // end slug
          
        $product_quantity_string='';
        if(!empty($product_quantity)) {
        $product_quantity_string = implode(",", $product_quantity);
        
        }
        
         $product_price_string='';
        if(!empty($product_price)) {
        $product_price_string = implode(",", $product_price);
        
        }
         $product_sale_price_string='';
        if(!empty($product_sale_price)) {
            $product_sale_price_string = implode(",", $product_sale_price);
        }
        $price2='';
         if(!empty($product_sale_price2))
        {
            $price2=$product_sale_price2;
        }
        else
        {
            $price2=array_sum($product_sale_price);
        }

              $tag_string='';
        if(!empty($tag)) {
             $tag_string = json_encode($tag);
                 
        }
        
        else{
            $tag_string = NULL;
        }
           
           
            $brand_data='';
        if(!empty($brand)) {
                      $brand_data = $brand;
                   
        }
        
        else{
            $brand_data = NULL;
        }
        
        
           
            $long_desc='';
        if(!empty($product_long_desc)) {
                      $long_desc = $product_long_desc;
                  
        }
        
        else{
            $long_desc = NULL;
        }
           
           
            $weight='';
        if(!empty($product_weight)) {
                      $weight = $product_weight;
              
        }
        
        else{
            $weight = NULL;
        }
           
           
            $dimension='';
        if(!empty($product_dimension)) {
                      $dimension = $product_dimension;
          
        }
        
        else{
            $dimension = NULL;
        }
       
         $files = $this->request->getFileMultiple('product_images');

        $productimage = "";

        if(isset($_FILES['product_images']['name'][0]) && !empty($_FILES['product_images']['name'][0])){

            $products_img_arr = [];
            
            foreach ($files as $file) {
                
                if ($file->isValid() && ! $file->hasMoved())
                {
                    $newName = $file->getRandomName();
                    $file->move('public/assets/img/product_images', $newName);

                    $products_img_arr[] = $newName;
                    
                }
                 
            }
            $productimage = json_encode($products_img_arr);
        }
        else{
            
            $productimage = $this->request->getPost('old_image');
        }
        

            $data=array(
                'ProductSKU' => $product_sku,
                'CategoryID' => $category,
                'SubCategoryID' => $subcategory,
                // 'VariationTypeID' => $variation_type,
                // 'VariationID' => $variation,
                'BrandID' => $brand_data,
                'TagID' => $tag_string,
                'ProductName' => $product_name,
                // 'ProductPrice' => $product_price,
                // 'ProductCartDesc' => $product_cart_desc,
                'ProductShortDesc' => $product_short_desc,
                'ProductLongDesc' => $long_desc,
                'ProductImage' => $productimage,
                // 'ProductStock' => $product_stock,
                // 'ProductLowStock' => $product_low_stock,
                'Stock_Status' => $stock_status,
                'product_weight' => $weight,
                'product_dimensions' => $dimension,
                 'ProductPrice' => $product_price2,
                 'Sale_ProductPrice'=>$product_sale_price2,
                'ProductStock' => $product_quantity2,
                'ProductType' => $product_type,
                 'ShippingID' => $shipping_methods,
                 'is_taxable' => $tax_status2,
                'tax_class_id' => $tax_class2,
                'slug' => $slug
                
            );
            
             

          $add_product = $this->product->update($product_id, $data);
          if($product_type==2){
              $data = $this->variation->where('ProductID',$product_id)->delete();
          }
          
     
            $variation_type = $this->request->getPost('variation_type');
            
                
            $variations = $this->request->getPost('variation');
        
            $default = $this->request->getPost('default');

              
                //   die;
        $v_p=explode(",",$product_price_string);
        $v_s =explode(",",$product_quantity_string);
        
        $s_p=explode(",",$product_sale_price_string);
         $tax_s=explode(",",$tax_status_string);
        $tax_c=explode(",",$tax_class_string);
        if($product_type==2){

            $variation_image_index = explode(",",$this->request->getPost('variation_image_index'));
            if(!empty($v_p)){
                foreach($v_p as $v_k => $v_price){
                    $old_variation_image = '';
                    $tmp = 'variation_image_'.$variation_image_index[$v_k];
                    // $tmp_arr = $_FILES($tmp);
                    // print_r($this->request->getPost());
                    // die;
                    $variation_image = array();
                    if(isset($_FILES[$tmp]) && !empty($_FILES[$tmp]['name'][0])){
                        $tmp_name = $this->request->getFileMultiple($tmp);
                        foreach ($tmp_name as $key2=>$file2) {
                            if ($file2->isValid() && !$file2->hasMoved())
                            {
                                // echo "<pre>";
                                // print_r($file2->getName());
                                // echo "</pre>";
                                $newName = $file2->getRandomName();
                                // $newName = $file2->getName();
                                $file2->move('public/assets/img/product_images', $newName);
            
                                $variation_image[] = $newName;
                                // $filesUploaded++;
                                
                            }
                     
                        }
                    }else{
                        // if(isset($this->request->getPost('old_variation_image_'.$variation_image_index[$v_k]))){
                            $tmp_variation_image = $this->request->getPost('old_variation_image_'.$variation_image_index[$v_k]);
                            $variation_image = json_decode($tmp_variation_image[0]);
                        // }
                    }
                    
                    $defaultProduct = (isset($default[$v_k]))?($default[$v_k]):('0');
                    $v_data = array(
                        'ProductID' => $product_id,
                        'VariationPrice' =>$v_price,
                        'VariationStock' => $v_s[$v_k],
                        'defaultProduct'=>  $defaultProduct,
                        'ProductLive'=>'1',
                        'Sale_VariationPrice'=>$s_p[$v_k],
                        'variation_is_taxable'=>$tax_s[$v_k],
                        // 'variation_tax_class_id'=>$tax_c[$v_k],
                    );
                    // print_r($v_data); die;
                    if(!empty($variation_image)){
                        $v_data['product_variation_image']=json_encode($variation_image);
                    }
                    
                    $v_id = $this->variation->insert($v_data);
                    if(!empty($variations)){
                        $i=0;
                        foreach($variations as $key => $variation ){
                            
                            $variationsDetailModel = new VariationsDetail();
                            $variationValueID = $variation[$v_k];
                            $variationDetailData = [
                                'VariationID' => $v_id,
                                'VariationVlueID' => $variationValueID
                            ];
                            $variationsDetailModel->insert($variationDetailData);
                            
                            $i++;
                        }
                    }
    
                }
            }
           
        //  foreach($variation_type as $key=>$val){
     
        //     $data_variations = $this->optionvalue->where('VariationID',$variation[$key])->get()->getRow();
        //     if(!empty($data_variations)) {
        //         $data_3 = $data_variations;
                
        //         $data2=array(
                
        //         'VariationTypeID' => $val,
        //         'VariationID' => $variation[$key],
        //         'ProductID' => $product_id,
        //         'VariationName' => $data_variations->VariationName,
        //         'VariationPrice' =>$v_p[$key] ,
        //         'VariationStock' => $v_s[$key],
                
        //         ) ; 
        //         //   print_r($data2);
        //             $add_product = $this->variation->insert($data2);
        //     }
            
        //     else{
                
        //     }

        //  }
        }
        

           if($add_product){
                echo "1";
           }
           else{
             echo "0";
           }

 
        
 
        // if($filesUploaded <= 0) {
            
        // }

         
      
         
         
      
    }
    

    public function all_categories()
    {
        $data['all_catagories_data'] = $this->catagory->orderBy('CategoryID', 'DESC')->findAll();
        return view('all_categories', $data);
    }

    
    
   
    public function all_subcategories()
    {
        $this->subcategory->select('subcategory.sub_category_id, subcategory.category_id, subcategory.sub_category, categories.CategoryID, categories.CategoryName');
        $this->subcategory->join('categories', 'categories.CategoryID = subcategory.category_id');
        $this->subcategory->orderBy('subcategory.sub_category_id', 'DESC'); // Order by sub_category_id in descending order

        $data['all_sub_catagories_data'] = $this->subcategory->get()->getResultArray();

        return view('all_subcategories', $data);
    }


    public function add_subcategory()
    {
        $data['all_catagories_data'] = $this->catagory->findAll();
        // print_r($data['all_catagories_data']);
        // die;
        return view('add_subcategory',$data);
    }

    
    
    public function save_sub_catagories()
    {
       
        $name = $this->request->getPost('name');
        $category = $this->request->getPost('category');
        
         $file_image = $this->request->getFile('sub_cat_img');
        //  print_r($file_image); die;
        // $fileName = $file_image->getRandomName();
        // $file_image->move('public/upload_images', $fileName);
        $sub_categoryimg = "";

        if(isset($_FILES['sub_cat_img']['name']) && !empty($_FILES['sub_cat_img']['name'])){

            $fileName = $file_image->getRandomName();

            $file_image->move('public/upload_images', $fileName);
            $sub_categoryimg=$fileName;
        }
        else{
            $sub_categoryimg = "18.jpg";
        }

        $data_insert=[
            'category_id'	=>	$this->request->getVar('category'),
            'sub_category'	=>	$this->request->getVar('name'),
            'sub_category_img' => $sub_categoryimg,
                     
        ];
// print_r($data_insert); die;

        $user_data = $this->subcategory->insert($data_insert);
        if($user_data) {
            echo 1;
        }
        else
        {
            echo 0;

        }
     }

     
     public function edit_sub_category($id = null)
     {
        //  print_r($id);
         $data['all_sub_catagories_data']=$this->subcategory->where('sub_category_id', $id)->first();
         $data['all_catagories_data'] = $this->catagory->findAll();
        //  print_r($data['all_sub_catagories_data']);
        //  die;
         return view('edit_subcategory',$data);
     }

// $data['singleuserdata'] = $this->user_model->join('user_info','users.id=user_info.user_id')->where('users.id',$id)->first();
         

     
     public function update_sub_catagories()
    {
       

$id = $this->request->getPost('id');
$name = $this->request->getPost('name');
$category = $this->request->getPost('category');
$old_image = $this->request->getPost('old_img');

$file_image = $this->request->getFile('sub_cat_img');
       
        $sub_categoryimg = "";

        if(isset($_FILES['sub_cat_img']['name']) && !empty($_FILES['sub_cat_img']['name'])){

            $fileName = $file_image->getRandomName();

            $file_image->move('public/upload_images', $fileName);
            $sub_categoryimg=$fileName;
        }
        else{
            $sub_categoryimg = $old_image ;
        }


$data_update=[
    'category_id'	=>	$this->request->getVar('category'),
    'sub_category'	=>	$this->request->getVar('name'),
    'sub_category_img' => $sub_categoryimg,
             
];

       $user_data = $this->subcategory->update($id, $data_update);

        if($user_data){
                 echo 1;
             }else{
                 echo 0;
             }
             }


             
             public function delete_subcategory() {
                $subcat_id = $this->request->getPost('subcatagory_ids');
                
                // Check if there are products under this subcategory
                $data = $this->product->where('SubCategoryID', $subcat_id)->findAll();
            
                if (!empty($data)) {
                    // If there are products, do not allow deletion and return 2
                    echo 2;
                } else {
                    // Specify the subcategory ID for deletion
                    $delete = $this->subcategory->where('sub_category_id', $subcat_id)->delete();
            
                    if ($delete) {
                        echo 1; // Success
                    } else {
                        echo 0; // Failure
                    }
                }
            }
            



    public function add_category()
    {
        return view('add_category');
    }

  public function save_catagories()
    {
        $file_image = $this->request->getFile('catagory_image');
        // $fileName = $file_image->getRandomName();
        // $file_image->move('public/upload_images', $fileName);
        $categoryimg = "";

        if(isset($_FILES['catagory_image']['name']) && !empty($_FILES['catagory_image']['name'])){

            $fileName = $file_image->getRandomName();

            $file_image->move('public/upload_images', $fileName);
            $categoryimg=$fileName;
        }
        else{
            $categoryimg = "18.jpg";
        }
        
        
        $name = $this->request->getPost('name');
        $description = $this->request->getPost('description');

        $data = $this->catagory->where('CategoryName', $name)->first();


        if(empty($data)){

            $data_insert=[
                'CategoryName'	=>	$this->request->getVar('name'),
                'CategoryDesc'	=>	$this->request->getVar('description'),
                 'Catagoryimage'	=>	$categoryimg,            
            ];
    
            // print_r($data_insert);
            // die;
    
           
        $user_data = $this->catagory->insert( $data_insert);
        
            if($user_data) {
                echo 1;
            }
            else
            {
                echo 0;
    
            }
         }
         else {
            echo 2;
         }
    }
    public function delete_catagory(){
          
        $cat_id=$this->request->getPost('cat_ids');
        
    
        // $this->subcategory->where('category_id',$cat_id);
        // $delete=$this->subcategory->delete(); 

         $this->catagory->where('CategoryID',$cat_id);
         $data=$this->subcategory->where('category_id',$cat_id)->findAll();
         
         if(!empty($data)){
             echo 2;
         }
         else{
             $delete=$this->catagory->delete();
    
               
            
            
                 if($delete){
                     echo 1;
                 }else{
                     echo 0;
                 }
        
                }
        }

    public function edit_category($id = null)
    {
        // print_r($id);
        $data['all_catagories_data']=$this->catagory->where('CategoryID', $id)->first();
        return view('edit_category',$data);
    }



   public function update_catagories()
    {
                $file_image = $this->request->getFile('catagory_image');

        $categoryimg = "";

        if(isset($_FILES['catagory_image']['name']) && !empty($_FILES['catagory_image']['name'])){

            $fileName = $file_image->getRandomName();

            $file_image->move('public/upload_images', $fileName);
            $categoryimg=$fileName;
        }
        else{
            $categoryimg = $this->request->getPost('old_image');
        }
	
    
            $id = $this->request->getPost('id');
                    $name = $this->request->getPost('name');
                    $description = $this->request->getPost('description');
                    // print_r($name);
                    // die;
                    
                    // $data = $this->catagory->where('CategoryName', $name)->where('CategoryID', $id)->first();
                    $data = $this->catagory->where('CategoryID', $id)->first();

                    // print_r($data);
                    // die;


        if(!empty($data)){

            $data_update=[
                'CategoryName'	=>	$this->request->getVar('name'),
                'CategoryDesc'	=>	$this->request->getVar('description'),
                 'Catagoryimage'	=>	$categoryimg,            
            ];
    
            // print_r($data_insert);
            // die;
    
           
            $user_data = $this->catagory->update($id, $data_update);
            if($user_data) {
                echo 1;
            }
            else
            {
                echo 0;
    
            }
         }
         else {
            echo 2;
         }
    }
    
    public function all_options()
    {
        $data['all_options_data'] = $this->variationtype->orderBy('VariationTypeID', 'DESC')->findAll(); // Replace 'option_id' with the column you want to order by
        return view('all_options', $data);
    }

    public function add_options()
    {
        return view('add_option');
    }

    public function save_options()
    {
        $name = $this->request->getPost('name');

        $data = $this->variationtype->where('VariationTypeName', $name)->first();
        // print_r($data);
        // die;

        if(empty($data)){

        $data_insert=[
            'VariationTypeName'	=>	$this->request->getVar('name'),
                   
        ];

        // print_r($data_insert);
        // die;

        $user_data = $this->variationtype->insert($data_insert);
        if($user_data) {
            echo 1;
        }
        else
        {
            echo 0;

        }
     }
     else {
        echo 2;
     }
    }
     public function delete_options_type(){
          
        $optionstype_id=$this->request->getPost('optionstype_ids');
         $this->variationtype->where('VariationTypeID',$optionstype_id);
             $delete=$this->variationtype->delete(); 


             $this->optionvalue->where('VariationTypeID',$optionstype_id);
             $delete=$this->optionvalue->delete(); 


        
        

             if($delete){
                 echo 1;
             }else{
                 echo 0;
             }
    
            }
     
 

    public function edit_options($id = null)
    {
        $data['all_options_data']=$this->variationtype->where('VariationTypeID', $id)->first();
        return view('edit_option',$data);
    }

    

   public function update_options()
    {

        $id = $this->request->getPost('id');
        $name = $this->request->getPost('name');

        // $data = $this->variationtype->where('VariationTypeName', $name)->where('VariationTypeID', $id)->first();
         $data = $this->variationtype->where('VariationTypeName', $name)->first();
// print_r($data); die;
        if(empty($data)){

            $data_update =[
                'VariationTypeName'	=>	$this->request->getVar('name'),
                       
            ];
    
            // print_r($data_insert);
            // die;
    
            $user_data = $this->variationtype->update($id, $data_update);
            if($user_data) {
                echo 1;
            }
            else
            {
                echo 0;
    
            }
         }
         else {
            echo 2;
         }
    }
     
     public function all_options_value()
    {
        $this->variationtype->select('variation_value.VariationID ,option_value.VariationTypeID,option_value.VariationName,variation_type.VariationTypeID, variation_type.VariationTypeName');
        $this->optionvalue->join('variation_type', 'variation_type.VariationTypeID  = variation_value.VariationTypeID');
        $data['all_options_data'] = $this->optionvalue->get()->getResultArray();
        // print_r($data['all_options_data']);
        // die;
        
        return view('all_options_value',$data);

    }


    
    public function add_options_value()
    {
        $data['all_options_data'] = $this->variationtype->findAll();
        
        // print_r($data['all_options_data']);
        return view('add_options_value',$data);
    }

    
    public function save_option_value()
    {
        $name = $this->request->getPost('name');
        // print_r($name);
        // $name_string='';
        // if(!empty($name)) {
        // $name_string = implode(",", $name);
        // print_r($name_string);
        $option_img=$this->request->getFileMultiple('option_img');
        $option_imges=array();
          foreach ($option_img as $file) {
                
                if ($file->isValid() && ! $file->hasMoved())
                {
                    $newName = $file->getRandomName();
                    $file->move('public/assets/img/product_images', $newName);

                    $option_imges[] = $newName;
                    // $filesUploaded++;
                }else{
                    $option_imges[] = '';
                }
                 
            }
        
        // print_r($option_imges); die;
        // $name_option = []; 
foreach($name as $key=>$n){
// print_r($option_imges[$key]); die;

    $data_insert=[
        'VariationTypeID'	=>	$this->request->getVar('optionvalue'),
        // 'VariationName'	=>	$this->request->getVar('name'),
        'VariationName'        =>$n,
        'Variation_image' => $option_imges[$key],
    ];
// print_r($data_insert); die;

    $user_data = $this->optionvalue->insert($data_insert);
    // print_r($n);
}
// die;
        $optionvalue = $this->request->getPost('optionvalue');

        
        if($user_data) {
            echo 1;
        }
        else
        {
            echo 0;

        }
     }

     
     public function delete_option_value(){
          
        $optionvalue_ids=$this->request->getPost('option_value_ids');
         $this->optionvalue->where('VariationID',$optionvalue_ids);
             $delete=$this->optionvalue->delete(); 
        
        

             if($delete){
                 echo 1;
             }else{
                 echo 0;
             }
    
            }
    
            
            public function edit_option_value($id = null)
            {

                $data['all_option_value_data']=$this->optionvalue->where('VariationID', $id)->first();
                $data['all_options_data'] = $this->variationtype->findAll();
                $option_array = $data['all_option_value_data']['VariationName'];
                $data['options_data'] = explode(',', $option_array);
                // print_r($data['all_option_value_data']);
                // print_r($data['all_options_data']);
      
        
             

       
                return view('edit_option_value',$data);



                
            }


            

            public function update_option_value()
            {
               
        
//         $id = $this->request->getPost('id');
//         $name = $this->request->getPost('name');
//         $old_option_img=$this->request->getPost('old_option_img');
//         $new_option_img=$this->request->getFileMultiple('option_img');
//         $upload_option_img="";
//         print_r($old_option_img); die;
//         if(!empty($new_option_img)){
            
//         }
        
        
//         foreach($name as $n){


//     $data_update=[
//         'VariationTypeID'	=>	$this->request->getVar('optionvalue'),
//         // 'VariationName'	=>	$this->request->getVar('name'),
//         'VariationName'        =>$n,
//     ];
// // print_r($data_update);

//     $user_data = $this->optionvalue->update($id, $data_update);
//     // print_r($n);
// }
// // die;
//         $optionvalue = $this->request->getPost('optionvalue');

        
//         if($user_data) {
//             echo 1;
//         }
//         else
//         {
//             echo 0;

//         }


 $id = $this->request->getPost('id');
        $name = $this->request->getPost('name');
        $old_option_img=$this->request->getPost('old_option_img');
        $new_option_img=$this->request->getFile('option_img');
        $upload_option_img="";
        // print_r($new_option_img); die;
        if(isset($_FILES['option_img']['name']) && !empty($_FILES['option_img']['name'])){
            
            //  if ($new_option_img->isValid() && ! $new_option_img->hasMoved())
            //     {
                    $newName = $new_option_img->getRandomName();
                    $new_option_img->move('public/assets/img/product_images', $newName);

                    $upload_option_img = $newName;
                    // $filesUploaded++;
                }else{
                    $upload_option_img=$old_option_img;
                }
        // }
        
        // print_r($upload_option_img); die;
        // foreach($name as $n){


    $data_update=[
        'VariationTypeID'	=>	$this->request->getVar('optionvalue'),
        // 'VariationName'	=>	$this->request->getVar('name'),
        'VariationName'        =>$name,
        'Variation_image' => $upload_option_img,
    ];
// print_r($data_update);

    $user_data = $this->optionvalue->update($id, $data_update);
    // print_r($n);
// }
// die;
        $optionvalue = $this->request->getPost('optionvalue');

        
        if($user_data) {
            echo 1;
        }
        else
        {
            echo 0;

        }


     }
     
        
                     
   public function delete_more_option_value()
    {
 
        $name=$this->request->getPost('name');
    
        $more_option_value_id=$this->request->getPost('more_option_value_ids');
        // print_r($more_option_value_id);

        $data['all_more_option_value_data']=$this->optionvalue->where('VariationID', $more_option_value_id)->first();
    //    print_r($data['all_more_option_value_data']);
       $option_array = $data['all_more_option_value_data']['VariationName'];
       $option_data= explode(',',$option_array);
    //    print_r($option_data);
    //    die;
       

       if ($key = array_search($name, $option_data) !== false) {
        unset($option_data[$key]);
    }
    // die;
 $options = implode(",",$option_data);
//  print_r($options);


 $data_update=[
    'VariationTypeID'	=>	$more_option_value_id,
    // 'VariationName'	=>	$this->request->getVar('name'),
    'VariationName'        =>$options,
];

// print_r($data_update);

$user_data = $this->optionvalue->update($more_option_value_id, $data_update);
        
if($user_data){
         echo 1;
     }else{
         echo 0;
     }
     




    }



    public function all_tags()
    {
        $data['all_tags_data'] = $this->tags->orderBy('tagid', 'DESC')->findAll(); // Replace 'tag_id' with the column you want to sort by
        return view('all_tags', $data);
    }


    
    public function add_tags()
    {   
        
        return view('add_tag');
    }

    
    public function save_tags()
    {
        $name = $this->request->getPost('name');


        $data_insert=[
            'tagname'	=>	$this->request->getVar('name'),
                   
        ];

        $user_data = $this->tags->insert($data_insert);
        if($user_data) {
            echo 1;
        }
        else
        {
            echo 0;

        }

      
    }
    public function edit_tags($id = null)
    {
        $data['all_tags_data']=$this->tags->where('tagid', $id)->first();
        // print_r($data['all_tags_data']);
        return view('edit_tag',$data);
    }

    public function update_tags()
    {
        // print_r($_POST); die;
        // return view('edit_tag');

        $name = $this->request->getPost('tagname');
        $id= $this->request->getPost('id');


        $data_update=[
            'tagname'	=>	$name,
            
                    
        ];


       $user_data = $this->tags->update($id, $data_update);

        if($user_data){
                 echo 1;
             }else{
                 echo 0;
             }
        

    }

    public function delete_tags_type(){
        $tagstype_id=$this->request->getPost('tagstype_ids');
         $this->tags->where('tagid',$tagstype_id);
             $delete=$this->tags->delete(); 
        
        
             if($delete){
                 echo 1;
             }else{
                 echo 0;
             }
    
            }
            
            
            
             public function add_brands()
    {   
        
        return view('add_brands');
    }
    
     public function all_review()
    {    
      
        
        $review_data = $this->Reviewmodel->orderby('review_id','desc')->findAll();
       $review_array = [];

            foreach ($review_data as $key => $single_review) {
                $review_array2 = array(
                    'review_id' => $single_review['review_id'],
                    'rating' => $single_review['rating'],
                    'name' => $single_review['name'],
                    'email' => $single_review['email'],
                    'description' => $single_review['description'],
                    'created_date' => date('d-m-Y', strtotime($single_review['created_date'])),
                );
            
            
                $product_id = $single_review['ProductID'];
                $product_data = $this->product->where('ProductID', $product_id)->first();
                if($product_data){
                $review_array2['product_name'] = $product_data['ProductName'];
                
                
                
                // Push the review data into the review_array
                $review_array[] = $review_array2;
             }
}
        // echo "<pre>";
        // print_r($review_array);
        // die;
        $data['review_array']= $review_array;
                return view('all_review',$data);
    }
    public function delete_review(){
        
         $review_id=$this->request->getPost('review_ids');
        
    // print_r($review_id); die;
        // $this->subcategory->where('category_id',$cat_id);
        // $delete=$this->subcategory->delete(); 

         $this->Reviewmodel->where('review_id',$review_id);
         $delete=$this->Reviewmodel->delete();
         if($delete){
             echo 1;
         }else{
             echo 0;
         }
         
        
        
    }

    public function all_settings()
    {
        $data['all_settings_data'] = $this->Allsettings->first();
        $data['all_cms_data'] = $this->cms->orderby('CmsID','desc')->findAll();
        // print_r($data['all_settings_data']);
        return view('all_settings', $data);
    }

    public function save_setting_data()
    {
        $setting_id = $this->request->getPost('id');
    
        $existingData = $this->Allsettings->where('ID', $setting_id)->first();
        $oldLogoImage = $existingData['Logo'] ?? '18.jpg';
    
        $file_image = $this->request->getFile('logo_image');
    
        if (isset($_FILES['logo_image']['name']) && !empty($_FILES['logo_image']['name'])) {
            $fileName = $file_image->getRandomName();
            $file_image->move('public/upload_images', $fileName);
            $logoimg = $fileName;
        } else {
            $logoimg = $oldLogoImage;
        }
    
        $title = $this->request->getPost('title');
        $email = $this->request->getPost('email');
        $phone = $this->request->getPost('phone');
        $address = $this->request->getPost('address');
        $description = $this->request->getPost('description');
        $currency = $this->request->getPost('currency');
        $googe_analytics = $this->request->getPost('google_analytics');

    
        $data_update = [
            'Title'       => $title,
            'Logo'        => $logoimg,
            'Email'       => $email,
            'Phone'       => $phone,
            'Address'     => $address,
            'Description' => $description,
            'currency'    => $currency,
            'google_analytics' => $googe_analytics,
        ];
    
        $user_data = $this->Allsettings->set($data_update)->where('ID', $setting_id)->update();
        if ($user_data) {
            echo 1;
        } else {
            echo 0;
        }
    }
    
    public function search_product()
    {
        $search_data = $this->request->getPost('search_data');
        $product_name = $this->request->getPost('product_name');
        if(!empty($search_data) && empty($product_name))
        {
            $filter_data = $this->product->like('ProductName',$search_data)->orLike('ProductShortDesc',$search_data)->orLike('ProductLongDesc',$search_data)->paginate(6);
        }
        else if(empty($search_data) && !empty($product_name))
        {
            $filter_data = $this->product->where('ProductName',$product_name)->paginate(6);
        }
        else if(!empty($search_data) && !empty($product_name))
        {
            $filter_data = $this->product->where('ProductName',$product_name)->like('ProductShortDesc',$search_data)->orLike('ProductLongDesc',$search_data)->paginate(6);
        }
        else 
        {
            $filter_data = $this->product->paginate(6);
        }
        $data = [
            'product' => $filter_data,
            'pager' => $this->product->pager,
        ];
        ?>
        <div class="row">
        <?php
        foreach($data['product'] as $fdata)
        {
            $b=(json_decode($fdata['ProductImage']));
            ?>
    		       <div class="col-md-4 col-lg-4 mb-3">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo wordwrap($fdata['ProductName'],20,"<br>\n"); ?></h5>
                                
                            </div>
                                <img class="img-fluid" src="<?php echo base_url(); ?>public/assets/img/product_images/<?php echo $b[0]; ?>" alt="Card image cap" />
                            <div class="card-body">
                                <h5 class="card-title"><strong>Name: </strong><?php echo wordwrap($fdata['ProductName'],20,"<br>\n"); ?></h5>
                                <h6 class="card-subtitle"><strong>Category: </strong>
                                <?php
                                    
                                    $rescat = $this->catagory->where('CategoryID',$fdata['CategoryID'])->get()->getRow();
                                    if(!empty($rescat))
                                    {
                                        echo wordwrap($rescat->CategoryName,20,"<br>\n"); 
                                    }
                                    else 
                                    {
                                        echo '';
                                    }
                                ?>
                                </h6>
                                
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col col-xs-4">
                                        <div class="col-xs-4">
                                        <?php
                                        if($fdata['Stock_Status']==1)
                                        {
                                        ?>
                                        <div class="form-check form-switch">
                                          <input class="form-check-input" type="checkbox" id="flexSwitchCheckCheckedDisabled" checked disabled>
                                              <label class="form-check-label" for="flexSwitchCheckDisabled"><a class="dropdown-item" href="<?php echo base_url(); ?>product-details/<?php echo $fdata['ProductID'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></label> 
                                        </div>
                                        
                                        
                                        
                                        <?php 
                                        }
                                        else 
                                        {
                                        ?>
                                        <div class="form-check form-switch mb-2">
                                          <input class="form-check-input" type="checkbox" id="flexSwitchCheckDisabled" disabled>
                                            <label class="form-check-label" for="flexSwitchCheckDisabled"><a class="dropdown-item" href="<?php echo base_url(); ?>product-details/<?php echo $fdata['ProductID'] ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></label>
                                        </div>
                                        
                                        <?php 
                                        }
                                        ?>
                                        </div>
                                        
                                    </div>
                                    <div class="col col-xs-2">
                                        
                                    </div>
                                    <div class="col col-xs-4">
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
                                            <div class="dropdown-menu" style="">
                                              <!--	<a class="dropdown-item" href="<?php //echo base_url(); ?>product-details/<?php //echo $single_product['ProductID'] ?>"><i class="fa fa-eye" aria-hidden="true"></i> View Details</a>-->
                                                <a class="dropdown-item" href="<?php echo base_url(); ?>edit-product-details/<?php echo $fdata['ProductID'] ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                <a class="dropdown-item del_product" href="javascript:void(0);" data-id="<?= $fdata['ProductID'] ?>"><i class="bx bx-trash me-1"></i> Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
            <?php
        }
        ?>
        </div>
        <div class="d-flex justify-content-center text-center">
		    <nav aria-label="Page navigation">
                <ul class="pagination">
                    <?php if ($data['pager']) :?>
                    <?php  $pagi_path=base_url('all-products'); ?>
                    <?= $data['pager']->links() ?>
                    <?php endif ?>
                </ul>
            </nav>
        </div>
        <?php
    }
    
    //  public function update_link_setting_data()
    // {
    //   $sett_id = $_POST['sett_id'];
       
    //     // $insta_name = $_POST['insta_name'];
    //     //  $facebook_name = $_POST['facebook_name'];
    //     //   $twitter_name = $_POST['twitter_name'];
    //     //   $checkout_name = $_POST['checkout_name'];
           
       
    //      $sett_data = $this->Allsettings->first();
         
    //     $data = $sett_data['Links'];
    //     $dt = json_decode($data);
        
    //       $intagram = $dt->insta;
    //                   $facebook = $dt->facebook;
    //                   $twitter = $dt->twitter;
    //                   $checkout = $dt->checkout;
                      
                      
    //                   $intagram_data = json_decode($intagram);
    //                   $facebook_data = json_decode($facebook);
    //                     $twitter_data = json_decode($twitter);
    //                      $checkout_data = json_decode($checkout);
                         
    //                      $insta_name = isset($_POST['insta_name']) && !empty($_POST['insta_name'])?$_POST['insta_name']:$intagram_data->link;
    //     $facebook_name = isset($_POST['facebook_name']) && !empty($_POST['facebook_name'])?$_POST['facebook_name']:$facebook_data->link;
    //     $twitter_name = isset($_POST['twitter_name']) && !empty($_POST['twitter_name'])?$_POST['twitter_name']:$twitter_data->link;
    //     $checkout_name = isset($_POST['checkout_name']) && !empty($_POST['checkout_name'])?$_POST['checkout_name']:$checkout_data->link;
        
        
                         
        
    //     $sett_array = array(
    //         "insta"=>json_encode(array('status'=>$intagram_data->status,'link'=>$insta_name)),
    //         "facebook"=>json_encode(array('status'=>$facebook_data->status,'link'=>$facebook_name)),
    //          "twitter"=>json_encode(array('status'=>$twitter_data->status,'link'=>$twitter_name)),
    //           "checkout"=>json_encode(array('status'=>$checkout_data->status,'link'=>$checkout_name)),
    //         );
                
    //       $res =  json_encode($sett_array);   
    //     //   print_r($res);
    //     //   die;
           
    //  $sett_arr = $this->Allsettings->set('Links',$res)->where('ID',$sett_id)->update();
    //  if($sett_arr){
    //      echo 1;
         
    //  }
    //  else{
    //      echo 0;
    //  }
 
        
        
    // }
    
    public function update_link_setting_data()
{
    $sett_id = $_POST['sett_id'];

    $sett_data = $this->Allsettings->first();
    $data = $sett_data['Links'];
    $dt = json_decode($data);

    $intagram = $dt->insta;
    $facebook = $dt->facebook;
    $twitter = $dt->twitter;
    $checkout = $dt->checkout;

    $intagram_data = json_decode($intagram);
    $facebook_data = json_decode($facebook);
    $twitter_data = json_decode($twitter);
    $checkout_data = json_decode($checkout);

    $insta_name = isset($_POST['insta_name']) && !empty($_POST['insta_name']) ? $_POST['insta_name'] : $intagram_data->link;
    $facebook_name = isset($_POST['facebook_name']) && !empty($_POST['facebook_name']) ? $_POST['facebook_name'] : $facebook_data->link;
    $twitter_name = isset($_POST['twitter_name']) && !empty($_POST['twitter_name']) ? $_POST['twitter_name'] : $twitter_data->link;
    $checkout_name = isset($_POST['checkout_name']) && !empty($_POST['checkout_name']) ? $_POST['checkout_name'] : $checkout_data->link;

    $sett_array = array(
        "insta" => json_encode(array('status' => $intagram_data->status, 'link' => $insta_name)),
        "facebook" => json_encode(array('status' => $facebook_data->status, 'link' => $facebook_name)),
        "twitter" => json_encode(array('status' => $twitter_data->status, 'link' => $twitter_name)),
        "checkout" => json_encode(array('status' => $checkout_data->status, 'link' => $checkout_name)),
    );

    $res = json_encode($sett_array);

    $sett_arr = $this->Allsettings->set('Links', $res)->where('ID', $sett_id)->update();

    if ($sett_arr) {
        echo 1;
    } else {
        echo 0;
    }
}

    
    // public function update_setting_data() 
    // {
    //   print_r($_POST);
    //     // die;
        
    //     $sett_id = $_POST['sett_id'];
    //     $status = $_POST['status'];
    //     $id = $_POST['id'];
        
    //     $sett_data = $this->Allsettings->first();
    //     $data = $sett_data['Links'];
    //     $dt = json_decode($data);
    //     print_r($dt);
    //     // die;
        
        
    //      $intagram = $dt->insta;
    //                   $facebook = $dt->facebook;
    //                   $twitter = $dt->twitter;
    //                   $checkout = $dt->checkout;
                      
                      
    //                   $intagram_data = json_decode($intagram);
    //                     print_r($intagram_data);
    //                     // die;
                        
                    
                      
    //                   $facebook_data = json_decode($facebook);
    //                     $twitter_data = json_decode($twitter);
    //                      $checkout_data = json_decode($checkout);
                         
    //     $instagarm_status = isset($_POST['insta_status']) && !empty($_POST['insta_status'])?$_POST['insta_status']:$intagram_data->status;
    //     $facebook_status = isset($_POST['fb_status']) && !empty($_POST['fb_status']) ? $_POST['fb_status'] :$facebook_data->status;
    //     $twitter_status = isset($_POST['twitter_status']) && !empty($_POST['twitter_status'])?$_POST['twitter_status']:$twitter_data->status;
    //     $checkout_status = isset($_POST['checkout_status']) && !empty($_POST['checkout_status'])?$_POST['checkout_status']:$checkout_data->status;
        
    //     $instagarm_link = $intagram_data->link;
       
    //   $facebook_link = $facebook_data->link;
    //   $twitter_link = $twitter_data->link;
    //   $checkout_link = $checkout_data->link;
                         
    //                     //  $instagarm_status = 0;
    //                     //  $facebook_status = 0;
    //                     //  $twitter_status = 0;
    //                     //  $checkout_status = 0;
                         
    //                      if ($id == 1) {
    //                          echo "a";
    //                             $instagarm_status = $status;
    //                      }
    //                      else if($id == 2) {
    //                              echo "aa";
    //                          $facebook_status = $status;
    //                      }
    //                      else if($id == 3) {
    //                           echo "aaa";
    //                          $twitter_status = $status;
    //                      }
    //                      else if($id == 4) {
    //                          $checkout_status = $status;
    //                          echo '1';
    //                      }
                         
    //                     //  die;
                         
                         
    //                       $sett_array = array(
    //         "insta"=>json_encode(array('status'=>$instagarm_status,'link'=>$instagarm_link)),
    //         "facebook"=>json_encode(array('status'=>$facebook_status,'link'=>$facebook_link)),
    //          "twitter"=>json_encode(array('status'=>$twitter_status,'link'=>$twitter_link)),
    //           "checkout"=>json_encode(array('status'=>$checkout_status,'link'=>$checkout_link)),
    //         );
                
    //       $res =  json_encode($sett_array);   
    //     //   print_r($res);
    //     //   die;
           
    //  $sett_arr = $this->Allsettings->set('Links',$res)->where('ID',$sett_id)->update();
    // //  echo $this->Allsettings->getLastQuery();
    // //  die;
     
    //  if($sett_arr){
    //      echo 1;
         
    //  }
    //  else{
    //      echo 0;
    //  }
 
        
        
    // }
    
public function update_setting_data() 
{
    // Get the posted data
    $sett_id = $_POST['sett_id'];
    $status = $_POST['status'];
    $id = $_POST['id'];
    
    // Get existing settings data from the database
    $sett_data = $this->Allsettings->first();
    $data = $sett_data['Links'];
    $dt = json_decode($data, true); // Use true to decode as an associative array
    
    // Extract individual settings
    $intagram_data = json_decode($dt['insta'], true);
    $facebook_data = json_decode($dt['facebook'], true);
    $twitter_data = json_decode($dt['twitter'], true);
    $checkout_data = json_decode($dt['checkout'], true);

    // Determine which setting to update based on $id
    switch ($id) {
        case 1:
            $intagram_data['status'] = $status;
            break;
        case 2:
            $facebook_data['status'] = $status;
            break;
        case 3:
            $twitter_data['status'] = $status;
            break;
        case 4:
            $checkout_data['status'] = $status;
            break;
        // Add more cases as needed for other settings
        
        default:
            // Handle default case if needed
            break;
    }

    // Create a new settings array
    $sett_array = array(
        'insta' => json_encode($intagram_data),
        'facebook' => json_encode($facebook_data),
        'twitter' => json_encode($twitter_data),
        'checkout' => json_encode($checkout_data),
    );

    // Encode the settings array as a JSON string
    $res = json_encode($sett_array);

    // Update the database with the new settings
    $sett_arr = $this->Allsettings->set('Links', $res)->where('ID', $sett_id)->update();

    // Check if the update was successful
    if ($sett_arr) {
        echo 1;
    } else {
        echo 0;
    }
}



}

