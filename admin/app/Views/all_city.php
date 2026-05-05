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
		<span class="addprobtn2">City </span><a href="<?php echo base_url(); ?>add_city"><span class="addprobtn">Add City</span></a>
	</div>
</div>
	<div class="card mt-3">
		<div class='card-body '>
			<table class="table mt-3 mb-3" id="example" >
      <thead>
        <tr>
          <th class="text-center">Sr.No</th>    
           <th>State Name</th>
           <th>City Name</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      <?php
                      $i=1;
                        foreach($allcitydata as $single_city_data)
                        {
                         ?>
                    <tr>
                      <td scope="row" class="text-center"><?php echo $i; ?></td>
                     
                      <td>
                          <?php 
                          $cust = new App\Models\StateModel();
                          $customers = $cust->where('StateID', $single_city_data['StateID'])->get()->getRow();
                        //  print_r($customers);die;
                         //echo $cust->getLastQuery(); die;
                         echo $customers->StateName;
                      ?>
                      </td>
                     <td><?php echo $single_city_data['CityName'];?></td>
                
                      <td class="text-center">
                      <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu" style="">
                <a class="dropdown-item" href="<?php echo base_url(); ?>edit_city/<?= $single_city_data['CityID'] ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item del_city" href="javascript:void(0);" data-id="<?= $single_city_data['CityID'] ?>"> <i class="bx bx-trash me-1"></i> Delete</a>
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
    $(document).on('click', '.del_city', function () {
    var city_ids = $(this).attr("data-id");

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
                url: 'del_city',
                data: { city_ids: city_ids },
                success: function (data) {
                    console.log(data);

                    if (data == 1) {
                        // Success alert using SweetAlert
                        Swal.fire({
                            icon: 'success',
                            title: 'Deleted!',
                            text: 'Record deleted successfully.',
                            timer: 2000,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.reload(); // Reload the page after 2 seconds
                        });
                    } else {
                        // Handle other response scenarios
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Failed to delete the record!',
                        });
                    }
                },
                error: function () {
                    // Handle AJAX errors
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred while processing your request.',
                    });
                }
            });
        }
    });
});

</script>