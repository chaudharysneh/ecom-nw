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
.wrap {
   width: 70%;
   min-width: 562px;
   margin: 60px auto 0;
   background: #fafafa;
   border-radius: 8px;
   box-shadow: 0 5px 8px 0 rgba(0,0,0,.4);
   padding: 10px;
}

.toolbar {
   width: 100%;
   margin: 0 auto 10px;
}

button {
   width: 30px;
   height: 30px;
   border-radius: 3px;
   background: none;
   border: none;
   box-sizing: border-box;
   padding: 0;
   font-size: 20px;
   color: #a6a6a6;
   cursor: pointer;
   outline: none;
}

button:hover {
   border: 1px solid #a6a6a6;
   color: #777;
}

#bold,
#italic,
#underline {
   font-size: 18px;
}

#underline,
#align-right {
   margin-right: 17px;
}

#align-left {
   margin-left: 17px;
}

select {
   height: 40px;
   font-size: 15px;
   font-weight: bold;
   color: #444;
   background: #fcfcfc;
   border: 1px solid #a6a6a6;
   border-radius: 3px;
   margin: 0;
   outline: none;
   cursor: pointer;
}

select > option {
   font-size: 15px;
   background: #fafafa;
}

#fonts {
   width: 140px;
}

.sp-replacer {
   background: #fcfcfc;
   padding: 1px 2px 1px 3px;
   border-radius: 3px;
   border-color: #a6a6a6;
   margin-top: -1px;
}

.sp-replacer:hover {
   border-color: #a6a6a6;
   color: inherit;
}

.sp-preview {
   width: 15px;
   height: 15px;
   border: none;
   margin-top: 2px;
   margin-right: 3px;
}

.sp-preview-inner, 
.sp-alpha-inner, 
.sp-thumb-inner {
   border-radius: 3px;
}

.editor {
   position: relative;
   width: 100%;
   height: 60vh;
   margin: 0 auto;
   padding: 20px;
   background: #fcfcfc;
   border-radius: 3px;
   box-shadow: inset 0 0 8px 1px rgba(0,0,0,.2);
   box-sizing: border-box;
   overflow: hidden;
   word-break: break-all;
   outline: none;
}
button#add_setting {
  float: right;
    background: #f7941d;
    color: white;
    padding: 3px 9px !important;
    border-radius: 5px;
    border-color: #fff;
    border: none;
    margin-top: 7px;
    margin-right: 10px;
    width: 100px;
}
.switch {
    position: relative;
    display: inline-block;
    width: 48px;
    height: 29px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
    position: absolute;
    content: "";
    height: 21px;
    width: 20px;
    left: 4px;
    bottom: 4.5px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(21px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
.dataTables_empty {
    text-align: center;
}

.custom-tabs {
        background-color: #f8f9fa; /* Light background for contrast */
        border-radius: 8px;
        /*border: 1px solid #dee2e6;*/
        border:none;
        overflow: hidden;
    }

    .custom-tabs .nav-item {
        flex: 1; /* Ensure equal width tabs */
    }

    .custom-tabs .nav-link {
        font-size: 1rem;
        padding: 5px 15px;
        transition: all 0.3s ease-in-out;
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px; /* Space between icon and text */
        border-radius: 0;
    }

    .custom-tabs .nav-link i {
        font-size: 1.25rem; /* Slightly larger icons */
    }

    .custom-tabs .nav-link:hover {
        color: #f7941d;
        background-color: #007bff; /* Bootstrap primary color */
    }

    .custom-tabs .nav-link.active {
        color: #f7941d  !important;
        /*background-color: #f7941d !important; */
        /*border: none;*/
        border-bottom: 1px solid #f7941d !important;
    }

    .custom-tabs .nav-link:not(.active):hover {
        color: #f7941d;
        background-color: #e9ecef; /* Light hover background */
    }

    .nav-tabs .nav-item .nav-link:focus {
        color: #fff;
    }
    
    .nav-tabs .nav-item .nav-link{
        border-left: 1px solid #fff !important;
        border-right: 1px solid #fff !important;
    }
    

/*.form-switch .form-check-input:focus {*/
/*    background-image: url('data:image/svg+xml,%3csvg xmlns="http://www.w3.org/2000/svg" viewBox="-4 -4 8 8"%3e%3ccircle r="3" fill="%23f7941d" /%3e%3c/svg%3e') !important;*/
/*}*/

    
</style>
    
            
<?= $this->include('templates/header') ?>  
          <!-- Content wrapper -->
          <div class="text-nowrap m-5">
            <div class="card">
              <div class="card-body p-0">
          		<span class="addprobtn2">Setting</span>
          		<a href="<?php echo base_url(); ?>all_email_smtp" class="addprobtn text-white">
                <div data-i18n="Support">Email SMTP</div>
              </a>
              </div>
             </div>
            
          <div class="content-wrapper">
                  
                
            <!-- Content -->

            <div class="flex-grow-1 container-p-y">
              <!--<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add</span> Tags</h4>-->
              <div class="row">
                <div class="col-md-12 tag-mar">
                  <div class="card mb-4">
                    <!--<h5 class="card-header">Default</h5>-->
                    <div class="card-body">
                        
                        <div class="container p-0">
                        <ul class="nav nav-tabs custom-tabs d-flex justify-content-around nav-fill" id="myTabs" role="tablist">
                            <li class="nav-item" style="outline: 1px solid #fff; border-bottom: 1px solid #ffffff;">
                                <a class="nav-link active" id="tab1-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">General Settings</a>
                            </li>
                            <li class="nav-item" style="outline: 1px solid #fff; border-bottom: 1px solid #ffffff;">
                                <a class="nav-link" id="tab2-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">Links</a>
                            </li>
                            <li class="nav-item" style="outline: 1px solid #fff; border-bottom: 1px solid #ffffff;">
                                <a class="nav-link" id="tab3-tab" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">Footer</a>
                            </li>
                        </ul>
                                
                                  <div class="tab-content" id="myTabsContent">
                                
                                    <div class="containtTab tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                                        <form id="add_setting_data">
                                            <input type="hidden" name="id" id="id" value="<?php echo $all_settings_data['ID']; ?>">
                                            <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
                                        
                                            <div class="row mb-3">
                                                <!-- Site Logo -->
                                                <div class="col-lg-6">
                                                    <label for="formFile" class="form-label">Site Logo</label>
                                                    <input class="form-control" type="file" id="formFile" name="logo_image">
                                                </div>
                                                <!-- Site Title -->
                                                <div class="col-lg-6">
                                                    <label for="title" class="form-label">Site Title</label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="title"
                                                        name="title"
                                                        placeholder="John Doe"
                                                        value="<?php echo $all_settings_data['Title']; ?>"
                                                        aria-describedby="defaultFormControlHelp"
                                                    />
                                                    <span id="title_err"></span>
                                                </div>
                                                <!-- Site Logo Preview -->
                                                <div class="col-lg-12 mt-3">
                                                    <?php 
                                                    if (!empty($all_settings_data['Logo'])) { ?>
                                                        <img src="<?php echo base_url().'public/upload_images/'. $all_settings_data['Logo'];?>" 
                                                            width="auto" height="70" style="object-fit: cover; border: 2px solid #dadada70; border-radius: 5%;">
                                                    <?php 
                                                    } else { ?>
                                                        <img src="<?php echo base_url().'public/upload_images/18.jpg'?>" 
                                                            width="auto" height="70" style="object-fit: cover; border: 2px solid #dadada70; border-radius: 5%;">
                                                    <?php 
                                                    } ?>
                                                </div>
                                            </div>
                                        
                                            <div class="row mb-3">
                                                <!-- Email -->
                                                <div class="col-lg-6">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="email"
                                                        name="email"
                                                        value="<?php echo $all_settings_data['Email']; ?>"
                                                        placeholder=""
                                                        aria-describedby="defaultFormControlHelp"
                                                    />
                                                    <span id="email_err"></span>
                                                </div>
                                                <!-- Phone -->
                                                <div class="col-lg-6">
                                                    <label for="phone" class="form-label">Phone</label>
                                                    <input
                                                        type="number"
                                                        class="form-control"
                                                        name="phone"
                                                        id="phone"
                                                        value="<?php echo $all_settings_data['Phone']; ?>"
                                                        placeholder=""
                                                        aria-describedby="defaultFormControlHelp"
                                                    />
                                                    <span id="phone_err"></span>
                                                </div>
                                            </div>
                                        
                                            <div class="row mb-3">
                                                <!-- Currency -->
                                                <div class="col-lg-6">
                                                    <label for="currency" class="form-label">Currency</label>
                                                    <select class="form-control" id="currency" name="currency">
                                                        <option value="">Select Currency</option>
                                                        <option value="$" <?php echo (isset($all_settings_data['currency']) && $all_settings_data['currency'] == '$') ? 'selected' : ''; ?>> $ - US Dollar</option>
                                                        <option value="€" <?php echo (isset($all_settings_data['currency']) && $all_settings_data['currency'] == '€') ? 'selected' : ''; ?>> € - Euro</option>
                                                        <option value="£" <?php echo (isset($all_settings_data['currency']) && $all_settings_data['currency'] == '£') ? 'selected' : ''; ?>> £ - British Pound Sterling</option>
                                                        <option value="¥" <?php echo (isset($all_settings_data['currency']) && $all_settings_data['currency'] == '¥') ? 'selected' : ''; ?>> ¥ - Japanese Yen</option>
                                                        <option value="Fr" <?php echo (isset($all_settings_data['currency']) && $all_settings_data['currency'] == 'Fr') ? 'selected' : ''; ?>> Fr - Swiss Franc</option>
                                                        <option value="C$" <?php echo (isset($all_settings_data['currency']) && $all_settings_data['currency'] == 'C$') ? 'selected' : ''; ?>> C$ - Canadian Dollar</option>
                                                        <option value="A$" <?php echo (isset($all_settings_data['currency']) && $all_settings_data['currency'] == 'A$') ? 'selected' : ''; ?>> A$ - Australian Dollar</option>
                                                        <option value="₹" <?php echo (isset($all_settings_data['currency']) && $all_settings_data['currency'] == '₹') ? 'selected' : ''; ?>> ₹ - Indian Rupee</option>
                                                        <option value="₩" <?php echo (isset($all_settings_data['currency']) && $all_settings_data['currency'] == '₩') ? 'selected' : ''; ?>> ₩ - South Korean Won</option>
                                                        <option value="₽" <?php echo (isset($all_settings_data['currency']) && $all_settings_data['currency'] == '₽') ? 'selected' : ''; ?>> ₽ - Russian Ruble</option>
                                                        <option value="R$" <?php echo (isset($all_settings_data['currency']) && $all_settings_data['currency'] == 'R$') ? 'selected' : ''; ?>> R$ - Brazilian Real</option>
                                                        <option value="R" <?php echo (isset($all_settings_data['currency']) && $all_settings_data['currency'] == 'R') ? 'selected' : ''; ?>> R - South African Rand</option>
                                                        <option value="S$" <?php echo (isset($all_settings_data['currency']) && $all_settings_data['currency'] == 'S$') ? 'selected' : ''; ?>> S$ - Singapore Dollar</option>
                                                    </select>
                                                    <span id="currency_err" style="color: red;"></span>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="google_analytics" class="form-label">Google Analytics (Tracking Code)</label>
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="google_analytics"
                                                        name="google_analytics"
                                                        placeholder="UA-12345678-1"
                                                        value="<?php echo $all_settings_data['google_analytics']; ?>"
                                                        aria-describedby="defaultFormControlHelp"
                                                    />
                                                    <!--<span id="analytics_err"></span>-->
                                                </div>
                                            </div>
                                        
                                            <div class="row mb-3">
                                                <!-- Address -->
                                                <div class="col-lg-6">
                                                    <label for="address" class="form-label">Address</label>
                                                    <textarea id="address" class="form-control" name="address" rows="3" aria-describedby="defaultFormControlHelp"><?=$all_settings_data['Address'];?></textarea>
                                                    <span id="address_err"></span>
                                                </div>
                                                <!-- Description -->
                                                <div class="col-lg-6">
                                                    <label for="description" class="form-label">Description</label>
                                                    <textarea id="description" class="form-control" name="description" rows="3" aria-describedby="defaultFormControlHelp"><?=$all_settings_data['Description'];?></textarea>
                                                    <span id="description_err"></span>
                                                </div>
                                            </div>
                                        
                                            <div class="card-body p-2 mb-3" style="float: right;">
                                                <button type="button" class="addprobtn" id="add_setting">Save</button>
                                            </div>
                                            <p id="msg"></p>
                                        </form>
                                    </div>
                    
                                    <div class="containtTab tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                                        <form id="add_link_setting_data">
                                            <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>">
                                            <input type="hidden" name="sett_id" id="sett_id" value="<?php echo $all_settings_data['ID']; ?>">
                                        
                                            <?php
                                            $data = $all_settings_data['Links'];
                                            $dt = json_decode($data);
                                        
                                            $intagram = $dt->insta;
                                            $facebook = $dt->facebook;
                                            $twitter = $dt->twitter;
                                            $checkout = $dt->checkout;
                                        
                                            $intagram_data = json_decode($intagram);
                                            $facebook_data = json_decode($facebook);
                                            $twitter_data = json_decode($twitter);
                                            $checkout_data = json_decode($checkout);
                                            ?>
                                        
                                            <div class="container">
                                                <div class="row">
                                                    <!-- Instagram -->
                                                    <div class="col-lg-6">
                                                        <div class="border-4 card checkout-form mb-4 p-3">
                                                            <label><strong>Instagram</strong></label>
                                                            <div>
                                                                <label class="switch">
                                                                    <input type="checkbox" class="instagram_switch payment_enabled" insta_status="<?= isset($intagram_data->status) && $intagram_data->status == 1 ? 'checked' : '' ?>" data-id='1' <?= isset($intagram_data->status) && $intagram_data->status == 1 ? 'checked' : '' ?>>
                                                                    <span class="slider round"></span>
                                                                </label>
                                                                <div class="mt-3">
                                                                    <label>Link</label>
                                                                    <input type="url" class="form-control" name="insta_name" value='<?= isset($intagram_data->link) ? $intagram_data->link : "" ?>'>
                                                                    <p class="text-danger insta_name_error"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                        
                                                    <!-- Facebook -->
                                                    <div class="col-lg-6">
                                                        <div class="border-4 card checkout-form mb-4 p-3">
                                                            <label><strong>Facebook</strong></label>
                                                            <div>
                                                                <label class="switch">
                                                                    <input type="checkbox" class="facebook_switch payment_enabled" fb_status="<?= isset($facebook_data->status) && $facebook_data->status == 1 ? 'checked' : '' ?>" data-id='2' <?= isset($facebook_data->status) && $facebook_data->status == 1 ? 'checked' : '' ?>>
                                                                    <span class="slider round"></span>
                                                                </label>
                                                                <div class="mt-3">
                                                                    <label>Link</label>
                                                                    <input type="url" class="form-control" id="facebook_name" name="facebook_name" value='<?= isset($facebook_data->link) ? $facebook_data->link : "" ?>'>
                                                                    <p class="text-danger facebook_name_error"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        
                                                <div class="row">
                                                    <!-- Twitter -->
                                                    <div class="col-lg-6">
                                                        <div class="border-4 card checkout-form mb-4 p-3">
                                                            <label><strong>Twitter</strong></label>
                                                            <div>
                                                                <label class="switch">
                                                                    <input type="checkbox" class="twitter_switch payment_enabled" twitter_status="<?= isset($twitter_data->status) && $twitter_data->status == 1 ? 'checked' : '' ?>" data-id='3' <?= isset($twitter_data->status) && $twitter_data->status == 1 ? 'checked' : '' ?>>
                                                                    <span class="slider round"></span>
                                                                </label>
                                                                <div class="mt-3">
                                                                    <label>Link</label>
                                                                    <input type="url" class="form-control" id="twitter_name" name="twitter_name" value='<?= isset($twitter_data->link) ? $twitter_data->link : "" ?>'>
                                                                    <p class="text-danger twitter_name_error"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                        
                                                    <!-- Checkout -->
                                                    <div class="col-lg-6">
                                                        <div class="border-4 card checkout-form mb-4 p-3">
                                                            <label><strong>Checkout</strong></label>
                                                            <div>
                                                                <label class="switch">
                                                                    <input type="checkbox" class="checkout_switch payment_enabled" checkout_status="<?= isset($checkout_data->status) && $checkout_data->status == 1 ? 'checked' : '' ?>" data-id='4' <?= isset($checkout_data->status) && $checkout_data->status == 1 ? 'checked' : '' ?>>
                                                                    <span class="slider round"></span>
                                                                </label>
                                                                <div class="mt-3">
                                                                    <label>Link</label>
                                                                    <input type="url" class="form-control" id="checkout_name" name="checkout_name" value='<?= isset($checkout_data->link) ? $checkout_data->link : "" ?>'>
                                                                    <p class="text-danger checkout_name_error"></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        
                                                <!-- Save Button -->
                                                <div class="text-end">
                                                    <button type="button" class="btn btn-primary" id="add_link_setting" style="width: 80px; height: 40px;">Save</button>
                                                </div>
                                                <p id="msg2"></p>
                                            </div>
                                        </form>
                                    </div>
                                    
                                    <div class="containtTab tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                                        <div class="card mt-3">
                                    		<div class='card-body'>
                                    				<table class="table mb-3 mt-3" id="example">
                                                        <thead>
                                            <tr>
                                              <th class="text-center">Sr. No</th>
                                              <th class="table_product_img_th">Title</th>
                                              <th style="width: 58%;">URL</th>
                                              <th style="width: 58%;">Status</th>
                                              <th class="text-center">Actions</th>
                                            </tr>
                                          </thead>
                                                        <tbody class="table-border-bottom-0">
                                                        <?php
                                                          $i=1;
                                                            foreach($all_cms_data as $single_cms_data)
                                                            {
                                                            //     echo "<pre>";
                                                            //   print_r($single_cms_data);
                                                          ?>
                                                        <tr>
                                                          <td scope="row" class="text-center"><?php echo $i; ?></td>
                                                          <td><?php echo $single_cms_data['CmsTitle'];?></td>
                                                          <td><?php echo $single_cms_data['CmsUrl'];?></td>
                                                           <td class="text-center">
                                                                <div class="form-check form-switch">
                                                                    <input class="form-check-input toggle-status" 
                                                                           type="checkbox" 
                                                                           id="statusToggle<?php echo $single_cms_data['CmsID']; ?>" 
                                                                           data-id="<?php echo $single_cms_data['CmsID']; ?>" 
                                                                           <?php echo $single_cms_data['status'] == 1 ? 'checked' : ''; ?>>
                                                                    
                                                                </div>
                                                            </td>
                                                          <td class="text-center">
                                                          <div class="dropdown">
                                                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
                                                  <div class="dropdown-menu" style="">
                                                      <a class="dropdown-item" href="<?php echo base_url(); ?>view_cms/<?= $single_cms_data['CmsID'] ?>"><i class="fa fa-eye me-1 me-1"></i> View</a>
                                                    <a class="dropdown-item" href="<?php echo base_url(); ?>edit_cms/<?= $single_cms_data['CmsID'] ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                                    <!-- <a class="dropdown-item del_cms_data" href="javascript:void(0);" data-id="<//?= $single_cms_data['CmsID'] ?>"> <i class="bx bx-trash me-1"></i> Delete</a> -->
                                                  </div>
                                                </div>
                                              </td>
                                                        </tr>
                                                        <?php
                                                            $i++;
                                                            }
                                                            ?>
                                            </tbody>
                                        </table>
  </div>
                                    	</div>
                                    </div>
         </div>
         </div>
         </div>
         </div>
         </div>
         </div>
         </div>
         </div>
         </div>
         
         <script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".toggle-status").forEach(function (toggle) {
            toggle.addEventListener("change", function () {
                let cmsID = this.getAttribute("data-id");
                let newStatus = this.checked ? 1 : 0;

                // Make AJAX call to update status
                fetch("<?php echo base_url(); ?>update_cms_status", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({ CmsID: cmsID, CmsStatus: newStatus }),
                })
                    .then((response) => response.json())
                    .then((data) => {
                        if (data.success) {
                            alert("Status updated successfully!");
                        } else {
                            alert("Failed to update status. Please try again.");
                        }
                    })
                    .catch((error) => console.error("Error:", error));
            });
        });
    });
</script>
         
         
            <!-- / Content -->

            <?= $this->include('templates/footer') ?>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  $(document).on('click','.payment_enabled',function(){
            var data_id = $(this).attr('data-id');
            
            
            var insta_status = $('.instagram_switch').attr('insta_status');
            var fb_status = $('.facebook_switch').attr('fb_status');
            var twitter_status = $('.twitter_switch').attr('twitter_status');
            var checkout_status = $('.checkout_switch').attr('checkout_status');
            
            var base_url = $('#base_url').val();
        //     var insta_name = $('#insta_name').val();
        //  var facebook_name = $('#facebook_name').val();
        //  var twitter_name = $('#twitter_name').val();
        //  var checkout_name = $('#checkout_name').val();
         
            
             var sett_id = $('#sett_id').val();
            // alert(data_id);
            var status = 0;
            if ($(this).is(':checked')) {
                status = 1;
            }
            data = {
                sett_id:sett_id,
                id:data_id,
                status:status,
                insta_status:insta_status,
                fb_status : fb_status,
                twitter_status: twitter_status,
                checkout_status: checkout_status,
                // insta_name : insta_name,
                // facebook_name : facebook_name,
                // twitter_name : twitter_name,
                // checkout_name : checkout_name,
                
                
                
                
            };
            
            $.ajax({
              type: 'POST', // or 'GET' depending on your needs
              url: base_url + 'update_setting_data', // Replace with the URL of your server-side script
              data: data,
              success: function(response) {
                // Handle the response from the server
                // $('#result').html(response);
                console.log(data);
                if (response == 1) {
          $('#msg2').addClass('text-success')
          $('#msg2').html('Setting Updated Successfully!')
          $('#msg2').removeClass('text-danger')
          setTimeout(function () {
            window.location.reload();
          }, 2000);
        }

              },
              error: function(jqXHR, textStatus, errorThrown) {
                // Handle errors here
                console.log(textStatus, errorThrown);
              }
            });
            
            // console.log(status);
      })
//   $(document).on('click','#add_setting_data',function(){
   
//          var insta_name = $('#insta_name').val();
//          var facebook_name = $('#facebook_name').val();
//          var twitter_name = $('#twitter_name').val();
//          var checkout_name = $('#checkout_name').val();
//          var base_url = $('#base_url').val();
         
//         //  var insta_status = $('.instagram_switch').attr('insta_status');
//         //     var fb_status = $('.facebook_switch').attr('fb_status');
//         //     var twitter_status = $('.twitter_switch').attr('twitter_status');
//         //     var checkout_status = $('.checkout_switch').attr('checkout_status');
//         let flag = 1;
//          $(".facebook_name_error").html("");
//           $(".insta_name_error").html("");
//           $(".checkout_name_error").html("");
//             $(".twitter_name_error").html("");
         
         
         
//          var urlRegex = /^(http:\/\/|https:\/\/)/;

//         if (urlRegex.test(facebook_name) && (urlRegex.test(insta_name)) && (urlRegex.test(checkout_name)) && (urlRegex.test(twitter_name))  ) {
//             // alert('Valid URL');
//             // Further actions if the URL is valid
//         } else {
//              alert('URL should start with http:// or https://');
//         flag = 0;
            
//             // Additional actions if the URL is invalid
//         }
        
    
        
  
//     // return false;
//     if (flag === 1) {
        
         
//      let myform = document.getElementById("add_link_setting_data");
//     let fd = new FormData(myform );
    
//           $.ajax({
//               type: 'POST', // or 'GET' depending on your needs
//               url:  base_url + 'update_link_setting_data', // Replace with the URL of your server-side script
//               data: fd,
//               processData: false,
//               contentType: false,
//               success: function(response) {
//                 // Handle the response from the server
//                 // $('#result').html(response);
//                 // console.log(response);
//                  if (response == 1) {
//           $('#msg2').addClass('text-success')
//           $('#msg2').html('Setting Updated Successfully!')
//           $('#msg2').removeClass('text-danger')
//           setTimeout(function () {
//             window.location.reload();
//           }, 2000);
//         }
//               },
//               error: function(jqXHR, textStatus, errorThrown) {
//                 // Handle errors here
//                 console.log(textStatus, errorThrown);
//               }
//             });
//     }
//       else{
//           return false;
           
//       }
       
       
       
//   })

// $(document).on('click', '#add_setting_data', function () {
//     var insta_name = $('#insta_name').val();
//     var facebook_name = $('#facebook_name').val();
//     var twitter_name = $('#twitter_name').val();
//     var checkout_name = $('#checkout_name').val();
//     var base_url = $('#base_url').val();

//     let flag = 1;

//     $(".facebook_name_error, .insta_name_error, .checkout_name_error, .twitter_name_error").html("");

//     var urlRegex = /^(http:\/\/|https:\/\/)/;

//     if (!urlRegex.test(facebook_name) || !urlRegex.test(insta_name) || !urlRegex.test(checkout_name) || !urlRegex.test(twitter_name)) {
//         alert('URL should start with http:// or https://');
//         flag = 0;
//     }

//     if (insta_name === "" || facebook_name === "" || checkout_name === "" || twitter_name === "") {
//         alert('All fields are required.');
//         flag = 0;
//     }

//     if (flag === 1) {
//         let myform = document.getElementById("add_link_setting_data");
//         let fd = new FormData(myform);

//         $.ajax({
//             type: 'POST',
//             url: base_url + 'update_link_setting_data',
//             data: fd,
//             processData: false,
//             contentType: false,
//             success: function (response) {
//                 if (response == 1) {
//                     $('#msg2').addClass('text-success').html('Setting Updated Successfully!');
//                     $('#msg2').removeClass('text-danger');
//                     setTimeout(function () {
//                         window.location.reload();
//                     }, 2000);
//                 }
//             },
//             error: function (jqXHR, textStatus, errorThrown) {
//                 console.log(textStatus, errorThrown);
//                 alert('An error occurred while processing your request.');
//             }
//         });
//     } else {
//         return false;
//     }
// });
// $(document).on('click', '#add_setting_data', function () {
//     var insta_name = $('#insta_name').val();
//     var facebook_name = $('#facebook_name').val();
//     var twitter_name = $('#twitter_name').val();
//     var checkout_name = $('#checkout_name').val();
//     var base_url = $('#base_url').val();
//     var urlRegex = /^(http:\/\/|https:\/\/)/;

//     let flag = 0;

//     // $(".facebook_name_error, .insta_name_error, .checkout_name_error, .twitter_name_error").html("");

//     if (!urlRegex.test(insta_name) && insta_name !== "") 
//       {
//         $('.insta_name_error').text('Instagram URL should start with http:// or https://').addClass("text-danger");
//         flag=1;
//       }        

// if (urlRegex.test(facebook_name) && facebook_name !== "") 
//       {
//         $('.insta_name_error').text('');
//       }
      

//     // if (!urlRegex.test(facebook_name) && facebook_name !== "") {
//     //     alert('Facebook URL should start with http:// or https://');
//     //     flag = 0;
//     // }

//     // if (!urlRegex.test(insta_name) && insta_name !== "") {
//     //     alert('Instagram URL should start with http:// or https://');
//     //     flag = 0;
//     // }

//     // if (!urlRegex.test(checkout_name) && checkout_name !== "") {
//     //     alert('Checkout URL should start with http:// or https://');
//     //     flag = 0;
//     // }

//     // if (!urlRegex.test(twitter_name) && twitter_name !== "") {
//     //     alert('Twitter URL should start with http:// or https://');
//     //     flag = 0;
//     // }

   

//       if(flag==0){  
//         let myform = document.getElementById("add_link_setting_data");
//         let fd = new FormData(myform);

//         $.ajax({
//             type: 'POST',
//             url: base_url + 'update_link_setting_data',
//             data: fd,
//             processData: false,
//             contentType: false,
//             success: function (response) {
//                 if (response == 1) {
//                     $('#msg2').addClass('text-success').html('Setting Updated Successfully!');
//                     $('#msg2').removeClass('text-danger');
//                     setTimeout(function () {
//                         window.location.reload();
//                     }, 2000);
//                 }
//             },
//             error: function (jqXHR, textStatus, errorThrown) {
//                 console.log(textStatus, errorThrown);
//                 alert('An error occurred while processing your request.');
//             }
//         });
//     } 
//     // else {
//     //     return false;
//     // }
// });

$(document).on('click', '#add_link_setting', function () {
    var insta_name = $('#insta_name').val();
    var facebook_name = $('#facebook_name').val();
    var twitter_name = $('#twitter_name').val();
    var checkout_name = $('#checkout_name').val();
    var base_url = $('#base_url').val();
    var urlRegex = /^(http:\/\/|https:\/\/)/;
    let flag = 1;

    // // Check if any of the URLs start with "https://"
    // if (!urlRegex.test(insta_name) && insta_name !== "") {
    //     $('.insta_name_error').text('Instagram URL should start with http:// or https://').addClass("text-danger");
    //     flag = 0;
    // }

    // if (!urlRegex.test(facebook_name) && facebook_name !== "") {
    //     // Do not display an error if the flag is already set to 0
    //     if (flag === 1) {
    //         $('.insta_name_error').text('Facebook URL should start with http:// or https://').addClass("text-danger");
    //         flag = 0;
    //     }
    // }

    // Repeat similar checks for twitter_name and checkout_name

    if (flag === 1) {
        // All URLs are valid, proceed with the AJAX request
        let myform = document.getElementById("add_link_setting_data");
        let fd = new FormData(myform);

        $.ajax({
            type: 'POST',
            url: base_url + 'update_link_setting_data',
            data: fd,
            processData: false,
            contentType: false,
            success: function (response) {
                if (response == 1) {
                    $('#msg2').addClass('text-success').html('Setting Updated Successfully!');
                    $('#msg2').removeClass('text-danger');
                    setTimeout(function () {
                        window.location.reload();
                    }, 2000);
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
                alert('An error occurred while processing your request.');
            }
        });
    } else {
        // At least one URL is invalid, prevent the form submission
        return false;
    }
});

   
//   $(document).on('click', '#add_setting_data', function () {
//     var insta_name = $('#insta_name').val();
//     var facebook_name = $('#facebook_name').val();
//     var twitter_name = $('#twitter_name').val();
//     var checkout_name = $('#checkout_name').val();

//     // Function to validate URLs
//     function isValidUrl(url) {
//         var urlRegex = /^(https?:\/\/)/;
//         return urlRegex.test(url);
//     }

//     // Check if each input field contains a valid URL
//     if (!isValidUrl(insta_name)) {
//         alert('Invalid URL for Insta');
//         return;
//     }

//     if (!isValidUrl(facebook_name)) {
//         alert('Invalid URL for Facebook');
//         return;
//     }

//     if (!isValidUrl(twitter_name)) {
//         alert('Invalid URL for Twitter');
//         return;
//     }

//     if (!isValidUrl(checkout_name)) {
//         alert('Invalid URL for Checkout');
//         return;
//     }

//     // If all URLs are valid, proceed with the AJAX request
//     let myform = document.getElementById("add_link_setting_data");
//     let fd = new FormData(myform);

//     $.ajax({
//         type: 'POST',
//         url: 'update_link_setting_data',
//         data: fd,
//         processData: false,
//         contentType: false,
//         dataType: 'json',  // Specify the expected data type
//         success: function (response) {
//             // Handle the response from the server
//             if (response == 1) {
//                 $('#msg2').addClass('text-success');
//                 $('#msg2').html('Setting Updated Successfully!');
//                 $('#msg2').removeClass('text-danger');
//                 setTimeout(function () {
//                     window.location.reload();
//                 }, 2000);
//             } else {
//                 // Handle other cases if needed
//             }
//         },
//         error: function (jqXHR, textStatus, errorThrown) {
//             // Handle errors here
//             console.log(textStatus, errorThrown);
//         }
//     });
// });

const currencies = [
    { code: "USD", symbol: "$", name: "US Dollar" },
    { code: "EUR", symbol: "€", name: "Euro" },
    { code: "GBP", symbol: "£", name: "British Pound Sterling" },
    { code: "JPY", symbol: "¥", name: "Japanese Yen" },
    { code: "CHF", symbol: "Fr", name: "Swiss Franc" },
    { code: "CAD", symbol: "C$", name: "Canadian Dollar" },
    { code: "AUD", symbol: "A$", name: "Australian Dollar" },
    { code: "INR", symbol: "₹", name: "Indian Rupee" },
    { code: "KRW", symbol: "₩", name: "South Korean Won" },
    { code: "RUB", symbol: "₽", name: "Russian Ruble" },
    { code: "BRL", symbol: "R$", name: "Brazilian Real" },
    { code: "ZAR", symbol: "R", name: "South African Rand" },
    { code: "SAR", symbol: "﷼", name: "Saudi Riyal" },
    { code: "SGD", symbol: "S$", name: "Singapore Dollar" },
    { code: "CNY", symbol: "¥", name: "Chinese Yuan" },
    { code: "MXN", symbol: "$", name: "Mexican Peso" },
    { code: "NZD", symbol: "NZ$", name: "New Zealand Dollar" },
    { code: "SEK", symbol: "kr", name: "Swedish Krona" },
    { code: "NOK", symbol: "kr", name: "Norwegian Krone" },
    { code: "DKK", symbol: "kr", name: "Danish Krone" },
    { code: "PLN", symbol: "zł", name: "Polish Zloty" },
    { code: "TRY", symbol: "₺", name: "Turkish Lira" },
    { code: "THB", symbol: "฿", name: "Thai Baht" },
    { code: "PHP", symbol: "₱", name: "Philippine Peso" },
    { code: "MYR", symbol: "RM", name: "Malaysian Ringgit" },
    { code: "IDR", symbol: "Rp", name: "Indonesian Rupiah" },
    { code: "HKD", symbol: "HK$", name: "Hong Kong Dollar" }
];

// const currencyDropdown = document.getElementById('currency');
// currencies.forEach(currency => {
//     const option = document.createElement('option');
//     option.value = currency.symbol;
//     option.textContent = `${currency.symbol} - ${currency.name}`;
//     currencyDropdown.appendChild(option);
// });

// currencyDropdown.addEventListener('change', function () {
//     const selectedValue = this.value;
//     const errorSpan = document.getElementById('currency_err');

//     errorSpan.textContent = '';

//     if (selectedValue === '') {
//         errorSpan.textContent = 'Please select a valid currency.';
//     } else {
//         console.log('Selected Currency:', selectedValue); // Debugging
//     }
// });
</script>