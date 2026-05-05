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
          		<span class="addprobtn2">Edit Product</span><a href="all_products.php"><span class="addprobtn">Back</span></a>
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
                      <div class="col-md-4">
                      <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Product Name</label>
                        <input
                          type="text"
                          class="form-control"
                          id="defaultFormControlInput"
                          Value="Shoes"
                          aria-describedby="defaultFormControlHelp"/>
                      </div>
                      <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Color</label>
                        <input
                          type="text"
                          class="form-control"
                          id="defaultFormControlInput"
                          Value="White"
                          aria-describedby="defaultFormControlHelp"/>
                      </div>
                      <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Price</label>
                        <input
                          type="text"
                          class="form-control"
                          id="defaultFormControlInput"
                          Value="$50.00"
                          aria-describedby="defaultFormControlHelp"/>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Size</label>
                        <input
                          type="text"
                          class="form-control"
                          id="defaultFormControlInput"
                          Value="M"
                          aria-describedby="defaultFormControlHelp"/>
                      </div>
                      <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Category</label>
                        <input
                          type="text"
                          class="form-control"
                          id="defaultFormControlInput"
                          Value="Men"
                          aria-describedby="defaultFormControlHelp"/>
                      </div>
                      <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Stock</label>
                        <input
                          type="text"
                          class="form-control"
                          id="defaultFormControlInput"
                          Value="20"
                          aria-describedby="defaultFormControlHelp"/>
                      </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                             <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Tag</label>
                        <input
                          type="text"
                          class="form-control"
                          id="defaultFormControlInput"
                          Value="Shoes"
                          aria-describedby="defaultFormControlHelp"/>
                      </div>
                                 <div class="col-lg-12">
                                    <label for="formFile" class="form-label">Add Photo</label>
                        <input class="form-control" type="file" id="formFile" />
                                 </div>
                              </div>
                     </div>
                    </div> 
                    <div class="row"></div>
                         <div class="card-body p-2 mb-3">
                     <button class="addprobtn">Update Product</button>
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