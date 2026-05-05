<?= $this->include('header') ?>
<style>
	.main-category{
		display: none;
	}
	img.prod_img {
    height: 250px!important;
    width: 100%;
}

	  
</style>

<?php
$AllsettingsModel = new \App\Models\Allsettingsmodel();
$all_setting_data = $AllsettingsModel->first();
?>

	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="<?php echo base_url(
           '/'
       ); ?>">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="<?php echo base_url(
           'wishlist'
       ); ?>">My wishlist</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
			
			 <?php
                                $session = session();
                                $usertype = $session->get('type');
                                
                                if(!empty($usertype))
                                {
                                ?>
                                <a href="<?php echo base_url(
            'add_to_wishlist'
        ); ?>"></a>
                                
							
                                <?php 
                                }
                                else 
                                {
                                ?>
                                <a href="<?php echo base_url(
            'login'
        ); ?>"></a>
                                <?php 
                                }
                                ?>
			
	<!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
	<div class="col-lg-3 col-12">
              <!--
              *** CUSTOMER MENU ***
              _________________________________________________________
              -->
 <div class="card sidebar-menu">
                <div class="card-header customer_heading">
                  <h4 class="card-title">Customer Section</h4>
                </div>
                <div class="card-body">
                  <ul class="nav nav-pills flex-column">
                    
                          <a href="<?php echo base_url(
                          'my_account'
                      ); ?>" class="nav-link"><i class="fa fa-user"></i> My Account</a>
                      
                      <a href="<?php echo base_url(
                          'change_password'
                      ); ?>" class="nav-link"><i class="fa fa-lock"></i> Change Password</a>
                      
                       <a href="<?php echo base_url(
                          'orders'
                      ); ?>" class="nav-link"><i class="fa fa-list"></i> My Orders</a>
                      
                      
                      <a href="<?php echo base_url(
                          'wishlist'
                      ); ?>" class="nav-link active"><i class="fa fa-heart"></i> My Wishlist</a>
                      
                   
                   
                      <a href="<?php echo base_url(
                          'logout'
                      ); ?>" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a>
                      
                  </ul>
                </div>
              </div>
              <!-- /.col-lg-3-->
              <!-- *** CUSTOMER MENU END ***-->
            </div>
	
		<div id="customer-order" class="col-lg-9 mb-5">
		    <div class="row">
		        <div class="col-md-12">
                    <div class="card account-card">
                        <div class="card-body">
                            <h2 class="mb-2">My wishlist</h2>
                            <p class="">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                      </div>
                    </div>
                </div>
	        </div>
	        <div class="row">
    <?php foreach($all_wishlist_data as $wishlist_data) { ?> 
        <div class="col-md-4 product_col">
            <!-- Wishlist product card -->
            <div class="bbb_deals position-relative d-flex flex-column justify-content-between" style="height: 100%; padding: 1em; border: 1px solid #ddd; border-radius: 5px;">

                <!-- Remove from wishlist button -->
                <div class="position-absolute remove_whishlist" 
                     data-id='<?=$wishlist_data["wishlist_id"]?>' 
                     data-userid='<?=$wishlist_data["UserID"]?>' 
                     data-productid='<?=$wishlist_data["ProductID"]?>' 
                     style="right: 1.5em; top: 1em;">
                    <i class="fa fa-times-circle-o" aria-hidden="true" style="  font-size: 1.7em;
    position: absolute;
    top: -21px;
    left: 6px;
    color: #f7941d;
"></i>
                </div>

                <!-- Product Image -->
                <?php 
                $p_img = json_decode($wishlist_data['ProductImage']);
                ?>
                <img src="<?php echo base_url().'admin/public/assets/img/product_images/'. $p_img[0];?>" 
                     class="prod_img" 
                     style="height: 200px; object-fit: contain; margin-bottom: 1em;">

                <!-- Product Details -->
                <div class="bbb_deals_content mt-auto">
                    
                    <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                        <div class="bbb_deals_item_name w-75" style="display:block;white-space:nowrap;overflow:hidden;text-overflow:ellipsis; font-size:14px;">
                            <?php echo $wishlist_data['ProductName']; ?>
                        </div>
                        <div class="bbb_deals_item_price ml-auto float-right">
                            <?php if(!empty($wishlist_data['ProductPrice'])): ?>
                                <span><?php echo $all_setting_data['currency']; ?><?php echo $wishlist_data['ProductPrice']; ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="available mt-3">
                        <div class="available_line d-flex flex-row justify-content-start mt-2 mb-2">
                            <div class="available_title">Available: 
                                <span>
                                    <?php 
                                    echo !empty($wishlist_data['ProductStock']) 
                                        ? $wishlist_data['ProductStock'] 
                                        : array_sum(array_column($varia_dt, 'VariationStock'));
                                    ?>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- View Details Button -->
                <div class="button d-flex">
                    <a href="<?php echo base_url($wishlist_data['slug']."/".'product_detail/'.base64_encode($wishlist_data['ProductID'])); ?>"
                       class="btn btn-primary link-text mt-3 m-1 view_btn rounded" style="padding:12px;">View Details</a>
                </div>
            </div>
        </div>
    <?php } ?>
</div>

	   </div>
	<!--/ End Shopping Cart -->
			</div>
		</div>	
	
		<!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <!-- Product Slider -->
									<div class="product-gallery">
										<div class="quickview-slider-active">
											<div class="single-slider">
												<img src="<?php echo base_url(); ?>public/images/modal1.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="<?php echo base_url(); ?>public/images/modal2.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="<?php echo base_url(); ?>public/images/modal3.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="<?php echo base_url(); ?>public/images/modal4.jpg" alt="#">
											</div>
										</div>
									</div>
								<!-- End Product slider -->
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="quickview-content">
                                    <h2>Flared Shift Dress</h2>
                                    <div class="quickview-ratting-review">
                                        <div class="quickview-ratting-wrap">
                                            <div class="quickview-ratting">
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="yellow fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <a href="#"> (1 customer review)</a>
                                        </div>
                                        <div class="quickview-stock">
                                            <span><i class="fa fa-check-circle-o"></i> in stock</span>
                                        </div>
                                    </div>
                                    <h3>$29.00</h3>
                                    <div class="quickview-peragraph">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
                                    </div>
									<div class="size">
										<div class="row">
											<div class="col-lg-6 col-12">
												<h5 class="title">Size</h5>
												<select>
													<option selected="selected">s</option>
													<option>m</option>
													<option>l</option>
													<option>xl</option>
												</select>
											</div>
											<div class="col-lg-6 col-12">
												<h5 class="title">Color</h5>
												<select>
													<option selected="selected">orange</option>
													<option>purple</option>
													<option>black</option>
													<option>pink</option>
												</select>
											</div>
										</div>
									</div>
                                    <div class="quantity">
										<!-- Input Order -->
										<div class="input-group">
											<div class="button minus">
												<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
													<i class="ti-minus"></i>
												</button>
											</div>
											<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
											<div class="button plus">
												<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
													<i class="ti-plus"></i>
												</button>
											</div>
										</div>
										<!--/ End Input Order -->
									</div>
									<div class="add-to-cart">
										<a href="#" class="btn">Add to cart</a>
										<a href="#" class="btn min"><i class="ti-heart"></i></a>
										<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
									</div>
                                    <div class="default-social">
										<h4 class="share-now">Share:</h4>
                                        <ul>
                                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                            <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div></div>
        
        <!-- Modal end -->
	

	
<?= $this->include('footer') ?>
<script>
    $(document).on('click','.remove_whishlist',function(){
        if (confirm('Are you sure to remove this product from whishlist?')) {
            var this_ = $(this);
            var id = this_.attr('data-id');
            var userID = this_.attr('data-userID');
            var productID = this_.attr('data-productID');
            
            var data = {
                'userId' : userID,
                'productID' : productID,
            }
            
            $.ajax({
                url:'api/removeFromWishList',
                type: "POST",
                data: data,
                dataType:'html',
                success: function(data)
                {
                    var data1 = JSON.parse(data);
                    if(data1.status == 'success'){
                        this_.parent().remove();
                    }
                }
            });
            
        }
    })
    
</script>