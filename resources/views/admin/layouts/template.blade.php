<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{asset('dashboard/assets/')}}"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />
 
    <title>@yield('page_title')</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{Vite::asset('resources/dashboard/assets/img/favicon/favicon.ico')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link rel="stylesheet" href="{{Vite::asset('resources/dashboard/assets/vendor/fonts/boxicons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{Vite::asset('resources/dashboard/assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{Vite::asset('resources/dashboard/assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{Vite::asset('resources/dashboard/assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{Vite::asset('resources/dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <link rel="stylesheet" href="{{Vite::asset('resources/dashboard/assets/vendor/libs/apex-charts/apex-charts.css')}}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{Vite::asset('resources/dashboard/assets/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{Vite::asset('resources/dashboard/assets/js/config.js')}}"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="{{ route('admindashboard') }}" class="app-brand-link">
              
              <span class="app-brand-text demo menu-text fw-bolder ms-2">MobileShop</span>
            </a>

            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
              <a href="{{ route('admindashboard') }}" class="menu-link">
                <i class="fa fa-tachometer"></i>
                <div style="margin-left: 14px;" data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

            <!-- Layouts -->

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Category</span>
            </li>

            <li class="menu-item">
              <a href="{{ route('addcategory') }}" class="menu-link">
                <i class="fa fa-plus-circle"></i>
                <div style="margin-left: 14px;" data-i18n="Analytics">Add Category</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="{{ route('allcategory') }}" class="menu-link">
                <i class="fa fa-tasks"></i>
                <div style="margin-left: 14px;" data-i18n="Analytics">All Category</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Sub Category</span>
            </li>

            <li class="menu-item">
              <a href="{{ route('addsubcategory') }}" class="menu-link">
                <i class="fa fa-plus-circle"></i>
                <div style="margin-left: 14px;" data-i18n="Analytics">Add SubCategory</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="{{ route('allsubcategory') }}" class="menu-link">
                <i class="fa fa-tasks"></i>
                <div style="margin-left: 14px;" data-i18n="Analytics">All Subcategory</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Products</span>
            </li>

            <li class="menu-item">
              <a href="{{ route('addproducts') }}" class="menu-link">
                <i class="fa fa-plus-circle"></i>
                <div style="margin-left: 14px;" data-i18n="Analytics">Add Products</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="{{ route('allproducts') }}" class="menu-link">
                <i class="fa fa-tasks"></i>
                <div style="margin-left: 14px;" data-i18n="Analytics">Allproducts</div>
              </a>
            </li>

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Orders</span>
            </li>

            <li class="menu-item">
              <a href="{{ route('pendingorders') }}" class="menu-link">
                <i class="fa fa-hand-o-up"></i>
                <div style="margin-left: 14px;" data-i18n="Analytics">Pending Orders</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="{{ route('completedorders') }}" class="menu-link">
                <i class="fa fa-check-square"></i>
                <div style="margin-left: 14px;" data-i18n="Analytics">Completed Orders</div>
              </a>
            </li>

            <li class="menu-item">
              <a href="{{ route('canceledorders') }}" class="menu-link">
                <i class="fa fa-scissors"></i>
                <div style="margin-left: 14px;" data-i18n="Analytics">Canceled Orders</div>
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
                <li class="nav-item lh-1 me-3">
                  <a
                    class="github-button"
                    href="https://github.com/themeselection/sneat-html-admin-template-free"
                    data-icon="octicon-star"
                    data-size="large"
                    data-show-count="true"
                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub"
                    >Star</a
                  >
                </li>

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                      <img src="{{Vite::asset('resources/dashboard/assets/img/avatars/1.png')}}" alt class="w-px-40 h-auto rounded-circle" />
                    </div>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                      <a class="dropdown-item" href="#">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="{{Vite::asset('resources/dashboard/assets/img/avatars/1.png')}}" alt class="w-px-40 h-auto rounded-circle" />
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
                      <a class="dropdown-item" href="#">
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

          <!-- Content wrapper -->
          
          <div class="content-wrapper">
            @yield('content')
          </div>

          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </script>
    <script src="{{Vite::asset('resources/dashboard/assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{Vite::asset('resources/dashboard/assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{Vite::asset('resources/dashboard/assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{Vite::asset('resources/dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{Vite::asset('resources/dashboard/assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{Vite::asset('resources/dashboard/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

    <!-- Main JS -->
    <script src="{{Vite::asset('resources/dashboard/assets/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{Vite::asset('resources/dashboard/assets/js/dashboards-analytics.js')}}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
