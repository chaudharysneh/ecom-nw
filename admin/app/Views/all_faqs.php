
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
.name{
    width:71%!important;
}
.dataTables_empty {
    text-align: center;
}
</style>
<?= $this->include ('templates/header') ?>
<div class="table-responsive text-nowrap m-5">
	<div class="card">
	<div class="card-body p-0">
		<span class="addprobtn2">FAQs </span><a href="<?php echo base_url(); ?>add-faqs"><span class="addprobtn">Add FAQs</span></a>
	</div>
</div>
	<div class="card mt-3">
		<div class='card-body '>
			<table class="table mt-3 mb-3" id="example" >
      <thead>
        <tr>
          <th class="text-center">Sr.No</th>    
          <th class="">Questions</th>
          <th>Answers</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      <?php
                      $i=1;
                        foreach($all_faqs_data as $single_faqs_data)
                        {
                          // print_r($single_catagories_data);
                          // die;

                      ?>
                    <tr>
                      <td scope="row" class="text-center"><?php echo $i; ?></td>
                     
                      <td><?php echo $single_faqs_data['FaqQuestion'];?></td>
                      <td><?php echo $single_faqs_data['FaqAnswer'];?></td>
                     
                
                      <td class="text-center">
                      <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu" style="">
                <a class="dropdown-item" href="<?php //echo base_url(); ?>edit-faqs/<?= $single_faqs_data['FaqID'] ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item del_faqs_type" href="javascript:void(0);" data-id="<?= $single_faqs_data['FaqID'] ?>"> <i class="bx bx-trash me-1"></i> Delete</a>
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
  


<?= $this->include ('templates/footer') ?>