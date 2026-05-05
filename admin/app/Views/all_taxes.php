
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

div#customer_table_length label , div#customer_table_filter label {
    display: flex;
}

div#customer_table_filter input , div#customer_table_filter input {
    width:76%;
}
div#customer_table_filter {
    float: right;
}
div#example1_filter label {
    float: inline-end !important;
}

div#example2_filter label {
    float: inline-end !important;
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
    margin-left: 890px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}
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
            <span class="addprobtn2">All Tax</span>
        </div>
        <div>
        <?php 
        if ($enable_disable == 1)
        {
            ?>
        <a href="<?php echo base_url(); ?>add_tax">
        <span class="addprobtn mx-2">Add Tax</span></a>
        <?php 
        }
        else 
        {
        ?>
         <a href="#" onclick="return false;">
        <span class="addprobtn mx-2">Add Tax</span>
        </a>
        <?php 
        }
        ?> 
        <label class="mx-2 switch">
            <input type="checkbox" <?=$enable_disable == 1 ?'checked':'' ?> id="tax_Checkbox">
            <span class="slider round"></span>
        </label>
        </div>
    </div>
</div>
	<div class="card mt-3">
		<div class='card-body'>
		    
		    
		    
			<table class="table mt-3 mb-3" id="example">
            <thead>
        <tr>
            <th class="text-center">Sr No.</th>
            <th>Country</th>
            <th>State</th>
            <th>Zip</th>
            <th>City</th>
            <th>Tax Rate</th>
            <th>Tax Name</th>
            <th class="text-center">Action</th>
        </tr>
      </thead>
   <tbody class="table-border-bottom-0 tab_data">
    <?php if (!empty($all_taxes_data)) : ?>
     

        <?php $i = 1; ?>
        <?php foreach ($all_taxes_data as $single_taxes_data) : 
        // print_r($single_taxes_data);
        ?>
            <tr>
                <td class="text-center"><strong><?php echo $i++; ?></strong></td>
                 <td><?php if(!empty($single_taxes_data['CountryName'])) { echo $single_taxes_data['CountryName'];} else { echo "*" ;}  ?></td>
                  <td><?php if(!empty($single_taxes_data['StateName'])) { echo $single_taxes_data['StateName'];} else { echo "*" ;} ?></td>
                   <td><?php if($single_taxes_data['Zip'] == '*') { echo "*" ;} else {echo  $single_taxes_data['Zip'];} ?></td>
                    <td><?php if(!empty($single_taxes_data['CityName'])) { echo $single_taxes_data['CityName'];} else { echo "*";}  ?></td>
                
                 <td><?php echo $single_taxes_data['TaxRate']; ?></td>
                  <td><?php echo $single_taxes_data['TaxName']; ?></td>
                <?php  if ($enable_disable == 1)
                {
                ?>
                <td class="text-center">
                    <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-vertical-rounded"></i></button>
                        <div class="dropdown-menu" style="">
                            <a class="dropdown-item" href="<?php echo base_url(); ?>edit-taxes/<?= $single_taxes_data['TaxID'] ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                            <a class="dropdown-item del_taxes_type" href="javascript:void(0);" data-id="<?= $single_taxes_data['TaxID'] ?>"> <i class="bx bx-trash me-1"></i> Delete</a>
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
        <?php endforeach; ?>
    <?php endif; ?>
</tbody>
            </table>
		</div>
	</div>
    
  </div>

  <script>
    $(document).ready(function () 
    {
        function fetchStatus() {
        $.ajax({
            url: '<?php echo base_url("tax_getStatus"); ?>',
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
            const statusCheckbox = $('#tax_Checkbox');  

            // Corrected comparison to handle string values
            if (status === "1") {
                statusButton.removeClass('btn-danger').addClass('btn-success').attr('title', 'Enabled').text('Disable Tax');
                statusText.text('Tax is Enabled');
                statusCheckbox.prop('checked', true);  // Enable checkbox (checked)
            } else {
                statusButton.removeClass('btn-success').addClass('btn-danger').attr('title', 'Disabled').text('Enable Tax');
                statusText.text('Tax is Disabled');
                statusCheckbox.prop('checked', false);  // Disable checkbox (unchecked)
            }
        }

    $('#tax_Checkbox').on('change', function () {
        const newStatus = $(this).prop('checked') ? 1 : 0; 

        $.ajax({
            url: '<?php echo base_url("Tax_toggleStatus"); ?>',
            type: 'POST',
            data: { 
                status: newStatus // Only send the status value
            },
            dataType: 'json',
            success: function (response) {
                if (response.success) {
                    console.log(response.status);

                    // Check if `is_check` is 1 or 0
                    const statusMessage = newStatus === 1 ? 'Tax is Enabled' : 'Tax is Disabled';
                    const swalText = newStatus === 1 ? 'Tax has been Enabled.' : 'Tax has been Disabled.';

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
                        text: 'Failed to update Tax status.',
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
  


<?= $this->include('templates/footer') ?>