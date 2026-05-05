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
.addprobtn_shipping {
    float: right;
    /* background: #f7941d; */
    /* color: white; */
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
.switch {
    position: relative;
    display: inline-block;
    width: 60px;
    height: 29px;
    margin-top: 7px;
    margin-left: 840px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
    position: absolute;
    content: "";
    height: 20px;
    width: 23px;
    left: 4px;
    bottom: 5px;
    background-color: white;
    -webkit-transition: .4s;
    transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
<?= $this->include('templates/header') ?>
<div class="table-responsive text-nowrap m-5">
	<div class="card">
	<div class="card-body p-0" style="display:flex;align-items:flex-start;justify-content:space-between;width:100% !important;">
         <div>
             <span class="addprobtn2">Shipping</span>
         </div>
        <div>
        <?php 
        if ($enable_disable == 1)
        {
            ?>
        <a href="<?php echo base_url(); ?>add_shipping">
        <span class="addprobtn">Add Shipping</span></a>
        <?php 
        }
        else 
        {
        ?>
         <a href="#" onclick="return false;">
        <span class="addprobtn">Add Shipping</span>
        </a>
        <?php 
        }
        ?>  
        <label class="mx-4 switch">
            <input type="checkbox" <?=$enable_disable == 1 ?'checked':'' ?> id="statusCheckbox">
            <span class="slider round"></span>
        </label>
        </div>
	</div>
</div>
	<div class="card mt-3">
		<div class='card-body'>
			<table class="table mt-3 mb-3" id="example" >
      <thead>
        <tr>
            <th class="text-center">Sr.No</th> 
            <th class="">Shipping Name</th>
            <th>Zone</th>
            <th class="">Rate</th>
            <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">



                      <?php
                     $i=1;
                       foreach($all_shipping_data as $single_banners_data)
                       {
                        //   print_r($single_banners_data);
                          // die;

                      ?>
                    <tr>
                      <td scope="row" class="text-center"><?php  echo $i; ?></td>
                      <td><?php echo $single_banners_data['MethodName'];?></td>
                      <td><?php echo implode(',',json_decode($single_banners_data['ZoneName']));?></td>
                      <td><?php echo $single_banners_data['Price'];?></td>
                      <?php  if ($enable_disable == 1)
                        {
                        ?>
                      <td class="text-center">
                        <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
                        <div class="dropdown-menu" style="">
                            <a class="dropdown-item" href="<?php echo base_url(); ?>edit_shipping/<?= $single_banners_data['ZoneID'] ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                            <a class="dropdown-item del_shipping" href="javascript:void(0);" data-id="<?= $single_banners_data['ZoneID'] ?>"> <i class="bx bx-trash me-1"></i> Delete</a>
                        
                        </div>
                        </div>
                    </td>
                    <?php 
                    }
                    else 
                    {
                        ?>
                        <td class="text-center">
                        <div class="dropdown">
                            <button disabled type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
                        </div>
                    </td>
                    <?php
                    }
                    ?>

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
        confirmButtonColor: '#333',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Proceed with AJAX request if confirmed
            $.ajax({
                type: 'POST',
                url: 'delete_shipping',
                data: { zone_ids: zone_ids },
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Fetch the initial status
        function fetchStatus() {
    $.ajax({
        url: '<?php echo base_url("shipping_getStatus"); ?>',
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            updateStatusUI(response.status);
            console.log(response.status);
        },
        error: function () {
            // alert('Failed to fetch the current status.');
        }
    });
}

function updateStatusUI(status) {
    const statusButton = $('#statusButton');
    const statusText = $('#statusText');
    const statusCheckbox = $('#statusCheckbox');  // Assuming the checkbox has this ID

    // Corrected comparison to handle string values
    if (status === "1") {
        statusButton.removeClass('btn-danger').addClass('btn-success').attr('title', 'Enabled').text('Disable Shipping');
        statusText.text('Shipping is Enabled');
        statusCheckbox.prop('checked', true);  // Enable checkbox (checked)
    } else {
        statusButton.removeClass('btn-success').addClass('btn-danger').attr('title', 'Disabled').text('Enable Shipping');
        statusText.text('Shipping is Disabled');
        statusCheckbox.prop('checked', false);  // Disable checkbox (unchecked)
    }
}
$('#statusCheckbox').on('change', function () {
    const newStatus = $(this).prop('checked') ? 1 : 0; // 1 for checked (active), 0 for unchecked (inactive)

    $.ajax({
        url: '<?php echo base_url("shipping_toggleStatus"); ?>',
        type: 'POST',
        data: { 
            status: newStatus // Only send the status value
        },
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                console.log(response.status);

                // Check if `is_check` is 1 or 0
                const statusMessage = newStatus === 1 ? 'Shipping is Enabled' : 'Shipping is Disabled';
                const swalText = newStatus === 1 ? 'Shipping has been Enabled.' : 'Shipping has been Disabled.';

                Swal.fire({
                    icon: 'success',
                    title: "Success",
                    text: swalText,
                    timer: 2000,
                    showConfirmButton: false
                }).then(function () {
                    window.location.reload();
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Failed to update shipping status.',
                    timer: 2000,
                    showConfirmButton: false
                });
            }
        },
        error: function () {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'There was an issue with the request.',
                timer: 2000,
                showConfirmButton: false
            });
        }
    });
});



        // Fetch initial status on page load
        fetchStatus();
    });
</script>

