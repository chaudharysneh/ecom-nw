
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
    padding: 10;
    border-radius: 5px;
    border:none;

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
</style>
<?= $this->include ('templates/header') ?>
<div class="table-responsive text-nowrap m-5">
	<div class="card">
	<div class="card-body p-2">
		<span class="addprobtn2">Tax Class </span><a href="<?php echo base_url(); ?>add_tax_class"><span class="addprobtn">Add Tax Class</span></a>
	</div>
</div>
	<div class="card mt-3">
		<div class='card-body '>
			<table class="table mt-3 mb-3" id="example" >
      <thead>
        <tr>
          <th class="text-center">Sr.No</th>    
          <th>TaxclassName</th>
          
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      <?php
                      $i=1;
                        foreach($all_taxclass_data as $single_state_data)
                        {
                         ?>
                    <tr>
                      <td scope="row" class="text-center"><?php echo $i; ?></td>
                     
                      
                     <td><?php echo $single_state_data['class_name'];?></td>
                
                      <td class="text-center">
                      <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu" style="">
                <a class="dropdown-item" href="<?php echo base_url(); ?>edit_tax_class/<?= $single_state_data['taxe_class_id'] ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item del_taxe_class" href="javascript:void(0);" data-id="<?= $single_state_data['taxe_class_id'] ?>"> <i class="bx bx-trash me-1"></i> Delete</a>
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


<script>
   $(document).on('click', '.del_taxe_class', function () {
    var tax_class_ids = $(this).attr("data-id");

    Swal.fire({
        title: 'Are you sure?',
        text: 'Do you want to delete this record?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#333',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'POST',
                url: 'del_taxes_class',
                data: { tax_class_ids: tax_class_ids },
                success: function (data) {
                    console.log(data);

                    if (data == 1) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: 'Record deleted successfully.',
                            timer: 2000,
                            showConfirmButton: false
                        }).then(function () {
                            window.location.reload(); 
                        });
                    } else if (data == 2) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Warning',
                            text: 'Tax method already exists for this tax class!',
                            timer: 2000,
                            showConfirmButton: false
                        }).then(function () {
                            window.location.reload(); 
                        });
                    }
                }
            });
        }
    });
});

</script>