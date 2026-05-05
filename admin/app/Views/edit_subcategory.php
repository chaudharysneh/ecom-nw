<style>
  .textarea {
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

  .subcat-img {
    vertical-align: middle;
    object-fit: contain;
    border: 7px solid #dadada70;
    border-radius: 5%;
    /*margin-top:10px;*/
  }
</style>

<?= $this->include('templates/header') ?>

<!-- Content wrapper -->
<div class="text-nowrap m-3 mx-lg-4">
  <div class="card">
    <div class="card-body p-0">
      <span class="addprobtn2">Update Sub Category</span><a href="<?php echo base_url(); ?>all-subcategories"><span class="addprobtn">Back</span></a>
    </div>
  </div>
  <form id="edit_sub_catagories" enctype="multipart/form-data">


    <div class="content-wrapper">
      <!-- Content -->

      <div class="flex-grow-1 container-p-y">
        <input type="hidden" id="base_url" value="<?php echo base_url('all-subcategories') ?>">
        <input type="hidden" name="id" id="id" value="<?php echo $all_sub_catagories_data['sub_category_id'] ?>">
        <input type="hidden" name="old_img" id="old_img" value="<?php echo $all_sub_catagories_data['sub_category_img'] ?>">

        <div class="row">
          <div class="col-md-6 tag-mar">
            <div class="card mb-4">
              <!--<h5 class="card-header">Default</h5>-->
              <div class="card-body">
                <div class="mb-3">
                  <label for="defaultFormControlInput" class="form-label">Category</label>
                  <select name="category" id="category" class="form-control">

                    <option value=""> Select Category</option>

                    <?php
                    foreach ($all_catagories_data as $catagory) {
                    ?>
                      <option value="<?php echo $catagory['CategoryID']; ?>" <?php if ($catagory['CategoryID'] == $all_sub_catagories_data['category_id']) echo "selected"; ?>> <?php echo $catagory['CategoryName']; ?> </option>
                    <?php
                    }
                    ?>



                    </option>

                  </select>
                  <p class="text-danger category_err my-0"> </p>

                </div>
                <div class="mb-3">
                  <label for="defaultFormControlInput" class="form-label">Sub Category</label>
                  <input type="text" class="form-control" id="name" name="name" value="<?php echo $all_sub_catagories_data['sub_category']; ?>" placeholder="John Doe" aria-describedby="defaultFormControlHelp">
                  <p class="text-danger name_err my-0"> </p>
                </div>
                <div class="mb-3">
                  <label for="defaultFormControlInput" class="form-label">Sub Category Image</label>
                  <input type="file" class="form-control" id="sub_cat_img" name="sub_cat_img" placeholder="" aria-describedby="defaultFormControlHelp">
                  <p class="text-danger sub_cat_img_err my-0"> </p>
                </div>
                <img src="<?php echo base_url() . 'public/upload_images/' . $all_sub_catagories_data['sub_category_img']; ?>" class="subcat-img" width="100" height="100">




                <div class="card-body p-2 mb-3">
                  <button type="button" class="addprobtn" id="edit_sub_catagories_data">
                    Update Sub Category</button>
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

<?= $this->include('templates/footer') ?>