<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Ecom Web App</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="
    assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
             <img src="assets/img/811579-middle.png" style="width: 77%;">
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="index.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
            
              <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="fa fa-users header-icon"></i>
                <div data-i18n="Account Settings">Customers</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="all_custmers.php" class="menu-link">
                    <div data-i18n="Account">All Customers</div>
                  </a>
                </li>
                 <li class="menu-item">
                  <a href="add_customers.php" class="menu-link">
                    <div data-i18n="Account">Add Customers</div>
                  </a>
                </li>
              </ul>
            </li>

            <!-- Layouts -->
    <!--         <li class="menu-header small text-uppercase">-->
    <!--  <span class="menu-header-text">Products</span>-->
    <!--</li>-->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
               <i class="fa fa-shopping-bag header-icon"></i>
                <div data-i18n="Layouts">Products</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="all_products.php" class="menu-link">
                    <div data-i18n="Without menu">All Products</div>
                  </a>
                </li>
                 <li class="menu-item">
                  <a href="add_product.php" class="menu-link">
                    <div data-i18n="Without menu">Add Products</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="categories.php" class="menu-link">
                    <div data-i18n="Without menu">Categories</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="add_options.php" class="menu-link">
                    <div data-i18n="Without menu">Options</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="tags.php" class="menu-link">
                    <div data-i18n="Without menu">Tags</div>
                  </a>
                </li>
                
               
                </ul>
            </li>
           
              
    <!--           <li class="menu-header small text-uppercase">-->
    <!--  <span class="menu-header-text">Orders</span>-->
    <!--</li>-->
             <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="fa fa-shopping-cart header-icon" aria-hidden="true"></i>
                <div data-i18n="Layouts">Orders</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="orders.php" class="menu-link">
                    <div data-i18n="Without menu">All Orders</div>
                  </a>
                </li>
               
                
               
                </ul>
            </li>
    <!--             <li class="menu-header small text-uppercase">-->
    <!--  <span class="menu-header-text">Users</span>-->
    <!--</li>-->
          
    <!--              <li class="menu-header small text-uppercase">-->
    <!--  <span class="menu-header-text">Analytics</span>-->
    <!--</li>-->
            
              
           
            <li class="menu-item">
              <a
                href="shipping.php"
                class="menu-link"
              >
              <i class="fa fa-truck header-icon" aria-hidden="true"></i>
                <div data-i18n="Support">Shipping</div>
              </a>
            </li>
             <li class="menu-item">
              <a
                href="payment_getway.php"
               
                class="menu-link"
              >
              <i class="fa fa-credit-card header-icon" aria-hidden="true"></i>
                <div data-i18n="Support">Payment Getway</div>
              </a>
            </li>
             <li class="menu-item">
              <a
                href="transactions.php"
                
                class="menu-link"
              >
              <i class="fa fa-handshake-o header-icon" aria-hidden="true"></i>
                <div data-i18n="Support">Transactions</div>
              </a>
            </li>
              <li class="menu-item">
              <a
                href="taxes.php"
                
                class="menu-link"
              >
              <i class="fa fa-money header-icon" aria-hidden="true"></i>
                <div data-i18n="Support">Taxes</div>
              </a>
            </li>
            <li class="menu-item">
              <a
                href="discounts_and_coupons.php"
                
                class="menu-link"
              >
                <i class="fa fa-ticket header-icon" aria-hidden="true"></i>
                <div data-i18n="Support">Discouts & Coupons</div>
              </a>
            </li>
            <li class="menu-item">
              <a
                href="add_options.php"
                
                class="menu-link"
              >
               <i class="fa fa-list header-icon" aria-hidden="true"></i>
                <div data-i18n="Support">Attributes</div>
              </a>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="fa fa-file header-icon" aria-hidden="true"></i>
                <div data-i18n="Layouts">CMS</div>
              </a>

              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="all_cms_pages.php" class="menu-link">
                    <div data-i18n="Without menu">All CMS Pages</div>
                  </a>
                </li>
               
                <li class="menu-item">
                  <a href="add_cms_page.php" class="menu-link">
                    <div data-i18n="Without menu">Add CMS Pages</div>
                  </a>
                </li>
               
                </ul>
            </li>
             <li class="menu-item">
              <a
                href="reviews.php"
                
                class="menu-link"
              >
                <i class="fa fa-star header-icon" aria-hidden="true"></i>
                <div data-i18n="Support">Review</div>
              </a>
            </li>
            <li class="menu-item">
              <a
                href="setting.php"
               
                class="menu-link"
              >
                <i class="fa fa-cog header-icon" aria-hidden="true"></i>
                <div data-i18n="Support">Setting</div>
              </a>
            </li>

            
          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar"
          >
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
                  <input
                    type="text"
                    class="form-control border-0 shadow-none"
                    placeholder="Search..."
                    aria-label="Search..."
                  />
                </div>
              </div>
              <!-- /Search -->

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
               
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <span class="fw-semibold d-block">John Doe</span>
                            <small class="text-muted">Admin</small>
                          </div>
                        </div>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="profile.php">
                        <i class="bx bx-user me-2"></i>
                        <span class="align-middle">My Profile</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <i class="bx bx-cog me-2"></i>
                        <span class="align-middle">Settings</span>
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">
                        <span class="d-flex align-items-center align-middle">
                          <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                          <span class="flex-grow-1 align-middle">Billing</span>
                          <span class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="dropdown-divider"></div>
                    </li>
                    <li>
                      <a class="dropdown-item" href="auth-login-basic.html">
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