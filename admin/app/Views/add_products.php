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
   
   
   
   
   span.select2-selection.select2-selection--multiple {
    display: block;
    width: 100%;
    padding: 0.4375rem 1.875rem 0.4375rem 0.875rem;
    -moz-padding-start: calc(0.875rem - 3px);
    font-size: 0.9375rem;
    font-weight: 400;
    line-height: 1.53;
    color: #697a8d;
    background-color: #fff;
    background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='rgba%2867, 89, 113, 0.6%29' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2 5l6 6 6-6'/%3e%3c/svg%3e);
    background-repeat: no-repeat;
    background-position: right 0.875rem center;
    background-size: 17px 12px;
    border: 1px solid #d9dee3;
    border-radius: 0.375rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}
   span.select2-selection.select2-selection--multiple:focus{
       /* border-color: # */
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
   
   .loader{
       z-index: 999;
    height: 35% !important;
    width: 12% !important;
    position: fixed;
    top: 33%;
    left: 50%;
   }

</style>
<?= $this->include ('templates/header') ?>   
<div class="spinner-grow text-primary loader" role="status" style="display:none";>
  <span class="sr-only">Loading...</span>
</div>
<!-- Content wrapper -->
<div class="text-nowrap m-3 mx-lg-4">
   <div class="card">
      <div class="card-body p-0">
         <span class="addprobtn2">Add Product</span><a href="<?php echo base_url(); ?>all-products"><span class="addprobtn">All Products</span></a>
      </div>
   </div>
<form id="add_product_form" enctype="multipart/form-data">
    <input type="hidden" id="base_url" value="<?php echo base_url('all-products') ?>">
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
                           <div class="col-lg-8">
                              <div class="row">
                                    <div class="col-lg-12">
                                    <div class="mt-2 mb-3">
                                       <label for="largeSelect" class="form-label">Product Type</label>
                                       <select id="product_type" name="product_type" class="form-select product_type">
                                          <option value="">Select Type</option>
                                          <option value="1">Simple</option>
                                          <option value="2">Variable</option>
                                       </select>
                                       <span id="product_type_err"></span>
                                    </div>
                                 </div>
                                 
                                 <div class="col-lg-12">
                                    <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">Product name</label>
                                        <input
                                          type="text"
                                          class="form-control"
                                          name="product_name"
                                          id="product_name"
                                          aria-describedby="defaultFormControlHelp"
                                          />
                                           <span id="product_name_err"></span>
                                    </div>
                                 </div>
                                 
                                
                                 
                                 
                                 <!--<div class="col-lg-12">-->
                                 <!--   <div class="mb-3">-->
                                 <!--      <label for="defaultFormControlInput" class="form-label">Description</label>-->
                                 <!--       <textarea-->
                                 <!--         type="text"-->
                                 <!--         class="form-control description-area"-->
                                 <!--         name="product_desc"-->
                                 <!--         id="product_desc"-->
                                 <!--         aria-describedby="defaultFormControlHelp"-->
                                 <!--         /></textarea>-->
                                 <!--         <span id="description_err"></span>-->
                                 <!--   </div>-->
                                 <!--</div>-->
                                 <div class="col-lg-12">
                                    <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">Product SKU</label>
                                       <input
                                          type="text"
                                          class="form-control"
                                          name="product_sku"
                                          id="product_sku"
                                           aria-describedby="defaultFormControlHelp"
                                          />
                                          <span id="product_sku_err"></span>
                                    </div>
                                 </div>
                                 
                                 <div class="col-lg-12">
                                    <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">Product Short Description</label>
                                       <textarea
                                          type="text"
                                          class="form-control description-area"
                                          name="product_short_desc"
                                          id="product_short_desc"
                                          aria-describedby="defaultFormControlHelp"
                                          /></textarea>
                                          <span id="product_short_desc_err"></span>
                                    </div>
                                 </div>
 <div class="col-lg-12">
                                    <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">Product Long Description</label>
                                       <textarea
                                          type="text"
                                          class="form-control description-area"
                                          name="product_long_desc"
                                          id="product_long_desc"
                                          aria-describedby="defaultFormControlHelp"
                                          column="5"
                                          /></textarea>
                                          <span id="product_long_desc_err"></span>
                                    </div>
                                 </div>
                              </div>
                               <div class="row">
                                 <div class="col-lg-12">
                                    <div class="mb-3">
                                       <label for="formFile" class="form-label">Upload / Add Photo</label>
                                       <input class="form-control" name="product_images[]" type="file" id="product_images" multiple />
                                       <span id="product_images_err"></span>
                                    </div>
                                 </div>
                                 
                                
                              </div>
                           </div>
                           
                          
                
                           <div class="col-lg-4">
                              <div class="row mt-2">
                                 <div class="col-lg-12">
                                    <div class=" mb-3">
                                       <label for="category" class="form-label">Categories</label>
                                       <select id="category" name="category" class="form-select">
                                          <option value="">Select Category</option>
                                          <?php if(!empty($categories)){
                                              foreach($categories as $all_categories){
                                            ?>  
                                          <option value="<?php echo $all_categories['CategoryID']; ?>"><?php echo $all_categories['CategoryName']; ?></option>
                                         
                                          <?php
                                          }
                                        }
                                          ?>
                                       </select>
                                       <span id="category_err"></span>
                                    </div>
                                 </div>
                                  <div class="col-lg-12">
                                    <div class=" mb-3">
                                       <label for="subcategory" class="form-label">Sub Categories</label>
                                       <select id="subcategory" name="subcategory" class="form-select ">
                                          <option value="">Select Sub Category</option>
                                          <!-- <option>Men</option>
                                          <option value="1">Women</option>
                                          <option value="2">Childdren</option> -->
                                       </select>
                                       <span id="sub_category_err"></span>
                                    </div>
                                 </div>
                                 
                               <div class="col-lg-12">
                                    <div class=" mb-3">
                                       <label for="largeSelect" class="form-label">Tags</label><br>
                                       <select id="tag" name="tag[]" class="form-select tag form" multiple="multiple">
                                          <!--<option value="">Select tag</option>-->
                                          <?php if(!empty($tags)){
                                              foreach($tags as $all_tags){
                                            ?>  
                                          <option value="<?php echo $all_tags['tagid']; ?>"><?php echo $all_tags['tagname']; ?></option>
                                         
                                          <?php
                                          }
                                        }
                                          ?>
                                       </select> <br>
                                       <span id="tag_err"></span>
                                    </div>
                                 </div>
                                 
                                  <div class="col-lg-12">
                                  <div class=" mb-3">
                                       <label for="largeSelect" class="form-label">Brand</label>
                                       <select id="brand" name="brand" class="form-select ">
                                          <option value="">Select Brand</option>
                                          
                                          <?php if(!empty($brands)){
                                              foreach($brands as $brandsval){
                                            ?>  
                                          <option value="<?php echo $brandsval['BrandID']; ?>"><?php echo $brandsval['BrandName']; ?></option>
                                          <?php
                                          }
                                        }
                                          ?>
                                       </select>
                                       <span id="brand_err"></span>
                                    </div>
                            </div>
                            
                                 
                                 
                                 <div class="col-lg-12">
                                    <div class="mt-2 mb-3">
                                       <label for="largeSelect" class="form-label">Stock Status</label>
                                       <select id="stock_status" name="stock_status" class="form-select ">
                                          <option value="">Select stock</option>
                                          <option value="1">In stock</option>
                                          <option value="2">Out Of Stock</option>
                                       </select>
                                       <span id="stock_status_err"></span>
                                    </div>
                                 </div>
                                 
                                  <div class="col-lg-12">
                                 <div class="mt-2 mb-3">
                                     <label for="defaultFormControlInput" class="form-label">Weight (kg)</label>
                                      <input
                                          type="text"
                                          class="form-control"
                                          name="product_weight"
                                          id="product_weight"
                                          aria-describedby="defaultFormControlHelp"
                                          />
                                          <span id="product_weight_err"></span>
                                    
                                    
                                    </div>
                           </div>
                            <div class="col-lg-12">
                              <div class="mt-2 mb-3">
                                       <label for="defaultFormControlInput" class="form-label">Dimensions (cm)</label>
                                       <input
                                          type="text"
                                          class="form-control"
                                          name="product_dimension"
                                          id="product_dimension"
                                          aria-describedby="defaultFormControlHelp"
                                          />
                                            <span id="product_dimension_err"></span>
                                    </div>
                           </div>
                           
                           <div class="col-lg-12">
                                <div class="mb-3 mt-1">
                                       <label for="defaultFormControlInput" class="form-label">Shipping class</label>
                                  <select id="shipping_methods" name="shipping_methods" class="form-select ">
                                          
                                          <option value="">Select Shipping Class</option>
                                          
                                           <?php if(!empty($shipping_data)){
                                              foreach($shipping_data as $shipping_method_data){
                                                //   print_r($shipping_method_data);
                                                //   die;
                                            ?>  
                                          <option value="<?php echo $shipping_method_data['MethodID']; ?>"><?php echo $shipping_method_data['MethodName']; ?></option>
                                         
                                          <?php
                                          }
                                        }
                                          ?>
                                          
                                         
                                       </select>
                                       <span id="shipping_methods_err"></span>
                                    </div>
                           </div>
                           
                           
                                 
                              </div>
                           </div>
                        </div>
                        
                      
                        
                        <div class="row" id="variable">
                        <div class="">
                              <label  class="form-label mt-3">Attribute definition</label>
                                 <hr>
                      </div>
                           <div class="col-lg-12 mb-3 py-3  mainvrdiv">
                              <div class="row wrappers"> 
                                 
                                 
                                 <!--<div id="product1">-->
                                 <?php if(!empty($variation_type)){
                                              foreach($variation_type as $variation_types){
                                                $values = $variation_types['values'];
                                               
                                            ?>  
                                          <div class="col-lg-4 mb-3">

                                             <label for="largeSelect" class="form-label"><?php echo $variation_types['VariationTypeName'] ?></label>
                                             <select name="variation[<?php echo $variation_types['VariationTypeID'] ?>][]" class="form-select variation selectvariation" id="variation">
                                                <option value="">Select Value</option>
                                                <?php if(!empty($values)){
                                                      foreach($values as $value){
                                                   ?>  
                                                   <option value="<?php echo $value['VariationID']; ?>"><?php echo $value['VariationName']; ?></option>
                                                
                                                   <?php
                                                   }
                                                }
                                                   ?>
                                                
                                             </select>
                                             <span id="variations_err0" class="variations_err"></span>
                                             

                                          </div>
                                         
                                          <?php
                                          }
                                        }
                                 ?>
                              </div>
                              <div class="row wrappers pull-right">

                                       <div class="col-lg-4 mb-3">
                                       
                                             <label for="defaultFormControlInput" class="form-label">Quantity</label>
                                             <input
                                                type="number"
                                                class="form-control product_quantity"
                                                name="product_quantity[]"
                                                id="product_quantity"
                                                aria-describedby="defaultFormControlHelp"
                                                />
                                                <span id="product_quantity_err" class="product_quantity_err"></span>
                                       
                                    </div>
                                 
                                 
                                 <div class="col-lg-4 mb-3">
                                    
                                       <label for="defaultFormControlInput" class="form-label">Price</label>
                                       <input
                                          type="number"
                                          class="form-control product_price"
                                          name="product_price[]"
                                          id="product_price"
                                          aria-describedby="defaultFormControlHelp"
                                          />
                                          <span id="product_price_err" class="product_price_err"></span>
                                    
                                 </div>
                                 
                                 
                                 
                                 
                                    <div class="col-lg-4 p-2 mt-3 actiondiv">
                                       <div class="form-check">
                                          <input class="form-check-input" name="default[]" type="checkbox" value="1" >
                                          <label class="form-check-label" for="flexCheckChecked">
                                             Set as default 
                                          </label>
                                       </div>
                                       
                                       <button type="button" class="addprobtn add_more_product_data">Add More</button>
                                    </div> 
                                    
                                    <div class="col-lg-4 mb-3">
                                    
                                       <label for="defaultFormControlInput" class="form-label">Sale Price</label>
                                       <input
                                          type="number"
                                          class="form-control product_sale_price"
                                          name="product_sale_price[]"
                                          id="product_sale_price"
                                          aria-describedby="defaultFormControlHelp"
                                          />
                                          <span id="product_sale_price_err" class="product_sale_price_err"></span>
                                    
                                 </div>
                                  <div class="col-lg-4 mb-3">
                                    
                                       <label for="defaultFormControlInput" class="form-label">Variation Image</label>
                                       <input
                                          type="file"
                                          class="form-control variation_image" data-id = '1'
                                          name="variation_image_1[]"
                                          id="variation_image"
                                          multiple
                                          aria-describedby="defaultFormControlHelp"
                                          />
                                          <span id="variation_image_err" class="variation_image_err"></span>
                                    
                                 </div>
                                 
                                  <div class="col-lg-4 mb-3 ">
                                     <div class="row"> 
                                      <div class="col-lg-12 mb-2">
                                          <label for="defaultFormControlInput" class="form-label">Tax Status</label>
                                          <select id="tax_status" name="tax_status[]" class="form-select tax_status">
                                             <option value="0">Non-Taxable</option>
                                             <option value="1">Taxable</option>
                                          </select>

                                          
                                      </div>
                                      <!-- <div class="col-lg-12 tx_class_div" style="display:none;">
                                            <label for="defaultFormControlInput" class="form-label">Tax Class</label>
                                          <select id="tax_class" name="tax_class[]" class="form-select tax_class">
                                               <option value="">Select Tax Class</option>
                                          <?php //if(!empty ($tax_class)){
                                              //foreach($tax_class as $single_tax){
                                          ?>
                                          <option value="<?php //echo $single_tax['taxe_class_id'];?> "><?php //echo $single_tax['class_name']; ?></option>
                                          
                                          <?php //}}?>
                                          </select>
                                      </div> -->
                                     </div>
                                 </div>
                                    
                              </div>
                           </div>
                           <!--</div>-->
                           
                          
                      
                           <!--<div class="col-lg-4">-->
                           <!--   <div class="row">-->
                           <!--      <div class="col-lg-12">-->
                           <!--         <img src="<?php echo base_url(); ?>public/assets/img/backgrounds/18.jpg" class="w-100">-->
                           <!--      </div>-->
                           <!--   </div>-->
                           <!--</div>-->
                        </div>
                        
                        
                        
                         <div class="row" id="simple">
                           <div class="col-lg-12">
                              <div class="row"> 
                                 <!--<div id="product1">-->
                              
                                
                            
                              <div class="col-lg-2 mb-3">
                               
                                       <label for="defaultFormControlInput" class="form-label">Quantity</label>
                                      <input
                                          type="number"
                                          class="form-control product_quantity"
                                          name="product_quantity2"
                                          id="product_quantity2"
                                          aria-describedby="defaultFormControlHelp"
                                          />
                                          <span id="product_quantity_err2"></span>
                                 
                                 </div>
                                 
                                 
                                   <div class="col-lg-2 mb-3 ">
                                    
                                       <label for="defaultFormControlInput" class="form-label">Price</label>
                                      <input
                                          type="number"
                                          class="form-control product_price"
                                          name="product_price2"
                                          id="product_price2"
                                          aria-describedby="defaultFormControlHelp"
                                          />
                                          <span id="product_price_err2"></span>
                                    
                                 </div>
                                   <div class="col-lg-2 mb-3 ">
                                    
                                       <label for="defaultFormControlInput" class="form-label">Sale Price</label>
                                      <input
                                          type="number"
                                          class="form-control product_price"
                                          name="product_sale_price2"
                                          id="product_sale_price2"
                                          aria-describedby="defaultFormControlHelp"
                                          />
                                          <span id="product_sale_price_err2"></span>
                                    
                                 </div>
                                 <div class="col-lg-6 mb-3 ">
                                     <div class="row"> 
                                      <div class="col-lg-12 mb-2">
                                          <label for="defaultFormControlInput" class="form-label">Tax Status</label>
                                          <select id="tax_status2" name="tax_status2" class="form-select ">
                                          
                                          <option value="0">Non-Taxable</option>
                                          <option value="1">Taxable</option>
                                          </select>
                                          
                                      </div>
                                      <!-- <div class="col-lg-12 tx_class_div2">
                                            <label for="defaultFormControlInput" class="form-label">Tax Class</label>
                                          <select id="tax_class2" name="tax_class2" class="form-select ">
                                              <option value="">Select Tax Class</option>
                                          <?php //if(!empty ($tax_class)){
                                             // foreach($tax_class as $single_tax){
                                          ?>
                                          <option value="<?php //echo $single_tax['taxe_class_id'];?>"><?php //echo $single_tax['class_name']; ?></option>
                                          
                                          <?php //}}?>
                                          </select>
                                      </div> -->
                                     </div>
                                 </div>
                                 
                
                                 </div>
                           </div>
                          
                          
                      
                          
                        </div>
                     
                        <div class="">
                           <span id="successmsg"></span>
                           <button type="button" class="addprobtn" id="add_product">Add Product</button>
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


<?php $product_data =json_encode($variation_type);?>

<script> 
$(document).on('change', 'input[name="default[]"].form-check-input', function() {
     const $checkboxes = $('#variable').find('input[name="default[]"].form-check-input');
     
     $checkboxes.each(function() {
       if ($(this).prop('checked') && this !== event.target) {
         $(this).prop('checked', false);
       }
     });
   });
// tax div show hide
$(document).ready(function () {
    // Initial check on page load
    checkTaxStatus2();

    // Listen for changes in the Tax Status dropdown
    $('#tax_status2').change(function () {
      checkTaxStatus2();
    });

    function checkTaxStatus2() {
      var taxStatusValue = $('#tax_status2').val();

      // If Tax Status is 1, show the Tax Class div; otherwise, hide it
      if (taxStatusValue === '1') {
        $('.tx_class_div2').show();
      } else {
        $('.tx_class_div2').hide();
      }
    }
  });
  
//   $(document).ready(function () {
    // Initial check on page load
    // checkTaxStatus();

    // Listen for changes in the Tax Status dropdown
    $(document).on('change','.tax_status',function () {
    //   checkTaxStatus();
      var this_ = $(this);
      var val = this_.val();
      var parent = this_.parent().parent();
      if(val == 1){
        parent.find('.tx_class_div').css('display','block');
      }else{
        parent.find('.tx_class_div').css('display','none');
      }
    });
     //price > sale pirce 
     $(document).on('keyup','.product_sale_price',function(){
         var this_ =$(this);
         check_price(this_);
     });
     function check_price(this_){
        //  var this_ =$(this);
         var sale_price_val=this_.val();
         var parent = this_.parent().parent();
        var price = parent.find(".product_price").val();
         console.log(price);
         if(Number(sale_price_val) > Number(price)){
            //  console.log('hh');
               this_.next('span').html('Sale Price is lower to Product Price').addClass("text-danger");
               return false;
         }else{
             this_.next('span').html('').addClass("text-danger");
         }
     }
     //
    // function checkTaxStatus() {
    //   var taxStatusValue = $('.tax_status').val();

    //   // If Tax Status is 1, show the Tax Class div; otherwise, hide it
    //   if (taxStatusValue === '1') {
    //     $('.tx_class_div').show();
    //   } else {
    //     $('.tx_class_div').hide();
    //   }
    // }
//   });
// Function to copy and paste the div
function addMoreProductData() {
      // Select the original div
      const originalDiv = document.querySelector('.mainvrdiv');

      // Clone the original div
      const clonedDiv = originalDiv.cloneNode(true);

      // Clear the input values in the cloned div
      const clonedInputs = clonedDiv.querySelectorAll('input, select');
      clonedInputs.forEach(input => {
         input.value = '';
      });
      //
      const taxfiled = clonedDiv.querySelector('.tx_class_div');
        if (taxfiled) {
          taxfiled.style.display = 'none';
        }
      //
      // Unselect the selected values in the cloned div
      const clonedSelects = clonedDiv.querySelectorAll('select');
      clonedSelects.forEach(select => {
         select.selectedIndex = 0;
      });

      // Remove the "mainvrdiv" class from the cloned div
      clonedDiv.classList.remove('mainvrdiv');

      // Remove the "Add More" button from the cloned div
      const clonedAddButton = clonedDiv.querySelector('.add_more_product_data');
      clonedAddButton.parentNode.removeChild(clonedAddButton);

      // Add the "Delete" button to the cloned div
      const clonedDeleteButton = document.createElement('button');
      clonedDeleteButton.type = 'button';
      clonedDeleteButton.className = 'deleteprobtn delete_product_data btn btn-danger';
      clonedDeleteButton.style.float = 'right';
      clonedDeleteButton.textContent = 'Delete';

      // Add event listener to the "Delete" button
      clonedDeleteButton.addEventListener('click', function () {
         clonedDiv.remove();
      });

      // Select the second wrapper div in the cloned div
      const clonedDivSecondWrapper = clonedDiv.querySelector('.wrappers:nth-child(2) .actiondiv');

      // Insert the "Delete" button before the "Add More" button in the second wrapper
      clonedDivSecondWrapper.insertBefore(clonedDeleteButton, clonedDivSecondWrapper.lastElementChild);

      // Insert the cloned div after the original div
     // originalDiv.parentNode.insertBefore(clonedDiv, originalDiv.nextSibling);
     var variationImage = originalDiv.querySelector('.variation_image');
     var variationImageclonedDiv = clonedDiv.querySelector('.variation_image');
        if (variationImage) {
            var dataId = variationImage.getAttribute('data-id');
            dataId = Number(dataId) + 1;
            variationImage.setAttribute('data-id',dataId);
            variationImageclonedDiv.setAttribute('data-id',dataId);
            var tmp ='variation_image_'+dataId+'[]';
            variationImageclonedDiv.setAttribute('name',tmp);
            // Now, the dataId variable contains the value of the data-id attribute
        }
      originalDiv.parentNode.insertBefore(clonedDiv, originalDiv);
   }

   // Add event listener to the "Add More" button
   const addButton = document.querySelector('.add_more_product_data');
   addButton.addEventListener('click', addMoreProductData);

var max_product_fields = 10; //Maximum allowed input fields 
  var wrappers = $(".wrappers"); //Input fields wrapper
  var add_product_button = $(".add_more_product_data"); //Add button class or ID
  var x = 1; //Initial input field is set to 1
   var j=1;
   var a=1;
   

  // when user click on remove button
  $(wrappers).on("click", ".remove_catagory_field", function (e) {
    e.preventDefault();
    $(this).parent('div').parent('div').remove(); //remove inout field
    console.log($(this).parent('div'));
    x--; //inout field decrement
  })

</script>