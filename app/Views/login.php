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

  /* Left Column content matching mockup */
  .register-left-content {
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: left;
  }

  .register-left-content .left-kicker {
    font-family: 'Poppins', sans-serif;
    font-size: 18px;
    font-weight: 700;
    color: #8c6239;
    margin-bottom: 8px;
    display: block;
    letter-spacing: 0.2px;
  }

  .register-left-content .left-title {
    font-family: 'Poppins', sans-serif;
    font-size: 38px;
    font-weight: 700;
    color: #1a1a1a;
    line-height: 1.25;
    margin-bottom: 16px;
    letter-spacing: -0.5px;
  }

  .register-left-content .left-desc {
    font-family: 'Poppins', sans-serif;
    font-size: 15px;
    color: #555;
    line-height: 1.6;
    margin-bottom: 30px;
    max-width: 95%;
  }

  .left-image-container {
    width: 100%;
    border-radius: 20px;
    overflow: hidden;
  }

  .left-hero-image {
    width: 100%;
    height: auto;
    display: block;
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
    padding-right: 48px !important;
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
  .error.text-danger {
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
  .btn#login {
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

  .btn#login:hover {
    background: #73512e !important;
    box-shadow: 0 10px 25px rgba(140, 98, 57, 0.25) !important;
    transform: translateY(-1px);
    color: #fff !important;
  }

  /* Forgot Password Link styling */
  .forget-password-link {
    font-size: 14px;
    font-weight: 600;
    color: #8c6239;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-block;
  }

  .forget-password-link:hover {
    color: #73512e;
    text-decoration: underline;
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

  /* Social buttons styling */
  .btn-outline-social {
    width: 100%;
    height: 48px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid rgba(74, 52, 39, 0.15) !important;
    border-radius: 10px !important;
    background: #ffffff !important;
    color: #333 !important;
    font-size: 14.5px !important;
    font-weight: 600 !important;
    transition: all 0.3s ease !important;
    box-shadow: none !important;
    text-transform: none !important;
    margin-bottom: 12px;
    text-decoration: none !important;
  }

  .btn-outline-social:hover {
    background: #fdfdfd !important;
    border-color: rgba(74, 52, 39, 0.3) !important;
    transform: translateY(-1px);
    color: #333 !important;
  }
</style>

<section class="security-bg-section">
  <div class="container">
      <div class="row align-items-center no-gutters">
        <!-- Left Image block matching exact mockup scene with headers -->
        <div class="col-md-6 d-none d-md-block pr-md-4 register-left-content">
          <span class="left-kicker">Welcome Back!</span>
          <h2 class="left-title">Login to Your Account</h2>
          <p class="left-desc">Access your account to manage orders, track deliveries, and enjoy a personalized shopping experience.</p>
          <div class="left-image-container">
            <img src="<?php echo base_url('public/images/register_left.png'); ?>" alt="Cozy furniture corner" class="left-hero-image" />
          </div>
        </div>

        <!-- Right Form block matching mockup white card -->
        <div class="col-md-6 col-lg-6 pl-md-4">
          <div class="card card-registration">
            <div class="card-body p-4 p-md-5">
              <!-- Title & description -->
              <h2 class="security-title">Login</h2>
              <p class="security-desc">Welcome back! Please enter your details.</p>

              <form>
                <input type="hidden" id="base_url" value="<?php echo base_url(); ?>">

                <!-- Email input with clean envelope icon -->
                <div class="form-outline email">
                  <label class="form-label" for="email">Email Address</label>
                  <div class="input-icon-wrapper">
                    <i class="fa-regular fa-envelope"></i>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email address" />
                  </div>
                </div>

                <!-- Password input with visibility toggle -->
                <div class="form-outline password">
                  <label class="form-label" for="password">Password</label>
                  <div class="input-icon-wrapper">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" id="password" name="password" maxlength="32" class="form-control" placeholder="Enter your password" />
                    <i class="fa-regular fa-eye-slash toggle-password" style="left: auto; right: 18px; cursor: pointer; pointer-events: auto;"></i>
                  </div>
                  <div class="text-right mt-2">
                    <a class="forget-password-link" href="<?php echo base_url(); ?>forget_password">Forgot Password?</a>
                  </div>
                </div>

                <!-- Submit button with arrow -->
                <button type="button" name="submit" id="login" class="mt-4 btn">
                  Login <i class="fa-solid fa-arrow-right-long"></i>
                </button>

                <!-- OR separation divider -->
                <div class="divider-wrapper">
                  <div class="divider-line"></div>
                  <span class="divider-text">OR</span>
                  <div class="divider-line"></div>
                </div>

                <!-- Social Sign-in Buttons -->
                <a class="btn-outline-social" href="#!">
                  <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18">
                    <path fill="#4285F4" d="M17.64 9.2c0-.63-.06-1.25-.16-1.84H9v3.47h4.84c-.21 1.12-.84 2.07-1.79 2.7v2.25h2.9c1.69-1.55 2.69-3.84 2.69-6.58z"/>
                    <path fill="#34A853" d="M9 18c2.43 0 4.47-.8 5.96-2.22l-2.9-2.25c-.8.54-1.83.87-3.06.87-2.35 0-4.34-1.58-5.05-3.71H.95v2.3C2.43 15.93 5.48 18 9 18z"/>
                    <path fill="#FBBC05" d="M3.95 10.69c-.18-.54-.28-1.12-.28-1.69s.1-1.15.28-1.69V5H.95C.34 6.2.01 7.57.01 9s.34 2.8.94 4v-2.31z"/>
                    <path fill="#EA4335" d="M9 3.58c1.32 0 2.5.45 3.44 1.35l2.58-2.58C13.46 1.05 11.43 0 9 0 5.48 0 2.43 2.07.95 5l3 2.3c.71-2.13 2.7-3.72 5.05-3.72z"/>
                  </svg>
                  Continue with Google
                </a>
                <a class="btn-outline-social" href="#!">
                  <i class="fa-brands fa-apple mr-2" style="font-size: 18px; color: #000;"></i> Continue with Apple
                </a>

              </form>
              <!-- Footer Redirection Link -->
              <div class="mt-4 text-center">
                <p class="mb-0 text-muted" style="font-size: 14.5px; font-weight: 500;">
                  Don't have an account? <a href="<?php echo base_url("register"); ?>"
                    style="color: #8c6239; font-weight: 700; text-decoration: none; transition: all 0.3s ease;"
                    onmouseover="this.style.color='#73512e'" onmouseout="this.style.color='#8c6239'">Register Now</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      

    </div>
</section>
<?= $this->include('footer') ?>

<script>
  // Dynamic eye visibility toggle for password input
  $('.toggle-password').on('click', function() {
    var passwordInput = $('#password');
    var isPassword = passwordInput.attr('type') === 'password';
    passwordInput.attr('type', isPassword ? 'text' : 'password');
    $(this).toggleClass('fa-eye-slash fa-eye');
  });

  // Login handler
  $('#login').on('click', function() {
    var email = $('#email').val();
    var password = $('#password').val();
    var base_url = $("#base_url").val();
    
    // Clear legacy errors
    $('.error.text-danger').remove();
    
    var flag = 0;
    
    if (email == '') {
      $(".email").after('<div class="error text-danger">Please enter email address</div>');
      flag = 1;
    }
    
    if (password == '') {
      $('.password').after('<div class="error text-danger">Please enter password</div>');
      flag = 1;
    }
    
    if (flag == 0) {
      $.ajax({
        url: base_url + "checklogin",
        method: "POST",
        data: {
          email: email,
          password: password,
        },
        success: function(data) {
          if (data == 1) {
            location.href = base_url + 'checkout';
          } else if (data == 2) {
            $(".email").after('<div class="error text-danger">Wrong Password</div>');
          } else if (data == 3) {
            $(".email").after('<div class="error text-danger">User not registered</div>');
          }
        }
      });
    }
    
    if (flag == 1) {
      return false;
    }
  });
</script>