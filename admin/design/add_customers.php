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
   border:unset;
   }
</style>
<?php include ('header.php');?>    
<!-- Content wrapper -->
<div class="text-nowrap m-5">
   <div class="card">
      <div class="card-body p-2">
         <span class="addprobtn2">Add Customer</span><a href="all_products.php"><span class="addprobtn">All Customers</span></a>
      </div>
   </div>
   <form>
      <div class="content-wrapper">
         <!-- Content -->
         <div class="flex-grow-1 container-p-y">
        
            <div class="row">
               <div class="col-md-12 tag-mar">
                  <div class="card mb-4">
                     <div class="card-body">
                       <div class="row">
                <div class="col-lg-4">
                     <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">First Name</label>
                                       <input
                                          type="text"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          />
                                    </div>
                </div>
                 <div class="col-lg-4">
                     <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">Last Name</label>
                                       <input
                                          type="text"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          />
                                    </div>
                </div>
                 <div class="col-lg-4">
                     <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">User Name</label>
                                       <input
                                          type="text"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          />
                                    </div>
                </div>
                <div class="col-lg-4">
                     <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">Email</label>
                                       <input
                                          type="text"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          />
                                    </div>
                </div>
           
            
            
            
                
                <div class="col-lg-4">
                     <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">Phone</label>
                                       <input
                                          type="text"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          />
                                    </div>
                </div>
                <div class="col-lg-4">
                     <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">Password</label>
                                       <input
                                          type="text"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          />
                                    </div>
                </div>
            </div>
            
            
            
            
 <h4 class="mt-3">Address</h4>           
            
            
                  <div class="row">
                <div class="col-lg-4">
                     <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">Flat No.</label>
                                       <input
                                          type="text"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          />
                                    </div>
                </div>
                <div class="col-lg-4">
                     <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">Street</label>
                                       <input
                                          type="text"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          />
                                    </div>
                </div>
                <div class="col-lg-4">
                     <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">City</label>
                                       <input
                                          type="text"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          />
                                    </div>
                </div>
            </div>
              <div class="row">
                <div class="col-lg-4">
                     <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">State</label>
                                       <input
                                          type="text"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          />
                                    </div>
                </div>
                <div class="col-lg-4">
                     <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">Country</label>
                                       <input
                                          type="text"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          />
                                    </div>
                </div>
                <div class="col-lg-4">
                     <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">Postcode</label>
                                       <input
                                          type="text"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          />
                                    </div>
                </div>
            </div>
                        <div class="card-body p-2 mb-3">
                           <button class="addprobtn"><span >Add Customer</span></button>
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
<?php include ('footer.php');?>