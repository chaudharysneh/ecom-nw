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

   span.select2-selection.select2-selection--multiple:focus {
      /* border-color: #696cff */
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

   .loader {
      z-index: 999;
      height: 35% !important;
      width: 12% !important;
      position: fixed;
      top: 33%;
      left: 50%;
   }
</style>
<?= $this->include('templates/header') ?>
<div class="spinner-grow text-primary loader" role="status" style="display:none" ;>
   <span class="sr-only">Loading...</span>
</div>


<?php //echo print_r($brand);die; 
?>
<!-- Content wrapper -->
<div class="text-nowrap m-3 mx-lg-4">
   <div class="card">
      <div class="card-body p-0">
         <span class="addprobtn2">Edit Product</span><a href="<?php echo base_url(); ?>all-products"><span class="addprobtn">All Products</span></a>
      </div>
   </div>
   <form id="edit_product_form" enctype="multipart/form-data">
      <input type="hidden" id="base_url" value="<?php echo base_url('all-products') ?>">
      <input type="hidden" name="id" id="id" value="<?php echo $all_product_data['ProductID']; ?>">
      <input type="hidden" name="old_image" id="old_image" value='<?php echo $all_product_data['ProductImage']; ?>'>
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


                                          <option value="1" <?php if ($all_product_data['ProductType'] == 1) {
                                                               echo "Selected";
                                                            } ?>>Simple</option>
                                          <option value="2" <?php if ($all_product_data['ProductType'] == 2) {
                                                               echo "Selected";
                                                            } ?>>Variable</option>
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
                                          value="<?php echo $all_product_data['ProductName']; ?>"
                                          aria-describedby="defaultFormControlHelp" />
                                       <span id="product_name_err"></span>
                                    </div>
                                 </div>




                                 <div class="col-lg-12">
                                    <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">Product SKU</label>
                                       <input
                                          type="text"
                                          class="form-control"
                                          name="product_sku"
                                          id="product_sku"
                                          value="<?php echo $all_product_data['ProductSKU']; ?>"
                                          aria-describedby="defaultFormControlHelp" />
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

                                          aria-describedby="defaultFormControlHelp" /><?php echo $all_product_data['ProductShortDesc']; ?></textarea>
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
                                          column="5" /><?php if (!empty($all_product_data['ProductLongDesc'])) {
                                                            echo $all_product_data['ProductLongDesc'];
                                                         } else {
                                                            echo "NA";
                                                         } ?></textarea>
                                       <span id="product_long_desc_err"></span>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="mb-3">
                                       <label for="formFile" class="form-label">Upload / Add Photo</label>
                                       <input class="form-control" name="product_images[]" type="file" id="product_images" multiple />
                                       <?php
                                       // print_r($all_product_data['ProductImage']);
                                       // die;

                                       $p_img = json_decode($all_product_data['ProductImage']);
                                       // print_r($p_img);
                                       // die;

                                       if (!empty($p_img)) {
                                          foreach ($p_img as $pimg) {
                                             // print_r($pimg);
                                             // die;
                                       ?>

                                             <img src="<?php echo base_url() . 'public/assets/img/product_images/' . $pimg; ?>" style="vertical-align: middle;
                                                      width: auto;
                                                      height: 60px;
                                                      object-fit: contain;
                                                      border: 7px solid #dadada70;
                                                      border-radius: 5%;
                                                      margin-top: 10px;">
                                          <?php
                                          }
                                       } else {
                                          ?>
                                          <img src="<?php echo base_url() . 'public/assets/img/product_images/18.jpg' ?>" style="vertical-align: middle;
                                                         width: auto;
                                                         height: 60px;
                                                         object-fit: contain;
                                                         border: 7px solid #dadada70;
                                                         border-radius: 5%;
                                                         margin-top: 10px;">
                                       <?php
                                       }
                                       ?>
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
                                       <select id="category" name="category" class="form-select category">
                                          <option value="">Select Category</option>
                                          <?php if (!empty($categories)) {
                                             foreach ($categories as $all_categories) {
                                          ?>

                                                <option value="<?php echo $all_categories['CategoryID']; ?>" <?php if ($all_categories['CategoryID'] == $all_product_data['CategoryID']) echo "selected"; ?>> <?php echo $all_categories['CategoryName']; ?> </option>

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
                                          <?php if (!empty($subcatagories)) {
                                             foreach ($subcatagories as $all_subcategories) {
                                                //   print_r($all_subcategories);
                                                //   die;
                                          ?>

                                                <option value="<?php echo $all_subcategories['sub_category_id']; ?>" <?php if ($all_subcategories['sub_category_id'] == $all_product_data['SubCategoryID']) echo "selected"; ?>> <?php echo $all_subcategories['sub_category']; ?> </option>

                                          <?php
                                             }
                                          }
                                          ?>
                                       </select>
                                       <span id="sub_category_err"></span>
                                    </div>
                                 </div>

                                 <div class="col-lg-12">
                                    <div class=" mb-3">
                                       <label for="largeSelect" class="form-label">Tags</label><br>
                                       <select id="tag" name="tag[]" class="form-select tag form" multiple="multiple">
                                          <!--<option value="">Select tag</option>-->
                                          <?php

                                          $tag_data = json_decode($all_product_data['TagID']);
                                          //   print_r($tag_data);
                                          //     die;

                                          if (!empty($tags)) {
                                             foreach ($tags as $key => $all_tags) {
                                                $selected = '';
                                                if (isset($tag_data[$key]) && $all_tags['tagid'] == $tag_data[$key]) {
                                                   $selected = 'selected';
                                                }
                                          ?>
                                                <option value="<?php echo $all_tags['tagid']; ?>" <?php echo $selected; ?>> <?php echo $all_tags['tagname']; ?> </option>

                                          <?php

                                             }
                                          } else {
                                             echo "NA";
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

                                          <?php
                                          if (!empty($brand)) { // Using $brand here if it's singular
                                             foreach ($brand as $brandsval) { // Loop through $brand, not $brands
                                          ?>
                                                <option value="<?php echo $brandsval['BrandID']; ?>" <?php if ($brandsval['BrandID'] == $all_product_data['BrandID']) echo "selected"; ?>>
                                                   <?php echo $brandsval['BrandName']; ?>
                                                </option>
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
                                          <option value="1" <?php if ($all_product_data['Stock_Status'] == 1) {
                                                               echo "Selected";
                                                            } ?>>In Stock</option>
                                          <option value="2" <?php if ($all_product_data['Stock_Status'] == 2) {
                                                               echo "Selected";
                                                            } ?>>Out Of Stock</option>
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
                                          value="<?php if (!empty($all_product_data['product_weight'])) {
                                                      echo $all_product_data['product_weight'];
                                                   } else {
                                                      echo "NA";
                                                   } ?>"
                                          aria-describedby="defaultFormControlHelp" />
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
                                          value="<?php if (!empty($all_product_data['product_dimensions'])) {
                                                      echo $all_product_data['product_dimensions'];
                                                   } else {
                                                      echo "NA";
                                                   } ?>"
                                          aria-describedby="defaultFormControlHelp" />
                                       <span id="product_dimension_err"></span>
                                    </div>
                                 </div>

                                 <div class="col-lg-12">
                                    <div class="mb-3 mt-1">
                                       <label for="defaultFormControlInput" class="form-label">Shipping class</label>
                                       <select id="shipping_methods" name="shipping_methods" class="form-select">

                                          <option value="">Select Shipping Class</option>

                                          <?php if (!empty($shipping_data)) {
                                             foreach ($shipping_data as $shipping_method_data) {
                                                //   print_r($shipping_method_data);
                                                //   die;
                                          ?>

                                                <option value="<?php echo $shipping_method_data['MethodID']; ?>" <?php if ($shipping_method_data['MethodID'] == $all_product_data['ShippingID']) echo "selected"; ?>> <?php echo $shipping_method_data['MethodName']; ?> </option>
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
                              <div class="d-flex justify-content-between">
                                 <label class="form-label mt-3">Attribute definition</label>
                                 <button type="button" class="addprobtn add_more_product_data" data-id='<?= (!empty($all_variations)) ? count($all_variations) : 1 ?>'>Add More</button>
                              </div>

                              <hr>
                           </div>

                           <?php

                           if (!empty($all_variations)) { ?>
                              <div class="all_variation">
                                 <?php
                                 $lp = 1;
                                 foreach ($all_variations as $vkey => $vars) {
                                    $old_image = $vars['product_variation_image'];
                                    $VariationPrice = (isset($vars['VariationPrice'])) ? ($vars['VariationPrice']) : ('0');
                                    $VariationStock = (isset($vars['VariationStock'])) ? ($vars['VariationStock']) : ('0');
                                    $defaultSet = (isset($vars['defaultProduct'])) ? ($vars['defaultProduct']) : ('0');

                                    $Sale_VariationPrice = (isset($vars['Sale_VariationPrice'])) ? ($vars['Sale_VariationPrice']) : ('0');
                                    $variation_is_taxable = (isset($vars['variation_is_taxable'])) ? ($vars['variation_is_taxable']) : ('0');
                                    $variation_tax_class_id = (isset($vars['variation_tax_class_id'])) ? ($vars['variation_tax_class_id']) : ('0');


                                 ?>
                                    <div class="col-lg-12  mb-3 py-3  mainvrdiv">
                                       <div class="row wrappers">
                                          <?php
                                          $VariationID = $vars['VariationID'];
                                          $VariationDetails = array();
                                          if (isset($variations_data[$VariationID])) {
                                             $VariationDetails = $variations_data[$VariationID];
                                          }





                                          if (!empty($variation_type)) {
                                             foreach ($variation_type as $vrtkye => $variation_types) {
                                                $values = $variation_types['values'];
                                                $selectedvalue = '';
                                                if (isset($VariationDetails[$vrtkye]['VariationVlueID'])) {
                                                   $selectedvalue = $VariationDetails[$vrtkye]['VariationVlueID'];
                                                }

                                          ?>
                                                <div class="col-lg-4 mb-3">

                                                   <label for="largeSelect" class="form-label"><?php echo $variation_types['VariationTypeName'] ?></label>

                                                   <select name="variation[<?php echo $variation_types['VariationTypeID'] ?>][]" class="form-select variation selectvariation" id="variation">
                                                      <option value="">Select Value</option>
                                                      <?php if (!empty($values)) {
                                                         foreach ($values as $value) {
                                                            $selected = '';
                                                            if ($selectedvalue == $value['VariationID']) {

                                                               $selected = 'selected';
                                                            }

                                                      ?>
                                                            <option <?php echo $selected; ?> value="<?php echo $value['VariationID']; ?>"><?php echo $value['VariationName']; ?></option>

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
                                                value="<?php echo $VariationStock; ?>"
                                                type="number"
                                                class="form-control product_quantity"
                                                name="product_quantity[]"
                                                id="product_quantity"
                                                aria-describedby="defaultFormControlHelp" />
                                             <span id="product_quantity_err" class="product_quantity_err"></span>

                                          </div>


                                          <div class="col-lg-4 mb-3">

                                             <label for="defaultFormControlInput" class="form-label">Price</label>
                                             <input
                                                value="<?php echo $VariationPrice; ?>"
                                                type="number"
                                                class="form-control product_price"
                                                name="product_price[]"
                                                id="product_price"
                                                aria-describedby="defaultFormControlHelp" />
                                             <span id="product_price_err" class="product_price_err"></span>

                                          </div>

                                          <?php
                                          if ($lp != 1) {
                                          ?>
                                             <div class="col-lg-4 p-2 mt-3 actiondiv">
                                                <div class="form-check">
                                                   <input class="form-check-input" name="default[]" type="checkbox" value="1" <?php echo ($defaultSet == 1) ? ('checked') : (''); ?>>
                                                   <label class="form-check-label" for="flexCheckChecked">
                                                      Set as default
                                                   </label>
                                                </div>

                                                <button type="button" class="deleteprobtn delete_product_data btn btn-danger" style="float: right;">Delete</button>
                                             </div>
                                          <?php
                                          } else {
                                          ?>

                                             <div class="col-lg-4 p-2 mt-3 actiondiv">
                                                <div class="form-check">
                                                   <input class="form-check-input" name="default[]" type="checkbox" value="1" <?php echo ($defaultSet == 1) ? ('checked') : (''); ?>>
                                                   <label class="form-check-label" for="flexCheckChecked">
                                                      Set as default
                                                   </label>
                                                </div>
                                                <!--<button type="button" class="addprobtn add_more_product_data">Add More</button>-->
                                             </div>


                                          <?php

                                          }
                                          ?>
                                          <div class="col-lg-4 mb-3">

                                             <label for="defaultFormControlInput" class="form-label">Sale Price</label>
                                             <input
                                                value="<?php echo $Sale_VariationPrice; ?>"
                                                type="number"
                                                class="form-control product_sale_price"
                                                name="product_sale_price[]"
                                                id="product_sale_price"
                                                aria-describedby="defaultFormControlHelp" />
                                             <span id="product_sale_price_err" class="product_sale_price_err"></span>

                                          </div>
                                          <div class="col-lg-4 mb-3">
                                             <label for="defaultFormControlInput" class="form-label">Variation Image</label>
                                             <input type="hidden" class="variation_image_index" name="variation_image_index[]" value='<?= ($lp) ?>'>
                                             <input type="hidden" class="old_variation_image" name="old_variation_image_<?= ($lp) ?>[]" value='<?= $old_image ?>'>
                                             <input type="file" class="form-control variation_image" data-id='<?= ($lp) ?>' name="variation_image_<?= ($lp) ?>[]" id="variation_image" multiple aria-describedby="defaultFormControlHelp" />
                                             <span id="variation_image_err" class="variation_image_err"></span>
                                             <?php
                                             if (!empty($old_image)) {
                                                $old_image1 = json_decode($old_image, true); // Decode as associative array
                                                if (is_array($old_image1)) { // Ensure it's a valid array
                                                   foreach ($old_image1 as $v) {
                                             ?>
                                                      <img src="<?php echo base_url() . 'public/assets/img/product_images/' . $v; ?>" class="var_display_img" width="50" height="50">
                                             <?php
                                                   }
                                                }
                                             }
                                             ?>
                                          </div>


                                          <div class="col-lg-4 mb-3 ">
                                             <div class="row">
                                                <div class="col-lg-12 mb-2">
                                                   <label for="defaultFormControlInput" class="form-label">Tax Status</label>
                                                   <select id="tax_status" name="tax_status[]" class="form-select tax_status">

                                                      <option value="0" <?php if ($variation_is_taxable == 0) {
                                                                           echo "selected";
                                                                        } ?>>Non-Taxable</option>
                                                      <option value="1" <?php if ($variation_is_taxable == 1) {
                                                                           echo "selected";
                                                                        } ?>>Taxable</option>
                                                   </select>

                                                </div>
                                                <?php //$tmp = $variation_is_taxable=='' ? 'block' : 'none'; 
                                                ?>
                                                <!-- <div class="col-lg-12 tx_class_div" style="display:;">
                                            <label for="defaultFormControlInput" class="form-label">Tax Class</label>
                                          <select id="tax_class" name="tax_class[]" class="form-select tax_class">
                                               <option value="">Select Tax Class</option>
                                          <?php //if(!empty ($tax_class)){
                                          // foreach($tax_class as $single_tax){
                                          ?>
                                          <option value="<?php //echo $single_tax['taxe_class_id'];
                                                         ?>"<?php //if($variation_tax_class_id==$single_tax['taxe_class_id']){echo "selected";} 
                                                                                                      ?> ><?php //echo $single_tax['class_name']; 
                                                                                                                                                                                                ?></option>
                                          
                                          <?php //}}
                                          ?>
                                          </select>
                                      </div> -->
                                             </div>
                                          </div>
                                          <hr>
                                       </div>
                                    </div>
                                 <?php
                                    $lp++;
                                 }
                                 ?>
                              </div>
                           <?php


                           } else {
                           ?>
                              <div class="col-lg-3 mb-3">

                                 <label for="largeSelect" class="form-label">Option</label>
                                 <select name="variation_type[]" class="form-select variation_type" id="variation_type">
                                    <option value="">Select Option</option>

                                    <?php if (!empty($variation_type)) {
                                       foreach ($variation_type as $variation_types) {
                                    ?>

                                          <option value="<?php echo $variation_types['VariationTypeID']; ?>"> <?php echo $variation_types['VariationTypeName']; ?> </option>

                                    <?php
                                       }
                                    }
                                    ?>
                                 </select>
                                 <span id="variation_type_err0" class="variation_type_err"></span>
                              </div>




                              <div class="col-lg-3 mb-3">

                                 <label for="largeSelect" class="form-label">Option Values</label>
                                 <select name="variation[]" class="form-select variation" id="variation">
                                    <option value="">Select Value</option>
                                    <?php if (!empty($variations)) {
                                       foreach ($variations as $variation) {
                                          //   print_r($variation);
                                          //   die;
                                          //   die;
                                    ?>

                                          <option value="<?php echo $variation['VariationTypeID']; ?>"> <?php echo $variation['VariationName']; ?> </option>

                                    <?php
                                       }
                                    }
                                    ?>

                                 </select>
                                 <span id="variations_err0" class="variations_err"></span>
                                 <!--                  <div class="p-2 mb-5">-->
                                 <!--  <button type="button" class="addprobtn add_more_option_value_data">-->
                                 <!--Add More</button>-->
                                 <!--</div>-->


                              </div>

                              <div class="col-lg-2 mb-3">

                                 <label for="defaultFormControlInput" class="form-label">Quantity</label>
                                 <input
                                    type="number"
                                    class="form-control product_quantity"
                                    name="product_quantity[]"
                                    id="product_quantity"
                                    value="<?php //echo $variation['VariationStock'] 
                                             ?>"
                                    aria-describedby="defaultFormControlHelp" />

                                 <span id="product_quantity_err" class="product_quantity_err"></span>

                              </div>


                              <div class="col-lg-2 mb-3">

                                 <label for="defaultFormControlInput" class="form-label">Price</label>
                                 <input
                                    type="number"
                                    class="form-control product_price"
                                    name="product_price[]"
                                    id="product_price"
                                    value="<?php //echo $variation['VariationPrice'] 
                                             ?>"
                                    aria-describedby="defaultFormControlHelp" />
                                 <span id="product_price_err" class="product_price_err"></span>

                              </div>

                              <div class="col-lg-4 mb-3">

                                 <label for="defaultFormControlInput" class="form-label">Sale Price</label>
                                 <input
                                    value=""
                                    type="number"
                                    class="form-control product_sale_price"
                                    name="product_sale_price[]"
                                    id="product_sale_price"
                                    aria-describedby="defaultFormControlHelp" />
                                 <span id="product_sale_price_err" class="product_sale_price_err"></span>

                              </div>
                              <div class="col-lg-4 mb-3">

                                 <label for="defaultFormControlInput" class="form-label">Variation Image</label>
                                 <input type="hidden" class="variation_image_index" name="variation_image_index[]" value='1'>
                                 <input type="hidden" class="old_variation_image" name="old_variation_image_1[]" value=''>
                                 <input type="file" class="form-control variation_image" data-id='1' name="variation_image_1[]" id="variation_image" multiple aria-describedby="defaultFormControlHelp" />
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
                                          // foreach($tax_class as $single_tax){
                                          ?>
                                          <option value="<?php //echo $single_tax['taxe_class_id'];
                                                         ?> "><?php //echo $single_tax['class_name']; 
                                                                                                         ?></option>
                                          
                                          <?php //}}
                                          ?>
                                          </select>
                                      </div> -->
                                 </div>
                              </div>


                              <!--            <div class="col-lg-2 p-2 mt-3">-->
                              <!--  <button type="button" class="addprobtn add_more_product_data">-->
                              <!--Add More</button>-->
                              <!--</div>-->

                           <?php

                           }
                           ?>




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
                                       value="<?php if (!empty($all_product_data['ProductStock'])) {
                                                   echo $all_product_data['ProductStock'];
                                                } else {
                                                   echo "";
                                                } ?>"
                                       aria-describedby="defaultFormControlHelp" />
                                    <span id="product_quantity_err2"></span>

                                 </div>


                                 <div class="col-lg-2 mb-3">

                                    <label for="defaultFormControlInput" class="form-label">Price</label>
                                    <input
                                       type="number"
                                       class="form-control product_price"
                                       name="product_price2"
                                       id="product_price2"
                                       value="<?php if (!empty($all_product_data['ProductPrice'])) {
                                                   echo $all_product_data['ProductPrice'];
                                                } else {
                                                   echo "";
                                                } ?>"
                                       aria-describedby="defaultFormControlHelp" />
                                    <span id="product_price_err2"></span>

                                 </div>
                                 <div class="col-lg-2 mb-3 ">

                                    <label for="defaultFormControlInput" class="form-label">Sale Price</label>
                                    <input
                                       type="number"
                                       class="form-control product_price"
                                       name="product_sale_price2"
                                       id="product_sale_price2"
                                       value="<?php if (!empty($all_product_data['Sale_ProductPrice'])) {
                                                   echo $all_product_data['Sale_ProductPrice'];
                                                } else {
                                                   echo "";
                                                } ?>"
                                       aria-describedby="defaultFormControlHelp" />
                                    <span id="product_sale_price_err2"></span>

                                 </div>

                                 <div class="col-lg-6 mb-3 ">
                                    <div class="row">
                                       <div class="col-lg-12 mb-2">
                                          <label for="defaultFormControlInput" class="form-label">Tax Status</label>
                                          <select id="tax_status2" name="tax_status2" class="form-select ">

                                             <option value="0" <?php if ($all_product_data['is_taxable'] == 0) {
                                                                  echo "Selected";
                                                               } ?>>Non-Taxable</option>
                                             <option value="1" <?php if ($all_product_data['is_taxable'] == 1) {
                                                                  echo "Selected";
                                                               } ?>>Taxable</option>
                                          </select>

                                       </div>
                                       <!-- <div class="col-lg-12 tx_class_div2">
                                            <label for="defaultFormControlInput" class="form-label">Tax Class</label>
                                          <select id="tax_class2" name="tax_class2" class="form-select ">
                                              <option value="">Select Tax Class</option>
                                          <?php //if(!empty ($tax_class)){
                                          // foreach($tax_class as $single_tax){
                                          ?>
                                          <option value="<?php //echo $single_tax['taxe_class_id'];
                                                         ?>" <?php //if($all_product_data['tax_class_id']==$single_tax['taxe_class_id']){echo "selected";} 
                                                                                                         ?>><?php //echo $single_tax['class_name']; 
                                                                                                                                                                                                         ?></option>
                                          
                                          <?php //}}
                                          ?>
                                          </select>
                                      </div> -->
                                    </div>
                                 </div>


                              </div>
                           </div>




                        </div>




                        <div class="card-body p-2 mb-3">
                           <span id="successmsg"></span>
                           <button type="button" class="addprobtn" id="edit_product">Update Product</button>
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


<?php $product_data = json_encode($variation_type); ?>

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
   $(document).ready(function() {
      // Initial check on page load
      checkTaxStatus2();

      // Listen for changes in the Tax Status dropdown
      $('#tax_status2').change(function() {
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

   $(document).on('change', '.tax_status', function() {
      //   checkTaxStatus();
      var this_ = $(this);
      var val = this_.val();
      var parent = this_.parent().parent();
      if (val == 1) {
         parent.find('.tx_class_div').css('display', 'block');
      } else {
         parent.find('.tx_class_div').css('display', 'none');
      }
   });

   //price > sale pirce 
   $(document).on('keyup', '.product_sale_price', function() {
      var this_ = $(this);
      check_price(this_);
   });

   function check_price(this_) {
      //  var this_ =$(this);
      var sale_price_val = this_.val();
      var parent = this_.parent().parent();
      var price = parent.find(".product_price").val();
      console.log(price);
      if (Number(sale_price_val) > Number(price)) {
         //  console.log('hh');
         this_.next('span').html('Sale Price is lower to Product Price').addClass("text-danger");
         return false;
      } else {
         this_.next('span').html('').addClass("text-danger");
      }
   }
   //

   // Function to delete the div
   function deleteProductData(div) {
      div.remove();
   }

   // Function to copy and paste the div
   function addMoreProductData() {
      // Select the original div
      const originalDiv = document.querySelector('.mainvrdiv');

      // Clone the original div
      const clonedDiv = originalDiv.cloneNode(true);

      // Clear the input values in the cloned div
      const clonedInputs = clonedDiv.querySelectorAll('input, select');
      clonedInputs.forEach(input => {
         if (input.type === 'checkbox') {
            input.checked = false;
         } else {
            input.value = '';
         }
      });

      // Unselect the selected values in the cloned div
      const clonedSelects = clonedDiv.querySelectorAll('select');
      clonedSelects.forEach(select => {
         select.selectedIndex = 0;
      });

      // Remove the "mainvrdiv" class from the cloned div
      clonedDiv.classList.remove('mainvrdiv');

      // Remove the "Add More" button from the cloned div
      //   const clonedAddButton = clonedDiv.querySelector('.add_more_product_data');
      //   clonedAddButton.parentNode.removeChild(clonedAddButton);

      // Add the "Delete" button to the cloned div
      const clonedDeleteButton = document.createElement('button');
      clonedDeleteButton.type = 'button';
      clonedDeleteButton.className = 'deleteprobtn delete_product_data btn btn-danger';
      clonedDeleteButton.style.float = 'right';
      clonedDeleteButton.textContent = 'Delete';

      // Add event listener to the "Delete" button
      clonedDeleteButton.addEventListener('click', function() {
         deleteProductData(clonedDiv);
      });

      // Select the second wrapper div in the cloned div
      const clonedDivSecondWrapper = clonedDiv.querySelector('.wrappers:nth-child(2) .actiondiv');

      // Insert the "Delete" button before the "Add More" button in the second wrapper
      clonedDivSecondWrapper.insertBefore(clonedDeleteButton, clonedDivSecondWrapper.lastElementChild);

      var add_more_product_data = document.querySelector('.add_more_product_data');
      var variationImageclonedDiv = clonedDiv.querySelector('.variation_image');

      if (add_more_product_data) {
         var dataId = add_more_product_data.getAttribute('data-id');

         dataId = Number(dataId) + 1;
         add_more_product_data.setAttribute('data-id', dataId);
         variationImageclonedDiv.setAttribute('data-id', dataId);
         var variation_image_index = clonedDiv.querySelector('.variation_image_index');
         variation_image_index.setAttribute('value', dataId);
         var tmp = 'variation_image_' + dataId + '[]';
         variationImageclonedDiv.setAttribute('name', tmp);
         // Now, the dataId variable contains the value of the data-id attribute
         var var_display_img = clonedDiv.querySelector('.var_display_img');
         if (var_display_img) {
            var_display_img.remove();
         }
         console.log(dataId);
      }


      var variationElement = document.querySelector('.all_variation');
      var lastVariationElement = variationElement.lastElementChild;
      // Insert the cloned div after the original div
      //   originalDiv.parentNode.insertBefore(clonedDiv, originalDiv.nextSibling);
      lastVariationElement.parentNode.insertBefore(clonedDiv, lastVariationElement.nextSibling);
   }

   // Add event listener to the "Add More" button
   const addButton = document.querySelector('.add_more_product_data');
   addButton.addEventListener('click', addMoreProductData);

   // Get all delete buttons that exist by default
   const deleteButtons = document.querySelectorAll('.deleteprobtn');

   // Add event listener to each delete button
   deleteButtons.forEach(button => {
      button.addEventListener('click', function() {
         const div = button.closest('.mainvrdiv');
         deleteProductData(div);
      });
   });



   // when user click on remove button
   $(wrappers).on("click", ".remove_catagory_field", function(e) {
      e.preventDefault();
      $(this).parent('div').parent('div').remove(); //remove inout field
      console.log($(this).parent('div'));
      x--; //inout field decrement
   })
</script>