<?= $this->include('header') ?>

<?php
$AllsettingsModel = new \App\Models\Allsettingsmodel();
$all_setting_data = $AllsettingsModel->first();
?>

<!-- Breadcrumbs -->
<div class="breadcrumbs">
  <div class="container-fluid px-5">
    <div class="breadcrumbs-inner">
      <a href="<?php echo base_url(); ?>"><i class="fa-solid fa-house m-2"></i>Home</a>
      <span class="separator"><i class="fa-solid fa-chevron-right"></i></span>
      <a href="<?php echo base_url('my_account'); ?>">My Account</a>
      <span class="separator"><i class="fa-solid fa-chevron-right"></i></span>
      <span class="current-link">My Wishlist</span>
    </div>
  </div>
</div>
<!-- End Breadcrumbs -->

<!-- My Wishlist Area -->
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
              <a href="<?php echo base_url('adresses'); ?>" class="nav-link"><i class="fa fa-address-card"></i> Address</a>
              <a href="<?php echo base_url('wishlist'); ?>" class="nav-link active"><i class="fa fa-heart"></i> My Wishlist</a>
              <a href="<?php echo base_url('logout'); ?>" class="nav-link"><i class="fa fa-sign-out"></i> Logout</a>
            </ul>
          </div>
        </div>
      </div>
      
      <div id="customer-order" class="col-lg-9 col-12">
        <div class="card account-card">
          <div class="card-body">
            <h2 class="mb-2">My Wishlist</h2>
            <div class="card-subtitle">Keep track of all your favorite items in one place and view details or remove them anytime.</div>
            <div class="row wishlist-products-grid">
              <?php if (!empty($all_wishlist_data)) {
                foreach ($all_wishlist_data as $wishlist_data) { 
                  $p_img = json_decode($wishlist_data['ProductImage']);
                  $imageSrc = !empty($p_img) ? base_url().'admin/public/assets/img/product_images/'. $p_img[0] : base_url().'admin/public/assets/img/product_images/default.jpg';
                  $price = $wishlist_data['Sale_ProductPrice'] ?? $wishlist_data['ProductPrice'] ?? 0;
                  $oldPrice = $wishlist_data['ProductPrice'] ?? 0;
                  ?> 
                  <div class="col-md-4">
                    <div class="modern-product-card">
                      <div class="product-header">
                        <span class="badge-new" style="background: #e11d48;">WISHLIST</span>
                        <div class="wishlist-action">
                          <button class="remove_whishlist" 
                                  data-id='<?=$wishlist_data["wishlist_id"]?>' 
                                  data-userid='<?=$wishlist_data["UserID"]?>' 
                                  data-productid='<?=$wishlist_data["ProductID"]?>'
                                  style="border: none; background: none; color: #7e7975; transition: color 0.2s; outline: none; cursor: pointer;"
                                  onmouseover="this.style.color='#EF4444'"
                                  onmouseout="this.style.color='#7e7975'">
                            <i class="fa-solid fa-trash-can" style="font-size: 15px;"></i>
                          </button>
                        </div>
                      </div>
                      <a href="<?php echo base_url($wishlist_data['slug']."/".'product_detail/'.base64_encode($wishlist_data['ProductID'])); ?>" class="product-img-wrap">
                        <img src="<?php echo $imageSrc; ?>" alt="<?php echo esc($wishlist_data['ProductName']); ?>">
                      </a>
                      <div class="product-body">
                        <div class="product-rating">
                          <div class="stars">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                          </div>
                          <span class="review-count">(<?php echo rand(20, 150); ?>)</span>
                        </div>
                        <h3 class="product-title" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100%;">
                          <a href="<?php echo base_url($wishlist_data['slug']."/".'product_detail/'.base64_encode($wishlist_data['ProductID'])); ?>" title="<?php echo esc($wishlist_data['ProductName']); ?>">
                            <?php echo esc($wishlist_data['ProductName']); ?>
                          </a>
                        </h3>
                        <div class="product-price">
                          <span class="current-price"><?php echo esc($all_setting_data['currency'] ?? '$'); ?><?php echo esc(number_format($price, 2)); ?></span>
                          <?php if ($oldPrice > $price) { ?>
                            <span class="old-price"><?php echo esc($all_setting_data['currency'] ?? '$'); ?><?php echo esc(number_format($oldPrice, 2)); ?></span>
                          <?php } ?>
                        </div>
                        <div class="product-buttons">
                          <form class="addtocartform" action="<?= base_url('addToCart') ?>" method="POST">
                            <input type="hidden" name="productId" value="<?php echo $wishlist_data['ProductID']; ?>">
                            <input type="hidden" name="quantity" value="1">
                            <input type="hidden" name="price" value="<?php echo $price; ?>">
                            <button type="submit" class="btn-add-cart">
                              <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                            </button>
                          </form>
                          <a href="<?php echo base_url($wishlist_data['slug']."/".'product_detail/'.base64_encode($wishlist_data['ProductID'])); ?>" class="btn-buy-now">Buy Now</a>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } 
              } else { ?>
                <div class="col-12 text-center py-5">
                  <i class="fa fa-heart-o text-muted mb-3" style="font-size: 40px;"></i>
                  <p class="text-muted">Your wishlist is empty. Explore our catalog and add items you love!</p>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
<!--/ End My Wishlist Area -->

<?= $this->include('footer') ?>

<script>
  $(document).on('click', '.remove_whishlist', function () {
    var this_ = $(this);
    var id = this_.attr('data-id');
    var userID = this_.attr('data-userID');
    var productID = this_.attr('data-productID');
    
    Swal.fire({
      title: 'Remove item?',
      text: "Are you sure you want to remove this product from your wishlist?",
      icon: 'warning',
      showCancelButton: true,
      cancelButtonText: 'No',
      confirmButtonColor: '#8C4E2D',
      cancelButtonColor: '#EF4444',
      confirmButtonText: 'Yes, remove it!'
    }).then((result) => {
      if (result.isConfirmed) {
        var data = {
          'userId': userID,
          'productID': productID,
        };
        
        $.ajax({
          url: '<?php echo base_url(); ?>api/removeFromWishList',
          type: "POST",
          data: data,
          dataType: 'html',
          success: function (response) {
            var res = JSON.parse(response);
            if (res.status === 'success') {
              Swal.fire({
                title: 'Removed!',
                text: 'Product removed from wishlist.',
                icon: 'success',
                confirmButtonColor: '#8C4E2D'
              }).then(() => {
                this_.closest('.col-md-4').remove();
                if ($('.modern-product-card').length === 0) {
                  location.reload();
                }
              });
            } else {
              Swal.fire({
                title: 'Error!',
                text: 'Could not remove product from wishlist.',
                icon: 'error',
                confirmButtonColor: '#8C4E2D'
              });
            }
          },
          error: function () {
            Swal.fire({
              title: 'Error!',
              text: 'An error occurred. Please try again.',
              icon: 'error',
              confirmButtonColor: '#8C4E2D'
            });
          }
        });
      }
    });
  });
</script>