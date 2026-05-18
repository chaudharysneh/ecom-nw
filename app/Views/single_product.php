<?= $this->include('header') ?>
<style>
    /* Premium Single Product Layout Styles */
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    
    .single_product {
        font-family: 'Poppins', sans-serif;
        background-color: #ffffff;
        padding: 40px 0;
        color: #2D2A26;
    }
    
    /* Breadcrumbs styling */
    .product-breadcrumbs {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 8px;
        font-size: 14px;
        color: #7D7873;
        margin-bottom: 30px;
    }
    .product-breadcrumbs a {
        color: #7D7873;
        text-decoration: none;
        transition: color 0.2s ease;
    }
    .product-breadcrumbs a:hover {
        color: #8C4E2D;
    }
    .product-breadcrumbs .separator {
        font-size: 10px;
        color: #C0BAB4;
        display: flex;
        align-items: center;
    }
    .product-breadcrumbs .current-product {
        color: #2D2A26;
        font-weight: 500;
    }

    /* Main Grid */
    .product-main-grid {
        display: grid;
        grid-template-columns: 1.1fr 0.9fr;
        gap: 48px;
        margin-bottom: 48px;
    }
    @media (max-width: 991px) {
        .product-main-grid {
            grid-template-columns: 1fr;
            gap: 36px;
        }
    }

    /* Gallery (Left Section) */
    .product-gallery-container {
        display: flex;
        gap: 20px;
    }
    @media (max-width: 575px) {
        .product-gallery-container {
            flex-direction: column-reverse;
        }
    }
    
    .thumbnail-column {
        display: flex;
        flex-direction: column;
        gap: 12px;
        width: 80px;
        flex-shrink: 0;
        align-items: center;
    }
    @media (max-width: 575px) {
        .thumbnail-column {
            flex-direction: row;
            width: 100%;
            overflow-x: auto;
            justify-content: flex-start;
            padding-bottom: 8px;
        }
    }
    
    .thumbnail-item {
        position: relative;
        width: 80px;
        height: 80px;
        border-radius: 8px;
        border: 1px solid #E8E6E3;
        padding: 4px;
        cursor: pointer;
        background: #fff;
        transition: all 0.2s ease;
        overflow: hidden;
    }
    .thumbnail-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 6px;
    }
    .thumbnail-item.active_img {
        border-color: #8C4E2D;
        box-shadow: 0 0 0 1px #8C4E2D;
    }
    
    /* Play button overlay for video thumbnail */
    /* .thumbnail-item.video-thumb::after {
        content: '\f04b';
        font-family: 'FontAwesome';
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: rgba(255, 255, 255, 0.95);
        color: #2D2A26;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    } */
    
    .thumbnail-scroll-down {
        color: #7D7873;
        font-size: 16px;
        cursor: pointer;
        transition: color 0.2s;
        margin-top: 4px;
    }
    .thumbnail-scroll-down:hover {
        color: #8C4E2D;
    }
    
    .main-image-column {
        position: relative;
        flex-grow: 1;
        border-radius: 12px;
        overflow: hidden;
        background: #ffffff;
        height: 520px;
        border: 1px solid #E8E6E3;
    }
    @media (max-width: 767px) {
        .main-image-column {
            height: 400px;
        }
    }
    
    .main-image-column .product-img--main {
        width: 100%;
        height: 100%;
        margin: 0;
        float: none;
        background-size: cover;
        background-position: center;
        border-radius: 12px;
    }
    .main-image-column .image_selected {
        width: 100% !important;
        height: 100% !important;
        transform: none !important;
        border: none !important;
        box-shadow: none !important;
        padding: 0 !important;
        margin: 0 !important;
        display: block !important;
        background: transparent !important;
    }
    .product-img--main__image {
        width: 100%;
        height: 100%;
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
        transition: transform 0.1s ease-out;
    }
    
    .discount-badge {
        position: absolute;
        top: 16px;
        right: 16px;
        background: #8C4E2D;
        color: #fff;
        padding: 0px 10px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        z-index: 5;
    }
    
    .gallery-nav-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.9);
        border: none;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        cursor: pointer;
        z-index: 5;
        color: #2D2A26;
        transition: all 0.2s ease;
    }
    .gallery-nav-btn:hover {
        background: #8C4E2D;
        color: #fff;
    }
    .gallery-nav-btn.prev {
        left: 16px;
    }
    .gallery-nav-btn.next {
        right: 16px;
    }

    /* Product Details (Right Section) */
    .product-info-column {
        display: flex;
        flex-direction: column;
    }
    
    .best-seller-tag {
        align-self: flex-start;
        background: #FAF3EC;
        color: #8C4E2D;
        font-size: 11px;
        font-weight: 700;
        padding: 0px 12px;
        border-radius: 50px;
        letter-spacing: 0.05em;
        margin-bottom: 12px;
    }
    
    .product-main-title {
        font-size: 20px;
        font-weight: 700;
        color: #2D2A26;
        line-height: 1.25;
        margin-bottom: 12px;
        text-transform: capitalize;
    }
    
    .product-rating-container {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 10px;
    }
    .rating-stars {
        color: #EAA034;
        font-size: 14px;
        display: flex;
        gap: 2px;
    }
    .reviews-count {
        color: #7D7873;
        font-size: 14px;
    }
    
    .price-row {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 16px;
        margin-bottom: 20px;
    }
    .price-row .product_price {
        font-size: 20px;
        font-weight: 700;
        color: #8C4E2D;
    }
    .price-row .original-price {
        font-size: 15px;
        color: #A09B95;
        text-decoration: line-through;
        font-weight: 400;
    }
    .price-row .save-badge {
        background: #E8F5E9;
        color: #2E7D32;
        font-size: 13px;
        font-weight: 600;
        padding: 4px 12px;
        border-radius: 50px;
    }
    
    .product-description-text {
        font-size: 15px;
        color: #55524E;
        line-height: 1.6;
        margin-bottom: 24px;
    }
    
    .divider-line {
        border: 0;
        border-top: 1px solid #E8E6E3;
        margin: 20px 0;
    }

    /* Option Swatches Styles */
    .swatch-group {
        margin-bottom: 24px;
    }
    .swatch-label {
        font-size: 15px;
        font-weight: 600;
        color: #2D2A26;
        margin-bottom: 12px;
        display: block;
    }
    .swatch-label span {
        font-weight: 400;
        color: #7D7873;
        margin-left: 6px;
    }
    
    .color-swatches-flex {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }
    .color-swatch-item {
        width: 44px;
        height: 44px;
        border-radius: 8px;
        border: 1px solid #E8E6E3;
        padding: 3px;
        cursor: pointer;
        transition: all 0.2s ease;
        background: #fff;
    }
    .color-swatch-inner {
        width: 100%;
        height: 100%;
        border-radius: 6px;
        background-size: cover;
        background-position: center;
    }
    .color-swatch-item.active {
        border-color: #8C4E2D;
        box-shadow: 0 0 0 1px #8C4E2D;
    }
    .color-swatch-item.disabled {
        opacity: 0.35;
        cursor: not-allowed;
        pointer-events: none;
    }
    
    .size-swatches-flex {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
    }
    .size-swatch-item {
        padding: 10px 20px;
        border: 1px solid #E8E6E3;
        background: #fff;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 500;
        color: #55524E;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .size-swatch-item:hover {
        border-color: #8C4E2D;
        color: #8C4E2D;
    }
    .size-swatch-item.active {
        background: #FAF3EC;
        border-color: #8C4E2D;
        color: #8C4E2D;
        font-weight: 600;
    }
    .size-swatch-item.disabled {
        opacity: 0.35;
        cursor: not-allowed;
        pointer-events: none;
        background: #F5F5F5;
    }

    /* Quantity and Action Buttons */
    .quantity-selector-block {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-top: 16px;
        margin-bottom: 20px;
    }
    .quantity-selector-block .swatch-label {
        margin-bottom: 0 !important;
        font-size: 15px;
        font-weight: 700;
        color: #2D2A26;
    }
    .quantity-control-group {
        display: flex;
        align-items: center;
        border: 1px solid #E8E6E3;
        border-radius: 6px;
        height: 38px;
        background: #fff;
        overflow: hidden;
    }
    .qty-btn {
        width: 36px;
        height: 100%;
        border: none;
        background: none;
        font-size: 14px;
        color: #2D2A26;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.2s;
    }
    .qty-btn:hover {
        background: #F5F4F2;
    }
    .qty-input-field {
        width: 38px;
        height: 100%;
        border: none;
        text-align: center;
        font-size: 14px;
        font-weight: 500;
        color: #2D2A26;
        background: none;
        pointer-events: none;
        border-left: 1px solid #E8E6E3;
        border-right: 1px solid #E8E6E3;
    }
    
    .purchase-buttons-flex {
        display: flex;
        gap: 16px;
        margin-top: 16px;
        margin-bottom: 20px;
        width: 100%;
    }
    @media (max-width: 575px) {
        .purchase-buttons-flex {
            flex-direction: column;
            gap: 12px;
        }
    }
    
    .btn-add-to-cart {
        flex-grow: 1 !important;
        height: 48px !important;
        background: #8C4E2D !important;
        color: #fff !important;
        border: none !important;
        border-radius: 8px !important;
        font-size: 16px !important;
        font-weight: 600 !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        gap: 10px !important;
        cursor: pointer !important;
        transition: background 0.2s !important;
    }
    .btn-add-to-cart:hover {
        background: #754024 !important;
    }
    .btn-buy-now {
        flex-grow: 1 !important;
        height: 48px !important;
        background: #fff !important;
        color: #8C4E2D !important;
        border: 1px solid #C4A493 !important;
        border-radius: 8px !important;
        font-size: 16px !important;
        font-weight: 600 !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        cursor: pointer !important;
        transition: all 0.2s ease !important;
    }
    .btn-buy-now:hover {
        background: #754024 !important;
        color: #fff !important;
    }

    /* Wishlist & Compare */
    .wishlist-compare-flex {
        display: flex;
        gap: 24px;
        margin-bottom: 30px;
    }
    .wishlist-compare-link {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        color: #55524E;
        text-decoration: none;
        cursor: pointer;
        transition: color 0.2s;
    }
    .wishlist-compare-link:hover {
        color: #8C4E2D;
        text-decoration: none;
    }



    /* Collapsible spec block details card */
    .details-card {
        border: 1px solid #E8E6E3;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: none !important;
    }
    .details-card .btn-primary {
        background: #FAF8F6 !important;
        color: #2D2A26 !important;
        border: none !important;
        font-weight: 600 !important;
        padding: 16px 24px !important;
        font-size: 16px !important;
    }
    .details-card .btn-primary:focus {
        box-shadow: none !important;
    }
    .details-card .nav-pills {
        border-bottom: 1px solid #E8E6E3;
        border-radius: 0;
        background: #FAF8F6 !important;
    }
    .details-card .nav-link {
        border: none !important;
        border-bottom: 2px solid transparent !important;
        color: #7D7873 !important;
        font-weight: 600 !important;
        padding: 12px 24px !important;
        background: none !important;
    }
    .details-card .nav-link.active {
        color: #8C4E2D !important;
        border-bottom-color: #8C4E2D !important;
        border-radius: 0 !important;
    }
    .details-card .table {
        margin-bottom: 0;
    }
    .details-card .table th {
        background: #FAF8F6;
        color: #2D2A26;
        font-weight: 600;
        width: 30%;
    }
    .details-card .table td {
        color: #55524E;
    }


</style>

<?php
$AllsettingsModel = new \App\Models\Allsettingsmodel();
$all_setting_data = $AllsettingsModel->first();
?>

<div class="single_product">
    <div class="container">
        <!-- Modern breadcrumbs -->
        <div class="product-breadcrumbs">
            <a href="<?php echo base_url(); ?>"><i class="fa-solid fa-house m-2"></i>Home</a>
            <span class="separator"><i class="fa-solid fa-chevron-right"></i></span>
            <?php if (!empty($all_product_data['CategoryID']) && $prod): ?>
                <a href="#"><?php echo $prod->CategoryName; ?></a>
                <span class="separator"><i class="fa-solid fa-chevron-right"></i></span>
            <?php else: ?>
                <a href="<?php echo base_url('product'); ?>">Products</a>
                <span class="separator"><i class="fa-solid fa-chevron-right"></i></span>
            <?php endif; ?>
            <span class="current-product"><?php echo $all_product_data['ProductName']; ?></span>
        </div>

        <?php
        // Prepare dynamic image values
        $image_path = base_url() . 'admin/public/assets/img/product_images/1686203341_1d5ea750350c2370cd69.jpg';
        if (isset($_REQUEST['uid']) && $_REQUEST['uid'] != "") {
            $uid = $_REQUEST['uid'];
            $imageData = session()->get($uid);
            $image_path = $imageData['image_path'];
            ?>
            <div class="alert alert-danger text-center">
                <i class="fa fa-exclamation-triangle mr-2"></i>Your design will not be saved until this page has been completed!
            </div>
            <?php
        } else {
            $prdimage = json_decode($all_product_data['ProductImage']);
        }
        
        // Calculate saving values dynamically
        $discount_percentage = 0;
        $savings = 0;
        if ($all_product_data['ProductType'] != 2) {
            $productPrice = $all_product_data['ProductPrice'] ?? 0;
            $salePrice = $all_product_data['Sale_ProductPrice'] ?? 0;
            if ($productPrice > 0 && $salePrice < $productPrice) {
                $savings = $productPrice - $salePrice;
                $discount_percentage = round(($savings / $productPrice) * 100);
            }
        } else {
            $variations = new App\Models\Variationmodel();
            $varia_dt = $variations->where('ProductID', $all_product_data['ProductID'])->first();
            $pricearr = $varia_dt['Sale_VariationPrice'] ?? 0;
            $productPrice = $all_product_data['ProductPrice'] ?? 0;
            $salePrice = $pricearr > 0 ? $pricearr : ($all_product_data['Sale_ProductPrice'] ?? 0);
            if ($productPrice > 0 && $salePrice < $productPrice) {
                $savings = $productPrice - $salePrice;
                $discount_percentage = round(($savings / $productPrice) * 100);
            }
        }
        ?>

        <!-- Product Grid Setup -->
        <div class="product-main-grid">
            
            <!-- Left Side: Modern Interactive Gallery -->
            <div class="product-gallery-container">
                <!-- Vertical thumbnail stack -->
                <div class="thumbnail-column">
                    <?php if ($prdimage != ""): ?>
                        <?php foreach ($prdimage as $key => $single_img): ?>
                            <?php 
                            // Make the 5th thumbnail look like a video thumbnail as in mockup
                            $isVideoThumb = ($key === 4 || (count($prdimage) <= 4 && $key === count($prdimage) - 1));
                            ?>
                            <div class="thumbnail-item preview-image <?= $key == 0 ? "active_img" : "" ?> <?= $isVideoThumb ? "video-thumb" : "" ?>"
                                 src="<?php echo base_url('admin/public/assets/img/product_images/' . $single_img); ?>">
                                <img src="<?php echo base_url('admin/public/assets/img/product_images/' . $single_img); ?>" alt="Thumbnail">
                            </div>
                        <?php endforeach; ?>
                        <!-- Down indicator chevron -->
                        <div class="thumbnail-scroll-down"><i class="fa-solid fa-chevron-down"></i></div>
                    <?php endif; ?>
                </div>
                
                <!-- Large Zoom Main View -->
                <div class="main-image-column">
                    <?php if ($discount_percentage > 0): ?>
                        <div class="discount-badge">-<?php echo $discount_percentage; ?>%</div>
                    <?php endif; ?>
                    
                    <div class="image_selected product-img--main" data-scale="2.2"
                         data-image="<?php echo base_url('admin/public/assets/img/product_images/' . $prdimage[0]); ?>">
                    </div>
                    
                    <!-- Centered navigators -->
                    <button class="gallery-nav-btn prev"><i class="fa-solid fa-chevron-left"></i></button>
                    <button class="gallery-nav-btn next"><i class="fa-solid fa-chevron-right"></i></button>
                </div>
            </div>

            <!-- Right Side: Details & Configuration -->
            <div class="product-info-column">
                <span class="best-seller-tag">BEST SELLER</span>
                <h1 class="product-main-title"><?php echo $all_product_data['ProductName']; ?></h1>
                
                <!-- Review ratings block -->
                <div class="product-rating-container">
                    <div class="rating-stars">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                    </div>
                    <span class="reviews-count">(128 Reviews)</span>
                </div>
                
                <!-- Premium Price row -->
                <div class="price-row">
                    <?php if ($all_product_data['ProductType'] != 2): ?>
                        <span class="product_price"><?php echo $all_setting_data['currency']; ?><?php echo $salePrice; ?></span>
                        <span class="original-price"><?php echo $all_setting_data['currency']; ?><?php echo $productPrice; ?></span>
                        <?php if ($savings > 0): ?>
                            <span class="save-badge">You save <?php echo $all_setting_data['currency']; ?><?php echo $savings; ?></span>
                        <?php endif; ?>
                    <?php else: ?>
                        <span class="product_price" data-value="<?php echo $pricearr; ?>"><?php echo $all_setting_data['currency']; ?><?php echo $pricearr; ?></span>
                        <span class="original-price"><?php echo $all_setting_data['currency']; ?><?php echo $productPrice; ?></span>
                        <?php if ($savings > 0): ?>
                            <span class="save-badge">You save <?php echo $all_setting_data['currency']; ?><?php echo $savings; ?></span>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                
                <!-- Product Short Description -->
                <p class="product-description-text"><?php echo $all_product_data['ProductShortDesc']; ?></p>
                
                <hr class="divider-line">
                
                <!-- Options / Swatches Section -->
                <?php if ($all_product_data['ProductType'] == 2): ?>
                    <!-- Hidden original selects wrapper to satisfy original AJAX code -->
                    <div class="d-none">
                        <input type="hidden" name="product_id" id="product_id" value="<?php echo $all_product_data['ProductID']; ?>">
                        <input type="hidden" name="variation_id" id="variation_id" value="<?php echo $all_product_data['VariationID']; ?>">
                        
                        <?php foreach ($varrtype as $vares): ?>
                            <?php if (isset($variationsval[$vares['VariationTypeID']]) && !empty($variationsval[$vares['VariationTypeID']])): ?>
                                <select class="custom-select <?php echo ucfirst($vares['VariationTypeName']); ?>">
                                    <option value="">Select <?php echo ucfirst($vares['VariationTypeName']); ?></option>
                                    <?php foreach ($variationsval[$vares['VariationTypeID']] as $varval): ?>
                                        <option value="<?php echo $varval['VariationID']; ?>">
                                            <?php echo $varval['VariationName']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    
                    <!-- Container for modern visual swatches (auto-generated in JS) -->
                    <div class="swatches-wrapper-custom"></div>
                <?php endif; ?>
                
                <!-- Quantity setup block -->
                <div class="quantity-selector-block">
                    <span class="swatch-label">Quantity:</span>
                    <div class="quantity-control-group">
                        <button type="button" class="qty-btn qty-minus"><i class="fa-solid fa-minus"></i></button>
                        <input type="text" class="qty-input-field" id="quantity_input_val" value="1" readonly>
                        <button type="button" class="qty-btn qty-plus"><i class="fa-solid fa-plus"></i></button>
                    </div>
                </div>
                
                <!-- Hidden quantity input connected to original submit handlers -->
                <input type="hidden" id="quantity_input" value="1">
                
                <!-- Action Buttons block -->
                <div class="purchase-buttons-flex">
                    <form class="addtocartform" action="/addToCart" method="POST" style="flex-grow: 1; display: flex;">
                        <input type="hidden" name="productId" value="<?php echo $all_product_data['ProductID']; ?>">
                        <input type="hidden" name="quantity" id="quantity" value="1" min="1">
                        <input type="hidden" name="price" id="price" value="" />
                        <input type="hidden" name="variationId" value="0">
                        
                        <button class="btn-add-to-cart" type="submit">
                            <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                        </button>
                    </form>
                    <button class="btn-buy-now" type="button">Buy Now</button>
                </div>
                
                <!-- Wishlist & Compare Links -->
                <div class="wishlist-compare-flex">
                    <?php
                    $session = session();
                    $user_id = $session->get('user_id');
                    if (empty($user_id)) {
                        ?>
                        <a href="#" class="wishlist-compare-link" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa-regular fa-heart"></i> Add to Wishlist
                        </a>
                        <?php
                    } else {
                        ?>
                        <a href="<?php echo base_url('wishlist'); ?>" class="wishlist-compare-link">
                            <i class="fa-solid fa-heart" style="color: #8C4E2D;"></i> Add to Wishlist
                        </a>
                        <?php
                    }
                    ?>
                    <a href="#" class="wishlist-compare-link">
                        <i class="fa-solid fa-right-left"></i> Compare
                    </a>
                </div>
                

                
            </div>
        </div>

        <!-- Specifications & Reviews Collapsible Panel -->
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card details-card border-0">
                    <a class="btn btn-primary text-white rounded d-flex align-items-center justify-content-between"
                        data-toggle="collapse" href="#productDetails" role="button"
                        aria-expanded="false" aria-controls="productDetails">
                        <span>View Product Details</span>
                        <i class="ml-2 fa fa-chevron-down"></i>
                    </a>

                    <div class="collapse mt-3" id="productDetails">
                        <ul class="nav nav-pills mb-3 px-3 pt-3 bg-light" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab"
                                    data-toggle="pill" href="#pills-home" role="tab"
                                    aria-controls="pills-home" aria-selected="true">Details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab"
                                    data-toggle="pill" href="#pills-contact" role="tab"
                                    aria-controls="pills-contact" aria-selected="false">Reviews</a>
                            </li>
                        </ul>

                        <div class="tab-content p-4" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Product Type</th>
                                            <td><?php echo !empty($all_product_data['ProductType']) ? ($all_product_data['ProductType'] == 1 ? 'Simple' : 'Variation') : 'N/A'; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Stock</th>
                                            <td><?php echo $all_product_data['ProductStock']; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Dimension</th>
                                            <td><?php echo !empty($all_product_data['product_dimensions']) ? $all_product_data['product_dimensions'] : 'N/A'; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Weight</th>
                                            <td><?php echo !empty($all_product_data['product_weight']) ? $all_product_data['product_weight'] . "gm" : 'N/A'; ?></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Status</th>
                                            <td><?php echo $all_product_data['Stock_Status'] == '1' ? 'In-stock' : 'Out-stock'; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php if (!empty($all_review_data)): ?>
                                            <?php foreach ($all_review_data as $review_data): ?>
                                                <div class="review mb-3 p-3 bg-light rounded" style="box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
                                                    <p class="mb-0 text-dark">
                                                        <?= $review_data['description']; ?>
                                                    </p>
                                                </div>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <p class="text-muted">There are no reviews yet.</p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>

<!-- Modal login override styled clean -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 12px; overflow: hidden; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.15);">
            <div class="modal-header" style="background: #8C4E2D; color: #fff; padding: 20px;">
                <h5 class="modal-title text-white font-weight-bold" style="font-size: 18px;">Login</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close" style="opacity: 1; outline: none;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 30px;">
                <div class="form-group mb-3">
                    <label class="font-weight-600 mb-1" style="font-size: 14px; color: #2D2A26;">Email Address <span class="text-danger">*</span></label>
                    <input type="text" id="emailids" name="emailids" class="form-control" style="height: 46px; border-radius: 8px; border: 1px solid #E8E6E3; padding: 10px 16px; background-color: #FAF8F6;">
                    <div class="emailid_error text-danger mt-1" style="font-size: 12px;"></div>
                </div>
                <div class="form-group mb-4">
                    <label class="font-weight-600 mb-1" style="font-size: 14px; color: #2D2A26;">Password <span class="text-danger">*</span></label>
                    <input type="password" name="password" id="passwords" class="form-control" style="height: 46px; border-radius: 8px; border: 1px solid #E8E6E3; padding: 10px 16px; background-color: #FAF8F6;">
                    <div class="pass_error text-danger mt-1" style="font-size: 12px;"></div>
                </div>
                <div class="msg_data"></div>
            </div>
            <div class="modal-footer" style="padding: 20px 30px; background: #FAF8F6; display: flex; gap: 12px;">
                <button type="button" id="logindata" class="btn text-white rounded" style="background: #8C4E2D; font-weight: 600; padding: 10px 24px; border: none; flex-grow: 1; height: 46px;">Submit</button>
                <button type="button" class="btn bg-secondary text-white rounded" data-dismiss="modal" style="font-weight: 600; padding: 10px 24px; border: none; height: 46px;">Close</button>
            </div>
        </div>
    </div>
</div>

<?= $this->include('footer') ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

<script>
    // Variation types setup
    var varrtype = '<?php print_r(json_encode(array_column($varrtype, 'VariationTypeName'))) ?>';
    var varrtype_json = JSON.parse(varrtype);
    var formattedArray = varrtype_json.map(function (item) {
        return item.charAt(0).toUpperCase() + item.slice(1);
    });
    var formattedString = '.' + formattedArray.join(', .');
    var currency = '<?php echo $all_setting_data["currency"]; ?>';

    // Original AJAX handler on select variations
    $(document).on('change', formattedString, function () {
        var product_id = $("#product_id").val();
        var tmp_arr = [];
        var color = $(".color").val();
        $.each(formattedArray, function (index, value) {
            var selectedValue = $('.' + value).val();
            console.log("Selected value for " + value + ": " + selectedValue);
            tmp_arr.push(selectedValue === "" ? "" : selectedValue);
        });

        var data = {
            varrtype: varrtype_json,
            product_id: product_id,
            varrval: tmp_arr
        };
        var checkVal = $(this).val();
        if (checkVal != '') {
            $.ajax({
                type: 'POST',
                url: base_url + 'show_variation1',
                data: data,
                success: function (response) {
                    var jsonObject = JSON.parse(response);

                    if (jsonObject.status === 'success') {
                        $("#price").val(jsonObject.price);
                        $("span.product_price").text(currency + jsonObject.price);
                        $("input[name='variationId']").val(jsonObject.VariationID);

                        // Update original available options
                        $.each(formattedArray, function (index, value) {
                            console.log(value);
                            var valuesToKeep = jsonObject.availble[value];

                            if (index !== 0) {
                                $('.' + value + ' option').each(function () {
                                    if (valuesToKeep.indexOf($(this).val()) === -1) {
                                        $(this).prop('disabled', true);
                                    } else {
                                        $(this).prop('disabled', false);
                                    }
                                });
                            }

                            var selectedValue = jsonObject.selected_data[index] || "";
                            $('.' + value).val(selectedValue);
                        });

                    } else {
                        console.error("Failed to update variation data.");
                    }
                },
                error: function () {
                    console.error("AJAX request failed.");
                }
            });
        } else {
            var pprice = $("span.product_price").data('value');
            $("span.product_price").text(currency + pprice);
            $("#price").val("");
            $.each(formattedArray, function (index, value) {
                $('.' + value).val('');
            });
        }
    });

    // Custom Dynamic Swatches builder and synchronizer
    function buildVisualSwatches() {
        $('.d-none select').each(function() {
            var select = $(this);
            var type = "";
            if (select.hasClass('Color')) type = "Color";
            else if (select.hasClass('Size')) type = "Size";
            else {
                var classes = select.attr('class').split(' ');
                classes.forEach(function(c) {
                    if (c !== 'custom-select' && c !== '' && formattedArray.indexOf(c) !== -1) {
                        type = c;
                    }
                });
            }
            
            if (!type) return;
            
            var containerId = 'visual-' + type + '-swatches';
            var container = $('#' + containerId);
            
            if (!container.length) {
                var swatchHtml = `
                    <div class="swatch-group ${type}-swatch-group">
                        <span class="swatch-label">${type}: <span class="selected-${type.toLowerCase()}-val">Select ${type}</span></span>
                        <div class="${type.toLowerCase() === 'color' ? 'color-swatches-flex' : 'size-swatches-flex'}" id="${containerId}"></div>
                    </div>
                `;
                $('.swatches-wrapper-custom').append(swatchHtml);
                container = $('#' + containerId);
            }
            
            container.empty();
            
            select.find('option').each(function() {
                var opt = $(this);
                var val = opt.val();
                var text = opt.text().trim();
                var isDisabled = opt.prop('disabled');
                
                if (val === "") return; // Skip default empty option
                
                var isSelected = select.val() === val;
                
                if (type.toLowerCase() === 'color') {
                    // Match visual styling for different colors dynamically
                    var bgStyle = 'background-color: #ccc;';
                    var colorName = text.toLowerCase();
                    if (colorName.indexOf('beige') !== -1) bgStyle = 'background-color: #E6D2B8;';
                    else if (colorName.indexOf('grey') !== -1 || colorName.indexOf('gray') !== -1) bgStyle = 'background-color: #8C8C8C;';
                    else if (colorName.indexOf('green') !== -1) bgStyle = 'background-color: #3F5E4D;';
                    else if (colorName.indexOf('brown') !== -1) bgStyle = 'background-color: #8C4E2D;';
                    else if (colorName.indexOf('blue') !== -1) bgStyle = 'background-color: #3F6072;';
                    else if (colorName.indexOf('black') !== -1) bgStyle = 'background-color: #1A1A1A;';
                    else if (colorName.indexOf('white') !== -1) bgStyle = 'background-color: #FFFFFF; border: 1px solid #E8E6E3;';
                    
                    var activeClass = isSelected ? 'active' : '';
                    var disabledClass = isDisabled ? 'disabled' : '';
                    
                    var swatchItem = `
                        <div class="color-swatch-item ${activeClass} ${disabledClass}" data-value="${val}" title="${text}">
                            <div class="color-swatch-inner" style="${bgStyle}"></div>
                        </div>
                    `;
                    container.append(swatchItem);
                } else {
                    var activeClass = isSelected ? 'active' : '';
                    var disabledClass = isDisabled ? 'disabled' : '';
                    
                    var swatchItem = `
                        <button type="button" class="size-swatch-item ${activeClass} ${disabledClass}" data-value="${val}">
                            ${text}
                        </button>
                    `;
                    container.append(swatchItem);
                }
            });
            
            var selectedText = select.find('option:selected').text().trim();
            if (select.val() === "") {
                selectedText = "Select " + type;
            }
            $('.selected-' + type.toLowerCase() + '-val').text(selectedText);
        });
    }

    // Dynamic savings updater
    function updatePriceSavings(newPrice) {
        var originalPriceElement = $('.price-row .original-price');
        var saveBadgeElement = $('.price-row .save-badge');
        
        var defaultOriginal = parseFloat('<?php echo !empty($all_product_data["ProductPrice"]) ? $all_product_data["ProductPrice"] : 0; ?>');
        var defaultSale = parseFloat('<?php echo !empty($all_product_data["Sale_ProductPrice"]) ? $all_product_data["Sale_ProductPrice"] : 0; ?>');
        
        if (defaultOriginal > defaultSale && defaultOriginal > 0) {
            var ratio = defaultOriginal / defaultSale;
            var calculatedOriginal = newPrice * ratio;
            var savings = calculatedOriginal - newPrice;
            
            originalPriceElement.text(currency + calculatedOriginal.toFixed(2));
            saveBadgeElement.text("You save " + currency + savings.toFixed(2)).show();
        }
    }

    $(document).ready(function () {
        // Build modern swatches on load
        buildVisualSwatches();

        // Sync visual swatches when hidden selects change programmatically
        $(document).ajaxComplete(function(event, xhr, settings) {
            if (settings.url.indexOf('show_variation1') !== -1) {
                buildVisualSwatches();
                
                // Update pricing savings
                var newPrice = parseFloat($('#price').val()) || parseFloat($('span.product_price').text().replace(/[^0-9.]/g, ''));
                if (newPrice > 0) {
                    updatePriceSavings(newPrice);
                }
            }
        });

        // Click handler for custom swatch options
        $(document).on('click', '.color-swatch-item, .size-swatch-item', function() {
            var item = $(this);
            if (item.hasClass('disabled')) return;
            
            var val = item.data('value');
            var parentContainer = item.closest('.color-swatches-flex, .size-swatches-flex');
            var containerId = parentContainer.attr('id');
            var type = containerId.replace('visual-', '').replace('-swatches', '');
            
            var select = $('.d-none select.' + type);
            if (select.length) {
                select.val(val).trigger('change');
            }
        });

        // Plus/Minus quantity handlers
        $(document).on('click', '.qty-minus', function() {
            var display = $('#quantity_input_val');
            var realInput = $('#quantity_input');
            var val = parseInt(display.val()) || 1;
            if (val > 1) {
                var newVal = val - 1;
                display.val(newVal);
                realInput.val(newVal).trigger('change');
            }
        });

        $(document).on('click', '.qty-plus', function() {
            var display = $('#quantity_input_val');
            var realInput = $('#quantity_input');
            var val = parseInt(display.val()) || 1;
            var newVal = val + 1;
            display.val(newVal);
            realInput.val(newVal).trigger('change');
        });

        // Custom next/prev arrows inside gallery main
        $(document).on('click', '.gallery-nav-btn.next', function() {
            var active = $('.thumbnail-item.active_img');
            var next = active.next('.thumbnail-item');
            if (!next.length) {
                next = $('.thumbnail-item').first();
            }
            next.trigger('click');
        });
        
        $(document).on('click', '.gallery-nav-btn.prev', function() {
            var active = $('.thumbnail-item.active_img');
            var prev = active.prev('.thumbnail-item');
            if (!prev.length) {
                prev = $('.thumbnail-item').last();
            }
            prev.trigger('click');
        });

        // Buy Now handler
        $(document).on('click', '.btn-buy-now', function(e) {
            e.preventDefault();
            
            // Validate selections
            var Color = $(".Color").val();
            var Size = $(".Size").val();
            var Material = $(".Material").val();

            if ($(".Color").length && Color == '') {
                $(".Color-swatch-group").css('border', '1px solid red').css('padding', '8px').css('border-radius', '8px');
                $('html, body').animate({
                    scrollTop: $(".Color-swatch-group").offset().top - 100
                }, 500);
                return false;
            }
            if ($(".Size").length && Size == '') {
                $(".Size-swatch-group").css('border', '1px solid red').css('padding', '8px').css('border-radius', '8px');
                $('html, body').animate({
                    scrollTop: $(".Size-swatch-group").offset().top - 100
                }, 500);
                return false;
            }
            if ($(".Material").length && Material == '') {
                $(".Material-swatch-group").css('border', '1px solid red').css('padding', '8px').css('border-radius', '8px');
                $('html, body').animate({
                    scrollTop: $(".Material-swatch-group").offset().top - 100
                }, 500);
                return false;
            }

            var form = $('.addtocartform');
            var fd = new FormData(form[0]);
            
            $('#semiTransparenDiv').css('display', 'block');
            
            $.ajax({
                type: 'POST',
                url: form.attr('action'),
                data: fd,
                contentType: false,
                processData: false,
                success: function (response) {
                    window.location.href = base_url + 'checkout';
                },
                error: function() {
                    window.location.href = base_url + 'checkout';
                }
            });
        });

        // Original script logic overrides
        $('select[name="variations[]"]').on('change', function () {
            var form = document.getElementById('productForm');
            var formData = new FormData(form);

            $.ajax({
                url: "/getvariationsprice",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    $('.product_price').html(response);
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.log("Error: " + errorThrown);
                }
            });
        });

        $("#quantity_input").on('change', function () {
            var qty = $(this).val();
            $("#quantity").val(qty);
        });

        $(document).on('click', '#logindata', function () {
            var emailids = $("#emailids").val();
            var passwords = $("#passwords").val();

            var flag = 1;
            $(".error").remove();
            if (emailids == '') {
                $(".emailids").after('<span class="error text-danger">Please enter email id</span>');
                flag = 0;
            }
            if (passwords == '') {
                $(".emailids").after('<span class="error text-danger">Please enter password</span>');
                flag = 0;
            }
            if (flag == 0) {
                return false;
            }
            $.ajax({
                type: 'post',
                url: '/checkout_login',
                data: { emailids: emailids, passwords: passwords },
                success: function (data) {
                    if (data == '2') {
                        $(".msg_data").html('<span class="error text-success">Login successfully</span>');
                        setTimeout(function () {
                            window.location.reload();
                        }, 2000);
                    }
                    else {
                        $(".msg_data").html('<span class="error text-danger">Invalid login</span>');
                    }
                }
            });
        });

        // Gallery click handlers
        $(document).on('click', '.preview-image', function () {
            const imagePath = $(this).attr('src');
            $('.preview-image').removeClass("active_img");
            $(this).addClass("active_img");
            $('.image_selected').attr('data-image', imagePath);
            $('.product-img--main__image').css({
                'background-image': 'url(' + $('.image_selected').attr('data-image') + ')'
            });
        });

        $(document).on('mouseover', '.main-category', function () {
            $(this).css('opacity', '0');
            $(this).css('z-index', '0');
        });

        // Main Image Zoom logic
        $('.product-img--main')
            .on('mouseover', function () {
                $(this).children('.product-img--main__image').css({
                    'transform': 'scale(' + $(this).attr('data-scale') + ')'
                });
            })
            .on('mouseout', function () {
                $(this).children('.product-img--main__image').css({
                    'transform': 'scale(1)'
                });
            })
            .on('mousemove', function (e) {
                $(this).children('.product-img--main__image').css({
                    'transform-origin': ((e.pageX - $(this).offset().left) / $(this).width()) * 100 + '% ' + ((e.pageY - $(this).offset().top) / $(this).height()) * 100 + '%'
                });
            })
            .each(function () {
                $(this)
                    .append('<div class="product-img--main__image"></div>')
                    .children('.product-img--main__image').css({
                        'background-image': 'url(' + $(this).attr('data-image') + ')'
                    });
            });
    });
</script>