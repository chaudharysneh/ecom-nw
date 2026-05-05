
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

<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row align-items-center justify-content-center h-100">
      
        <?php
           if($forget_password_key!=NULL){
        ?> 
        
      <div class="col-md-4 col-lg-4 col-xl-4">
        <div class="text-center mb-3">
                  <h2>Reset Password</h2>
                </div>
        <div class="card p-4">
        <form id="reset_password_form">
             <input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
                    <input type="hidden" name="userid" id="userid" value="<?php echo $UserID; ?>">
                    <input type="hidden" name="reset_password_key" id="reset_password_key" value="<?php echo $reset_password_key; ?>">
                    
          <!-- Email input -->
          <div class="form-outline mb-2 password">
             <!--<label class="form-label" for="form1Example13">Password</label>-->
             <input type="password" name="new_password" id="new_password" class="form-control form-control-lg" placeholder="New Password" aria-label="Password">
                      <span id="new_password_err"></span>
          </div>

      
          <div class="form-outline mb-2 password">
            <!--<label class="form-label" for="form1Example23">Confirm Password</label>-->
            <input type="password" name="confirm_password" id="confirm_password" class="form-control form-control-lg" placeholder="Confirm Password" aria-label="Password">
                      <span id="confirm_password_err"></span>
          </div>

          <div class="mb-4">
            <!-- Checkbox -->
            <!--<div class="form-check pl-4">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3"  />
              <label class="form-check-label" for="form1Example3"> Remember me </label>
            </div>-->
            <!-- <a href="#!">Forgot password?</a> -->
          </div>

          <!-- Submit button -->
          <button type="button" name="submit" id="" class="btn btn-block update_password_btn rounded">Update Password</button>

       



        </form>
      </div>
      </div>
      <?php }else{ ?>
            <span class="fa-2x text-danger">Link has expired</span>
         <?php } ?>
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
