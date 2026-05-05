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
          		<span class="addprobtn2">Edit Testimonial</span><a href="<?php echo base_url(); ?>all-testimonial"><span class="addprobtn">Testimonial</span></a>
              </div>
             </div>
             <form id="edit_testimonial_form">
          <div class="content-wrapper">
            <!-- Content -->

            <div class="flex-grow-1 container-p-y">
            <input type="hidden" id="base_url" value="<?php echo base_url('all-testimonial') ?>">
             <input type="hidden" id="id" value="<?php echo $all_testimonial_data['TestimonialID'] ?>" name="id">
              <!--<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add</span> Tags</h4>-->
              <div class="row">
                <div class="col-md-12 tag-mar">
                  <div class="card mb-12">
                    <!--<h5 class="card-header">Default</h5>-->
                    <div class="card-body">
                    <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Testimonial Content</label>
                        <textarea type="text" class="form-control" id="testi_content" name="testi_content"  aria-describedby="defaultFormControlHelp"><?php echo $all_testimonial_data['TestimonialContent'] ?></textarea>
                      <p class="text-danger testi_content_err"> </p>
                      </div>
                       <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Author</label>
                        <input type="text" class="form-control" id="testi_author" name="testi_author" value="<?php echo $all_testimonial_data['TestimonialAuthor'] ?>" aria-describedby="defaultFormControlHelp">
                      <p class="text-danger testi_author_err"> </p>
                      </div>
                       <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Company</label>
                        <input type="text" class="form-control" id="testi_company" name="testi_company" value="<?php echo $all_testimonial_data['TestimonialCompany'] ?>" aria-describedby="defaultFormControlHelp">
                      <p class="text-danger testi_company_err"> </p>
                      </div>
                       <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Position</label>
                        <input type="text" class="form-control" id="testi_position" name="testi_position" value="<?php echo $all_testimonial_data['TestimonialPosition'] ?>" aria-describedby="defaultFormControlHelp">
                      <p class="text-danger testi_position_err"> </p>
                      </div>
                       <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Image</label>
                        <input type="file" class="form-control" id="testi_image" name="testi_image" value="" aria-describedby="defaultFormControlHelp">
                         <img src="<?php echo base_url() ?>public/upload_images/<?php echo $all_testimonial_data['TestimonialImage'] ?>" width="100" height="100">
                                 <input type="hidden" name="old_testi_pic" id="old_testi_pic" value="<?php echo $all_testimonial_data['TestimonialImage'] ?>">
                      <p class="text-danger testi_image_err"> </p>
                      </div>
                       
                      
                      <div class="card-body p-2 mb-3">
                      <button type="button" class="addprobtn" id="edit_testimonial_btn">
                      Edit Testimonial</button>
                     
                      </div>
                      <p id="msg"> </p>
                    </div>
                  </div>
                </div>
               </div>
              </div>
            </div>
            </form> 
          </div> 
          
         
            <!-- / Content -->

<?= $this->include ('templates/footer') ?>