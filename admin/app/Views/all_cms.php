<style>
	.table_product_img_th{
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
tbody td img{
    height :150px;
    width : 150px;
    
}
.dataTables_empty {
    text-align: center;
}

  .content-wrapper {
    max-height: 100px; /* Set the maximum height for the content */
    overflow-y: auto; /* Add vertical scrollbar for overflow */
    padding: 5px;
    border: 1px solid #ddd; /* Optional: Add a border for better visualization */
    border-radius: 4px;
    background-color: #f9f9f9;
    line-height:80px;
  }
</style>

<?= $this->include('templates/header') ?>
<div class="table-responsive text-nowrap m-5">
	<div class="card">
	<div class="card-body p-0">
		<span class="addprobtn2">CMS Pages</span><a href="<?php echo base_url(); ?>add_cms"><span class="addprobtn">Add CMS Page</span></a>
	</div>
</div>
	<div class="card mt-3">
		<div class='card-body'>
				<table class="table mb-3 mt-3" id="example">
      <thead>
        <tr>
          <th class="text-center">Sr. No</th>
          <th class="table_product_img_th">Title</th>
          <th class="text-center">URL</th>
          <th class="text-center">Content</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
        <tbody class="table-border-bottom-0">
      <?php
                      $i=1;
                        foreach($all_cms_data as $single_cms_data)
                        {
                          // print_r($single_catagories_data);
                          // die;

                      ?>
                    <tr>
                      <td scope="row" class="text-center"><?php echo $i; ?></td>
                     
                      <td><?php echo $single_cms_data['CmsTitle'];?></td>
                      <td><?php echo $single_cms_data['CmsUrl'];?></td>
                      <td>
                          <div class="content-wrapper">
                            <?php echo $single_cms_data['CmsContent']; ?>
                          </div>
                      </td>
                     
                
                      <td class="text-center">
                      <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu" style="">
                  <a class="dropdown-item" href="<?php echo base_url(); ?>view_cms/<?= $single_cms_data['CmsID'] ?>"><i class="fa fa-eye me-1 me-1"></i> View</a>
                <a class="dropdown-item" href="<?php echo base_url(); ?>edit_cms/<?= $single_cms_data['CmsID'] ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <!-- <a class="dropdown-item del_cms_data" href="javascript:void(0);" data-id="<//?= $single_cms_data['CmsID'] ?>"> <i class="bx bx-trash me-1"></i> Delete</a> -->
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

  <?= $this->include('templates/footer') ?>