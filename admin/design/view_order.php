<style>
.text-height{
    height: 37%;
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
    background: #696cff;
    color: white;
    padding: 10;
    border-radius: 5px;
}
.form-control:disabled, .form-control[readonly] {
    background-color: #fff!important; 
    opacity: 1;
}
</style>        
            
          <?php include ('header.php');?>    
          <!-- Content wrapper -->
          <div class="text-nowrap m-5">
            <div class="card">
              <div class="card-body p-2">
          		<span class="addprobtn2">Order Detail</span><a href="all_products.php"><span class="addprobtn">Back</span></a>
              </div>
             </div>
             <form>
          <div class="content-wrapper">
            <!-- Content -->

            <div class="flex-grow-1 container-p-y">
              <!--<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add</span> Tags</h4>-->
              <div class="row">
                <div class="col-md-12 tag-mar">
                  <div class="card mb-4">
                    <!--<h5 class="card-header">Default</h5>-->
                    <div class="card-body">
                    <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                                 <div class="col-lg-12">
                                      <img src="assets/img/backgrounds/18.jpg" class="w-100">
                                 </div>
                              </div>
                              <div class="mb-3 mt-3">
                        <label for="defaultFormControlInput" class="form-label">First Name</label>
                        <input
                          type="text"
                          class="form-control"
                          id="defaultFormControlInput"
                          Value="John"
                          aria-describedby="defaultFormControlHelp" disabled/>
                      </div>
                      </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Last Name</label>
                        <input
                          type="text"
                          class="form-control"
                          id="defaultFormControlInput"
                          Value="Doe"
                          aria-describedby="defaultFormControlHelp" disabled/>
                      </div>
                      <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Email</label>
                        <input
                          type="text"
                          class="form-control"
                          id="defaultFormControlInput"
                          Value="abc12345@gamil.com"
                          aria-describedby="defaultFormControlHelp" disabled/>
                      </div>
                      <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Address</label>
                        <textarea
                          type="text"
                          class="form-control text-height"
                          id="defaultFormControlInput"
                          aria-describedby="defaultFormControlHelp" disabled/>abc street, surat</textarea>
                      </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Status</label>
                        <input
                          type="text"
                          class="form-control"
                          id="defaultFormControlInput"
                          Value="Complete"
                          aria-describedby="defaultFormControlHelp" disabled/>
                      </div>
                         <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Mobile Number</label>
                        <input
                          type="number"
                          class="form-control"
                          id="defaultFormControlInput"
                          Value="98984574120"
                          aria-describedby="defaultFormControlHelp" disabled/>
                      </div>
                      <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Product Name</label>
                        <input
                          type="text"
                          class="form-control"
                          id="defaultFormControlInput"
                          Value="Shoes"
                          aria-describedby="defaultFormControlHelp" disabled/>
                      </div>
                      <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Product Price</label>
                        <input
                          type="text"
                          class="form-control"
                          id="defaultFormControlInput"
                          Value="$50.00"
                          aria-describedby="defaultFormControlHelp" disabled/>
                      </div>
                    </div>

                    <div class="row"></div>
                     <div class="card-body p-2 mb-3">
                      <a href="edit_products.php"><span class="addprobtn">Edit Order</span></a>
                     </div>
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

            <?php include ('footer.php');?>