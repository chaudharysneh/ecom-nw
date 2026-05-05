<?= $this->include('header') ?>

    
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

.small {
    font-size: 95%;
}
  
</style>

<section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row align-items-center justify-content-center h-100">
      
      <div class="col-md-4 col-lg-4 col-xl-4">
        <div class="text-center mb-3">
                  <h2>Forgot Password</h2>
                </div>
        <div class="card p-4">
        <form>
            
          <!-- Email input -->
          <div class="form-outline mb-2 email">
             <label class="form-label" for="form1Example13">Email address</label>
            <input type="email" id="forget_email" name="forget_email" class="form-control" />
            <span id="email_err"></span>
          </div>

          <!-- Password input -->
          <!--<div class="form-outline mb-2 password">-->
          <!--  <label class="form-label" for="form1Example23">Password</label>-->
          <!--  <input type="password" id="password" name="password" class="form-control" />-->
          <!--</div>-->

          <div class="mb-4">
            <!-- Checkbox -->
            <!--<div class="form-check pl-4">
              <input class="form-check-input" type="checkbox" value="" id="form1Example3"  />
              <label class="form-check-label" for="form1Example3"> Remember me </label>
            </div>-->
            <!-- <a href="#!">Forgot password?</a> -->
          </div>

          <!-- Submit button -->
          <button type="button" name="submit" id="" class="btn btn-block send_email_btn rounded">Send email</button>

         <!--  <div class="divider d-flex align-items-center my-4">
            <p class="text-center fw-bold mx-3 mb-0 text-muted">OR</p>
          </div>

          <a class="btn btn-block social-link" style="background-color: #3b5998" href="#!" role="button">
            <i class="fa fa-facebook-f me-2"></i> &nbsp;Continue with Facebook
          </a>
          <a class="btn btn-block social-link" style="background-color: #55acee" href="#!" role="button">
            <i class="fa fa-twitter me-2"></i> &nbsp;Continue with Twitter</a>
 -->

        <div class="mt-3"><a class="small text-muted"  href="<?php echo base_url(); ?>login">Back to Login</a>
                  <!--<p class="mb-2 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="<?php //echo base_url("register"); ?>"-->
                  <!--    style="color: #393f81;">Register here</a></p>-->
                  <!--<a href="#!" class="small text-muted">Terms of use.</a>-->
                  <!--<a href="#!" class="small text-muted">Privacy policy</a>-->
        </div>

        </form>
      </div>
      </div>
    </div>
  </div>
</section>
<?= $this->include('footer') ?>
<script>
     $('.send_email_btn').on('click', function() {
    //   alert('354456');
        
        var email = $('#forget_email').val();
       
        var regEx =  /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var validEmail = regEx.test(email);
      
        var base_url = $("#base_url").val();
        
        var flag=0;
      
        if (email=="") 
        {
          $('#email_err').text('Email is required').addClass("text-danger");
          flag=1;
        } 
      
        if (email!="") 
        {
          $('#email_err').text('');
        } 
      
      
           if (email!='' && !validEmail) 
         {
          $('#email_err').text('Please enter valid email').addClass("text-danger");
          flag=1;
         }
      
           if (email!='' && validEmail) 
         {
          $('#email_err').text('');
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

                    
                    $("#msg").removeClass("text-danger");
                    $("#msg").text('Check your email...').addClass("text-success");
                    
                    setTimeout(function () {
                      // location.href=base_url+"sign-in";
                      // $("#msg").hide();
                      location.reload();
                    }, 2000);
                  }
                  else if(data==2){
                    $("#msg").removeClass("text-success");
                    $("#msg").text('Unable to send email. Please try again.').addClass("text-danger");
                  }
                 else if(data==3){
                    $("#msg").removeClass("text-success");
                    $("#msg").text('email not registered').addClass("text-danger");
                  }
                  
              }
            });
                }
      
                if(flag==1){
                    return false;
                }
                   
        });

</script>
