<?php include ('header.php');?>
<style>
  .main-category{
    display: none;
  }
</style>

<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row align-items-center justify-content-center h-100">
      
      <div class="col-md-4 col-lg-4 col-xl-4">
        <div class="text-center mb-3">
                  <h2>Login</h2>
                </div>
        <div class="card p-4">
        <form>
            
          <!-- Email input -->
          <div class="form-outline mb-4">
             <label class="form-label" for="form1Example13">Email address</label>
            <input type="email" id="form1Example13" class="form-control form-control-lg" />
          </div>

          <!-- Password input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="form1Example23">Password</label>
            <input type="password" id="form1Example23" class="form-control form-control-lg" />
          </div>

          <div class="mb-4">
            <!-- Checkbox -->
            <div class="form-check pl-4">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
              <label class="form-check-label" for="form1Example3"> Remember me </label>
            </div>
            <!-- <a href="#!">Forgot password?</a> -->
          </div>

          <!-- Submit button -->
          <button type="submit" class="btn btn-block">LOGIN</button>

         <!--  <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
          </div>

          <a class="btn btn-block social-link" style="background-color: #3b5998" href="#!" role="button">
            <i class="fa fa-facebook-f me-2"></i> &nbsp;Continue with Facebook
          </a>
          <a class="btn btn-block social-link" style="background-color: #55acee" href="#!" role="button">
            <i class="fa fa-twitter me-2"></i> &nbsp;Continue with Twitter</a>
 -->

        <div class="mt-3"><a class="small text-muted" href="#!">Forgot password?</a>
                  <p class="mb-2 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="register.php"
                      style="color: #393f81;">Register here</a></p>
                  <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a>
        </div>

        </form>
      </div>
      </div>
    </div>
  </div>
</section>
<?php include ('footer.php');?>
