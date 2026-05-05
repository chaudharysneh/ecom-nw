<!--application/x-httpd-php edit_tag.php ( ASCII HTML document text, with CRLF line terminators )-->
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
</style>

<?= $this->include('templates/header') ?>
<!-- Content wrapper -->
<div class="text-nowrap m-3 mx-lg-4">
  <div class="card">
    <div class="card-body p-0">
      <span class="addprobtn2">Edit Brand</span><a href="<?php echo base_url(); ?>all-brands"><span class="addprobtn">Brands</span></a>
    </div>
  </div>
  <form id="edit_brands_form">
    <input type="hidden" name="id" value="<?php echo $all_brands_data['BrandID'] ?>">
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
                    id="name"
                    name="brandname"
                    value="<?php echo $all_brands_data['BrandName']; ?>"
                    aria-describedby="defaultFormControlHelp" />
                  <input type="hidden" id="base_url" value="<?php echo base_url('all-brands') ?>">
                  <p class="text-danger name_err my-0"> </p>
                </div>

                <div class="card-body p-2 mb-3">
                  <button type="button" class="addprobtn" id="update_brands_data">
                    Edit Brand</button>

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

<?= $this->include('templates/footer') ?>