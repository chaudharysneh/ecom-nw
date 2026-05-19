<?= $this->include('header') ?>

<!-- Breadcrumbs -->
<div class="breadcrumbs">
  <div class="container-fluid px-5">
    <div class="breadcrumbs-inner">
      <a href="<?php echo base_url(); ?>"><i class="fa-solid fa-house m-2"></i>Home</a>
      <span class="separator"><i class="fa-solid fa-chevron-right"></i></span>
      <a href="<?php echo base_url('my_account'); ?>">My Account</a>
      <span class="separator"><i class="fa-solid fa-chevron-right"></i></span>
      <span class="current-link">Change Password</span>
    </div>
  </div>
</div>
<!-- End Breadcrumbs -->

<!-- Change Password Area -->
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
              <a href="<?php echo base_url('change_password'); ?>" class="nav-link active"><i class="fa fa-lock"></i> Change Password</a>
              <a href="<?php echo base_url('orders'); ?>" class="nav-link"><i class="fa fa-list"></i> My Orders</a>
              <a href="<?php echo base_url('adresses'); ?>" class="nav-link"><i class="fa fa-address-card"></i> Address</a>
              <a href="<?php echo base_url('wishlist'); ?>" class="nav-link"><i class="fa fa-heart"></i> My Wishlist</a>
              <a href="<?php echo base_url('logout'); ?>" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a>
            </ul>
          </div>
        </div>
      </div>
      
      <div class="col-lg-9 col-12 mb-5">
        <div class="card account-card">
          <div class="card-body">
            <h2 class="mb-2">Change Password</h2>
            <div class="card-subtitle">Keep your account secure by updating your password regularly.</div>

            <form id="change_password_data">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group premium-form-group">
                    <label for="current_password">Old Password</label>
                    <input id="current_password" name="current_password" type="password" class="premium-input" maxlength="32" placeholder="Enter your current password">
                    <span id="current_password_err"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group premium-form-group">
                    <label for="new_password">New Password</label>
                    <input name="new_password" id="new_password" type="password" class="premium-input" maxlength="32" placeholder="Enter your new password">
                    <span id="new_password_err"></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group premium-form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input name="confirm_password" id="confirm_password" type="password" class="premium-input" maxlength="32" placeholder="Re-enter your new password">
                    <span id="confirm_password_err"></span>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-md-12">
                  <span id="success_msg"></span>
                  <button type="button" id="change_password" class="btn-premium"><i class="fa fa-save"></i> Save new password</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ End Change Password Area -->

<?= $this->include('footer') ?>