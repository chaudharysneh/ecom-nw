<?= $this->include('header') ?>

<!-- Breadcrumbs -->
<div class="breadcrumbs">
  <div class="container-fluid px-5">
    <div class="breadcrumbs-inner">
      <a href="<?php echo base_url(); ?>"><i class="fa-solid fa-house m-2"></i>Home</a>
      <span class="separator"><i class="fa-solid fa-chevron-right"></i></span>
      <a href="<?php echo base_url('my_account'); ?>">My Account</a>
      <span class="separator"><i class="fa-solid fa-chevron-right"></i></span>
      <span class="current-link">My Addresses</span>
    </div>
  </div>
</div>
<!-- End Breadcrumbs -->

<!-- My Address Area -->
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
              <a href="<?php echo base_url('orders'); ?>" class="nav-link"><i class="fa fa-list"></i> My Orders</a>
              <a href="<?php echo base_url('adresses'); ?>" class="nav-link active"><i class="fa fa-address-card"></i> Address</a>
              <a href="<?php echo base_url('wishlist'); ?>" class="nav-link"><i class="fa fa-heart"></i> My Wishlist</a>
              <a href="<?php echo base_url('logout'); ?>" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a>
            </ul>
          </div>
        </div>
      </div>
      
      <div id="customer-orders" class="col-lg-9 col-12 mb-5">
        <div class="card account-card">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-2">
              <h2>My Addresses</h2>
            </div>
            <div class="card-subtitle">Manage and update your shipping and billing addresses.</div>

            <div class="row mt-4">
              <?php
              if (!empty($all_address_data)) {
                foreach ($all_address_data as $key => $single_order_data) {
                  ?>
                  <div class="col-md-6 mb-4">
                    <div class="checkout-form card p-4 h-100 d-flex flex-column justify-content-between">
                      <div>
                        <div class="d-flex align-items-center gap-2 mb-3">
                          <span class="profile-badge" style="font-size: 10px; padding: 2px 8px;">Address #<?php echo ($key + 1); ?></span>
                        </div>
                        <h4 class="font-weight-bold mb-2 text-dark" style="font-family: 'Outfit', sans-serif; font-size: 16px;">
                          <?php echo esc($single_order_data['first_name'] . ' ' . $single_order_data['last_name']); ?>
                        </h4>
                        <p class="text-muted mb-1" style="font-family: 'Poppins', sans-serif; font-size: 13px; line-height: 1.6;">
                          <i class="fa fa-map-marker text-muted mr-2"></i><?php echo esc($single_order_data['address']); ?><br>
                          <?php echo esc($single_order_data['city'] . ', ' . $single_order_data['state'] . ', ' . $single_order_data['country']); ?>
                        </p>
                        <p class="text-muted mb-1" style="font-family: 'Poppins', sans-serif; font-size: 13px;">
                          <strong>ZIP:</strong> <?php echo esc($single_order_data['zipcode']); ?>
                        </p>
                        <p class="text-muted mb-0" style="font-family: 'Poppins', sans-serif; font-size: 13px;">
                          <strong>Phone:</strong> <?php echo esc($single_order_data['number']); ?>
                        </p>
                      </div>
                      <div class="text-right mt-4">
                        <a href="<?php echo base_url(); ?>edit_address/<?= base64_encode($single_order_data['id']); ?>"
                           class="btn-action-premium"><i class="fa fa-edit"></i> Edit Address</a>
                      </div>
                    </div>
                  </div>
                  <?php
                }
              } else {
                ?>
                <div class="col-12 text-center py-5">
                  <i class="fa fa-map-o text-muted mb-3" style="font-size: 40px;"></i>
                  <p class="text-muted">No addresses saved. Add an address during checkout to see it here.</p>
                </div>
                <?php
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ End My Address Area -->

<?= $this->include('footer') ?>