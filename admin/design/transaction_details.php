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
</style>
<?php include ('header.php');?>    
<!-- Content wrapper -->
<div class="text-nowrap m-5">
   <div class="card">
      <div class="card-body p-2">
         <span class="addprobtn2">Transaction Details</span>
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
                         <div class="row border-bottom ">
                              <div class="col-lg-3 my-3">
                                  <span><i class="fa fa-pencil" aria-hidden="true"></i> Transaction Id : </span>
                              </div>
                             <div class="col-lg-6 my-3">
                                 <span>#123</span>
                             </div>
                         </div>
                          <div class="row border-bottom">
                              <div class="col-lg-3 my-3">
                                  <span><i class="fa fa-list" aria-hidden="true"></i> Contact Details : </span>
                              </div>
                             <div class="col-lg-6 my-3">
                                 <span>1234567890</span>
                             </div>
                         </div>
                          <div class="row border-bottom">
                              <div class="col-lg-3 my-3">
                                  <span><i class="fa fa-money" aria-hidden="true"></i> Ammount : </span>
                              </div>
                             <div class="col-lg-6 my-3">
                                 <span>$354</span>
                             </div>
                         </div>
                          <div class="row border-bottom">
                              <div class="col-lg-3 my-3">
                                  <span><i class="fa fa-credit-card" aria-hidden="true"></i> Payment Method : </span>
                              </div>
                             <div class="col-lg-6 my-3">
                                 <span>Online</span>
                             </div>
                         </div>
                           <div class="row border-bottom">
                              <div class="col-lg-3 my-3">
                                  <span><i class="fa fa-file" aria-hidden="true"></i> Status : </span>
                              </div>
                             <div class="col-lg-6 my-3">
                                 <span>Paid</span>
                             </div>
                         </div>
                          <div class="row border-bottom">
                              <div class="col-lg-3 my-3">
                                  <span><i class="fa fa-plus" aria-hidden="true"></i> Total : </span>
                              </div>
                             <div class="col-lg-6 my-3">
                                 <span>$34</span>
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