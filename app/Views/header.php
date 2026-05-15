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
        <script async
            src="https://www.googletagmanager.com/gtag/js?id=<?php echo $all_setting_data['google_analytics']; ?>"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() { dataLayer.push(arguments); }
            gtag('js', new Date());

            gtag('config', '<?php echo $all_setting_data['google_analytics']; ?>');
        </script>
    <?php endif; ?>
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
        <div class="container-fluid p-0">
            <div class="topbar-inner">
                <div class="left-content">
                    <i class="fa-solid fa-truck-fast"></i>
                    <span>Free Installation on select products</span>
                </div>
                <div class="right-content">
                    <ul class="list-main">
                        <li><a href="<?php echo base_url('track_order'); ?>"><i class="fa-regular fa-clock"></i> Track
                                Order</a></li>
                        <li><a href="<?php echo base_url('help_center'); ?>"><i
                                    class="fa-regular fa-circle-question"></i> Help Center</a></li>
                        <?php
                        $session = session();
                        $usertype = $session->get('type');
                        if (!empty($usertype)) {
                            ?>
                            <li><a href="<?php echo base_url('my_account'); ?>"><i class="fa-regular fa-user"></i> My
                                    Account</a></li>
                            <li><a href="<?php echo base_url('logout'); ?>"><i class="fa-solid fa-power-off"></i> Logout</a>
                            </li>
                            <?php
                        } else {
                            ?>
                            <li><i class="fa-regular fa-user"></i> <a href="<?php echo base_url('login'); ?>">Login</a> / <a
                                    href="<?php echo base_url('register'); ?>">Sign Up</a></li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>

        <!-- End Topbar -->
        <!-- <div class="middle-inner"> -->
            <div class="container-fluid">
                <div class="row align-items-center" style="padding: 15px 30px;">
                    <div class="col-lg-2 col-md-3 col-12 p-0">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="<?php echo base_url(); ?>">
                                <img src="<?php echo base_url('admin/public/upload_images/' . $sett_data->Logo); ?>"
                                    alt="logo" />
                            </a>
                        </div>
                        <!--/ End Logo -->
                        <div class="mobile-nav"></div>
                    </div>
                    <div class="col-lg-7 col-md-6 col-12 p-0">
                        <div class="search-bar-pill">
                            <form action="<?php echo base_url('product'); ?>" method="get">
                                <div class="category-dropdown">
                                    <select name="category" class="category-select">
                                        <option value="">All Categories</option>
                                        <?php if (isset($catdata)):
                                            foreach ($catdata as $cate): ?>
                                                <option value="<?php echo $cate['CategoryID']; ?>">
                                                    <?php echo $cate['CategoryName']; ?></option>
                                            <?php endforeach; endif; ?>
                                    </select>
                                </div>
                                <input name="search" id="serch_cat"
                                    placeholder="Search for furniture, decor and more..." type="text"
                                    autocomplete="off">
                                <button type="submit" class="search-btn-brown"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-12 p-0">
                        <div class="right-bar">
                            <!-- Wishlist -->
                            <div class="sinlge-bar">
                                <?php if (!empty($usertype)): ?>
                                    <a href="<?php echo base_url('wishlist'); ?>"><i class="fa-regular fa-heart"></i>
                                        Wishlist</a>
                                <?php else: ?>
                                    <a href="#" data-toggle="modal" data-target="#exampleModal"><i
                                            class="fa-regular fa-heart"></i> Wishlist</a>
                                <?php endif; ?>
                            </div>

                            <!-- Cart -->
                            <div class="sinlge-bar shopping">
                                <a href="<?php echo base_url('cart'); ?>" class="single-icon">
                                    <i class="fa-solid fa-bag-shopping"></i> Cart
                                    <?php
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
                                                            class="amount"><?php echo $all_setting_data['currency']; ?><?php echo $item['unit_price']; ?></span>
                                                    </p>
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
                                                <span
                                                    class="total-amount"><?php echo $all_setting_data['currency']; ?><?php echo $CartTotals->subtotal; ?></span>
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
            <div class="container-fluid" style="padding: 0px 30px;">
                <div class="cat-nav-head">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-12">
                            <div class="all-category-v2">
                                <h3 class="cat-heading p-0"><i class="fa fa-bars"></i>Categories <i
                                        class="fa fa-angle-down"></i></h3>
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
                        <div class="col-lg-8 col-12">
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
                        <div class="col-lg-2 col-12">
                            <div class="delivery-info">
                                <i class="fa-solid fa-location-dot"></i>
                                <div class="delivery-text">
                                    <span class="delivery-label">Deliver to</span>
                                    <span class="delivery-location">Chicago, USA</span>
                                </div>
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