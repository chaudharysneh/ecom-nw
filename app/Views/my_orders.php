<?= $this->include('header') ?>
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

<!-- Breadcrumbs -->
<div class="breadcrumbs">
  <div class="container-fluid px-5">
    <div class="breadcrumbs-inner">
      <a href="<?php echo base_url(); ?>"><i class="fa-solid fa-house m-2"></i>Home</a>
      <span class="separator"><i class="fa-solid fa-chevron-right"></i></span>
      <a href="<?php echo base_url('my_account'); ?>">My Account</a>
      <span class="separator"><i class="fa-solid fa-chevron-right"></i></span>
      <span class="current-link">My Orders</span>
    </div>
  </div>
</div>
<!-- End Breadcrumbs -->

<!-- My Orders Area -->
<div class="shopping-cart section">
  <div class="container-fluid px-5">
    <div class="row">
      <div class="col-lg-3 col-12">
        <!--
        *** CUSTOMER MENU ***
        _________________________________________________________
        -->
        <?php
        $session = session();
        $userId = $session->get('user_id');
        $userModel = new \App\Models\UserModel();
        $profile_data = $userModel->where('UserID', $userId)->first();

        $fullName = trim(($profile_data['UserFirstName'] ?? '') . ' ' . ($profile_data['UserLastName'] ?? ''));
        if (empty($fullName)) {
          $fullName = 'Customer';
        }
        $initials = '';
        if (!empty($profile_data['UserFirstName'])) {
          $initials .= strtoupper(substr($profile_data['UserFirstName'], 0, 1));
        }
        if (!empty($profile_data['UserLastName'])) {
          $initials .= strtoupper(substr($profile_data['UserLastName'], 0, 1));
        }
        if (empty($initials)) {
          $initials = 'C';
        }
        $email = $profile_data['UserEmail'] ?? '';
        $profilePic = $profile_data['UserProfile'] ?? '';
        ?>
        <div class="card sidebar-card">
          <div class="sidebar-profile-section">
            <div class="profile-avatar-container">
              <?php if (!empty($profilePic) && $profilePic != 'default.jpg' && file_exists('admin/public/upload_images/' . $profilePic)): ?>
                <img src="<?php echo base_url('admin/public/upload_images/' . $profilePic); ?>" alt="Profile Picture"
                  class="profile-avatar">
              <?php else: ?>
                <div class="profile-avatar-initials"><?php echo $initials; ?></div>
              <?php endif; ?>
            </div>
            <div class="profile-name"><?php echo esc($fullName); ?></div>
            <div class="profile-email"><?php echo esc($email); ?></div>
            <div class="profile-badge">Customer Portal</div>
          </div>
          <div class="sidebar-menu-section">
            <ul class="nav nav-pills flex-column">
              <a href="<?php echo base_url('my_account'); ?>" class="nav-link"><i class="fa fa-user"></i> My Account</a>
              <a href="<?php echo base_url('change_password'); ?>" class="nav-link"><i class="fa fa-lock"></i> Change Password</a>
              <a href="<?php echo base_url('orders'); ?>" class="nav-link active"><i class="fa fa-list"></i> My Orders</a>
              <a href="<?php echo base_url('adresses'); ?>" class="nav-link"><i class="fa fa-address-card"></i> Address</a>
              <a href="<?php echo base_url('wishlist'); ?>" class="nav-link"><i class="fa fa-heart"></i> My Wishlist</a>
              <a href="<?php echo base_url('logout'); ?>" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a>
            </ul>
          </div>
        </div>
      </div>
      
      <div id="customer-orders" class="col-lg-9 col-12 mb-5">
        <div class="card account-card">
          <div class="card-body">
            <h2 class="mb-2">My Orders</h2>
            <div class="card-subtitle">Track and view all your order history, invoices, and active statuses.</div>
            
            <div class="table-responsive">
              <table id="orders-table" class="table table-hover order-table">
                <thead>
                  <tr>
                    <th>Sr No.</th>
                    <th>Order #</th>
                    <th>Date</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th class="text-right">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($all_order_data as $single_order_data) {
                    $statusClass = 'status-' . strtolower(trim($single_order_data['OrderStatus']));
                    ?>
                    <tr>
                      <td><?php echo $i; ?></td>
                      <td class="font-weight-bold text-dark"><?php echo esc($single_order_data['OrderNumber']); ?></td>
                      <td><?php echo esc($single_order_data['OrderDate']); ?></td>
                      <td class="font-weight-bold text-dark">$<?php echo number_format($single_order_data['TotalAmount'], 2); ?></td>
                      <td>
                        <span class="status-badge <?php echo $statusClass; ?>">
                          <?php echo esc($single_order_data['OrderStatus']); ?>
                        </span>
                      </td>
                      <td class="text-right">
                        <div class="d-inline-flex gap-2">
                          <a class="btn-action-premium"
                             href="<?php echo base_url('invoice/' . $single_order_data['OrderID']); ?>"
                             target="_blank">
                            <i class="fa fa-download" aria-hidden="true"></i> Invoice
                          </a>

                          <a href="<?php echo base_url(); ?>customer_order/<?= base64_encode($single_order_data['OrderID']) ?>"
                             class="btn-action-premium"><i class="fa fa-eye"></i> View</a>

                          <?php if ($single_order_data['OrderStatus'] !== 'Cancelled') { ?>
                            <button class="btn-action-premium btn-action-cancel cancel-order-btn"
                              data-orderid="<?= $single_order_data['OrderID'] ?>"
                              data-userid="<?= $single_order_data['UserID'] ?>">
                              <i class="fa fa-times"></i> Cancel
                            </button>
                          <?php } ?>
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
    </div>
  </div>
</div>
<!--/ End My Orders Area -->

<?= $this->include('footer') ?>

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready(function () {
    $('#orders-table').DataTable({
      "pageLength": 5,
      "lengthChange": false,
      "responsive": true,
      "ordering": false
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
        confirmButtonColor: '#8C4E2D',
        cancelButtonColor: '#EF4444',
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
                Swal.fire({
                  title: 'Cancelled!',
                  text: result.message,
                  icon: 'success',
                  confirmButtonColor: '#8C4E2D'
                }).then(() => {
                  location.reload(); // Reload page after success
                });
              } else {
                Swal.fire({
                  title: 'Error!',
                  text: result.message,
                  icon: 'error',
                  confirmButtonColor: '#8C4E2D'
                });
              }
            },
            error: function (xhr, status, error) {
              Swal.fire({
                title: 'Error!',
                text: 'An error occurred while canceling the order: ' + error,
                icon: 'error',
                confirmButtonColor: '#8C4E2D'
              });
            }
          });
        }
      });
    });
  });
</script>