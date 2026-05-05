<style>
.textarea{
    width: 100%;
    font-size: 0.9375rem;
    font-weight: 400;
    height: 100px;
    line-height: 1.53;
    color: #697a8d;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #d9dee3;
    border-radius: 0.375rem;
}
.addprobtn2 {
    float: left;
    color: #696cff;
    padding: 10;
    border-radius: 5px;
    font-weight: bold;
}
.addprobtn {
  float: right;
    background: #f7941d;
    color: white;
    padding: 3px 9px !important;
    border-radius: 5px;
    border-color: #fff;
    border: none;
    margin-top: 7px;
    margin-right: 10px;
}
</style>        
            
<?= $this->include ('templates/header') ?>
          <!-- Content wrapper -->
          <div class="text-nowrap m-5">
            <div class="card">
              <div class="card-body p-0">
          		<span class="addprobtn2">Change Password</span>
              </div>
             </div>
             <form>
          <div class="content-wrapper">
            <!-- Content -->

            <div class="flex-grow-1 container-p-y">
              <!--<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add</span> Tags</h4>-->
              <div class="row">
                <div class="col-md-6 tag-mar">
                  <div class="card mb-4">
                    <!--<h5 class="card-header">Default</h5>-->
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Current Password</label>
                        <input
                          type="password"
                          class="form-control"
                          name="current_password"
                          id="current_password"
                          placeholder="Current Password"
                          aria-describedby="defaultFormControlHelp"
                        />

                        <span id="current_password_err"></span>
                      </div>
                       
                      <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">New Password</label>
                        <input
                          type="password"
                          class="form-control"
                          name="new_password"
                          id="new_password"
                          placeholder="Password"
                          aria-describedby="defaultFormControlHelp"
                        />
                        <span id="new_password_err"></span>
                      </div>

                      <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Confirm Password</label>
                        <input
                          type="password"
                          class="form-control"
                          name="confirm_password"
                          id="confirm_password"
                          placeholder="Confirm Password"
                          aria-describedby="defaultFormControlHelp"
                        />
                        <span id="confirm_password_err"></span>
                      </div>

                      <div class="card-body p-2 mb-3">
                      <span id="success_msg"></span>
                      <button type="button" id="change_password" class="addprobtn">Change Password</button>
                      </div>
                    </div>
                  </div>
                </div>
               </div>
              </div>
            </div>
            </form> 
          </div> 
          
         
            <!-- / Content -->

<?= $this->include ('templates/footer') ?>