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
         <span class="addprobtn2">Add Product</span><a href="all_products.php"><span class="addprobtn">All Products</span></a>
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
                        <div class="row">
                           <div class="col-lg-8">
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">Product name</label>
                                       <input
                                          type="text"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          />
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">Description</label>
                                       <textarea
                                          type="text"
                                          class="form-control description-area"
                                          id="defaultFormControlInput"
                                          aria-describedby="defaultFormControlHelp"
                                          /></textarea>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class=" mb-3">
                                       <label for="largeSelect" class="form-label">Categories</label>
                                       <select id="largeSelect" class="form-select ">
                                          <option>Select Category</option>
                                          <option>Men</option>
                                          <option value="1">Women</option>
                                          <option value="2">Childdren</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class=" mb-3">
                                       <label for="largeSelect" class="form-label">Tags</label>
                                       <select id="largeSelect" class="form-select ">
                                          <option>Select tag</option>
                                          <option>Bag</option>
                                          <option value="1">T-shirt</option>
                                          <option value="2">shoes</option>
                                          <option value="3">Earrings</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="mt-2 mb-3">
                                       <label for="largeSelect" class="form-label">Stock Status</label>
                                       <select id="largeSelect" class="form-select ">
                                          <option>select stock</option>
                                          <option value="1">In stock</option>
                                          <option value="2">Out Of Stock</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-8">
                              <div class="row">
                                 <div class="col-lg-12">
                                    <div class="mb-3">
                                       <label for="formFile" class="form-label">Upload / Add Photo</label>
                                       <input class="form-control" type="file" id="formFile" />
                                    </div>
                                 </div>
                                 <div class="col-lg-12">
                                    <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">Product Price</label>
                                       <input
                                          type="text"
                                          class="form-control"
                                          id="defaultFormControlInput"
                                          
                                          aria-describedby="defaultFormControlHelp"
                                          />
                                    </div>
                                 </div>
                                  <div class="col-lg-6">
                                  <div class=" mb-3">
                                       <label for="largeSelect" class="form-label">Attributes</label>
                                       <select id="largeSelect" class="form-select ">
                                          <option>Select Attributes</option>
                                          <option>color</option>
                                          <option value="1">Size</option>
                                          <option value="2">Dimantion</option>
                                       </select>
                                    </div>
                            </div>
                              <div class="col-lg-6">
                                  <div class=" mb-3">
                                       <label for="largeSelect" class="form-label">Values</label>
                                       <select id="largeSelect" class="form-select ">
                                          <option>Select Values</option>
                                          <option>Black</option>
                                          <option value="1">Blue</option>
                                          <option value="2">White</option>
                                       </select>
                                    </div>
                            </div>
                              </div>
                           </div>
                           <div class="col-lg-4">
                              <div class="row">
                                 <div class="col-lg-12">
                                    <img src="assets/img/backgrounds/18.jpg" class="w-100">
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-4">
                                <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">Weight (kg)</label>
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
                                       <label for="defaultFormControlInput" class="form-label">Dimensions (cm)</label>
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
                                       <label for="defaultFormControlInput" class="form-label">Shipping class</label>
                                      <select id="largeSelect" class="form-select ">
                                          <option>high class</option>
                                          <option value="1">Flat Class</option>
                                       </select>
                                    </div>
                           </div>
                        </div>
                        <div class="card-body p-2 mb-3">
                           <a href="add_category.php"><span class="addprobtn">Add Product</span></a>
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