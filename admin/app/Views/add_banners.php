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
    background: #f7941d;
    color: white;
    padding: 3px 9px !important;
    border-radius: 5px;
    border-color: #fff;
    border: none;
    margin-top: 7px;
    margin-right: 10px;
}
</style>        
            
<?= $this->include ('templates/header') ?>
          <!-- Content wrapper -->
          <div class="text-nowrap m-5">
            <div class="card">
              <div class="card-body p-0">
          		<span class="addprobtn2">Add Banner</span><a href="<?php echo base_url(); ?>all_banners"><span class="addprobtn">All Banners</span></a>
              </div>
             </div>
             <form id="add_banners"  enctype="multipart/form-data">
          <div class="content-wrapper">
            <!-- Content -->

            <div class="flex-grow-1 container-p-y">
             
              <input type="hidden" id="base_url" value="<?php echo base_url('all_banners') ?>">
              <!--<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add</span> Tags</h4>-->
              <div class="row">
                <div class="col-md-6 tag-mar">
                  <div class="card mb-4">
                    <!--<h5 class="card-header">Default</h5>-->
                    <div class="card-body">
                      <!-- <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Title</label>
                        <input type="text" class="form-control" id="name" name="name"
                        placeholder="" aria-describedby="defaultFormControlHelp">
                      <p class="text-danger name_err"> </p>
                      </div> -->
                       <!-- <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Description</label>
                        <textarea type="text" class="form-control" id="description" name="description" aria-describedby="defaultFormControlHelp"></textarea>
                        <p class="text-danger description_err"> </p>
                      </div> -->
                      <!--  <div class="mb-3">-->
                      <!--  <label for="defaultFormControlInput" class="form-label">Discription</label>-->
                      <!--  <textarea name="comment" form="usrform" class="textarea"></textarea>-->
                      <!--</div>-->

                      <!-- <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Position</label>
                        <input type="text" class="form-control" id="position" name="position" placeholder="" aria-describedby="defaultFormControlHelp">
                      <p class="text-danger position_err"> </p>
                      </div> -->
                      
                       <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Button URL</label>
                        <input type="url" class="form-control" id="url" name="url" placeholder="" aria-describedby="defaultFormControlHelp">
                      <p class="text-danger url_err"> </p>
                      </div>
                      

                      <div class="mb-3">
                        <label for="formFile" class="form-label">Upload / Add Photo</label>
                        <input class="form-control" type="file" id="filetoupload" name="banner_image">
                        <p class="text-danger file_err"> </p>
                      </div>
                      <div class="card-body p-2 mb-3">
                        <button type="button" class="addprobtn" id="add_banners_data">
                      Add Banner</button>
                      </div>
                      <p id="msg"> </p>
                    </div>
                
                  </div>
                </div>
               </div>
</form>
              </div>
            </div>
      
          </div> 
          
         
            <!-- / Content -->

<?= $this->include ('templates/footer') ?>