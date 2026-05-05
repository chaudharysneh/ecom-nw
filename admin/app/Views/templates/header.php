<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/"
  data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Ecom Web App</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="<?php echo base_url('/public/assets/img/LightShortFabLogo.png'); ?>" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/vendor/css/core.css"
    class="template-customizer-core-css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/vendor/css/theme-default.css"
    class="template-customizer-theme-css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/css/demo.css" />

  <!-- Vendors CSS -->
  <link rel="stylesheet"
    href="<?php echo base_url(); ?>public/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <link rel="stylesheet" href="<?php echo base_url(); ?>public/assets/vendor/libs/apex-charts/apex-charts.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"/>

  <!-- Page CSS -->

  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
  <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <!-- Helpers -->
  <script src="<?php echo base_url(); ?>public/assets/vendor/js/helpers.js"></script>
  <!--<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js" crossorigin="anonymous"></script>


  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="<?php echo base_url(); ?>public/assets/js/config.js"></script>

  <style>
    .app-brand .app-brand-link img {
      margin-left: 1.1rem;
      width: 75%;
      height: auto;
    }

    .menu-inner li a.active {
      background-color: #f7941d;
      color: #fff !important;
      border-radius: 5px;
      padding: 13px 17px;
      text-decoration: none;
    }

    #head_head .navbar ul li.dropdown a.active {
      background-color: #f7941d;
      color: #fff !important;
      border-radius: 5px;
    }

    #head_head .dropdown-menu a.active {
      background-color: #f7941d;
      color: #fff !important;
    }

    .menu-inner li a.ccc {
      display: flex;
      flex-direction: row;
      align-items: center;
      justify-content: flex-start;
    }

    /*==========================*/


    #suggestion-list {
      list-style-type: none;
      max-height: 300px;
      overflow-y: auto;
      background-color: white;
      border-radius: 7px;
      position: absolute;
      z-index: 1000;
      width: 30%;
      display: none;
      top: 100%;
      left: 0;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);

    }

    #suggestion-list li {
      font-weight: 500;
      padding: 10px;
      cursor: pointer;
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }

    #suggestion-list li:hover {
      background-color: #e4e4e48a;
    }

    #suggestion-list li a {
      color: #333;
      text-decoration: none;
      display: block;
    }

    #suggestion-list li a:hover {
      text-decoration: none;
    }

    #suggestion-list::-webkit-scrollbar {
      width: 0px;
    }

    #suggestion-list::-webkit-scrollbar-thumb {
      background: #fff;
      border-radius: 20px;
    }

    #suggestion-list::-webkit-scrollbar-track {
      background: #fff;
      border-radius: 20px;
    }

    .menu-item a i {
      height: 20px;
      width: 15px;
    }
  </style>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      var currentPage = window.location.href;

      var navLinks = document.querySelectorAll('.menu-inner li a.ccc');
      // var navLinks = document.querySelectorAll('.navbar ul li a.ccc');
      // var dropdownItems = document.querySelectorAll('.dropdown-menu a');


      navLinks.forEach(function (link) {
        if (link.href === currentPage) {
          link.classList.add('active');
        }
      });

      // dropdownItems.forEach(function(dropdownLink) {
      //         if (dropdownLink.href === currentPage) {
      //             dropdownLink.closest('.dropdown').querySelector('.form-select').classList.add('active');
      //             dropdownLink.classList.add('active');
      //         }
      //     });
    });

  </script>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="<?php echo base_url(); ?>" class="app-brand-link">
            <!--<img src="<?php echo base_url(); ?>public/assets/img/811579-middle.png" style="width: 77%;">-->
            <img class="mt-2" src="<?php echo base_url('/public/assets/img/LightFabLogo.png'); ?>" />
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1 ">
          <!-- Dashboard -->
          <li class="menu-item">
            <a href="<?php echo base_url(); ?>" class="menu-link ccc ">
              <i class="menu-icon tf-icons bx bx-home-circle"></i>
              <div data-i18n="Analytics">Dashboard</div>
            </a>
          </li>

          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle ccc">
              <i class="fa fa-users header-icon"></i>
              <div data-i18n="Account Settings">&nbsp;Customers</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="<?php echo base_url(); ?>all-customers" class="menu-link">
                  <div data-i18n="Account">All Customers</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="<?php echo base_url(); ?>add-customers" class="menu-link">
                  <div data-i18n="Account">Add Customers</div>
                </a>
              </li>
            </ul>
          </li>


          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle ccc">
              <i class="fa fa-shopping-bag header-icon"></i>
              <div data-i18n="Layouts">&nbsp;Products</div>
            </a>

            <ul class="menu-sub">
              <li class="menu-item">
                <a href="<?php echo base_url(); ?>all-products" class="menu-link">
                  <div data-i18n="Without menu">All Products</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="<?php echo base_url(); ?>add-products" class="menu-link">
                  <div data-i18n="Without menu">Add Products</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="<?php echo base_url(); ?>all-categories" class="menu-link">
                  <div data-i18n="Without menu">Categories</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="<?php echo base_url(); ?>all-subcategories" class="menu-link">
                  <div data-i18n="Without menu">Sub Categories</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="<?php echo base_url(); ?>all-options" class="menu-link">
                  <div data-i18n="Without menu">Options </div>
                </a>
              </li>
              <li class="menu-item">
                <a href="<?php echo base_url(); ?>all_options_value" class="menu-link">
                  <div data-i18n="Without menu">Options Values</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="<?php echo base_url(); ?>all-tags" class="menu-link">
                  <div data-i18n="Without menu">Tags</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="<?php echo base_url(); ?>all-brands" class="menu-link">
                  <div data-i18n="Without menu">Brands</div>
                </a>
              </li>


            </ul>
          </li>

          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle ccc">
              <i class="fa fa-shopping-cart header-icon" aria-hidden="true"></i>
              <div data-i18n="Layouts">&nbsp;Orders</div>
            </a>

            <ul class="menu-sub">
              <li class="menu-item">
                <a href="<?php echo base_url(); ?>all-orders" class="menu-link">
                  <div data-i18n="Without menu">All Orders</div>
                </a>
              </li>

              <li class="menu-item">
                <a href="<?php echo base_url(); ?>export-order" class="menu-link">
                  <div data-i18n="Without menu">Export Orders</div>
                </a>
              </li>
            </ul>
          </li>

          <li class="menu-item">
            <a href="<?php echo base_url(); ?>all_transactions" class="menu-link ccc">
              <i class="fa fa-handshake header-icon" aria-hidden="true"></i>
              <div data-i18n="Support">Transactions</div>
            </a>
          </li>

          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle ccc">

              <i class="fa fa-truck header-icon" aria-hidden="true"></i>
              <div data-i18n="Layouts">&nbsp;Shipping</div>
            </a>

            <ul class="menu-sub">
              <li class="menu-item">
                <a href="<?php echo base_url(); ?>all_shipping" class="menu-link">
                  <div data-i18n="Without menu">All Shipping</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="<?php echo base_url(); ?>all_methods" class="menu-link">
                  <div data-i18n="Without menu">All Methods</div>
                </a>
              </li>

            </ul>
          </li>

          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle ccc">
              <i class="fa fa-file header-icon" aria-hidden="true"></i>
              <div data-i18n="Layouts">&nbsp;CMS</div>
            </a>

            <ul class="menu-sub">
              <li class="menu-item">
                <a href="<?php echo base_url(); ?>all_cms" class="menu-link">
                  <div data-i18n="Without menu">All CMS</div>
                </a>
              </li>

              <li class="menu-item">
                <a href="<?php echo base_url(); ?>add_cms" class="menu-link">
                  <div data-i18n="Without menu">Add CMS</div>
                </a>
              </li>

              <!--========-->
              <li class="menu-item">
                <a href="<?php echo base_url(); ?>all_manage_enquries" class="menu-link">
                  <!--<i class="fa fa-ticket header-icon" aria-hidden="true"></i>-->
                  <div data-i18n="Support">Enquiry</div>
                </a>
              </li>

              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <!--<i class="fa fa-file header-icon" aria-hidden="true"></i>-->
                  <!--<i class='fa fa-rss header-icon' aria-hidden="true"></i>-->
                  <div data-i18n="Layouts">Blog</div>
                </a>

                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="<?php echo base_url(); ?>all_blog" class="menu-link">
                      <div data-i18n="Without menu">All Blog</div>
                    </a>
                  </li>

                  <li class="menu-item">
                    <a href="<?php echo base_url(); ?>add_blog" class="menu-link">
                      <div data-i18n="Without menu">Add Blog</div>
                    </a>
                  </li>

                </ul>
              </li>

              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                  <!--<i class="fa fa-file header-icon" aria-hidden="true"></i>-->
                  <!--<i class="fa fa-question-circle header-icon" aria-hidden="true"></i>-->
                  <div data-i18n="Layouts">FAQ</div>
                </a>

                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="<?php echo base_url(); ?>all-faqs" class="menu-link">
                      <div data-i18n="Without menu">All FAQ</div>
                    </a>
                  </li>

                  <li class="menu-item">
                    <a href="<?php echo base_url(); ?>add-faqs" class="menu-link">
                      <div data-i18n="Without menu">Add FAQ</div>
                    </a>
                  </li>

                </ul>
              </li>

              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle ccc">
                  <!-- <i class="fa fa-picture-o header-icon" aria-hidden="true"></i> -->
                  <div data-i18n="Layouts">Manage Banners</div>
                </a>

                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="<?php echo base_url(); ?>all_banners" class="menu-link">
                      <div data-i18n="Without menu">All Banners</div>
                    </a>
                  </li>

                  <li class="menu-item">
                    <a href="<?php echo base_url(); ?>add_banners" class="menu-link">
                      <div data-i18n="Without menu">Add Banners</div>
                    </a>
                  </li>

                </ul>
              </li>

              <li class="menu-item">
                <a href="javascript:void(0);" class="menu-link menu-toggle ccc">
                  <!--<i class="fa fa-file header-icon" aria-hidden="true"></i>-->
                  <!-- <i class="fa fa-quote-left header-icon" aria-hidden="true"></i> -->
                  <div data-i18n="Layouts">Testimonial</div>
                </a>

                <ul class="menu-sub">
                  <li class="menu-item">
                    <a href="<?php echo base_url(); ?>all-testimonial" class="menu-link">
                      <div data-i18n="Without menu">All Testimonial</div>
                    </a>
                  </li>

                  <li class="menu-item">
                    <a href="<?php echo base_url(); ?>add-testimonial" class="menu-link">
                      <div data-i18n="Without menu">Add Testimonial</div>
                    </a>
                  </li>

                </ul>
              </li>
            </ul>
          </li>


          <!-- <li class="menu-item">
              <a href="<?php echo base_url(); ?>all_payment_getway" class="menu-link ccc">
              <i class="fa fa-credit-card header-icon" aria-hidden="true"></i>
                <div data-i18n="Support">Payment Gateway</div>
              </a>
            </li> -->


          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle ccc">

              <i class="fa fa-truck header-icon" aria-hidden="true"></i>
              <div data-i18n="Taxes">&nbsp;Taxes</div>
            </a>

            <ul class="menu-sub">
              <li class="menu-item">
                <a href="<?php echo base_url(); ?>all_taxes" class="menu-link">
                  <!--<i class="fa fa-money header-icon" aria-hidden="true"></i>-->
                  <div data-i18n="Taxes">All Taxes </div>
                </a>
              </li>
              <!-- <li class="menu-item">
              <a href="<?php echo base_url(); ?>all_taxe_class"class="menu-link"> -->
              <!--<i class="fa fa-money header-icon" aria-hidden="true"></i>-->
              <!-- <div data-i18n="Taxes">All Taxeclass </div>
              </a>
            </li> -->

            </ul>
          </li>





          <!-- <li class="menu-item">
            <a href="<?php //echo base_url(); ?>all_email_smtp" class="menu-link ccc">
                <i class="fa fa-empire header-icon" aria-hidden="true"></i>
                <div data-i18n="Support">Email SMTP</div>
              </a>
            </li> -->





          <li class="menu-item">
            <a href="<?php echo base_url(); ?>all_chat" class="menu-link ccc">
              <i class="fa fa-comments header-icon" aria-hidden="true"></i>
              <div data-i18n="Support">&nbsp;Chat</div>
            </a>
          </li>



          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle ccc">

              <i class="fa fa-map-marker header-icon" aria-hidden="true"></i>
              <div data-i18n="Layouts">&nbsp;Location</div>
            </a>

            <ul class="menu-sub">
              <li class="menu-item">
                <a href="<?php echo base_url(); ?>all_country" class="menu-link">
                  <div data-i18n="Without menu">All Country</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="<?php echo base_url(); ?>all_state" class="menu-link">
                  <div data-i18n="Without menu">All State</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="<?php echo base_url(); ?>all_city" class="menu-link">
                  <div data-i18n="Without menu">All City</div>
                </a>
              </li>
            </ul>
          </li>

          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle ccc">

              <i class="fa fa-gift header-icon" aria-hidden="true"></i>
              <div data-i18n="Layouts">&nbsp;Coupons</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="<?php echo base_url(); ?>all-coupons" class="menu-link">
                  <div data-i18n="Without menu">All Coupons</div>
                </a>
              </li>
            </ul>
          </li>

          <li class="menu-item">
            <a href="<?php echo base_url(); ?>all_review" target="_blank" class="menu-link ccc">
              <i class="fa fa-star header-icon" aria-hidden="true"></i>
              <div data-i18n="Support">&nbsp;Review</div>
            </a>
          </li>

          <!-- <li class="menu-item">
            <a href="<?php echo base_url(); ?>all_settings" target="_blank" class="menu-link ccc">
                <i class="fa fa-cog header-icon" aria-hidden="true"></i>
                <div data-i18n="Support">Setting</div>
              </a>
            </li> -->

          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle ccc">
              <i class="fa fa-cog header-icon"></i>
              <div data-i18n="Support">&nbsp;Settings</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="<?php echo base_url(); ?>all_settings" class="menu-link">
                  <div data-i18n="Account">Site Setting</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="<?php echo base_url(); ?>all_payment_getway" class="menu-link">
                  <div data-i18n="Support">Payment Gateway</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="<?php echo base_url(); ?>all_email_smtp" class="menu-link">
                  <div data-i18n="Support">Email SMTP</div>

                </a>
              </li>

            </ul>
          </li>


        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
              <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" id="search-input" autocomplete="off" class="form-control border-0 shadow-none"
                  placeholder="Search..." aria-label="Search..." onkeyup="showSuggestions()" />
                <ul id="suggestion-list" class="list-group"></ul>
              </div>
            </div>
            <!-- /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <a href="#" class="nav-link px-0 font-weight-bold mx-3" id="dropdownMenuButton" data-bs-toggle="dropdown"
                data-bs-auto-close="outside" aria-expanded="false" style="font-size: 21px; margin-top: -3px;">
                <i class="fas fa-cog"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end px-3 py-3 rounded"
                aria-labelledby="dropdownMenuButton" style="max-height: 255px; width:270px;">
                <li>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>all_settings">
                     <i class="bx bx-cog me-2"></i>
                      <span class="align-middle">Site Setting</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>all_payment_getway">
                    <i class="fa fa-credit-card header-icon" aria-hidden="true"></i>
                      <span class="align-middle">Payment Getways</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>all_email_smtp">
                    <i class="fa fa-envelope align-middle header-icon"></i>
                      <span class="align-middle">Email SMTP</span>
                    </a>
                  </li>
            </ul>



            <!--=============-->

            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <a href="#" class="nav-link px-0 font-weight-bold mx-3" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                data-bs-auto-close="outside" aria-expanded="false" style="font-size: 21px; margin-top: -3px;">
                  <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end px-3 py-3 rounded"
                  aria-labelledby="dropdownMenuButton1" style="max-height: 295px; width:400px;">
                  
                  <div class="notification-list p-2" id="notification-list" style="overflow-y: scroll; max-height: 228px;scrollbar-width: none;">
                      <p class="text-center" id="no-notifications-text">No new notifications.</p>
                  </div>

                  <div id="view-all-notifications" class="mt-auto text-center" style="display: none;">
                      <a class="dropdown-item font-weight-bold py-2 px-3 rounded-3 shadow-sm bg-light w-100 d-block text-decoration-none hover-effect" href="<?php echo base_url(); ?>all-notifications">
                          <i class="fa fa-bell me-2" style="color: #f7941d;"></i> <!-- Notification icon -->
                          View all notifications
                      </a>
                  </div>

              </ul>
          </ul>


              <!-- ====================================================== -->

              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <?php
                    $session = \Config\Services::session();
                    $UserProfile = $session->get('UserProfile');
                    $UserFirstName = $session->get('UserFirstName');
                    $UserLastName = $session->get('UserLastName'); ?>
                    <img src="<?php echo base_url('public/assets/img/profile_images/') . '/' . $UserProfile; ?>"
                      alt="Profile Image" class="w-px-40 h-auto rounded-circle"
                      onerror="this.onerror=null;this.src='<?php echo base_url('public/assets/img/profile_images/default_user.png'); ?>';" />
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="<?php echo base_url('profile') ?>">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="<?php echo base_url('public/assets/img/profile_images/') . '/' . $UserProfile; ?>"
                              alt="Profile Image" class="w-px-40 h-auto rounded-circle"
                              onerror="this.onerror=null;this.src='<?php echo base_url('public/assets/img/profile_images/default_user.png'); ?>';" />
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-semibold d-block"><?= $UserFirstName . "&nbsp" . "&nbsp" . $UserLastName ?></span>
                          <small class="text-muted">Admin</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>profile">
                      <i class="bx bx-user me-2"></i>
                      <span class="align-middle">My Profile</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="<?php echo base_url(); ?>change-password">
                      <i class="bx bx-user me-2"></i>
                      <span class="align-middle">Change Password</span>
                    </a>
                  </li>
                  <!-- <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li> -->
                  <!-- <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                      </a>
                    </li>
                    <li> -->
                  <div class="dropdown-divider"></div>
              </li>
              <li>
                <a class="dropdown-item" href="<?php echo base_url(); ?>logout">
                  <i class="bx bx-power-off me-2"></i>
                  <span class="align-middle">Log Out</span>
                </a>
              </li>
            </ul>
            </li>
            <!--/ User -->
            </ul>
          </div>
        </nav>

        <!-- / Navbar -->

        <script>
          // document.querySelector('.refil-button').addEventListener('click', function() {
          //     const dropdowns = document.querySelectorAll('.d_dropdown');
          //     dropdowns.forEach(function(dropdown) {
          //         dropdown.style.display = (dropdown.style.display === 'none' || dropdown.style.display === '') ? 'block' : 'none';
          //     });
          // });

          //   document.querySelector('.refil-button').addEventListener('click', function() {
          //         const dropdowns = document.querySelectorAll('.dropdown');
          //         dropdowns.forEach(function(dropdown) {
          //             dropdown.style.display = (dropdown.style.display === 'none' || dropdown.style.display === '') ? 'block' : 'none';
          //         });

          //         // // Remove margin-left style from the button
          //         // this.style.marginTop = '0'; // Set margin-left to 0
          //     });

          function showSuggestions() {
            const input = document.getElementById("search-input");
            const filter = input.value.toLowerCase();
            const suggestionList = document.getElementById("suggestion-list");

            suggestionList.innerHTML = ''; // Clear the suggestion list

            const suggestions = [
                { name: 'Dashboard', url: '<?= base_url() ?>' },
                { name: 'All Customers', url: '<?= base_url("all-customers") ?>' },
                { name: 'Add Customers', url: '<?= base_url("add-customers") ?>' },
                { name: 'All Product', url: '<?= base_url("all-products") ?>' },
                { name: 'Add Product', url: '<?= base_url("add-products") ?>' },
                { name: 'Categories', url: '<?= base_url("all-categories") ?>' },
                { name: 'Sub Categories', url: '<?= base_url("all-subcategories") ?>' },
                { name: 'All Brand', url: '<?= base_url("all-brands") ?>' },
                { name: 'Add Brand', url: '<?= base_url("add-brands") ?>' },
                { name: 'All Tags', url: '<?= base_url("all-tags") ?>' },
                { name: 'Add Tag', url: '<?= base_url("add-tags") ?>' },
                { name: 'All Options', url: '<?= base_url("all-options") ?>' },
                { name: 'Add Options', url: '<?= base_url("add-options") ?>' },
                { name: 'All Orders', url: '<?= base_url("all-orders") ?>' },
                { name: 'Add Order', url: '<?= base_url("add-order") ?>' },
                { name: 'Export Orders', url: '<?= base_url("export-order") ?>' },
                { name: 'All Coupons', url: '<?= base_url("all-coupons") ?>' },
                { name: 'My Profile', url: '<?= base_url("profile") ?>' },
                { name: 'All CMS', url: '<?= base_url("all_cms") ?>' },
                { name: 'Add CMS', url: '<?= base_url("add_cms") ?>' },
                { name: 'Enquiry', url: '<?= base_url("all_manage_enquries") ?>' },
                { name: 'All Blog', url: '<?= base_url("all_blog") ?>' },
                { name: 'Add Blog', url: '<?= base_url("add_blog") ?>' },
                { name: 'All FAQ', url: '<?= base_url("all-faqs") ?>' },
                { name: 'Add FAQ', url: '<?= base_url("add_faqs") ?>' },
                { name: 'All Banners', url: '<?= base_url("all_banners") ?>' },
                { name: 'Add Banners', url: '<?= base_url("add_banners") ?>' },
                { name: 'All Testimonial', url: '<?= base_url("all-testimonial") ?>' },
                { name: 'Add Testimonial', url: '<?= base_url("add-testimonial") ?>' },
                { name: 'Review', url: '<?= base_url("all_review") ?>' },
                { name: 'Setting', url: '<?= base_url("all_settings") ?>' },
                { name: 'Transactions', url: '<?= base_url("all_transactions") ?>' },
                { name: 'All Methods', url: '<?= base_url("all_methods") ?>' },
                { name: 'Add Shipping methods', url: '<?= base_url("add_shipping_methods") ?>' },
                { name: 'All Tax', url: '<?= base_url("all_taxes") ?>' },
                { name: 'Add Tax', url: '<?= base_url("add_tax") ?>' },
                { name: 'Payment Gateway', url: '<?= base_url("all_payment_getway") ?>' },
                { name: 'Email SMTP', url: '<?= base_url("all_email_smtp") ?>' },
            ];

            const filteredSuggestions = suggestions.filter(suggestion =>
                suggestion.name.toLowerCase().includes(filter)
            );

            if (filter.length > 0) {
                suggestionList.style.display = 'block';

                if (filteredSuggestions.length > 0) {
                    filteredSuggestions.forEach(suggestion => {
                        const listItem = document.createElement('li');
                        listItem.className = 'list-group-item';
                        listItem.innerHTML = `<a href="${suggestion.url}" class="text-decoration-none">${suggestion.name}</a>`;
                        suggestionList.appendChild(listItem);
                    });
                } else {
                    const noResultItem = document.createElement('li');
                    noResultItem.className = 'list-group-item text-center text-muted';
                    noResultItem.textContent = 'No Result Found';
                    suggestionList.appendChild(noResultItem);
                }
            } else {
                suggestionList.style.display = 'none';
            }
        }

        document.addEventListener('click', function(event) {
            const searchInput = document.getElementById('search-input');
            const suggestionList = document.getElementById('suggestion-list');
            const isClickInside = searchInput.contains(event.target) || suggestionList.contains(event.target);

            if (!isClickInside) {
                suggestionList.style.display = 'none';
            }
        });



</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
 $(document).ready(function () {
    // Fetch notifications on dropdown click
    $('#dropdownMenuButton1').on('click', function () {
    let notificationList = $('#notification-list');
    let noNotificationsText = $('#no-notifications-text');
    let viewAllNotifications = $('#view-all-notifications');

    // Initially hide 'View all notifications' link and show 'No new notifications' message
    noNotificationsText.show();
    viewAllNotifications.hide();

    // AJAX request to fetch notifications
    $.ajax({
        url: 'fetch_notifications',  // Ensure this URL is correct
        method: 'GET',
        dataType: 'json',
        success: function (notifications) {
            // Clear previous notifications if any
            notificationList.empty();

            if (notifications.length === 0) {
                // If there are no notifications, display the "No new notifications" message
                noNotificationsText.show();
                viewAllNotifications.hide();
            } else {
                // Hide the "No new notifications" message and show the "View all notifications" link
                noNotificationsText.hide();
                viewAllNotifications.show();

                // Loop through each notification and add it to the notification list
                notifications.forEach(notification => {
                    const notificationItem = `
                        <li class="d-flex justify-content-between align-items-center notification-item px-3 mb-2 rounded-3 shadow-sm bg-light">
                            <a class="dropdown-item top-down border-radius-md ps-0 w-85 d-flex align-items-center" href="javascript:;">
                                <!-- Notification Icon -->
                                <div class="me-3">
                                    <i class="fa fa-bell" style="font-size: 20px; color: #f7941d;"></i>
                                </div>

                                <!-- Notification Content -->
                                <div class="d-flex flex-column justify-content-center w-100">
                                    <div class="d-flex justify-content-between align-items-center w-100">
                                        <h6 class="text-sm font-weight-bold mb-1" 
                                            style="color: #333; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                            ${notification.title.trim()}
                                        </h6>
                                    </div>
                                    <p class="mt-1 mb-0 text-muted" style="font-size: 0.9rem;">
                                        <i class="fa fa-clock me-1" style="font-size: 0.9rem;"></i>
                                        ${notification.description.trim()}
                                    </p>
                                </div>
                            </a>


                            <!-- Delete Notification -->
                            <a class="w-15 delete-notification text-danger" data-id="${notification.id}" style="border:none; outline:none;">
                                <i class="fa fa-times float-end" style="color:#f7941d"></i>
                            </a>
                        </li>`;
                    notificationList.append(notificationItem);
                });
            }
        },
        error: function (error) {
            console.error('Error fetching notifications:', error);
        }
    });
});

    // Delete notification on cross icon click
    $(document).on('click', '.delete-notification', function () 
    {
        const notificationId = $(this).data('id');
        const notificationItem = $(this).closest('.notification-item');

        $.ajax({
            url: `delete_notification/${notificationId}`,
            method: 'DELETE',
            success: function (response) {
                if (response.status === 'success') 
                {
                    notificationItem.remove();
                } else {
                    console.error('Failed to remove notification:', response.message);
                }
            },
            error: function (xhr, status, error) 
            {
                console.error('Error deleting notification:', error);
            }

        });
    });
});

</script>
<style>
  /* .shadow-sm
  {
    box-shadow: -1px 0px 5px 3px rgb(0 0 0 / 11%) !important;
  } */
</style>