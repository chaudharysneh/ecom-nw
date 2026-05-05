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
          		<span class="addprobtn2">Update Category</span><a href="category.php"><span class="addprobtn">Back</span></a>
              </div>
             </div>
             <form>
          <div class="content-wrapper">
            <!-- Content -->

            <div class="flex-grow-1 container-p-y">
              <!--<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add</span> Tags</h4>-->
              <div class="row">
                <div class="col-md-6 tag-mar">
                  <div class="card mb-4">
                    <!--<h5 class="card-header">Default</h5>-->
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Name</label>
                        <input
                          type="text"
                          class="form-control"
                          id="defaultFormControlInput"
                          value="John Doe"
                          aria-describedby="defaultFormControlHelp"
                        />
                      </div>
                       <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Description</label>
                        <textarea
                          type="text"
                          class="form-control"
                          id="defaultFormControlInput"
                          aria-describedby="defaultFormControlHelp"
                        />Lorem Ipsum is simply dummy text of the printing and typesetting industry.</textarea>
                      </div>
                      <!--  <div class="mb-3">-->
                      <!--  <label for="defaultFormControlInput" class="form-label">Discription</label>-->
                      <!--  <textarea name="comment" form="usrform" class="textarea"></textarea>-->
                      <!--</div>-->

                      <div class="mb-3">
                        <label for="formFile" class="form-label">Upload / Add Photo</label>
                        <input class="form-control" type="file" id="formFile" />
                      </div>
                      <div class="card-body p-2 mb-3">
                      <a href=""><span class="addprobtn">Update Category</span></a>
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