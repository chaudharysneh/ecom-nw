<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('login', 'Home::login', ["filter" => "noauth"]);
$routes->get('logout', 'Home::logout');
$routes->post('customer_login', 'Home::customer_login');
$routes->get('change_password', 'Home::change_password');
$routes->post('changed_password', "Home::changed_password", ["filter" => "auth"]);
$routes->post('update_account_form_data', "Home::update_account_form_data");
$routes->get('my_profile', 'Home::my_profile', ["filter" => "auth"]);
$routes->get('about_us', 'Home::about_us');
$routes->get('all_faqs', 'Home::all_faqs');
$routes->get('all_terms_conditions', 'Home::all_terms_conditions');
$routes->get('privacy-policy', 'Home::privacy_policy');
$routes->get('forget_password', 'Home::forget_password');
$routes->post('send_forget_password_email', 'Home::send_forget_password_email');
$routes->get('reset_password/(:any)/(:any)', 'Home::reset_password/$1/$2');
$routes->post('change_reset_password', 'Home::change_reset_password');
$routes->post('send_email_data', 'Home::send_email_data');


$routes->get('return-refund-policy', 'Home::return_refund_policy');



$routes->get('blog/(:any)/(:any)/(:any)/(:any)', 'Blog::index/$1/$2/$3/$4');

$routes->get('all_blog', 'Blog::all_blog');
$routes->get('all_blog/(:any)?/(:any)?', 'Blog::all_blog/$1/$2');

$routes->get('blog', 'Blog::all_blog');
$routes->get('blog/(:any)?/(:any)?', 'Blog::all_blog/$1/$2');



$routes->post('send_comment_data', 'Blog::send_comment_data');

$routes->get('blogs/(:any)/(:any)', 'Blog::get_blog/$1/$2');
$routes->get('blogs/(:any)/(:any)/(:any)?/(:any)?', 'Blog::get_blog/$1/$2/$3/$4');
// $routes->get('blogs/(:any)/(:any)', 'Blog::get_blog_dtt/$1/$2');

// $routes->get('get_blog_dtt/(:any)', 'Blog::get_blog_dtt/$1');
$routes->get('get_tag_dtt/(:any)', 'Blog::get_tag_dtt/$1');



$routes->post('cancel_order', 'Home::cancel_order');


$routes->get('/invoice/(:num)', 'Orders::invoice/$1');
$routes->get('/invoice/(:num)', 'Product::invoice/$1');

$routes->get('register', 'Home::register');
$routes->get('my_account', 'Home::my_account', ["filter" => "auth"]);
$routes->get('product', 'Product::index');

// new arrivals --------------------
$routes->get('new-arrivals', 'Product::newProducts');
// ==================


$routes->get('single_product/(:num)', 'Product::single_product/$1');
$routes->get('(:any)/product_detail/(:any)', 'Product::product_detail/$1/$2');
$routes->get('templates/(:num)', 'Product::templates/$1');
$routes->get('category', 'Category::index');
$routes->get('category/(:any)', 'Category::show_category_data/$1');
$routes->get('(:any)/subcategory/(:any)', 'Category::show_subcategory_data/$1/$2');

$routes->get('contact', 'Contact::index');
$routes->post('savecontact', 'Contact::savecontact');
$routes->post('fetchproduct', 'Home::fetchproduct');
$routes->get('cart', 'Cart::index');
$routes->post('addcart', 'Cart::addcart');

$routes->post('getvariationsprice', 'Product::getvariationsprice');



//K2
$routes->post('addToCart', 'Cart::addToCart');
$routes->post('removeFromCart', 'Cart::removeFromCart');
$routes->post('applyCoupon', 'Cart::applyCoupon');
$routes->post('removeCoupon', 'Cart::removeCoupon');
$routes->post('updatecart', 'Cart::updateCart');
$routes->get('checkout', 'Checkout::index');
$routes->post('checkout/stripe_payment', 'Checkout::stripe_payment');


$routes->get('stripe_order_success', 'Checkout::stripe_order_success');
$routes->get('cod_order_success', 'Checkout::cod_order_success');

$routes->post('create-order', 'Checkout::createOrder');
$routes->post('verify-payment', 'Checkout::verifyPayment');


$routes->get('checkout/razorpay_payment', 'Checkout::razorpay_payment');
$routes->post('checkout/razorpay_payment', 'Checkout::razorpay_payment');
$routes->get('checkout/razorpay_payment_success', 'Checkout::razorpay_payment_success');
$routes->get('checkout/razorpay_payment_faild', 'Checkout::razorpay_payment_faild');

$routes->post('getstats', 'Checkout::get_state');
$routes->post('placeorder', 'Checkout::placeOrder');
$routes->get('payment_success(:any)', 'Checkout::payment_success$1');
$routes->get('payment_cancel', 'Checkout::payment_cancel');
$routes->get('order_success', 'Checkout::order_success');
$routes->post('checkout_login', 'Checkout::checkout_login');
$routes->post('get_address_data', 'Checkout::get_address_data');
$routes->post('for_update_tax', 'Checkout::for_update_tax');
$routes->post('for_get_shipping_data', 'Checkout::for_get_shipping_data');


$routes->post('createPayment', 'Checkout::createPayment');
$routes->get('paypal/executePayment', 'Checkout::executePayment');
$routes->get('paypal/cancelPayment', 'Checkout::cancelPayment');
$routes->get('checkout/paypal_payment_success', 'Checkout::paypal_payment_success');


//$routes->get('checkout', 'Cart::checkout');

$routes->get('orders', 'Orders::index', ["filter" => "auth"]);
$routes->get('customer_order/(:any)', 'Orders::customer_order/$1');
$routes->get('order_detail/(:any)', 'Orders::order_detail/$1');
$routes->get('mail', 'Home::mail');
$routes->post('getcountrystate', 'Home::getcountrystate');
$routes->post('getstatecity', 'Home::getstatecity');
$routes->post('save_register', 'Home::save_register');

$routes->post('filter_data', 'Product::filter_prd_data');
$routes->post('filter_price', 'Product::filter_price');

$routes->get('product-design-customize/(:num)', 'Product::product_design_customize/$1');
$routes->post('upload-template-image', 'Templates::uploadTemplateImage');
$routes->post('delete-template', 'Templates::deleteTemplate');

$routes->get('save-edited-image', 'Product::save_edited_image');
$routes->post('save-edited-image', 'Product::save_edited_image');

$routes->get('wishlist', 'Product::wishlist', ["filter" => "auth"]);
$routes->post('add_to_wishlist', 'Product::add_to_wishlist');
$routes->post('single_product/add_to_wishlist', 'Product::add_to_wishlist');
$routes->post('delete_wishlist', 'Product::delete_wishlist');
$routes->post('single_product/delete_wishlist', 'Product::delete_wishlist');
$routes->post('show_variation', 'Product::show_variation');
$routes->post('show_variation1', 'Product::show_variation1');
$routes->post('show_variation2', 'Product::show_variation2');



// Addresses 

$routes->get('adresses', 'Address::index', ["filter" => "auth"]);
$routes->get('add_address', 'Address::add_address', ["filter" => "auth"]);
$routes->post('save_address_form_data', "Address::save_address_form_data");
$routes->get('edit_address/(:any)', 'Address::edit_address/$1');
$routes->post('update_address_form_data', "Address::update_address_form_data");
$routes->post('delete_address', 'Address::delete_address', ["filter" => "auth"]);





//API
$routes->group('api', ['namespace' => 'App\Controllers\api'], function ($routes) {

    $routes->get('createPayment/(:any)/(:any)', 'Product::createPayment/$1/$2');
    $routes->get('success/(:any)', 'Product::success/$1');
    $routes->get('reset_password_app/(:any)/(:num)', 'User::reset_password_app/$1/$2');
    $routes->post('change_reset_password_app', 'User::change_reset_password_app');



});

$routes->group('api', ['namespace' => 'App\Controllers\api', 'filter' => 'ApiAuth'], function ($routes) {
    //User Controller 
    $routes->post('SignUp', 'User::SignUp');
    $routes->post('LogIn', 'User::LogIn');
    $routes->post('forgetPassword', 'User::ForgetPassword'); //Api with Errors 
    $routes->post('userProfile', 'User::userProfile');
    $routes->post('updateProfile', 'User::updateProfile');
    $routes->post('userOrders', 'User::userOrders'); //Half Completes

    $routes->post('change_client_password', 'User::change_client_password');

    $routes->post('forgot_password_app', 'User::forgot_password_app');


    //Home Controller
    $routes->get('homeFeeds', 'Home::homeFeeds');
    //required cities and contries
    $routes->post('cities', 'Home::cities');
    $routes->post('states', 'Home::states');
    $routes->get('countries', 'Home::countries');

    $routes->get('allCategory', 'Category::allCategory');
    $routes->get('category', 'Category::category');
    $routes->Post('subCategory', 'Category::subCategory');
    $routes->Post('category_wice_product', 'Category::category_wice_product');
    $routes->Post('subcategory_wice_product', 'Category::subcategory_wice_product');

    $routes->get('allProducts', 'Product::allProducts');
    $routes->Post('productDetails', 'Product::productDetails');
    $routes->Post('searchProducts', 'Product::searchProducts');
    $routes->Post('addToWishList', 'Product::addToWishList');
    $routes->Post('removeFromWishList', 'Product::removeFromWishList');
    $routes->Post('userWishList', 'Product::userWishList');

    $routes->Post('addtocart', 'Product::addtocart');
    $routes->Post('view_cart_list', 'Product::view_cart_list');
    $routes->Post('remove_coupen', 'Product::remove_coupen');
    $routes->Post('view_cart_list_test', 'Product::view_cart_list_test');
    $routes->Post('checkout', 'Product::checkout');
    $routes->Post('my_orders', 'Product::my_orders');
    $routes->Post('shipped_myorders', 'Product::shipped_myorders');
    $routes->Post('processing_myorders', 'Product::processing_myorders');
    $routes->Post('order_details', 'Product::order_details');
    $routes->Post('paypal', 'Product::paypal');
    $routes->get('responsePayment', 'Product::responsePayment');
    $routes->Post('searchproduct_by_subcategory', 'Product::searchproduct_by_subcategory');
    $routes->Post('remove_cart', 'Product::remove_cart');
    $routes->Post('increment_quantity', 'Product::increment_quantity');
    $routes->Post('decrement_quantity', 'Product::decrement_quantity');
    $routes->Post('product_details', 'Product::product_details');
    $routes->Post('product_color', 'Product::product_color');
    $routes->Post('product_size', 'Product::product_size');
    $routes->Post('product_material', 'Product::product_material');
    $routes->Post('product_data_get_from_color', 'Product::product_data_get_from_color');
    $routes->Post('product_data_match_with_coler_size', 'Product::product_data_match_with_coler_size');
    $routes->Post('price_try', 'Product::price_try');
    $routes->Post('checkout_details', 'Product::checkout_details');
    $routes->Post('change_shipping_address', 'Product::change_shipping_address');
    $routes->Post('sales_price_product', 'Product::sales_price_product');
    $routes->Post('all_sales_list_product', 'Product::all_sales_list_product');
    $routes->Post('best_selling_product', 'Product::best_selling_product');
    // ---- NEW ARRIVALS ----
    $routes->Post('new_arrivals', 'Product::new_arrivals');
    $routes->Post('search_new_arrivals', 'Product::search_new_arrivals');
    
    $routes->Post('trending_items', 'Product::trending_items');
    $routes->Post('search_trending_items', 'Product::search_trending_items');
    // ---------------
    $routes->Post('user_all_shipping_address', 'Product::user_all_shipping_address');
    $routes->Post('user_select_shipping_address', 'Product::user_select_shipping_address');
    $routes->Post('edit_shipping_address', 'Product::edit_shipping_address');
    $routes->Post('delete_shipping_address', 'Product::delete_shipping_address');
    $routes->Post('test_product_color', 'Product::test_product_color');
    $routes->Post('test_product_size', 'Product::test_product_size');
    $routes->Post('search_best_selling_product', 'Product::search_best_selling_product');
    $routes->Post('search_all_sales_list_product', 'Product::search_all_sales_list_product');
    $routes->Post('complete_myorders', 'Product::complete_myorders');
    $routes->Post('pending_myorders', 'Product::pending_myorders');
    $routes->Post('cancelled_myorders', 'Product::cancelled_myorders');
    $routes->Post('after_login_addtocart', 'Product::after_login_addtocart');
    $routes->Post('success_paypal', 'Product::success_paypal');
    $routes->Post('add_review', 'Product::add_review');
    $routes->Post('view_Review', 'Product::view_Review');
    $routes->Post('delete_review', 'Product::delete_review');
    $routes->Post('cart_count', 'Product::cart_count');
    $routes->post('cancel_order', 'Product::cancel_order');
    $routes->post('filter_a_to_z', 'Product::filter_a_to_z');
    $routes->post('filter_low_to_high', 'Product::filter_low_to_high');
    $routes->post('sendOrderConfirmationEmail', 'Product::sendOrderConfirmationEmail');

    $routes->get('paymentgateway', 'Home::Paymentgateway');
    $routes->post('stripe_payment', 'Home::stripe_payment');
    $routes->post('razorpay_payment', 'Home::razorpay_payment');
    $routes->post('test', 'Home::test');
    $routes->Post('simple_product_details', 'Product::simple_product_details');



    $routes->post("chatList", 'ChatController::index');
    $routes->get("fullChat/(:num)/(:num)/(:num)", 'ChatController::fullChat/$1/$2/$3');
    $routes->get('readNewMsg/(:num)/(:num)/(:num)', 'ChatController::readNewMsg/$1/$2/$3');
    $routes->post("sendMessage/(:num)/(:num)/(:num)", 'ChatController::sendMessage/$1/$2/$3');
    $routes->post("searchChat", 'ChatController::searchChat');

    $routes->post("get_blog", 'blogs::get_blog');
    $routes->post("get_recent_blog", 'blogs::get_recent_blog');
    $routes->post("single_blog", 'blogs::single_blog');
    $routes->post("send_comment", 'blogs::send_comment');
    $routes->post("coupons", 'blogs::coupons');

    $routes->get('razorpay_callback', 'Home::razorpay_callback');
    $routes->post('razorpay_callback', 'Home::razorpay_callback');



});
$routes->get('design/(:any)/(:any)?', 'Home::design/$1/$2');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
