<?= $this->include('header') ?>
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<style>
	table.dataTable tbody th,
	table.dataTable tbody td {
		padding: 8px 10px !important;
	}

	.main-category {
		display: none;
	}

	table.dataTable.no-footer {
		border-bottom: none !important;
	}

	table.dataTable thead th,
	table.dataTable thead td {
		border-bottom: 1px solid #f6f6f6 !important;
	}

	.dataTables_wrapper .dataTables_paginate .paginate_button {
		padding: 0.2em 1em !important;
		line-height: 24px !important;
		border-radius: 50% !important;
	}

	/* Custom style for small screens */
	.table-responsive-custom {
		overflow-x: auto;
		-webkit-overflow-scrolling: touch;
	}

	.table-responsive-custom table {
		width: 100%;
		white-space: nowrap;
	}
</style>

<!-- Breadcrumbs -->
<div class="breadcrumbs">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="bread-inner">
					<ul class="bread-list">
						<li><a href="<?php echo base_url(
							'/'
						); ?>">Home<i class="ti-arrow-right"></i></a></li>
						<li class="active"><a href="<?php echo base_url(
							'orders'
						); ?>">My Orders</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->

<!-- Shopping Cart -->
<div class="shopping-cart section">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-12">
				<!--
			  *** CUSTOMER MENU ***
			  _________________________________________________________
			  -->
				<div class="card sidebar-menu">
					<div class="card-header customer_heading">
						<h4 class="card-title">Customer Section</h4>
					</div>
					<div class="card-body">
						<ul class="nav nav-pills flex-column">

							<a href="<?php echo base_url(
								'my_account'
							); ?>" class="nav-link"><i class="fa fa-user"></i> My Account</a>

							<a href="<?php echo base_url(
								'change_password'
							); ?>" class="nav-link"><i class="fa fa-lock"></i> Change Password</a>

							<a href="<?php echo base_url(
								'orders'
							); ?>" class="nav-link active"><i class="fa fa-list"></i> My Orders</a>

							<a href="<?php echo base_url(
								'adresses'
							); ?>" class="nav-link"><i class="fa fa-address-card"></i> Address</a>


							<a href="<?php echo base_url(
								'wishlist'
							); ?>" class="nav-link"><i class="fa fa-heart"></i> My Wishlist</a>



							<a href="<?php echo base_url(
								'logout'
							); ?>" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a>

						</ul>
					</div>
				</div>
				<!-- /.col-lg-3-->
				<!-- *** CUSTOMER MENU END ***-->
			</div>
			<div id="customer-orders" class="col-lg-9 mb-5">
				<div class="card account-card">
					<div class="card-body">
						<h2 class="">My orders</h2>
						<p class="">Your orders on one place.</p>
						<p class="text-muted">If you have any questions, please feel free to <a
								href="contact.html">contact us</a>, our customer service center is working for you 24/7.
						</p>
						<hr>
						<div class="table-responsive">
							<table id="orders-table" class="table table-hover order-table">
								<thead>
									<tr>
										<th>Sr No.</th>
										<th>Order</th>
										<th>Date</th>
										<th>Total</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>

								<tbody>
									<?php
									$i = 1;
									foreach ($all_order_data as $single_order_data) {
										//   print_r($single_order_data);
										// die;
									
										?>
										<tr>
											<td scope="row"><?php echo $i; ?></td>

											<td><?php echo $single_order_data['OrderNumber']; ?></td>
											<td><?php echo $single_order_data['OrderDate']; ?></td>
											<td><?php echo $single_order_data['TotalAmount']; ?></td>
											<td class="text-capitalize">
												<?php echo $single_order_data['OrderStatus']; ?>
											</td>
											<td>
												<a class="btn btn-primary customer-order-btn rounded m-0 mb-2 mt-2 link-text"
													href="<?php echo base_url('invoice/' . $single_order_data['OrderID']); ?>"
													target="_blank">
													<i class="fa fa-download mx-1" aria-hidden="true"></i>Invoice
												</a>

												<a href="<?php echo base_url(); ?>customer_order/<?= base64_encode($single_order_data['OrderID']) ?>"
													class="btn customer-order-btn link-text m-0 mb-2 mt-2 rounded">View</a>
												<!-- </td> -->
												<?php if ($single_order_data['OrderStatus'] !== 'Cancelled') { ?>
													<button class="btn px-3 link-text cancel-order-btn m-0 mb-2 mt-2 rounded"
														data-orderid="<?= $single_order_data['OrderID'] ?>"
														data-userid="<?= $single_order_data['UserID'] ?>">
														Cancel
													</button>
												<?php } ?>
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
		</div>
		<!--/ End Shopping Cart -->
	</div>

	<?= $this->include('footer') ?>

	<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


	<script>
		$(document).ready(function () {
    $('#orders-table').DataTable({
        "pageLength": 5,
        "lengthChange": false,
        "responsive": true
    });

    // Event delegation for dynamically loaded cancel buttons
    $('#orders-table').on('click', '.cancel-order-btn', function () {
        var orderId = $(this).data('orderid');
        var userId = $(this).data('userid');

        // SweetAlert2 confirmation
        Swal.fire({
            title: 'Are you sure?',
            text: "Are you sure you want to cancel this order?",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'No!',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, cancel it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // AJAX request to cancel the order
                $.ajax({
                    url: '<?php echo base_url("cancel_order"); ?>',
                    type: 'POST',
                    data: {
                        OrderID: orderId,
                        userId: userId
                    },
                    success: function (response) {
                        var result = JSON.parse(response);
                        if (result.status === 'success') {
                            Swal.fire(
                                'Cancelled!',
                                result.message,
                                'success'
                            ).then(() => {
                                location.reload(); // Reload page after success
                            });
                        } else {
                            Swal.fire(
                                'Error!',
                                result.message,
                                'error'
                            );
                        }
                    },
                    error: function (xhr, status, error) {
                        Swal.fire(
                            'Error!',
                            'An error occurred while canceling the order: ' + error,
                            'error'
                        );
                    }
                });
            }
        });
    });
});
	</script>