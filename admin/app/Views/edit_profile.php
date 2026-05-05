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
.profile-input-label {
    position: absolute;
    bottom: 10px;
    left: 222;
    background: #f7941d;
    padding: 10px;
    border-radius: 19px;
    color: white;
}
.profile-img-box {
    position: relative;
}
input#profile-pic {
    display: none;
}

.ui-datepicker-calendar thead{
    background: #eeeeee;
}
</style>
<?= $this->include ('templates/header') ?>  
<!-- Content wrapper -->
<div class="text-nowrap m-5">
   <div class="card">
      <div class="card-body p-0">
         <span class="addprobtn2">Edit Profile</span>
      </div>
   </div>
   
   <form id="update_profile_form" enctype="multipart/form-data">
      <div class="content-wrapper">
         <!-- Content -->
         <div class="flex-grow-1 container-p-y">
            <!--<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add</span> Tags</h4>-->
            <div class="row">
               <div class="col-md-12 tag-mar">
                  <div class="card mb-4">
                     <!--<h5 class="card-header">Default</h5>-->
                     <div class="card-body">
                       
                     <div class="row mb-5">
                           <!-- Profile Image Section -->
                           <div class="col-lg-4">
                                 <div class="profile-img-box text-center">
                                    <?php 
                                       if(!empty($profile_data) && !empty($profile_data['UserProfile'])) {
                                    ?>
                                       <img src="<?php echo base_url(); ?>public/assets/img/profile_images/<?php echo $profile_data['UserProfile']; ?>" class="mt-4 profile-img rounded-circle shadow-lg" style="width: 200px; height: 200px; object-fit: contain;">
                                    <?php
                                       } else {
                                    ?>
                                       <img src="<?php echo base_url(); ?>public/assets/img/profile_images/default_user.png" class="mt-4 profile-img rounded-circle shadow-lg" style="width: 200px; height: 200px; object-fit: contain;">
                                    <?php
                                       }
                                    ?>
                                    <label for="profile-pic" class="profile-input-label"><i class="fa fa-pencil" aria-hidden="true"></i></label>
                                    <input type="file" id="profile-pic" name="profile_pic" style="display:none;">
                                 </div>
                                 <span id="profile_pic_err"></span>
                           </div>

                        <!-- First Name Section -->
                        <div class="col-lg-8 d-flex align-items-center">
                             <div class="row">
    <div class="col-md-6">
        <label for="firstname" class="form-label">First Name</label>
        <input
            type="text"
            class="form-control"
            value="<?php if(!empty($profile_data) && !empty($profile_data['UserFirstName'])){  echo $profile_data['UserFirstName'];  }else{ echo ""; } ?>"
            name="firstname"
            id="firstname"
            aria-describedby="defaultFormControlHelp"
        />
        <span id="first_name_err"></span>
    </div>

    <div class="col-md-6">
        <label for="lastname" class="form-label">Last Name</label>
        <input
            type="text"
            class="form-control"
            value="<?php if(!empty($profile_data) && !empty($profile_data['UserLastName'])){  echo $profile_data['UserLastName'];  }else{ echo ""; } ?>"
            name="lastname"
            id="lastname"
            aria-describedby="defaultFormControlHelp"
        />
        <span id="last_name_err"></span>
    </div>

    <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input
            type="text"
            class="form-control"
            value="<?php if(!empty($profile_data) && !empty($profile_data['UserEmail'])){  echo $profile_data['UserEmail'];  }else{ echo ""; } ?>"
            name="email"
            id="email"
            aria-describedby="defaultFormControlHelp"
            readonly
        />
        <span id="email_err"></span>
    </div>

    <div class="col-md-6">
        <label for="phone" class="form-label">Phone</label>
        <input
            type="text"
            class="form-control"
            value="<?php if(!empty($profile_data) && !empty($profile_data['UserPhone'])){  echo $profile_data['UserPhone'];  }else{ echo ""; } ?>"
            name="phone"
            id="phone"
            aria-describedby="defaultFormControlHelp"
        />
        <span id="phone_err"></span>
    </div>
</div>

                        </div>
                     </div>
                        <input type="hidden" name="old_img" value="<?php if(!empty($profile_data) && !empty($profile_data['UserProfile'])){ echo $profile_data['UserProfile'];  }else{ echo "default_user.png"; } ?>">
                         <div class="row">
                         <div class="col-lg-4">
                             
                             <!-- <div class="mb-3">
                                <label for="defaultFormControlInput" class="form-label">First Name</label>
                                <input
                                   type="text"
                                   class="form-control"
                                   value="<?php if(!empty($profile_data) && !empty($profile_data['UserFirstName'])){  echo $profile_data['UserFirstName'];  }else{
                                     echo "";
                                   } ?>"
                                   name="firstname"
                                   id="firstname"
                                   aria-describedby="defaultFormControlHelp"
                                   
                                   />
                                   <span id="first_name_err"></span>
                             </div> -->
                            
                          </div>
                          
                          <div class="col-lg-4">
                             
                             <!-- <div class="mb-3">
                                <label for="defaultFormControlInput" class="form-label">Last Name</label>
                                <input
                                   type="text"
                                   class="form-control"
                                   value="<?php if(!empty($profile_data) && !empty($profile_data['UserLastName'])){  echo $profile_data['UserLastName'];  }else{
                                     echo "";
                                   } ?>"
                                    name="lastname"
                                    id="lastname"
                                   aria-describedby="defaultFormControlHelp"
                                   
                                   />
                                   <span id="last_name_err"></span>
                             </div> -->
                            
                          </div>
                          <div class="col-lg-4">
                             <!-- <div class="mb-3">
                                <label for="largeSelect" class="form-label">Email</label>
                                 <input
                                   type="text"
                                   class="form-control"
                                   value="<?php if(!empty($profile_data) && !empty($profile_data['UserEmail'])){  echo $profile_data['UserEmail'];  }else{
                                     echo "";
                                   } ?>"
                                    name="email"
                                   id="email"
                                   aria-describedby="defaultFormControlHelp"
                                   
                                   />
                                   <span id="email_err"></span>
                             </div> -->
                            
                          </div>
                          <!-- <div class="col-lg-4">
                      
                             <div class="mb-3">
                                <label for="defaultFormControlInput" class="form-label">Date Of Birth</label>
                                <input
                                   type="date"
                                   class="form-control"
                                   value="<?php if(!empty($profile_data) && !empty($profile_data['DOB']) && $profile_data['DOB']!='0000-00-00'){  echo $profile_data['DOB'];  }else{
                                     echo "";
                                   } ?>"
                                    name="dob"
                                   id="dob"
                                   aria-describedby="defaultFormControlHelp"
                                   
                                   />
                             </div>
                          </div> -->
                           <!-- <div class="col-lg-4">
                      
                             <div class="mb-3">
                                <label for="defaultFormControlInput" class="form-label">Gender</label>
                                <input
                                   type="text"
                                   class="form-control"
                                   value="<?php //if(!empty($profile_data) && !empty($profile_data['UserGander'])){  echo $profile_data['UserGander'];  }else{
                                    // echo "";
                                   //} ?>"
                                    name="gender"
                                   id="gender"
                                   aria-describedby="defaultFormControlHelp"
                                   
                                   />
                             </div>
                          </div> -->
                          <div class="col-lg-4">
                             <!-- <div class="mb-3">
                                <label for="largeSelect" class="form-label">Phone</label>
                                 <input
                                   type="text"
                                   class="form-control"
                                   value="<?php if(!empty($profile_data) && !empty($profile_data['UserPhone'])){  echo $profile_data['UserPhone'];  }else{
                                     echo "";
                                   } ?>"
                                    name="phone"
                                   id="phone"
                                   aria-describedby="defaultFormControlHelp"
                                   
                                   />
                                   <span id="phone_err"></span>
                             </div> -->
                           
                          </div>
                          <!-- <div class="col-lg-4">
                             <div class="mb-3">
                                <label for="defaultFormControlInput" class="form-label">Country</label>
                               
                                <select class="form-control" name="country" id="country">
                                    <option value="">Select Country</option>
                                  <?php
                                     if(!empty($country_data)){
                                        foreach($country_data as $country){
                                      
                                  ?>
                                    <option value="<?php echo $country['CountryID']; ?>"><?php echo $country['CountryName']; ?></option>

                                    <?php } } ?>
                                </select>
                                
                             </div>
                          </div>
                       
                    
                          <div class="col-lg-4">
                             <div class=" mb-3">
                                <label for="largeSelect" class="form-label">state</label>
                                <select class="form-control" name="state" id="state">
                                   <option value="">as</option>
                                </select>
                               
                             </div>
                          </div>
                          <div class="col-lg-4">
                             <div class=" mb-3">
                                <label for="largeSelect" class="form-label">City</label>
                                <select class="form-control" name="city" id="city">
                                   <option value="">as</option>
                                </select>
                               
                             </div>
                          </div> -->
                          <!-- <div class="col-lg-4">
                             <div class="mb-3">
                                <label for="largeSelect" class="form-label">Post Code</label>
                                 <input
                                   type="text"
                                   class="form-control"
                                   value="<?php if(!empty($profile_data) && !empty($profile_data['UserZip'])){  echo $profile_data['UserZip'];  }else{
                                     echo "";
                                   } ?>"
                                    name="post_code"
                                   id="post_code"
                                   aria-describedby="defaultFormControlHelp"
                                   
                                   />
                             </div>
                          </div>
                          <div class="col-lg-4">
                             <div class="mt-2 mb-3">
                                <label for="largeSelect" class="form-label">Address 1</label>
                                <textarea id="address1" name="address1" class="form-control" aria-describedby="defaultFormControlHelp"><?php if(!empty($profile_data) && !empty($profile_data['UserAddress'])){  echo $profile_data['UserAddress'];  }else{ echo "";} ?></textarea>
                             </div>
                          </div>

                          <div class="col-lg-4">
                             <div class="mt-2 mb-3">
                                <label for="largeSelect" class="form-label">Address 2</label>
                                <textarea id="address2" name="address2" class="form-control" aria-describedby="defaultFormControlHelp"><?php if(!empty($profile_data) && !empty($profile_data['UserAddress2'])){  echo $profile_data['UserAddress2'];  }else{echo "";} ?></textarea>
                             </div>
                          </div> -->
                         </div>
                          <div class="row">
                              <div class="col-lg-12 text-right">
                                   <span id="successmsg"></span>
                                  <button type="button" class="addprobtn" id="update_profile">Update Profile</button>
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
<?= $this->include ('templates/footer') ?>
<script>
        // $(document).ready(function() {
          
        //     $(function() {
        //         $( "#dob" ).datepicker();
        //     });
        // })
    </script>