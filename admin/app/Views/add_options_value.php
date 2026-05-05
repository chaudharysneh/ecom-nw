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

  .remove {
    float: right;
    background: #f7941d;
    color: white;
    padding: 3;
    border-radius: 5px;
    border: none;
  }

  .remove:hover {
    color: #fff;
  }

  .remove_btns {
    float: right;
    background: #696cff;
    color: white;
    padding: 10;
    border-radius: 5px;
    border: none;
    margin-right: -7px;
    margin-left: 10px;
  }
</style>

<?= $this->include('templates/header') ?>
<!-- Content wrapper -->
<div class="text-nowrap m-3 mx-lg-4">
  <div class="card">
    <div class="card-body p-0">
      <span class="addprobtn2">Add Option Value</span><a href="<?php echo base_url(); ?>all_options_value"><span class="addprobtn">All Option Value</span></a>
    </div>
  </div>
  <form id="add_option_value" enctype="multipart/form-data">
    <div class="content-wrapper">
      <!-- Content -->

      <div class="flex-grow-1 container-p-y">

        <input type="hidden" id="base_url" value="<?php echo base_url('all_options_value') ?>">
        <!--<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Add</span> Tags</h4>-->
        <div class="row">
          <div class="col-md-6 tag-mar">
            <div class="card mb-4">
              <!--<h5 class="card-header">Default</h5>-->
              <div class="card-body">
                <div class="mb-3">
                  <label for="defaultFormControlInput" class="form-label">Option</label>
                  <select name="optionvalue" id="optionvalue" class="form-control">

                    <option value=""> Select Option</option>

                    <?php
                    foreach ($all_options_data as $option_value) {
                      // print_r($option_value);
                      // die;

                    ?>
                      <option value="<?php echo $option_value['VariationTypeID']; ?>"> <?php echo $option_value['VariationTypeName']; ?> </option>
                    <?php
                    }
                    ?>

                    </option>

                  </select>
                  <p class="text-danger option_value_err"> </p>
                  <!-- <input type="text" class="form-control" id="name" name="name" placeholder="John Doe" aria-describedby="defaultFormControlHelp">
                      <p class="text-danger name_err"> </p> -->
                </div>
                <div class="mb-3 wrapper">
                  <div class="border p-2 rounded">
                    <label for="defaultFormControlInput" class="form-label">Option Value</label>
                    <input type="text" class="form-control option_value" id="name" name="name[]" placeholder="John Doe" aria-describedby="defaultFormControlHelp">
                    <!-- <p class="text-danger name_err"> </p> -->
                    <br>
                    <label for="defaultFormControlInput" class="form-label">Option Value Image</label>
                    <input type="file" class="form-control option_img" id="option_img" name="option_img[]" placeholder="John Doe" aria-describedby="defaultFormControlHelp">
                  </div>
                  <p class="name_err text-danger" style=""></p>
                </div>



                <div class="card-body p-2 mb-5">
                  <button type="button" class="addprobtn add_more_option_value_data">
                    Add More</button>
                </div>


                <div class="card-body p-2 mb-3">
                  <button type="button" class="addprobtn" id="add_option_value_data">
                    Add Option Value</button>
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