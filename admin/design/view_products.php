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
.form-control:disabled, .form-control[readonly] {
    background-color: #fff!important; 
    opacity: 1;
}
</style>        
            
          <?php include ('header.php');?>    
          <!-- Content wrapper -->
          <div class="text-nowrap m-5">
            <div class="card">
              <div class="card-body p-2">
          		<span class="addprobtn2">Product Detail</span><a href="all_products.php"><span class="addprobtn">Back</span></a>
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
                        <div class="row border-bottom">
                            <div class="col-lg-4">
                                <div class="my-3">
                        <span >Product Name :</span>
                       <span>Shoes</span>
                      </div>
                            </div>
                            <div class="col-lg-4">
                                 <div class="my-3">
                        <span >Tag : </span>
                        <span>Shoes</span>
                      </div>
                            </div>
                            <div class="col-lg-4">
                                   <div class="my-3">
                        <span >Size : </span>
                       <span>M</span>
                      </div>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-md-4">
                            
                        <div class="row">
                                   <div class="col-lg-12">
                                    <img src="assets/img/backgrounds/18.jpg" class="w-100 mt-3">
                                 </div>
                              </div>
                    </div>
                    <div class="col-md-8">
                       <div class="row border-bottom">
                           <div class="col-lg-6">
                               <div class="my-3">
                                   <span >Color : </span>
                       <span>White</span>
                               </div>
                                
                           </div>
                           <div class="col-lg-6">
                                  <div class="my-3">
                                <span>Price : </span>
                        <span>$50.00</span>
                        </div>
                           </div>
                       </div>
                       <div class="row border-bottom">
                           <div class="col-lg-6">
                               <div class="my-3">
                        <span >Category : </span>
                       <span>Men</span>
                      </div>
                                
                           </div>
                           <div class="col-lg-6">
                               <div class="my-3">
                        <span >Stock : </span>
                       <span>20</span>
                      </div>
                           </div>
                       </div>
                     
                     
                    </div>
                    
                    
                  </div>
                  <div class="row"></div>
                      <div class="card-body p-2 mb-3">
                      <a href="edit_products.php"><span class="addprobtn">Edit Product</span></a>
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