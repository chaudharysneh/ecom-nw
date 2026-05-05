<?= $this->include('header') ?>
<style>
  .main-category {
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
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
  }

  .login-section {
    /*height: 100vh;*/
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .login-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .form-container {
    max-width: 400px;
    margin: auto;
  }

  .card {
    border: none;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }
  
  .small {
    font-size: 95% !important;
    font-weight: 400;
}
</style>

<section class="login-section my-5">
  <div class="container">
    <div class="row align-items-center">
      <!-- Left Image Section -->
      <div class="col-md-6 d-none d-md-block">
        <img src="<?php echo base_url('public/images/login.png'); ?>" alt="Login image" class="login-image">
      </div>

      <!-- Right Form Section -->
      <div class="col-md-6">
        <div class="text-center mb-3">
          <h2>Login</h2>
        </div>
        <div class="card p-4">
          <form>
            <!-- Email input -->
            <div class="form-outline  email">
              <label class="form-label" for="form1Example13">Email address</label>
              <input type="email" id="email" name="email" class="form-control" />
            </div>

            <!-- Password input -->
            <div class="form-outline password">
              <label class="form-label" for="form1Example23">Password</label>
              <input type="password" id="password" name="password" maxlength="32" class="form-control" />
            </div>

            <!-- Submit button -->
            <button type="button" name="submit" id="login" class="mt-4 btn btn-block rounded">LOGIN</button>

            <div class="mt-3 text-center">
              <a class="small text-muted" href="<?php echo base_url(); ?>forget_password">Forgot password</a>
              <p class="mb-2 pb-lg-2" style="color: #393f81;">
                Don't have an account? <a href="<?php echo base_url("register"); ?>" style="color: #F7941D;">Register here</a>
              </p>
              <a href="<?php echo base_url("all_terms_conditions"); ?>" class="small text-muted">Terms of use</a> |
              <a href="<?php echo base_url("privacy-policy"); ?>" class="small text-muted">Privacy policy</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?= $this->include('footer') ?>
