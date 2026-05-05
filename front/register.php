<?php include ('header.php');?>
<style>
  .main-category{
    display: none;
  }
</style>

<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-12 col-lg-9 col-xl-7">
        <h3 class="mb-3 pb-2 text-center">Create an Account</h3>
        <div class="card shadow-2-strong card-registration">
          <div class="card-body p-4">
            
            <form>

              <div class="row">
                <div class="col-md-6 mb-2 mt-2">

                  <div class="form-outline">
                    <label class="form-label" for="firstName">First Name</label>
                    <input type="text" id="firstName" class="form-control form-control-lg" />
                  </div>

                </div>
                <div class="col-md-6 mb-2 mt-2">

                  <div class="form-outline">
                    <label class="form-label" for="lastName">Last Name</label>
                    <input type="text" id="lastName" class="form-control form-control-lg" />
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-md-6 mb-2 mt-2 pb-2">

                  <div class="form-outline">
                    <label class="form-label" for="form1Example23">Password</label>
                    <input type="password" id="form1Example23" class="form-control form-control-lg" />
                  </div>

                </div>
                <div class="col-md-6 mb-2 mt-2 pb-2">

                  <div class="form-outline">
                    <label class="form-label" for="form1Example23">Confirm Password</label>
            <input type="password" id="form1Example24" class="form-control form-control-lg" />
                  </div>

                </div>
              </div>

                 <div class="row">
                <div class="col-md-6 mb-2 mt-2 pb-2">

                  <div class="form-outline">
                    <label class="form-label" for="emailAddress">Email</label>
                    <input type="email" id="emailAddress" class="form-control form-control-lg" />
                  </div>

                </div>
                <div class="col-md-6 mb-2 mt-2 pb-2">

                  <div class="form-outline">
                    <label class="form-label" for="phoneNumber">Phone Number</label>
                    <input type="tel" id="phoneNumber" class="form-control form-control-lg" />
                  </div>

                </div>
              </div>

              <div class="mt-4 pt-2">
                <button class="btn btn-block gradient-custom-4 text-body" type="submit" value="Submit" />Register Now</button>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include ('footer.php');?>

