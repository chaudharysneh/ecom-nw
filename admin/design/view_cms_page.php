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
.cms-description {
    white-space: normal;
    border: 1px solid #d9dee3;
    padding: 11px;
    border-radius: 6px;
    background:#eceef1;
}

</style>        
            
          <?php include ('header.php');?>    
          <!-- Content wrapper -->
          <div class="text-nowrap m-5">
            <div class="card">
              <div class="card-body p-2">
          		<span class="addprobtn2">CMS Page</span>
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
                      <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Title</label>
                        <input
                          type="text"
                          class="form-control"
                          id="defaultFormControlInput"
                          placeholder="John Doe"
                          aria-describedby="defaultFormControlHelp"
                          disabled
                        />
                      </div>
                       <div class="mb-3">
                 <div class="row">
                     <div class="col-lg-12">
        
      <p class="cms-description">
          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
      </p>
       
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

            <?php include ('footer.php');?>
            