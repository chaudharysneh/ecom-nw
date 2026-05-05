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
		<span class="addprobtn2">Country </span><a href="<?php echo base_url(); ?>add_country"><span class="addprobtn">Add Country</span></a>
	</div>
</div>
	<div class="card mt-3">
		<div class='card-body '>
			<table class="table mt-3 mb-3" id="example" >
      <thead>
        <tr>
          <th class="text-center">Sr.No</th>    
          <th>Country Name</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      <?php
                      $i=1;
                        foreach($allcountryydata as $single_country_data)
                        {
                          // print_r($single_catagories_data);
                          // die;

                      ?>
                    <tr>
                      <td scope="row" class="text-center"><?php echo $i; ?></td>
                     
                      <td><?php echo $single_country_data['CountryName'];?></td>
                     
                
                      <td class="text-center">
                      <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu" style="">
                <a class="dropdown-item" href="<?php echo base_url(); ?>edit_country/<?= $single_country_data['CountryID'] ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item del_country" href="javascript:void(0);" data-id="<?= $single_country_data['CountryID'] ?>"> <i class="bx bx-trash me-1"></i> Delete</a>
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
   $(document).on('click', '.del_country', function () 
{
   var country_ids = $(this).attr("data-id");

   // SweetAlert confirmation prompt
   Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#333',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
   }).then((result) => {
      if (result.isConfirmed) {
         $.ajax({
            type: 'POST',
            url: 'del_country',
            data: { country_ids: country_ids },
            success: function(data) {
               if (data == 1) {
                  Swal.fire({
                     icon: "success",
                     title: "Deleted!",
                     text: "Record deleted successfully.",
                     timer: 2000,
                     showConfirmButton: false
                  }).then(function () {
                     window.location.reload(); // Reload the page after 2 seconds
                  });
               } else {
                  // Handle any other response, like an error
                  Swal.fire({
                     icon: "error",
                     title: "Failed",
                     text: "An error occurred. Could not delete the record.",
                  });
               }
            },
            error: function() {
               // Error handling in case of AJAX failure
               Swal.fire({
                  icon: "error",
                  title: "Failed",
                  text: "Could not complete the request.",
               });
            }
         });
      }
   });
});

</script>