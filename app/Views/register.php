<?php include ('header.php');?>
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
    margin-bottom: 25px;
    text-align: center;
    letter-spacing: -0.5px;
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
    margin-bottom: 8px;
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

  /* Date selector specific styling */
  input[type="date"].form-control {
    padding-right: 15px;
  }

  /* Hides the default webkit calendar picker icon */
  input[type="date"]::-webkit-calendar-picker-indicator {
    display: none;
    -webkit-appearance: none;
  }

  /* Custom styled upload button matching mockup Choose File */
  .custom-file-upload-mock {
    width: 100%;
    height: 52px;
    border: 1px solid rgba(74, 52, 39, 0.15);
    border-radius: 10px;
    display: flex;
    align-items: center;
    padding: 0 5px;
    background: #ffffff;
    cursor: pointer;
  }

  .file-upload-btn {
    background: #f1ede7;
    border: 1px solid rgba(74, 52, 39, 0.15);
    border-radius: 6px;
    padding: 8px 16px;
    font-size: 13.5px;
    font-weight: 600;
    color: #333;
    margin-right: 12px;
    transition: all 0.2s ease;
    white-space: nowrap;
    flex-shrink: 0;
  }

  .file-upload-btn:hover {
    background: #e5dfd5;
  }

  .file-upload-filename {
    font-size: 14px;
    color: #777;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 180px;
  }

  /* Textarea custom structure */
  textarea.form-control {
    min-height: 80px;
    padding-top: 12px !important;
    resize: none;
  }

  /* Custom dropdown select with arrow */
  select.form-control {
    appearance: none;
    -webkit-appearance: none;
    -moz-appearance: none;
    background-image: url("data:image/svg+xml;utf8,<svg fill='%238c6239' height='24' viewBox='0 0 24 24' width='24' xmlns='http://www.w3.org/2000/svg'><path d='M7 10l5 5 5-5z'/><path d='M0 0h24v24H0z' fill='none'/></svg>");
    background-repeat: no-repeat;
    background-position: calc(100% - 18px) 50%;
    background-size: 18px;
    padding-right: 40px !important;
  }

  /* Custom elegant error message styling */
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
  .btn.next-btn, .btn.prev-btn, .btn#register {
    padding: 14px 28px !important;
    font-size: 15px !important;
    font-weight: 600 !important;
    border-radius: 10px !important;
    transition: all 0.3s ease !important;
    border: none !important;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
  }

  .btn.next-btn, .btn#register {
    background: #8c6239 !important;
    color: #fff !important;
    box-shadow: 0 6px 18px rgba(140, 98, 57, 0.15) !important;
  }

  .btn.next-btn:hover, .btn#register:hover {
    background: #73512e !important;
    box-shadow: 0 10px 25px rgba(140, 98, 57, 0.25) !important;
    transform: translateY(-1px);
    color: #fff !important;
  }

  .btn.prev-btn {
    background: #f1ede7 !important;
    border: 1px solid rgba(74, 52, 39, 0.15) !important;
    color: #333 !important;
  }

  .btn.prev-btn:hover {
    background: #e5dfd5 !important;
    color: #111 !important;
  }

  /* Checkbox & Terms Agreement styling */
  .agreement-box {
    display: flex;
    align-items: center;
    margin-right: 15px;
  }

  .custom-checkbox {
    width: 17px;
    height: 17px;
    accent-color: #8c6239;
    cursor: pointer;
    border-radius: 4px;
    border: 1px solid rgba(74, 52, 39, 0.2);
    margin-right: 8px !important;
    margin-bottom: 0 !important;
  }

  .agreement-text {
    font-size: 13.5px !important;
    color: #555 !important;
    font-weight: 500 !important;
    cursor: pointer;
    user-select: none;
    letter-spacing: 0.1px;
    margin-bottom: 0 !important;
    display: inline-block !important;
    line-height: 1.4 !important;
  }

  .agreement-link {
    color: #8c6239;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.3s ease;
  }

  .agreement-link:hover {
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

  /* Stepper fieldset switcher styling */
  .form-section {
    display: none;
    opacity: 0;
    transform: translateY(15px);
    transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.4s ease;
  }

  .form-section.active {
    display: block;
    opacity: 1;
    transform: translateY(0px);
  }
</style>

<section class="security-bg-section">
  <div class="container">
      <div class="row align-items-center no-gutters">
        
        <!-- Left Image block matching exact mockup scene with headers -->
        <div class="col-md-5 d-none d-md-block pr-md-4 register-left-content">
          <span class="left-kicker">Join FurniLife</span>
          <h2 class="left-title">Create Your Account</h2>
          <p class="left-desc">Sign up to explore stylish furniture, track orders, and enjoy exclusive offers tailored for you.</p>
          <div class="left-image-container">
            <img src="<?php echo base_url('public/images/register_left.png'); ?>" alt="Cozy furniture corner" class="left-hero-image" />
          </div>
        </div>

        <!-- Right Form block matching mockup white card -->
        <div class="col-md-7 col-lg-7 pl-md-4">
          <div class="card card-registration">
            <div class="card-body p-4 p-md-5">
              
              <!-- Dynamic title based on step -->
              <h2 class="security-title" id="card-title">Create an Account</h2>

              <form id="registerdt" method="post" enctype="multipart/form-data">
                
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-outline firstName">
                        <label class="form-label" for="firstName">First Name</label>
                        <div class="input-icon-wrapper">
                          <i class="fa-regular fa-user"></i>
                          <input type="text" id="firstName" name="firstName" maxlength="20" class="form-control" placeholder="Enter your first name" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-outline lastName">
                        <label class="form-label" for="lastName">Last Name</label>
                        <div class="input-icon-wrapper">
                          <i class="fa-regular fa-user"></i>
                          <input type="text" id="lastName" name="lastName" maxlength="20" class="form-control" placeholder="Enter your last name" />
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-outline emailAddress">
                        <label class="form-label" for="emailAddress">Email</label>
                        <div class="input-icon-wrapper">
                          <i class="fa-regular fa-envelope"></i>
                          <input type="email" id="emailAddress" name="emailAddress" class="form-control" placeholder="Enter your email address" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-outline phoneNumber">
                        <label class="form-label" for="phoneNumber">Phone Number</label>
                        <div class="input-icon-wrapper">
                          <i class="fa-solid fa-phone"></i>
                          <input type="number" id="phoneNumber" name="phoneNumber" class="form-control" placeholder="Enter your phone number" />
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-outline password">
                        <label class="form-label" for="password">Password</label>
                        <div class="input-icon-wrapper">
                          <i class="fa-solid fa-lock"></i>
                          <input type="password" id="password" name="password" maxlength="32" class="form-control" placeholder="Enter your password" />
                          <i class="fa-regular fa-eye-slash toggle-password" data-target="password" style="left: auto; right: 18px; cursor: pointer; pointer-events: auto;"></i>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-outline confpass">
                        <label class="form-label" for="confpass">Confirm Password</label>
                        <div class="input-icon-wrapper">
                          <i class="fa-solid fa-lock"></i>
                          <input type="password" id="confpass" name="confpass" maxlength="32" class="form-control" placeholder="Confirm your password" />
                          <i class="fa-regular fa-eye-slash toggle-password" data-target="confpass" style="left: auto; right: 18px; cursor: pointer; pointer-events: auto;"></i>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-outline dob">
                        <label class="form-label" for="dob">Date of Birth</label>
                        <div class="input-icon-wrapper">
                          <i class="fa-regular fa-calendar-days"></i>
                          <input type="date" id="dob" name="dob" class="form-control" onclick="this.showPicker()" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-outline">
                        <label class="form-label" for="profile_pic">Profile Image (Optional)</label>
                        <div class="custom-file-upload-mock" onclick="document.getElementById('profile_pic').click()">
                          <span class="file-upload-btn">Choose File</span>
                          <span class="file-upload-filename" id="file-upload-label">No file chosen</span>
                        </div>
                        <input type="file" id="profile_pic" name="profile_pic" class="d-none" />
                        <span id="cus_email_err"></span>
                      </div>
                    </div>
                  </div>

                  <!-- Step 1 Footer Layout matching mockup check + button -->
                  <div class="mt-3">
                    <div class="agreement-box mb-3">
                      <input type="checkbox" id="agree" name="agree" class="custom-checkbox" />
                      <label for="agree" class="agreement-text">
                        I agree to the <a href="<?php echo base_url('all_terms_conditions'); ?>" class="agreement-link">Terms & Conditions</a> and <a href="<?php echo base_url('privacy-policy'); ?>" class="agreement-link">Privacy Policy</a>
                      </label>
                    </div>
                    <button class="btn next-btn mt-2 w-100" id="register" type="button">CREATE ACCOUNT<i class="fa-solid fa-arrow-right-long"></i></button>

                  </div>

                  <div class="dis_msg mt-3"></div>

                  <!-- OR separation divider -->
                  <div class="divider-wrapper">
                    <div class="divider-line"></div>
                    <span class="divider-text">OR</span>
                    <div class="divider-line"></div>
                  </div>

                  <!-- Social Sign-in Buttons on One Line -->
                  <div class="row no-gutters mb-3">
                    <div class="col-6 pr-2">
                      <a class="btn-outline-social mb-0" href="#!">
                        <svg class="mr-2" width="18" height="18" viewBox="0 0 18 18">
                          <path fill="#4285F4" d="M17.64 9.2c0-.63-.06-1.25-.16-1.84H9v3.47h4.84c-.21 1.12-.84 2.07-1.79 2.7v2.25h2.9c1.69-1.55 2.69-3.84 2.69-6.58z"/>
                          <path fill="#34A853" d="M9 18c2.43 0 4.47-.8 5.96-2.22l-2.9-2.25c-.8.54-1.83.87-3.06.87-2.35 0-4.34-1.58-5.05-3.71H.95v2.3C2.43 15.93 5.48 18 9 18z"/>
                          <path fill="#FBBC05" d="M3.95 10.69c-.18-.54-.28-1.12-.28-1.69s.1-1.15.28-1.69V5H.95C.34 6.2.01 7.57.01 9s.34 2.8.94 4v-2.31z"/>
                          <path fill="#EA4335" d="M9 3.58c1.32 0 2.5.45 3.44 1.35l2.58-2.58C13.46 1.05 11.43 0 9 0 5.48 0 2.43 2.07.95 5l3 2.3c.71-2.13 2.7-3.72 5.05-3.72z"/>
                        </svg>
                        Continue with Google
                      </a>
                    </div>
                    <div class="col-6 pl-2">
                      <a class="btn-outline-social mb-0" href="#!">
                        <i class="fa-brands fa-apple mr-2" style="font-size: 18px; color: #000;"></i> Continue with Apple
                      </a>
                    </div>
                  </div>

              </form>
              <!-- Footer Navigation Link matching mockup -->
              <div class="text-center pt-1">
                <p class="mb-0 text-muted" style="font-size: 14.5px; font-weight: 500;">
                  Already have an account? <a href="<?php echo base_url('login'); ?>"
                    style="color: #8c6239; font-weight: 700; text-decoration: none; transition: all 0.3s ease;"
                    onmouseover="this.style.color='#73512e'" onmouseout="this.style.color='#8c6239'">Login</a>
                </p>
              </div>
            </div>
          </div>
        </div>

      </div>


    </div>
</section>

<?php include ('footer.php');?>

<script>
  // Get today's date in the YYYY-MM-DD format for Date of Birth max check
  const today = new Date().toISOString().split("T")[0];
  const dobInput = document.getElementById("dob");
  if(dobInput) {
    dobInput.setAttribute("max", today);
  }

  // Dynamic eye visibility toggle for passwords
  $('.toggle-password').on('click', function() {
    var targetId = $(this).data('target');
    var passwordInput = $('#' + targetId);
    var isPassword = passwordInput.attr('type') === 'password';
    passwordInput.attr('type', isPassword ? 'text' : 'password');
    $(this).toggleClass('fa-eye-slash fa-eye');
  });

  // Custom File input label update
  document.getElementById("profile_pic").addEventListener("change", function(e) {
    const fileName = e.target.files[0] ? e.target.files[0].name : "No file chosen";
    document.getElementById("file-upload-label").textContent = fileName;
  });

  // Dynamic step switching & validation logic
  document.addEventListener("DOMContentLoaded", function () {
    const nextBtn = document.querySelector(".next-btn");
    const prevBtn = document.querySelector(".prev-btn");
    const fieldsets = document.querySelectorAll(".form-section");
    let currentStep = 0;

    function validateFirstFieldset() {
        let isValid = true;
        // Clear previous error messages
        document.querySelectorAll(".error").forEach(error => error.remove());

        // Get values
        const firstName = document.querySelector("#firstName").value.trim();
        const lastName = document.querySelector("#lastName").value.trim();
        const password = document.querySelector("#password").value.trim();
        const confpass = document.querySelector("#confpass").value.trim();
        const emailAddress = document.querySelector("#emailAddress").value.trim();
        const phoneNumber = document.querySelector("#phoneNumber").value.trim();
        const agreeCheckbox = document.querySelector("#agree");
        const emailRegex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;

        // Validate First Name
        if (!firstName) {
            document.querySelector(".firstName").insertAdjacentHTML(
                "afterend",
                '<div class="error text-danger">Please enter first name</div>'
            );
            isValid = false;
        }

        // Validate Last Name
        if (!lastName) {
            document.querySelector(".lastName").insertAdjacentHTML(
                "afterend",
                '<div class="error text-danger">Please enter last name</div>'
            );
            isValid = false;
        }

        // Validate Email
        if (!emailAddress) {
            document.querySelector(".emailAddress").insertAdjacentHTML(
                "afterend",
                '<div class="error text-danger">Please enter email address</div>'
            );
            isValid = false;
        } else if (!emailRegex.test(emailAddress)) {
            document.querySelector(".emailAddress").insertAdjacentHTML(
                "afterend",
                '<div class="error text-danger">Please enter a valid email address</div>'
            );
            isValid = false;
        }

        // Validate Phone Number
        if (!phoneNumber) {
            document.querySelector(".phoneNumber").insertAdjacentHTML(
                "afterend",
                '<div class="error text-danger">Please enter phone number</div>'
            );
            isValid = false;
        } else if (!/^\d{10}$/.test(phoneNumber)) {
            document.querySelector(".phoneNumber").insertAdjacentHTML(
                "afterend",
                '<div class="error text-danger">Phone number must be exactly 10 digits</div>'
            );
            isValid = false;
        }

        // Validate Password
        if (!password) {
            document.querySelector(".password").insertAdjacentHTML(
                "afterend",
                '<div class="error text-danger">Please enter password</div>'
            );
            isValid = false;
        }

        // Validate Confirm Password
        if (!confpass) {
            document.querySelector(".confpass").insertAdjacentHTML(
                "afterend",
                '<div class="error text-danger">Please enter confirm password</div>'
            );
            isValid = false;
        } else if (password !== confpass) {
            document.querySelector(".confpass").insertAdjacentHTML(
                "afterend",
                '<div class="error text-danger">Password and confirm password do not match</div>'
            );
            isValid = false;
        }

        // Validate Terms Checkbox
        if (agreeCheckbox && !agreeCheckbox.checked) {
            document.querySelector(".agreement-box").insertAdjacentHTML(
                "afterend",
                '<div class="error text-danger">You must agree to the Terms & Conditions and Privacy Policy</div>'
            );
            isValid = false;
        }
        
        return isValid;
    }

    function updateSteps() {
        fieldsets.forEach((fieldset, index) => {
            fieldset.classList.toggle("active", index === currentStep);
        });

        // Update Card Title
        const cardTitle = document.getElementById("card-title");
        if (currentStep === 0) {
            cardTitle.textContent = "Create an Account";
        } else {
            cardTitle.textContent = "Address Details";
        }
    }

    nextBtn.addEventListener("click", function () {
        if (currentStep === 0) {
            if (validateFirstFieldset()) {
                currentStep++;
                updateSteps();
                window.scrollTo({ top: 0, behavior: 'smooth' });
            }
        } else {
            currentStep++;
            updateSteps();
        }
    });

    prevBtn.addEventListener("click", function () {
        if (currentStep > 0) {
            currentStep--;
            updateSteps();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    });
  });

  // Local Dropdown load AJAX
  $("#country").on('change', function() {
    var country = $(this).val();
    $.ajax({
      url: 'getcountrystate',
      type: "POST",
      data: {country: country},
      dataType: 'html',
      success: function(data) {
        $('#state').html(data);
      }
    });
  });

  $("#state").on('change', function() {
    var state = $("#state").val();
    $.ajax({
      url: 'getstatecity',
      type: 'POST',
      data: {state: state},
      dataType: 'html',
      success: function(data) {
        $("#city").html(data);
      }
    });
  });
</script>
