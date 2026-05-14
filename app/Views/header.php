<?php

$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $directoryURI);
$first_part = $components[1];
$settings = new App\Models\Settings();
$sett_data = $settings->get()->getRow();

$AllsettingsModel = new \App\Models\Allsettingsmodel();
$all_setting_data = $AllsettingsModel->first();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name='copyright' content=''>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Title Tag  -->
    <title>ECommerce Web App</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>public/images/favicon.png">
    <!-- Web Font -->
    <link
        href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <!-- StyleSheet -->

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/magnific-popup.min.css">
    <!-- Font Awesome -->
    <!--<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/font-awesome.css">-->
    <!-- Fancybox -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/jquery.fancybox.min.css">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/themify-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/ti-icons@0.1.2/css/themify-icons.min.css" rel="stylesheet">
    <script src="https://js.stripe.com/v3/"></script>



    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/niceselect.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/animate.css">
    <!-- Flex Slider CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/flex-slider.min.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/owl-carousel.css">
    <!-- Slicknav -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/slicknav.min.css">

    <!-- Eshop StyleSheet -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/reset.css">
    <!-- <link rel="stylesheet" href="<?// echo base_url(); ?>public/css/style.css"> -->
     <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/style.css?v=<?php echo time(); ?>">

    <!-- <link rel="stylesheet" href="<?// echo base_url(); ?>public/css/responsive.css"> -->
     <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/responsive.css?v=<?php echo time(); ?>">

    <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/jquery-ui.css">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
     <!-- Google Analytics Script -->
    <?php if (!empty($all_setting_data['google_analytics'])): ?>
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $all_setting_data['google_analytics']; ?>"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '<?php echo $all_setting_data['google_analytics']; ?>');
    </script>
    <?php endif; ?>
    
    <style>
        #country-list {
            float: left;
            list-style: none;
            padding: 0;
            width: 105%;
            position: absolute;
            z-index: 10000000;
        }

        #country-list li {
            padding: 10px;
            background: #ffffff;
            /*border-bottom: #bbb9b9 1px solid;*/
            cursor: pointer;
            height: 220px;

        }

        #country-list li p {
            float: left;
            text-align: justify;
        }

        #country-list li h5 {
            float: left;
            color: #f7941d;
        }

        .loader-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Semi-transparent background */
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            /* Ensure it appears above other content */
        }

        .loader {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 120px;
            height: 120px;
            /*z-index: 10000;*/
            display: none;
            /*position: fixed;*/
            margin-left: 50%;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
        }

        .swal2-popup {
            background: #fff !important;
        }

        .swal2-backdrop-show {
            background: rgb(255 255 255 / 50%);
        }

        p.desc {
            margin-top: 2px;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .overlay {
            display: none;
            position: fixed;
            width: 100%;
            height: 100%;
            z-index: 1000;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            background: rgba(0, 0, 0, .7);
            opacity: 0.5;
            filter: alpha(opacity=50);
        }

        #semiTransparenDiv {
            width: 100%;

            /*-Lets Center the Spinner-*/
            position: fixed;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;

            /*Centering my shade */
            margin-bottom: 40px;
            margin-top: 60px;

            background-color: rgba(255, 255, 255, 0.7);
            z-index: 9999;
            display: none;
        }

        @-webkit-keyframes spin {
            from {
                -webkit-transform: rotate(0deg);
            }

            to {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        #semiTransparenDiv::after {
            content: '';
            display: block;
            position: absolute;
            left: 48%;
            top: 40%;
            width: 80px;
            height: 80px;
            border-style: solid;
            border: 5px solid black;
            border-top-color: #6CC4EE;
            border-width: 7px;
            border-radius: 50%;
            -webkit-animation: spin .8s linear infinite;

            /* Lets make it go round */
            animation: spin .8s linear infinite;
        }



        ul#country-list {
            overflow-y: scroll;
            overflow-y: hidden;
            max-height: 54vh;
        }

        .mbsize {
            color: #f7941d;
        }

        .hh2 {
            display: none;
        }

        @media only screen and (max-width: 450px) {
            .hh1 {
                display: none;
            }

            .hh2 {
                display: block;
            }
        }


        .header.shop .search-bar {
            height: 41px !important;
            line-height: 41px !important;
            border-radius: 20px;
        }

        /* --- Custom Styles to match Image --- */
        .header.shop {
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            position: relative;
            z-index: 100;
        }
        .header.shop .topbar {

            background: #fff;
            /* border-bottom: 1px solid #f1f1f1; */
            padding: 10px 0;
        }
        .header.shop .topbar .list-main li {
            color: #444;
            font-size: 13px;
            font-weight: 500;
        }
        .header.shop .topbar .list-main li i {
            color: #ff6700;
            margin-right: 6px;
            font-size: 14px;
        }
        .header.shop .topbar .list-main li a {
            color: #444;
        }
        .header.shop .topbar .right-content .list-main {
            justify-content: flex-end;
        }

        .header.shop .middle-inner .row {
            display: flex;
            align-items: center;
        }
        .header.shop .logo img {
            max-height: 60px;
            width: auto;
        }
        .header.shop .search-bar-top {
            margin: 0;
        }
        .header.shop .search-bar {
            background: #fff;
            border: 1px solid #e5e5e5 !important;
            border-radius: 30px !important;
            height: 50px !important;
            line-height: 48px !important;
            padding: 0 5px;
            display: flex;
            align-items: center;
        }
        .header.shop .search-bar form {
            display: flex;
            width: 100%;
            height: 100%;
            align-items: center;
        }
        .header.shop .search-bar input {
            border: none !important;
            height: 100% !important;
            padding: 0 25px !important;
            font-size: 14px;
            color: #666;
            flex-grow: 1;
            background: transparent;
        }
        .header.shop .search-bar .btnn {
            width: 65px !important;
            height: 48px !important;
            background: #ff6700 !important;
            color: #fff !important;
            border-radius: 40px !important;
            border: none !important;
            display: flex !important;
            align-items: center;
            justify-content: center;
            padding: 0 !important;
            margin-right: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
            /* position: static !important; */
            line-height: 1 !important;
        }
        .header.shop .search-bar .btnn i {
            font-size: 18px;
            color: #fff;
        }

        .header.shop .right-bar {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            top: 0 !important;
            gap: 25px;
        }
        .header.shop .right-bar .sinlge-bar {
            margin: 0;
        }
        .header.shop .right-bar .sinlge-bar a {
            font-size: 22px;
            color: #333;
            transition: color 0.3s ease;
            display: block;
        }
        .header.shop .right-bar .sinlge-bar a:hover {
            color: #ff6700;
        }
        .header.shop .right-bar .shopping {
            position: relative;
        }
        .header.shop .right-bar .total-count {
            position: absolute;
            top: -5px;
            right: -10px;
            background: #ff6700;
            color: #fff;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 10px;
            font-weight: 700;
            border: 2px solid #fff;
        }

        .header.shop .header-inner {
            background: #fff;
            padding: 0;
            border-top: 1px solid #f1f1f1;
        }
        .header.shop .all-category {
            background: transparent !important;
            padding: 0 !important;
        }
        .header.shop .cat-heading {
            background: transparent !important;
            color: #333 !important;
            font-size: 15px;
            font-weight: 600;
            padding: 15px 0;
            display: flex;
            align-items: center;
            cursor: pointer;
            box-shadow: none !important;
            border: none !important;
            border-radius: 0 !important;
            margin: 0 !important;
        }
        .header.shop .cat-heading i {
            margin-right: 12px;
            font-size: 20px;
            color: #333 !important;
        }
        .header.shop .menu-area {
            display: flex;
            /* justify-content: center; */
        }
        .header.shop .nav li {
            margin: 0 18px;
            background: transparent !important;
            border: none !important;
        }
        .header.shop .nav li a {
            color: #333 !important;
            font-size: 14px;
            font-weight: 600;
            padding: 0 0 18px 0;
            display: block;
            text-transform: none;
            position: relative;
            background: transparent !important;
            box-shadow: none !important;
            border: none !important;
            border-radius: 0 !important;
        }
        .header.shop .nav li.active a {
            color: #ff6700 !important;
            background: transparent !important;
        }
        .header.shop .nav li.active a::after {
            content: '';
            position: absolute;
            bottom: 12px;
            left: 0;
            width: 100%;
            height: 3px;
            background: #ff6700;
            display: block;
            z-index: 10;
        }
        .header.shop .nav li a:hover {
            color: #ff6700 !important;
            background: transparent !important;
        }

        /* Ensure vertical centering in middle bar */
        .header.shop .middle-inner .container > .row {
            display: flex;
            align-items: center;
        }
        .header.shop .middle-inner .row > div {
            display: flex;
            align-items: center;
        }
        .header.shop .right-bar {
            width: 100%;
            justify-content: flex-end;
            margin: 0;
            padding: 0;
        }
        .header.shop .search-bar-top {
            width: 100%;
        }



    </style>
    
</head>

<body class="js">


    <input type="hidden" name="base_url" id="base_url" value="<?php echo base_url(); ?>" />
    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- End Preloader -->

    <!-- Header -->
    <header class="header shop">
        <!-- Topbar -->
        <div class="topbar">
            <div class="container">
                <div class="row hh1">
                    <div class="col-lg-5 col-md-12 col-12">
                        <!-- Top Left -->
                        <div class="top-left">
                            <ul class="list-main">
                                <li>
                                    <i class="fa fa-phone"></i>
                                    <a style="font-weight: 700;" href="tel:<?php echo $sett_data->Phone; ?>"><?php echo $sett_data->Phone; ?></a>
                                </li>
                                <li>
                                    <i class="fa fa-envelope-o"></i>
                                    <a style="font-weight: 700;" href="mailto:<?php echo $sett_data->Email; ?>"><?php echo $sett_data->Email; ?></a>
                                </li>
                            </ul>
                        </div>
                        <!--/ End Top Left -->
                    </div>
                    <div class="col-lg-7 col-md-12 col-12">
                        <!-- Top Right -->
                        <div class="right-content">
                            <ul class="list-main">
                                <?php
                                $session = session();
                                $usertype = $session->get('type');

                                if (!empty($usertype)) {
                                    ?>
                                    <li><i class="fa-regular fa-user"></i> <a style="font-weight: 700;" href="<?php echo base_url('my_account'); ?>">My
                                            Account</a></li>
                                    <?php
                                } else {
                                    ?>
                                    <li><i class="fa-regular fa-user"></i> <a style="font-weight: 700;" href="<?php echo base_url('login'); ?>">My Account</a>
                                    </li>
                                    <?php
                                }
                                ?>

                                <?php
                                if (empty($usertype)) {
                                    ?>
                                    <li><i class="fa-solid fa-power-off"></i> <a style="font-weight: 700;" href="<?php echo base_url(
                                        'login'
                                    ); ?>">Login</a></li>
                                    <?php
                                } else {
                                    ?>
                                    <li><i class="fa-solid fa-power-off"></i> <a style="font-weight: 700;" href="<?php echo base_url(
                                        'logout'
                                    ); ?>">Logout</a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                        <!--End Top Right -->
                    </div>
                </div>
                <div class="row hh2">

                    <!-- Top Left -->
                    <div class="col-lg-5 col-md-12 col-12" style="">
                        <ul class="list-main justify-content-between" style="display:flex">
                            <!--+950-801-582-->
                            <li><i class="ti-headphone-alt"></i><?php echo $sett_data->Phone; ?></li>
                            <li><i class="ti-email"></i> <?php echo $sett_data->Email; ?></li>
                            <?php
                            $session = session();
                            $usertype = $session->get('type');
                            // print_r($usertype);
                            
                            if (!empty($usertype)) {
                                ?>
                                <li><a href="<?php echo base_url('my_account'); ?>"><i class="ti-user mbsize"
                                            style="color: #f7941d;"></i></a></li>


                                <?php
                            } else {
                                ?>
                                <li><a href="<?php echo base_url('login'); ?>"><i class="ti-user mbsize"
                                            style="color: #f7941d;"></i></a></li>
                                <?php
                            }
                            ?>

                            <?php
                            $session = session();
                            $usertype = $session->get('type');

                            if (empty($usertype)) {
                                ?>
                                <li><a href="<?php echo base_url(
                                    'login'
                                ); ?>"><i class="ti-power-off" style="color: #f7941d;"></i></a></li>
                                <?php
                            } else {
                                ?>
                                <li><a href="<?php echo base_url(
                                    'logout'
                                ); ?>"><i class="ti-power-off" style="color: #f7941d;"></i></a></li>
                                <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->
        <div class="middle-inner py-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-2">
                        <!-- Logo -->
                        <div class="logo mt-0">
                            <a href="<?php echo base_url(); ?>">
                                <img src="<?php echo base_url('admin/public/upload_images/' . $sett_data->Logo); ?>"
                                    height="100" width="100" />
                            </a>
                            <h4><?php //echo $sett_data->Title; ?><a href="<?php echo base_url('/'); ?>"></a></h4>
                        </div>
                        <!--/ End Logo -->
                        <!-- Search Form -->
                        <div class="crt-resp d-block d-lg-none d-md-none"
                            style=" position: absolute; right: 81px; top: 20px; color : #f7941d">
                            <?php

                            $CartObj = new App\Controllers\Cart;
                            $CartTotals = (object) $CartObj->calculateCartTotals();
                            $cart = session()->get('cart');

                            $totalCartItem = 0;

                            if (!is_null($cart) && is_array($cart)) {
                                $totalCartItem = count($cart);
                            }
                            ?>
                            <a href="<?php echo base_url('cart'); ?>" class="single-icon"><i
                                    class="fa-solid fa-cart-shopping"></i></a>
                            <span class="total-count badge"
                                style="height:14px;width:14px;line-height: 9px;"><?php echo $totalCartItem; ?></span>
                        </div>


                        <div class="search-top">
                            <div class="top-search" style="color: #f7941d;"><a href="#0"><i class="ti-search"></i></a>
                            </div>
                            <!-- Search Form -->
                            <div class="search-top">
                                <form class="search-form" action="<?php echo base_url('product'); ?>">
                                    <input type="text" placeholder="Search here..." id="serch_catt" name="search"
                                        autocomplete="off">
                                    <button value="search" type="submit" id="search_prdd"><i
                                            class="ti-search"></i></button>
                                </form>
                            </div>
                            <!--/ End Search Form -->
                        </div>
                        <!--/ End Search Form -->
                        <div class="mobile-nav"></div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="search-bar-top">
                            <div class="search-bar">
                                <form action="<?php echo base_url('product'); ?>">
                                    <input name="search" id="serch_cat" placeholder="Search products here..."
                                        type="text" autocomplete="off" maxlength="50">
                                    <button type="submit" class="btnn" id="search_prd"><i
                                            class="fa fa-search"></i></button>
                                    <div id="suggesstion-box"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-12">
                        <div class="right-bar">
                            <!-- Wishlist -->
                            <div class="sinlge-bar">
                                <?php
                                if (!empty($usertype)) {
                                    ?>
                                    <a href="<?php echo base_url('wishlist'); ?>" class="single-icon"><i class="fa-regular fa-heart"></i></a>
                                    <?php
                                } else {
                                    ?>
                                    <a href="#" data-toggle="modal" data-target="#exampleModal" class="single-icon"><i class="fa-regular fa-heart"></i></a>
                                    <?php
                                }
                                ?>
                            </div>

                            <!-- Notification/Message -->
                            <div class="sinlge-bar">
                                <a href="javascript:void(0)" class="single-icon"><i class="fa-regular fa-comment"></i></a>
                            </div>

                            <!-- Cart -->
                            <div class="sinlge-bar shopping">
                                <a href="<?php echo base_url('cart'); ?>" class="single-icon">
                                    <i class="fa-solid fa-bag-shopping"></i>
                                    <?php
                                    $CartObj = new App\Controllers\Cart;
                                    $cart = session()->get('cart');
                                    $totalCartItem = (!is_null($cart) && is_array($cart)) ? count($cart) : 0;
                                    ?>
                                    <span class="total-count"><?php echo $totalCartItem; ?></span>
                                </a>

                                <div class="shopping-item">
                                    <div class="dropdown-cart-header">
                                        <span><?php echo $totalCartItem; ?> Items</span>
                                        <a href="<?php echo base_url('cart'); ?>">View Cart</a>
                                    </div>
                                    <?php
                                    //  print_r($totalCartItem);
                                    // die;
                                    
                                    if ($totalCartItem > 0) {
                                        ?>
                                        <ul class="shopping-list">
                                            <?php

                                            foreach ($cart as $item) {
                                                // 			print_r($cart);
                                                $imgurl = ($item['ProductImage']) ? ($item['ProductImage']) : ('');
                                                ?>
                                                <li id="<?php echo $item['id']; ?>">
                                                    <a href="javascript:void(0)" class="remove removeItem"
                                                        data-id="<?php echo $item['id']; ?>" title="Remove this item"><i
                                                            class="fa fa-remove"></i></a>
                                                    <a class="cart-img border border-0" href="javascript:void(0)"><img
                                                            src="<?php echo $imgurl; ?>" alt="javascript:void(0)"></a>
                                                    <h4><a
                                                            href="<?php echo base_url($item['slug'] . "/" . 'product_detail/' . base64_encode($item['id'])); ?>"><?php echo $item['name']; ?></a>
                                                    </h4>
                                                    <p class="quantity"><?php echo $item['quantity']; ?>x - <span
                                                            class="amount"><?php echo $all_setting_data['currency']; ?><?php echo $item['unit_price']; ?></span></p>
                                                </li>
                                                <?php
                                            }
                                            ?>


                                        </ul>
                                        <?php
                                    } else {
                                        ?>
                                        <ul class="shopping-list">
                                            <li>
                                                <h4 class="text-center"><a href="javascript:void(0)">cart is empty</a></h4>

                                            </li>

                                        </ul>
                                        <?php
                                    }
                                    ?>
                                    <?php
                                    if ($totalCartItem > 0) {
                                        ?>
                                        <div class="bottom">
                                            <div class="total">
                                                <span>Total</span>
                                                <span class="total-amount"><?php echo $all_setting_data['currency']; ?><?php echo $CartTotals->subtotal; ?></span>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 ">
                                                    <a href="<?php echo base_url('cart'); ?>"
                                                        class="btn animate rounded">Cart</a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a href="<?php echo base_url('checkout'); ?>"
                                                        class="btn animate rounded">Checkout</a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>


                                <!--/ End Shopping Item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header Inner -->
        <div class="header-inner">
            <div class="container pm-2">
                <div class="cat-nav-head">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="all-category">
                                <h3 class="cat-heading p-0"><i class="fa-solid fa-bars" aria-hidden="true"></i>Categories</h3>
                                <ul class="main-category">
                                    <?php
                                    foreach ($catdata as $cate) {
                                        ?>
                                        <li>
                                            <a href="#"><?php echo $cate['CategoryName']; ?>
                                                <?php

                                                if (count($subdata[$cate['CategoryID']]) > 0)
                                                //   if (count($cate['CategoryID']) > 0)
                                                {
                                                    ?>
                                                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                                                    <?php
                                                }
                                                ?>
                                            </a>
                                            <?php

                                            if (count($subdata[$cate['CategoryID']]) > 0)
                                            // if (count($cate['CategoryID']) > 0)
                                            {
                                                ?>

                                                <ul class="sub-category">
                                                    <?php
                                                    foreach ($subdata[$cate['CategoryID']] as $key => $subdt)
                                                    // 		foreach ($cate['CategoryID'] as $subdt) 
                                                    {
                                                        $sub_name = $subdt['sub_category'];
                                                        $make_slug = str_replace(' ', '-', $sub_name);
                                                        if ($subdt['sub_category'] == 'Clothes for Men') {
                                                            echo '<li><a href="base_url(' . $make_slug . '"/subcategory/"' . base64_encode($subdt['sub_category_id']) . '")" class="title-link">' . $subdt['sub_category'] . '</a></li>';

                                                        }
                                                        ?>
                                                        <li>
                                                            <a href="<?php echo base_url($make_slug . "/" . 'subcategory/' . base64_encode($subdt['sub_category_id'])) ?>"
                                                                class="title-link"><?php echo $subdt['sub_category']; ?></a>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            <?php }
                                            //else { 
                                            ?>
                                            <?php
                                            //   }
                                            ?>

                                        </li>
                                    <?php }
                                    ?>

                                </ul>
                            </div>
                        </div>

                        <!--===========================-->
                        <div class="col-lg-9 col-12">
                            <div class="menu-area">
                                <!-- Main Menu -->
                                <nav class="navbar navbar-expand-lg">
                                    <div class="navbar-collapse">
                                        <div class="nav-inner">
                                            <ul class="nav main-menu menu navbar-nav">
                                                <li class="<?= $first_part == ''
                                                    ? 'active'
                                                    : '' ?>"><a href="<?php echo base_url('/'); ?>">Home</a></li>

                                                <li class="<?= $first_part == 'product'
                                                    ? 'active'
                                                    : '' ?>"><a href="<?php echo base_url(
                                                      'product'
                                                  ); ?>">All Products</a></li>

                                                <li class="<?= $first_part == 'new-arrivals'
                                                    ? 'active'
                                                    : '' ?>"><a href="<?php echo base_url(
                                                      'new-arrivals'
                                                  ); ?>">New In</a></li>

                                                <li class="<?= $first_part == 'blog'
                                                    ? 'active'
                                                    : '' ?>"><a href="<?php echo base_url('blog'); ?>">Blog</a>

                                                <li class="<?= $first_part == 'about_us'
                                                    ? 'active'
                                                    : '' ?>"><a href="<?php echo base_url('about_us'); ?>">About Us</a>
                                                </li>

                                                <li class="<?= $first_part == 'contact'
                                                    ? 'active'
                                                    : '' ?>"><a href="<?php echo base_url(
                                                      'contact'
                                                  ); ?>">Contact Us</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                                <!--/ End Main Menu -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ End Header Inner -->
    </header>
    <!--/ End Header -->
    <!--<div class="loader"></div>-->
    <div class="overlay">
        <div class="d-flex justify-content-center">
            <div class="spinner-grow text-primary" role="status" style="width: 3rem; height: 3rem; z-index: 20;">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
    <div class="loader"></div>
    <div id="semiTransparenDiv"></div>

    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document" style="text-align: -webkit-center;">
            <div class="modal-content" style="width: 465px;border-radius:10px;">
                <div class="modal-header">
                    <button type="button" class="close close-bt" data-dismiss="modal" aria-label="Close">
                        <span class="ti-close text-dark" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center" style=" border-radius: 10px;">
                    <div class="text-center">
                        <h4 style="font-size: 14px; font-weight: 500; color: #F7941D; margin-bottom: 5px;"></h4>
                        <h3
                            style="font-size: 22px; color: #333; margin-bottom: 12px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            Product has been added to cart.
                        </h3>
                        <div id="product-details" class="text-center">
                            <img class="mt-4" id="modalProductImage" src="" alt="Product Image"
                                style="width: 15px; height: 15px; object-fit: contain; margin-bottom: 15px; transform: scale(5);">
                            <p class="mt-3" id="modalProductName"
                                style="font-size: 17px; font-weight: 600; color: #333;"></p>
                            <p class="mt-0 mb-2" id="modalProductPrice" style="font-size: 15px; color: #777;"></p>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <a href="<?php echo base_url('cart'); ?>"
                                    class="btn text-white cart_btn btn-block rounded" style="font-size:16px;">View
                                    Cart</a>
                            </div>
                            <div class="col-6">
                                <a href="<?php echo base_url('checkout'); ?>"
                                    class="btn text-white cart_btn btn-block rounded"
                                    style="font-size:16px;">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- --------------------=================================== -->

    <div class="modal " id="exampleModal">
        <div class="modal-dialog">
            <div class="m-auto modal-content w-50">
                <!-- Modal Header -->
                <div class="text-center"
                    style="background:#f7941d;border-top-left-radius:5px;border-top-right-radius:5px;">
                    <h2 class="my-2 text-white">Login</h2>
                    <button type="button" id="clsbtn" class="close text-white" data-dismiss="modal"
                        style="margin-top: -35px;opacity:1;"><i class="fa-solid fa-xmark pr-3"
                            style="font-size:15px;"></i></button>
                </div>

                <!-- Modal body -->
                <div class="card p-4 w-100">
                    <form>
                        <!-- Email input -->
                        <div class="form-outline mb-2 email">
                            <label class="form-label mb-0" for="emailids">Email Address<span>*</span></label>
                            <input type="email" id="emailids" name="emailids" placeholder="" class="form-control">
                            <div class="emailid_error"></div>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-2 password">
                            <label class="form-label mb-0" for="passwords">Password<span>*</span></label>
                            <input type="password" id="passwords" name="password" placeholder="" class="form-control">
                            <div class="pass_error"></div>
                        </div>

                        <!-- Submit button -->
                        <div class="mt-3">
                            <button type="button" id="logindata"
                                class="btn btn-block btn-info cart_btn rounded">LOGIN</button>
                        </div>

                        <!-- Additional links -->
                        <div class="mt-3">
                            <p class="mb-2 text-dark">Don't have an account?
                                <a href="<?php echo base_url('register'); ?>" style="color: #f7941d;">Register here</a>
                            </p>
                        </div>

                        <div class="msg_data"></div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</body>

<script>
    $(document).ready(function () {
        $('.close-bt').on('click', function () {
            $('#cartModal').modal('hide');
        });
    });
</script>