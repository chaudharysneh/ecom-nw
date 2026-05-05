<style>
    #slider-text{
  padding-top: 40px;
  display: block;
}
.product-action-2{
    position:unset!important;
}
#slider-text .col-md-6{
  overflow: hidden;
}

#slider-text h2 {
  font-family: 'Josefin Sans', sans-serif;
  font-weight: 400;
  font-size: 30px;
  letter-spacing: 3px;
  margin: 30px auto;
  padding-left: 40px;
}
#slider-text h2::after{
  border-top: 2px solid #c7c7c7;
  content: "";
  position: absolute;
  bottom: 35px;
  width: 100%;
  }

#itemslider h4{
  font-family: 'Josefin Sans', sans-serif;
  font-weight: 400;
  font-size: 12px;
  margin: 10px auto 3px;
}
#itemslider h5{
  font-family: 'Josefin Sans', sans-serif;
  font-weight: bold;
  font-size: 12px;
  margin: 3px auto 2px;
}
#itemslider h6{
  font-family: 'Josefin Sans', sans-serif;
  font-weight: 300;;
  font-size: 10px;
  margin: 2px auto 5px;
}
.badge {
  background: #b20c0c;
  position: absolute;
  height: 40px;
  width: 40px;
  border-radius: 50%;
  line-height: 31px;
  font-family: 'Josefin Sans', sans-serif;
  font-weight: 300;
  font-size: 14px;
  border: 2px solid #FFF;
  box-shadow: 0 0 0 1px #b20c0c;
  top: 5px;
  right: 25%;
}
#slider-control img{
  padding-top: 60%;
  margin: 0 auto;
}
@media screen and (max-width: 992px){
#slider-control img {
  padding-top: 70px;
  margin: 0 auto;
}
}

   .product-action {
    display: flex!important;
}



</style>
<?= $this->include('header') ?>

<?php
$AllsettingsModel = new \App\Models\Allsettingsmodel();
$all_setting_data = $AllsettingsModel->first();
?>

<div class="single_product">
	<div class="container">
		<div class="row no-gutters">
			<div class="col-lg-9 offset-lg-3 col-12">
				<div class="text-inner">
            <div class="row">
                <div class="col-lg-2 order-lg-1 order-2">
                    <ul class="image_list">
                      
                            
                            <?php
                     if(!empty($all_product_data['ProductImage'])) {
                         $p_img = json_decode($all_product_data['ProductImage']);
                         $final_p = array_slice($p_img,1);
                        //  print_r($final_p);
                        //  print_r($p_img);
                         
                     foreach($final_p as $finalp ){
                                //  print_r($pimg);
                                // die;
                          ?>
  <li data-image="">
                        <img src="<?php echo base_url().'admin/public/assets/img/product_images/'. $finalp;?>" style="height: inherit;">
                            </li>
                        
                        
                        <?php
                        }
                     }
                     
                        ?>
                            
                        
                    </ul>
                </div>
                <div class="col-lg-4 order-lg-2 order-1">
                    <div class="image_selected">
                        
                         <?php 
                                            // print_r($all_product_data['ProductImage']);
                                       // die;
                                        if(!empty($all_product_data['ProductImage'])) {
                                        $p_img = json_decode($all_product_data['ProductImage']);
                                        // print_r($p_img);
                                        // die;
                                        
                   
                        //   foreach($p_img as $pimg ){
                                //  print_r($pimg);
                                // die;
                          ?>

                        <img src="<?php echo base_url().'admin/public/assets/img/product_images/'. $p_img[0];?>" style="height: inherit;">
                        <?php 
                    //   } 
                                        }
                        ?>
                        <!--<img src="<?php //echo base_url(); ?>public/images/products/p2.jpg" alt=""></div>-->
                    </div>
                </div>
                <div class="col-lg-6 order-3">
                    <div class="product_description">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Products</a></li>
                                <li class="breadcrumb-item active">
                                    <?php 
                                    if(!empty($all_product_data['CategoryID'])) {
                                     $products = new App\Models\Categorymodel();
                                    
                                       $prod = $products
                                           ->where('CategoryID', $all_product_data['CategoryID'])
                                           ->get()
                                           ->getRow();
                                        //   print_r($prod);
                                        //   die;
                                           ?>
                                    
                                    <?php echo $prod->CategoryName; 
                                    
                                    ?> 
                                    </li>
                            </ol>
                        </nav>
                        <div class="product_name">
                            <?php echo $all_product_data['ProductName'];?>
                        </div>
                        <div class="product-rating">
                            <span class="badge-success">
                                <i class="fa fa-star"></i> 4.5 Star</span> 
                                <span class="rating-review">35 Ratings & 45 Reviews</span>
                                </div>
                        <div>
                             <span class="product_price">₹ 
                             
                             
                             <?php
														    
														    if(!empty($all_product_data['ProductPrice']))
														    {
														    ?>
															<span><?php echo $all_product_data['ProductPrice']; ?></span>
															<?php 
														    }
														    else 
														    {
														        $pricearr=[];
														        $variations = new App\Models\Variationmodel();
														        $varia_dt = $variations->where('ProductID',$all_product_data['ProductID'])->get()->getResult('array');
														        foreach($varia_dt as $vardt)
														        {
														            $pricearr[]=$vardt['VariationPrice'];
														        }
														    ?>
														    <span><?php echo array_sum($pricearr);?></span>
														    <?php 
														    }
														    ?>
                             
                             <?php //echo $all_product_data['ProductPrice']; 
                             }?>
                        </span>
                        <!--<strike class="product_discount"> <span style='color:red'>₹ 2,000<span> </strike> -->
                        </div>
                        <!--<div> <span class="product_saved">You Saved:</span> <span style='color:black'>₹ 2,000<span> </div>-->
                        <!--<hr class="singleline">-->
                        <!--<div> <span class="product_info">EMI starts at ₹ 2,000. No Cost EMI Available<span><br> <span class="product_info">Warranty: 6 months warranty<span><br> <span class="product_info">7 Days easy return policy<span><br> <span class="product_info">7 Days easy return policy<span><br> <span class="product_info">In Stock: 25 units sold this week<span> </div>-->
                        <div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="br-dashed">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-3">
                                                 <!--<img src="https://img.icons8.com/color/48/000000/price-tag.png"> -->
                                                 </div>
                                            <div class="col-md-9 col-xs-9">
                                                <!--<div class="pr-info"> <span class="break-all">Get 5% instant discount + 10X rewards @ RENTOPC</span> </div>-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div class="col-md-7"> </div>
                            </div>
                            <div class="row" style="margin-top: 15px;">
                                	  <?php
                   	                // $arr =[];
    								  foreach($all_variation_data as $alldata){
    								    //   print_r($alldata);
    
                                       $products = new App\Models\variationtypemodel();
                                       $prod = $products
                                           ->where('VariationTypeID', $alldata['VariationTypeID'])
                                           ->get()
                                           ->getResult('array');
                                          
                                         
                                        foreach ($prod as $prd) 
                                        // print_r($prd);
                                        {
                                               	 
                                   ?>
                            
                                <div class="col-xs-6" style="margin-left: 15px;">
                               
                                <div class="dropdown">
								  <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    <option value="<?php echo $prd['VariationTypeID'] ?>"><?php echo $prd['VariationTypeName'] ?></option>
								    <?php //echo $prd['VariationTypeName']; ?>
								  </button>
								  
							
								  
								  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								    <a class="dropdown-item" href="#">
								        <?php echo $alldata['VariationName'];?>
								        </a>
								 <!--   <a class="dropdown-item" href="#">M</a>
								    <a class="dropdown-item" href="#">L</a>
								    <a class="dropdown-item" href="#">XL</a>
								    <a class="dropdown-item" href="#">XXL</a>-->
								  </div>
								</div>
							
								 </div>

                                <!--<div class="col-xs-6" style="margin-left: 15px;"> 
                                	
                                	<br> 
                                <div class="dropdown">
								  <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								    Colour
								  </button>
								  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								    <a class="dropdown-item" href="#">Sky Blue</a>
								    <a class="dropdown-item" href="#">Black</a>
								    <a class="dropdown-item" href="#">White</a>
								    <a class="dropdown-item" href="#">Blue</a>
								    <a class="dropdown-item" href="#">Green</a>
								  </div>
								</div>
							 </div>-->
                            
                            <?php 
                            }
                            }
                            ?>
                            </div>
                        </div>
                        <hr class="singleline">
                        	 <?php
                                $session = session();
                                $user_id = $session->get('user_id');
                                // print_r($user_id);
                                ?>
                                
                        <?php 
				            
                                $cust = new App\Models\Wishlistmodel();
                                    // print_r($cust);
                                $customers = $cust->where('UserID', $user_id)->where('ProductID',$all_product_data['ProductID'])->first();
                                // echo getLastQuery();
                                // print_r($customers);
                                // die;
                                
                    ?>
                    
                    
                        
                        <div class="order_info d-flex flex-row">
                            <form action="" method="POST" id="addToCart">
                                <div class="row">
                                    <div class="col-xs-6" style="margin-left: 13px;">
                                        <div class="product_quantity"> <span>QTY: </span> <input id="quantity_input" type="number" min="1" pattern="[0-9]*" value="1">
                                            <!-- <div class="quantity_buttons">
                                                <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up"></i></div>
                                                <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down"></i></div>
                                            </div> -->
                                        </div>
                                    </div>
                                    <div class="col-xs-6" style="margin-left: 13px;"> <button type="button" class="btn shop-button">Add to Cart</button> <button type="button" class="btn shop-button">Buy Now</button>
                                        <div class="product_fav">
                                            <!--<a href="#"><i class="fa fa-heart"></i></a>-->
                                            <!--</div>-->
                                        
                                        <?php
                                // $session = session();
                                // // print_r($session);
                                //  $session = session();
                                // $user_id = $session->get('user_id');
                                  
                                // print_r($all_product_data);
                                // if(empty($user_id))
                                // {
                                   
                                ?>
                                <!--<a href="<?php //echo base_url('login'); ?>"><i class="fa fa-heart"></i></a>-->
                          
                     
							
                                <?php 
                                // }
                                // else 
                                // {
                                   if(!empty($customers['Status']) && $customers['Status']==1  && $customers['ProductID']==$all_product_data['ProductID'])
                                    {
                                ?>
                                <i class="add_wishlist added_wish  d-none fa fa-heart" id="add_wishlist"  data-id="<?= $all_product_data['ProductID'] ?>"></i>
                          <i class="align-self-center  remove_wishlist removed_wish fa fa-heart" id="remove_wishlist"  data-id="<?= $all_product_data['ProductID'] ?>" style="
    /* height: auto; */
    color: orange;
    font-size: 14px;
"></i>

                                	      <?php 
                                    }
                                    else 
                                    {
                                        ?>
                                        <i class="add_wishlist added_wish  fa fa-heart" id="add_wishlist"  data-id="<?= $all_product_data['ProductID'] ?>"></i>
                                   <i class="align-self-center  remove_wishlist removed_wish fa fa-heart d-none" id="remove_wishlist"  data-id="<?= $all_product_data['ProductID'] ?>" style="
    /* height: auto; */
    color: orange;
    font-size: 14px;
"></i>
                                        <?php
                                        
                                    }
                                // }
                                ?>
                                </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
           
        </div>
    </div>				    	
	</div>




<!-- Latest compiled and minified CSS -->
<!-- https://xstore.8theme.com/demos/hosting/-->
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">-->

<!-- Optional theme -->
<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">-->
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<!-- Latest compiled and minified JavaScript -->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->
<!--<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300,400,700&subset=latin-ext" rel="stylesheet">-->
 
 

<!--Item slider text-->

<!-- Item slider-->
 <div class="row">
                <div class="col-12">
                     <div class="mb-5 mt-5 section-title">
						<h2>Related Products</h2>
					</div>
                    <div class="owl-carousel popular-slider">
                        	<?php 
                        	 if(!empty($all_product_data['CategoryID'])) {
					  $products = new App\Models\Productmodel();
                                     $prod = $products
                                         ->where('CategoryID', $all_product_data['CategoryID'])
                                          ->get()
                                          ->getResult('array');
					?>		
						<!-- Start Single Product -->
					
					 <?php foreach ($prod as $prddt) 
                            { 
                                // print_r($prddt);
							  
						?>
						<div class="single-product">
							<div class="product-img">
								<a href="#">
								    <?php
								    
								        $jsondt = json_decode($prddt['ProductImage']);
									    if(!empty($jsondt))
									    {
									?>
								 <img src="<?php echo base_url().'admin/public/assets/img/product_images/'. $jsondt[0];?>" style="height:250px;width:300px;">
<?php 
}

?>
                                 

								
								</a>
								
								  <?php
                                $session = session();
                                $user_id = $session->get('user_id');
                                // print_r($user_id);
                                ?>
				                     
				                     
				            <?php 
				            
                                $cust = new App\Models\Wishlistmodel();
                                    // print_r($cust);
                                $customers = $cust->where('UserID', $user_id)->where('ProductID',$prddt['ProductID'])->first();
                                // print_r($customers);
                                // die;
                                
                    ?>                  
                    
								<div class="d-flex button-head">
									<div class="product-action">
										<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
									 <?php
                                $session = session();
                                // print_r($session);
                                 $session = session();
                                $user_id = $session->get('user_id');
                                  
                                
                                if(empty($user_id))
                                {
                                   
                                ?>
                                <a href="<?php echo base_url('login'); ?>"><i class="ti-heart"></i></a>
                          
                     
							
                                <?php 
                                }
                                else 
                                {
                                   if(!empty($customers['Status']) && $customers['Status']==1  && $customers['ProductID']==$prddt['ProductID'])
                                    {
                                ?>
                                <i class="add_wishlist added_wish d-none m-0 ml-2 mr-3 mt-3 ti-heart" id="add_wishlist"  data-id="<?= $prddt['ProductID'] ?>"></i>
                          <i class="align-self-center  remove_wishlist removed_wish ti-heart m-0 ml-2 mr-3" id="remove_wishlist"  data-id="<?= $prddt['ProductID'] ?>" style="
    /* height: auto; */
    color: orange;
    font-size: 14px;
"></i>

                                	      <?php 
                                    }
                                    else 
                                    {
                                        ?>
                                        <i class="add_wishlist added_wish  m-0 ml-2 mr-3 mt-3 ti-heart" id="add_wishlist"  data-id="<?= $prddt['ProductID'] ?>"></i>
                                   <i class="align-self-center  remove_wishlist removed_wish ti-heart d-none m-0 ml-2 mr-3" id="remove_wishlist"  data-id="<?= $prddt['ProductID'] ?>" style="
    /* height: auto; */
    color: orange;
    font-size: 14px;
"></i>
                                        <?php
                                        
                                    }
                                }
                                ?>
										<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
									</div>
									<div class="mt-3 product-action-2">
										<a title="Add to cart" href="#">Add to cart</a>
									</div>
								</div>
							</div>
							<div class="product-content">
								<h3>
								   <a href="<?php echo base_url('product_detail/'.$all_product_data['ProductID']); ?>">
								    <?php echo $prddt['ProductName']; ?></a></h3>
								<div class="product-price">
								        
								         <span>
								         
								         <?php
														    
														    if(!empty($prddt['ProductPrice']))
														    {
														    ?>
															<span>$<?php echo $prddt['ProductPrice']; ?></span>
															<?php 
														    }
														    else 
														    {
														        $pricearr=[];
														        $variations = new App\Models\Variationmodel();
														        $varia_dt = $variations->where('ProductID',$prddt['ProductID'])->get()->getResult('array');
														        foreach($varia_dt as $vardt)
														        {
														            $pricearr[]=$vardt['VariationPrice'];
														        }
														    ?>
														    <span>$<?php echo array_sum($pricearr);?></span>
														    <?php 
														    }
														    ?>
								         
								         
								         
								         <?php //echo $prddt['ProductPrice']; ?></span> 
									 <span>
									     <!--$-->
									     <?php //echo number_format($prddt['ProductPrice'], 2); ?></span> 
									       
									        
								</div>
							</div>
						</div>
						<?php
						}
						}
						?>
						<!-- End Single Product -->
						
                    </div>
                </div>
            </div>
            </div>
</div>
<!-- Item slider end-->




		
<?= $this->include('footer') ?>
