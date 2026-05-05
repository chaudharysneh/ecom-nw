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
         <span class="addprobtn2">Edit Tax</span><a href="<?php echo base_url(); ?>all_taxes"><span class="addprobtn">Taxes</span></a>
      </div>
   </div>
   <form id="edit_taxes_form">
      <div class="content-wrapper">
         <!-- Content -->
         <div class="flex-grow-1 container-p-y">
             <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url('all_taxes') ?>">
              <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url() ?>">
             <input type="hidden" name="id" id="id" value="<?php echo $taxes_data['TaxID']; ?>">
                  <!-- <input type="hidden" name="tax_class_id" id="tax_class_id" value="<?php //echo $tax_class_id; ?>"> -->
             
            <!--<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add</span> Tags</h4>-->
            <div class="row">
               <div class="col-md-12 tag-mar">
                  <div class="card mb-4">
                     <!--<h5 class="card-header">Default</h5>-->
                     <div class="card-body">
                        <div class="row">
                           
                                 <div class="col-lg-6">
                                    <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">Tax  Name</label>
                                       <input
                                          type="text"
                                          class="form-control"
                                          id="tax_name"
                                          name="tax_name"
                                          value="<?php echo $taxes_data['TaxName']; ?>"
                                          aria-describedby="defaultFormControlHelp"
                                          />
                                          <span id="tax_name_err"></span>
                                    </div>
                                
                           </div>
                           <div class="col-lg-6">
                              
                                    <div class=" mb-3">
                                      <label for="defaultFormControlInput" class="form-label">Tax Rate</label>
                                       <input
                                          type="number"
                                          class="form-control"
                                          id="tax_rate"
                                          name="tax_rate"
                                          value="<?php echo $taxes_data['TaxRate']; ?>"
                                          aria-describedby="defaultFormControlHelp"
                                          />
                                          <span id="tax_rate_err"></span>
                                    </div>
                                 
                           </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                  <div class=" mb-3">
                                       <label for="largeSelect" class="form-label">Country</label>
                                      <select class="form-select" aria-label="Default select example" name="country" id="country">
                              <option value="">Country</option>
                              <?php 
                            //   print_r($data); die;
                              foreach($country as $key=>$value){
                                //   print_r($value);
                              
                              ?>
                              <option value="<?php echo $value['CountryID'] ?>" <?php if($value['CountryID']==$taxes_data['Country']){echo "selected";} ?>><?php echo $value['CountryName'] ?></option>
                              <?php  } ?>
                              
                            </select>
                            <span id="country_err"></span>
                                    </div>
                            </div>
                               <div class="col-lg-4">
                                  <div class=" mb-3">
                                       <label for="largeSelect" class="form-label">State</label>
                                        <select class="form-select" aria-label="Default select example" name="state" id="state">
                                             <option value="">State</option>
                               <?php 
                              foreach($state as $key=>$value){
                                
                              
                              ?>
                              <option value="<?php echo $value['StateID'] ?>"<?php if($value['StateID']==$taxes_data['State']){echo "selected";} ?>><?php echo $value['StateName'] ?></option>
                              <?php } ?>
                              
                            </select>
                            <span id="state_err"></span>
                                    </div>
                            </div>
                             <div class="col-lg-4">
                                  <div class=" mb-3">
                                       <label for="largeSelect" class="form-label">City</label>
                                       <select class="form-select" aria-label="Default select example" name="city" id="city">
                                            <option value="">City</option>
                              <?php 
                              foreach($city as $key=>$value){
                                
                              
                              ?>

                              <option value="<?php echo $value['CityID'] ?>"<?php if($value['CityID']==$taxes_data['City']){echo "selected";} ?>><?php echo $value['CityName'] ?></option>
                             <?php }?>
                              
                            </select>
                            <span id="city_err"></span>
                                    </div>
                            </div>
                           <div class="col-lg-6">
                                    <div class="mb-3">
                                      <label for="largeSelect" class="form-label">Zip</label>
                                       <input
                                          type="number"
                                          class="form-control"
                                          id="tax_zip"
                                          name="tax_zip"
                                          value="<?php echo $taxes_data['Zip'] ?>"
                                          aria-describedby="defaultFormControlHelp"
                                          />
                                          <span id="zip_err"></span>
                                    </div>
                                 </div>
                               
                              <div class="col-lg-6">
                                  <div class=" mb-3">
                                       <label for="largeSelect" class="form-label">Shipping</label>
                                       <select id="largeSelect" class="form-select" name="shipping" id="shipping">
                                          <option value="Enable" <?php if($taxes_data['Shipping']=='Enable'){echo "selected";}?>>Enable</option>
                                          <option value="Disable" <?php if($taxes_data['Shipping']=='Disable'){echo "selected";}?>>Disable</option>
                                          
                                          
                                       </select>
                                       <span id="shipping_err"></span>
                                    </div>
                            
                           </div>
                           <div class="col-lg-12 text-right mt-3">
                                 <div class="card-body p-2 mb-3">
                           <a href="javascript:void(0)"><span class="addprobtn" id="edit_tax_btn">Edit Tax</span></a>
                        </div>
                           </div>
                          <p id="msg"> </p>
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
 

</script>