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

  .form-control:disabled,
  .form-control[readonly] {
    background-color: #fff !important;
    opacity: 1;
  }
  
  .customer-img{
    vertical-align: middle;
    object-fit: contain;
    border: 7px solid #dadada70;
    border-radius: 5%;
    margin-top:10px;
  }
</style>

<?= $this->include('templates/header') ?>
<!-- Content wrapper -->
<div class="text-nowrap m-3 mx-lg-4">
  <div class="card">
    <div class="card-body p-0">
      <span class="addprobtn2">Edit Customer Detail</span><a href="<?php echo base_url(); ?>all-customers"><span class="addprobtn">Back</span></a>
    </div>
  </div>
  <form method="POST" id="edit_customer_from" enctype="multipart/form-data">
    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url() ?>all-customers">
    <input type="hidden" name="id" id="id" value="<?php echo $customer_data['UserID'] ?>">
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
                                 <input type="text" class="form-control" id="firstname" name="firstname" 
                                 value="<?php echo $customer_data['UserFirstName'] ?>"
                                 aria-describedby="defaultFormControlHelp" />
                                 <span id="cus_fname_err"></span>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="mb-3">
                                 <label for="defaultFormControlInput" class="form-label">Last Name</label>
                                 <input type="text" class="form-control" id="lastname" name="lastname"
                                 value="<?php echo $customer_data['UserLastName'] ?>" aria-describedby="defaultFormControlHelp" />
                                 <span id="cus_lname_err"></span>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="mb-3">
                                 <label for="defaultFormControlInput" class="form-label">Date Of Birth</label>
                                 <input type="date" class="form-control" id="dob"
                                 value="<?php echo $customer_data['DOB'] ?>" name="dob" aria-describedby="defaultFormControlHelp" />
                                 <span id="cus_dob_err"></span>
                              </div>
                           </div>
                        </div>



                        <div class="row">
                            <div class="col-lg-4">
                              <div class="mb-3">
                                 <label for="defaultFormControlInput" class="form-label">Profile Image</label>
                                 <input type="file" class="form-control" id="profile_pic" name="profile_pic" aria-describedby="defaultFormControlHelp" />
                                 <img src="<?php echo base_url() ?>public/upload_images/<?php echo $customer_data['UserProfile'] ?>" class="customer-img" width="100" height="100">
                                 <input type="hidden" name="old_pro_pic" id="old_pro_pic" value="<?php echo $customer_data['UserProfile'] ?>">
                                 <span id="cus_email_err"></span>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="mb-3">
                                 <label for="defaultFormControlInput" class="form-label">Phone</label>
                                 <input type="number" class="form-control" id="phone" name="phone" 
                                 value="<?php echo $customer_data['UserPhone'] ?>"aria-describedby="defaultFormControlHelp" />
                                 <span id="cus_phone_err"></span>
                              </div>
                           </div>
                           <!-- <div class="col-lg-4">
                              <div class="mb-3">
                                 <label for="defaultFormControlInput" class="form-label">Password</label>
                                 <input type="password" class="form-control" id="password" name="password" aria-describedby="defaultFormControlHelp" />
                                 <span id="cus_password_err"></span>
                              </div>
                           </div> -->
                        </div>




                        <h4 class="mt-3">Address</h4>


                        <div class="row">
                           <div class="col-lg-6">
                              <div class="mb-3">
                                 <label for="defaultFormControlInput" class="form-label">Address 1</label>
                                 <textarea type="text" class="form-control" id="address1" name="address1" aria-describedby="defaultFormControlHelp"><?php echo $customer_data['UserAddress'] ?></textarea>
                                 <span id="cus_address1_err"></span>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="mb-3">
                                 <label for="defaultFormControlInput" class="form-label">Address 2</label>
                                 <textarea type="text" class="form-control" id="address2" name="address2" aria-describedby="defaultFormControlHelp"><?php echo $customer_data['UserAddress2'] ?></textarea>
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
                           
                           <div class="col-lg-3">
                              <div class="mb-3">
                                 <!-- <label for="defaultFormControlInput" class="form-label">Country</label>
                                 <input type="text" class="form-control" id="country" name="country" aria-describedby="defaultFormControlHelp" /> -->
                                 
                              <select class="form-select" aria-label="Default select example" name="country" id="country">
                              <option value="">Country</option>
                              <?php 
                              foreach($country as $key=>$value){
                                 // print_r($value);
                              
                              ?>
                              <option value="<?php echo $value['CountryID'] ?>" <?php if($value['CountryID']==$customer_data['UserCountry']){echo "selected";} ?>><?php echo $value['CountryName'] ?></option>
                              <?php  } ?>
                              
                            </select>
                                 <span id="cus_country_err"></span>
                              </div>
                           </div>

                           <div class="col-lg-3">
                              <div class="mb-3">
                              <select class="form-select" aria-label="Default select example" name="state" id="state">
                              <option value="">State</option>
                              <?php 
                              foreach($state as $key=>$value){
                                
                              
                              ?>
                              <option value="<?php echo $value['StateID'] ?>"<?php if($value['StateID']==$customer_data['UserState']){echo "selected";} ?>><?php echo $value['StateName'] ?></option>
                              <?php } ?>
                            </select>
                                 <span id="cus_state_err"></span>
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="mb-3">
                              <select class="form-select" aria-label="Default select example" name="city" id="city">
                              <option value="">City</option>
                              <?php 
                              foreach($city as $key=>$value){
                              ?>
                              <option value="<?php echo $value['CityID'] ?>"<?php if($value['CityID']==$customer_data['UserCity']){echo "selected";} ?>><?php echo $value['CityName'] ?></option>
                             <?php }?>
                            </select>
                                 <span id="cus_city_err"></span>
                              </div>
                           </div>
                           
                            <div class="col-lg-3">
                              <div class="mb-3">
                                 <!--<label for="defaultFormControlInput" class="form-label">Postcode</label>-->
                                 <input type="number" class="form-control" id="postcode" name="postcode"
                                 value="<?php echo $customer_data['UserZip'] ?>" 
                                 aria-describedby="defaultFormControlHelp" placeholder="Enter Postcode" />
                                 <span id="cus_postcode_err"></span>
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
                           <!--<div class="col-lg-4">-->
                           <!--   <div class="mb-3">-->
                           <!--      <label for="defaultFormControlInput" class="form-label">Postcode</label>-->
                           <!--      <input type="number" class="form-control" id="postcode" name="postcode"-->
                           <!--      value="<?php // echo $customer_data['UserZip'] ?>" -->
                           <!--      aria-describedby="defaultFormControlHelp" />-->
                           <!--      <span id="cus_postcode_err"></span>-->
                           <!--   </div>-->
                           <!--</div>-->
                        </div>
                        <div id="msg"></div>
                        <div class="card-body p-2 mb-3">
                           <!-- <a href="add_category.php"><span class="addprobtn">Add Product</span></a> -->

                           <button type="button" class="addprobtn" id="edit_customer">Edit customer</button>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
   $('#country').change(function() {
      let countryID = $(this).val();
      if (countryID) {
         $.ajax({
            url: '<?= base_url('getStates') ?>',
            type: 'POST',
            data: { country_id: countryID },
            dataType: 'json',
            success: function(response) {
               $('#state').html('<option value="">State</option>');
               $('#city').html('<option value="">City</option>'); // Reset city dropdown
               $.each(response.states, function(key, state) {
                  $('#state').append('<option value="' + state.StateID + '">' + state.StateName + '</option>');
               });
            }
         });
      } else {
         $('#state').html('<option value="">State</option>');
         $('#city').html('<option value="">City</option>');
      }
   });

   $('#state').change(function() {
      let stateID = $(this).val();
      if (stateID) {
         $.ajax({
            url: '<?= base_url('getCities') ?>',
            type: 'POST',
            data: { state_id: stateID },
            dataType: 'json',
            success: function(response) {
               $('#city').html('<option value="">City</option>');
               $.each(response.cities, function(key, city) {
                  $('#city').append('<option value="' + city.CityID + '">' + city.CityName + '</option>');
               });
            }
         });
      } else {
         $('#city').html('<option value="">City</option>');
      }
   });
});

</script>

<?= $this->include('templates/footer') ?>