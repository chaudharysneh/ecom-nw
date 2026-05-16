<?= $this->include('header') ?>
<style>
  :root {
    --primary-color: #4a3427;
    --secondary-color: #4a3427;
    --light-bg: #f8f9fa;
    --border-color: #e0e0e0;
    --text-dark: #2c3e50;
    --text-light: #7f8c8d;
  }

  .main-category {
    display: none;
  }

  .btn {
    text-transform: capitalize !important;
  }

  .listing-shell {
    --sidebar-width: 270px;
  }

  .listing-sidebar {
    flex: 0 0 var(--sidebar-width);
    max-width: var(--sidebar-width);
  }

  .listing-content {
    flex: 1 1 calc(100% - var(--sidebar-width));
    max-width: calc(100% - var(--sidebar-width));
  }

  .sidebar-menu {
    border: none;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    border-radius: 16px;
    background: #fff;
  }

  .sidebar-menu .card-body {
    padding: 1.5rem;
  }

  #categoryDropdown {
    display: block !important;
    width: 100% !important;
    min-width: 100% !important;
  }

  .sidebar-menu .card-title {
    color: var(--text-dark);
    font-weight: 700;
    margin-bottom: 1rem;
    font-size: 1rem;
  }

  .category-menu {
    list-style: none;
    padding: 0;
    margin: 0;
    display: grid;
    gap: 0.5rem;
    width: 100%;
  }

  .category-menu li {
    margin-bottom: 0;
    width: 100%;
  }

  .category-menu .nav-link {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.75rem 1rem;
    color: var(--text-dark);
    background: #fff;
    border: 1px solid #f0f2f5;
    border-radius: 12px;
    transition: all 0.2s ease;
    font-size: 0.92rem;
    font-weight: 500;
    white-space: nowrap;
    width: 100%;
    max-width: 100%;
  }

  .category-menu .nav-link span:first-of-type {
    flex: 1 1 auto;
    min-width: 0;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  .category-menu .nav-link:hover {
    color: var(--primary-color);
    background: rgba(74, 52, 39, 0.06);
    border-color: rgba(74, 52, 39, 0.12);
    transform: translateX(3px);
    box-shadow: 0 6px 16px rgba(74, 52, 39, 0.08);
  }

  .category-menu .nav-link i {
    color: var(--primary-color);
    margin-right: 0.75rem;
    transition: transform 0.2s ease;
  }

  .category-menu .nav-link:hover i {
    transform: translateX(2px);
  }

  .category-menu .badge {
    color: var(--primary-color);
    font-weight: 700;
    font-size: 0.8rem;
    background: rgba(74, 52, 39, 0.08);
    border-radius: 999px;
    padding: 0.25rem 0.65rem;
    flex: 0 0 auto;
    min-width: 42px;
    margin-left: auto;
    text-align: center;
    float: none !important;
  }

  .category-menu hr {
    display: none;
  }

  .price-filter-section {
    border-bottom: none;
    padding-bottom: 0;
    margin-bottom: 0;
  }

  .price-filter-section h3 {
    font-size: 1rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 1rem;
  }

  .price-inputs {
    display: grid;
    grid-template-columns: 1fr auto 1fr;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1rem;
  }

  .price-inputs input {
    padding: 0.75rem 0.85rem;
    border: 1px solid var(--border-color) !important;
    border-radius: 12px;
    font-size: 0.92rem;
    color: var(--text-dark);
    text-align: center;
    background: #f8fafc !important;
    width: 100%;
    box-shadow: none !important;
  }

  .price-separator {
    color: var(--text-light);
    font-weight: 700;
    font-size: 0.95rem;
    text-align: center;
  }

  .price-range-wrapper {
    position: relative;
    margin: 1.5rem 0 0;
  }

  .simple-range-container {
    position: relative;
    margin: 1rem 0;
  }

  .simple-slider {
    width: 100%;
    height: 8px;
    background: #e0e0e0;
    border-radius: 4px;
    outline: none;
    -webkit-appearance: none;
    appearance: none;
    border: none !important;
    padding: 0 !important;
    cursor: pointer;
    position: relative;
  }

  .rangeValues {
    display: block;
    margin: 0.85rem 0 1rem;
    font-size: 0.95rem;
    color: var(--text-dark);
    font-weight: 600;
    text-align: center;
  }

  .simple-slider::-webkit-slider-runnable-track {
    width: 100%;
    height: 8px;
    background: linear-gradient(to right, var(--primary-color) 0%, var(--primary-color) var(--value, 50%), #e0e0e0 var(--value, 50%), #e0e0e0 100%);
    border-radius: 4px;
    cursor: pointer;
  }

  .simple-slider::-moz-range-track {
    width: 100%;
    height: 8px;
    background: linear-gradient(to right, var(--primary-color) 0%, var(--primary-color) var(--value, 50%), #e0e0e0 var(--value, 50%), #e0e0e0 100%);
    border-radius: 4px;
    cursor: pointer;
  }

  .simple-slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 22px;
    height: 22px;
    border-radius: 50%;
    background: var(--primary-color);
    border: 3px solid #fff;
    box-shadow: 0 10px 20px rgba(74, 52, 39, 0.2);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    margin-top: -7px;
  }

  .simple-slider::-webkit-slider-thumb:hover {
    transform: scale(1.08);
    box-shadow: 0 14px 28px rgba(74, 52, 39, 0.25);
  }

  .simple-slider::-moz-range-thumb {
    width: 22px;
    height: 22px;
    border-radius: 50%;
    background: var(--primary-color);
    cursor: pointer;
    border: 3px solid #fff;
    box-shadow: 0 10px 20px rgba(74, 52, 39, 0.2);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
  }

  .simple-slider::-moz-range-thumb:hover {
    transform: scale(1.08);
    box-shadow: 0 14px 28px rgba(74, 52, 39, 0.25);
  }

  .range-labels {
    display: flex;
    justify-content: space-between;
    margin-top: 0.5rem;
    font-size: 11px;
    color: var(--text-light);
  }

  .bbb_deals_image img.product_image {
    max-width: 100%;
    max-height: 100%;
    width: auto;
    object-fit: contain;
    height: 130px;
  }

  .modal-content {
    border-radius: 16px !important;
  }

  .ui-slider-horizontal .ui-slider-handle {
    top: -0.5em;
    margin-left: -.6em;
  }

  .ui-slider-range {
    left: 0%;
    width: 100%;
    background: var(--primary-color) !important;
  }

  .ui-slider-handle {
    left: 100%;
    border-radius: 50%;
    background: #fff !important;
    border: 6px solid var(--primary-color) !important;
  }

  .ct-heart i {
    color: #999999;
    font-size: 20px;
    transition: all ease 0.3s;
  }

  .ct-heart {
    height: 40px;
    width: 40px;
    line-height: 47px;
    background: #ffffff;
    border-radius: 5px;
    border: 1px solid #ddd;
    padding-right: 10px !important;
    transition: all ease 0.3s;
  }

  .ct-heart:hover {
    background-color: var(--primary-color);
    border: 1px solid var(--primary-color);
  }

  .ct-heart:hover i,
  .ct-heart:hover .remove_wishlist {
    color: #fff !important;
  }

  .product-listing-page {
    padding: 0;
  }

  .product-listing-page .container-fluid {
    padding-left: 15px;
    padding-right: 15px;
  }

  .product-listing-page .sidebar-menu {
    border: none;
    border-radius: 16px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08) !important;
  }

  .product-listing-page .sidebar-menu .card-body {
    padding: 1.5rem;
  }

  .product-listing-page .products-header,
  .product-listing-page .info-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    min-height: 58px;
    margin: 0 0 1.5rem;
    padding: 1rem 1.5rem !important;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
  }

  .pagination-wrapper {
    display: flex !important;
    justify-content: center !important;
    align-items: center !important;
    margin: 2.5rem 0 !important;
    width: 100% !important;
  }

  .pagination-wrapper .pagination {
    display: flex !important;
    flex-wrap: nowrap !important;
    gap: 0.25rem !important;
    margin: 0 !important;
    padding: 0 !important;
    list-style: none !important;
    justify-content: center !important;
    align-items: center !important;
  }

  .pagination-wrapper .pagination .page-item {
    display: inline-flex !important;
    margin: 0 !important;
    padding: 0 !important;
    list-style: none !important;
    flex-shrink: 0 !important;
  }

  .pagination-wrapper .pagination .page-item .page-link {
    min-width: 32px !important;
    height: 32px !important;
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    border-radius: 4px !important;
    font-size: 12px !important;
    font-weight: 500 !important;
    transition: all 0.3s ease !important;
    border: 1px solid #ddd !important;
    color: #333 !important;
    text-decoration: none !important;
    padding: 0 0.75rem !important;
    white-space: nowrap !important;
    background: #fff !important;
    line-height: 1 !important;
    margin: 0 !important;
  }

  .pagination-wrapper .pagination .page-item .page-link:hover {
    border-color: var(--primary-color) !important;
    color: var(--primary-color) !important;
    background: rgba(74, 52, 39, 0.05) !important;
    text-decoration: none !important;
  }

  .pagination-wrapper .pagination .page-item.active .page-link {
    background: var(--primary-color) !important;
    color: #fff !important;
    border-color: var(--primary-color) !important;
  }

  .pagination-wrapper .pagination .page-item.disabled .page-link {
    opacity: 0.5 !important;
    cursor: not-allowed !important;
    pointer-events: none !important;
  }

  .pagination-wrapper .pagination .page-item.disabled .page-link:hover {
    border-color: #ddd !important;
    color: #333 !important;
    background: #fff !important;
  }

  .pagination-wrapper .pagination .page-link:focus {
    box-shadow: none !important;
    z-index: auto !important;
  }

  .product-listing-page .listing-sidebar {
    min-width: 0;
  }

  .product-listing-page .listing-content {
    min-width: 0;
  }

  .product-title,
  .product-name {
    font-size: 1.15rem !important;
    line-height: 1.35 !important;
    font-weight: 700 !important;
    letter-spacing: -0.01em;
    margin-bottom: 0.7rem !important;
  }

  .product-title a,
  .product-name a {
    color: var(--text-dark);
    text-decoration: none;
  }

  .product-listing-page .products-showing p {
    margin: 0;
    color: var(--text-light);
    font-size: 13px;
  }

  .product-listing-page .products-showing strong {
    color: var(--text-dark);
    font-weight: 600;
  }

  .product-listing-page .products-number-sort form {
    margin: 0;
  }

  .sort-section {
    display: flex;
    align-items: center;
    gap: 0.75rem;
  }

  .sort-section label {
    color: var(--text-dark);
    font-size: 13px;
    font-weight: 600;
    margin: 0;
    white-space: nowrap;
  }

  .sort-section select {
    min-width: 150px;
    padding: 0.65rem 2.25rem 0.65rem 0.9rem;
    border: 1px solid var(--border-color);
    border-radius: 12px;
    background: #fff;
    color: var(--text-dark);
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.25s ease;
    appearance: none;
    -webkit-appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%234a3427' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 0.85rem center;
    box-shadow: 0 6px 16px rgba(74, 52, 39, 0.06);
  }

  .sort-section select:hover,
  .sort-section select:focus {
    border-color: rgba(74, 52, 39, 0.24);
    box-shadow: 0 10px 24px rgba(74, 52, 39, 0.1);
    outline: none;
  }

  @media (max-width: 768px) {
    .listing-sidebar,
    .listing-content {
      flex: 0 0 100%;
      max-width: 100%;
    }

    .product-listing-page .products-header,
    .product-listing-page .info-bar {
      align-items: flex-start;
      padding: 1rem !important;
    }
  }
</style>
<?php
$AllsettingsModel = new \App\Models\Allsettingsmodel();
$all_setting_data = $AllsettingsModel->first();
?>
<section class="products-section product-listing-page">
  <div class="container-fluid">
    <div class="row g-4 listing-shell">

        <div class="col-lg-2 listing-sidebar">
          <!--
              *** MENUS AND FILTERS ***
              _________________________________________________________
              -->
          <div class="card sidebar-menu mb-4">
            <div class="card-body">
              <button class="btn d-lg-none w-100 rounded d-flex justify-content-between align-items-center"
                type="button" data-toggle="collapse" data-target="#categoryDropdown" aria-expanded="false"
                aria-controls="categoryDropdown">
                <span>Categories</span>
                <i class="fas fa-chevron-down"></i> <!-- Dropdown icon -->
              </button>

              <!-- Collapsible category list -->
              <div class="collapse d-lg-block" id="categoryDropdown">
                <h3 class="card-title mb-3">Categories</h3>
                <ul class="nav nav-pills flex-column category-menu">
                  <?php foreach ($cat as $key => $catdata) { ?>
                    <li>
                      <a href="<?php echo base_url('category/' . base64_encode($catdata['CategoryID'])); ?>"
                        class="nav-link cat-link text-capitalize">
                        <i class="fa-chevron-right fa-solid mr-2"></i>
                        <span
                          style="flex: 1; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?php echo $catdata['CategoryName']; ?></span>
                        <span class="badge">
                          (<?php echo $countcat[$key]; ?>)
                        </span>
                      </a>
                    </li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>

          <div class="card sidebar-menu d-none d-lg-block">
            <div class="card-body">
              <div class="price-filter-section">
                <h3>Price Range</h3>
                <div class="price-inputs">
                  <input type="text" id="price_min_display" placeholder="Min" readonly style="background: #f5f5f5;">
                  <span class="price-separator">-</span>
                  <input type="text" id="price_max_display" placeholder="Max" readonly style="background: #f5f5f5;">
                </div>
                <div class="price-range-wrapper">
                  <span class="rangeValues"></span>
                  <div class="simple-range-container">
                    <input type="range" id="price_range" min="0" max="50000" step="500"
                      value="<?php if ($maximum_price !== '' && $maximum_price !== null) { echo $maximum_price; } else { echo '0'; } ?>"
                      class="simple-slider">
                    <div class="range-labels">
                      <span><?= $all_setting_data['currency']; ?>0</span>
                      <span><?= $all_setting_data['currency']; ?>50000</span>
                    </div>
                  </div>
                  <input type="hidden" id="hidden_minimum_price" value="0" />
                  <input type="hidden" id="hidden_maximum_price" value="<?php if (isset($maximum_price) && $maximum_price !== '') { echo $maximum_price; } else { echo '0'; } ?>" />
                </div>
              </div>
            </div>
          </div>

          <!-- *** MENUS AND FILTERS END ***-->

        </div>


        <!-- <div class="col-lg-10 col-12 pl-5 justify-content-center"> -->
        <div class="col-lg-10 col-12 listing-content">
          <div class="text-inner">

            <div class="products-header">
              <div class="category-info">
                Category: <strong>New Arrivals</strong>
              </div>
              <div class="sort-section">
                <label for="sort-by-new">Sort By:</label>
                <select name="sort-by" id="sort-by-new" class="price_change">
                  <option value="">Price</option>
                  <option value="ASC" <?php if ($sort == 'ASC')
                    echo 'selected'; ?>>Low to high</option>
                  <option value="DESC" <?php if ($sort == 'DESC')
                    echo 'selected'; ?>>High to low</option>
                </select>
              </div>
            </div>



            <div class="row filter_data g-4">
              <?php
              if (!empty($product)) {
                $session = session();
                $user_id = $session->get('user_id');
                //  print_r($product);
                foreach ($product as $prd) {
                  //if(!empty($prd['ProductImage']))
                  //{
                  ?>
                  <!-- <div class="col-md-4 product_col"> -->
                  <div class="col-lg-3 col-md-4 col-sm-6 col-12 product_col">
                    <div class="product-card modern-product-card">
                      <div class="product-header">
                        <span class="badge-new">NEW</span>
                        <div class="wishlist-action" <?php if (empty($user_id)) { ?>data-toggle="modal"
                            data-target="#exampleModal" <?php } ?>>
                          <?php
                          if (empty($user_id)) {
                            ?>
                            <i class="ti-heart"></i>
                            <?php
                          } else {
                            if (!empty($wishlist['Status']) && $wishlist['Status'] == 1 && $wishlist['ProductID'] == $prd['ProductID']) {
                              ?>
                              <i class="remove_wishlist ti-heart" data-id="<?= $prd['ProductID'] ?>"></i>
                              <?php
                            } else {
                              ?>
                              <i class="add_wishlist ti-heart" data-id="<?= $prd['ProductID'] ?>"></i>
                              <?php
                            }
                          }
                          ?>
                        </div>
                      </div>
                      <a href="<?php echo base_url($prd['slug'] . "/" . 'product_detail/' . base64_encode($prd['ProductID'])); ?>"
                        class="product-img-wrap">
                        <?php
                        $jsondt = json_decode($prd['ProductImage']);
                        if (!empty($jsondt)) {
                          ?>
                          <img src="<?php echo base_url('admin/public/assets/img/product_images/' . $jsondt[0]); ?>"
                            alt="<?php echo $prd['ProductName']; ?>">
                          <?php
                        } else {
                          ?>
                          <img src="<?php echo base_url('admin/public/assets/img/product_images/18.jpg'); ?>"
                            alt="<?php echo $prd['ProductName']; ?>">
                          <?php
                        }
                        ?>
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
                          <span class="review-count">(128)</span>
                        </div>
                        <h3 class="product-title">
                          <a
                            href="<?php echo base_url($prd['slug'] . "/" . 'product_detail/' . base64_encode($prd['ProductID'])); ?>">
                            <?php
                            $product_name = $prd['ProductName'];
                            $limited_name = implode(' ', array_slice(explode(' ', $product_name), 0, 3));
                            echo $limited_name;
                            ?>
                          </a>
                        </h3>
                        <div class="product-price">
                          <?php
                          if ($prd['ProductType'] != 2) {
                            $productPrice = $prd['ProductPrice'];
                            $salePrice = $prd['Sale_ProductPrice'];
                            ?>
                            <span
                              class="current-price"><?php echo $all_setting_data['currency']; ?><?php echo $salePrice; ?></span>
                            <span
                              class="old-price"><?php echo $all_setting_data['currency']; ?><?php echo $productPrice; ?></span>
                            <?php
                          } else {
                            $variations = new App\Models\Variationmodel();
                            $varia_dt = $variations->where('ProductID', $prd['ProductID'])->first();
                            $pricearr = $varia_dt['Sale_VariationPrice'];
                            if ($pricearr == null || $pricearr == 0) {
                              $pricearr = $varia_dt['VariationPrice'];
                            }
                            ?>
                            <span
                              class="current-price"><?php echo $all_setting_data['currency']; ?><?php echo $pricearr; ?></span>
                            <?php
                          }
                          ?>
                        </div>
                        <div class="product-buttons">
                          <form class="addtocartform" action="<?= base_url('addToCart') ?>" method="POST">
                            <input type="hidden" name="productId" value="<?php echo $prd['ProductID']; ?>">
                            <input type="hidden" name="quantity" value="1" min="1">
                            <?php
                            if ($prd['ProductType'] != 2) {
                              ?>
                              <input type="hidden" name="price" id="price" value="<?php echo $prd['ProductPrice']; ?>">
                              <?php
                            } else {
                              $variations = new App\Models\Variationmodel();
                              $varia_dt = $variations->where('ProductID', $prd['ProductID'])->first();
                              $pricearr = $varia_dt['Sale_VariationPrice'];
                              if ($pricearr == null || $pricearr == 0) {
                                $pricearr = $varia_dt['VariationPrice'];
                              }
                              ?>
                              <input type="hidden" name="price" id="price" value="<?php echo $pricearr; ?>">
                              <input type="hidden" name="variationId" value="<?php echo $varia_dt['VariationID']; ?>">
                              <?php
                            }
                            ?>
                            <button class="btn-add-cart" type="submit">
                              <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                            </button>
                          </form>
                          <a href="<?php echo base_url($prd['slug'] . "/" . 'product_detail/' . base64_encode($prd['ProductID'])); ?>"
                            class="btn-buy-now">
                            Buy Now
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>

                  <?php

                }
              } else {
                ?>

                <!-- <div class="col-lg-12">
                  <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <br/>
            <h3 class="text-center">No Product found!</h3>
            </div> -->

                <!-- ------------------- -->
                <div class="col-lg-12 d-flex align-items-center justify-content-center flex-column">
                  <!--<div><i class="fas fa-search"></i></div>-->
                  <img
                    src="https://cdni.iconscout.com/illustration/premium/thumb/no-product-illustration-download-in-svg-png-gif-file-formats--ecommerce-package-empty-box-online-shopping-pack-e-commerce-illustrations-6632286.png"
                    alt="NOt found" class="auto" style="height:275px;" />
                  <h5 class="text-center text-muted mb-3" style="margin-top:5px;">Oops! No matches found</h5>
                </div>
                <!-- ============= -->
                <?php
              }
              ?>
            </div>

            <div class="pagination-wrapper" id="pagination_link">
              <?php if ($pager):

                ?>

                <?php $pagi_path = 'product'; ?>
                <?php $pager->setPath($pagi_path); ?>
                <?= $pager->links() ?>
              <?php endif; ?>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<?= $this->include('footer') ?>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const paginationWrapper = document.querySelector('.pagination-wrapper');
    if (paginationWrapper) {
      const pagination = paginationWrapper.querySelector('.pagination');
      if (pagination) {
        pagination.classList.add('pagination', 'justify-content-center');

        const items = pagination.querySelectorAll('li');
        items.forEach(item => {
          item.classList.add('page-item');

          const link = item.querySelector('a, span');
          if (link) {
            link.classList.add('page-link');
          }
        });
      }
    }

    const priceSlider = document.getElementById('price_range');
    const minDisplay = document.getElementById('price_min_display');
    const maxDisplay = document.getElementById('price_max_display');
    const rangeValues = document.querySelector('.rangeValues');
    const hiddenMin = document.getElementById('hidden_minimum_price');
    const hiddenMax = document.getElementById('hidden_maximum_price');
    const currency = '<?= $all_setting_data['currency']; ?>';

    if (priceSlider && minDisplay && maxDisplay) {
      function updatePriceDisplay() {
        const maxPrice = parseInt(priceSlider.value || 0, 10);
        const minPrice = 0;
        const maxValue = parseInt(priceSlider.max || 50000, 10);
        const percentage = (maxPrice / maxValue) * 100;

        minDisplay.value = currency + minPrice;
        maxDisplay.value = currency + maxPrice;

        if (rangeValues) {
          rangeValues.textContent = currency + minPrice + ' - ' + currency + maxPrice;
        }

        priceSlider.style.setProperty('--value', percentage + '%');

        if (hiddenMin) hiddenMin.value = minPrice;
        if (hiddenMax) hiddenMax.value = maxPrice;
      }

      priceSlider.addEventListener('input', updatePriceDisplay);
      updatePriceDisplay();
    }
  });
</script>
