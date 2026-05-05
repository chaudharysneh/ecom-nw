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

.select2-container--default.select2-container--focus .select2-selection--multiple {
    border:none;
    
}


</style>        
            
<?= $this->include ('templates/header') ?>
          <!-- Content wrapper -->
          <div class="text-nowrap m-5">
            <div class="card">
              <div class="card-body p-0">
          		<span class="addprobtn2">Add Blog</span><a href="<?php echo base_url(); ?>all_blog"><span class="addprobtn">All Blog</span></a>
              </div>
             </div>
             <form id="add_blog"  enctype="multipart/form-data">
          <div class="content-wrapper">
            <!-- Content -->

            <div class="flex-grow-1 container-p-y">
             
              <input type="hidden" id="base_url" value="<?php echo base_url('all_blog') ?>">
               <input type="hidden" id="baseurl" value="<?php echo base_url() ?>">
              <!--<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add</span> Tags</h4>-->
              <div class="row">
                <div class="col-md-6 tag-mar">
                  <div class="card mb-4">
                    <!--<h5 class="card-header">Default</h5>-->
                    <div class="card-body">
                      <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title"
                        placeholder="" aria-describedby="defaultFormControlHelp">
                      <p class="text-danger title_err"> </p>
                      </div>
                       <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Description</label>
                        <textarea type="text" class="form-control" id="description" name="description" aria-describedby="defaultFormControlHelp"></textarea>
                        <p class="text-danger description_err"> </p>
                      </div>
                
                      <div class="mb-3">
                        <label for="formFile" class="form-label">Upload / Add Photo</label>
                        <input class="form-control" type="file" id="filetoupload" name="blog_image">
                        <p class="text-danger file_err"> </p>
                      </div>
                      
                      <div class="mb-3">
                        <label for="defaultFormControlInput" class="form-label">Category</label>
                        <select id="category_type" name="category_type" class="form-select category_type">
                            <option value="">Select Category</option>
                           <?php 
                               foreach($allcategorydata as $category){                                                
                                ?>
                                <option value="<?php echo $category['CategoryID'] ?>"><?php echo $category['CategoryName'] ?></option>
                                <?php
                               }
                            ?>
                       </select>
                        <p class="text-danger category_type_err"> </p>
                      </div>
                      <div class="mb-3 row">
                          <!--<div class="mb-3 col-md-6">-->
                              <label for="largeSelect" class="form-label">Tags</label> <br>
                                <select id="tags1" name="tags1[]" class="form-select tags1" multiple="multiple">
                                          <!--<option value="">Select tag</option>-->
                                          <?php if(!empty($tags)){
                                              foreach($tags as $all_tags){
                                            ?>  
                                          <option value="<?php echo $all_tags['tagid']; ?>"><?php echo $all_tags['tagname']; ?></option>
                                         
                                          <?php
                                          }
                                        }
                                          
                                          ?>
                                       </select>
                                <p class="text-danger tags_err"> </p>
                          <!--</div>-->
                          <!--<div class="mb-3 col-md-6">-->
                          <!--    <label for="defaultFormControlInput" class="form-label">CreatedBy</label>-->
                          <!--      <input type="text" class="form-control" id="createdby" name="createdby">-->
                          <!--      <p class="text-danger createdby_err"> </p>-->
                          <!--</div>-->
                          
                      </div>
                      
                      <div class="card-body p-2 mb-3">
                        <button type="button" class="addprobtn" id="add_blog_data">
                      Add Blog</button>
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

<script>
    
$('#add_blog_data').on('click', function () {
    // alert ("hi");

    // alert("hello");

    let title = $('#title').val()
    let description = $('#description').val()
    let file = $('#filetoupload').val()
    let category_type = $('#category_type').val()
     let tags = $('#tags1').val()

    let base_url = $('#base_url').val()
    let baseurl = $('#baseurl').val()
    



    var flag = 1

    if (title == '') {
      $(".title_err").show();
      $('.title_err').html('Title is required')
      flag = 0

    } else {
      $('.title_err').hide()

    }

if (file == '') {
      $(".file_err").show();
      $('.file_err').html('Image is required')
      flag = 0

    } else {
      $('.file_err').hide()

    }
    
    if (tags == '') {
      $(".tags_err").show();
      $('.tags_err').html('Tag is required')
      flag = 0

    } else {
      $('.tags_err').hide()

    }
    
    if (description.trim().length <= 0) {
      $(".description_err").show();
      $('.description_err').html('Description is required')
      flag = 0

    } else {
      $('.description_err').hide()

    }


 if (category_type == '') {
      $(".category_type_err").show();
      $('.category_type_err').html('Category is required')
      flag = 0

    } else {
      $('.category_type_err').hide()

    }
    if (flag == 1) {

      let add_blog_data = document.getElementById('add_blog');
      let fd = new FormData(add_blog_data)

        $.ajax({
        url: baseurl + 'save_blog',
        data: fd,
        cache: false,
        processData: false,
        contentType: false,
        type: 'POST',
        success: function (data) {
          console.log(data)
          if (data == 1) {
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Blog Added Successfully!',
                timer: 2000,  
                showConfirmButton: false
            }).then(function () {
                window.location.href = base_url;
            });
        }

        //   else if(data==2){
        //     $('#msg').addClass('text-danger')
        //     $('#msg').html('anners Already Exits!')
        //     $('#msg').removeClass('text-success')
            
        //   }
        },
      })
    }
    else {
      return false
    }
  })
</script>