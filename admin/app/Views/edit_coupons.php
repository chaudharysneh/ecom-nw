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
span.select2.select2-container.select2-container--default {
    width: 100% !important;
       display: block;
        background-color: #fff;
}
</style>        
            
<?= $this->include ('templates/header') ?>  
          <!-- Content wrapper -->
          <div class="text-nowrap m-5">
            <div class="card">
              <div class="card-body p-0">
          		<span class="addprobtn2">Edit Coupon</span><a href="<?php echo base_url(); ?>all-coupons"><span class="addprobtn">Coupons</span></a>
              </div>
             </div>
             <form id="edit_coupon_form">
          <div class="content-wrapper">
            <!-- Content -->

            <div class="flex-grow-1 container-p-y">
            <input type="hidden" id="base_url" value="<?php echo base_url('all-coupons') ?>">
            <input type="hidden" id="id" name="id" value="<?=$all_coupons_data['CouponID']?>">
              <!--<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add</span> Tags</h4>-->
              <div class="row">
                <div class="col-md-12 tag-mar">
                  <div class="card mb-12">
                    <!--<h5 class="card-header">Default</h5>-->
                    <div class="card-body">
                         <div class="mb-3">
                       <label for="largeSelect" class="form-label">Product Coupon</label>
                                       <select id="product_coupons" name="product_coupons" class="form-select product_type">
                                          <!--<option value="">Select Product Coupon</option>-->
                                          <!--<option value="1">Catagory</option>-->
                                          <!--<option value="2">Product</option>-->
                                          <!--<option value="3">User</option>-->
                                          
                                            <option value="1"<?php if($all_coupons_data['ProductCoupon']==1){echo "selected";} ?>>Catagory</option>
                                          <option value="2"<?php if($all_coupons_data['ProductCoupon']==2){echo "selected";} ?>>Product</option>
                                          <option value="3"<?php if($all_coupons_data['ProductCoupon']==3){echo "selected";} ?>>User</option>
                                          
                                          
                                       </select>
                      <p class="text-danger product_coupon_err"> </p>
                      </div>
                      
                      <?php 
                      //if($all_coupons_data['ProductCoupon']==1) {
                      ?>
                       <div class="mb-3" id="catagory_coupon" style="<?php if(!empty($all_coupons_data['CategoryID'])) { echo "display:block" ;} else{echo "display:none"; }?>">
                           <label for="largeSelect" class="form-label">Catagory</label><br>
                                       <select id="catagory_coupons" name="catagory_coupons[]" multiple="multiple"  class="form-select product_type product_data">
                                          <!--<option value="">Select Catagory</option>-->
                                         <?php 
                                         $cat_arr = explode(',',$all_coupons_data['CategoryID']);
                                        //  print_r($arr);
                                                foreach($all_catagory_data as $single_catagory_data){
    // print_r($option_value);
    // die;

                                            ?>

                        <option value="<?php echo $single_catagory_data['CategoryID'];?>"<?php if(in_array($single_catagory_data['CategoryID'],$cat_arr)) echo "selected"; ?>> <?php echo $single_catagory_data['CategoryName'];?> </option> 

                        <?php
                             }
                                ?>
                                       </select>
                      <p class="text-danger catagory_coupons_err"> </p>
                      </div>
                      <?php
                    //   } 
                      ?>
                      
                      
                      <?php //if($all_coupons_data['ProductCoupon']==2) {
                      ?>
                       <div class="mb-3" id="product_coupon" style="<?php if(!empty($all_coupons_data['ProductID'])) { echo 'display:block' ;} else{echo 'display:none'; }?>">
                            <label for="largeSelect" class="form-label">Product</label><br>
                                       <select id="product_couponed" name="product_couponed[]" multiple="multiple"  class="form-select product_type product_data">
                                          <option value="">Select Product</option>
                                          <?php 
                                          $prd_arr = explode(',',$all_coupons_data['ProductID']);
                                                foreach($all_products_data as $single_product_data){
    // print_r($option_value);
    // die;

                                            ?>
                       
                         <option value="<?php echo $single_product_data['ProductID'];?>"<?php if(in_array($single_product_data['ProductID'],$prd_arr)) echo "selected"; ?>> <?php echo $single_product_data['ProductName'];?> </option> 
                       
                        <?php
                             }
                                ?>
                                       </select>
                      <p class="text-danger product_couponed_err"> </p>
                            </div>
                              <?php
                            //   }
                              ?>
                              
                              
                          <?php 
                          //if($all_coupons_data['ProductCoupon']==3) {
                      ?>   
                        <div class="mb-3" id="usertype_coupon" style="<?php if(!empty($all_coupons_data['UserID'])) { echo "display:block" ;} else{echo "display:none"; }?>">
                             <label for="largeSelect" class="form-label">User</label><br>
                                       <select id="usertype_coupons" name="usertype_coupons[]" multiple="multiple"  class="form-select product_type product_data">
                                          <option value="">Select User</option>
                                          <?php 
                                           $usertype_arr = explode(',',$all_coupons_data['UserID']);
                                                foreach($all_user_data as $single_user_data){
    // print_r($option_value);
    // die;

                                            ?>
        
                         <option value="<?php echo $single_user_data['UserID'];?>"<?php if(in_array($single_user_data['UserID'],$usertype_arr)) echo "selected"; ?>> <?php echo $single_user_data['UserFirstName'];?> </option> 
                        <?php
                             }
                                ?>
                                       </select>
                      <p class="text-danger usertype_coupons_err"> </p>
                            
                             </div>
                          <?php 
                        //   } 
                          ?>
                      
                      
                      
                        
                        <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Coupon Name</label>
                        <input type="text" class="form-control" id="coupon_name" name="coupon_name" value="<?=$all_coupons_data['CouponName']?>" placeholder="John Doe"  aria-describedby="defaultFormControlHelp">
                      <p class="text-danger coupon_err"> </p>
                      </div>
                    <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Coupon Code</label>
                        <input type="text" class="form-control" id="coupon_code" name="coupon_code" value="<?=$all_coupons_data['CouponCode']?>" placeholder="John Doe" aria-describedby="defaultFormControlHelp">
                      <p class="text-danger code_err"> </p>
                      </div>
                         <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Product Specification</label>
                         <textarea type="text" class="form-control" id="specification" name="specification" aria-describedby="defaultFormControlHelp"><?=$all_coupons_data['CouponCode']?></textarea>
                      <p class="text-danger specification_err"> </p>
                      </div>
                      <div class="mb-3">
                       <label for="largeSelect" class="form-label">Coupon Type</label>
                                       <select id="coupon_type" name="coupon_type" class="form-select product_type">
                                          <option value="">Coupon Type</option>
                                          
                                          <option value="1"<?php if($all_coupons_data['CouponType']==1){echo "selected";} ?>>Percentage</option>
                                          <option value="2"<?php if($all_coupons_data['CouponType']==2){echo "selected";} ?>>Fixed</option>
                                          
                                       </select>
                      <p class="text-danger type_err"> </p>
                      </div>
                      
                      <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Coupon Value</label>
                        <input type="text" class="form-control" id="coupon_value" name="coupon_value" value="<?=$all_coupons_data['CouponValue']?>" aria-describedby="defaultFormControlHelp">
                      <p class="text-danger value_err"> </p>
                      <p class="text-danger value_err2"> </p>
                      </div>
                      
                      <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="s_date" name="s_date" value="<?php echo date('Y-m-d',strtotime($all_coupons_data['StartDate']))?>"  aria-describedby="defaultFormControlHelp">
                      <p class="text-danger sdate_err"> </p>
                      </div>
                      
                      <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="e_date" name="e_date" value="<?php echo date('Y-m-d',strtotime($all_coupons_data['EndDate']))?>"  aria-describedby="defaultFormControlHelp">
                      <p class="text-danger edate_err"> </p>
                      </div>
                      
                        <div class="mb-3">
                       <label for="largeSelect" class="form-label">User Status</label>
                                       <select id="user_status" name="user_status" class="form-select product_type">
                                          <option value="">User Status</option>
                                          
                                           <option value="1"<?php if($all_coupons_data['UserStatus']==1){echo "selected";} ?>>Active</option>
                                          <option value="2"<?php if($all_coupons_data['UserStatus']==2){echo "selected";} ?>>Inactive</option>
                                           <option value="3"<?php if($all_coupons_data['UserStatus']==3){echo "selected";} ?>>Expired</option>
                                          
                                          
                                         
                                       </select>
                      <p class="text-danger type_err"> </p>
                      </div>
                      
                      <div class="card-body p-2 mb-3">
                      <button type="button" class="addprobtn" id="update_coupon_data">
                      Edit Coupon</button>
                     
                      </div>
                      <p id="msg"> </p>
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