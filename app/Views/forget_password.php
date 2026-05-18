<?= $this->include('header') ?>
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
  #email_err.text-danger {
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
  .btn.send_email_btn {
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

  .btn.send_email_btn:hover {
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
          <div class="card card-registration">
            <div class="card-body p-4 p-md-5">
              <!-- Lock circle badge -->
              <div class="lock-circle-wrapper">
                <div class="lock-circle">
                  <i class="fa-solid fa-lock"></i>
                </div>
              </div>

              <!-- Title & description -->
              <h2 class="security-title">Forgot Password?</h2>
              <p class="security-desc">No worries! Enter your email address and we'll send you a link to reset your password.</p>

              <!-- Server feedback messages -->
              <div id="msg" class="mb-3 font-weight-bold text-center" style="font-size: 14.5px;"></div>

              <form>
                <input type="hidden" id="base_url" value="<?php echo base_url(); ?>">

                <!-- Email input with clean envelope icon -->
                <div class="form-outline email">
                  <label class="form-label" for="forget_email">Email Address</label>
                  <div class="input-icon-wrapper">
                    <i class="fa-regular fa-envelope"></i>
                    <input type="email" id="forget_email" name="forget_email" class="form-control" placeholder="Enter your email address" />
                  </div>
                  <span id="email_err"></span>
                </div>

                <!-- Submit button with arrow -->
                <button type="button" name="submit" class="mt-4 btn send_email_btn">
                  Send Reset Link <i class="fa-solid fa-arrow-right-long"></i>
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
        </div>
      </div>
    </div>
</section>
<?= $this->include('footer') ?>

<script>
  $('.send_email_btn').on('click', function() {
    var email = $('#forget_email').val();
    var regEx =  /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    var validEmail = regEx.test(email);
    var base_url = $("#base_url").val();
    var flag=0;
  
    if (email=="") {
      $('#email_err').text('Email is required').addClass("text-danger");
      flag=1;
    } else {
      $('#email_err').text('');
    } 
  
    if (email!='' && !validEmail) {
      $('#email_err').text('Please enter valid email').addClass("text-danger");
      flag=1;
    }
  
    if(flag==0){
      $.ajax({
        url: "send_forget_password_email",
        method: "POST",
        data: {
          forgotEmail: email,
        },
        success: function(data){
          console.log(data);
          if(data==1){
            $("#msg").removeClass("text-danger").addClass("text-success").text('Check your email...');
            setTimeout(function () {
              location.reload();
            }, 2000);
          } else if(data==2){
            $("#msg").removeClass("text-success").addClass("text-danger").text('Unable to send email. Please try again.');
          } else if(data==3){
            $("#msg").removeClass("text-success").addClass("text-danger").text('Email not registered');
          }
        }
      });
    }
  
    if(flag==1){
      return false;
    }
  });
</script>
