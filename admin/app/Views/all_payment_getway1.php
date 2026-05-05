<?= $this->include('templates/header') ?>



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

/* Custom tab styles */
        .nav-tabs .nav-item.show .nav-link {
            border: none;
            border-bottom: 2px solid #007bff;
            border-radius: 0;
            color: #007bff;
        }

        .nav-tabs .nav-link {
            border: none;
            border-bottom: 2px solid transparent;
            border-radius: 0;
            color: #333;
        }
        
        .nav-tabs .nav-link.active {
            border-bottom: solid;
            border-bottom-color: #f7941d !important;
            border-width:1px;
        }

.custom-tabs {
    background-color: #f8f9fa; /* Light background for contrast */
    border-radius: 8px;
    /*border: 1px solid #dee2e6;*/
    border: none;
    overflow: hidden;
}

.custom-tabs .nav-item {
    flex: 1; /* Ensure equal width tabs */
}

.custom-tabs .nav-link {
    /* color: #24385c; */
    font-size: 1rem;
    /* font-weight: bold; */
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
    color: #f7941d !important;
    background-color: #ffffff !important;
    /*border: 1px solid #fff;*/
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
</style>          
          
          <!-- Content wrapper -->
          <div class="text-nowrap m-5">
            <div class="card">
              <div class="card-body p-0">
          		<span class="addprobtn2">All Payment Methods</span>
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
    <li class="nav-item" style=" border-bottom: 1px solid white; ">
        <a class="nav-link active" id="tab1-tab" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">
            <i class="fas fa-money-bill-wave"></i> Cash On Delivery
        </a>
    </li>
    <li class="nav-item" style=" border-bottom: 1px solid white; ">
        <a class="nav-link" id="tab2-tab" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="false">
            <i class="fas fa-university"></i> Bank Transfer
        </a>
    </li>
    <li class="nav-item" style=" border-bottom: 1px solid white; ">
        <a class="nav-link" id="tab3-tab" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="false">
            <i class="fab fa-paypal"></i> Paypal
        </a>
    </li>
    <li class="nav-item" style=" border-bottom: 1px solid white; ">
        <a class="nav-link" id="tab4-tab" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="false">
            <i class="fab fa-cc-stripe"></i> Stripe
        </a>
    </li>
    <li class="nav-item" style=" border-bottom: 1px solid white; ">
        <a class="nav-link" id="tab5-tab" data-toggle="tab" href="#tab5" role="tab" aria-controls="tab5" aria-selected="false">
            <i class="fas fa-credit-card"></i> Razorpay
        </a>
    </li>
</ul>

                            <div class="tab-content" id="myTabsContent">
                                
                                
                                <div class="containtTab tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                                    <div>
                                        <label calss="mr-1"><strong>Enable/Disable</strong></label>
                                        <div>
                                            <label class="switch">
                                              <input type="checkbox" class="payment_enabled" data-id='1' <?=isset($Paymentgateway[0]['status']) && $Paymentgateway[0]['status'] == 1 ?'checked':''?> >
                                              <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                <div class="containtTab tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
                                    <div>
                                        <label calss="mr-1"><strong>Enable/Disable</strong></label>
                                        <div>
                                            <label class="switch">
                                              <input type="checkbox" class="payment_enabled" data-id='2' <?=isset($Paymentgateway[1]['status']) && $Paymentgateway[1]['status'] == 1 ?'checked':''?> >
                                              <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <form id="bank_transfer_form">
                                        
                                    <?php 
                                        if(isset($Paymentgateway[1]['details'])){
                                            $details = json_decode($Paymentgateway[1]['details']);
                                            $name= isset($details->name)?$details->name:'';
                                            $bank_name= isset($details->bank_name)?$details->bank_name:'';
                                            $account_no= isset($details->account_no)?$details->account_no:'';
                                            $IFSC_no= isset($details->IFSC_no)?$details->IFSC_no:'';
                                            
                                        }
                                    ?>
                                        <input type="hidden" name='type' class='type' value="2">
                                    <div class="mt-3">
                                        <div class="d-flex">
                                            <div class="me-3 w-100">
                                                <label>Recipient full name</label>
                                                <input type="text" class="form-control" name="name" value='<?=isset($name)?$name:""?>' required>
                                            </div>
                                            <div class="w-100">
                                                <label>Select Bank</label>
                                                <select class="form-control" name="bank_name" required>
                                                    <option value="BOB">BOB</option>
                                                    <option value="SBI">SBI</option>
                                                    <option value="ICICI">ICICI</option>
                                                    <option value="kotak">BOB</option>
                                                    <option value="HDFC">HDFC</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <div class="d-flex mt-3">
                                            <div class="w-100 me-3">
                                                <label>Bank Account No.</label>
                                                <input type="text" class="form-control" name="account_no" value='<?=isset($account_no)?$account_no:""?>' required>
                                            </div>
                                            <div class="w-100">
                                                <label>Bank IFSC No.</label>
                                                <input type="text" class="form-control" name="IFSC_no" value='<?=isset($IFSC_no)?$IFSC_no:""?>' required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3"><button type="button" class="addprobtn payment_getway_btn btn">Submit</button></div>
                                    </form>
                                </div>
                                
                                
                                
                                <div class="containtTab tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
                                    <div>
                                        <label calss="mr-1"><strong>Enable/Disable</strong></label>
                                        <div>
                                            <label class="switch">
                                              <input type="checkbox" class="payment_enabled" data-id='3' <?=isset($Paymentgateway[2]['status']) && $Paymentgateway[2]['status'] == 1 ?'checked':''?> >
                                              <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <form id="paypal_form">
                                        <?php 
                                        if(isset($Paymentgateway[2]['details'])){
                                            $details = json_decode($Paymentgateway[2]['details']); 
                                            $clientID= isset($details->clientID)?$details->clientID:'';
                                            $secret_key= isset($details->secret_key)?$details->secret_key:'';
                                            $merchant_email = isset($details->merchant_email)?$details->merchant_email:'';
                                            $live_sts = isset($details->live_sts)?$details->live_sts:'';
                                        }
                                    ?>
                                        <input type="hidden" name='type' class='type' value="3">
                                    <div class="mt-3">
                                        <div class="w-100 me-3">
                                            <label>Client ID</label>
                                            <input type="text" class="form-control" name="clientID"  value='<?=isset($clientID)?$clientID:""?>'  required>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-3">
                                        <div class="w-100 me-3">
                                            <label>Secret Key</label>
                                            <input type="text" class="form-control" name="secret_key" value='<?=isset($secret_key)?$secret_key:""?>'  required>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-3">
                                        <div class="w-100 me-3">
                                            <label>Merchant Email</label>
                                            <input type="email" class="form-control" name="merchant_email" value='<?=isset($merchant_email)?$merchant_email:""?>'  required>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <label calss="mr-1"><strong>Sandbox/Live</strong></label>
                                        <div>
                                            <label class="switch">
                                              <input class="live_sts" type="checkbox" id="live_sts" name="live_sts" data-id="3"<?php if(isset($live_sts) && $live_sts == 1){echo "checked";}?> >
                                              <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-3"><button type="button" class="addprobtn payment_getway_btn btn">Submit</button></div>
                                    </form>
                                </div>
                                
                                
                                
                                <div class="containtTab tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab3-tab">
                                    <div>
                                        <label calss="mr-1"><strong>Enable/Disable</strong></label>
                                        <div>
                                            <label class="switch">
                                              <input type="checkbox" class="payment_enabled" data-id='4' <?=isset($Paymentgateway[3]['status']) && $Paymentgateway[3]['status'] == 1 ?'checked':''?> >
                                              <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <form id="stripe_form">
                                        <?php 
                                        if(isset($Paymentgateway[3]['details'])){
                                            $details = json_decode($Paymentgateway[3]['details']);
                                            $public_key= isset($details->public_key)?$details->public_key:'';
                                            $secret_key= isset($details->secret_key)?$details->secret_key:'';
                                            
                                        }
                                    ?>
                                        <input type="hidden" name='type' class='type' value="4">
                                    <div class="mt-3">
                                        <div class="w-100 me-3">
                                            <label>Publishable key</label>
                                            <input type="text" class="form-control" name="public_key" value='<?=isset($public_key)?$public_key:""?>' required>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-3">
                                        <div class="w-100 me-3">
                                            <label>Secret key</label>
                                            <input type="text" class="form-control" name="secret_key" value='<?=isset($secret_key)?$secret_key:""?>' required>
                                        </div>
                                    </div>
                                    <div class="mt-3"><button type="button" class="addprobtn payment_getway_btn btn">Submit</button></div>
                                    </form>
                                </div>
                                
                                
                                
                                <div class="containtTab tab-pane fade" id="tab5" role="tabpanel" aria-labelledby="tab3-tab">
                                    <div>
                                        <label calss="mr-1"><strong>Enable/Disable</strong></label>
                                        <div>
                                            <label class="switch">
                                              <input type="checkbox" class="payment_enabled" data-id='5' <?=isset($Paymentgateway[4]['status']) && $Paymentgateway[4]['status'] == 1 ?'checked':''?> >
                                              <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <form id="razorpay_form">
                                        <?php 
                                        if(isset($Paymentgateway[3]['details'])){
                                            $details = json_decode($Paymentgateway[4]['details']);
                                            $keyId= isset($details->keyId)?$details->keyId:'';
                                            $key_secret= isset($details->key_secret)?$details->key_secret:'';
                                            
                                        }
                                    ?>
                                        <input type="hidden" name='type' class='type' value="5">
                                    <div class="mt-3">
                                        <div class="w-100 me-3">
                                            <label>Key Id</label>
                                            <input type="text" class="form-control" name="keyId" value='<?=isset($keyId)?$keyId:""?>' required>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-3">
                                        <div class="w-100 me-3">
                                            <label>Key Secret</label>
                                            <input type="text" class="form-control" name="key_secret" value='<?=isset($key_secret)?$key_secret:""?>' required>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-3"><button type="button" class="addprobtn payment_getway_btn btn">Submit</button></div>
                                    </form>
                                    
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
          
         
            <!-- / Content -->

            <?= $this->include('templates/footer') ?>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    
   $(document).on('click','.payment_getway_btn',function(){
       $('.error-msg').remove();
       var form = $(this).closest('form');
       var formId = form.attr('id');
       if(formId !='' && typeof(formId) != 'undefined'){
           var this_form = $('#'+formId);
           
            this_form.find(':input[required]').each(function() {
                    console.log($(this).val());
                if (!$(this).val() && $(this).val() == '') {
                    $(this).after('<span class="text-danger error-msg"><strong>This field requrired.</strong><span>')
                    return false;
                    // Add an error message or class, e.g., $(this).addClass('error');
                }
            });
            console.log(this_form);
           var formData = new FormData(this_form[0]);
           
           $.ajax({
              type: 'POST', // or 'GET' depending on your needs
              url: 'updatePaymentGetway', // Replace with the URL of your server-side script
              data: formData,
              processData: false,
              contentType: false,
              success: function(response) {
                // Handle the response from the server
                // $('#result').html(response);
                console.log(response);
              },
              error: function(jqXHR, textStatus, errorThrown) {
                // Handle errors here
                console.log(textStatus, errorThrown);
              }
            });
       }
       
       
       
   })
       $(document).on('click','.payment_enabled',function(){
            var data_id = $(this).attr('data-id');
            var status = 0;
            if ($(this).is(':checked')) {
                status = 1;
            }
            data = {
                id:data_id,
                status:status,
            };
            
            $.ajax({
              type: 'POST', // or 'GET' depending on your needs
              url: 'updatePaymentGetway', // Replace with the URL of your server-side script
              data: data,
              success: function(response) {
                // Handle the response from the server
                // $('#result').html(response);
                console.log(response);
              },
              error: function(jqXHR, textStatus, errorThrown) {
                // Handle errors here
                console.log(textStatus, errorThrown);
              }
            });
            
            console.log(status);
       })
       
       $(document).on('click','.live_sts',function(){
       
           var data_id = $(this).attr('data-id');
            var status = 0;
            if ($(this).is(':checked')) {
                status = 1;
            }
            data = {
                id:data_id,
                live_sts:status,
            };
            
            $.ajax({
              type: 'POST', // or 'GET' depending on your needs
              url: 'updatePaymentGetway', // Replace with the URL of your server-side script
              data: data,
              success: function(response) {
                // Handle the response from the server
                // $('#result').html(response);
                console.log(response);
              },
              error: function(jqXHR, textStatus, errorThrown) {
                // Handle errors here
                console.log(textStatus, errorThrown);
              }
            });
            
            console.log(status);
       });
       
    
</script>