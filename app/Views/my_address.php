<?= $this->include('header') ?>

<style>
	.main-category{
		display: none;
	}
	.addprobtn {
    float: left;
    color: #696cff;
    padding: 10px;
    border-radius: 5px;
    font-weight: bold;
}

#add_name {
    font-size : 25px;
}
#add_span {
    font-size: 16px;
}

.btn{
    color: #fff;
	background: #333333;
}

.btn:hover{
	color: #ffffff;
	background: #F7941D;
}
</style>

	<!-- Breadcrumbs -->
	<div class="breadcrumbs py-3">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="<?php echo base_url(
           '/'
       ); ?>">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="<?php echo base_url(
           'adresses'
       ); ?>">My Address</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
			
	<!-- Shopping Cart -->
	<div class="shopping-cart section pt-0">
		<div class="container">
			<div class="row">
	<div class="col-lg-3 col-12">
              <!--
              *** CUSTOMER MENU ***
              _________________________________________________________
              -->
              	<input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>" />
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
                          'adresses'
                      ); ?>" class="nav-link active"><i class="fa fa-address-card"></i> Address</a>
                      
                      
                      <a href="<?php echo base_url(
                          'wishlist'
                      ); ?>" class="nav-link"><i class="fa fa-heart"></i> My Wishlist</a>
                      
                   
                   
                      <a href="<?php echo base_url(
                          'logout'
                      ); ?>" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a>
                      
                  </ul>
                </div>
              </div>
              <!-- /.col-lg-3-->
              <!-- *** CUSTOMER MENU END ***-->
            </div>
		<div id="customer-orders" class="col-lg-9 mb-5">
            <div class="card account-card">
                <div class="row">
                <!--<div class="card-body">-->
                    <!--<div class="card-body p-2">-->
                        <div class="col-lg-8">
                            <h2 class="m-0">My Address</h2>
		<!--<span class="addprobtn">All Address</span>-->
		</div>
		<div class="col-lg-4">
		    <!--<button type="button" id="" class="btn float-right rounded" style="padding:12px;"><a href="<?php // echo base_url('add_address'); ?>"> <span class="">Add</span></a></button>-->
		    

	</div>
	</div>
	<!--</div>-->
	
               
                <!--<p class="">Your orders on one place.</p>-->
                <!--<p class="text-muted">If you have any questions, please feel free to <a href="contact.html">contact us</a>, our customer service center is working for you 24/7.</p>-->
                <hr>
                 <?php
                                    	          
                                    	          foreach($all_address_data as $key=>$single_order_data)
                                    	          
                        {
                        
                    //  echo "<pre>";
                    //           print_r($single_order_data);
                           
                      ?>
                      	<div class="checkout-form card p-4 mb-3">
                      	    <div class="row">
                      	  <div class="col-lg-8">
                 <p class="font-weight-bold mb-2 text-dark"><?=$single_order_data['first_name'];?> <?=$single_order_data['last_name'];?></p>
                 <span class="mt-0"><?=$single_order_data['address'];?></span><br>
                   <span class="mt-0"><?=$single_order_data['city'];?>, <?=$single_order_data['state'];?>, <?=$single_order_data['country'];?> </span><br>
                   <label class="mb-0">Zip : <span class="mt-0" id=""><?=$single_order_data['zipcode'];?></span></label><br>
                     <label>Phone : <span class="mt-0" id=""><?=$single_order_data['number'];?></span></label>
                       </div>
                           <div class="col-lg-4" style="    display: flex;
    flex-direction: row;
    align-items: flex-start;
    justify-content: end;
    gap: 6px;
}">
                               <!--<div class="content">-->
        							<!--<button type="submit" id="" class="btn" >Change Address</button>-->
                              <a  
                     href="<?php echo base_url(); ?>edit_address/<?= base64_encode($single_order_data['id']); ?>"
                    class="btn customer-order-btn link-text m-0 mb-2 mt-2 rounded" style="padding:12px;">Edit</a>
                    <!-- <a -->
                    <!-- href="javascript:void(0)" data-id="<? // $single_order_data['id'] ?>"-->
                    <!--class="btn customer-order-btn link-text m-0 mb-2 mt-2 del_address rounded" style="padding:12px;">Delete</a>-->
                         
                       </div>
                       </div>
                       </div>
                       
                 <?php
                  
                        }
                        
                        ?>
                        
            
            <!--</div>-->
		
			</div>
	
		</div>
	</div>
	</div>
	</div>
	<!--/ End Shopping Cart -->

	
	
	
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
												<img src="images/modal1.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal2.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal3.jpg" alt="#">
											</div>
											<div class="single-slider">
												<img src="images/modal4.jpg" alt="#">
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
        </div>
        <!-- Modal end -->
	
<?= $this->include('footer') ?>