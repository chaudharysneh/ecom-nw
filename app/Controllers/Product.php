<?php
    namespace App\Controllers;
    use App\Models\Categorymodel;
    use App\Models\Subcategorymodel;
    use App\Models\Productmodel;
    use App\Models\Variationmodel;
    use App\Models\variationtypemodel;
    use App\Models\Optionmodel;
    use App\Models\VariationsDetails;
    use App\Models\CountryModel;
    use App\Models\StateModel;
    use App\Models\Wishlistmodel;
    use App\Models\Template;
    use App\Models\Variationvaluemodel;
    use App\Models\Reviewmodel;


class Product extends BaseController
{
    protected $Categorymodel;
    protected $Subcategorymodel;
    protected $Productmodel;
    protected $Variation;
    protected $variationtype;
    protected $Optionmodel;
    protected $Wishlistmodel;
    protected $Variationvaluemodel;
    protected $Reviewmodel;
    protected $session;

    public function __construct()
    {
        $db = \Config\Database::connect();
        $this->Categorymodel = new Categorymodel($db);
        $this->Productmodel = new Productmodel($db);
        $this->Variation = new Variationmodel($db);
        $this->variationtype = new variationtypemodel($db);
        $this->Optionmodel = new Optionmodel($db);
        $this->Wishlistmodel = new Wishlistmodel($db);
        $this->Subcategorymodel = new Subcategorymodel($db);
        $this->Variationvaluemodel = new Variationvaluemodel($db);
         $this->Reviewmodel = new Reviewmodel($db);
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $user_id = $this->session->get('user_id');
        //$data['product'] = $this->Productmodel->findAll();
        $search = $this->request->getVar('search');
        $searchprd = base64_decode($this->request->getVar('prd'));
        $minimum_price = base64_decode($this->request->getVar('minimum_price'));
        $maximum_price = base64_decode($this->request->getVar('maximum_price'));
        $sort = base64_decode($this->request->getVar('sort'));
        $searchdata = base64_decode($this->request->getvar('searchprd'));
        
        $productQuery = $this->Productmodel->select('*');
        if (!empty($search))    
        {
            $productQuery->like('ProductName', $search,'both');
        } 
        elseif (!empty($searchprd)) 
        {
            $productQuery->like('ProductName', $searchprd,'both');
        }
        if(!empty($searchdata))
        {
            $productQuery->like('ProductName', $searchdata,'both');
        }
        if ($minimum_price > -1 && !empty($maximum_price)) 
        {
            $productQuery->where('ProductPrice >=', $minimum_price);
            $productQuery->where('ProductPrice <=', $maximum_price);
        }
        
        if (!empty($sort)) 
        {
            $productQuery->orderBy('ProductPrice', $sort);
        }
        
        // Fetch the paginated results
        $product = $productQuery->paginate(8);
        $wislist=[];
        foreach($product as $prd)    
        {
            $wislist[] = $this->Wishlistmodel->where('UserID', $user_id)->where('ProductID',$prd['ProductID'])->first();
        } 
        $catdata= $this->Categorymodel->where('ParentCategoryID', '0')->findAll();
        $catprod=[];
        foreach($catdata as $cat)    
        {
            $catprod[] = $this->Productmodel->where('CategoryID',$cat['CategoryID'])->countAllResults();
        }  
        
        $data = [
            'sort' => $sort,
            'cat' => $this->Categorymodel
                ->where('ParentCategoryID', '0')
                ->findAll(),
            'countcat' => $catprod,
            'product' => $product,
            'wishlist'=>$wislist,
            'minimum_price' => $minimum_price,
            'maximum_price' => $maximum_price,
            'pager' => $this->Productmodel->pager,
            'search_term' => $search ?? $searchprd,
        'no_matches' => empty($product),
        ];
        // print_r($data);
        $data['catdata'] = $this->Categorymodel->findAll();
        $data['subdata']=[];
        foreach($data['catdata'] as $cat)
        {
            //$data['subdata']=$this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $data['subdata'][$cat['CategoryID']] = $subcategories;
        }
        // $data['varia_dt']=$this->Variation->where('ProductID',$data['all_product_data']['ProductID'])->get()->getResult('array');
        
        $data['variation'] = $this->variationtype
            ->where('VariationTypeName', 'color')
            ->first();
            // echo "<pre>";print_r($data); die;
        return view('products', $data);
    }


    // ------------ New Arrivals --------------------
    public function newProducts()
{
    $user_id = $this->session->get('user_id');
    $search = $this->request->getVar('search');
    $searchprd = base64_decode($this->request->getVar('prd'));
    $minimum_price = base64_decode($this->request->getVar('minimum_price'));
    $maximum_price = base64_decode($this->request->getVar('maximum_price'));       
    $sort = base64_decode($this->request->getVar('sort'));
    $searchdata = base64_decode($this->request->getVar('searchprd'));

    // Base query to fetch products
    $productQuery = $this->Productmodel->select('*');
    
    // Apply search filters
    if (!empty($search)) {
        $productQuery->like('ProductName', $search, 'both');
    } elseif (!empty($searchprd)) {
        $productQuery->like('ProductName', $searchprd, 'both');
    }
    if (!empty($searchdata)) {
        $productQuery->like('ProductName', $searchdata, 'both');
    }

    // Apply price range filter
    if ($minimum_price > -1 && !empty($maximum_price)) {
        $productQuery->where('ProductPrice >=', $minimum_price);
        $productQuery->where('ProductPrice <=', $maximum_price);
    }

    // Sort by latest products
    $productQuery->orderBy('created_at', 'DESC'); // Use 'ProductID' if no 'created_at'

    // Apply optional price sorting
    if (!empty($sort)) {
        $productQuery->orderBy('ProductPrice', $sort);
    }

    // Fetch paginated results
    $product = $productQuery->paginate(8);

    // Fetch wishlist data
    $wishlist = [];
    foreach ($product as $prd) {
        $wishlist[] = $this->Wishlistmodel->where('UserID', $user_id)->where('ProductID', $prd['ProductID'])->first();
    }

    // Fetch categories and related product counts
    $catdata = $this->Categorymodel->where('ParentCategoryID', '0')->findAll();
    $catprod = [];
    foreach ($catdata as $cat) {
        $catprod[] = $this->Productmodel->where('CategoryID', $cat['CategoryID'])->countAllResults();
    }

    // Prepare data for the view
    $data = [
        'sort' => $sort,
        'cat' => $this->Categorymodel
            ->where('ParentCategoryID', '0')
            ->findAll(),
        'countcat' => $catprod,
        'product' => $product,
        'wishlist' => $wishlist,
        'minimum_price' => $minimum_price,
        'maximum_price' => $maximum_price,
        'pager' => $this->Productmodel->pager,
        'search_term' => $search ?? $searchprd,
        'no_matches' => empty($product),
    ];

    // Fetch categories and subcategories
    $data['catdata'] = $this->Categorymodel->findAll();
    $data['subdata'] = [];
    foreach ($data['catdata'] as $cat) {
        $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
        $data['subdata'][$cat['CategoryID']] = $subcategories;
    }

    // Fetch variations
    $data['variation'] = $this->variationtype
        ->where('VariationTypeName', 'color')
        ->first();

    return view('newProducts', $data);
}


    // ===========================


    public function single_product($id)
    {
        $data['all_product_data'] = $this->Productmodel->where('ProductID',$id)->first();
        $data['all_variation_data'] = $this->Variation->where('ProductID',$id)->findAll();

        return view('single-product', $data);
    }
    
    public function product_detail($slug,$id)
    {
        // print_r($id);
        $id= base64_decode($id);
        // print_r($id); die;
        $VariationsDetails = new VariationsDetails();
        
        $data['all_product_data'] = $this->Productmodel->join('variations','variations.ProductID = products.ProductID')->where('products.ProductID',$id)->first();
        // print_r($data['all_product_data']); die;
        $data['prod'] = $this->Categorymodel->where('CategoryID', $data['all_product_data']['CategoryID'])->get()->getRow();
        // print_r($data['prod']); die;
        $data['varia_dt']=$this->Variation->where('ProductID',$data['all_product_data']['ProductID'])->get()->getResult('array');
        $data['all_variation_data'] = $this->Variation->where('ProductID',$id)->findAll();
        
        //SELECT * FROM variations v JOIN VariationsDetails vd ON v.VariationID=vd.VariationID LEFT JOIN variation_value vv ON vv.VariationID=vd.VariationVlueID WHERE v.ProductID='70' GROUP BY v.VariationID
        $data['variation_data'] = $this->Variation->select('v.*,v.VariationID as vid,vd.*,vv.*')->from('variations v')->join('VariationsDetails vd','v.VariationID=vd.VariationID','left')->join('variation_value vv','vv.VariationID=vd.VariationVlueID','left')->where('v.ProductID',$id)->groupBy('v.VariationID')->findAll();
        foreach($data['variation_data'] as $key=>$val){
            $tmp_data = $VariationsDetails->where('VariationID',$val['vid'])->findAll();
            $data['variation_data'][$key]['VariationVlueID']= array_column($tmp_data,'VariationVlueID');
        }
        $data['varrtype'] = $this->variationtype->get()->getResult('array');
        $variation_value_ids = array_column($data['variation_data'],'VariationVlueID');
        $mergedData = array_reduce($variation_value_ids, 'array_merge', []);
        $mergedData = array_unique($mergedData);
        // print_r($variation_value_ids);die;
       $data['variationsval']=[];
        foreach($data['varrtype'] as $vares)
        {
            
            $data['variationsval'][$vares['VariationTypeID']] = $this->Variationvaluemodel->where('VariationTypeID',$vares['VariationTypeID'])->whereIn('VariationID',$mergedData)->findAll();
            // $data['variationsval'][$vares['VariationTypeID']] = $this->Variationvaluemodel->where('VariationTypeID',$vares['VariationTypeID'])->findAll();
            $data['getvariation'] = $this->Variation->where('VariationTypeID',$vares['VariationTypeID'])->where('ProductID',$data['all_product_data']['ProductID'])->get()->getResult('array');
        }
        
        $data['variations_data'] = array();
        // print_r($data['variations_data']);
            $varIds = array();
            $defaultvariation = array();
            if(!empty($data['all_variation_data'])){
                foreach($data['all_variation_data'] as $variation){
                    if($variation['defaultProduct']==1){
                        $varId =  $variation['VariationID'];
                        $variation['variation'] = $VariationsDetails
                        ->join('variation_value','variation_value.VariationID=VariationsDetails.VariationVlueID')
                        ->where('VariationsDetails.VariationID', $varId)
                        //->groupBy('VariationsDetails.VariationVlueID')
                        ->findAll();
                        $defaultvariation =  $variation;
                    }
                    $varIds[] =  $variation['VariationID'];
                }
            }
            $data['varIds'] = $varIds;
            // print_r($data['varIds']);
           
            $data['defaultvariation'] = $defaultvariation;
            
            if(!empty($varIds)){
                $data['VariationVlues'] = $VariationsDetails
                    ->join('variation_value','variation_value.VariationID=VariationsDetails.VariationVlueID')
                    ->whereIN('VariationsDetails.VariationID', $varIds)
                    ->groupBy('VariationsDetails.VariationVlueID')
                    ->findAll();
                $data['VariationTypes'] = $VariationsDetails
                    ->select('variation_type.VariationTypeID,variation_type.VariationTypeName')
                    ->join('variation_value','variation_value.VariationID=VariationsDetails.VariationVlueID')
                    ->join('variation_type','variation_type.VariationTypeID=variation_value.VariationTypeID')
                    ->whereIN('VariationsDetails.VariationID', $varIds)
                    ->groupBy('variation_value.VariationTypeID')
                    ->findAll();
                    // print_r($data['VariationTypes']);
            //   echo $VariationsDetails->getLastQuery();
                
            }
            $CountryModel = new CountryModel();
            $data['countries'] = $CountryModel->findAll();
            $StateModel = new StateModel();
            $data['states'] = $StateModel->findAll();
            $data['catdata'] = $this->Categorymodel->findAll();
             $data['subdata']=[];
            foreach($data['catdata'] as $cat)
            {
                //$data['subdata']=$this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
                $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
                $data['subdata'][$cat['CategoryID']] = $subcategories;
            }
            
            $data['all_review_data'] = $this->Reviewmodel->where('ProductID',$id)->findAll();
    //   echo"<pre>";print_r($data); die;
        return view('single_product',$data);
    }
    
    public function getvariationsprice(){
        $variations = $this->request->getPost('variations');
        $VariationID = $this->request->getPost('VariationID');
        $VariationID = explode(',', $VariationID);
        $VariationsDetails = new VariationsDetails();


         $data = $VariationsDetails->whereIn('VariationID', $VariationID)
                ->whereIn('VariationVlueID', $variations)
                ->findAll();

    
        $product_price = '';
        $counts = array_count_values(array_column($data, 'VariationID'));
        if($counts){
            foreach($counts as $key=>$count){
                if($count == count($variations)){
                    $fprise = $this->Variation->where('VariationID',$key)->first();
                    $product_price =  $fprise['VariationPrice'];
                }
            }
        }
        

        echo "₹".$product_price;
    }

    public function filter_prd_data()
    {
        $minimum_price = $this->request->getPost('minimum_price');
        $maximum_price = $this->request->getPost('maximum_price');
        $color = $this->request->getPost('color');
        $sort = $this->request->getPost('sort');
        
       
        if (!empty($color)) {
            $paginateData = $this->Productmodel
                ->select('*')
                ->where('ProductPrice >=', $minimum_price)
                ->where('ProductPrice <=', $maximum_price)
                ->whereIN('VariationID', $color)
                ->paginate(8);
        } elseif (
            !empty($color) &&
            !empty($minimum_price) &&
            !empty($maximum_price)
        ) {
            $paginateData = $this->Productmodel
                ->select('*')
                ->where('ProductPrice >=', $minimum_price)
                ->where('ProductPrice <=', $maximum_price)
                ->whereIN('VariationID', $color)
                ->paginate(8);
        } else {
            $paginateData = $this->Productmodel
                ->select('*')
                ->where('ProductPrice >=', $minimum_price)
                ->where('ProductPrice <=', $maximum_price)
                ->paginate(8);
        }

        $data = [
            'product' => $paginateData,
            'pager' => $this->Productmodel->pager,
        ];

        foreach ($data['product'] as $prd) { ?>
        <div class="col-md-4 product_col">
		 	<div class="bbb_deals">
				
		 		<div class="bbb_deals_title"></div>
		 		    <div class="bbb_deals_slider_container">
		 		        <div class=" bbb_deals_item">
		 		            <div class="bbb_deals_image"><img src="<?php echo base_url(
                     'public/images/products/' . $prd['ProductImage']
                 ); ?>" alt="#" style="height:200px;width:200px;"></div>
		 		                        <div class="bbb_deals_content">
				                          
		 		                            <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
		 		                                <div class="bbb_deals_item_name"><p><?php
                                     helper('text');
                                     echo word_limiter($prd['ProductName'], 3);
                                     ?></p></div>
		 		                                <div class="bbb_deals_item_price ml-auto">₹<?php echo $prd[
                                         'ProductPrice'
                                     ]; ?></div>
		 		                            </div>
		 		                            <div class="available">
				                                
		 		                                <div class="available_bar"><span style="width:17%"></span></div>
		 		                            </div>
		 		                        </div>
		 		                    </div>
		 		                </div>
		 		                <div class="button d-flex text-center">
		 							<a href="<?php echo base_url(
              'single_product'
          ); ?>" class="btn link-text mt-3 m-1 view_btn">View Details</a>
		 							<a href="<?php echo base_url(
              'cart'
          ); ?>" class="btn cart_btn link-text mt-3 m-1">Add to Cart</a>
		 						</div>
		 		            </div>
		                </div>
            <?php }
    }

    public function filter_price()
    {
        
        $sort = $this->request->getPost('sort');
        $paginateData = $this->Productmodel
            ->orderBy('ProductPrice', $sort)
            ->get()
            ->getResult('array');
        foreach ($paginateData as $prddt) { ?>
            <div class="col-md-4 product_col">
			<div class="bbb_deals">
				
				<div class="bbb_deals_title"></div>
				    <div class="bbb_deals_slider_container">
				        <div class=" bbb_deals_item">
				            <div class="bbb_deals_image">
				            <?php
	                             $jsondt = json_decode($prddt['ProductImage']);
                            ?>
				            <img src="<?php echo base_url(
                    'admin/public/assets/img/product_images/'.$jsondt[0]
                ); ?>" alt="#" style="height:400px;width:400px;"></div>
				                        <div class="bbb_deals_content">
				                            
				                            <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
				                                <div class="bbb_deals_item_name"><p><?php
                                    helper('text');
                                    echo word_limiter($prddt['ProductName'], 3);
                                    ?>
                                                </p></div>
				                                <div class="bbb_deals_item_price ml-auto">₹<?php echo $prddt[
                                        'ProductPrice'
                                    ]; ?></div>
				                            </div>
				                            <div class="available">
				                                
				                                <div class="available_bar"><span style="width:17%"></span></div>
				                            </div>
				                        </div>
				                    </div>
				                </div>
				                <div class="button d-flex text-center">
									<a href="<?php echo base_url(
             'single_product'
         ); ?>" class="btn link-text mt-3 m-1 view_btn">View Details</a>
									<a href="<?php echo base_url(
             'cart'
         ); ?>" class="btn cart_btn link-text mt-3 m-1">Add to Cart</a>
								</div>
				            </div>
						</div>
            <?php }
    }

    
    public function save_edited_image(){
        $image = $this->request->getFile('image');
        $productId = $this->request->getPost('productId');
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getRandomName();
            $image->move('./uploads', $newName);
            $imagePath = base_url('uploads/' . $newName);
            // Generate a unique ID
            $uniqueId = uniqid();
            // Store the unique ID and image path in session
            $data = ['success' => true, 'image_path' => $imagePath , 'uniqueId'=>$uniqueId , 'productId'=>$productId ,'url'=> base_url().'product_detail/'.$productId.'?uid='.$uniqueId];
            session()->set($uniqueId, $data);
            // Optionally, you can save the file information to the database or perform other operations.
            
            return $this->response->setJSON(['success' => true,'uniqueId'=>$uniqueId , 'data'=>$data]);
          }
          return $this->response->setJSON(['success' => false, 'error' => 'Invalid file.']);

    }
    
    
   
    
    public function wishlist()
    {
        $data_arr = [];
        $all_trans_data = $this->Wishlistmodel->findAll(); 
        
        if (!empty($all_trans_data)) {
            foreach ($all_trans_data as $single_trans_data) {
                $user_id = $single_trans_data['UserID'];
                $product_id = $single_trans_data['ProductID'];
                $user_data = $this->Productmodel->where('ProductID', $product_id)->first();
                
                if ($user_data !== null) { // Check if $user_data is not null
                    $product_sku = $user_data['ProductSKU'];
                    $catagory_id = $user_data['CategoryID'];
                    $subcatagory_id = $user_data['SubCategoryID'];
                    $product_name = $user_data['ProductName'];
                    $product_price = $user_data['ProductPrice'];
                    $product_image = $user_data['ProductImage'];
                    $product_stock = $user_data['ProductStock'];
                    $product_quantity = $user_data['product_quantity'];
                    $slug=$user_data['slug'];
                    
                    $new_arr['wishlist_id'] = $single_trans_data['ID'];
                    $new_arr['ProductSKU'] = $product_sku;
                    $new_arr['CategoryID'] = $catagory_id;
                    $new_arr['SubCategoryID'] = $subcatagory_id;
                    $new_arr['ProductName'] = $product_name;
                    $new_arr['ProductPrice'] = $product_price;
                    $new_arr['ProductImage'] = $product_image;
                    $new_arr['ProductStock'] = $product_stock;
                    $new_arr['product_quantity'] = $product_quantity;
                    $new_arr['slug'] = $slug;
                    
                    $new_arr['UserID'] = $single_trans_data['UserID'];
                    $new_arr['ProductID'] = $single_trans_data['ProductID'];
                    
                    array_push($data_arr, $new_arr);
                }
            }
        }
        $data['catdata'] = $this->Categorymodel->findAll();
         $data['subdata']=[];
        foreach($data['catdata'] as $cat)
        {
            //$data['subdata']=$this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $subcategories = $this->Subcategorymodel->where('category_id', $cat['CategoryID'])->get()->getResult('array');
            $data['subdata'][$cat['CategoryID']] = $subcategories;
        }
        $data['all_wishlist_data'] = $data_arr;
        
        foreach($data['all_wishlist_data'] as $wishlist)
        {
            $data['prod']= $this->Categorymodel->where('CategoryID', $wishlist['CategoryID'])->get()->getRow();
            $data['varia_dt']=$this->Variation->where('ProductID',$wishlist['ProductID'])->get()->getResult('array');
        }
        return view('my_wishlist', $data);
    }

    
    public function add_to_wishlist()
    {
        // echo "hii";
         $session = session();
        //   print_r($session);
         $id = $session->get('user_id');
        //  print_r($id);
         
         $productId = $this->request->getVar('product_ids');
        //   $quantity = $this->request->getVar('quantity');
          
        //   print_r($_POST);
          
           $all_data=[
            'ProductID'=>$productId,
            'UserID'=>$id,
            'Status'=>1,
            
            ];
            
            // print_r($all_data);
            
            $res = $this->Wishlistmodel->insert($all_data); 
            if($res) {
                echo "1";
            }
            else{
                echo "0";
            }
            
          
        // return view('my_wishlist');
    }
    
    
    public function delete_wishlist(){
        $productId = $this->request->getVar('product_ids');
        $this->Wishlistmodel->where('ProductID',$productId);
            $delete=$this->Wishlistmodel->delete(); 
       
       
            if($delete){
                echo 1;
            }else{
                echo 0;
            }
        
    }

    public function product_design_customize($pro_id = null){
        $data = array();
        $product = array();
           if($pro_id!=null){
            $product = $this->Productmodel->where('ProductID',$pro_id)->first();
           }
           $Template = new Template();
           $data['templates'] = $Template->where('type','template')->findAll();
           $data['gallary'] = $Template->where('type','gallary')->findAll();
    
          $sessionId = session('userSessionId');
          if ($sessionId) {
            $data['uploads'] = $Template->where(['session'=> $sessionId , 'type'=>'upload'])->findAll();
           }
           $data['new_templates'] = array();
           if($this->request->getGet('template_id')){
              $template_id = $this->request->getGet('template_id');
              $where = array('templateID'=>$template_id); 
              $new_data = $Template->find($template_id); 
              if($new_data){
                 $data['new_templates'] =  $new_data['image'];
              }
              
           }
        $data['product'] = $product;
        return view('product_design_customize',$data);
    }

    public function templates($product_id=null){

        $data = array();
        $Template = new Template();
        $data['product_id'] = $product_id;
        $where = array('type'=>'template' , 'ProductID'=>$product_id);
        $data['templates'] = $Template->where($where)->findAll();
        return view('templates',$data);
    }
    
    public function show_variation()
    {
        $product = $this->request->getPost('product_id');
        $color = $this->request->getPost('color');
        $size = $this->request->getPost('size');
        $material = $this->request->getPost('material');
        
        $prddata = $this->Variation->join('VariationsDetails','variations.VariationID=VariationsDetails.VariationID')->where('variations.ProductID',$product)->whereIn('VariationsDetails.VariationVlueID',[$color,$size,$material])->groupBy('VariationsDetails.VariationVlueID')->get()->getResult('array');
        $pricearr=[];
        foreach($prddata as $prd)
        {
            $pricearr[]=$prd['VariationPrice'];
        }
        $priceval=array_sum($pricearr);
        
        echo json_encode(array("status"=>'success',"price"=>$priceval));
    }
    
//     public function show_variation1()
//     {
        
//         // print_r($_POST);die;
//         $varrtype = $this->request->getPost('varrtype');
//         $product = $this->request->getPost('product_id');
//         $varrval = $this->request->getPost('varrval');
//         // print_r($varrval);die;
//         $tmp_arr = array();
//         $VariationsDetails = new VariationsDetails();
//         foreach($varrtype as $key=>$val){
//             $tmp_arr[$val] = $varrval[$key];
//             if(!empty($varrval[$key])){
//                 $prddata = $this->Variation->join('VariationsDetails','variations.VariationID=VariationsDetails.VariationID')->where('variations.ProductID',$product)->where('VariationsDetails.VariationVlueID',$varrval[$key])->findAll();
//                 $VariationID = array_column($prddata,'VariationID');
                
//                 $arr = array();
//                 foreach($VariationID as $val){
//                     $data = $VariationsDetails->where('VariationID', $val)->findAll();
//                     $dataVariationID = array_column($data,'VariationVlueID');
                    
//                     $arr[$val] = $dataVariationID;
//                 }
//                 break;
//             }
//         }
//         $result = [];
        
//         if(!isset($arr)){
//             $arr= array();
//         }
        
//         foreach ($varrtype as $columnName) {
//             $result[ucfirst($columnName)] = array_column($arr, array_search($columnName, $varrtype));
//         }
        
            
//         $isEmpty = false;
//         $tmp_arr= array_values($result);
//         // print_r($arr);die;
//         foreach ($varrval as $key=>$value) {
            
//             $allZeros = array_sum($tmp_arr[$key]) === 0;
//             if($allZeros){
//                 $varrval[$key]=0;
//             }
            
//             if (empty($value) && !$allZeros) {
//                 $isEmpty = true;
//                 break;
//             }
//         }
//         // print_r($tmp_arr);
//         // print_r($varrval);
        
//         test1:
//         if ($isEmpty || (isset($goto) && $goto)) {
//             $resultIndex = array_column($result,0);
//             if(isset($goto) && $goto){
//             // print_R('$resultIndex');die;
                
//                 // $filteredArray = array_filter($originalArray);
//             }
//             // print_r('$resultIndex');
//         } else {
//             // print_r('$resultIndex1');
            
//             $resultIndex = $varrval;
//         }
//         // print_r($result);
//         // print_r($resultIndex);die;
        
//         // $result = array_map('array_unique', $result);
//         $priceval =0;
//         if(!empty($result)){
//             $resultIndex1 = array_values(array_filter($resultIndex, function ($value) { return $value != 0;}));
            
//             // $prddata = $this->Variation->join('VariationsDetails','variations.VariationID=VariationsDetails.VariationID')->where('variations.ProductID',$product)->whereIn('VariationsDetails.VariationVlueID',$resultIndex)->first();
//             $prddata = $this->Variation->join('VariationsDetails', 'variations.VariationID = VariationsDetails.VariationID')
//                     ->where('variations.ProductID', $product)
//                     ->whereIn('VariationsDetails.VariationVlueID', $resultIndex1)
//                     ->groupBy('variations.VariationID')
//                     ->having('COUNT(DISTINCT VariationsDetails.VariationVlueID)', count($resultIndex1))->first();
//             if(empty($prddata)){
// // print_r($this->Variation->getLastQuery());die;
//                 if(!isset($goto)){
//                     $goto = true;
//                     goto test1;
//                 }
//             }
            
//             $VariationID = $prddata['VariationID'];
//             // print_r($VariationID);die;
//             $priceval = $prddata['Sale_VariationPrice'];
//             if($priceval == null || $priceval == 0){
//                 $priceval = $prddata['VariationPrice'];
//             }
            
//         }
        
//         echo json_encode(array("status"=>'success',"VariationID"=>$VariationID,"price"=>$priceval,'availble'=>$result,'selected_data'=>$resultIndex));
//     }

    public function show_variation1()
    {
        $varrtype = $this->request->getPost('varrtype');
        $product = $this->request->getPost('product_id');
        $varrval = $this->request->getPost('varrval');
        $tmp_arr = array();
        $VariationsDetails = new VariationsDetails();
        foreach($varrtype as $key=>$val){
            $tmp_arr[$val] = $varrval[$key];
            if(!empty($varrval[$key])){
                $prddata = $this->Variation->join('VariationsDetails','variations.VariationID=VariationsDetails.VariationID')->where('variations.ProductID',$product)->where('VariationsDetails.VariationVlueID',$varrval[$key])->findAll();
                $VariationID = array_column($prddata,'VariationID');
                
                $arr = array();
                foreach($VariationID as $val){
                    $data = $VariationsDetails->where('VariationID', $val)->findAll();
                    $dataVariationID = array_column($data,'VariationVlueID');
                    
                    $arr[$val] = $dataVariationID;
                }
                break;
            }
        }
        $result = [];
        
        if(!isset($arr)){
            $arr= array();
        }
        
        foreach ($varrtype as $columnName) {
            $result[ucfirst($columnName)] = array_column($arr, array_search($columnName, $varrtype));
        }
            
        $isEmpty = false;
        $tmp_arr= array_values($result);
        
        foreach ($varrval as $key=>$value) {
            
            $allZeros = array_sum($tmp_arr[$key]) === 0;
            if($allZeros){
                $varrval[$key]=0;
            }
            
            if (empty($value) && !$allZeros) {
                $isEmpty = true;
                break;
            }
        }
        
        test1:
        if ($isEmpty || (isset($goto) && $goto)) {
            $resultIndex = array_column($result,0);
            if(isset($goto) && $goto){
            }
        } else {
            $resultIndex = $varrval;
        }
        
        $priceval =0;
        if(!empty($result)){
            $resultIndex1 = array_values(array_filter($resultIndex, function ($value) { return $value != 0;}));
            
            $prddata = $this->Variation->join('VariationsDetails', 'variations.VariationID = VariationsDetails.VariationID')
                    ->where('variations.ProductID', $product)
                    ->whereIn('VariationsDetails.VariationVlueID', $resultIndex1)
                    ->groupBy('variations.VariationID')
                    ->having('COUNT(DISTINCT VariationsDetails.VariationVlueID)', count($resultIndex1))->first();
            if(empty($prddata)){
                if(!isset($goto)){
                    $goto = true;
                    goto test1;
                }
            }
            $VariationID = $prddata['VariationID'];
            $defaultProd = $prddata['defaultProduct'];
            $priceval = $prddata['Sale_VariationPrice'];
            
            // if($priceval == null || $priceval == 0){
            //     $priceval = $prddata['VariationPrice'];
            // }
            
            if ($priceval == null || $priceval == 0) {
            $defaultProduct = $this->Variation
                ->where('ProductID', $product)
                ->where('defaultProduct', 1)
                ->first();

                if ($defaultProduct) {
                    $priceval = $defaultProduct['Sale_VariationPrice'];
                }
            }
            
        }
        echo json_encode(array("status"=>'success',"VariationID"=>$VariationID,"price"=>$priceval,'availble'=>$result,'selected_data'=>$resultIndex));
    }
    
    
    
    public function show_variation2()
    {
        
        // print_r($_POST);die;
        $varrtype = $this->request->getPost('varrtype');
        $product = $this->request->getPost('product_id');
        $varrval = $this->request->getPost('varrval');
        // echo "<pre>";
        // print_r( $this->request->getPost());
        // echo "</pre>";
        // die;
        $tmp_arr = array();
        $VariationsDetails = new VariationsDetails();
        foreach($varrtype as $key=>$val){
            $tmp_arr[$val] = $varrval[$key];
            if(!empty($varrval[$key])){
                $prddata = $this->Variation->join('VariationsDetails','variations.VariationID=VariationsDetails.VariationID')->where('variations.ProductID',$product)->where('VariationsDetails.VariationVlueID',$varrval[$key])->findAll();
                $VariationID = array_column($prddata,'VariationID');
                
                $arr = array();
                foreach($VariationID as $val){
                    $data = $VariationsDetails->where('VariationID', $val)->findAll();
                    $dataVariationID = array_column($data,'VariationVlueID');
                    
                    $arr[$val] = $dataVariationID;
                }
                break;
            }
        }
        $result = [];
        
        if(!isset($arr)){
            $arr= array();
        }
        
        foreach ($varrtype as $columnName) {
            $result[ucfirst($columnName)] = array_column($arr, array_search($columnName, $varrtype));
        }
        
            
        $isEmpty = false;
        $tmp_arr= array_values($result);
        // print_r($arr);die;
        foreach ($varrval as $key=>$value) {
            
            // $allZeros = array_sum($tmp_arr[$key]) === 0;
            // if($allZeros){
            //     $varrval[$key]=0;
            // }
            
            // if (empty($value) && !$allZeros) {
            if (empty($value) && $value != 0 ) {
                $isEmpty = true;
                break;
            }
        }
        // print_r($tmp_arr);
        // print_r($varrval);
        
        test1:
        if ($isEmpty || (isset($goto) && $goto)) {
            $resultIndex = array_column($result,0);
            if(isset($goto) && $goto){
            // print_R('$resultIndex');die;
                
                // $filteredArray = array_filter($originalArray);
            }
            // print_r('$resultIndex');
        } else {
            // print_r('$resultIndex1');
            
            $resultIndex = $varrval;
        }
        // print_r($result);
        // print_r($resultIndex);die;
        
        // $result = array_map('array_unique', $result);
        $priceval =0;
        if(!empty($result)){
            
            // $resultIndex1 = array_values(array_filter($resultIndex, function ($value) { return $value != 0;}));
            
            // $prddata = $this->Variation->join('VariationsDetails','variations.VariationID=VariationsDetails.VariationID')->where('variations.ProductID',$product)->whereIn('VariationsDetails.VariationVlueID',$resultIndex)->first();
            $prddata = $this->Variation->join('VariationsDetails', 'variations.VariationID = VariationsDetails.VariationID')
                    ->where('variations.ProductID', $product)
                    ->whereIn('VariationsDetails.VariationVlueID', $resultIndex)
                    ->groupBy('variations.VariationID')
                    ->having('COUNT(DISTINCT VariationsDetails.VariationVlueID)', count($resultIndex))->first();
                //   print_r($this->Variation->getLastQuery());die; 
            if(empty($prddata)){
// print_r($this->Variation->getLastQuery());die;
                // if(!isset($goto)){
                //     $goto = true;
                //     goto test1;
                // }
            }
            if(!empty($prddata)){
                $VariationID = $prddata['VariationID'];
                // print_r($VariationID);die;
                $priceval = $prddata['Sale_VariationPrice'];
                if($priceval == null || $priceval == 0){
                    $priceval = $prddata['VariationPrice'];
                }
                $display_price = $prddata['VariationPrice'];
                if($display_price == $priceval){
                    $display_price = false;
                }
            }else{
                // print_r('hhh');die;
                $priceval = 'out of stock';
                $display_price = false;
                $VariationID = '';
            }
            
        }
        
        echo json_encode(array("status"=>'success',"VariationID"=>$VariationID,"price"=>$priceval,"display_price"=>$display_price,'availble'=>$result,'selected_data'=>$resultIndex));
    }
    
}
