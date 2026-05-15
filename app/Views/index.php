<?= $this->include('header') ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
<!-- Slider Area -->
<style>
    .product-action {
        display: flex !important;
    }

    button.add_to_cart {
        border: none;
        background: none;
        padding-left: 10px;
        font-size: 14px;
        font-weight: 500;
        outline: none;
    }


    .shop-blog .shop-single-blog {

        box-shadow: 1px 1px 5px 1px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
    }

    .single-product {
        height: 325px !important;
    }

    .modal-content {
        border-radius: 8px !important;
    }

    .nav-tabs .nav-item .nav-link {
        border: none;
        box-shadow: 0px 5px 7px 0px rgba(0, 0, 0, 0.25);
        vertical-align: -webkit-baseline-middle;
    }

    .single-product {
        height: 275px !important;
        transition: all ease 0.25s;
    }

    .section-title .explore_title::before {
        background: #F7941D !important;
        position: absolute;
        content: "";
        height: 2px;
        width: 50px;
        left: 50%;
        /*bottom: 0;*/
        bottom: -8px;
        margin-left: -25px;

    }

    .ny-cont {
        background-color: #f7941d;
        color: white;
        padding: 20px;
        border-radius: 60px;
        text-align: left;
        display: flex;
        align-items: center;
        text-decoration: none;
        box-shadow: 0 5px 9px 2px rgba(0, 0, 0, 0.25);
    }

    #ny-ico {
        font-size: 23px;
        color: #f7941d;
        margin-right: 15px;
        background: white;
        border-radius: 50%;
        height: 45px;
        width: 45px;
        line-height: 38px;
        padding: 4px 11px;
    }

    .h2title {
        display: inline-block;
        position: relative;
        /* font-size: 28px; */
        /* font-weight: bold; */
        /* color: #333; */
        /* text-align: center; */
    }

    .h2title:before,
    .h2title:after {
        content: "";
        position: absolute;
        top: 50%;
        width: 100%;
        height: 1px;
        background-color: #f7941d;
    }

    .h2title:before {
        left: -105%;
        /* Adjust spacing */
        transform: translateY(-50%);
    }

    .h2title:after {
        right: -105%;
        /* Adjust spacing */
        transform: translateY(-50%);
    }

    .category-area {
        max-width: 1260px;
        /* Adjust this value as needed */
        margin: 0 auto;
        /* Center the container */
    }

    #cat-carousel .single-category {
        /* Ensure each item maintains a consistent width */
        min-width: 180px;
        /* Set the minimum width to the size of the image */
    }

    @media (max-width: 767px) {
        #cat-carousel {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            /* 2 items per row on small screens */
            gap: 10px;
            /* Adjust gap between items */
        }
    }

    @media (min-width: 768px) and (max-width: 1000px) {
        #cat-carousel {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            /* 3 items per row on medium screens */
            gap: 10px;
        }
    }

    @media (min-width: 1001px) {
        #cat-carousel {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            /* 6 items per row on larger screens */
            gap: 10px;
        }
    }

    /* Swiper CSS */
    .cat-swiper .swiper-wrapper {
        display: flex !important;
    }

    .cat-swiper .swiper-slide {
        height: auto !important;
    }

    .single-category {
        flex-shrink: 0;
    }

    .category-area .swiper {
        padding: 20px 0 !important;
    }

    .category-area .swiper-button-next,
    .category-area .swiper-button-prev {
        background-color: white;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        border: 1px solid #eee;
        color: #666;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        top: 40%;
        margin: 0;
        z-index: 100;
    }

    .category-area .swiper-button-prev {
        left: -15px !important;
    }

    .category-area .swiper-button-next {
        right: -15px !important;
    }

    .category-area .swiper-button-next:after,
    .category-area .swiper-button-prev:after {
        font-size: 10px;
        font-weight: bold;
    }

    .category-area .swiper-button-next:hover,
    .category-area .swiper-button-prev:hover {
        border-color: #F7941D;
        color: #F7941D;
    }

    .category-area .section-title {
        text-align: center;
    }

    .category-area .explore_title {
        text-transform: uppercase;
        font-size: 12px !important;
        letter-spacing: 2px;
        color: #888;
        font-weight: 600;
    }

    .category-area .explore_title::before {
        display: none !important;
    }

    .category-area h2 {
        font-weight: 700;
        color: #1a2b48;
        font-size: 26px;
    }

    .img-cat {
        width: 140px !important;
        height: 140px !important;
        background-color: white !important;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.06) !important;
        border-radius: 50% !important;
        display: flex !important;
        align-items: center;
        justify-content: center;
        padding: 8px !important;
        transition: transform 0.3s ease;
    }

    .img-cat:hover {
        transform: translateY(-5px);
    }

    .img-cat img {
        height: 120px !important;
        width: 120px !important;
        border-radius: 50%;
        object-fit: cover;
    }

    .category-content h3 a {
        font-weight: 700 !important;
        color: #333 !important;
        font-size: 15px !important;
    }

    /* Hero Slider Styles - Refined */
    .hero-slider {
        background-color: #f4f1ef !important;
        overflow: hidden;
        position: relative;
    }

    .hero-slider .swiper-slide {
        display: flex !important;
        align-items: center !important;
        /* min-height: 550px !important; */
        padding: 40px 0 !important;
        background: transparent !important;
    }

    .hero-slider .hero-text {
        text-align: left !important;
        padding-right: 30px;
    }

    .hero-slider .hero-text h1 {
        font-family: 'Poppins', sans-serif !important;
        font-size: 33px !important;
        font-weight: 800 !important;
        color: #1a2b48 !important;
        /* Navy color */
        line-height: 1.2 !important;
        margin-bottom: 25px !important;
        text-transform: none !important;
        letter-spacing: -1px !important;
    }

    .hero-slider .hero-text h1 span.highlight {
        color: #F7941D !important;
        /* Orange highlight */
        font-size: inherit !important;
        font-weight: inherit !important;
        display: inline-block !important;
        vertical-align: baseline !important;
    }

    .hero-slider .hero-text p {
        font-family: 'Poppins', sans-serif !important;
        font-size: 18px !important;
        color: #4a5568 !important;
        margin-bottom: 40px !important;
        max-width: 500px !important;
        line-height: 1.6 !important;
        font-weight: 400 !important;
    }

    .hero-slider .hero-text .button .btn {
        background: #ff6700 !important;
        color: #fff !important;
        padding: 16px 40px !important;
        border-radius: 12px !important;
        font-weight: 700 !important;
        text-transform: none !important;
        transition: all 0.3s ease !important;
        border: none !important;
        display: inline-block !important;
        font-size: 16px !important;
        box-shadow: 0 4px 14px rgba(247, 148, 29, 0.3) !important;
    }

    .hero-slider .hero-text .button .btn:hover {
        background: #e68512 !important;
        transform: translateY(-3px) !important;
        box-shadow: 0 6px 20px rgba(247, 148, 29, 0.4) !important;
    }

    .hero-slider .hero-image-container {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1;
    }

    .hero-slider .hero-bg-shape {
        position: absolute;
        top: 50%;
        right: -5%;
        transform: translateY(-50%);
        width: 110%;
        height: 90%;
        background: #edf2f7;
        border-radius: 60px;
        z-index: -1;
    }

    .hero-slider .hero-image-container img {
        width: 100% !important;
        height: 300px !important;
        object-fit: cover !important;
        border-radius: 24px !important;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1) !important;
    }

    @media (max-width: 991px) {
        .hero-slider .hero-image-container img {
            height: 300px !important;
        }
    }

    .hero-slider .swiper-pagination-bullet-active {
        background: #F7941D !important;
    }

    /* Hero Navigation Buttons */
    .hero-slider .hero-button-next,
    .hero-slider .hero-button-prev {
        width: 48px;
        height: 48px;
        background-color: white;
        border-radius: 50%;
        color: #1a2b48;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        top: 50%;
        transform: translateY(-50%);
        margin: 0;
        z-index: 10;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .hero-slider .hero-button-next:after,
    .hero-slider .hero-button-prev:after {
        font-size: 18px;
        font-weight: bold;
    }

    .hero-slider .hero-button-next:hover,
    .hero-slider .hero-button-prev:hover {
        background-color: #F7941D;
        color: white;
        box-shadow: 0 6px 20px rgba(247, 148, 29, 0.4);
    }

    .hero-slider .hero-button-prev {
        left: 30px !important;
    }

    .hero-slider .hero-button-next {
        right: 30px !important;
    }

    @media (max-width: 991px) {

        .hero-slider .hero-button-next,
        .hero-slider .hero-button-prev {
            display: none;
        }
    }

    .hero-slider .swiper-slide .row {
        width: 100% !important;
        display: flex !important;
        flex-wrap: wrap !important;
    }

    @media (min-width: 992px) {
        .hero-slider .swiper-slide .row {
            flex-wrap: nowrap !important;
        }

        .hero-slider .hero-text {
            flex: 0 0 50% !important;
            max-width: 60% !important;
        }

        .hero-slider .hero-image-container {
            flex: 0 0 50% !important;
            /* max-width: 50% !important; */
        }
    }

    @media (max-width: 991px) {
        .hero-slider .swiper-slide {
            flex-direction: column !important;
            text-align: center !important;
            padding: 60px 20px !important;
            min-height: auto !important;
        }

        .hero-slider .hero-text {
            margin-bottom: 40px !important;
            padding-right: 0 !important;
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
            width: 100% !important;
        }

        .hero-slider .hero-text p {
            margin-left: auto !important;
            margin-right: auto !important;
        }

        .hero-slider .hero-text h1 {
            font-size: 36px !important;
        }

        .hero-slider .hero-bg-shape {
            width: 100% !important;
            right: 0 !important;
        }

        .hero-slider .hero-image-container {
            width: 100% !important;
            display: block !important;
        }
    }
</style>
<?php
$AllsettingsModel = new \App\Models\Allsettingsmodel();
$all_setting_data = $AllsettingsModel->first();
?>
<section class="hero-slider">
    <div class="swiper hero-swiper">
        <div class="swiper-wrapper">
            <?php
            foreach ($banner as $ban) {
                ?>
                <div class="swiper-slide">
                    <div class="hero-slide-item">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-12 col-12">
                                    <div class="hero-content">
                                        <span class="sub-title">MODERN LIVING</span>
                                        <h1 class="main-title"><?php echo $ban['BannerTitle']; ?></h1>
                                        <p class="description"><?php echo $ban['BannerText']; ?></p>
                                        <?php if (!empty($ban['BannerUrl'])) { ?>
                                            <div class="hero-button">
                                                <a href="<?php echo $ban['BannerUrl']; ?>" class="btn-shop-now">
                                                    Shop Now <i class="fa-solid fa-arrow-right"></i>
                                                </a>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-12 d-none d-lg-block">
                                    <div class="hero-img-wrap">
                                        <img src="<?php echo base_url("admin/public/upload_images/" . $ban['BannerImg']); ?>"
                                            alt="">
                                        <div class="sale-badge">
                                            <span class="up-to">UP TO</span>
                                            <span class="percent">40%</span>
                                            <span class="off">OFF</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <!-- Swiper Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Swiper Navigation -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</section>
<!--/ End Slider Area -->

<!-- -------------- Categories ------------- -->
<div class="category-area pt-5 pb-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-header text-center mb-5">
                    <span class="sub-title">Explore</span>
                    <h2 class="main-title">Shop By Categories</h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 position-relative">
                <div class="swiper cat-swiper">
                    <div class="swiper-wrapper">
                        <?php foreach ($category as $index => $cat) { 
                            $colors = ['#f7941d', '#ff6b6b', '#4ecdc4', '#45b7d1', '#96ceb4', '#ffeead'];
                            $icons = ['fa-shirt', 'fa-shoe-prints', 'fa-laptop', 'fa-mobile-screen-button', 'fa-headphones', 'fa-gamepad', 'fa-puzzle-piece', 'fa-clock'];
                            $color = $colors[$index % count($colors)];
                            $icon = $icons[$index % count($icons)];
                        ?>
                            <div class="swiper-slide">
                                <div class="category-card text-center">
                                    <a href="<?php echo base_url('category/' . base64_encode($cat['CategoryID'])); ?>" class="category-img-link">
                                        <div class="category-circle">
                                            <?php if (!empty($cat['Catagoryimage'])) { ?>
                                                <img src="<?php echo base_url(); ?>admin/public/upload_images/<?php echo $cat['Catagoryimage']; ?>" alt="">
                                            <?php } else { ?>
                                                <img src="<?php echo base_url(); ?>admin/public/upload_images/no_category.webp" alt="">
                                            <?php } ?>
                                            <div class="category-icon-badge" style="background-color: <?php echo $color; ?>;">
                                                <i class="fa-solid <?php echo $icon; ?>"></i>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="category-info mt-3">
                                        <h3><a href="<?php echo base_url('category/' . base64_encode($cat['CategoryID'])); ?>"><?php echo $cat['CategoryName']; ?></a></h3>
                                        <p class="product-count">Explore Products</p>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- Swiper Navigation -->
                <div class="cat-button-prev"><i class="fa fa-angle-left"></i></div>
                <div class="cat-button-next"><i class="fa fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>



<!-- Start New Arrivals Area -->
<div class="product-area pt-5 pb-4">
    <div class="container">
        <div class="row align-items-center mb-4">
            <div class="col-md-6 col-8">
                <div class="section-header text-left">
                    <span class="sub-title">Explore</span>
                    <h2 class="main-title">New Arrivals</h2>
                </div>
            </div>
            <div class="col-md-6 col-4 text-right">
                <a href="<?php echo base_url('product'); ?>" class="btn-view-all">View All <i class="fa fa-angle-right"></i></a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 position-relative">
                <div class="swiper product-swiper">
                    <div class="swiper-wrapper pt-2">
                        <?php foreach ($recent_products as $prd) { 
                            $jsondt = json_decode($prd['ProductImage']);
                            $price = $prd['Sale_ProductPrice'] ?? $prd['ProductPrice'] ?? 0;
                            $oldPrice = $prd['ProductPrice'] ?? 0;
                        ?>
                            <div class="swiper-slide">
                                <div class="modern-product-card">
                                    <div class="product-header">
                                        <span class="badge-new">NEW</span>
                                        <div class="wishlist-action">
                                            <?php $user_id = session()->get('user_id');
                                            if (empty($user_id)) { ?>
                                                <a href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa-regular fa-heart"></i></a>
                                            <?php } else { ?>
                                                <i class="add_wishlist fa-regular fa-heart" data-id="<?= $prd['ProductID'] ?>"></i>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <a href="<?php echo base_url($prd['slug'] . "/product_detail/" . base64_encode($prd['ProductID'])); ?>" class="product-img-wrap">
                                        <?php if (!empty($jsondt)) { ?>
                                            <img src="<?php echo base_url(); ?>admin/public/assets/img/product_images/<?php echo $jsondt[0]; ?>" alt="">
                                        <?php } else { ?>
                                            <img src="<?php echo base_url(); ?>admin/public/assets/img/product_images/placeholder.jpg" alt="">
                                        <?php } ?>
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
                                            <a href="<?php echo base_url($prd['slug'] . "/product_detail/" . base64_encode($prd['ProductID'])); ?>">
                                                <?php echo $prd['ProductName']; ?>
                                            </a>
                                        </h3>
                                        <div class="product-price">
                                            <span class="current-price">€<?php echo number_format($price, 2); ?></span>
                                            <?php if ($oldPrice > $price) { ?>
                                                <span class="old-price">€<?php echo number_format($oldPrice, 2); ?></span>
                                            <?php } ?>
                                        </div>
                                        <div class="product-buttons">
                                            <form class="addtocartform" action="/addToCart" method="POST">
                                                <input type="hidden" name="productId" value="<?php echo $prd['ProductID']; ?>">
                                                <input type="hidden" name="quantity" value="1">
                                                <input type="hidden" name="price" value="<?php echo $price; ?>">
                                                <button type="submit" class="btn-add-cart">
                                                    <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                                                </button>
                                            </form>
                                            <a href="<?php echo base_url($prd['slug'] . "/product_detail/" . base64_encode($prd['ProductID'])); ?>" class="btn-buy-now">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- Navigation -->
                <div class="prod-button-prev"><i class="fa fa-angle-left"></i></div>
                <div class="prod-button-next"><i class="fa fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>


<!-- Start Trending Items Area -->
<div class="product-area pt-4 pb-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <div class="section-header">
                    <span class="sub-title">Explore</span>
                    <h2 class="main-title">Trending Items</h2>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="product-info">
                    <div class="nav-main mb-4">
                        <ul class="nav nav-tabs justify-content-center border-0" id="myTab" role="tablist">
                            <?php foreach (array_slice($category, 0, 5) as $key => $cate) { ?>
                                <li class="nav-item">
                                    <a class="nav-link modern-tab-link <?php echo $key == 0 ? 'active' : ''; ?>" data-toggle="tab"
                                        href="#<?php echo $cate['CategoryID']; ?>" role="tab">
                                        <?php echo $cate['CategoryName']; ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    
                    <div class="tab-content" id="myTabContent">
                        <?php foreach ($category as $key => $cate) { ?>
                            <div class="tab-pane fade show <?php echo $key == 0 ? 'active' : ''; ?>" id="<?php echo $cate['CategoryID']; ?>" role="tabpanel">
                                <div class="row g-4">
                                    <?php
                                    $products = $prod[$cate['CategoryID']];
                                    $counter = 0;
                                    foreach ($products as $prd) {
                                        if (!empty($prd['ProductImage'])) {
                                            $counter++;
                                            if ($counter > 4) break;
                                            
                                            $jsondt = json_decode($prd['ProductImage']);
                                            $price = $prd['Sale_ProductPrice'] ?? $prd['ProductPrice'] ?? 0;
                                            $oldPrice = $prd['ProductPrice'] ?? 0;
                                    ?>
                                        <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                                            <div class="modern-product-card">
                                                <div class="product-header">
                                                    <span class="badge-new">TRENDING</span>
                                                    <div class="wishlist-action">
                                                        <?php $user_id = session()->get('user_id');
                                                        if (empty($user_id)) { ?>
                                                            <a href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa-regular fa-heart"></i></a>
                                                        <?php } else { ?>
                                                            <i class="add_wishlist fa-regular fa-heart" data-id="<?= $prd['ProductID'] ?>"></i>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <a href="<?php echo base_url($prd['slug'] . "/product_detail/" . base64_encode($prd['ProductID'])); ?>" class="product-img-wrap">
                                                    <?php if (!empty($jsondt)) { ?>
                                                        <img src="<?php echo base_url(); ?>admin/public/assets/img/product_images/<?php echo $jsondt[0]; ?>" alt="">
                                                    <?php } else { ?>
                                                        <img src="<?php echo base_url(); ?>admin/public/assets/img/product_images/placeholder.jpg" alt="">
                                                    <?php } ?>
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
                                                        <span class="review-count">(<?php echo rand(50, 200); ?>)</span>
                                                    </div>
                                                    <h3 class="product-title">
                                                        <a href="<?php echo base_url($prd['slug'] . "/product_detail/" . base64_encode($prd['ProductID'])); ?>">
                                                            <?php echo $prd['ProductName']; ?>
                                                        </a>
                                                    </h3>
                                                    <div class="product-price">
                                                        <span class="current-price">€<?php echo number_format($price, 2); ?></span>
                                                        <?php if ($oldPrice > $price) { ?>
                                                            <span class="old-price">€<?php echo number_format($oldPrice, 2); ?></span>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="product-buttons">
                                                        <form class="addtocartform" action="/addToCart" method="POST">
                                                            <input type="hidden" name="productId" value="<?php echo $prd['ProductID']; ?>">
                                                            <input type="hidden" name="quantity" value="1">
                                                            <input type="hidden" name="price" value="<?php echo $price; ?>">
                                                            <button type="submit" class="btn-add-cart">
                                                                <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                                                            </button>
                                                        </form>
                                                        <a href="<?php echo base_url($prd['slug'] . "/product_detail/" . base64_encode($prd['ProductID'])); ?>" class="btn-buy-now">Buy Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Product Area -->

<!-- Start Best Sellers Area -->
<div class="product-area pt-4 pb-5">
    <div class="container">
        <div class="row align-items-center mb-4">
            <div class="col-md-6 col-8">
                <div class="section-header text-left">
                    <span class="sub-title">Explore</span>
                    <h2 class="main-title">Best Sellers</h2>
                </div>
            </div>
            <div class="col-md-6 col-4 text-right">
                <a href="<?php echo base_url('product'); ?>" class="btn-view-all">View All <i class="fa fa-angle-right"></i></a>
            </div>
        </div>

        <div class="row">
            <div class="col-12 position-relative">
                <div class="swiper best-swiper pt-2">
                    <div class="swiper-wrapper">
                        <?php foreach ($allproduct as $prddt) { 
                            $jsondt = json_decode($prddt['ProductImage']);
                            $price = $prddt['Sale_ProductPrice'] ?? $prddt['ProductPrice'] ?? 0;
                            $oldPrice = $prddt['ProductPrice'] ?? 0;
                        ?>
                            <div class="swiper-slide">
                                <div class="modern-product-card">
                                    <div class="product-header">
                                        <span class="badge-new" style="background: #f7941d;">HOT</span>
                                        <div class="wishlist-action">
                                            <?php $user_id = session()->get('user_id');
                                            if (empty($user_id)) { ?>
                                                <a href="#" data-toggle="modal" data-target="#exampleModal"><i class="fa-regular fa-heart"></i></a>
                                            <?php } else { ?>
                                                <i class="add_wishlist fa-regular fa-heart" data-id="<?= $prddt['ProductID'] ?>"></i>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <a href="<?php echo base_url($prddt['slug'] . "/product_detail/" . base64_encode($prddt['ProductID'])); ?>" class="product-img-wrap">
                                        <?php if (!empty($jsondt)) { ?>
                                            <img src="<?php echo base_url(); ?>admin/public/assets/img/product_images/<?php echo $jsondt[0]; ?>" alt="">
                                        <?php } else { ?>
                                            <img src="<?php echo base_url(); ?>admin/public/assets/img/product_images/placeholder.jpg" alt="">
                                        <?php } ?>
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
                                            <span class="review-count">(<?php echo rand(100, 500); ?>)</span>
                                        </div>
                                        <h3 class="product-title">
                                            <a href="<?php echo base_url($prddt['slug'] . "/product_detail/" . base64_encode($prddt['ProductID'])); ?>">
                                                <?php echo $prddt['ProductName']; ?>
                                            </a>
                                        </h3>
                                        <div class="product-price">
                                            <span class="current-price">€<?php echo number_format($price, 2); ?></span>
                                            <?php if ($oldPrice > $price) { ?>
                                                <span class="old-price">€<?php echo number_format($oldPrice, 2); ?></span>
                                            <?php } ?>
                                        </div>
                                        <div class="product-buttons">
                                            <form class="addtocartform" action="/addToCart" method="POST">
                                                <input type="hidden" name="productId" value="<?php echo $prddt['ProductID']; ?>">
                                                <input type="hidden" name="quantity" value="1">
                                                <input type="hidden" name="price" value="<?php echo $price; ?>">
                                                <button type="submit" class="btn-add-cart">
                                                    <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                                                </button>
                                            </form>
                                            <a href="<?php echo base_url($prddt['slug'] . "/product_detail/" . base64_encode($prddt['ProductID'])); ?>" class="btn-buy-now">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- Navigation -->
                <div class="best-button-prev"><i class="fa fa-angle-left"></i></div>
                <div class="best-button-next"><i class="fa fa-angle-right"></i></div>
            </div>
        </div>
    </div>
</div>
<!-- End Most Popular Area -->

<!-- Start Shop Blog Area -->
<section class="shop-blog pt-4 pb-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <div class="section-header">
                    <span class="sub-title">Explore</span>
                    <h2 class="main-title">From Our Blog</h2>
                </div>
            </div>
        </div>
        <div class="row g-4">
            <?php foreach ($blog as $bl) { 
                $blog_title = $bl['title'];
                $blog_String = str_replace(' ', '_', $blog_title);
                $blog_link = base_url() . "blog/" . $bl['CategoryName'] . "/" . $blog_String . "/" . base64_encode($bl['id']) . "/" . base64_encode($bl['category']);
            ?>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="modern-blog-card">
                        <div class="blog-img-wrap">
                            <a href="<?php echo $blog_link; ?>">
                                <img src="<?php echo base_url(); ?>admin/public/upload_images/<?php echo $bl['image']; ?>" alt="<?php echo $bl['title']; ?>">
                            </a>
                            <div class="blog-date">
                                <span><?php echo date("d", strtotime($bl['updated_at'])); ?></span>
                                <small><?php echo date("M", strtotime($bl['updated_at'])); ?></small>
                            </div>
                        </div>
                        <div class="blog-content">
                            <h3 class="blog-title">
                                <a href="<?php echo $blog_link; ?>"><?php echo $bl['title']; ?></a>
                            </h3>
                            <p class="blog-excerpt">Discover the latest trends and insights in modern furniture design and home decor...</p>
                            <a href="<?php echo $blog_link; ?>" class="btn-read-more">
                                Continue Reading <i class="fa fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<?php

$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $directoryURI);
$first_part = $components[1];
$cmsdata = new App\Models\CmsModel();
$resdt = $cmsdata->get()->getResult('array');

$stripe_public_key = 'stripe_public_key';
$stripe_secret_key = 'stripe_secret_key';

$key_id = 'rzp_test_9UrkTeo8gsGo77';
$key_secret = 'rOG3EgOvfgOTlRIPSvjuFn8T';

$paymentGatewayModel = new \App\Models\Paymentgatewaymodel();
$paymentgateway = $paymentGatewayModel->findAll();

if (!empty($paymentgateway)) {
    foreach ($paymentgateway as $pgateway) {
        if ($pgateway['status'] == 1) {

            if ($pgateway['type'] == 1) {
            } else if ($pgateway['type'] == 2) {
            }
            if ($pgateway['type'] == 3) {
                //echo '3=paypal';

            }
            if ($pgateway['type'] == 4) {
                // echo '4=strip';
                $pdata = json_decode($pgateway['details'], true);
                if ($pdata) {
                    $stripe_public_key = $pdata['public_key'] ?? '';
                    $stripe_secret_key = $pdata['secret_key'] ?? '';
                }
            }
            if ($pgateway['type'] == 5) {
                // echo '5=razorpay';
                $pdata = json_decode($pgateway['details'], true);
                if ($pdata) {
                    $key_id = $pdata['keyId'] ?? '';
                    $key_secret = $pdata['key_secret'] ?? '';
                }
            }
        }
    }
}
?>


<style>
    .send_email:focus-visible {
        outline: none;
    }

    /* .footer {
    position: relative;
    bottom: 0;
} */
</style>
<!-- Start Footer Area -->
<!-- Start Shop Services Area -->
<section class="shop-services section home">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-6 pl-0">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-rocket"></i>
                    <h4>Free Shipping</h4>
                    <p class="mt-0">Orders over 100</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-6 pl-0">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-reload"></i>
                    <h4>Free Return</h4>
                    <p class="mt-0">Within 30 days returns</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-6 pl-0">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-lock"></i>
                    <h4>Secure Payment</h4>
                    <p class="mt-0">100% secure payment</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-6 pl-0">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-tag"></i>
                    <h4>Best Piece</h4>
                    <p class="mt-0">Gauranteed price</p>
                </div>
                <!-- End Single Service -->
            </div>
        </div>
    </div>
</section>
<!-- End Shop Services Area -->

<!-- Start Shop Newsletter  -->
<section class="shop-newsletter section pt-4 pb-0">
    <div class="container-fluid">
        <div class="inner-top">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-12">
                    <!-- Start Newsletter Inner -->
                    <div class="inner">
                        <h4>Newsletter</h4>
                        <p class="my-2"> Subscribe to our newsletter</p>
                        <form id="add_subscribe" method="post" target="_blank" class="newsletter-inner">
                            <div>
                                <input type="hidden" name="baseurl" id="baseurl" value="<?php echo base_url(); ?>">
                                <input name="email" id="send_email" class="send_email" placeholder="Your email address"
                                    required="" type="email">
                                <button type="submit" class="btn send_email_data">Subscribe</button>
                                <p id="msg" class="pl-3 text-left"></p>
                            </div>

                        </form>
                    </div>
                    <!-- End Newsletter Inner -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Shop Newsletter -->

<footer class="footer">
    <!-- Footer Top -->
    <div class="footer-top section pt-4 pb-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-12">
                    <div class="single-footer about">
                        <!-- Mobile view: collapse behavior -->
                        <h4 class="d-block d-lg-none mb-0" data-bs-toggle="collapse" data-bs-target="#aboutSection"
                            aria-expanded="false">
                            <?= $all_setting_data['Title'] ?? ''; ?>
                            <span class="bi-chevron-down float-right text-white"></span>
                        </h4>
                        <div class="collapse d-lg-none" id="aboutSection">
                            <p class=" text text-capitalize"><?= $all_setting_data['Description'] ?? ''; ?></p>

                        </div>

                        <!-- Desktop view: visible section -->
                        <div class="d-none d-lg-block">
                            <h4><?= $all_setting_data['Title'] ?? ''; ?></h4>
                            <p class="mt-0 text text-capitalize"><?= $all_setting_data['Description'] ?? ''; ?></p>

                            <div class="download-app">
                                <p class="mt-1 text-capitalize" style="font-size:14px;color:white;">Download the app for
                                    free</p>
                                <a href="https://play.google.com/store/games?hl=en_IN">
                                    <img src="https://assets.pharmeasy.in/apothecary/images/googlePlay.svg?dim=360x0"
                                        alt="Google Play" class="img-fluid me-2" style="max-width: 110px;">
                                </a>
                                <a href="https://www.apple.com/in/app-store/">
                                    <img src="https://assets.pharmeasy.in/apothecary/images/appStore.svg?dim=256x0"
                                        alt="App Store" class="img-fluid" style="max-width: 100px;">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 col-12">
                    <!-- Single Widget -->
                    <div class="single-footer links">
                        <!-- Mobile view: collapsible section -->
                        <h4 class="d-block d-lg-none mb-0" data-bs-toggle="collapse"
                            data-bs-target="#informationSection" aria-expanded="false">
                            Information <span class="bi-chevron-down float-right"></span>
                        </h4>
                        <!--small screen --------->
                        <div class="collapse d-lg-none" id="informationSection">
                            <ul class="mb-0">
                                <li class="mt-2"><a href="<?php echo base_url('about_us'); ?>">About Us</a></li>
                                <li class="<?= $first_part == 'contact' ? 'active' : '' ?> mb-0">
                                    <a href="<?php echo base_url('contact'); ?>">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                        <!---------------->

                        <!-- Desktop view: visible section -->
                        <div class="d-none d-lg-block">
                            <h4>Information</h4>
                            <ul>
                                <li class="mt-2"><a href="<?php echo base_url('about_us'); ?>">About Us</a></li>
                                <li class="<?= $first_part == 'contact' ? 'active' : '' ?>">
                                    <a href="<?php echo base_url('contact'); ?>">Contact Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Single Widget -->
                </div>

                <div class="col-lg-2 col-md-6 col-12">
                    <div class="single-footer links">
                        <h4 class="d-block d-lg-none mb-0" data-bs-toggle="collapse" data-bs-target="#policySection"
                            aria-expanded="false">Our Policies <span class="bi-chevron-down float-right"></span></h4>
                        <div class="collapse d-lg-none" id="policySection">
                            <ul>
                                <?php foreach ($resdt as $rsdata) { ?>
                                    <?php if ($rsdata['status'] == 1) { // Only display CMS topics with status = 1 
                                                ?>
                                        <li class="<?= $first_part == $rsdata['CmsUrl'] ? 'active' : '' ?> mb-0">
                                            <a href="<?php echo base_url() . $rsdata['CmsUrl']; ?>">
                                                <?php echo $rsdata['CmsTitle']; ?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                <?php } ?>
                            </ul>
                        </div>

                        <!-- Desktop view: visible section -->
                        <div class="d-none d-lg-block">
                            <h4>Our Policies</h4>
                            <ul>
                                <?php foreach ($resdt as $rsdata) { ?>
                                    <?php if ($rsdata['status'] == 1) { // Only display CMS topics with status = 1 
                                                ?>
                                        <li class="<?= $first_part == $rsdata['CmsUrl'] ? 'active' : '' ?>">
                                            <a href="<?php echo base_url() . $rsdata['CmsUrl']; ?>">
                                                <?php echo $rsdata['CmsTitle']; ?>
                                            </a>
                                        </li>
                                    <?php } ?>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-12">
                    <div class="single-footer social">
                        <h4 class="d-block d-lg-none mb-0" data-bs-toggle="collapse" data-bs-target="#contactSection"
                            aria-expanded="false">
                            Get In Touch <span class="bi-chevron-down float-right"></span>
                        </h4>
                        <div class="collapse d-lg-none" id="contactSection">
                            <ul class="mt-1">
                                <li class="mb-2 d-flex align-items-baseline text-capitalize text-white"
                                    style="display: flex; align-items: center;">
                                    <i class="fas fa-map-marker-alt" style="margin-right: 8px;"></i>
                                    <!-- Address icon -->
                                    <?= $all_setting_data['Address'] ?? ''; ?>
                                </li>
                                <li class="mb-2 d-flex align-items-center text-white"
                                    style="display: flex; align-items: center;">
                                    <i class="fas fa-envelope" style="margin-right: 8px;"></i> <!-- Email icon -->
                                    <a
                                        href="mailto:<?= $all_setting_data['Email'] ?? ''; ?>"><?= $all_setting_data['Email'] ?? ''; ?></a>
                                </li>
                                <li class="mb-2 d-flex align-items-center" style="display: flex; align-items: center;">
                                    <i class="fab fa-whatsapp" style="margin-right: 8px;"></i>
                                    <a href="https://wa.me/<?= $all_setting_data['Phone'] ?? ''; ?>"
                                        target="_blank">+<?= $all_setting_data['Phone'] ?? ''; ?></a>
                                </li>
                                <!----------------------->
                                <?php
                                $data1 = $all_setting_data['Links'];
                                $dt = json_decode($data1);
                                //   print_r($all_settings_data);
                                //   die;
                                
                                $intagram = $dt->insta;
                                $facebook = $dt->facebook;
                                $twitter = $dt->twitter;
                                $checkout = $dt->checkout;


                                $intagram_data = json_decode($intagram);
                                $facebook_data = json_decode($facebook);
                                $twitter_data = json_decode($twitter);
                                $checkout_data = json_decode($checkout);

                                ?>
                                <ul>
                                    <!-------- Facebook ===-->
                                    <li class="soc">
                                        <?php
                                        if (isset($facebook_data->link)) {
                                            ?>
                                            <a href="<?= $facebook_data->link ?>" target="_blank">
                                                <?php if (isset($facebook_data->status) && ($facebook_data->status == 1)) {
                                                    ?>
                                                    <i class="ti-facebook"></i>
                                                    <?php
                                                }
                                        }
                                        ?>
                                        </a>
                                    </li>

                                    <!----------- Twitter =======-->
                                    <li class="soc">
                                        <?php
                                        if (isset($twitter_data->link)) {
                                            ?>
                                            <a href="<?= $twitter_data->link ?>" target="_blank">
                                                <?php if (isset($twitter_data->status) && ($twitter_data->status == 1)) {
                                                    ?>
                                                    <i class="ti-twitter"></i>
                                                    <?php
                                                }
                                        }
                                        ?>
                                        </a>
                                    </li>

                                    <!----------- Instagram =======-->
                                    <li class="soc">
                                        <?php
                                        if (isset($intagram_data->link)) {
                                            ?>
                                            <a href="<?= $intagram_data->link; ?>" target="_blank">
                                                <?php if (isset($intagram_data->status) && ($intagram_data->status == 1)) {
                                                    ?>
                                                    <i class="ti-instagram"></i>
                                                    <?php
                                                }
                                        }
                                        ?>
                                        </a>
                                    </li>
                                </ul>
                                <!--=========================-->
                            </ul>
                        </div>

                        <!-- Desktop view: visible section -->
                        <div class="d-none d-lg-block">
                            <h4>Get In Touch</h4>
                            <div class="contact">
                                <ul style="list-style-type: none; padding: 0;">
                                    <li class="mb-2 d-flex align-items-baseline text-capitalize"
                                        style="display: flex; align-items: center;">
                                        <i class="fas fa-map-marker-alt" style="margin-right: 8px;"></i>
                                        <!-- Address icon -->
                                        <?= $all_setting_data['Address'] ?? ''; ?>
                                    </li>
                                    <li class="mb-2 d-flex align-items-center"
                                        style="display: flex; align-items: center;">
                                        <i class="fas fa-envelope" style="margin-right: 8px;"></i> <!-- Email icon -->
                                        <a
                                            href="mailto:<?= $all_setting_data['Email'] ?? ''; ?>"><?= $all_setting_data['Email'] ?? ''; ?></a>
                                    </li>
                                    <li class="mb-2 d-flex align-items-center"
                                        style="display: flex; align-items: center;">
                                        <i class="fab fa-whatsapp" style="margin-right: 8px;"></i>
                                        <a href="https://wa.me/<?= $all_setting_data['Phone'] ?? ''; ?>"
                                            target="_blank">+<?= $all_setting_data['Phone'] ?? ''; ?></a>
                                    </li>
                                </ul>
                            </div>
                            <!----------------------->
                            <?php
                            $data1 = $all_setting_data['Links'];
                            $dt = json_decode($data1);
                            //   print_r($all_settings_data);
                            //   die;
                            
                            $intagram = $dt->insta;
                            $facebook = $dt->facebook;
                            $twitter = $dt->twitter;
                            $checkout = $dt->checkout;


                            $intagram_data = json_decode($intagram);
                            $facebook_data = json_decode($facebook);
                            $twitter_data = json_decode($twitter);
                            $checkout_data = json_decode($checkout);

                            ?>
                            <ul>
                                <!-------- Facebook ===-->
                                <li class="soc">
                                    <?php
                                    if (isset($facebook_data->link)) {
                                        ?>
                                        <a href="<?= $facebook_data->link ?>" target="_blank">
                                            <?php if (isset($facebook_data->status) && ($facebook_data->status == 1)) {
                                                ?>
                                                <i class="ti-facebook"></i>
                                                <?php
                                            }
                                    }
                                    ?>
                                    </a>
                                </li>

                                <!----------- Twitter =======-->
                                <li class="soc">
                                    <?php
                                    if (isset($twitter_data->link)) {
                                        ?>
                                        <a href="<?= $twitter_data->link ?>" target="_blank">
                                            <?php if (isset($twitter_data->status) && ($twitter_data->status == 1)) {
                                                ?>
                                                <i class="ti-twitter"></i>
                                                <?php
                                            }
                                    }
                                    ?>
                                    </a>
                                </li>

                                <!----------- Instagram =======-->
                                <li class="soc">
                                    <?php
                                    if (isset($intagram_data->link)) {
                                        ?>
                                        <a href="<?= $intagram_data->link; ?>" target="_blank">
                                            <?php if (isset($intagram_data->status) && ($intagram_data->status == 1)) {
                                                ?>
                                                <i class="ti-instagram"></i>
                                                <?php
                                            }
                                    }
                                    ?>
                                    </a>
                                </li>
                            </ul>
                            <!--=========================-->

                        </div>

                        <div class="download-app d-block d-lg-none">
                            <p class="mb-2 text-capitalize text-warning">Download the app for free</p>
                            <a href="https://play.google.com/store/games?hl=en_IN">
                                <img src="https://assets.pharmeasy.in/apothecary/images/googlePlay.svg?dim=360x0"
                                    alt="Google Play" class="img-fluid me-2" style="max-width: 140px;">
                            </a>
                            <a href="https://www.apple.com/in/app-store/">
                                <img src="https://assets.pharmeasy.in/apothecary/images/appStore.svg?dim=256x0"
                                    alt="App Store" class="img-fluid" style="max-width: 140px;">
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Footer Top -->
    <div class="copyright">
        <div class="container-fluid">
            <div class="inner">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="left">
                            <p>Copyright © <?php echo date('Y'); ?> <a href="#" target="_blank">E-Commerce</a> - All
                                Rights Reserved.</p>

                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="right">
                            <img src="<?php echo base_url(); ?>public/images/payments.png" alt="#">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /End Footer Area -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css">
<!-- jQuery UI library -->
<link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

<!-- Jquery -->
<script src="<?php echo base_url(); ?>public/js/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>public/js/jquery-migrate-3.0.0.js"></script>


<script src="<?php echo base_url(); ?>public/js/jquery-ui.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
<!-- Popper JS -->
<script src="<?php echo base_url(); ?>public/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>
<!-- Color JS -->
<!-- <script src="<?php echo base_url(); ?>public/js/colors.js"></script> -->
<!-- Slicknav JS -->
<script src="<?php echo base_url(); ?>public/js/slicknav.min.js"></script>
<!-- Owl Carousel JS -->
<script src="<?php echo base_url(); ?>public/js/owl-carousel.js"></script>
<!-- Magnific Popup JS -->
<script src="<?php echo base_url(); ?>public/js/magnific-popup.js"></script>
<!-- Waypoints JS -->
<script src="<?php echo base_url(); ?>public/js/waypoints.min.js"></script>
<!-- Countdown JS -->
<script src="<?php echo base_url(); ?>public/js/finalcountdown.min.js"></script>
<!-- Nice Select JS -->
<script src="<?php echo base_url(); ?>public/js/nicesellect.js"></script>
<!-- Flex Slider JS -->
<script src="<?php echo base_url(); ?>public/js/flex-slider.js"></script>
<!-- ScrollUp JS -->
<script src="<?php echo base_url(); ?>public/js/scrollup.js"></script>
<!-- Onepage Nav JS -->
<script src="<?php echo base_url(); ?>public/js/onepage-nav.min.js"></script>
<!-- Easing JS -->
<script src="<?php echo base_url(); ?>public/js/easing.js"></script>
<!-- Active JS -->
<script src="<?php echo base_url(); ?>public/js/active.js"></script>
<script src="<?php echo base_url(); ?>public/js/custom.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
    var options = {};
    var razorpay_pay_btn, instance;

    function razorpaySubmit(el) {
        if (typeof Razorpay == 'undefined') {
            setTimeout(razorpaySubmit, 200);
            if (!razorpay_pay_btn && el) {
                razorpay_pay_btn = el;
                el.disabled = true;
                el.value = 'Please wait...';
            }
        } else {
            if (!instance) {
                instance = new Razorpay(options);
                if (razorpay_pay_btn) {
                    razorpay_pay_btn.disabled = false;
                    razorpay_pay_btn.value = "Pay Now";
                }
            }
            instance.open();
        }
    }
</script>

<script>
    var base_url = $("#base_url").val();
    $(document).ready(function () {
        $('.addtocartform').on('submit', function (e) {
            $(".Color").css('border', '');
            $(".Size").css('border', '');
            $(".Material").css('border', '');

            e.preventDefault(); // Prevent form submission
            var Color = $(".Color").val();
            var Size = $(".Size").val();
            var Material = $(".Material").val();

            if ($(".Color").length) {
                if (Color == '') {
                    $(".Color").focus();
                    $(".Color").css('border', '1px solid red');
                    return false
                }
            }

            if ($(".Size").length) {
                if (Size == '') {
                    $(".Size").focus();
                    $(".Size").css('border', '1px solid red');
                    return false
                }
            }
            if ($(".Material").length) {
                if (Material == '') {
                    $(".Material").focus();
                    $(".Material").css('border', '1px solid red');
                    return false
                }
            }


            var form = $(this);
            var url = form.attr('action');

            $('#semiTransparenDiv').css('display', 'block');

            let fd = new FormData(this);

            $.ajax({
                type: 'POST',
                url: url,
                data: fd,
                contentType: false,
                processData: false,
                success: function (response) {
                    // Parse the JSON response
                    var jsonObject = JSON.parse(response);
                    if (jsonObject.status === 'success') {
                        // Update cart details
                        $('ul.shopping-list').html(jsonObject.cart);
                        $(".total-count").text(jsonObject.CartTotals);
                        $(".dropdown-cart-header span").text(jsonObject.CartTotals + " Items");

                        // Build cart items
                        var htmltag = '';
                        for (var i = 0; i < jsonObject.cart.length; i++) {
                            htmltag += '<li id="' + jsonObject.cart[i].id + '">' +
                                '<a href="javascript:void(0)"  class="remove removeItem" data-id="' + jsonObject.cart[i].id + '" title="Remove this item"><i class="fa fa-remove"></i></a>' +
                                '<a class="cart-img" href="javascript:void(0)"><img src="' + jsonObject.cart[i].ProductImage + '" alt="javascript:void(0)"></a>' +
                                '<h4><a href="/single_product/' + jsonObject.cart[i].id + '">' + jsonObject.cart[i].name + '</a></h4>' +
                                '<p class="quantity">' + jsonObject.cart[i].quantity + 'x - <span class="amount">$' + jsonObject.cart[i].unit_price + '</span></p>' +
                                '</li>';
                        }
                        $('ul.shopping-list').html(htmltag);
                        $(".total-amount").text("$" + jsonObject.total_item);

                        // Set product details in modal
                        $("#modalProductImage").attr("src", jsonObject.cart[jsonObject.cart.length - 1].ProductImage);
                        $("#modalProductName").text(jsonObject.cart[jsonObject.cart.length - 1].name);
                        $("#modalProductPrice").text("$" + jsonObject.cart[jsonObject.cart.length - 1].unit_price);

                        // Show modal with updated product details
                        setTimeout(function () {
                            $("#cartModal").modal('show');
                            $('#semiTransparenDiv').css('display', 'none');
                        }, 2000);
                    }
                },
                error: function (xhr, status, error) {
                    // Handle error response
                    console.log(xhr.responseText);
                }
            });

        });

        $("#login").on('click', function () {
            var email = $("#email").val();
            var password = $("#password").val();
            var regEx = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
            var validEmail = regEx.test(email);

            $(".error").remove();
            var flag = 1;
            if (email == '') {
                $(".email").after('<div class="error text-danger">Please enter email address</div>');
                flag = 0;
            } else if (email != '' && !validEmail) {
                $('.email').after('<div class="error text-danger">Please enter a valid email address</div>');
                flag = 0;
            }
            if (password == '') {
                $('.password').after('<div class="error text-danger">Please enter password</div>');
                flag = 0;
            }
            if (flag == 0) {
                return false;
            } else {
                $.ajax({
                    type: 'POST',
                    url: 'customer_login',
                    data: {
                        email: email,
                        password: password
                    },
                    dataType: 'json',
                    success: function (data) {
                        if (data == 1) {
                            window.location.href = 'my_account';
                        } else {
                            $('.password').after('<div class="error text-danger">Email or Password is Wrong!</div>');
                        }
                    }
                });
            }
        });
    });

    $(document).on("click", ".removeItem", function (e) {
        e.preventDefault();

        var itemId = $(this).data("id");
        $('#semiTransparenDiv').css('display', 'block');
        $.ajax({
            url: base_url + "/removeFromCart",
            method: "POST",
            data: {
                itemId: itemId
            },
            success: function (response) {
                // Handle the response
                var jsonObject = JSON.parse(response);
                if (jsonObject.status === "success") {
                    //console.log(jsonObject.status);
                    //$('.loader').css('display','block');
                    $('ul.shopping-list').html(jsonObject.cart);
                    $(".total-count").text(jsonObject.CartTotals);
                    $(".dropdown-cart-header span").text(jsonObject.CartTotals + " Items");
                    var html = '';

                    for (var i = 0; i < jsonObject.cart.length; i++) {
                        html += '<li id="' + jsonObject.cart[i].id + '">' +
                            '<a href="javascript:void(0)"  class="remove removeItem" data-id="' + jsonObject.cart[i].id + '" title="Remove this item"><i class="fa fa-remove"></i></a>' +
                            '<a class="cart-img" href="javascript:void(0)"><img src="' + jsonObject.cart[i].ProductImage + '" alt="javascript:void(0)"></a>' +
                            '<h4><a href="/single_product/' + jsonObject.cart[i].id + '">' + jsonObject.cart[i].name + '</a></h4>' +
                            '<p class="quantity">' + jsonObject.cart[i].quantity + 'x - <span class="amount">$' + jsonObject.cart[i].unit_price + '</span></p>' +
                            '</li>';
                        $("ul.shopping-list li#" + jsonObject.cart[i].id).remove();
                    }
                    $('ul.shopping-list').html(html);


                    $(".total-amount").text("$" + jsonObject.total_item);

                    var formattedShippingCost;
                    if (jsonObject.shippingCost === 0) {
                        formattedShippingCost = "Free shipping";
                    } else {
                        formattedShippingCost = "$" + parseFloat(jsonObject.shippingCost).toFixed(2);
                    }


                    $(".order-summary-table").html('<tbody>' +
                        '<tr>' +
                        '<td>Order subtotal</td>' +
                        '<th>$' + jsonObject.total_item + '</th>' +
                        '</tr>' +
                        (jsonObject.DiscountPrice > 0 ?
                            '<tr class="Discount">' +
                            '<td>Discount</td>' +
                            '<th>$' + parseFloat(jsonObject.DiscountPrice).toFixed(2) + '</th>' +
                            '</tr>' : '') +
                        '<tr>' +
                        '<td>Tax</td>' +
                        '<th>$' + jsonObject.tax + '</th>' +
                        '</tr>' +

                        '<tr class="ShippingCharges">' +
                        '<td>Shipping Cost</td>' +
                        '<th>' +
                        formattedShippingCost +
                        '</th>' +
                        '</tr>' +

                        '<tr class="total">' +
                        '<td>Total</td>' +
                        '<th>$' + jsonObject.totalWithShipping + '</th>' +
                        '</tr>' +

                        '</tbody>');

                    if (jsonObject.itemid == '') {
                        $(".empty-cart").show();
                    } else {
                        $(".shopping-summery tbody tr#" + jsonObject.itemid).remove();

                    }
                    setTimeout(function () {
                        $('#semiTransparenDiv').css('display', 'none');
                        //$('.loader').css('display','none');
                    }, 2000);

                    // Reload the page or update the cart contents

                } else {

                }
            },
            error: function (xhr, textStatus, errorThrown) {
                console.log("Error: " + errorThrown);
            }
        });
    });

    $(document).ready(function () {
        $(".removeCoupon").on("click", function (e) {
            e.preventDefault();
            var couponCode = $("#couponCode").val();

            $.ajax({
                url: "removeCoupon",
                method: "POST",
                data: {
                    couponCode: couponCode
                },
                success: function (response) {
                    // Handle the response
                    var jsondt = JSON.parse(response);
                    if (jsondt.status === "success") {
                        $("#couponCode").val('');
                        $('.Discount').remove();
                        $('#apllyCouponForm').css('display', 'block');
                        $('#removeCouponForm').css('display', 'none');
                        $('.couponname').html(jsondt.couponCode);
                        $(".coupondata").html('<span class="error text-danger">' + jsondt.message + '.</span>');

                        var formattedShippingCost;
                        if (jsondt.shippingCost === 0) {
                            formattedShippingCost = "Free shipping";
                        } else {
                            formattedShippingCost = "$" + parseFloat(jsondt.shippingCost).toFixed(2);
                        }

                        $(".order-summary-table").html('<tbody>' +
                            '<tr>' +
                            '<td class="text-dark">Subtotal</td>' +
                            '<th>$' + parseFloat(jsondt.total_item).toFixed(2) + '</th>' +
                            '</tr>' +
                            '<tr>' +
                            '<td class="text-dark">Shipping Cost</td>' +
                            // '<th>$' + parseFloat(jsondt.shippingCost).toFixed(2) + '</th>' +
                            '<th>' + formattedShippingCost + '</th>' +
                            '</tr>' +
                            '<tr>' +
                            '<td class="text-dark">Tax</td>' +
                            '<th>$' + parseFloat(jsondt.tax).toFixed(2) + '</th>' +
                            '</tr>' +
                            '<tr class="total">' +
                            '<td class="text-dark">Total</td>' +
                            '<th>$' + parseFloat(jsondt.totalWithShipping).toFixed(2) + '</th>' +
                            '</tr>' +

                            '</tbody>');
                        //location.reload();
                    } else if (jsondt.status === 'error') {
                        // Print error message
                        $(".coupondata").html('<span class="error text-danger">Please enter a valid coupon code.</span>');
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.log("Error: " + errorThrown);
                }
            });

        });



        $(".apllyCouponForm").on("submit", function (e) {
            e.preventDefault();

            var couponCode = $("#couponCode").val();

            // Check if the coupon code is empty
            if (couponCode.trim() === "") {
                $(".coupondata").html('<span class="error text-danger">Please enter a coupon code.</span>');
                return;
            }

            var formData = $(this).serialize();

            $.ajax({
                url: "applyCoupon",
                method: "POST",
                data: formData,
                success: function (response) {
                    // Parse the JSON response
                    try {
                        var jsondt = JSON.parse(response);

                        if (jsondt.status === "success") {
                            // Hide coupon form and display remove coupon button
                            $('#apllyCouponForm').hide();
                            $('#removeCouponForm').show();

                            // Show the coupon code applied
                            $('.couponname').html(jsondt.couponCode);
                            $(".coupondata").html('<span class="error text-success">Coupon applied successfully.</span>');

                            var formattedShippingCost;
                            if (jsondt.shippingCost === 0) {
                                formattedShippingCost = "Free shipping";
                            } else {
                                formattedShippingCost = "$" + parseFloat(jsondt.shippingCost).toFixed(2);
                            }

                            // Update the order summary table
                            $(".order-summary-table").html(
                                '<tbody>' +
                                '<tr>' +
                                '<td class="text-dark">Subtotal</td>' +
                                '<th>$' + parseFloat(jsondt.total_item).toFixed(2) + '</th>' +
                                '</tr>' +
                                '<tr>' +
                                '<td class="text-dark">Shipping Cost</td>' +
                                '<th>' + formattedShippingCost + '</th>' +
                                '</tr>' +
                                '<tr>' +
                                '<td class="text-dark">Tax</td>' +
                                '<th>$' + parseFloat(jsondt.tax).toFixed(2) + '</th>' +
                                '</tr>' +
                                '<tr class="Discount">' +
                                '<td class="text-dark">Discount</td>' +
                                '<th>$' + parseFloat(jsondt.DiscountPrice).toFixed(2) + '</th>' +
                                '</tr>' +
                                '<tr class="total">' +
                                '<td class="text-dark">Total</td>' +
                                '<th>$' + parseFloat(jsondt.totalWithShipping).toFixed(2) + '</th>' +
                                '</tr>' +
                                '</tbody>'
                            );

                        } else if (jsondt.status === 'fail') {
                            // Display an error message for invalid coupons
                            $(".coupondata").html('<span class="error text-danger">' + jsondt.message + '</span>');
                        }
                    } catch (e) {
                        console.error("Parsing error:", e);
                        $(".coupondata").html('<span class="error text-danger">An unexpected error occurred.</span>');
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.log("Error: " + errorThrown);
                    $(".coupondata").html('<span class="error text-danger">An error occurred while applying the coupon. Please try again.</span>');
                }
            });
        });



        $(".btn-number").on('click', function (e) {
            var button = $(this);
            var qtyInput = button.closest('.input-group').find('.input-number');
            var id = button.data('id');
            var price = button.data('price');
            var qty = parseFloat(qtyInput.val());

            if (button.data('type') === 'minus') {
                if (qty > 0) {
                    qtyInput.val(qty - 0);
                }
            } else if (button.data('type') === 'plus') {
                qtyInput.val(qty + 0);
            }

            var total = qtyInput.val() * price;
            $(".total_amount[data-id='" + id + "'] span").html("$" + total);
        });


        $(".updateCartbtn").on("click", function (e) {
            e.preventDefault();
            var form = document.getElementById('cartProductList');
            var formData = new FormData(form);
            $('#semiTransparenDiv').css('display', 'block'); // Show the overlay
            $.ajax({
                url: "updatecart",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    var jsonObject = JSON.parse(response);
                    console.log(jsonObject);
                    if (jsonObject.status === "success") {
                        $('ul.shopping-list').html(jsonObject.cart);
                        $(".total-count").text(jsonObject.CartTotals);
                        $(".dropdown-cart-header span").text(jsonObject.CartTotals + " Items");

                        var html = '';
                        for (var i = 0; i < jsonObject.cart.length; i++) {
                            html += '<li id="' + jsonObject.cart[i].id + '">' +
                                '<a href="javascript:void(0)" class="remove removeItem" data-id="' + jsonObject.cart[i].id + '" title="Remove this item"><i class="fa fa-remove"></i></a>' +
                                '<a class="cart-img" href="javascript:void(0)"><img src="' + jsonObject.cart[i].ProductImage + '" alt="javascript:void(0)"></a>' +
                                '<h4><a href="/single_product/' + jsonObject.cart[i].id + '">' + jsonObject.cart[i].name + '</a></h4>' +
                                '<p class="quantity">' + jsonObject.cart[i].quantity + 'x - <span class="amount">$' + jsonObject.cart[i].unit_price + '</span></p>' +
                                '</li>';
                        }

                        $('ul.shopping-list').html(html);
                        $(".total-amount").text("$" + parseFloat(jsonObject.total_item).toFixed(2));

                        var formattedShippingCost;
                        if (jsonObject.shippingCost === 0) {
                            formattedShippingCost = "Free shipping";
                        } else {
                            formattedShippingCost = "$" + parseFloat(jsonObject.shippingCost).toFixed(2);
                        }

                        // Update order summary
                        $(".order-summary-table").html('<tbody>' +
                            '<tr><td class="text-dark">Subtotal</td><th>$' + parseFloat(jsonObject.total_item).toFixed(2) + '</th></tr>' +
                            // '<tr><td class="text-dark">Shipping Cost</td><th>$' + parseFloat(jsonObject.shippingCost).toFixed(2) + '</th></tr>' +
                            '<tr><td class="text-dark">Shipping Cost</td><th>' + formattedShippingCost + '</th></tr>' +
                            '<tr><td class="text-dark">Tax</td><th>$' + parseFloat(jsonObject.tax).toFixed(2) + '</th></tr>' +
                            (jsonObject.DiscountPrice > 0 ?
                                '<tr class="Discount"><td class="text-dark">Discount</td><th>$' + parseFloat(jsonObject.DiscountPrice).toFixed(2) + '</th></tr>' : '') +
                            '<tr class="total"><td class="text-dark">Total</td><th>$' + parseFloat(jsonObject.totalWithShipping).toFixed(2) + '</th></tr>' +
                            '</tbody>');

                        // Hide the loading overlay immediately after update
                        $('#semiTransparenDiv').css('display', 'none');
                    } else {
                        // Handle the error case (if any)
                        $('#semiTransparenDiv').css('display', 'none'); // Ensure overlay is hidden
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.log("Error: " + errorThrown);
                    $('#semiTransparenDiv').css('display', 'none'); // Hide the overlay in case of error
                }
            });
        });



        $("select[name='CountryID']").on("change", function (e) {
            e.preventDefault();
            var CountryID = $(this).val();
            var formData = new FormData();
            formData.append('CountryID', CountryID);

            $.ajax({
                url: "/getstats",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    const states = JSON.parse(response);
                    // Get the select element
                    var stateSelect = $("#state-province");
                    // Clear existing options
                    stateSelect.empty();

                    var option = $("<option></option>");
                    // Set the option value and text
                    option.val('');
                    option.text('Select');
                    stateSelect.append(option);
                    // Iterate over the states
                    states.forEach(function (state) {
                        // Create a new option element
                        var option = $("<option></option>");

                        // Set the option value and text
                        option.val(state.StateID);
                        option.text(state.StateName);

                        // Append the option to the select element
                        stateSelect.append(option);
                    });

                },
                error: function (xhr, textStatus, errorThrown) {
                    console.log("Error: " + errorThrown);
                }
            });
        });


        //var stripe = Stripe('pk_test_pmq5HsqFgDq4eJVtVqg90w8700Ym4ScYKf');
        var stripe = Stripe('<?php echo $stripe_public_key; ?>');
        var elements = stripe.elements();
        var stripeContainer = document.getElementById('stripe-container');

        // Create an instance of the card Element.
        //var card = elements.create('card');
        var card = elements.create('card', {
            hidePostalCode: true, // Set to true to hide the ZIP code field
        });

        // Add an instance of the card Element into the `card-element` div.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function (event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        function handleStripePayment() {
            // Show the Stripe container
            stripeContainer.style.display = 'block';
        }

        function removeDynamicElements() {
            var idInput = document.getElementsByName('stripe_token_id')[0];
            var typeInput = document.getElementsByName('stripe_token_type')[0];

            if (idInput) {
                idInput.parentNode.removeChild(idInput);
            }

            if (typeInput) {
                typeInput.parentNode.removeChild(typeInput);
            }
        }



        $(document).on("click", ".btncheck", function () {
            "use strict";
            removeDynamicElements();
            var flag = 1;
            $('.errortxt').remove();
            var patment_method = $("input[name='patment_method']:checked").val();

            if ($("#fname").val() == "") {
                $(".fname_error").html('<span class="errortxt text-danger">Please enter first name</span>');
                flag = 0;

            }
            if ($("#lname").val() == "") {
                $(".lname_error").after('<span class="errortxt text-danger">Please enter last name</span>');
                flag = 0;

            }
            if ($("#email").val() == "") {
                $("#email").focus();
                $(".email_error").after('<span class="errortxt text-danger">Please enter email address</span>');
                flag = 0;

            }
            // if ($('#phoneno').val() == "") {
            // 	$(".phone_error").after('<span class="errortxt text-danger">Please enter phone number</span>');
            // 	flag = 0;

            // }
            if ($('#phoneno').val() == "") {
                $(".phone_error").after('<span class="errortxt text-danger">Please enter phone number</span>');
                flag = 0;
            } else if ($('#phoneno').val().length !== 10) {
                $(".phone_error").after('<span class="errortxt text-danger">Phone number must be 10 digits</span>');
                flag = 0;
            }
            if ($('#country').val() == "") {
                $('select[name="CountryID"]').focus();
                $(".country_error").after('<span class="errortxt text-danger">Please select country</span>');
                flag = 0;

            }
            if ($("#state").val() == "") {
                $('select[name="state-province"]').focus();
                $(".state_error").after('<span class="errortxt text-danger">Please select state</span>');
                flag = 0;

            }
            if ($('#city').val() == "") {
                $('select[name="city"]').focus();
                $(".city_error").after('<span class="errortxt text-danger">Please select city</span>');
                flag = 0;

            }
            if ($("#address1").val() == "") {
                $('input[name="address1"]').focus();
                $(".address1_error").after('<span class="errortxt text-danger">Please enter address1</span>');
                flag = 0;

            }
            if ($("#postcode").val() == "") {
                $('input[name="postcode"]').focus();
                $(".postcode_error").after('<span class="errortxt text-danger">Please enter Postcode</span>');
                flag = 0;

            }

            if (!patment_method) {
                $('.payment_error_div').html('<div class="alert alert-danger errortxt" role="alert">Select Payment Method</div>');
                flag = 0;
            }

            if (flag == 0) {
                return false;
            }

            if (flag && patment_method) {
                //  $('.overlay').css('display','block');
                $('#semiTransparenDiv').css('display', 'block');
                var baseurl = $("#baseurl").val();
                var ajxurl = "";
                if (patment_method == 'paypal') {
                    // document.getElementById('checkoutsubmiform').submit();


                    ajxurl = baseurl + 'createPayment';
                    // console.log(ajxurl);
                    checkout_form_submit(ajxurl, patment_method);

                } else if (patment_method == 'stripe') {

                    ajxurl = baseurl + 'checkout/stripe_payment';

                    stripe.createToken(card).then(function (result) {
                        if (result.error) {
                            $('#semiTransparenDiv').css('display', 'none');
                            // Inform the user if there was an error.
                            var errorElement = document.getElementById('card-errors');
                            errorElement.textContent = result.error.message;
                            flag = 0;
                            removeDynamicElements();

                            return false;
                            // Re-enable the submit button.
                            //form.querySelector('button').disabled = false;
                        } else {
                            // Send the token to your server.
                            //stripeTokenHandler(result.token);
                            var token = result.token;
                            // console.log(result.token);
                            // alert(token.id);

                            var tokenId = token.id;
                            var tokenType = token.type;

                            // Append the id and type to your form as hidden input fields
                            var idInput = document.createElement('input');
                            idInput.type = 'hidden';
                            idInput.name = 'stripe_token_id';
                            idInput.value = tokenId;

                            var typeInput = document.createElement('input');
                            typeInput.type = 'hidden';
                            typeInput.name = 'stripe_token_type';
                            typeInput.value = tokenType;

                            // Append the inputs to the form
                            document.getElementById('checkoutsubmiform').appendChild(idInput);
                            document.getElementById('checkoutsubmiform').appendChild(typeInput);
                            checkout_form_submit(ajxurl, patment_method);
                        }

                    });


                } else if (patment_method == 'razorpay') {
                    var orderno = getRandomInt(10000, 99999);
                    var amount = $('input[name="amount"]').val();
                    var fname = $('input[name="fname"]').val();
                    var lname = $('input[name="lname"]').val();
                    var email = $('input[name="email"]').val();
                    var phoneno = $('input[name="phoneno"]').val();
                    amount = parseInt(100 * amount, 10);



                    ajxurl = baseurl + 'checkout/razorpay_payment';

                    options = {
                        key: "rzp_test_9UrkTeo8gsGo77",
                        amount: amount,
                        name: fname + " " + lname,
                        description: orderno,
                        netbanking: true,
                        currency: "INR", // INR
                        prefill: {
                            name: fname + " " + lname,
                            email: email,
                            contact: phoneno
                        },
                        notes: {
                            soolegal_order_id: orderno,
                        },
                        handler: function (transaction) {
                            document.getElementById('razorpay_payment_id').value = transaction.razorpay_payment_id;
                            var baseurl = $("#baseurl").val();
                            ajxurl = baseurl + 'checkout/razorpay_payment';
                            $("form#checkoutsubmiform").attr('action', ajxurl);
                            $("form#checkoutsubmiform").attr('method', 'POST');
                            document.getElementById('checkoutsubmiform').submit();
                        },
                        "modal": {
                            "ondismiss": function () {
                                location.reload()
                            }
                        }
                    };


                    razorpaySubmit(this);
                } else if (patment_method == 'cod') {
                    ajxurl = baseurl + 'placeorder';
                    $("form#checkoutsubmiform").attr('action', ajxurl);
                    $("form#checkoutsubmiform").attr('method', 'POST');
                    checkout_form_submit(ajxurl, patment_method);
                    // $("form#checkoutsubmiform").submit();
                } else {
                    ajxurl = baseurl + 'placeorder';
                    checkout_form_submit(ajxurl, patment_method);
                }



            }

        });

        function getRandomInt(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

        function checkout_form_submit(ajxurl, patment_method) {
            var baseurl = $("#baseurl").val();
            var form = document.getElementById('checkoutsubmiform');
            var formData = new FormData(form);
            formData.append('patment_method', patment_method);

            // Debugging
            console.log(formData);

            $.ajax({
                url: ajxurl,
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    // If response is a JSON string, parse it
                    if (typeof response === "string") {
                        response = JSON.parse(response);
                    }

                    console.log(response);

                    if (response.status == '1') {
                        $(".succ_msg").html('<div class="alert alert-success">Your order has been placed successfully.</div>');
                        setTimeout(function () {
                            var url = baseurl + 'order_success';
                            if (patment_method == 'stripe') {
                                var OrderNumber = response.data.OrderNumber;
                                url = baseurl + 'stripe_order_success?OrderNumber=' + OrderNumber;
                            } else if (patment_method == 'cod') {
                                var OrderNumber = response.data.OrderNumber;
                                url = baseurl + 'cod_order_success?OrderNumber=' + OrderNumber;
                            }
                            console.log(url);

                            window.location.href = url;
                            $('#semiTransparenDiv').css('display', 'none');
                        }, 2000);
                    } else if (patment_method == 'paypal' && response.approval_url) {
                        // Redirect to PayPal for payment
                        window.location.href = response.approval_url;
                    } else {
                        // Handle failure or error
                        $(".succ_msg").html('<div class="alert alert-danger">Error placing order. Please try again.</div>');
                    }
                },
                error: function (xhr, textStatus, errorThrown) {
                    console.log("Error: " + errorThrown);
                }
            });
        }



        $('input.payment_method[type="radio"]').on('click', function () {
            if ($(this).val() == 'paypal') {
                $("form#checkoutsubmiform").attr('action', 'https://www.sandbox.paypal.com/cgi-bin/webscr');
                // $("button").attr('type','submit');
                // $("button").removeClass('checkot_btn');
            }
            if ($(this).val() == 'cod') {
                $("form#checkoutsubmiform").attr('action', 'placeorder');
                // $("button").attr('type','submit');
                // $("button").removeClass('checkot_btn');
            }
            if ($(this).val() == 'stripe') {
                $("form#checkoutsubmiform").attr('action', '');
                handleStripePayment();
            } else {
                stripeContainer.style.display = 'none';
            }
            // 			else 
            // 			{
            // 				$("button").addClass('checkot_btn');
            // 				$("button").removeClass('btncheck');
            // 				$("form#checkoutsubmiform").attr('action','');
            // 			}
        });

        $(".btncheck_old").on('click', function () {
            var patment_method = $("input[name='patment_method']:checked").val();

            if ($("#fname").val() == "") {
                $(".fname_error").html('<span class="errortxt text-danger">Please enter first name</span>');
            } else {
                $(".fname_error").html('');
            }
            if ($("#lname").val() == "") {
                $(".lname_error").html('<span class="errortxt text-danger">Please enter last name</span>');
            } else {
                $(".lname_error").html('');
            }

            if ($("#email").val() == "") {
                $(".email_error").html('<span class="errortxt text-danger">Please enter email address</span>');
            } else {
                $(".email_error").html('');
            }
            if ($('#phoneno').val() == "") {
                $(".phone_error").html('<span class="errortxt text-danger">Please enter phone number</span>');
            } else {
                $(".phone_error").html('');
            }
            if ($('#country').val() == "") {
                $(".country_error").html('<span class="errortxt text-danger">Please select country</span>');
            } else {
                $(".country_error").html('');
            }
            if ($("#state").val() == "") {
                $(".state_error").html('<span class="errortxt text-danger">Please select state</span>');
            } else {
                $(".state_error").html('');
            }
            if ($("#city").val() == "") {
                $(".city_error").html('<span class="errortxt text-danger">Please select city</span>');
            } else {
                $(".city_error").html('');
            }
            if ($("#address1").val() == "") {
                $(".address1_error").html('<span class="errortxt text-danger">Please enter address1</span>');
            } else {
                $(".address1_error").html('');
            }
            if ($("#address2").val() == "") {
                $(".address2_error").html('<span class="errortxt text-danger">Please enter address2</span>');
            } else {
                $(".address2_error").html('');
            }
            if ($("#postcode").val() == '') {
                $(".postcode_error").html('<span class="errortxt text-danger">Please enter postcode</span>');
            } else {
                $(".postcode_error").html('');
            }
            if ($("#company").val() == '') {
                $(".company_error").html('<span class="errortxt text-danger">Please select company</span>');
            } else {
                $(".company_error").html('');
            }
            if (!patment_method) {
                $('.payment_error_div').html('<div class="alert alert-danger errortxt" role="alert">Select Payment Method</div>');
            } else {
                $('.payment_error_div').html('');
            }


        });


    });
</script>

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    $(document).ready(function () {
        var heroSwiper = new Swiper(".hero-swiper", {
            loop: true,
            speed: 800,
            autoplay: {
                delay: 50000,
                disableOnInteraction: false,
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        var swiper = new Swiper(".cat-swiper", {
            slidesPerView: 6,
            spaceBetween: 30,
            navigation: {
                nextEl: ".cat-button-next",
                prevEl: ".cat-button-prev",
            },
            breakpoints: {
                0: {
                    slidesPerView: 2,
                    spaceBetween: 15,
                },
                768: {
                    slidesPerView: 4,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 6,
                    spaceBetween: 30,
                },
            },
        });

        var productSwiper = new Swiper(".product-swiper", {
            slidesPerView: 1,
            spaceBetween: 25,
            navigation: {
                nextEl: ".prod-button-next",
                prevEl: ".prod-button-prev",
            },
            breakpoints: {
                576: { slidesPerView: 2 },
                768: { slidesPerView: 3 },
                992: { slidesPerView: 4 },
                1200: { slidesPerView: 4 },
            },
        });

        var bestSwiper = new Swiper(".best-swiper", {
            slidesPerView: 1,
            spaceBetween: 25,
            navigation: {
                nextEl: ".best-button-next",
                prevEl: ".best-button-prev",
            },
            breakpoints: {
                576: { slidesPerView: 2 },
                768: { slidesPerView: 3 },
                992: { slidesPerView: 4 },
                1200: { slidesPerView: 4 },
            },
        });

        $('.addtocartform').on('submit', function (e) {
            e.preventDefault();

            var Color = $(this).find(".Color").val();
            var Size = $(this).find(".Size").val();
            var Material = $(this).find(".Material").val();

            if (Color === '') {
                $(this).find(".Color").focus().css('border', '1px solid red');
                return;
            } else {
                $(this).find(".Color").css('border', '');
            }

            if (Size === '') {
                $(this).find(".Size").focus().css('border', '1px solid red');
                return;
            } else {
                $(this).find(".Size").css('border', '');
            }

            if (Material === '') {
                $(this).find(".Material").focus().css('border', '1px solid red');
                return;
            } else {
                $(this).find(".Material").css('border', '');
            }

            $('#semiTransparenDiv').css('display', 'block');

            let fd = new FormData(this);

            $.ajax({
                type: 'POST',
                url: '/addToCart',
                data: fd,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (response) {
                    console.log(response);
                    if (response.status === 'success') {
                        $(".total-count").text(response.CartTotals);
                        $(".dropdown-cart-header span").text(response.CartTotals + " Items");

                        var html = '';
                        for (var i = 0; i < response.cart.length; i++) {
                            html += '<li id="' + response.cart[i].id + '">'
                                + '<a href="javascript:void(0)" class="remove removeItem" data-id="' + response.cart[i].id
                                + '" title="Remove this item"><i class="fa fa-remove"></i></a>'
                                + '<a class="cart-img" href="javascript:void(0)"><img src="' + response.cart[i].ProductImage
                                + '" alt="javascript:void(0)"></a>' + '<h4><a href="/single_product/' + response.cart[i].id + '">' +
                                response.cart[i].name + '</a></h4>' + '<p class="quantity">' + response.cart[i].quantity
                                + 'x - <span class="amount">$' + response.cart[i].unit_price + '</span></p>' + '</li>';
                        }
                        $('ul.shopping-list').html(html);
                        $(".total-amount").text("$" + response.total_item);

                        setTimeout(function () {
                            $("#cartModal").modal('show');
                            $('#semiTransparenDiv').css('display', 'none');
                        }, 2000);
                    }
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                    $('#semiTransparenDiv').css('display', 'none');
                }
            });
        });
    });
</script>
</body>

</html>