<?php

$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $directoryURI);
$first_part = $components[1];
$settings = new App\Models\Settings();
$sett_data = $settings->get()->getRow();
?>
<?= $this->include('header') ?>

    <style>
        #country-list 
        {
            float: left;
            list-style: none;
            padding: 0;
            width: 100%;
            position: absolute;
            z-index: 10000000;
        }
        #country-list li 
        {
            padding: 10px;
            background: #ffffff;
            border-bottom: #bbb9b9 1px solid;
            cursor:pointer;
           
        }
        #country-list li p
        {
            float:left;
            text-align: justify;
        }
        #country-list li h5
        {
            float:left;
            color: #f7941d;
        }
        .loader-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999; /* Ensure it appears above other content */
        }
        .loader 
        {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 120px;
            height: 120px;
            /*z-index: 10000;*/
            display: none;
            /*position: fixed;*/
            margin-left: 50%;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }
        .swal2-popup
        {
            background: #fff !important;
        }
        .swal2-backdrop-show
        {
            background: rgb(255 255 255 / 50%);
        }
        p.desc
        {
            margin-top:2px;
        }
        @-webkit-keyframes spin 
        {
            0% {
                -webkit-transform: rotate(0deg); 
            }
            100% {
                -webkit-transform: rotate(360deg);
                }
        }

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

.overlay {
    display:none;
    position: fixed;
    width: 100%;
    height: 100%;
    z-index: 1000;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    background: rgba(0,0,0,.7);
    opacity: 0.5;
    filter: alpha(opacity=50);
 }
 #semiTransparenDiv {
	width:100%;
	
	/*-Lets Center the Spinner-*/
    position:fixed;
    left:0;
    right:0;
    top:0;
    bottom:0;
    
    /*Centering my shade */
    margin-bottom: 40px;
    margin-top: 60px;
    
    background-color: rgba(255,255,255,0.7);
    z-index:9999;
    display: none; 
}

@-webkit-keyframes spin {
	from {-webkit-transform:rotate(0deg);}
	to {-webkit-transform:rotate(360deg);}
}

@keyframes spin {
	from {transform:rotate(0deg);}
	to {transform:rotate(360deg);}
}

#semiTransparenDiv::after {
    content:'';
    display:block;
    position:absolute;
    left:48%;top:40%;
    width:80px;height:80px;
    border-style:solid;
    border: 5px solid black;
	border-top-color: #6CC4EE;
    border-width: 7px;
    border-radius:50%;
    -webkit-animation: spin .8s linear infinite;
    
    /* Lets make it go round */
    animation: spin .8s linear infinite;
}
    </style>
	
</head>
<body class="js">
	<input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>" />
	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
	
	
	<!-- Header -->

	<!--/ End Header -->

    
    
<style>
	.main-category{
		display: none;
	}
	 .form-control {
    display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.9 !important;
    color: #495057;
    background-color: #fff;
    background-image: none;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
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
           'my_account'
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
		<div class="col-lg-9 col-12 mb-5">
			<div class="card account-card">
              <div class="card-body">
                <h2 class="mb-2">Address</h2>
               
                <!--<h4 class="mt-5 mb-2">Personal Details</h4>-->
                <form id ="edit_address_form_data">
                     <input type="hidden" name="add_id" id="add_id" value="<?php echo $single_address_data['id'];?>">
                       
                     <input type="hidden" id="base_url" value="<?php echo base_url('adresses');?>">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="firstname">Firstname</label>
                        <input id="firstname" name="firstname" type="text" class="form-control" maxlength="20" value="<?php echo $single_address_data['first_name']; ?>">
                         <span id="firstname_err"></span>
                         </div>
                    
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="lastname">Lastname</label>
                        <input id="lastname" name="lastname"  type="text" class="form-control" maxlength="20" value="<?php echo $single_address_data['last_name']; ?>">
                
                       <span id="lastname_err"></span>
                             </div>
                    </div>
                  </div>
                  <!-- /.row-->
                  <div class="row">
                     <div class="col-md-12 mb-2 mt-2 pb-2">
                        <label for="defaultFormControlInput" class="form-label">Address</label>
                        <textarea type="text" class="form-control" id="address1" name="address1" maxlength="110" aria-describedby="defaultFormControlHelp"><?php if(!empty($single_address_data['address'])) {echo $single_address_data['address'];} else{ echo "NA"; } ?></textarea>
                        <span id="cus_address1_err"></span>
                    </div>
                    <!--<div class="col-md-6 mb-2 mt-2 pb-2">-->
                    <!--    <label for="defaultFormControlInput" class="form-label">Address 2</label>-->
                        <!--<textarea type="text" class="form-control" id="address2" name="address2" aria-describedby="defaultFormControlHelp"><?php //if(!empty($profile_data['UserAddress2'])) {echo $profile_data['UserAddress2'];} else{ echo "NA"; } ?></textarea>-->
                    <!--    <span id="cus_address2_err"></span>-->
                    <!--</div>-->
                  </div>
                  <!-- /.row-->
                  <div class="row">
                      <div class="col-md-6 col-lg-4">
                         <div class="form-group">
                          <label for="inputcountry">Country</label>
                           <select id="country" name="country" class="form-control">
                                  <option value="">Country</option>
                              
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
                    
                      <div class="col-md-6 col-lg-4">
                      <div class="form-group">
                          <label for="inputState">State</label>
                          <select id="state" name="state" class="form-control">
                             <?php 
                             if(!empty($state)){
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
                    
                    <div class="col-md-6 col-lg-4">
                      <div class="form-group">
                        <label for="city">City</label>
                          <select id="city" name="city" class="form-control">
                            <?php
                            if(!empty($city)){
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
                    <div class="col-md-6 col-lg-6">
                      <div class="form-group">
                        <label for="zip">ZIP</label>
                        <input id="zip" name="zip" type="number" class="form-control" maxlength="10" value="<?php echo $single_address_data['zipcode']; ?>">
                      
                      <span id="zip_err"></span>
                      </div>
                    </div>
                  
                    
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="phone">Telephone</label>
                        <input id="phone" name="phone"  type="number" class="form-control" maxlength="12" value="<?php echo $single_address_data['number']; ?>">
                     
                      <span id="phone_err"></span>
                       </div>
                    </div>
                    <!--<div class="col-md-6">-->
                    <!--  <div class="form-group">-->
                    <!--    <label for="email">Email</label>-->
                        <!--<input id="email" name="email"  type="text" class="form-control" value="<?php //echo $profile_data['UserEmail']; ?>">-->
                   
                    <!--  <span id="email_err"></span>-->
                    <!--     </div>-->
                    <!--</div>-->
                    <div class="col-md-12 text-center">
                          
                      <button type="button" id="edit_address_form" class="btn btn-block rounded  mt-3"><i class="fa fa-save"></i> Save changes</button>
                     
                    </div>
                      <span id="msg"></span>
                  </div>
                </form>
              </div>
             </div>
            </div>
		
			</div>
	
		</div>
	</div>
	<!--/ End Shopping Cart -->
			


	
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
	
	
	

	
<?= $this->include('footer') ?>	