<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------\
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


$routes->get('/', 'Home::index',["filter" => "auth"]);
$routes->get('/login', 'Home::signin',["filter" => "noauth"]);
$routes->post('/admin-login',"Home::admin_login");
$routes->get('/logout',"Home::logout");
$routes->get('change-password', 'Home::change_password',["filter" => "auth"]);
$routes->post('/changepwd',"Home::changepwd",["filter" => "auth"]);
$routes->get('/profile',"Home::profile",["filter" => "auth"]);
$routes->get('/edit-profile',"Home::edit_profile",["filter" => "auth"]);
$routes->post('/update-profile',"Home::update_profile",["filter" => "auth"]);
$routes->post('/get-state-by-country',"Home::get_state_by_country",["filter" => "auth"]);
$routes->post('/get_chart_data',"Home::get_chart_data",["filter" => "auth"]);
$routes->get('/all_email_smtp',"Home::all_email_smtp",["filter" => "auth"]);
$routes->post('/update_email_smtp',"Home::update_email_smtp",["filter" => "auth"]);




// Customers
$routes->get('/all-customers', 'Customers::index',["filter" => "auth"]);
$routes->get('/add-customers', 'Customers::add_customers',["filter" => "auth"]);
$routes->get('/customer-details', 'Customers::view_customer_details',["filter" => "auth"]);
$routes->get('/edit-customer-details/(:num)', 'Customers::edit_customer_details/$1',["filter" => "auth"]);
$routes->post('getStates', 'Customers::getStates');
$routes->post('getCities', 'Customers::getCities');


$routes->post('/get_state_from_country', 'Customers::get_state_from_country',["filter" => "auth"]);
$routes->post('/get_city_from_state', 'Customers::get_city_from_state',["filter" => "auth"]);
$routes->post('/save_customers', 'Customers::save_customers',["filter" => "auth"]);
$routes->post('/edit-customer-details/edit_customers', 'Customers::edit_customers',["filter" => "auth"]);
$routes->post('/del_customer', 'Customers::del_customer',["filter" => "auth"]);
$routes->post('/all_taxesget_state_from_country', 'Customers::get_state_from_country',["filter" => "auth"]);
$routes->post('/all_taxesget_city_from_state', 'Customers::get_city_from_state',["filter" => "auth"]);


$routes->get('/view_customer_details/(:num)', 'Customers::view_customer_details/$1',["filter" => "auth"]);  


// Products

$routes->get('/all-products', 'Products::index',["filter" => "auth"]);


$routes->get('/add-products', 'Products::add_products',["filter" => "auth"]);
$routes->post('/save-product', 'Products::save_product',["filter" => "auth"]);
$routes->get('/product-details', 'Products::view_product_details',["filter" => "auth"]);
$routes->get('/edit-product-details/(:num)', 'Products::edit_product_details/$1',["filter" => "auth"]);
$routes->post('/edit-product-details/update_product', 'Products::update_product_details',["filter" => "auth"]);
$routes->get('/all-categories', 'Products::all_categories',["filter" => "auth"]);
$routes->get('/all-subcategories', 'Products::all_subcategories',["filter" => "auth"]);
$routes->post('/search_product','Products::search_product',["filter" => "auth"]);
$routes->get('/all_products', 'Products::all_products',["filter" => "auth"]);


$routes->get('/product-details/(:num)', 'Products::view_product_details/$1',["filter" => "auth"]); 
$routes->post('/del_product', 'Products::del_product',["filter" => "auth"]);

$routes->get('/add-category', 'Products::add_category',["filter" => "auth"]);
$routes->post('/save_catagories', 'Products::save_catagories',["filter" => "auth"]);
$routes->get('/edit-category/(:num)', 'Products::edit_category/$1',["filter" => "auth"]);
$routes->post('/edit-category/update_catagories', 'Products::update_catagories',["filter" => "auth"]);
$routes->post('delete_catagory', 'Products::delete_catagory',["filter" => "auth"]);


$routes->get('/add-subcategory', 'Products::add_subcategory',["filter" => "auth"]);
$routes->post('/save_sub_catagories', 'Products::save_sub_catagories',["filter" => "auth"]);
$routes->get('/edit-sub-category/(:num)', 'Products::edit_sub_category/$1',["filter" => "auth"]);
$routes->post('/edit-sub-category/update_sub_catagories', 'Products::update_sub_catagories',["filter" => "auth"]);
$routes->post('delete_subcategory', 'Products::delete_subcategory',["filter" => "auth"]);

$routes->post('/get-sub-category', 'Products::get_sub_category',["filter" => "auth"]);
$routes->post('/edit-product-details/get-sub-category', 'Products::get_sub_category',["filter" => "auth"]);
$routes->post('/get-variations', 'Products::get_variations',["filter" => "auth"]);
$routes->post('/edit-product-details/get-variations', 'Products::get_variations',["filter" => "auth"]);



$routes->get('/all-options', 'Products::all_options',["filter" => "auth"]);
$routes->get('/add-options', 'Products::add_options',["filter" => "auth"]);
$routes->post('/save_options', 'Products::save_options',["filter" => "auth"]);  
$routes->get('/edit-options/(:num)', 'Products::edit_options/$1',["filter" => "auth"]);
$routes->post('/edit-options/update_options', 'Products::update_options',["filter" => "auth"]);
$routes->post('delete_options_type', 'Products::delete_options_type',["filter" => "auth"]);


$routes->get('/all_options_value', 'Products::all_options_value',["filter" => "auth"]);
$routes->get('/add-options-value', 'Products::add_options_value',["filter" => "auth"]);
$routes->post('/save_option_value', 'Products::save_option_value',["filter" => "auth"]); 
$routes->get('/edit_option_value/(:num)', 'Products::edit_option_value/$1',["filter" => "auth"]);
$routes->post('/edit_option_value/update_option_value', 'Products::update_option_value',["filter" => "auth"]);
$routes->post('delete_option_value', 'Products::delete_option_value',["filter" => "auth"]);
$routes->post('edit_option_value/delete_more_option_value', 'Products::delete_more_option_value',["filter" => "auth"]);


$routes->get('/all_review', 'Products::all_review',["filter" => "auth"]);
$routes->get('/all_settings', 'Products::all_settings',["filter" => "auth"]);
$routes->post('save_setting_data', 'Products::save_setting_data',["filter" => "auth"]);
$routes->post('update_setting_data', 'Products::update_setting_data',["filter" => "auth"]);
$routes->post('update_link_setting_data', 'Products::update_link_setting_data',["filter" => "auth"]);


$routes->post('/delete_review', 'Products::delete_review',["filter" => "auth"]);


$routes->get('/all-tags', 'Products::all_tags',["filter" => "auth"]);
$routes->get('/add-tags', 'Products::add_tags',["filter" => "auth"]);
$routes->post('/save_tags', 'Products::save_tags',["filter" => "auth"]);
$routes->get('/edit-tags/(:num)', 'Products::edit_tags/$1',["filter" => "auth"]);
$routes->post('/edit-tags/update_tags', 'Products::update_tags',["filter" => "auth"]);
$routes->post('delete_tags_type', 'Products::delete_tags_type',["filter" => "auth"]);

// brand
$routes->get('/all-brands', 'Customers::all_brands',["filter" => "auth"]);
$routes->get('/add-brands', 'Customers::add_brands',["filter" => "auth"]);
$routes->post('/save_brands', 'Customers::save_brands',["filter" => "auth"]);
$routes->get('/edit-brands/(:num)', 'Customers::edit_brands/$1',["filter" => "auth"]);
$routes->post('/edit-brands/update_brands', 'Customers::update_brands',["filter" => "auth"]);
$routes->post('delete_brands_type', 'Customers::delete_brands_type',["filter" => "auth"]);
$routes->post('search_filter_customer_details_data', 'Customers::search_filter_customer_details_data',["filter" => "auth"]);


//orders
$routes->get('/invoice/(:num)', 'Orders::invoice/$1');
$routes->get('/all-orders', 'Orders::index',["filter" => "auth"]);
$routes->get('/add-order', 'Orders::add_order',["filter" => "auth"]);
$routes->post('/add-save-order', 'Orders::save_order',["filter" => "auth"]);
$routes->post('getUserDetails', 'Orders::getUserDetails', ["filter" => "auth"]);
$routes->get('/view_order_details/(:num)', 'Orders::view_order_details/$1',["filter" => "auth"]);
$routes->get('/all_shipping', 'Orders::all_shipping',["filter" => "auth"]);
$routes->get('/add_shipping', 'Orders::add_shipping',["filter" => "auth"]);
$routes->post('/save_shipping','Orders::save_shipping',["filter" => "auth"]);
$routes->get('/edit_shipping/(:num)', 'Orders::edit_shipping/$1',["filter" => "auth"]);
$routes->post('/edit_shipping/update_shipping', 'Orders::update_shipping',["filter" => "auth"]);
$routes->post('delete_shipping', 'Orders::delete_shipping',["filter" => "auth"]);


$routes->get('shipping_getStatus', 'Orders::shipping_getStatus',["filter" => "auth"]);
$routes->post('shipping_toggleStatus', 'Orders::shipping_toggleStatus',["filter" => "auth"]);




$routes->get('/all_methods', 'Orders::all_methods',["filter" => "auth"]);
$routes->get('/add_shipping_methods', 'Orders::add_shipping_methods',["filter" => "auth"]);
$routes->post('/save_shipping_methods','Orders::save_shipping_methods',["filter" => "auth"]);
$routes->get('/edit_shipping_methods/(:num)', 'Orders::edit_shipping_methods/$1',["filter" => "auth"]);
$routes->post('/edit_shipping_methods/update_shipping_methods', 'Orders::update_shipping_methods',["filter" => "auth"]);
$routes->post('delete_shipping_methods', 'Orders::delete_shipping_methods',["filter" => "auth"]);





$routes->post('/rmv_order','Orders::rmv_order',["filter" => "auth"]);
$routes->post('/show_comment','Orders::show_comment',["filter" => "auth"]);
$routes->post('/savecomments','Orders::savecomments',["filter" => "auth"]);
$routes->get('/export-order','Orders::export_order',["filter" => "auth"]);
$routes->post('export_data','Orders::export_data',["filter" => "auth"]);
$routes->post('search_order_filter_data', 'Orders::search_order_filter_data',["filter" => "auth"]);
$routes->post('upd_order','Orders::upd_order',["filter" => "auth"]);
$routes->post('upload_template_dt','Orders::upload_template_dt',["filter" => "auth"]);

$routes->get('all_chat','Orders::all_chat',["filter" => "auth"]);
$routes->post('sendMessage','Orders::sendMessage',["filter" => "auth"]);
$routes->post('fetchChatData','Orders::fetchChatData',["filter" => "auth"]);
$routes->get('view_chat/(:num)', 'Orders::view_chat/$1', ["filter" => "auth"]);
$routes->get('get-receiver-user/(:num)', 'Orders::getReceiverUserId/$1');



// coupons..
$routes->get('/all-coupons', 'Coupon::index',["filter" => "auth"]);
$routes->get('/add-coupons', 'Coupon::add_coupons',["filter" => "auth"]);
$routes->post('/save_coupons', 'Coupon::save_coupons',["filter" => "auth"]);
$routes->post('search_data', 'Coupon::search_data',["filter" => "auth"]);
$routes->get('/edit-coupons/(:num)', 'Coupon::edit_coupons/$1',["filter" => "auth"]);
$routes->post('/edit-coupons/update_coupons', 'Coupon::update_coupons',["filter" => "auth"]);
$routes->post('del_coupons', 'Coupon::del_coupons',["filter" => "auth"]);
$routes->post('search_filter_data', 'Coupon::search_filter_data',["filter" => "auth"]);



//FAQs....
$routes->get('/all-faqs', 'Orders::all_faqs',["filter" => "auth"]);
$routes->get('/add-faqs', 'Orders::add_faqs',["filter" => "auth"]);
$routes->post('/save_faqs', 'Orders::save_faqs',["filter" => "auth"]);
$routes->get('/edit-faqs/(:num)', 'Orders::edit_faqs/$1',["filter" => "auth"]);
$routes->post('/edit-faqs/update_faqs', 'Orders::update_faqs',["filter" => "auth"]);
$routes->post('delete_faqs_type', 'Orders::delete_faqs_type',["filter" => "auth"]);

//seo.......
$routes->get('/all-testimonial', 'Orders::all_testimonial',["filter" => "auth"]);
$routes->get('/add-testimonial', 'Orders::add_testimonial',["filter" => "auth"]);
$routes->post('/save_testimonial', 'Orders::save_testimonial',["filter" => "auth"]);
$routes->get('/edit-testimonial/(:num)', 'Orders::edit_testimonial/$1',["filter" => "auth"]);
$routes->post('/edit-testimonial/update_testimonial', 'Orders::update_testimonial',["filter" => "auth"]);
$routes->post('del_testimonial', 'Orders::del_testimonial',["filter" => "auth"]);

// enquiry
$routes->get('/all_manage_enquries', 'Orders::all_manage_enquries',["filter" => "auth"]);
$routes->get('/view_detail_enquiry/(:num)', 'Orders::view_detail_enquiry/$1',["filter" => "auth"]);
$routes->post('del_enquiry', 'Orders::del_enquiry',["filter" => "auth"]);


//payments

$routes->get('/all_payment_getway', 'Payment::index',["filter" => "auth"]);
$routes->get('/all_payment_getway1', 'Payment::index1',["filter" => "auth"]);
$routes->post('/updatePaymentGetway', 'Payment::updatePaymentGetway',["filter" => "auth"]);

$routes->get('/all_transactions', 'Payment::all_transactions',["filter" => "auth"]);
$routes->get('/all_taxes', 'Payment::all_taxes',["filter" => "auth"]);

$routes->post('/get_table_data', 'Payment::get_table_data',["filter" => "auth"]);

// $routes->get('/add_tax/(:num)', 'Payment::add_tax/$1',["filter" => "auth"]);
$routes->get('/add_tax', 'Payment::add_tax',["filter" => "auth"]);
$routes->post('/save_taxes', 'Payment::save_taxes',["filter" => "auth"]);
$routes->get('/edit-taxes/(:num)', 'Payment::edit_taxes/$1',["filter" => "auth"]);
// $routes->post('/update_taxes', 'Payment::update_taxes',["filter" => "auth"]);
$routes->post('edit-taxes/update_taxes', 'Payment::update_taxes',["filter" => "auth"]);
$routes->post('del_taxes', 'Payment::del_taxes',["filter" => "auth"]);

$routes->get('tax_getStatus', 'Payment::tax_getStatus',["filter" => "auth"]);
$routes->post('Tax_toggleStatus', 'Payment::Tax_toggleStatus',["filter" => "auth"]);




// $routes->get('/all_taxe_class', 'Payment::all_taxe_class',["filter" => "auth"]);
// $routes->get('/add_tax_class', 'Payment::add_tax_class',["filter" => "auth"]);
// $routes->post('/save_taxes_class', 'Payment::save_taxes_class',["filter" => "auth"]);
// $routes->get('/edit_tax_class/(:num)', 'Payment::edit_tax_class/$1',["filter" => "auth"]);
// $routes->post('/update_taxes', 'Payment::update_taxes',["filter" => "auth"]);
// $routes->post('/edit_tax_class/update_taxes_class', 'Payment::update_taxes_class',["filter" => "auth"]);

$routes->post('del_taxes_class', 'Payment::del_taxes_class',["filter" => "auth"]);

$routes->post('/get_state_from_country', 'Payment::get_state_from_country',["filter" => "auth"]);
$routes->post('/get_city_from_state', 'Payment::get_city_from_state',["filter" => "auth"]);
$routes->post('search_trans_filter_data', 'Payment::search_trans_filter_data',["filter" => "auth"]);


// $routes->get('/all_transactions','Paymentmodel::all_transactions');


$routes->get('/all_dicsounts_coupons', 'Payment::all_dicsounts_coupons',["filter" => "auth"]);
$routes->get('/create_discounts_and_coupons', 'Payment::create_discounts_and_coupons',["filter" => "auth"]);
$routes->get('/all_attributes', 'Payment::all_attributes',["filter" => "auth"]);
$routes->get('/all_cms', 'Payment::all_cms',["filter" => "auth"]);
$routes->get('/add_cms', 'Payment::add_cms',["filter" => "auth"]);
// $routes->post('/save_cms', 'Payment::save_cms',["filter" => "auth"]);
// $routes->post('/save_cms', function(){ echo "3";});
$routes->post('/save_cms', 'Payment::save_cms',["filter" => "auth"]);

// $routes->get('/save_data/(:any)', 'Payment::save_cms/$1',["filter" => "auth"]);
$routes->get('/view_cms/(:num)', 'Payment::view_cms/$1',["filter" => "auth"]);
$routes->get('/edit_cms/(:num)', 'Payment::edit_cms/$1',["filter" => "auth"]);
$routes->post('/edit_cms/update_cms', 'CMS::update_cms',["filter" => "auth"]);
$routes->post('/update_cms_status', 'CMS::update_cms_status',["filter" => "auth"]);
$routes->post('/upload_image', 'Payment::upload_image');

$routes->post('/cms/upload_image', 'CMS::upload_image');
$routes->post('cms/create', 'CMS::create',["filter" => "auth"]);

$routes->post('/delete_cms', 'Payment::delete_cms',["filter" => "auth"]);


$routes->get('/all_manage_enquries', 'Payment::all_manage_enquries',["filter" => "auth"]);
$routes->get('/all_banners', 'Payment::all_banners',["filter" => "auth"]);
$routes->get('/add_banners', 'Payment::add_banners',["filter" => "auth"]);
$routes->post('save_banners', 'Payment::save_banners',["filter" => "auth"]);
$routes->get('/edit_banners/(:num)', 'Payment::edit_banners/$1',["filter" => "auth"]);

$routes->post('/edit_banners/update_banners', 'Payment::update_banners',["filter" => "auth"]);
$routes->post('del_banners', 'Payment::del_banners',["filter" => "auth"]);




// Blog
$routes->get('/all_blog', 'Blog::all_blog',["filter" => "auth"]);
$routes->get('/add_blog', 'Blog::add_blog',["filter" => "auth"]);
$routes->post('save_blog', 'Blog::save_blog',["filter" => "auth"]);
$routes->get('/edit_blog/(:num)', 'Blog::edit_blog/$1',["filter" => "auth"]);
$routes->post('/edit_blog/update_blog', 'Blog::update_blog',["filter" => "auth"]);
$routes->post('del_blog', 'Blog::del_blog',["filter" => "auth"]);

//locations

$routes->get('/all_country', 'Country::all_country',["filter" => "auth"]);
$routes->get('/add_country', 'Country::add_country',["filter" => "auth"]);
$routes->post('save_country', 'Country::save_country',["filter" => "auth"]);
$routes->get('/edit_country/(:num)', 'Country::edit_country/$1',["filter" => "auth"]);
$routes->post('/edit_country/update_country', 'Country::update_country',["filter" => "auth"]);
$routes->post('del_country', 'Country::del_country',["filter" => "auth"]);

$routes->get('/all_state', 'State::all_state',["filter" => "auth"]);
$routes->get('/add_state', 'State::add_state',["filter" => "auth"]);
$routes->post('save_state', 'State::save_state',["filter" => "auth"]);
$routes->get('/edit_state/(:num)', 'State::edit_state/$1',["filter" => "auth"]);
$routes->post('/edit_state/update_state', 'State::update_state',["filter" => "auth"]);
$routes->post('del_state', 'State::del_state',["filter" => "auth"]);

$routes->get('/all_city', 'City::all_city',["filter" => "auth"]);
$routes->get('/add_city', 'City::add_city',["filter" => "auth"]);
$routes->post('save_city', 'City::save_city',["filter" => "auth"]);
$routes->get('/edit_city/(:num)', 'City::edit_city/$1',["filter" => "auth"]);
$routes->post('/edit_city/update_city', 'City::update_city',["filter" => "auth"]);
$routes->post('del_city', 'City::del_city',["filter" => "auth"]);

############################### Notification #####################################

$routes->get('/fetch_notifications', 'NotificationController::index');
$routes->delete('/delete_notification/(:num)', 'NotificationController::deleteNotification/$1');
$routes->get('all-notifications', 'NotificationController::notification_page');




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
