
<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>ECommerce Web App</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>public/images/favicon.png">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!-- StyleSheet -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.css">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/magnific-popup.min.css">
	<!-- Font Awesome -->
    <!--<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/font-awesome.css">-->
	<!-- Fancybox -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/themify-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/ti-icons@0.1.2/css/themify-icons.min.css" rel="stylesheet">
    <script src="https://js.stripe.com/v3/"></script>


       
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/niceselect.css">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/animate.css">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/flex-slider.min.css">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/owl-carousel.css">
	<!-- Slicknav -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/slicknav.min.css">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/reset.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/responsive.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/jquery-ui.css">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />-->
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

	<!-- Preloader -->

	<!-- End Preloader -->
	
	
	<!-- Header -->
	
		<!-- Header Inner -->
	
		<!--/ End Header Inner -->
	</header>
	<!--/ End Header -->
	<!--<div class="loader"></div>-->
	
 

    
<style>
  /* Base Overrides */
  .main-category {
    display: none;
  }
  
  input:not([type=range]) {
    padding: 10px 15px !important;
  }

  /* Premium Ambient Background matching mockup */
  .security-bg-section {
    background: #f5efe6;
    padding: 60px 0;
    min-height: calc(100vh - 160px);
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    margin: 5px;
  }

  /* White Card form container */
  .card-registration {
    border: none;
    border-radius: 24px;
    background: #ffffff;
    box-shadow: 0 10px 30px rgba(74, 52, 39, 0.02);
    height: 100%;
  }

  /* Cozy Left Image Corner wrapper */
  .left-image-container {
    width: 100%;
    height: 100%;
    border-radius: 20px;
    overflow: hidden;
  }

  .left-hero-image {
    width: 100%;
    height: 100%;
    min-height: 480px;
    object-fit: cover;
    display: block;
  }

  /* Centered Lock Circle decoration */
  .lock-circle-wrapper {
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
  }

  .lock-circle {
    width: 72px;
    height: 72px;
    border-radius: 50%;
    background-color: #f7edd6;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .lock-circle i {
    font-size: 28px;
    color: #8c6239;
  }

  /* Mockup Headings styling */
  .security-title {
    font-family: 'Poppins', sans-serif;
    font-size: 32px;
    font-weight: 700;
    color: #1a1a1a;
    margin-bottom: 8px;
    text-align: center;
    letter-spacing: -0.5px;
  }

  .security-desc {
    font-family: 'Poppins', sans-serif;
    font-size: 14.5px;
    color: #666;
    line-height: 1.5;
    text-align: center;
    margin-bottom: 30px;
    max-width: 85%;
    margin-left: auto;
    margin-right: auto;
  }

  /* Modern Input Group with built-in icons styling */
  .form-outline {
    position: relative;
    margin-bottom: 20px;
  }

  .form-outline label {
    font-size: 14px;
    font-weight: 600;
    color: #1a1a1a;
    margin-bottom: 10px;
    display: block;
    letter-spacing: 0.1px;
  }

  .input-icon-wrapper {
    position: relative;
    display: flex;
    align-items: center;
  }

  .input-icon-wrapper i {
    position: absolute;
    left: 18px;
    color: #888;
    font-size: 16px;
    transition: all 0.3s ease;
    pointer-events: none;
  }

  .input-icon-wrapper .form-control {
    padding-left: 48px !important;
    height: 52px;
    border-radius: 10px;
    border: 1px solid rgba(74, 52, 39, 0.15) !important;
    font-size: 14.5px;
    color: #333;
    background: #ffffff;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
  }

  .input-icon-wrapper .form-control:focus {
    border-color: #8d5736 !important;
    background: #fff;
    box-shadow: 0 8px 20px rgba(140, 98, 57, 0.06) !important;
  }

  .input-icon-wrapper .form-control:focus + i {
    color: #8d5736;
  }

  /* Custom error message styling */
  span[id$="_err"].text-danger {
    font-size: 13px;
    margin-top: 8px;
    display: block;
    font-weight: 600;
    color: #dc3545 !important;
    animation: slideDown 0.3s ease;
  }

  @keyframes slideDown {
    from {
      opacity: 0;
      transform: translateY(-5px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  /* Premium Buttons */
  .btn.update_password_btn {
    width: 100%;
    padding: 14px 28px !important;
    font-size: 15px !important;
    font-weight: 600 !important;
    border-radius: 10px !important;
    transition: all 0.3s ease !important;
    border: none !important;
    background: #8c6239 !important;
    color: #fff !important;
    box-shadow: 0 6px 18px rgba(140, 98, 57, 0.15) !important;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
  }

  .btn.update_password_btn:hover {
    background: #73512e !important;
    box-shadow: 0 10px 25px rgba(140, 98, 57, 0.25) !important;
    transform: translateY(-1px);
    color: #fff !important;
  }

  /* OR Divider */
  .divider-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 25px 0;
  }

  .divider-line {
    flex: 1;
    height: 1px;
    background-color: rgba(74, 52, 39, 0.1);
  }

  .divider-text {
    font-size: 12px;
    font-weight: 600;
    color: #999;
    padding: 0 15px;
    letter-spacing: 1px;
  }

  .back-to-login {
    font-size: 15px;
    font-weight: 600;
    color: #1a1a1a;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
  }

  .back-to-login:hover {
    color: #8c6239;
  }
</style>

<section class="security-bg-section">
  <div class="container">
      <div class="row align-items-center no-gutters">
        <!-- Left Image block matching exact mockup scene -->
        <div class="col-md-6 d-none d-md-block pr-md-4">
          <div class="left-image-container">
            <img src="<?php echo base_url('public/images/register_left.png'); ?>" alt="Cozy furniture corner" class="left-hero-image" />
          </div>
        </div>

        <!-- Right Form block matching mockup white card -->
        <div class="col-md-6 col-lg-6 pl-md-4">
          <?php if($forget_password_key != NULL) { ?>
            <div class="card card-registration">
              <div class="card-body p-4 p-md-5">
                <!-- Lock circle badge -->
                <div class="lock-circle-wrapper">
                  <div class="lock-circle">
                    <i class="fa-solid fa-lock"></i>
                  </div>
                </div>

                <!-- Title & description -->
                <h2 class="security-title">Reset Password</h2>
                <p class="security-desc">Enter your new password below to reset your password and protect your account.</p>

                <!-- Server feedback messages -->
                <div id="msg" class="mb-3 font-weight-bold text-center" style="font-size: 14.5px; display: none;"></div>

                <form id="reset_password_form">
                  <input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
                  <input type="hidden" name="userid" id="userid" value="<?php echo $UserID; ?>">
                  <input type="hidden" name="reset_password_key" id="reset_password_key" value="<?php echo $reset_password_key; ?>">

                  <!-- New Password input -->
                  <div class="form-outline password">
                    <label class="form-label" for="new_password">New Password</label>
                    <div class="input-icon-wrapper">
                      <i class="fa-solid fa-lock"></i>
                      <input type="password" name="new_password" id="new_password" class="form-control" placeholder="••••••••" />
                    </div>
                    <span id="new_password_err"></span>
                  </div>

                  <!-- Confirm Password input -->
                  <div class="form-outline password">
                    <label class="form-label" for="confirm_password">Confirm Password</label>
                    <div class="input-icon-wrapper">
                      <i class="fa-solid fa-lock"></i>
                      <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="••••••••" />
                    </div>
                    <span id="confirm_password_err"></span>
                  </div>

                  <!-- Submit button with arrow -->
                  <button type="button" name="submit" class="mt-4 btn update_password_btn">
                    Update Password <i class="fa-solid fa-arrow-right-long"></i>
                  </button>

                  <!-- OR separation divider -->
                  <div class="divider-wrapper">
                    <div class="divider-line"></div>
                    <span class="divider-text">OR</span>
                    <div class="divider-line"></div>
                  </div>

                  <!-- Back to Login -->
                  <div class="text-center">
                    <a class="back-to-login" href="<?php echo base_url(); ?>login">
                      <i class="fa-solid fa-arrow-left-long"></i> Back to Login
                    </a>
                  </div>
                </form>
              </div>
            </div>
          <?php } else { ?>
            <div class="text-center p-5 card card-registration">
              <div class="card-body">
                <i class="fa-solid fa-circle-exclamation fa-4x text-danger mb-4"></i>
                <h3 class="text-danger font-weight-bold mb-2">Link Has Expired</h3>
                <p class="text-muted mb-4">This password reset link is invalid or has already been used. Please request a new link.</p>
                <a class="btn" href="<?php echo base_url(); ?>forget_password" style="background: #8c6239; border: none; padding: 14px 30px; border-radius: 10px; font-weight: 600; color: #fff; box-shadow: 0 6px 18px rgba(140, 98, 57, 0.15);">Request New Link</a>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
</section>
<?= $this->include('footer') ?>
<script>
 $(".update_password_btn").on("click",function(e){
                 
          var new_password= $("#new_password").val();
          var confirm_password= $("#confirm_password").val();
          var base_url = $("#base_url").val();
          flag = 0;
      
          if (new_password=="") 
          {
              $('#new_password_err').text('New Password is required').addClass("text-danger");
              flag=1;
          } 
      
          if (new_password!="") 
          {
              $('#new_password_err').text('');
          } 
          
            if (confirm_password=="") 
          {
              $('#confirm_password_err').text('Confirm Password is required').addClass("text-danger");
              flag=1;
          } 
      
          if (confirm_password!="") 
          {
              $('#confirm_password_err').text('');
          } 
          
          if(confirm_password!="" && confirm_password!=new_password){
              $("#confirm_password_err").html('Confirm password does not matched with new password.');
              flag=1;
          }
          
          if(confirm_password!="" && confirm_password==new_password){
             
              $('#confirm_password_err').text('');
          }
          
          if(flag==1){
              return false;
          }
          
      else{
          let reset_password_form = document.getElementById("reset_password_form");
           let fd = new FormData(reset_password_form);
          $.ajax({
             url : base_url+"change_reset_password",
             type : "POST",
             data : fd,
             processData: false,
             contentType: false,
             success : function(data){
              //   var res = JSON.parse(data);
                
                if(data==1){
                       $("#msg").show();
                        $("#msg").text("Password Changed Successfully").addClass("text-success");;
                         $("#p1").html("");
                            $("#heading").hide();
                            $("#reset_form").hide();
                            $("#suppchat_logo").hide();

                            setTimeout(function () {
                              location.href=base_url+'login';
                            }, 2000);
                            
                      

                }
                else if(data==2){
                   $("#msg").text("Something went wrong");
                }
                else if(data==3){
                   $("#msg").text("Confirm password does not matched with new password");
                }
                
                if($("#reset_password_key").val()==""){
                    $("#msg").show();
                  $("#msg").text("Password updated successfully");
                }
             }
          });
      }
      
  });

</script>
