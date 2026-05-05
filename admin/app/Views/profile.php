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
.profile-img {
    width: 19%;
    border-radius: 168px;
}
</style>
<?= $this->include ('templates/header') ?>  

<!-- Content wrapper -->
<div class="text-nowrap m-5">
   <div class="card">
      <div class="card-body p-0">
         <span class="addprobtn2">Profile</span>
         <a href="<?php echo base_url(); ?>edit-profile"><span class="addprobtn">Edit Profile</span></a>
         <a href="<?php echo base_url(); ?>change-password"><span class="addprobtn">Change Password</span></a>
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
                           <div class="row mb-3">
                           <div class="col-lg-4 text-center">
                              <?php 
                                 if (!empty($profile_data) && !empty($profile_data['UserProfile'])) {
                              ?>
                                 <img src="<?php echo base_url(); ?>public/assets/img/profile_images/<?php echo $profile_data['UserProfile']; ?>" class="mt-4 profile-img rounded-circle shadow-lg" style="width: 200px; height: 200px; object-fit: contain;">
                              <?php
                                 } else {
                              ?>
                                 <img src="<?php echo base_url(); ?>public/assets/img/profile_images/default_user.png" class="mt-4 profile-img rounded-circle shadow-lg" style="width: 200px; height: 200px; object-fit: contain;">
                              <?php
                                 }
                              ?>
                           </div>

                              <div class="col-lg-8">
                                    <label for="defaultFormControlInput" class="form-label">Name</label>
                                    <input
                                       type="text"
                                       class="form-control"
                                       value="<?php if (!empty($profile_data)) { echo $profile_data['UserFirstName']." ".$profile_data['UserLastName']; } else { echo "NA"; } ?>"
                                       id="defaultFormControlInput"
                                       aria-describedby="defaultFormControlHelp"
                                       disabled
                                    />
                                    <br>
                                    <label for="largeSelect" class="form-label">Email</label>
                                        <input
                                          type="text"
                                          class="form-control"
                                          value="<?php if(!empty($profile_data) && !empty($profile_data['UserEmail'])){  echo $profile_data['UserEmail'];  }else{
                                            echo "NA";
                                          } ?>"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          disabled
                                          />
                                          <br>

                                          <label for="largeSelect" class="form-label">Phone</label>
                                        <input
                                          type="text"
                                          class="form-control"
                                          value="<?php if(!empty($profile_data) && !empty($profile_data['UserPhone'])){  echo $profile_data['UserPhone'];  }else{
                                            echo "NA";
                                          } ?>"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          disabled
                                          />


                              </div>
                           </div>
                         <div class="row">
                           <!-- <div class="col-lg-4"> -->
                             
                                    <!-- <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">Name</label>
                                       <input
                                          type="text"
                                          class="form-control"
                                          value="<?php //if(!empty($profile_data)){  echo $profile_data['UserFirstName']." ".$profile_data['UserLastName'];  }else{
                                            //echo "NA";
                                          //} ?>"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          disabled
                                          />
                                    </div>
                                 </div> -->
                                 <!-- <div class="col-lg-4">
                                    <div class="mb-3">
                                       <label for="largeSelect" class="form-label">Email</label>
                                        <input
                                          type="text"
                                          class="form-control"
                                          value="<?php //if(!empty($profile_data) && !empty($profile_data['UserEmail'])){  echo $profile_data['UserEmail'];  }else{
                                            //echo "NA";
                                          //} ?>"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          disabled
                                          />
                                    </div>
                                 </div> -->
                                 <!-- <div class="col-lg-4">
                             
                                    <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">Date Of Birth</label>
                                       <input
                                          type="text"
                                          class="form-control"
                                          value="<?php if(!empty($profile_data) && !empty($profile_data['DOB']) && $profile_data['DOB']!='0000-00-00'){  echo $profile_data['DOB'];  }else{
                                            echo "NA";
                                          } ?>"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          disabled
                                          />
                                    </div>
                                 </div> -->
                                  <!-- <div class="col-lg-4">
                             
                                    <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">Gender</label>
                                       <input
                                          type="text"
                                          class="form-control"
                                          value="<?php if(!empty($profile_data) && !empty($profile_data['UserGander'])){  echo $profile_data['UserGander'];  }else{
                                            echo "NA";
                                          } ?>"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          disabled
                                          />
                                    </div>
                                 </div> -->
                                 <!-- <div class="col-lg-4">
                                    <div class="mb-3">
                                       <label for="largeSelect" class="form-label">Phone</label>
                                        <input
                                          type="text"
                                          class="form-control"
                                          value="<?php if(!empty($profile_data) && !empty($profile_data['UserPhone'])){  echo $profile_data['UserPhone'];  }else{
                                            echo "NA";
                                          } ?>"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          disabled
                                          />
                                    </div>
                                 </div> -->
                                 <!-- <div class="col-lg-4">
                                    <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">Country</label>
                                        <input
                                          type="text"
                                          class="form-control"
                                          value="<?php if(!empty($profile_data) && !empty($profile_data['UserCountry'])){  echo $profile_data['UserCountry'];  }else{
                                            echo "NA";
                                          } ?>"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          disabled
                                          />
                                    </div>
                                 </div>
                              
                           
                                 <div class="col-lg-4">
                                    <div class=" mb-3">
                                       <label for="largeSelect" class="form-label">state</label>
                                        <input
                                          type="text"
                                          class="form-control"
                                          value="<?php if(!empty($profile_data) && !empty($profile_data['UserState'])){  echo $profile_data['UserState'];  }else{
                                            echo "NA";
                                          } ?>"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          disabled
                                          />
                                    </div>
                                 </div>
                                 <div class="col-lg-4">
                                    <div class=" mb-3">
                                       <label for="largeSelect" class="form-label">City</label>
                                       <input
                                          type="text"
                                          class="form-control"
                                          value="<?php if(!empty($profile_data) && !empty($profile_data['UserCity'])){  echo $profile_data['UserCity'];  }else{
                                            echo "NA";
                                          } ?>"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          disabled
                                          />
                                    </div>
                                 </div> -->
                                 <!-- <div class="col-lg-4">
                                    <div class="mb-3">
                                       <label for="largeSelect" class="form-label">Post Code</label>
                                        <input
                                          type="text"
                                          class="form-control"
                                          value="<?php if(!empty($profile_data) && !empty($profile_data['UserZip'])){  echo $profile_data['UserZip'];  }else{
                                            echo "NA";
                                          } ?>"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          disabled
                                          />
                                    </div>
                                 </div>
                                 <div class="col-lg-4">
                                    <div class="mt-2 mb-3">
                                       <label for="largeSelect" class="form-label">Address 1</label>
                                       <textarea id="address1" name="address1" class="form-control" aria-describedby="defaultFormControlHelp" disabled>
                                       <?php if(!empty($profile_data) && !empty($profile_data['UserAddress'])){  echo $profile_data['UserAddress'];  }else{
                                            echo "NA";
                                          } ?>
                                       </textarea>
                                    </div>
                                 </div>

                                 <div class="col-lg-4">
                                    <div class="mt-2 mb-3">
                                       <label for="largeSelect" class="form-label">Address 2</label>
                                       <textarea id="address2" name="address2" class="form-control" aria-describedby="defaultFormControlHelp" disabled>
                                       <?php if(!empty($profile_data) && !empty($profile_data['UserAddress2'])){  echo $profile_data['UserAddress2'];  }else{
                                            echo "NA";
                                          } ?>
                                       </textarea>
                                    </div>
                                 </div> -->
                                  
                                  <!-- <div class="col-lg-4">
                                    <div class="mt-2 mb-3">
                                       <label for="largeSelect" class="form-label">Payment Via</label>
                                        <input
                                          type="text"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          disabled
                                          />
                                    </div>
                                 </div> -->
                                  <!-- <div class="col-lg-4">
                                    <div class="mt-2 mb-3">
                                       <label for="largeSelect" class="form-label">Shipping Method</label>
                                        <input
                                          type="text"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          disabled
                                          />
                                    </div>
                                 </div> -->
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