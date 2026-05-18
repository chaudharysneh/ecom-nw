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

  * {
    box-sizing: border-box;
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

  /* ===== SIDEBAR STYLES ===== */
  .sidebar-menu {
    border: none;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    border-radius: 16px;
    background: #fff;
  }

  .sidebar-menu .card-body {
    padding: 1.5rem;
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
  }

  .category-menu li {
    margin-bottom: 0;
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
    min-width: 42px;
    margin-left: auto;
    text-align: center;
    flex: 0 0 auto;
    float: none !important;
  }

  .category-menu hr {
    display: none;
  }

  /* ===== PRICE FILTER ===== */
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
    transition: all 0.2s ease;
  }

  .price-inputs input:focus {
    border-color: var(--primary-color) !important;
    outline: none !important;
    box-shadow: 0 0 0 3px rgba(74, 52, 39, 0.1) !important;
  }

  .price-separator {
    color: var(--text-light);
    font-weight: 700;
    font-size: 0.95rem;
    text-align: center;
  }

  /* Remove any red borders from jQuery UI or other sources */
  .price-filter-section *,
  .price-range-wrapper *,
  .simple-range-container * {
    border-color: var(--border-color) !important;
  }

  .price-filter-section *:focus,
  .price-range-wrapper *:focus,
  .simple-range-container *:focus {
    outline: none !important;
    box-shadow: none !important;
  }

  .price-separator {
    color: var(--text-light);
    font-weight: 600;
    font-size: 12px;
    text-align: center;
  }

  .price-range-wrapper {
    position: relative;
    margin: 1.5rem 0;
    border: none !important;
  }

  .simple-range-container {
    position: relative;
    margin: 1rem 0;
    border: none !important;
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
    z-index: 10;
    position: relative;
  }

  /* Modern slider track with gradient */
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
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(74, 52, 39, 0.3);
    transition: all 0.2s ease;
    border: 3px solid #fff;
    z-index: 10;
    position: relative;
    margin-top: -7px;
  }

  .simple-slider::-webkit-slider-thumb:hover {
    transform: scale(1.2);
    box-shadow: 0 8px 20px rgba(74, 52, 39, 0.35);
  }

  .simple-slider::-moz-range-thumb {
    width: 22px;
    height: 22px;
    border-radius: 50%;
    background: var(--primary-color);
    cursor: pointer;
    border: 3px solid #fff;
    box-shadow: 0 4px 12px rgba(74, 52, 39, 0.3);
    transition: all 0.2s ease;
    z-index: 10;
    position: relative;
  }

  .simple-slider::-moz-range-thumb:hover {
    transform: scale(1.2);
    box-shadow: 0 8px 20px rgba(74, 52, 39, 0.35);
  }

  .range-labels {
    display: flex;
    justify-content: space-between;
    margin-top: 0.5rem;
    font-size: 11px;
    color: var(--text-light);
  }

  .rangeValues {
    display: block;
    font-size: 12px;
    color: var(--text-dark);
    font-weight: 600;
    margin-bottom: 0.75rem;
    text-align: center;
  }

  /* Override reset.css and other conflicting styles */
  .price-range-wrapper input[type="range"] {
    border: none !important;
    padding: 0 !important;
    background: transparent !important;
    -webkit-appearance: none !important;
    appearance: none !important;
  }

  .price-range-wrapper input[type="range"]:focus {
    border: none !important;
    outline: none !important;
    box-shadow: none !important;
  }

  /* Hide default range input styling completely */
  .price-range-wrapper input[type="range"]::-webkit-slider-runnable-track {
    background: transparent !important;
    border: none !important;
  }

  .price-range-wrapper input[type="range"]::-moz-range-track {
    background: transparent !important;
    border: none !important;
  }

  /* Hide jQuery UI slider elements that might be created */
  .price-range-wrapper .ui-slider,
  .price-range-wrapper .ui-slider-range,
  .price-range-wrapper .ui-slider-handle,
  .price-range-wrapper .ui-slider-horizontal {
    display: none !important;
    visibility: hidden !important;
    position: absolute !important;
    left: -9999px !important;
    top: -9999px !important;
    width: 0 !important;
    height: 0 !important;
  }

  /* ===== PAGINATION STYLING ===== */
  .pagination-wrapper {
    margin-top: 2rem;
    padding: 1.5rem;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
  }

  .pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 0.5rem;
    margin: 0;
    padding: 0;
    list-style: none;
  }

  .pagination .page-item {
    margin: 0;
  }

  .pagination .page-link {
    display: flex;
    align-items: center;
    justify-content: center;
    min-width: 40px;
    height: 40px;
    padding: 0;
    border: 1px solid var(--border-color);
    border-radius: 6px;
    background: #fff;
    color: var(--text-dark);
    font-weight: 500;
    font-size: 14px;
    transition: all 0.3s ease;
    text-decoration: none;
  }

  .pagination .page-link:hover {
    background: var(--primary-color);
    color: #fff;
    border-color: var(--primary-color);
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(247, 148, 29, 0.3);
  }

  .pagination .page-item.active .page-link {
    background: var(--primary-color);
    color: #fff;
    border-color: var(--primary-color);
    font-weight: 600;
  }

  .pagination .page-item.disabled .page-link {
    background: #f5f5f5;
    color: var(--text-light);
    border-color: var(--border-color);
    cursor: not-allowed;
  }

  /* ===== SORT DROPDOWN STYLING ===== */
  .sort-section select {
    padding: 0.5rem 2rem 0.5rem 0.75rem;
    border: 1px solid var(--border-color);
    border-radius: 6px;
    background: #fff;
    color: var(--text-dark);
    font-size: 14px;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.3s ease;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%232c3e50' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 0.75rem center;
  }

  .sort-section select:hover {
    border-color: var(--primary-color);
  }

  .sort-section select:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(247, 148, 29, 0.1);
  }

  /* ===== PRODUCT CARD STYLING ===== */
  .product-name,
  .product-title {
    font-size: 1.12rem;
    font-weight: 700;
    color: var(--text-dark);
    margin: 0 0 0.7rem 0;
    line-height: 1.38;
    letter-spacing: -0.01em;
  }

  .product-name a,
  .product-title a {
    color: var(--text-dark);
    text-decoration: none;
    transition: color 0.3s ease;
  }

  .product-name a:hover,
  .product-title a:hover {
    color: var(--primary-color);
  }

  .product-price {
    margin-bottom: 0.75rem;
  }

  .product-price .current-price {
    font-size: 16px;
    font-weight: 600;
    color: var(--primary-color);
  }

  .product-price .original-price {
    font-size: 14px;
    color: var(--text-light);
    text-decoration: line-through;
    margin-left: 0.5rem;
  }

  /* ===== PRODUCTS SECTION ===== */
  .products-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 2rem;
    padding: 1rem 1.5rem;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
  }

  .products-header .category-info {
    font-size: 13px;
    color: var(--text-light);
  }

  .products-header .category-info strong {
    color: var(--text-dark);
    font-weight: 600;
  }

  .sort-section {
    display: flex;
    align-items: center;
    gap: 0.75rem;
  }

  .sort-section label {
    font-weight: 600;
    color: var(--text-dark);
    margin: 0;
    font-size: 13px;
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

  /* ===== PRODUCT CARD ===== */
  .product-card {
    background: #fff;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 1px 4px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
  }

  .product-card:hover {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
  }

  .product-image-wrapper {
    position: relative;
    background: #f5f5f5;
    width: 100%;
    aspect-ratio: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
  }

  .product-image-wrapper a {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .product-image-wrapper img {
    max-width: 90%;
    max-height: 90%;
    object-fit: contain;
    transition: transform 0.3s ease;
  }

  .product-card:hover .product-image-wrapper img {
    transform: scale(1.08);
  }

  .wishlist-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: #fff;
    border: 1px solid #ddd;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    z-index: 10;
  }

  .wishlist-btn:hover {
    background: var(--primary-color);
    border-color: var(--primary-color);
  }

  .wishlist-btn i {
    color: #999;
    font-size: 16px;
    transition: color 0.3s ease;
  }

  .wishlist-btn:hover i {
    color: #fff;
  }

  .wishlist-btn.active i {
    color: var(--primary-color);
  }

  .wishlist-btn.active:hover i {
    color: #fff;
  }

  /* ===== PRODUCT INFO ===== */
  .product-info {
    padding: 1.25rem;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
  }

  .product-price {
    display: flex;
    align-items: baseline;
    gap: 0.5rem;
    margin-bottom: 0.5rem;
    order: -1;
  }

  .product-price .current-price {
    font-size: 18px;
    font-weight: 700;
    color: var(--primary-color);
  }

  .product-price .original-price {
    font-size: 12px;
    color: #999;
    text-decoration: line-through;
  }

  .product-name,
  .product-title {
    font-size: 1.12rem;
    font-weight: 700;
    color: var(--text-dark);
    margin-bottom: 0.75rem;
    line-height: 1.38;
    text-transform: capitalize;
  }

  .product-availability {
    margin-bottom: 0.75rem;
    display: none;
  }

  .availability-bar {
    height: 3px;
    background: #e0e0e0;
    border-radius: 2px;
    overflow: hidden;
  }

  .availability-bar span {
    display: block;
    height: 100%;
    background: linear-gradient(90deg, var(--primary-color), #ffa500);
    border-radius: 2px;
  }

  /* ===== PRODUCT ACTIONS ===== */
  .product-actions {
    display: flex;
    gap: 0.75rem;
    margin-top: auto;
  }

  .add-to-cart-btn {
    flex: 1;
    padding: 0.65rem 1rem;
    background: var(--secondary-color);
    color: #fff;
    border: none;
    border-radius: 20px;
    font-weight: 600;
    font-size: 13px;
    cursor: pointer;
    transition: all 0.3s ease;
    text-transform: capitalize;
  }

  .add-to-cart-btn:hover {
    background: #7a5f3f;
    box-shadow: 0 2px 8px rgba(139, 111, 71, 0.3);
  }

  .add-to-cart-btn:active {
    transform: scale(0.98);
  }

  /* ===== PAGINATION ===== */
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
    padding: 0 !important;
    white-space: nowrap !important;
    background: #fff !important;
    line-height: 1 !important;
    margin: 0 !important;
  }

  .pagination-wrapper .pagination .page-item .page-link:hover {
    border-color: var(--primary-color) !important;
    color: var(--primary-color) !important;
    background: rgba(247, 148, 29, 0.05) !important;
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

  /* Override Bootstrap pagination styles */
  .pagination-wrapper .pagination .page-link:focus {
    box-shadow: none !important;
    z-index: auto !important;
  }

  /* ===== NO PRODUCTS ===== */
  .no-products {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 4rem 2rem;
    text-align: center;
  }

  .no-products img {
    max-width: 300px;
    margin-bottom: 2rem;
    opacity: 0.8;
  }

  .no-products h5 {
    color: var(--text-light);
    font-size: 18px;
    margin: 0;
  }

  /* ===== RESPONSIVE ===== */
  @media (max-width: 768px) {
    .listing-sidebar,
    .listing-content {
      flex: 0 0 100%;
      max-width: 100%;
    }

    .products-header {
      flex-direction: column;
      gap: 0.75rem;
      align-items: flex-start;
      padding: 1rem;
    }

    .sort-section {
      width: 100%;
      flex-direction: column;
      align-items: flex-start;
    }

    .sort-section select {
      width: 100%;
    }

    .product-card {
      margin-bottom: 1rem;
    }

    .sidebar-menu {
      margin-bottom: 1.5rem;
    }

    .pagination-wrapper .pagination .page-item .page-link {
      min-width: 28px !important;
      height: 28px !important;
      font-size: 11px !important;
    }
  }

  @media (max-width: 576px) {
    .product-info {
      padding: 0.9rem;
    }

    .product-name,
    .product-title {
      font-size: 1rem;
    }

    .product-price .current-price {
      font-size: 15px;
    }

    .add-to-cart-btn {
      font-size: 12px;
      padding: 0.55rem 0.8rem;
    }

    .pagination-wrapper .pagination .page-item .page-link {
      min-width: 24px !important;
      height: 24px !important;
      font-size: 10px !important;
    }

    .pagination-wrapper .pagination {
      gap: 0.15rem !important;
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
      <!-- SIDEBAR -->
      <div class="col-lg-2 listing-sidebar">
        <!-- Categories -->
        <div class="card sidebar-menu mb-4">
          <div class="card-body">
            <button class="btn d-lg-none w-100 rounded d-flex justify-content-between align-items-center" type="button"
              data-toggle="collapse" data-target="#categoryDropdown" aria-expanded="false"
              aria-controls="categoryDropdown">
              <span>Categories</span>
              <i class="fas fa-chevron-down"></i>
            </button>

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

        <!-- Price Filter -->
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
                    value="<?php if (isset($maximum_price) && $maximum_price !== '') { echo $maximum_price; } else { echo '0'; } ?>"
                    class="simple-slider">
                  <div class="range-labels">
                    <span>€0</span>
                    <span>€50000</span>
                  </div>
                </div>
                <input type="hidden" id="hidden_minimum_price" value="0" />
                <input type="hidden" id="hidden_maximum_price"
                  value="<?php if (isset($maximum_price) && $maximum_price !== '') { echo $maximum_price; } else { echo '0'; } ?>" />
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- PRODUCTS -->
      <div class="col-lg-10 listing-content">
        <!-- Header -->
        <div class="products-header">
          <div class="category-info">
            Category: <strong>All products</strong>
          </div>
          <div class="sort-section">
            <label for="sort-by">Sort By:</label>
            <select name="sort-by" id="sort-by" class="price_change">
              <option value="">Price</option>
              <option value="ASC" <?php if ($sort == 'ASC')
                echo 'selected'; ?>>Low to high</option>
              <option value="DESC" <?php if ($sort == 'DESC')
                echo 'selected'; ?>>High to low</option>
            </select>
          </div>
        </div>

        <!-- Products Grid -->
        <div class="row filter_data g-4">
          <?php
          if (!empty($product)) {
            $session = session();
            $user_id = $session->get('user_id');
            foreach ($product as $prd) {
              $price = $prd['Sale_ProductPrice'] ?? $prd['ProductPrice'] ?? 0;
              $oldPrice = $prd['ProductPrice'] ?? 0;
              ?>
              <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="product-card modern-product-card">
                  <div class="product-header">
                    <div></div>
                    <div class="wishlist-action" <?php if (empty($user_id)) { ?>data-toggle="modal"
                        data-target="#exampleModal" <?php } ?>>
                      <?php
                      if (empty($user_id)) {
                        ?>
                        <i class="fa-regular fa-heart"></i>
                        <?php
                      } else {
                        if (!empty($wishlist['Status']) && $wishlist['Status'] == 1 && $wishlist['ProductID'] == $prd['ProductID']) {
                          ?>
                          <i class="remove_wishlist fa-regular fa-heart" data-id="<?= $prd['ProductID'] ?>"></i>
                          <?php
                        } else {
                          ?>
                          <i class="add_wishlist fa-regular fa-heart" data-id="<?= $prd['ProductID'] ?>"></i>
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
                        <?php echo $prd['ProductName']; ?>
                      </a>
                    </h3>
                    <div class="product-price">
                      <span
                        class="current-price"><?php echo $all_setting_data['currency']; ?><?php echo number_format($price, 2); ?></span>
                      <?php if ($oldPrice > $price) { ?>
                        <span
                          class="old-price"><?php echo $all_setting_data['currency']; ?><?php echo number_format($oldPrice, 2); ?></span>
                      <?php } ?>
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
            <div class="col-12">
              <div class="no-products">
                <img
                  src="https://cdni.iconscout.com/illustration/premium/thumb/no-product-illustration-download-in-svg-png-gif-file-formats--ecommerce-package-empty-box-online-shopping-pack-e-commerce-illustrations-6632286.png"
                  alt="No products found" />
                <h5>Oops! No matches found for "<?php echo htmlspecialchars($search_term); ?>"</h5>
              </div>
            </div>
            <?php
          }
          ?>
        </div>

        <!-- Pagination -->
        <div class="pagination-wrapper">
          <?php if ($pager): ?>
            <?php $pagi_path = 'product'; ?>
            <?php $pager->setPath($pagi_path); ?>
            <?= $pager->links() ?>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->include('footer') ?>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Enhanced pagination styling
    const paginationWrapper = document.querySelector('.pagination-wrapper');
    if (paginationWrapper) {
      const pagination = paginationWrapper.querySelector('.pagination');
      if (pagination) {
        // Ensure proper Bootstrap pagination classes
        pagination.classList.add('pagination', 'justify-content-center');

        // Style individual pagination items
        const items = pagination.querySelectorAll('li');
        items.forEach(item => {
          item.classList.add('page-item');

          const link = item.querySelector('a, span');
          if (link) {
            link.classList.add('page-link');

            // Add hover effects
            link.addEventListener('mouseenter', function () {
              if (!item.classList.contains('active') && !item.classList.contains('disabled')) {
                this.style.borderColor = '#7a5f3f';
                this.style.color = '#7a5f3f';
                this.style.background = 'rgba(247, 148, 29, 0.05)';
              }
            });

            link.addEventListener('mouseleave', function () {
              if (!item.classList.contains('active')) {
                this.style.borderColor = '#ddd';
                this.style.color = '#333';
                this.style.background = '#fff';
              }
            });
          }
        });
      }
    }

    // Simple price range slider functionality
    const priceSlider = document.getElementById('price_range');
    const minDisplay = document.getElementById('price_min_display');
    const maxDisplay = document.getElementById('price_max_display');
    const rangeValues = document.querySelector('.rangeValues');

    if (priceSlider && minDisplay && maxDisplay) {
      function updatePriceDisplay() {
        const currency = '<?php echo $all_setting_data['currency']; ?>';
        const maxPrice = parseInt(priceSlider.value);
        const minPrice = 0; // Always start from 0
        const maxValue = parseInt(priceSlider.max);
        const percentage = (maxPrice / maxValue) * 100;

        minDisplay.value = currency + minPrice;
        maxDisplay.value = currency + maxPrice;
        if (rangeValues) {
          rangeValues.textContent = currency + minPrice + ' - ' + currency + maxPrice;
        }

        // Update gradient track
        priceSlider.style.setProperty('--value', percentage + '%');

        // Update hidden inputs for form submission
        const hiddenMin = document.getElementById('hidden_minimum_price');
        const hiddenMax = document.getElementById('hidden_maximum_price');
        if (hiddenMin) hiddenMin.value = minPrice;
        if (hiddenMax) hiddenMax.value = maxPrice;
      }

      priceSlider.addEventListener('input', updatePriceDisplay);

      // Initial update
      updatePriceDisplay();
    }
  });
</script>
