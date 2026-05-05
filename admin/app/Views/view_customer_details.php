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
  .address-text {
    display: inline-block;
    max-width: 22ch; /* Limits to approximately 20-25 characters */
    white-space: break-spaces; /* Allows breaking at spaces */
    word-wrap: break-word; /* Ensures words will wrap if needed */
  }
  .text-limit {
    display: inline-block;
    max-width: 22ch; /* Limits to approximately 20-25 characters */
    white-space: break-spaces; /* Allows breaking at spaces */
    word-wrap: break-word; /* Ensures words will wrap if needed */
  }
</style>
<?= $this->include ('templates/header') ?>      
<!-- Content wrapper -->
<div class="text-nowrap m-3 mx-lg-4">
   <div class="card">
      <div class="card-body p-0">
         <span class="addprobtn2">Customer Details</span><a href="<?php echo base_url(); ?>all-customers"><span class="addprobtn">Back</span></a>
      </div>
   </div>
   
      <div class="content-wrapper">
         <!-- Content -->
         <div class="flex-grow-1 container-p-y">
        
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                       <div class="card-body">
                           <h4 class="">Personal Details</h4>    
                           <div class="row border-bottom">
                               <div class="col-lg-6 my-3">
                                    <span  class="view-label"> <i class="fa fa-user" aria-hidden="true"></i> First Name :</span>
                               </div>
                               <div class="col-lg-6 my-3">
                                   
                                    <span class="text-limit"><?php if(!empty($customer_data['UserFirstName'])){echo $customer_data['UserFirstName'];} else{echo "NA";}?></span>
                               </div>
                           </div>
                            <div class="row border-bottom">
                               <div class="col-lg-6 my-3">
                                    <span  class="view-label"><i class="fa fa-user" aria-hidden="true"></i> Last Name : </span>
                               </div>
                               <div class="col-lg-6 my-3">
                            
                                   <span class="text-limit"><?php if(!empty($customer_data['UserLastName'])){echo $customer_data['UserLastName'];} else{echo "NA";}?></span>
                               </div>
                           </div>
                           <div class="row border-bottom">
                               <div class="col-lg-6 my-3">
                                     <span  class="view-label"><i class="fa fa-user" aria-hidden="true"></i> Profile Image : </span>
                               </div>
                               <div class="col-lg-6 my-3">
                                    <span><img src="<?php echo base_url() ?>public/upload_images/<?php echo $customer_data['UserProfile'] ?>" 
                                    style="vertical-align: middle;width: 150px;height: 100%;object-fit: cover;border: 7px solid #dadada70;border-radius: 5%;"></span>
                               </div>
                           </div>
                             <div class="row border-bottom">
                               <div class="col-lg-6 my-3">
                                     <span  class="view-label"><i class="fa fa-user" aria-hidden="true"></i> Date Of Birth : </span>
                               </div>
                               <div class="col-lg-6 my-3">
                                    <span>
                                        <?php     
                                              if(!empty($customer_data['DOB']) && $customer_data['DOB'] != "0000-00-00")
                                              {
                                                // echo $customer_data['DOB'];
                                                  $date = new DateTime($customer_data['DOB']);
                                                  echo $date->format('d-m-Y');
                                              }   
                                              else
                                              {
                                                  echo 'NA';
                                              }    
                                        ?>
                                    </span> 
                               </div>
                           </div>
                             <div class="row border-bottom">
                               <div class="col-lg-6 my-3">
                                     <span  class="view-label"><i class="fa fa-phone" aria-hidden="true"></i> Phone : </span>
                               </div>
                               <div class="col-lg-6 my-3">
                                    <span><?php if(!empty($customer_data['UserPhone'])){echo $customer_data['UserPhone'];} else{echo "NA";}?></span>
                               </div>
                           </div>
                            <div class="row border-bottom">
                               <div class="col-lg-6 my-3">
                                     <span  class="view-label"><i class="fa fa-envelope" aria-hidden="true"></i> Email : </span>
                               </div>
                               <div class="col-lg-6 my-3">
                              
                                    <span><?php if(!empty($customer_data['UserEmail'])){echo $customer_data['UserEmail'];} else{echo "NA";}?></span>
                               </div>
                           </div>
                       </div>
                   </div>
                </div>
               <div class="col-md-6 tag-mar">
                   
                  <div class="card mb-4">
                     <div class="card-body">
                      
     
            
 <h4 class="">Address</h4>           
            
            
                    <div class="row border-bottom">
                    <div class="col-lg-6 my-3">
                    <span class="view-label"><i class="fa fa-home" aria-hidden="true"></i> Address 1 : </span>
                    </div>
                    <div class="col-lg-6 my-3">
                    <span class="address-text"><?php echo !empty($customer_data['UserAddress']) ? $customer_data['UserAddress'] : "NA"; ?></span>
                    </div>
                    </div>

                    <div class="row border-bottom">
                    <div class="col-lg-6 my-3">
                    <span class="view-label"><i class="fa fa-road" aria-hidden="true"></i> Address 2 : </span>
                    </div>
                    <div class="col-lg-6 my-3">
                    <span class="address-text"><?php echo !empty($customer_data['UserAddress2']) ? $customer_data['UserAddress2'] : "NA"; ?></span>
                    </div>
                    </div>

                    <div class="row border-bottom">
                      <div class="col-lg-6 my-3">
                            <span  class="view-label"><i class="fa fa-building" aria-hidden="true"></i> City : </span>
                           </div>
                      <div class="col-lg-6 my-3"><span><?php if(!empty($city_name)){echo $city_name;}else{echo"NA";} ?></span></div>
                      </div>
                       <div class="row border-bottom">
                      
                      <div class="col-lg-6 my-3" >
                            <span  class="view-label"><i class="fa fa-building" aria-hidden="true"></i> State : </span>
                           </div>
                      <div class="col-lg-6 my-3"><span><?php if(!empty($state_name)){echo $state_name;}else{echo"NA";} ?></span></div>
                      </div>
                       <div class="row border-bottom">
                      
                      <div class="col-lg-6 my-3">
                           <span  class="view-label"><i class="fa fa-building" aria-hidden="true"></i> Country : </span>
                           </div>
                      <div class="col-lg-6 my-3"><span><?php if(!empty($country_name)){echo $country_name;}else{echo"NA";} ?></span></div>
                      </div>
                       <div class="row border-bottom">
                      
                      <div class="col-lg-6 my-3">
                           <span  class="view-label"><i class="fa fa-file" aria-hidden="true"></i> Postcode : </span>
                           </div>
                      <div class="col-lg-6 my-3"><span><?php if(!empty($customer_data['UserZip'])){echo $customer_data['UserZip'];} else{echo "NA";}?></span></div>
                      </div>
                
                        
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   
</div>
<!-- / Content -->
<?= $this->include ('templates/footer') ?>  