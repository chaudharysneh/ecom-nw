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
    width:15%;
}
.dataTables_empty {
    text-align: center;
}
</style>
<?= $this->include('templates/header') ?>
<div class="table-responsive text-nowrap m-5">
	<div class="card">
	<div class="card-body p-0">
		<span class="addprobtn2">Shipping</span><a href="<?php echo base_url(); ?>add_shipping_methods"><span class="addprobtn">Add Shipping Methods</span></a>
	</div>
</div>
	<div class="card mt-3">
		<div class='card-body '>
			<table class="table mt-3 mb-3" id="example" >
      <thead>
        <tr>
          <th class="text-center">Sr.No</th> 
         <th class="">Shipping Methods</th>
      
     
       
          
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">



                      <?php
                     $i=1;
                       foreach($all_shipping_methods as $single_banners_data)
                       {
                          // print_r($single_banners_data);
                          // die;

                      ?>
                    <tr>
                      <td scope="row" class="text-center"><?php  echo $i; ?></td>
                      <td><?php echo $single_banners_data['MethodName'];?></td>
                      
                
                     
                   
                     
                     
                
                      <td class="text-center">
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu" style="">
                   <a class="dropdown-item" href="<?php echo base_url(); ?>edit_shipping_methods/<?= $single_banners_data['MethodID'] ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <!--<a class="dropdown-item del_shipping" href="javascript:void(0);" data-id="<?= $single_banners_data['MethodID'] ?>"> <i class="bx bx-trash me-1"></i> Delete</a>-->
               
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
<script> 
$(document).on('click', '.del_shipping', function () {
    var zone_ids = $(this).attr("data-id"); // Get the zone ID

    // Show confirmation dialog using SweetAlert
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Proceed with AJAX request if confirmed
            $.ajax({
                type: 'POST',
                url: 'delete_shipping_methods',
                data: { shipping_ids: shipping_ids },
                success: function (data) {
                    console.log(data);
                    if (data == 1) {
                        // Show success message
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: 'Record deleted successfully.',
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            // Reload the page after the success message
                            window.location.reload();
                        });
                    } else {
                        // Show an error message if the deletion was not successful
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'There was a problem deleting the record.',
                        });
                    }
                },
                error: function () {
                    // Handle AJAX error
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: 'An error occurred while processing your request.',
                    });
                }
            });
        }
    });
});


</script>
