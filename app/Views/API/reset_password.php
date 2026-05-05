<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ECOM</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <!--<link href="<?php echo base_url(); ?>public/assets/img/favicon.png" rel="icon">-->
  <!--<link href="<?php echo base_url(); ?>public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">-->

  <!-- Google Fonts -->
  <!--<link href="https://fonts.gstatic.com" rel="preconnect">-->
  <!--<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">-->

  <!-- Vendor CSS Files -->
  <!--<link href="<?php echo base_url(); ?>public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
  <!--<link href="<?php echo base_url(); ?>public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">-->
  <!--<link href="<?php echo base_url(); ?>public/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">-->
  <!--<link href="<?php echo base_url(); ?>public/assets/vendor/quill/quill.snow.css" rel="stylesheet">-->
  <!--<link href="<?php echo base_url(); ?>public/assets/vendor/quill/quill.bubble.css" rel="stylesheet">-->
  <!--<link href="<?php echo base_url(); ?>public/assets/vendor/remixicon/remixicon.css" rel="stylesheet">-->
  <!--<link href="<?php echo base_url(); ?>public/assets/vendor/simple-datatables/style.css" rel="stylesheet">-->

  <!-- Template Main CSS File -->
  <!--<link href="<?php echo base_url(); ?>public/assets/css/style.css" rel="stylesheet">-->
  <!--jp............................................................................-->
  
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
  
  <!--jp.......................................................-->
  
  
  <!--ooooooooooo-->
  
 <!--  <link href="<?php echo base_url(); ?>public/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">-->
 <!--   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
 <!--   <link-->
 <!--       href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"-->
 <!--       rel="stylesheet">-->

 <!--<link href="<?php echo base_url(); ?>public/assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">-->

 
    <!-- Custom styles for this template-->
 <!--   <link href="<?php echo base_url(); ?>public/assets/css/sb-admin-2.min.css" rel="stylesheet">-->
 <!--   <link href="<?php echo base_url(); ?>public/assets/css/style.css" rel="stylesheet">-->
  <!--oooooooooooo-->

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <!--<a href="index.html" class="logo d-flex align-items-center w-auto">-->
                  <h3 class="text-danger">ECOM</h3>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                       <?php
                            if($forget_password_key!=NULL){
                        ?> 
                    <h5 class="card-title text-center pb-0 fs-4" id="heading">Reset Password</h5>
                     <?php
                        }
                     ?>
                    <!--<p class="text-center small">Enter your Email & password to login</p>-->
                    <span id="successmsg"></span>
                    
                  </div>
                  
                  <!-- <div id="msggreen" class="text-success"></div> -->
                <?php
                    if($forget_password_key!=NULL){
                ?> 
                  <form class="row g-3 needs-validation" method="post" id="reset_form" enctype="multipart/form-data">
                  <input type="hidden" id="base_url" value="<?php echo base_url(); ?>">
                   <input type="hidden" name="userid" id="userid" value="<?php echo $id; ?>">
                   <input type="hidden" name="reset_password_key" id="reset_password_key" value="<?php echo $reset_password_key; ?>">
                   
                    <div class="col-12">
                    <label for="new_password" class="form-label">New Password</label>
                      <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter New Password" autofocus />
                      <span id="new_password_err"></span>
                    </div>

                    <div class="col-12">
                      <label for="confirm_password" class="form-label">Confirm Password</label>
                      <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Enter Confirm Password" required>
                          <span id="confirm_password_err"></span>
                    </div>
                    <div id="msg" class="text-danger"></div>
                    <div class="col-12">
                      <button class="btn btn-danger w-100 mt-3" type="button" id="reset_password">Reset</button>
                    </div>
                  </form>
                   <?php
                        }
                     ?>
                </div>
              </div>
            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <!--<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>-->

  <!-- Vendor JS Files -->
  <!--<script src="<?php echo base_url(); ?>public/assets/vendor/apexcharts/apexcharts.min.js"></script>-->
  <!--<script src="<?php echo base_url(); ?>public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>-->
  <!--<script src="<?php echo base_url(); ?>public/assets/vendor/chart.js/chart.umd.js"></script>-->
  <!--<script src="<?php echo base_url(); ?>public/assets/vendor/echarts/echarts.min.js"></script>-->
  <!--<script src="<?php echo base_url(); ?>public/assets/vendor/quill/quill.min.js"></script>-->
  <!--<script src="<?php echo base_url(); ?>public/assets/vendor/simple-datatables/simple-datatables.js"></script>-->
  <!--<script src="<?php echo base_url(); ?>public/assets/vendor/tinymce/tinymce.min.js"></script>-->
  <!--<script src="<?php echo base_url(); ?>public/assets/vendor/php-email-form/validate.js"></script>-->

  <!-- Template Main JS File -->
  <!-- jquery cdn -->
  <!--<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>-->

  <!--<script src="<?php echo base_url(); ?>public/assets/js/main.js"></script>-->
  <!--<script src="<?php echo base_url(); ?>public/assets/js/custom.js"></script>-->
<!--jp,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,-->

  <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
   
	<!-- Jquery -->
    <script src="<?php echo base_url(); ?>public/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/jquery-migrate-3.0.0.js"></script>
    
  
	<script src="<?php echo base_url(); ?>public/js/jquery-ui.min.js"></script>
	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
	<!-- Popper JS -->
	<script src="<?php echo base_url(); ?>public/js/popper.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>
	<!-- Color JS -->
	<!-- <script src="<?php echo base_url(); ?>public/js/colors.js"></script> -->
	<!-- Slicknav JS -->
	<script src="<?php echo base_url(); ?>public/js/slicknav.min.js"></script>
	<!-- Owl Carousel JS -->
	<script src="<?php echo base_url(); ?>public/js/owl-carousel.js"></script>
	<!-- Magnific Popup JS -->
	<script src="<?php echo base_url(); ?>public/js/magnific-popup.js"></script>
	<!-- Waypoints JS -->
	<script src="<?php echo base_url(); ?>public/js/waypoints.min.js"></script>
	<!-- Countdown JS -->
	<script src="<?php echo base_url(); ?>public/js/finalcountdown.min.js"></script>
	<!-- Nice Select JS -->
	<script src="<?php echo base_url(); ?>public/js/nicesellect.js"></script>
	<!-- Flex Slider JS -->
	<script src="<?php echo base_url(); ?>public/js/flex-slider.js"></script>
	<!-- ScrollUp JS -->
	<script src="<?php echo base_url(); ?>public/js/scrollup.js"></script>
	<!-- Onepage Nav JS -->
	<script src="<?php echo base_url(); ?>public/js/onepage-nav.min.js"></script>
	<!-- Easing JS -->
	<script src="<?php echo base_url(); ?>public/js/easing.js"></script>
	<!-- Active JS -->
	<script src="<?php echo base_url(); ?>public/js/active.js"></script>





	<script src="<?php echo base_url(); ?>public/js/custom.js"></script>

<!--jp,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,,-->

     <script>
            $(document).ready(function () {
                
                $("#reset_password").on("click",function(e){
                   
                        var new_password= $("#new_password").val();
                        var confirm_password= $("#confirm_password").val();
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
                        let reset_form = document.getElementById("reset_form");
                         let fd = new FormData(reset_form);
                        $.ajax({
                           url : "<?php echo base_url(); ?>api/change_reset_password_app",
                           type : "POST",
                           data : fd,
                           headers: {
                                'Authorization':'hXuRUGsEGuhGf6KG'
                            },
                           processData: false,
                           contentType: false,
                           success : function(data){
                               var res = JSON.parse(data);
                              
                              if(res.status=="success"){
                                     $("#successmsg").show();
                                      $("#successmsg").text("Password Updated Successfully");
                                       $("#p1").html("");
                                          $("#heading").hide();
                                          $("#reset_form").hide();
                                          $("#suppchat_logo").hide();
                              }
                              
                              if($("#reset_password_key").val()==""){
                                  $("#successmsg").show();
                                $("#successmsg").text("Password updated successfully");
                              }
                           }
                        });
                    }
                    
                });
                
              
            });
        </script>

</body>

</html>