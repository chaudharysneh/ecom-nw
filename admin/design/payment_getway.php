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
</style>


          
            <?php include ('header.php');?>  
          
          
          <!-- Content wrapper -->
          <div class="text-nowrap m-5">
            <div class="card">
              <div class="card-body p-2">
          		<span class="addprobtn2">Add Payment Method</span>
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
                            <div class="col-lg-6">
                                <label for="defaultFormControlInput" class="form-label">Method Name</label>
                            </div>
                               <div class="col-lg-6">
                                <h6>Enable/Disable</h6>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-6">
                                <div class="payment-method"><h5>Cash On Delivery</h5></div>
                            </div>
                            <div class="col-lg-6">
                               <label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
                            </div>
                        </div>
                        
                        
                       
                        <div class="row" style="
    border-top: 2px solid #80808042;
    margin-top: 21px;
">
                            <div class="col-lg-12">
                                 <h4 class="mt-3">Add Method </h4>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-3">
                                       <label for="defaultFormControlInput" class="form-label">Method Name</label>
                                       <input type="text" class="form-control" id="defaultFormControlInput" aria-describedby="defaultFormControlHelp">
                                    </div>
                            </div>
                            <div class="col-lg-2"></div>
                            <div class="col-lg-6 mt-4">
                                                      <label class="switch">
  <input type="checkbox">
  <span class="slider round"></span>
</label>
                            </div>
                        </div>
                        
                     
                      <div class="card-body p-2 mb-3">
                    <button class="addprobtn">Add Payment Method</button>
                     
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