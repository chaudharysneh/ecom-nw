<?= $this->include('header') ?>

<!-- Breadcrumbs -->
<div class="breadcrumbs">
  <div class="container-fluid px-5">
    <div class="breadcrumbs-inner">
      <a href="<?php echo base_url(); ?>"><i class="fa-solid fa-house m-2"></i>Home</a>
      <span class="separator"><i class="fa-solid fa-chevron-right"></i></span>
      <a href="<?php echo base_url('my_account'); ?>">My Account</a>
      <span class="separator"><i class="fa-solid fa-chevron-right"></i></span>
      <a href="<?php echo base_url('adresses'); ?>">Addresses</a>
      <span class="separator"><i class="fa-solid fa-chevron-right"></i></span>
      <span class="current-link">Edit Address</span>
    </div>
  </div>
</div>
<!-- End Breadcrumbs -->

<!-- Shopping Cart Area -->
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
      
      <div class="col-lg-9 col-12 mb-5">
        <div class="card account-card">
          <div class="card-body">
            <h2 class="mb-2">Edit Address</h2>
            <div class="card-subtitle">Review or update your selected shipping/billing address details below.</div>

            <form id="edit_address_form_data">
              <input type="hidden" name="add_id" id="add_id" value="<?php echo $single_address_data['id']; ?>">
              <input type="hidden" id="base_url" value="<?php echo base_url('adresses'); ?>">
              <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>" />

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group premium-form-group">
                    <label for="firstname">Firstname</label>
                    <input id="firstname" name="firstname" type="text" class="premium-input" maxlength="20"
                      value="<?php echo esc($single_address_data['first_name']); ?>" disabled>
                    <span id="firstname_err"></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group premium-form-group">
                    <label for="lastname">Lastname</label>
                    <input id="lastname" name="lastname" type="text" class="premium-input" maxlength="20"
                      value="<?php echo esc($single_address_data['last_name']); ?>" disabled>
                    <span id="lastname_err"></span>
                  </div>
                </div>
              </div>
              <!-- /.row-->

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group premium-form-group">
                    <label for="address1">Address</label>
                    <textarea class="premium-input" id="address1" name="address1"
                      maxlength="110" disabled><?php echo !empty($single_address_data['address']) ? esc($single_address_data['address']) : 'NA'; ?></textarea>
                    <span id="cus_address1_err"></span>
                  </div>
                </div>
              </div>
              <!-- /.row-->

              <div class="row">
                <div class="col-md-6 col-lg-4">
                  <div class="form-group premium-form-group">
                    <label for="country">Country</label>
                    <select id="country" name="country" class="premium-input" disabled>
                      <option value="">Select Country</option>
                      <?php if (!empty($country)) {
                        foreach ($country as $con) { ?>
                          <option value="<?php echo $con['CountryID']; ?>" <?php if ($con['CountryID'] == $profile_data['UserCountry']) echo "selected"; ?>>
                            <?php echo esc($con['CountryName']); ?>
                          </option>
                        <?php }
                      } ?>
                    </select>
                    <span id="country_err"></span>
                  </div>
                </div>

                <div class="col-md-6 col-lg-4">
                  <div class="form-group premium-form-group">
                    <label for="state">State</label>
                    <select id="state" name="state" class="premium-input" disabled>
                      <option value="">Select State</option>
                      <?php if (!empty($state)) {
                        foreach ($state as $states) { ?>
                          <option value="<?php echo $states['StateID']; ?>" <?php if ($states['StateID'] == $profile_data['UserState']) echo "selected"; ?>>
                            <?php echo esc($states['StateName']); ?>
                          </option>
                        <?php }
                      } ?>
                    </select>
                    <span id="state_err"></span>
                  </div>
                </div>

                <div class="col-md-6 col-lg-4">
                  <div class="form-group premium-form-group">
                    <label for="city">City</label>
                    <select id="city" name="city" class="premium-input" disabled>
                      <option value="">Select City</option>
                      <?php if (!empty($city)) {
                        foreach ($city as $citys) { ?>
                          <option value="<?php echo $citys['CityID']; ?>" <?php if ($citys['CityID'] == $profile_data['UserCity']) echo "selected"; ?>>
                            <?php echo esc($citys['CityName']); ?>
                          </option>
                        <?php }
                      } ?>
                    </select>
                    <span id="city_err"></span>
                  </div>
                </div>
              </div>
              <!-- /.row-->

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group premium-form-group">
                    <label for="zip">ZIP</label>
                    <input id="zip" name="zip" type="number" class="premium-input" maxlength="10"
                      value="<?php echo esc($single_address_data['zipcode']); ?>" disabled>
                    <span id="zip_err"></span>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group premium-form-group">
                    <label for="phone">Telephone</label>
                    <input id="phone" name="phone" type="number" class="premium-input" maxlength="12"
                      value="<?php echo esc($single_address_data['number']); ?>" disabled>
                    <span id="phone_err"></span>
                  </div>
                </div>
              </div>

              <div class="row mt-3">
                <div class="col-md-12">
                  <button type="button" id="edit_profile_btn" class="btn-premium"><i class="fa fa-edit"></i> Edit Address</button>
                  <button type="button" id="edit_address_form" class="btn-premium profile-btn-hidden"><i class="fa fa-save"></i> Save changes</button>
                  <span id="msg"></span>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--/ End Shopping Cart Area -->

<?= $this->include('footer') ?>

<script>
  $(document).ready(function() {
    $('#edit_profile_btn').on('click', function() {
      // Enable all form elements
      $('#edit_address_form_data').find('input, textarea, select').removeAttr('disabled');
      // Show the Save changes button by removing the hidden class
      $('#edit_address_form').removeClass('profile-btn-hidden');
      // Hide the Edit Address button by adding the hidden class
      $(this).addClass('profile-btn-hidden');
    });
  });
</script>