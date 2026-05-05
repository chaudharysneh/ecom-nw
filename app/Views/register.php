<?php include ('header.php');?>
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

input:not([type=range]) {
    padding: 3px !important;
}

.form-section {
    display: none; /* Hide sections by default */
    transition: opacity 0.5s ease-in-out; /* Smooth transition */
    opacity: 0;
    position: absolute; /* Overlay the next section */
    top: 0;
    left: 0;
    width: 100%;
  }

  .form-section.active {
    display: block;
    opacity: 1;
    position: relative; /* Bring active section into view */
  }

  
</style>

<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row align-items-center">
        <div class="col-md-4 d-none d-md-block">
        <!--<img src="<?php // echo base_url('public/images/login.png'); ?>" alt="Login image" class="login-image">-->
        <img src="https://img.freepik.com/premium-vector/website-registration-vector-concept-create-account-login-illustration_939213-886.jpg?ga=GA1.1.875642369.1726727013&semt=ais_hybrid" alt="Login image" class="login-image">
        
      </div>
      <div class=" col-lg-8">
        <h3 class="mb-3 pb-2 text-center">Create an Account</h3>
        <div class="card shadow-2-strong card-registration">
          <div class="card-body p-4">
            
            <form id="registerdt" method="post" enctype="multipart/form-data">
                <fieldset class="form-section active">
                <div class="row">
                    <div class="col-md-6 mb-2 mt-2">
                      <div class="form-outline firstName">
                        <label class="form-label" for="firstName">First Name</label>
                        <input type="text" id="firstName" name="firstName" maxlength="20" class="form-control mb-0" />
                      </div>
                    </div>
                    <div class="col-md-6 mb-2 mt-2">
                      <div class="form-outline lastName">
                        <label class="form-label" for="lastName">Last Name</label>
                        <input type="text" id="lastName" name="lastName" maxlength="20" class="form-control mb-0" />
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-2 mt-2 pb-2">
                      <div class="form-outline password">
                        <label class="form-label" for="form1Example23">Password</label>
                        <input type="password" id="password" name="password" maxlength="32" class="form-control mb-0" />
                      </div>
                    </div>
                    <div class="col-md-6 mb-2 mt-2 pb-2">
                      <div class="form-outline confpass">
                        <label class="form-label" for="form1Example23">Confirm Password</label>
                            <input type="password" id="confpass" name="confpass" maxlength="32" class="form-control mb-0" />
                      </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-2 mt-2 pb-2">
                      <div class="form-outline emailAddress">
                        <label class="form-label" for="emailAddress">Email</label>
                        <input type="email" id="emailAddress" name="emailAddress" class="form-control mb-0" />
                      </div>
                    </div>
                    
                    <div class="col-md-6 mb-2 mt-2 pb-2">
                      <div class="form-outline phoneNumber">
                        <label class="form-label" for="phoneNumber">Phone Number</label>
                        <input type="number" id="phoneNumber" name="phoneNumber" class="form-control mb-0" />
                      </div>
                    </div>
                </div>
              
                <div class="row">
                    <div class="col-md-6 mb-2 mt-2 pb-2">
                      <div class="form-outline dob">
                        <label class="form-label" for="emailAddress">Date of birth</label>
                        <input type="date" id="dob" name="dob" class="form-control" />
                      </div>
                    </div>
                    
                    <div class="col-md-6 mb-2 mt-2 pb-2">
                        <div class="form-outline">
                            <label for="defaultFormControlInput" class="form-label">Profile Image</label>
                            <input type="file"  id="profile_pic" name="profile_pic" aria-describedby="defaultFormControlHelp" class="form-control" />
                            <span id="cus_email_err"></span>
                        </div>
                    </div>
                </div>
                <button type="button" class="btn next-btn rounded float-right mt-2">Next<i class="fa-chevron-right fa-solid ml-1"></i></button>
              </fieldset>
                
                <!--===============================================-->
                <fieldset class="form-section">
                <h4 class="mt-3">Address</h4>
                
                <div class="row">
                    <div class="col-md-6 mb-2 mt-2 pb-2">
                        <label for="defaultFormControlInput" class="form-label">Address 1</label>
                        <textarea type="text" class="form-control" id="address1" maxlength="110" name="address1" aria-describedby="defaultFormControlHelp"></textarea>
                        <span id="cus_address1_err"></span>
                    </div>
                    <div class="col-md-6 mb-2 mt-2 pb-2">
                        <label for="defaultFormControlInput" class="form-label">Address 2</label>
                        <textarea type="text" class="form-control" id="address2" name="address2" maxlength="110" aria-describedby="defaultFormControlHelp"></textarea>
                        <span id="cus_address2_err"></span>
                    </div>
                </div>
                
                <div class="row">
                        <div class="col-md-6 mb-2 mt-2 pb-2">
                            <label for="inputcountry">Country</label>
                            <select id="country" name="country" class="form-control">
                                <option value="">Choose country</option>
                                <?php
                                    foreach($country as $con)
                                    {
                                ?>
                                <option value="<?php echo $con['CountryID']; ?>"><?php echo $con['CountryName']; ?></option>
                                <?php 
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6 mb-2 mt-2 pb-2">
                            <label for="inputState">State</label>
                            <select id="state" name="state" class="form-control">
                                <option value="">Choose state</option>
                          </select>
                        </div>
                </div>
                
                <div class="row">
                        <div class="col-md-6 mb-2 mt-2 pb-2">
                            <label for="inputState">City</label>
                            <select id="city" name="city" class="form-control">
                                <option value="">Choose city</option>
                            </select>
                        </div>
                       <div class="col-md-6 mb-2 mt-2 pb-2">
                            <label for="defaultFormControlInput" class="form-label">Postcode</label>
                            <input type="number" class="form-control" id="postcode" maxlength="10" name="postcode" aria-describedby="defaultFormControlHelp" />
                            <span id="cus_postcode_err"></span>
                       </div>
                </div>
                
                <div class="dis_msg"></div>
                
                <!--<div class="col-12 mt-3 pt-0 px-0">-->
                <!--<button class="btn btn-block gradient-custom-4 text-body rounded" id="register" type="button" value="Submit" />Register Now</button>-->
                <!--</div>-->
                <button type="button" class="btn prev-btn rounded"><i class="fa-chevron-left fa-solid mr-1"></i>Previous</button>
                <!--<button type="submit" class="btn">Register Now</button>-->
                <button class="btn gradient-custom-4 text-body rounded float-right" id="register" type="button" value="Submit" />Register Now</button>
              </fieldset>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include ('footer.php');?>

<script>
  // Get today's date in the YYYY-MM-DD format
  const today = new Date().toISOString().split("T")[0];
  document.getElementById("dob").setAttribute("max", today);
//   ==========================
document.addEventListener("DOMContentLoaded", function () {
    const nextBtn = document.querySelector(".next-btn");
    const prevBtn = document.querySelector(".prev-btn");
    const fieldsets = document.querySelectorAll(".form-section");
    let currentStep = 0;

    function validateFirstFieldset() {
        let isValid = true;
        // Clear previous error messages
        document.querySelectorAll(".error").forEach(error => error.remove());

        // Get all input fields in the current fieldset
        const firstFieldset = fieldsets[currentStep];
        const firstName = document.querySelector("#firstName").value.trim();
        const lastName = document.querySelector("#lastName").value.trim();
        const password = document.querySelector("#password").value.trim();
        const confpass = document.querySelector("#confpass").value.trim();
        const emailAddress = document.querySelector("#emailAddress").value.trim();
        const phoneNumber = document.querySelector("#phoneNumber").value.trim();
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

        // Validate Email Address
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
        return isValid;
    }

    function updateSteps() {
        fieldsets.forEach((fieldset, index) => {
            fieldset.classList.toggle("active", index === currentStep);
        });
    }

    nextBtn.addEventListener("click", function () {
        if (currentStep === 0) {
            // Validate the first fieldset before moving to the next step
            if (validateFirstFieldset()) {
                currentStep++;
                updateSteps();
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
        }
    });
});

  
  
//   ===========================
//   document.addEventListener("DOMContentLoaded", function () {
//     const nextBtn = document.querySelector(".next-btn");
//     const prevBtn = document.querySelector(".prev-btn");
//     const fieldsets = document.querySelectorAll(".form-section");
//     let currentStep = 0;

//     function updateSteps() {
//       fieldsets.forEach((fieldset, index) => {
//         fieldset.classList.toggle("active", index === currentStep);
//       });
//     }

//     nextBtn.addEventListener("click", function () {
//       if (currentStep < fieldsets.length - 1) {
//         currentStep++;
//         updateSteps();
//       }
//     });

//     prevBtn.addEventListener("click", function () {
//       if (currentStep > 0) {
//         currentStep--;
//         updateSteps();
//       }
//     });
//   });
</script>

