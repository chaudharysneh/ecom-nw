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
   background: #696cff;
   color: white;
   padding: 10;
   border-radius: 5px;
   border: unset;
   }
   .form-control:disabled, .form-control[readonly] {
    background-color: #fff!important;
    opacity: 1;
}
.coupon-description {
    height: 122px;
}
</style>
<?php include ('header.php');?>    
<!-- Content wrapper -->
<div class="text-nowrap m-5">
   <div class="card">
      <div class="card-body p-2">
         <span class="addprobtn2"> Discounts & Coupons Details</span>
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
                         <form>
                        <div class="row">
                              <div class="col-lg-6">
                                  <div class="row">
                                      <div class="col-lg-12">
                                           <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">Coupon Name</label>
                                       <input
                                          type="text"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          value="100"
                                          disabled
                                          />
                                    </div>
                                      </div>
                                      <div class="col-lg-12">
                                                  <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Description</label>
                        <textarea type="text" class="form-control coupon-description" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp" disabled></textarea>
                      </div>
                                      </div>
                                      <div class="col-lg-12"></div>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  
                                  <div class="row">
                                       <div class="col-lg-12">
                                           <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">Coupon & Discount On</label>
                                       <input
                                          type="text"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          value="100"
                                         disabled
                                          />
                                    </div>
                                      </div>
                                      <div class="col-lg-12">
                                          <div class=" mb-3">
                                       <label for="largeSelect" class="form-label">Coupon Type</label>
                                      <input
                                          type="text"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          value="100"
                                         disabled
                                          />
                                    </div>
                                      </div>
                                      
                                      <div class="col-lg-12">
                                           <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">Coupon Ammount</label>
                                       <input
                                          type="text"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          value="100"
                                          disabled
                                          />
                                    </div>
                                      </div>
                                       
                                  </div>
                              </div>
                            <div class="col-lg-4">
                                    <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">Coupon Expiry Date</label>
                                       <input
                                          type="date"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          value="100"
                                         disabled
                                          />
                                    </div>
                                
                           </div>
                               
                               <div class="col-lg-4">
                                    <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">Minimum Spend</label>
                                       <input
                                          type="text"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          value="100"
                                         disabled
                                          />
                                    </div>
                                
                           </div>
                           
                              <div class="col-lg-4">
                                    <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">Maximum Spend</label>
                                       <input
                                          type="text"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          value="100"
                                          disabled
                                          />
                                    </div>
                                
                           </div>
                           
                           <div class="col-lg-6">
                                 <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">Usage Limit per Coupon</label>
                                       <input
                                          type="text"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          value="100"
                                          disabled
                                          />
                                    </div>
                           </div>
                               
                           
                        </div>
                        
                        </form>
                       
                      
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
</div>
<!-- / Content -->
<?php include ('footer.php');?>