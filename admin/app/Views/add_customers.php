<style>
   .textarea {
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
      color: #f7941d;
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
<?= $this->include('templates/header') ?>
<!-- Content wrapper -->
<div class="text-nowrap m-3 mx-lg-4">
   <div class="card">
      <div class="card-body p-0">
         <span class="addprobtn2">Add Customer</span><a href="<?php echo base_url(); ?>all-customers"><span class="addprobtn">All Customers</span></a>
      </div>
   </div>
   <!-- <?php print_r($country); ?> -->
   <form method="POST" id="add_customer_from" enctype="multipart/form-data">
   <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url() ?>">
      <div class="content-wrapper">
         <!-- Content -->
         <div class="flex-grow-1 container-p-y">

            <div class="row">
               <div class="col-md-12 tag-mar">
                  <div class="card mb-4">
                     <div class="card-body">
                        <div class="row">
                           <div class="col-lg-4">
                              <div class="mb-3">
                                 <label for="defaultFormControlInput" class="form-label">First Name</label>
                                 <input type="text" class="form-control" id="firstname" name="firstname" aria-describedby="defaultFormControlHelp" />
                                 <span id="cus_fname_err"></span>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="mb-3">
                                 <label for="defaultFormControlInput" class="form-label">Last Name</label>
                                 <input type="text" class="form-control" id="lastname" name="lastname" aria-describedby="defaultFormControlHelp" />
                                 <span id="cus_lname_err"></span>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="mb-3">
                                 <label for="defaultFormControlInput" class="form-label">Date Of Birth</label>
                                 <input type="date" class="form-control" id="dob" name="dob" aria-describedby="defaultFormControlHelp" />
                                 <span id="cus_dob_err"></span>
                              </div>
                           </div>
                        </div>



                        <div class="row">
                           <div class="col-lg-4">
                              <div class="mb-3">
                                 <label for="defaultFormControlInput" class="form-label">Email</label>
                                 <input type="text" class="form-control" id="email" name="email" aria-describedby="defaultFormControlHelp" />
                                 <span id="cus_email_err"></span>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="mb-3">
                                 <label for="defaultFormControlInput" class="form-label">Phone</label>
                                 <input type="number" class="form-control" id="phone" name="phone" aria-describedby="defaultFormControlHelp" />
                                 <span id="cus_phone_err"></span>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="mb-3">
                                 <label for="defaultFormControlInput" class="form-label">Password</label>
                                 <input type="password" class="form-control" id="password" name="password" aria-describedby="defaultFormControlHelp" />
                                 <span id="cus_password_err"></span>
                              </div>
                           </div>
                        </div>
                        
                        <div class="row">
                           <div class="col-lg-8">
                              <div class="mb-3">
                                 <label for="defaultFormControlInput" class="form-label">Profile Image</label>
                                 <input type="file" class="form-control" id="profile_pic" name="profile_pic" aria-describedby="defaultFormControlHelp" />
                                 <span id="cus_email_err"></span>
                              </div>
                           </div>
                          
                        </div>




                        <h4 class="mt-3">Address</h4>


                        <div class="row">
                           <div class="col-lg-6">
                              <div class="mb-3">
                                 <label for="defaultFormControlInput" class="form-label">Address 1</label>
                                 <textarea type="text" class="form-control" id="address1" name="address1" aria-describedby="defaultFormControlHelp"></textarea>
                                 <span id="cus_address1_err"></span>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="mb-3">
                                 <label for="defaultFormControlInput" class="form-label">Address 2</label>
                                 <textarea type="text" class="form-control" id="address2" name="address2" aria-describedby="defaultFormControlHelp"></textarea>
                                 <span id="cus_address2_err"></span>
                              </div>
                           </div>
                           <!-- <div class="col-lg-4">
                              <div class="mb-3">
                                 <label for="defaultFormControlInput" class="form-label">City</label>
                                 <input type="text" class="form-control" id="city" name="city" aria-describedby="defaultFormControlHelp" />
                                 <span id="cus_city_err"></span>
                              </div>
                           </div> -->
                        </div>
                        <div class="row">
                           
                           <div class="col-lg-4">
                              <div class="mb-3">
                                 <!-- <label for="defaultFormControlInput" class="form-label">Country</label>
                                 <input type="text" class="form-control" id="country" name="country" aria-describedby="defaultFormControlHelp" /> -->
                                 
                           <select class="form-select" aria-label="Default select example" name="country" id="country">
                              <option value="">Country</option>
                              <?php 
                              foreach($country as $key=>$value){
                                 // print_r($value);
                              
                              ?>
                              <option value="<?php echo $value['CountryID'] ?>"><?php echo $value['CountryName'] ?></option>
                              <?php  } ?>
                              
                            </select>
                                 <span id="cus_country_err"></span>
                              </div>
                           </div>

                           <div class="col-lg-4">
                              <div class="mb-3">
                              <select class="form-select" aria-label="Default select example" name="state" id="state">
                              <option value="">State</option>
                            </select>
                                 <span id="cus_state_err"></span>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="mb-3">
                              <select class="form-select" aria-label="Default select example" name="city" id="city">
                              <option value="">City</option>
                            </select>
                                 <span id="cus_city_err"></span>
                              </div>
                           </div>

                           

                           <!-- <div class="col-lg-4">
                              <div class="mb-3">
                                 <label for="defaultFormControlInput" class="form-label">Postcode</label>
                                 <input type="text" class="form-control" id="postcode" name="postcode" aria-describedby="defaultFormControlHelp" />
                                 <span id="cus_postcode_err"></span>
                              </div>
                           </div> -->
                        </div>
                        <div class="row">
                           <div class="col-lg-4">
                              <div class="mb-3">
                                 <label for="defaultFormControlInput" class="form-label">Postcode</label>
                                 <input type="number" class="form-control" id="postcode" name="postcode" aria-describedby="defaultFormControlHelp" />
                                 <span id="cus_postcode_err"></span>
                              </div>
                           </div>
                        </div>
                        <div id="msg"></div>
                        <div class="card-body p-2 mb-3">
                           <!-- <a href="add_category.php"><span class="addprobtn">Add Product</span></a> -->

                           <button type="button" class="addprobtn" id="add_customer">Add Customer</button>
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
<?= $this->include('templates/footer') ?>