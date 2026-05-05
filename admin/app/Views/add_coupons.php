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

span.select2-selection.select2-selection--multiple {
    display: block;
    width: 100%;
    padding: 0.4375rem 0.875rem;
    font-size: 0.9375rem;
    font-weight: 400;
    line-height: 1.53;
    color: #697a8d;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #d9dee3;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
    border-radius: 0.375rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}



</style>        
            
<?= $this->include ('templates/header') ?>  
          <!-- Content wrapper -->
          <div class="text-nowrap m-5">
            <div class="card">
              <div class="card-body p-0">
          		<span class="addprobtn2">Add Coupon</span><a href="<?php echo base_url(); ?>all-coupons"><span class="addprobtn">Coupons</span></a>
              </div>
             </div>
             <form id="add_coupon_form">
          <div class="content-wrapper">
            <!-- Content -->

            <div class="flex-grow-1 container-p-y">
            <input type="hidden" id="base_url" value="<?php echo base_url('all-coupons') ?>">
              <!--<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add</span> Tags</h4>-->
              <div class="row">
                <div class="col-md-12 tag-mar">
                  <div class="card mb-12">
                    <!--<h5 class="card-header">Default</h5>-->
                    <div class="card-body">
                         <div class="mb-3">
                       <label for="largeSelect" class="form-label">Product Coupon</label>
                                       <select id="product_coupons" name="product_coupons" class="form-select product_type">
                                          <option value="">Select Product Coupon</option>
                                          <option value="1">Catagory</option>
                                          <option value="2">Product</option>
                                          <option value="3">User</option>
                                       </select>
                      <p class="text-danger product_coupon_err"> </p>
                      </div>
                      
                      <div class="mb-3" id="catagory_coupon" style="display:none;">
                           <label for="largeSelect" class="form-label">Catagory</label><br>
                                       <select id="catagory_coupons" name="catagory_coupons[]" multiple="multiple"  class="form-select form-control product_type product_data">
                                          <option value="">Select Catagory</option>
                                         <?php 
                                                foreach($all_catagory_data as $single_catagory_data){
    // print_r($option_value);
    // die;

                                            ?>
                        <option value="<?php echo $single_catagory_data['CategoryID'];?>"> <?php echo $single_catagory_data['CategoryName'];?> </option> 
                        <?php
                             }
                                ?>
                                       </select>
                      <p class="text-danger catagory_coupons_err"> </p>
                      </div>
                      
                      
                       <div class="mb-3" id="product_coupon" style="display:none;">
                            <label for="largeSelect" class="form-label">Product</label><br>
                                       <select id="product_couponed" name="product_couponed[]" multiple="multiple"  class="form-select form-control product_type product_data">
                                          <option value="">Select Product</option>
                                          <?php 
                                                foreach($all_products_data as $single_product_data){
    // print_r($option_value);
    // die;

                                            ?>
                        <option value="<?php echo $single_product_data['ProductID'];?>"> <?php echo $single_product_data['ProductName'];?> </option> 
                        <?php
                             }
                                ?>
                                       </select>
                      <p class="text-danger product_couponed_err"> </p>
                            </div>
                            
                            
                        <div class="mb-3" id="usertype_coupon" style="display:none;">
                             <label for="largeSelect" class="form-label">User</label><br>
                                       <select id="usertype_coupons" name="usertype_coupons[]" multiple="multiple"  class="form-select form-control product_type product_data">
                                          <option value="">Select User</option>
                                          <?php 
                                                foreach($all_user_data as $single_user_data){
    // print_r($option_value);
    // die;

                                            ?>
                        <option value="<?php echo $single_user_data['UserID'];?>"> <?php echo $single_user_data['UserFirstName'];?> </option> 
                        <?php
                             }
                                ?>
                                       </select>
                      <p class="text-danger usertype_coupons_err"> </p>
                            
                             </div>
                      
                        <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Coupon Name</label>
                        <input type="text" class="form-control" id="coupon_name" name="coupon_name"  aria-describedby="defaultFormControlHelp">
                      <p class="text-danger coupon_err"> </p>
                      </div>
                    <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Coupon Code</label>
                        <input type="text" class="form-control" id="coupon_code" name="coupon_code"  aria-describedby="defaultFormControlHelp">
                      <p class="text-danger code_err"> </p>
                      </div>
                        <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Product Specification</label>
                         <textarea type="text" class="form-control" id="specification" name="specification" aria-describedby="defaultFormControlHelp"></textarea>
                      <p class="text-danger specification_err"> </p>
                      </div>
                      
                      <div class="mb-3">
                       <label for="largeSelect" class="form-label">Coupon Type</label>
                                       <select id="coupon_type" name="coupon_type" class="form-select product_type">
                                          <option value="">Coupon Type</option>
                                          <option value="1">Percentage</option>
                                          <option value="2">Fixed</option>
                                       </select>
                      <p class="text-danger type_err"> </p>
                      </div>
                      
                      <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Coupon Value</label>
                        <input type="number" class="form-control" id="coupon_value" name="coupon_value" aria-describedby="defaultFormControlHelp">
                      <p class="text-danger value_err"> </p>
                      <p class="text-danger value_err2"> </p>
                      </div>
                      
                      <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="s_date" name="s_date"  aria-describedby="defaultFormControlHelp">
                      <p class="text-danger sdate_err"> </p>
                      </div>
                      
                      <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="e_date" name="e_date"  aria-describedby="defaultFormControlHelp">
                      <p class="text-danger edate_err"> </p>
                      </div>
                      
                         <div class="mb-3">
                       <label for="largeSelect" class="form-label">User Status</label>
                                       <select id="user_status" name="user_status" class="form-select product_type">
                                          <option value="">User Status</option>
                                          <option value="1">Active</option>
                                          <option value="2">Inactive</option>
                                          <option value="3">Expired</option>
                                       </select>
                      <p class="text-danger type_err"> </p>
                      </div>
                      
                      <div class="card-body p-2 mb-3">
                      <button type="button" class="addprobtn" id="add_coupon_data">
                      Add Coupon</button>
                     
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