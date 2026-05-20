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
        background: #a47e65 !important;
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

    .new-arrivals-area {
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #fff7ef 0%, #ffffff 58%, #fff2e1 100%);
        isolation: isolate;
    }

    .new-arrivals-area::before,
    .new-arrivals-area::after {
        content: "";
        position: absolute;
        background-repeat: no-repeat;
        background-size: contain;
        pointer-events: none;
        z-index: -1;
        opacity: 0.65;
    }

    .new-arrivals-area::before {
        top: -40px;
        left: -30px;
        width: 230px;
        height: 230px;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 240 240'%3E%3Ccircle cx='120' cy='120' r='118' fill='%23f7941d' fill-opacity='0.08'/%3E%3Cpath d='M44 130C79 82 129 56 194 52' stroke='%23f7941d' stroke-width='10' stroke-linecap='round' stroke-opacity='0.28' fill='none'/%3E%3Cpath d='M66 170C104 129 144 112 204 110' stroke='%231a2b48' stroke-width='8' stroke-linecap='round' stroke-opacity='0.12' fill='none'/%3E%3C/svg%3E");
    }

    .new-arrivals-area::after {
        right: -20px;
        bottom: 30px;
        width: 280px;
        height: 180px;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 300 180'%3E%3Cpath d='M18 138C54 70 116 32 198 26C231 24 258 29 282 42' stroke='%23f7941d' stroke-width='10' stroke-linecap='round' stroke-opacity='0.24' fill='none'/%3E%3Cpath d='M90 156C134 110 176 92 266 92' stroke='%231a2b48' stroke-width='8' stroke-linecap='round' stroke-opacity='0.1' fill='none'/%3E%3Ccircle cx='238' cy='44' r='18' fill='%23f7941d' fill-opacity='0.12'/%3E%3C/svg%3E");
    }

    .best-sellers-area {
        position: relative;
        overflow: hidden;
        background: linear-gradient(135deg, #fffdf8 0%, #fff5ea 45%, #ffffff 100%);
        isolation: isolate;
    }

    .best-sellers-area::before,
    .best-sellers-area::after {
        content: "";
        position: absolute;
        background-repeat: no-repeat;
        background-size: contain;
        pointer-events: none;
        z-index: -1;
        opacity: 0.7;
    }

    .best-sellers-area::before {
        top: 20px;
        right: -40px;
        width: 250px;
        height: 250px;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 260 260'%3E%3Ccircle cx='130' cy='130' r='112' fill='%23f7941d' fill-opacity='0.07'/%3E%3Ccircle cx='130' cy='130' r='86' stroke='%23f7941d' stroke-width='10' stroke-opacity='0.18' fill='none'/%3E%3Cpath d='M74 96L130 58L186 96V164L130 202L74 164Z' stroke='%231a2b48' stroke-width='8' stroke-linejoin='round' stroke-opacity='0.12' fill='none'/%3E%3C/svg%3E");
    }

    .best-sellers-area::after {
        left: -10px;
        bottom: 25px;
        width: 260px;
        height: 150px;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 280 160'%3E%3Cpath d='M14 124C44 82 82 54 132 42C179 30 222 35 268 58' stroke='%23f7941d' stroke-width='10' stroke-linecap='round' stroke-opacity='0.22' fill='none'/%3E%3Cpath d='M24 146H156' stroke='%231a2b48' stroke-width='8' stroke-linecap='round' stroke-opacity='0.1'/%3E%3Ccircle cx='196' cy='104' r='12' fill='%23f7941d' fill-opacity='0.12'/%3E%3Ccircle cx='230' cy='82' r='7' fill='%231a2b48' fill-opacity='0.08'/%3E%3C/svg%3E");
    }

    @media (max-width: 991px) {

        .hero-slider .hero-button-next,
        .hero-slider .hero-button-prev {
            display: none;
        }
    }

    @media (max-width: 767px) {
        .new-arrivals-area::before {
            width: 160px;
            height: 160px;
            top: -25px;
            left: -20px;
        }

        .new-arrivals-area::after {
            width: 180px;
            height: 120px;
            right: -25px;
            bottom: 10px;
        }

        .best-sellers-area::before {
            width: 170px;
            height: 170px;
            top: 10px;
            right: -35px;
        }

        .best-sellers-area::after {
            width: 170px;
            height: 100px;
            left: -20px;
            bottom: 10px;
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

    /* Premium Dynamic Hero Slider style overrides to match Static Hero Section */
    .hero-slider {
        padding: 0 !important;
        background: #f4f1ef !important;
    }
    .hero-slider .swiper-slide {
        background-color: #f4f1ef !important;
        min-height: 500px !important;
        display: flex !important;
        align-items: center !important;
        position: relative !important;
        overflow: hidden !important;
        padding: 70px 0 !important;
    }
    .hero-slider .hero-content {
        padding-left: 60px !important;
        text-align: left !important;
    }
    .hero-slider .hero-content .sub-title {
        color: #8c4e2d !important;
        font-weight: bold !important;
        font-size: 13px !important;
        letter-spacing: 2px !important;
        text-transform: uppercase !important;
        display: block !important;
        margin-bottom: 15px !important;
    }
    .hero-slider .hero-content .main-title {
        font-size: 46px !important;
        font-weight: 800 !important;
        color: #2d2a26 !important;
        margin-top: 15px !important;
        margin-bottom: 25px !important;
        line-height: 1.1 !important;
    }
    .hero-slider .hero-content .description {
        color: #666 !important;
        font-size: 16px !important;
        margin-bottom: 35px !important;
        max-width: 450px !important;
        line-height: 1.6 !important;
    }
    .hero-slider .hero-button .btn-shop-now {
        background-color: #8c4e2d !important;
        color: white !important;
        padding: 14px 34px !important;
        border-radius: 8px !important;
        font-weight: 600 !important;
        font-size: 15px !important;
        text-decoration: none !important;
        transition: all 0.3s ease !important;
        box-shadow: 0 4px 15px rgba(140, 78, 45, 0.2) !important;
        display: inline-flex !important;
        align-items: center !important;
        gap: 8px !important;
    }
    .hero-slider .hero-button .btn-shop-now:hover {
        background-color: #754024 !important;
        transform: translateY(-2px) !important;
        box-shadow: 0 8px 20px rgba(74, 52, 39, 0.3) !important;
    }
    .hero-slider .hero-button .btn-shop-now i {
        transition: transform 0.3s ease !important;
    }
    .hero-slider .hero-button .btn-shop-now:hover i {
        transform: translateX(3px) !important;
    }
    .hero-swiper .swiper-button-next,
    .hero-swiper .swiper-button-prev {
        color: #8c4e2d !important;
    }
    .hero-swiper .swiper-button-next:hover,
    .hero-swiper .swiper-button-prev:hover {
        background: #8c4e2d !important;
        color: #fff !important;
    }
    .hero-swiper .swiper-pagination-bullet-active {
        background: #8c4e2d !important;
    }

    @media (max-width: 991px) {
        .hero-slider .swiper-slide {
            padding: 50px 20px !important;
            min-height: 400px !important;
            text-align: center !important;
        }
        .hero-slider .hero-content {
            padding-left: 0 !important;
            text-align: center !important;
            display: flex !important;
            flex-direction: column !important;
            align-items: center !important;
        }
        .hero-slider .hero-content .main-title {
            font-size: 32px !important;
            margin-bottom: 15px !important;
        }
        .hero-slider .hero-content .description {
            font-size: 15px !important;
            margin-bottom: 25px !important;
            margin-left: auto !important;
            margin-right: auto !important;
        }
    }
</style>
<?php
$AllsettingsModel = new \App\Models\Allsettingsmodel();
$all_setting_data = $AllsettingsModel->first();
?>

<!-- -------------- Static Hero Section (Commented Out as requested) ------------- -->

<!-- <section class="hero-static-area" style="background-color: #f4f1ef; position: relative; overflow: hidden; padding: 70px 0; min-height: 500px; display: flex; align-items: center;">
    <div class="container-fluid" style="position: relative; z-index: 2;">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 col-12">
                <div class="hero-content pl-md-5 pl-3">
                    <span class="sub-title" style="color: #8c4e2d; font-weight: bold; font-size: 13px; letter-spacing: 2px; text-transform: uppercase;">MODERN LIVING</span>
                    <h1 class="main-title" style="font-size: 46px; font-weight: 800; color: #2d2a26; margin-top: 15px; margin-bottom: 25px; line-height: 1.1;">Quality Products, Better<br>Living</h1>
                    <p class="description" style="color: #666; font-size: 16px; margin-bottom: 35px; max-width: 450px; line-height: 1.6;">Discover a wide range of handpicked products that bring convenience, style, and value to your everyday life.</p>
                    <div class="hero-button">
                        <a href="<?php echo base_url('shop'); ?>" class="btn-shop-now" style="background-color: #8c4e2d; color: white; padding: 14px 34px; border-radius: 8px; font-weight: 600; font-size: 15px; text-decoration: none; transition: background 0.3s ease; box-shadow: 0 4px 15px rgba(140, 78, 45, 0.2);">
                            Shop Now <i class="fa-solid fa-arrow-right" style="margin-left: 8px;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    
    <!-- Flush Background Image Layer -->
    <!-- <div class="d-none d-lg-block" style="position: absolute; right: 0; top: 0; height: 100%; width: 55%; z-index: 1;">
        <img src="<?php echo base_url('admin/public/upload_images/modern_hero_products.png'); ?>" 
             alt="Hero Quality Products" 
             style="width: 100%; height: 100%; object-fit: cover; object-position: center; mask-image: linear-gradient(to right, transparent 0%, black 25%); -webkit-mask-image: linear-gradient(to right, transparent 0%, black 25%);">
    </div>
</section> -->


<!-- -------------- Hero Slider Area (Dynamic Banners styled like Static Hero Section) ------------- -->
<section class="hero-slider" style="background-color: #f4f1ef !important; padding: 0 !important; position: relative; overflow: hidden; min-height: 500px; display: flex; align-items: center; z-index: 1;">
    <div class="swiper hero-swiper" style="width: 100%; height: 100%;">
        <div class="swiper-wrapper">
            <?php foreach ($banner as $ban) { ?>
                <div class="swiper-slide" style="background-color: #f4f1ef; min-height: 500px; display: flex; align-items: center; position: relative; overflow: hidden; padding: 70px 0;">
                    <div class="container-fluid" style="position: relative; z-index: 2; width: 100%;">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-12 col-12">
                                <div class="hero-content pl-md-5 pl-3">
                                    <span class="sub-title" style="color: #8c4e2d; font-weight: bold; font-size: 13px; letter-spacing: 2px; text-transform: uppercase; display: block;">MODERN LIVING</span>
                                    <h1 class="main-title" style="font-size: 46px; font-weight: 800; color: #2d2a26; margin-top: 15px; margin-bottom: 25px; line-height: 1.1;"><?php echo $ban['BannerTitle']; ?></h1>
                                    <p class="description" style="color: #666; font-size: 16px; margin-bottom: 35px; max-width: 450px; line-height: 1.6;"><?php echo $ban['BannerText']; ?></p>
                                    <?php if (!empty($ban['BannerUrl'])) { ?>
                                        <div class="hero-button">
                                            <a href="<?php echo $ban['BannerUrl']; ?>" class="btn-shop-now" style="background-color: #8c4e2d; color: white; padding: 14px 34px; border-radius: 8px; font-weight: 600; font-size: 15px; text-decoration: none; transition: background 0.3s ease; box-shadow: 0 4px 15px rgba(140, 78, 45, 0.2); display: inline-flex; align-items: center; gap: 8px;">
                                                Shop Now <i class="fa-solid fa-arrow-right"></i>
                                            </a>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Flush Background Image Layer -->
                    <div class="d-none d-lg-block" style="position: absolute; right: 0; top: 0; height: 100%; width: 55%; z-index: 1;">
                        <img src="<?php echo base_url("admin/public/upload_images/" . $ban['BannerImg']); ?>" 
                             alt="<?php echo $ban['BannerTitle']; ?>" 
                             style="width: 100%; height: 100%; object-fit: cover; object-position: center; mask-image: linear-gradient(to right, transparent 0%, black 25%); -webkit-mask-image: linear-gradient(to right, transparent 0%, black 25%);">
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev" style="color: #8c4e2d;"></div>
        <div class="swiper-button-next" style="color: #8c4e2d;"></div>
    </div>
</section>
<!--/ End Slider Area -->

<!-- -------------- Categories ------------- -->
<div class="category-area">
    <div class="container">
        <div class="category-section-container position-relative">
            <!-- Header Wrap: Left Title, Right View All Pill -->
            <div class="category-header-wrap d-flex justify-content-between align-items-center mb-4">
                <h2 class="category-main-title">Shop by <span class="highlight">Category</span></h2>
                <a href="<?php echo base_url('shop'); ?>" class="btn-view-all-cats">
                    View All Categories <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

            <!-- Swiper Slider wrapper with outer floating arrows -->
            <div class="category-slider-outer-wrap position-relative">
                <!-- Navigation controls centered on left/right outer edges -->
                <div class="cat-button-prev"><i class="fa-solid fa-chevron-left"></i></div>
                <div class="cat-button-next"><i class="fa-solid fa-chevron-right"></i></div>

                <div class="swiper cat-swiper">
                    <div class="swiper-wrapper pt-2 pb-1">
                        <?php foreach ($category as $index => $cat) { 
                            $catNameLower = strtolower($cat['CategoryName']);
                            
                            // Initialize default fallback values (Toys theme values as base fallback)
                            $color = '#FFA800'; 
                            $colorRgb = '255, 168, 0';
                            $icon = 'fa-shapes';
                            $gradient = 'radial-gradient(circle, #FFEFE2 0%, #FFDFCA 100%)';

                            if (strpos($catNameLower, 'toy') !== false || strpos($catNameLower, 'kid') !== false || strpos($catNameLower, 'baby') !== false) {
                                $color = '#FFA800'; 
                                $colorRgb = '255, 168, 0';
                                $icon = 'fa-shapes';
                                $gradient = 'radial-gradient(circle, #FFEFE2 0%, #FFDFCA 100%)';
                            } else if (strpos($catNameLower, 'watch') !== false || strpos($catNameLower, 'clock') !== false) {
                                $color = '#0F7D3A'; 
                                $colorRgb = '15, 125, 58';
                                $icon = 'fa-clock';
                                $gradient = 'radial-gradient(circle, #EDF8F1 0%, #D1ECD9 100%)';
                            } else if (strpos($catNameLower, 'cloth') !== false || strpos($catNameLower, 'wear') !== false || strpos($catNameLower, 'fashion') !== false || strpos($catNameLower, 'shirt') !== false) {
                                $color = '#7C3AED'; 
                                $colorRgb = '124, 58, 237';
                                $icon = 'fa-shirt';
                                $gradient = 'radial-gradient(circle, #F5EFFE 0%, #E3D1FC 100%)';
                            } else if (strpos($catNameLower, 'shoe') !== false || strpos($catNameLower, 'foot') !== false || strpos($catNameLower, 'sneaker') !== false) {
                                $color = '#FF5500'; 
                                $colorRgb = '255, 85, 0';
                                $icon = 'fa-shoe-prints';
                                $gradient = 'radial-gradient(circle, #FFF4EE 0%, #FFDEC9 100%)';
                            } else if (strpos($catNameLower, 'laptop') !== false || strpos($catNameLower, 'comput') !== false) {
                                $color = '#8B5CF6'; 
                                $colorRgb = '139, 92, 246';
                                $icon = 'fa-laptop';
                                $gradient = 'radial-gradient(circle, #F1F0FF 0%, #D8D6FF 100%)';
                            } else if (strpos($catNameLower, 'phone') !== false || strpos($catNameLower, 'mobile') !== false || strpos($catNameLower, 'smart') !== false) {
                                $color = '#2563EB'; 
                                $colorRgb = '37, 99, 235';
                                $icon = 'fa-mobile-screen-button';
                                $gradient = 'radial-gradient(circle, #EEF2FF 0%, #C7D2FE 100%)';
                            } else if (strpos($catNameLower, 'access') !== false || strpos($catNameLower, 'bag') !== false || strpos($catNameLower, 'purse') !== false) {
                                $color = '#C2410C'; 
                                $colorRgb = '194, 65, 12';
                                $icon = 'fa-bag-shopping';
                                $gradient = 'radial-gradient(circle, #FAF2EE 0%, #EFE0D5 100%)';
                            } else if (strpos($catNameLower, 'beauty') !== false || strpos($catNameLower, 'cosmet') !== false || strpos($catNameLower, 'spa') !== false) {
                                $color = '#EC4899'; 
                                $colorRgb = '236, 72, 153';
                                $icon = 'fa-wand-magic-sparkles';
                                $gradient = 'radial-gradient(circle, #FFF0F5 0%, #FCD4E2 100%)';
                            } else if (strpos($catNameLower, 'game') !== false || strpos($catNameLower, 'console') !== false || strpos($catNameLower, 'play') !== false) {
                                $color = '#EC4899'; 
                                $colorRgb = '236, 72, 153';
                                $icon = 'fa-gamepad';
                                $gradient = 'radial-gradient(circle, #FFF0F5 0%, #FCD4E2 100%)';
                            } else {
                                // Fallback styling cycle through the 8 premium themes based on index
                                $themes = [
                                    ['#FFA800', '255, 168, 0', 'fa-shapes', 'radial-gradient(circle, #FFEFE2 0%, #FFDFCA 100%)'],
                                    ['#0F7D3A', '15, 125, 58', 'fa-clock', 'radial-gradient(circle, #EDF8F1 0%, #D1ECD9 100%)'],
                                    ['#7C3AED', '124, 58, 237', 'fa-shirt', 'radial-gradient(circle, #F5EFFE 0%, #E3D1FC 100%)'],
                                    ['#FF5500', '255, 85, 0', 'fa-shoe-prints', 'radial-gradient(circle, #FFF4EE 0%, #FFDEC9 100%)'],
                                    ['#8B5CF6', '139, 92, 246', 'fa-laptop', 'radial-gradient(circle, #F1F0FF 0%, #D8D6FF 100%)'],
                                    ['#2563EB', '37, 99, 235', 'fa-mobile-screen-button', 'radial-gradient(circle, #EEF2FF 0%, #C7D2FE 100%)'],
                                    ['#C2410C', '194, 65, 12', 'fa-bag-shopping', 'radial-gradient(circle, #FAF2EE 0%, #EFE0D5 100%)'],
                                    ['#EC4899', '236, 72, 153', 'fa-wand-magic-sparkles', 'radial-gradient(circle, #FFF0F5 0%, #FCD4E2 100%)']
                                ];
                                $theme = $themes[$index % count($themes)];
                                $color = $theme[0];
                                $colorRgb = $theme[1];
                                $icon = $theme[2];
                                $gradient = $theme[3];
                            }

                            $seed = intval($cat['CategoryID']);
                            $prodCount = (120 + ($seed * 37) % 240) . '+ Products';
                        ?>
                            <div class="swiper-slide">
                                <div class="category-card" style="--category-accent: <?php echo $color; ?>; --category-accent-rgb: <?php echo $colorRgb; ?>;">
                                    <a href="<?php echo base_url('category/' . base64_encode($cat['CategoryID'])); ?>" class="category-card-link">
                                        <div class="category-image-container">
                                            <div class="category-image-wrap" style="background: <?php echo $gradient; ?>;">
                                                <?php if (!empty($cat['Catagoryimage'])) { ?>
                                                    <img src="<?php echo base_url(); ?>admin/public/upload_images/<?php echo $cat['Catagoryimage']; ?>" alt="<?php echo $cat['CategoryName']; ?>">
                                                <?php } else { ?>
                                                    <img src="<?php echo base_url(); ?>admin/public/upload_images/no_category.webp" alt="<?php echo $cat['CategoryName']; ?>">
                                                <?php } ?>
                                            </div>
                                            <div class="category-icon-badge" style="background-color: <?php echo $color; ?>;">
                                                <i class="fa-solid <?php echo $icon; ?>"></i>
                                            </div>
                                        </div>
                                        <div class="category-info text-center">
                                            <h3 class="category-title">
                                                <?php echo $cat['CategoryName']; ?>
                                            </h3>
                                            <p class="product-count"><?php echo $prodCount; ?></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Start Promo Banners Area -->
<div class="promo-banners-area pb-2">
    <div class="container">
        <div class="row">
            <!-- Left Banner: Summer Sale -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="promo-banner-card promo-banner-summer" style="background: #fdf1e5;">
                    <div class="promo-banner-content">
                        <span class="promo-badge summer-badge">Summer Sale</span>
                        <h3 class="promo-title">Up to 50% Off</h3>
                        <p class="promo-subtitle">On Selected Items</p>
                        <a href="<?php echo base_url('shop'); ?>" class="btn-promo btn-promo-summer">
                            Shop Now <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                    <div class="promo-banner-image">
                        <img src="<?php echo base_url('public/images/modern/promo_armchair-removebg-preview.png'); ?>" alt="Summer Sale Armchair">
                    </div>
                </div>
            </div>

            <!-- Middle Banner: New Arrivals -->
            <div class="col-lg-4 col-md-6 col-12">
                <div class="promo-banner-card promo-banner-arrivals" style="background: #f0e6fe;">
                    <div class="promo-banner-content">
                        <span class="promo-badge arrivals-badge">New Arrivals</span>
                        <h3 class="promo-title">Explore New</h3>
                        <p class="promo-subtitle">Check out the latest trends this week.</p>
                        <a href="<?php echo base_url('new-arrivals'); ?>" class="btn-promo btn-promo-arrivals">
                            Explore Now <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                    <div class="promo-banner-image">
                        <img src="<?php echo base_url('public/images/modern/promo_headphones-removebg-preview.png'); ?>" alt="New Arrivals Headphones">
                    </div>
                </div>
            </div>

            <!-- Right Banner: Deal of the Day -->
            <div class="col-lg-4 col-md-12 col-12">
                <div class="promo-banner-card promo-banner-deals" style="background: #fee8e8;">
                    <div class="promo-banner-content">
                        <span class="promo-badge deals-badge">Deal of the Day</span>
                        <h3 class="promo-title">Special Offer</h3>
                        <p class="promo-subtitle">Special price on best selling items</p>
                        <a href="<?php echo base_url('shop'); ?>" class="btn-promo btn-promo-deals">
                            Shop Deals <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                    <div class="promo-banner-image">
                        <img src="<?php echo base_url('public/images/modern/promo_clock-removebg-preview.png'); ?>" alt="Deal of the Day Alarm Clock">
                    </div>
                </div>
            </div>
        </div>

        <!-- Promo Features Row -->
        <div class="row promo-features-row">
            <!-- Feature 1: Top Picks -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="promo-feature-card promo-feature-picks">
                    <div class="promo-feature-icon">
                        <i class="fa-solid fa-gift"></i>
                    </div>
                    <div class="promo-feature-info">
                        <h4 class="promo-feature-title">Top Picks</h4>
                        <p class="promo-feature-desc">Curated just for you</p>
                    </div>
                </div>
            </div>

            <!-- Feature 2: Best Sellers -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="promo-feature-card promo-feature-sellers">
                    <div class="promo-feature-icon">
                        <i class="fa-solid fa-trophy"></i>
                    </div>
                    <div class="promo-feature-info">
                        <h4 class="promo-feature-title">Best Sellers</h4>
                        <p class="promo-feature-desc">Shop our most loved</p>
                    </div>
                </div>
            </div>

            <!-- Feature 3: New Launches -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="promo-feature-card promo-feature-launches">
                    <div class="promo-feature-icon">
                        <i class="fa-solid fa-rocket"></i>
                    </div>
                    <div class="promo-feature-info">
                        <h4 class="promo-feature-title">New Launches</h4>
                        <p class="promo-feature-desc">Fresh products daily</p>
                    </div>
                </div>
            </div>

            <!-- Feature 4: Clearance Sale -->
            <div class="col-lg-3 col-md-6 col-12">
                <div class="promo-feature-card promo-feature-clearance">
                    <div class="promo-feature-icon clearance-icon-wrap">
                        <i class="fa-solid fa-certificate"></i>
                        <span class="clearance-percent">%</span>
                    </div>
                    <div class="promo-feature-info">
                        <h4 class="promo-feature-title">Clearance Sale</h4>
                        <p class="promo-feature-desc">Grab before it's gone</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Promo Banners Area -->

<!-- Start New Arrivals Area -->
<div class="product-area pt-5 pb-4 new-arrivals-area">
    <div class="container" style="max-width: 1330px;
">
        <div class="row align-items-center mb-4 position-relative">
            <div class="col-12 text-center">
                <div class="section-header">
                    <span class="sub-title">Explore</span>
                    <h2 class="main-title">New Arrivals</h2>
                    <p class="section-desc">Be the first to discover our latest curated additions</p>
                </div>
            </div>
            <div class="position-absolute-view-all">
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
                                        <!-- <span class="badge-new">NEW</span> -->
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
                                            <form class="addtocartform" action="<?= base_url('addToCart') ?>" method="POST">
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

<!-- Start Flash Sale & Trusted Brands Area -->
<div class="flash-sale-brands-area">
    <div class="container">
        <div class="flash-sale-brands-row">
            <!-- Left Banner: Flash Sale -->
            <div class="col-lg-8">
                <div class="flash-sale-card">
                    <div class="flash-sale-content">
                        <div class="flash-sale-left">
                            <span class="fs-title-accent">Flash Sale</span>
                            <h3 class="fs-title-main">Limited Time Offer!</h3>
                        </div>
                        
                        <div class="flash-sale-timer-wrap">
                            <div class="flash-sale-timer-panel">
                                <div class="countdown-box">
                                    <span class="countdown-num" id="cd-hours">02</span>
                                    <span class="countdown-label">Hours</span>
                                </div>
                                <div class="countdown-box">
                                    <span class="countdown-num" id="cd-mins">45</span>
                                    <span class="countdown-label">Mins</span>
                                </div>
                                <div class="countdown-box">
                                    <span class="countdown-num" id="cd-secs">30</span>
                                    <span class="countdown-label">Secs</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flash-sale-right">
                            <span class="fs-discount-text">Up to 70% OFF on selected products</span>
                            <a href="<?php echo base_url('product'); ?>" class="btn-fs-shop">
                                Shop Now <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                    <img src="<?php echo base_url('public/images/modern/promo_headphones-removebg-preview.png'); ?>" alt="Flash Sale Headphones" class="flash-sale-headphones">
                </div>
            </div>

            <!-- Right Banner: Trusted Brands -->
            <div class="col-lg-4">
                <div class="trusted-brands-card">
                    <div class="trusted-brands-header">
                        <h4 class="tb-title">Trusted Brands</h4>
                        <p class="tb-subtitle">Top brands, top quality</p>
                    </div>
                    <div class="brands-grid-wrap">
                        <!-- Nike -->
                        <div class="brand-logo-card">
                            <svg class="brand-svg" viewBox="0 0 24 24" fill="currentColor" style="height: 15px; color: #000000; width: auto;">
                                <path d="M21.572 6.023c-.347-.396-1.127-.123-2.185.705-1.583 1.242-4.524 3.738-7.514 5.37-2.616 1.425-4.877 1.83-5.918 1.83-.348 0-.547-.024-.547-.11 0-.173.348-.68 1.093-1.606 2.057-2.553 5.485-5.938 9.176-8.23.82-.51.62-.973-.422-.729-3.92 0.925-8.812 4.137-12.28 7.397-1.39 1.31-2.482 2.766-2.88 3.69-.174.413-.025.705.546.462 2.977-1.265 9.761-4.717 15.545-9.155 3.327-2.553 4.298-4.256 2.392-5.624z"/>
                            </svg>
                        </div>
                        <!-- Adidas -->
                        <div class="brand-logo-card">
                            <svg class="brand-svg" viewBox="0 0 24 24" fill="currentColor" style="height: 20px; color: #000000; width: auto;">
                                <path d="M8.244 18.244l-2.072-3.582h-2.164l3.125 5.405h2.164zm4.843 0l-4.144-7.164h-2.165l5.197 9h2.164zm4.843 0l-6.216-10.746h-2.164l7.27 12.582h2.164z"/>
                            </svg>
                        </div>
                        <!-- Apple -->
                        <div class="brand-logo-card">
                            <i class="fa-brands fa-apple" style="font-size: 20px; color: #000000;"></i>
                        </div>
                        <!-- Samsung -->
                        <div class="brand-logo-card">
                            <span style="font-family: 'Inter', 'Helvetica Neue', sans-serif; font-weight: 850; font-size: 10px; color: #0A0A0A; letter-spacing: -0.2px;">SAMSUNG</span>
                        </div>
                        <!-- Sony -->
                        <div class="brand-logo-card">
                            <span style="font-family: 'Georgia', 'Times New Roman', serif; font-weight: 700; font-size: 11px; color: #000000; letter-spacing: 0.5px;">SONY</span>
                        </div>
                        <!-- boAt -->
                        <div class="brand-logo-card">
                            <span style="font-family: 'Poppins', sans-serif; font-weight: 800; font-size: 12.5px; color: #000000; letter-spacing: -0.5px;">bo<span style="color: #FF2E2E;">At</span></span>
                        </div>
                        <!-- View All Brands -->
                        <a href="<?php echo base_url('brands'); ?>" class="brand-view-all">
                            View All Brands <i class="fa-solid fa-arrow-right" style="color: #FF5500;"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var countdownKey = 'flash_sale_countdown_target';
    var targetTime = localStorage.getItem(countdownKey);
    
    if (!targetTime) {
        var now = new Date().getTime();
        targetTime = now + (2 * 60 * 60 * 1000) + (45 * 60 * 1000) + (30 * 1000);
        localStorage.setItem(countdownKey, targetTime);
    } else {
        targetTime = parseInt(targetTime, 10);
    }
    
    function updateCountdown() {
        var now = new Date().getTime();
        var distance = targetTime - now;
        
        if (distance < 0) {
            targetTime = now + (2 * 60 * 60 * 1000) + (45 * 60 * 1000) + (30 * 1000);
            localStorage.setItem(countdownKey, targetTime);
            distance = targetTime - now;
        }
        
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
        var hStr = hours < 10 ? '0' + hours : hours;
        var mStr = minutes < 10 ? '0' + minutes : minutes;
        var sStr = seconds < 10 ? '0' + seconds : seconds;
        
        var hEl = document.getElementById('cd-hours');
        var mEl = document.getElementById('cd-mins');
        var sEl = document.getElementById('cd-secs');
        
        if (hEl) hEl.textContent = hStr;
        if (mEl) mEl.textContent = mStr;
        if (sEl) sEl.textContent = sStr;
    }
    
    updateCountdown();
    setInterval(updateCountdown, 1000);
});
</script>

<!-- Start Trending Items Area -->
<!-- <div class="product-area pt-4 pb-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <div class="section-header">
                    <span class="sub-title">Explore</span>
                    <h2 class="main-title">Trending Items</h2>
                    <p class="section-desc">See what other shoppers are loving right now</p>
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
                                                        <form class="addtocartform" action="<?= base_url('addToCart') ?>" method="POST">
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
</div> -->
<!-- End Product Area -->

<!-- Start Best Sellers Area -->
<div class="product-area pt-4 pb-5 best-sellers-area">
    <div class="container" style="max-width: 1330px;
">
        <div class="row align-items-center mb-4 position-relative">
            <div class="col-12 text-center">
                <div class="section-header">
                    <span class="sub-title">Explore</span>
                    <h2 class="main-title">Best Sellers</h2>
                    <p class="section-desc">Explore our most popular and highly rated products</p>
                </div>
            </div>
            <div class="position-absolute-view-all">
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
                                        <!-- <span class="badge-new" style="background: #f7941d;">HOT</span> -->
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
                                            <form class="addtocartform" action="<?= base_url('addToCart') ?>" method="POST">
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
<section class="shop-blog py-4">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 text-center">
                <div class="section-header">
                    <span class="sub-title">Explore</span>
                    <h2 class="main-title">From Our Blog</h2>
                    <p class="section-desc">Stay updated with our latest design insights, tips, and trends</p>
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
<?php include 'footer_content.php'; goto homepage_footer_scripts; ?>

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
<?php homepage_footer_scripts: ?>
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
            slidesPerView: 8,
            spaceBetween: 16,
            navigation: {
                nextEl: ".cat-button-next",
                prevEl: ".cat-button-prev",
            },
            breakpoints: {
                0: {
                    slidesPerView: 2.2,
                    spaceBetween: 12,
                },
                480: {
                    slidesPerView: 3.2,
                    spaceBetween: 14,
                },
                768: {
                    slidesPerView: 5,
                    spaceBetween: 16,
                },
                992: {
                    slidesPerView: 6,
                    spaceBetween: 16,
                },
                1200: {
                    slidesPerView: 8,
                    spaceBetween: 16,
                },
            },
        });

        var productSwiper = new Swiper(".product-swiper", {
            slidesPerView: 1,
            spaceBetween: 15,
            navigation: {
                nextEl: ".prod-button-next",
                prevEl: ".prod-button-prev",
            },
            breakpoints: {
                576: { slidesPerView: 2 },
                768: { slidesPerView: 3 },
                992: { slidesPerView: 4 },
                1200: { slidesPerView: 5 },
            },
        });

        var bestSwiper = new Swiper(".best-swiper", {
            slidesPerView: 1,
            spaceBetween: 15,
            navigation: {
                nextEl: ".best-button-next",
                prevEl: ".best-button-prev",
            },
            breakpoints: {
                576: { slidesPerView: 2 },
                768: { slidesPerView: 3 },
                992: { slidesPerView: 4 },
                1200: { slidesPerView: 5 },
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

            var form = $(this);
            var url = form.attr('action') || '<?= base_url('addToCart') ?>';

            $.ajax({
                type: 'POST',
                url: url,
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
