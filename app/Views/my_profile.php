<?= $this->include('header');?>


<style>
	.main-category{
		display: none;
	}
</style>

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
           'create_account'
       ); ?>">My Account</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
			
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
                          'create_account'
                      ); ?>" class="nav-link active"><i class="fa fa-user"></i> My Account</a>
                      
                      <a href="<?php echo base_url(
                          'change_password'
                      ); ?>" class="nav-link"><i class="fa fa-lock"></i> Change Password</a>
                      
                       <a href="<?php echo base_url(
                          'orders'
                      ); ?>" class="nav-link"><i class="fa fa-list"></i> My Orders</a>
                      
                      
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
		<div class="col-lg-9 col-12 mb-5">
			<div class="card account-card">
              <div class="card-body">
                <h2 class="mb-2">My Profile</h2>
               
        
                <h4 class="mt-5 mb-2">Personal Details</h4>
                <form id ="account_form_data">
                   
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="firstname">Firstname</label>
                        <input id="firstname" name="firstname" type="text" class="form-control form-control-lg" value="<?php echo $profile_data['UserFirstName']; ?>" disabled>
                         <span id="firstname_err"></span>
                         </div>
                    
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <input id="lastname" id="lastname"  type="text" class="form-control form-control-lg" value="<?php echo $profile_data['UserLastName']; ?>" disabled>
                
                       <span id="lastname_err"></span>
                             </div>
                    </div>
                  </div>
                  <!-- /.row-->
                  <div class="row">
                     <div class="col-md-6 mb-2 mt-2 pb-2">
                        <label for="defaultFormControlInput" class="form-label">Address 1</label>
                        <textarea type="text" class="form-control" id="address1" name="address1" aria-describedby="defaultFormControlHelp" disabled><?php if(!empty($profile_data['UserAddress'])) { echo $profile_data['UserAddress'];} else{ echo "NA"; } ?></textarea>
                        <span id="cus_address1_err"></span>
                    </div>
                    <div class="col-md-6 mb-2 mt-2 pb-2">
                        <label for="defaultFormControlInput" class="form-label">Address 2</label>
                        <textarea type="text" class="form-control" id="address2" name="address2" aria-describedby="defaultFormControlHelp" disabled><?php if(!empty($profile_data['UserAddress2'])) { echo $profile_data['UserAddress2'];} else{ echo "NA"; } ?></textarea>
                        <span id="cus_address2_err"></span>
                    </div>
                  </div>
                  <!-- /.row-->
                  <div class="row">
                      <div class="col-md-6 col-lg-3">
                         <div class="form-group">
                          <label for="inputcountry">Country</label>
                           <select id="country" name="country" class="form-control">
                              
                                <?php 
                                        //   print_r($country);
                                        //   die;
                                          if(!empty($country)){
                                              foreach($country as $con){
                                                //   print_r($con);
                                                    //   die;
                                            ?>  

                                          <!--<option value="<?php //echo $con['CountryID']; ?>"><?php //echo $con['CountryName']; ?></option>-->
                                          <option value="<?php echo $con['CountryID'];?>"<?php if($con['CountryID']==$profile_data['UserCountry']) echo "selected"; ?>> <?php echo $con['CountryName'];?> </option> 
                                          
                                         
                                          <?php
                                          }
                                        }
                                          ?>
                                           </select>
                        
                        <span id="country_err"></span>
                        </div>
                    </div>
                    
                      <div class="col-md-6 col-lg-3">
                      <div class="form-group">
                          <label for="inputState">State</label>
                          <select id="state" name="state" class="form-control">
                             <?php if(!empty($state)){
                                              foreach($state as $states){
                                                //   print_r($states);
                                                //   die;
                                                //   die;
                                            ?>  
    
                                          <option value="<?php echo $states['StateID'];?>"<?php if($states['StateID']==$profile_data['UserState']) echo "selected"; ?>> <?php echo $states['StateName'];?> </option> 
                                         
                                          <?php
                                          }
                                        }
                                          ?>
                          </select>
                    
                        <span id="state_err"></span>
                            </div>
                    </div>
                    
                    <div class="col-md-6 col-lg-3">
                      <div class="form-group">
                        <label for="city">City</label>
                          <select id="city" name="city" class="form-control">
                            <?php if(!empty($city)){
                                              foreach($city as $citys){
                                                //   print_r($citys);
                                                //   die;
                                                //   die;
                                            ?>  
    
                                          <option value="<?php echo $citys['CityID'];?>"<?php if($citys['CityID']==$profile_data['UserCity']) echo "selected"; ?>> <?php echo $citys['CityName'];?> </option> 
                                         
                                          <?php
                                          }
                                        }
                                          ?>
                          </select>
                      
                      <span id="city_err"></span>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="form-group">
                        <label for="zip">ZIP</label>
                        <input id="zip" name="zip" type="number" class="form-control form-control-lg" value="<?php echo $profile_data['UserZip']; ?>" disabled>
                      
                      <span id="zip_err"></span>
                      </div>
                    </div>
                  
                    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="phone">Telephone</label>
                        <input id="phone" name="phone"  type="number" class="form-control form-control-lg" value="<?php echo $profile_data['UserPhone']; ?>" disabled>
                     
                      <span id="phone_err"></span>
                       </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" name="email"  type="text" class="form-control form-control-lg" value="<?php echo $profile_data['UserEmail']; ?>" disabled>
                   
                      <span id="email_err"></span>
                         </div>
                    </div>
                    <div class="col-md-12 text-center">
                           <span id="success_msg"></span>
                      <button type="button"  class="btn">
                          <a href="<?php echo base_url(
                          'create_account'
                      ); ?>" class="nav-link active">
                          <i class="fa fa-save"></i> Save changes</a></button>
                    </div>
                  </div>
                </form>
              </div>
             </div>
            </div>
		
			</div>
	
		</div>
	</div>
	<!--/ End Shopping Cart -->
			
	<!-- Start Shop Services Area  -->
	<section class="shop-services section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Free shiping</h4>
						<p>Orders over $100</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Free Return</h4>
						<p>Within 30 days returns</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Sucure Payment</h4>
						<p>100% secure payment</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Best Peice</h4>
						<p>Guaranteed price</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Newsletter -->
	
	<!-- Start Shop Newsletter  -->
	<section class="shop-newsletter section">
		<div class="container">
			<div class="inner-top">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 col-12">
						<!-- Start Newsletter Inner -->
						<div class="inner">
							<h4>Newsletter</h4>
							<p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
							<form action="<?php echo base_url(
           'mail'
       ); ?>" method="get" target="_blank" class="newsletter-inner">
								<input name="EMAIL" placeholder="Your email address" required="" type="email">
								<button class="btn">Subscribe</button>
							</form>
						</div>
						<!-- End Newsletter Inner -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Newsletter -->
	
	
	
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