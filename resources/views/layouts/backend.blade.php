<!DOCTYPE html>
@php
    $url = $_SERVER['REQUEST_URI'];
    $explode = explode('/',$url);
    $title = $explode[1];
@endphp


<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact " dir="ltr" data-theme="theme-default" data-assets-path="{{asset('backend')}}/" data-template="vertical-menu-template">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Dashboard</title>


    <meta name="description" content="Start your development with a Dashboard for Bootstrap 5" />
    <meta name="keywords" content="dashboard, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
    <!-- Canonical SEO -->
    <link rel="canonical" href="https://1.envato.market/vuexy_admin">


    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://demos.pixinvent.com/vuexy-html-admin-template/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;ampdisplay=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/fonts/fontawesome.css" />
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/fonts/tabler-icons.css"/>
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/fonts/flag-icons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('backend')}}/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/libs/swiper/swiper.css" />
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/libs/datatables-bs5/datatables.bootstrap5.css">
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css">
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css">
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/libs/select2/select2.css" />

        	<!-- CSS -->
	<link rel="stylesheet" href="{{asset('frontend')}}/admin/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="{{asset('frontend')}}/admin/css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="{{asset('frontend')}}/admin/css/magnific-popup.css">
	<link rel="stylesheet" href="{{asset('frontend')}}/admin/css/jquery.mCustomScrollbar.min.css">
	<link rel="stylesheet" href="{{asset('frontend')}}/admin/css/select2.min.css">
	<link rel="stylesheet" href="{{asset('frontend')}}/admin/css/ionicons.min.css">
	<link rel="stylesheet" href="{{asset('frontend')}}/admin/css/admin.css">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"
    integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"/>

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{asset('backend')}}/vendor/css/pages/cards-advance.css" />

    <!-- Helpers -->
    <script src="{{asset('backend')}}/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('backend')}}/js/config.js"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

<!-- include Richtext -->
<link rel="stylesheet" href="{{ asset('backend') }}/richtexteditor/rte_theme_default.css" />


    <style>
        .swal2-popup {
            top: 10%;
        }
    </style>

    @stack('header')

</head>

<body>




  <!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar  ">
  <div class="layout-container">



<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">


  <div class="app-brand demo ">
    <a href="{{route('dashboard')}}" class="app-brand-link">
      <span class="app-brand-logo demo"><img width="140" src="{{asset('backend')}}/img/logo/logo.png" alt=""></span>
    </a>

    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
      <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
      <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>



  <ul class="menu-inner py-1">
    <!-- Dashboards -->
    <li class="menu-item {{$title == 'dashboard'?'active':''}}">
        <a href="{{route('dashboard')}}" class="menu-link">
          <div data-i18n="Dashboard">Dashboard</div>
        </a>
    </li>



    <!-- Frontend -->
    <li class="menu-header small text-uppercase">
      <span class="menu-header-text" data-i18n="Frontend Content">Frontend Content</span>
    </li>
    <li class="menu-item {{$title == 'info_edit'?'active':''}}">
      <a href="{{route('info.edit')}}" class="menu-link">
        <i class="menu-icon tf-icons ti ti-mail"></i>
        <div data-i18n="Main Info Update">Main Info Update</div>
      </a>
    </li>

    <!-- Category -->
    <li class="menu-item
    {{$title == 'category'?'active open':''}}
    {{$title == 'category_trash'?'active open':''}}
    ">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class='menu-icon tf-icons ti ti-shopping-cart'></i>
        <div data-i18n="Category">Category</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item  {{$title == 'category'?'active':''}}">
          <a href="{{route('category')}}" class="menu-link">
            <div data-i18n="Category">Category</div>
          </a>
        </li>
        <li class="menu-item {{$title == 'category_trash'?'active':''}}">
          <a href="{{route('category.trash')}}" class="menu-link">
            <div data-i18n="Trash">Trash</div>
          </a>
        </li>
      </ul>
    </li>


    <!-- Blog -->
    <li class="menu-item
    {{$title == 'blog_list'?'active open':''}}
    {{$title == 'add_blog'?'active open':''}}
    {{$title == 'blog_edit'?'active open':''}}
    {{$title == 'blog_trash'?'active open':''}}
    ">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class='menu-icon tf-icons ti ti-shopping-cart'></i>
        <div data-i18n="Blog">Blog</div>
      </a>
      <ul class="menu-sub">

        <li class="menu-item {{$title == 'add_blog'?'active':''}}">
          <a href="{{route('add.blog')}}" class="menu-link">
            <div data-i18n="Add Blog">Add Blog</div>
          </a>
        </li>

        <li class="menu-item
        {{$title == 'blog_list'?'active':''}}
        {{$title == 'blog_edit'?'active':''}}
        ">
          <a href="{{route('blog.list')}}" class="menu-link">
            <div data-i18n="Blog List">Blog List</div>
          </a>
        </li>

        <li class="menu-item
        {{$title == 'blog_trash'?'active':''}}
        ">
          <a href="{{route('blog.trash')}}" class="menu-link">
            <div data-i18n="Trash">Trash</div>
          </a>
        </li>


      </ul>
    </li>

    {{-- Setting --}}
    
    <!-- Category -->
    <li class="menu-item
    {{$title == 'users'?'active open':''}}
    {{$title == 'subscribers'?'active open':''}}
    {{$title == 'roll'?'active open':''}}
    ">
      <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class='menu-icon tf-icons ti ti-shopping-cart'></i>
        <div data-i18n="Settings">Settings</div>
      </a>
      <ul class="menu-sub">
        <li class="menu-item  {{$title == 'users'?'active':''}}">
          <a href="{{route('users')}}" class="menu-link">
            <div data-i18n="Users">Users</div>
          </a>
        </li>
        <li class="menu-item {{$title == 'subscribers'?'active':''}}">
          <a href="{{route('subscribers')}}" class="menu-link">
            <div data-i18n="Subscribers">Subscribers</div>
          </a>
        </li>
        <li class="menu-item {{$title == 'roll'?'active':''}}">
          <a href="{{route('roll')}}" class="menu-link">
            <div data-i18n="Roll Manager">Roll Manager</div>
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

<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">


      <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
          <i class="ti ti-menu-2 ti-sm"></i>
        </a>
      </div>


      <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

        <ul class="navbar-nav flex-row align-items-center ms-auto">

          <!-- Notification -->
          <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
              <i class="ti ti-bell ti-md"></i>
              <span class="badge bg-danger rounded-pill badge-notifications">{{App\Models\SubscribersModel::where('status', '0')->count()}}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end py-0">
              <li class="dropdown-menu-header border-bottom">
                <div class="dropdown-header d-flex align-items-center py-3">
                  <h5 class="text-body mb-0 me-auto">Subscribers</h5>
                  <a href="javascript:void(0)" class="dropdown-notifications-all text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i class="ti ti-mail-opened fs-4"></i></a>
                </div>
              </li>
              <li class="dropdown-notifications-list scrollable-container">
                <ul class="list-group list-group-flush">

                  @forelse (App\Models\SubscribersModel::where('status', '0')->latest()->get() as $sub )
                    
                  <a class=" bg-{{$sub->view == '0'?'info':'gray'}} m-2 " style="border-radius: 7px;" href="{{route('subscribers.reply',$sub->id)}}">
                    <li class="list-group-item list-group-item-action dropdown-notifications-item">
                      <div class="d-flex">
                        <div class="flex-grow-1 d-flex justify-content-between">
                         <div class="">
                          <p class="mb-0 text-white">{{$sub->email}}</p>
                          <small class="text-white">{{$sub->created_at->diffForHumans()}}</small>
                         </div>
                         <div class="">
                            
                          <i class="fa-solid {{$sub->view == '0'?'fa-eye-slash':'fa-eye'}} " style="color: #ffffff;"></i>
                         </div>
                        </div>
                      </div>
                    </li>
                  </a>

                  @empty

                  <li class="list-group-item list-group-item-action dropdown-notifications-item">
                    <div class="d-flex">
                      <div class="flex-grow-1">
                        <h6 class="mb-1 text-center">No Subscribers Available</h6>
                      </div>
                    </div>
                  </li>

                  @endforelse                 
                  
                </ul>
              </li>
              <li class="dropdown-menu-footer border-top">
                <a href="{{route('subscribers')}}" class="dropdown-item d-flex justify-content-center text-primary p-2 h-px-40 mb-1 align-items-center">
                  View all notifications
                </a>
              </li>
            </ul>
          </li>
          <!--/ Notification -->

          <!-- User -->
          <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
              <div class="avatar avatar-online">
                @if (Auth::user()->photo == null)
                <img src="{{ asset('backend') }}/img/avatars/9.png" alt="profile photo" class="h-auto rounded-circle">
            @else
                <img src="{{ asset('uploads') }}/profile/{{Auth::user()->photo}}" alt class="h-auto rounded-circle">
            @endif
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item" href="pages-account-settings-account.html">
                  <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                      <div class="avatar avatar-online">
                        @if (Auth::user()->photo == null)
                        <img src="{{ asset('backend') }}/img/avatars/9.png" alt="profile photo" class="h-auto rounded-circle">
                    @else
                        <img src="{{ asset('uploads') }}/profile/{{Auth::user()->photo}}" alt class="h-auto rounded-circle">
                    @endif
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <span class="fw-medium d-block">{{Auth::user()->name}}</span>
                      <small class="text-muted">{{Auth::user()->email}}</small>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <div class="dropdown-divider"></div>
              </li>
              <li>
                <a class="dropdown-item" href="{{route('profile')}}">
                  <i class="ti ti-user-check me-2 ti-sm"></i>
                  <span class="align-middle">My Profile</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="{{route('profile.setting')}}">
                  <i class="ti ti-settings me-2 ti-sm"></i>
                  <span class="align-middle">Settings</span>
                </a>
              </li>
              
              <li>
                <div class="dropdown-divider"></div>
              </li>
              <li>


                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="dropdown-item" href="" target="_blank" onclick="event.preventDefault();
                    this.closest('form').submit();">
                        <i class="ti ti-logout me-2 ti-sm"></i>
                        <span class="align-middle">Log Out</span>
                      </button>
                </form>

              </li>
            </ul>
          </li>
          <!--/ User -->



        </ul>
      </div>


      <!-- Search Small Screens -->
      <div class="navbar-search-wrapper search-input-wrapper  d-none">
        <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..." aria-label="Search...">
        <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
      </div>



</nav>

<!-- / Navbar -->



      <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">

            @yield('content')

          </div>
          <!-- / Content -->




<!-- Footer -->
<footer class="content-footer footer bg-footer-theme">
  <div class="container-xxl">
    <div class="footer-container d-flex align-items-center justify-content-between py-2 flex-md-row flex-column">
      <div>
        © <script>
        document.write(new Date().getFullYear())

        </script>, made with ❤️ by <a href="https://pixinvent.com/" target="_blank" class="footer-link text-primary fw-medium">Pixinvent</a>
      </div>
      <div class="d-none d-lg-inline-block">

        <a href="https://themeforest.net/licenses/standard" class="footer-link me-4" target="_blank">License</a>
        <a href="https://1.envato.market/pixinvent_portfolio" target="_blank" class="footer-link me-4">More Themes</a>

        <a href="https://demos.pixinvent.com/vuexy-html-admin-template/documentation/" target="_blank" class="footer-link me-4">Documentation</a>


        <a href="https://pixinvent.ticksy.com/" target="_blank" class="footer-link d-none d-sm-inline-block">Support</a>

      </div>
    </div>
  </div>
</footer>
<!-- / Footer -->


          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>



    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>


    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>

  </div>
  <!-- / Layout wrapper -->





  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->

  <script src="{{asset('backend')}}/vendor/libs/jquery/jquery.js"></script>
  <script src="{{asset('backend')}}/vendor/libs/popper/popper.js"></script>
  <script src="{{asset('backend')}}/vendor/js/bootstrap.js"></script>
  <script src="{{asset('backend')}}/vendor/libs/node-waves/node-waves.js"></script>
  <script src="{{asset('backend')}}/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="{{asset('backend')}}/vendor/libs/hammer/hammer.js"></script>
  <script src="{{asset('backend')}}/vendor/libs/i18n/i18n.js"></script>
  <script src="{{asset('backend')}}/vendor/libs/typeahead-js/typeahead.js"></script>
   <script src="{{asset('backend')}}/vendor/js/menu.js"></script>

  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="{{asset('backend')}}/vendor/libs/apex-charts/apexcharts.js"></script>
<script src="{{asset('backend')}}/vendor/libs/swiper/swiper.js"></script>
 {{-- <script src="{{asset('backend')}}/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>  --}}

  <!-- Main JS -->
  <script src="{{asset('backend')}}/js/main.js"></script>


  <!-- Page JS -->
  <script src="{{asset('backend')}}/js/dashboards-analytics.js"></script>

  {{-- Sweet Alart --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script type="text/javascript" src="{{ asset('backend') }}/richtexteditor/rte.js"></script>
    <script type="text/javascript" src='{{ asset('backend') }}/richtexteditor/plugins/all_plugins.js'></script>

        	<!-- JS -->
	<script src="{{asset('frontend')}}/admin/js/jquery-3.5.1.min.js"></script>
	<script src="{{asset('frontend')}}/admin/js/bootstrap.bundle.min.js"></script>
	<script src="{{asset('frontend')}}/admin/js/jquery.magnific-popup.min.js"></script>
	<script src="{{asset('frontend')}}/admin/js/jquery.mousewheel.min.js"></script>
	<script src="{{asset('frontend')}}/admin/js/jquery.mCustomScrollbar.min.js"></script>
	<script src="{{asset('frontend')}}/admin/js/select2.min.js"></script>
	<script src="{{asset('frontend')}}/admin/js/admin.js"></script>
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js"
    integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
    ></script>
    <script>
        $('#select-gear').selectize({ sortField: 'text' })
    </script>

    <script>
        $("#input-tags").selectize({
    delimiter: ",",
    persist: false,
    create: function (input) {
            return {
                value: input,
                text: input,
            };
        },
        });
        $("#input-tags2").selectize({
    delimiter: ",",
    persist: false,
    create: function (input) {
            return {
                value: input,
                text: input,
            };
        },
        });
    </script>



  @stack('script')
    <script>
        var editor1 = new RichTextEditor("#inp_editor1");
    </script>

</body>
</html>



