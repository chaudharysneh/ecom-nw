<style>
  .table_product_img_th {
    width: 13%;
  }

  .table_product_img {
    width: 78%;
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

  .addprobtn2 {
    float: left;
    color: #696cff;
    padding: 10;
    border-radius: 5px;
    font-weight: bold;
  }

  .name {
    width: 71% !important;
  }

  .dataTables_empty {
    text-align: center;
  }
</style>
<?= $this->include('templates/header') ?>
<div class="text-nowrap m-3 mx-lg-4">
  <div class="card">
    <div class="card-body p-0">
      <span class="addprobtn2">Tags </span><a href="<?php echo base_url(); ?>add-tags"><span class="addprobtn">Add Tags</span></a>
    </div>
  </div>
  <div class="card mt-3">
    <div class='card-body '>
      <div class="table-responsive">
        <table class="table mt-3 mb-3" id="example">
          <thead>
            <tr>
              <th class="text-center">Sr.No</th>
              <th class="name">Name</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            <?php
            $i = 1;
            foreach ($all_tags_data as $single_tags_data) {
              // print_r($single_catagories_data);
              // die;

            ?>
              <tr>
                <td scope="row" class="text-center"><?php echo $i; ?></td>

                <td><?php echo $single_tags_data['tagname']; ?></td>


                <td class="text-center">
                  <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
                    <div class="dropdown-menu" style="">
                      <a class="dropdown-item" href="<?php //echo base_url(); 
                                                      ?>edit-tags/<?= $single_tags_data['tagid'] ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                      <a class="dropdown-item del_tags_type" href="javascript:void(0);" data-id="<?= $single_tags_data['tagid'] ?>"> <i class="bx bx-trash me-1"></i> Delete</a>
                    </div>
                  </div>
                </td>
              </tr>
            <?php
              $i++;
            }
            ?>


          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>



<?= $this->include('templates/footer') ?>