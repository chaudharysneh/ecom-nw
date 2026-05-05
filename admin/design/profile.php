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
   }
.profile-img {
    width: 19%;
    border-radius: 168px;
}
</style>
<?php include ('header.php');?>    
<!-- Content wrapper -->
<div class="text-nowrap m-5">
   <div class="card">
      <div class="card-body p-2">
         <span class="addprobtn2">Profile</span><a href="edit_profile.php"><span class="addprobtn">Edit Profile</span></a>
      </div>
   </div>
   <form>
      <div class="content-wrapper">
         <!-- Content -->
         <div class="flex-grow-1 container-p-y">
            <!--<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add</span> Tags</h4>-->
            <div class="row">
               <div class="col-md-12 tag-mar">
                  <div class="card mb-4">
                     <!--<h5 class="card-header">Default</h5>-->
                     <div class="card-body">
                          <div class="row mb-5">
                                 <div class="col-lg-12 text-center">
                                    <img src="assets/img/profil-img.png" class="mt-4 profile-img">
                                 </div>
                              </div>
                         <div class="row">
                           <div class="col-lg-4">
                             
                                    <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">Customer  name</label>
                                       <input
                                          type="text"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          disabled
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
                                          disabled
                                          />
                                    </div>
                                 </div>
                              
                           
                                 <div class="col-lg-4">
                                    <div class=" mb-3">
                                       <label for="largeSelect" class="form-label">state</label>
                                        <input
                                          type="text"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          disabled
                                          />
                                    </div>
                                 </div>
                                 <div class="col-lg-4">
                                    <div class=" mb-3">
                                       <label for="largeSelect" class="form-label">City</label>
                                       <input
                                          type="text"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          disabled
                                          />
                                    </div>
                                 </div>
                                 <div class="col-lg-4">
                                    <div class="mt-2 mb-3">
                                       <label for="largeSelect" class="form-label">Post Code</label>
                                        <input
                                          type="text"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          disabled
                                          />
                                    </div>
                                 </div>
                                  <div class="col-lg-4">
                                    <div class="mt-2 mb-3">
                                       <label for="largeSelect" class="form-label">Email</label>
                                        <input
                                          type="text"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          disabled
                                          />
                                    </div>
                                 </div>
                                  <div class="col-lg-4">
                                    <div class="mt-2 mb-3">
                                       <label for="largeSelect" class="form-label">Phone</label>
                                        <input
                                          type="text"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          disabled
                                          />
                                    </div>
                                 </div>
                                  <div class="col-lg-4">
                                    <div class="mt-2 mb-3">
                                       <label for="largeSelect" class="form-label">Payment Via</label>
                                        <input
                                          type="text"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          disabled
                                          />
                                    </div>
                                 </div>
                                  <div class="col-lg-4">
                                    <div class="mt-2 mb-3">
                                       <label for="largeSelect" class="form-label">Shipping Method</label>
                                        <input
                                          type="text"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          disabled
                                          />
                                    </div>
                                 </div>
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