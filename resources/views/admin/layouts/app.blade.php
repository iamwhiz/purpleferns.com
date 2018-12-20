<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}
    <title>@yield('title')</title>
    <!-- <link rel='shortcut icon' href="{{url('/')}}/assets/images/ms-icon-150x150.png" type='image/x-icon' /> -->
	<!-- plugins:css -->
	<link rel="stylesheet" href="{{ asset('assets/admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/admin/vendors/css/vendor.bundle.base.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/admin/vendors/css/vendor.bundle.addons.css') }}">
	<!-- endinject -->
	
	<!-- plugin css for this page -->
	<link rel="stylesheet" href="{{ asset('assets/admin/vendors/iconfonts/font-awesome/css/font-awesome.css') }}">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/admin/css/custom-style.css') }}">
	<!-- DatePickes -->
	<link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/datepicker.css')}}">
	<!-- endinject -->
	<link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.png') }}" />
	<style>
	.immhide{display:none;}
	.error{color: red;margin: 5px 0;}
	</style>
	
</head>
	@if(Request::segment(1) == 'admin' && empty(Request::segment(2)))
	<body class="immi_sidebar_admin">
	@else
	<body>
	@endIf

<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
		<div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
			<a class="navbar-brand brand-logo" href="{{ url('/admin/all-flowers') }}">
				<img src="{{ asset('assets/images/logo.png') }}" alt="logo" />
			</a>
			<a class="navbar-brand brand-logo-mini" href="{{ url('/admin/all-flowers') }}">
				<img src="{{ asset('assets/images/logo.png') }}" alt="logo" />
			</a>
		</div>
		<div class="navbar-menu-wrapper d-flex align-items-center">
			<!--ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
				<li class="nav-item">
					<a href="#" class="nav-link">Schedule
						<span class="badge badge-primary ml-1">New</span>
					</a>
				</li>
				<li class="nav-item active">
					<a href="#" class="nav-link">
					<i class="mdi mdi-elevation-rise"></i>Reports</a>
				</li>
				<li class="nav-item">
					<a href="#" class="nav-link">
					<i class="mdi mdi-bookmark-plus-outline"></i>Score</a>
				</li>
			</ul-->
			<ul class="navbar-nav navbar-nav-right">
			<!--li class="nav-item dropdown">
				<a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
					<i class="mdi mdi-file-document-box"></i>
					<span class="count">7</span>
				</a>
				<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
					<div class="dropdown-item">
						<p class="mb-0 font-weight-normal float-left">You have 7 unread mails</p>
						<span class="badge badge-info badge-pill float-right">View all</span>
					</div>
					<div class="dropdown-divider"></div>
						<a class="dropdown-item preview-item">
						<div class="preview-thumbnail">
							<img src="images/faces/face4.jpg" alt="image" class="profile-pic">
						</div>
					<div class="preview-item-content flex-grow">
						<h6 class="preview-subject ellipsis font-weight-medium text-dark">David Grey
							<span class="float-right font-weight-light small-text">1 Minutes ago</span>
						</h6>
						<p class="font-weight-light small-text">The meeting is cancelled</p>
					</div>
					</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item preview-item">
						<div class="preview-thumbnail">
							<img src="images/faces/face2.jpg" alt="image" class="profile-pic">
						</div>
					<div class="preview-item-content flex-grow">
						<h6 class="preview-subject ellipsis font-weight-medium text-dark">Tim Cook
							<span class="float-right font-weight-light small-text">15 Minutes ago</span>
						</h6>
						<p class="font-weight-light small-text">New product launch</p>
					</div>
					</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item preview-item">
					<div class="preview-thumbnail">
						<img src="images/faces/face3.jpg" alt="image" class="profile-pic">
					</div>
					<div class="preview-item-content flex-grow">
						<h6 class="preview-subject ellipsis font-weight-medium text-dark"> Johnson
							<span class="float-right font-weight-light small-text">18 Minutes ago</span>
						</h6>
						<p class="font-weight-light small-text">Upcoming board meeting</p>
					</div>
					</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
				<i class="mdi mdi-bell"></i>
				<span class="count">4</span>
			</a>
			<div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
			<a class="dropdown-item">
				<p class="mb-0 font-weight-normal float-left">You have 4 new notifications</p>
				<span class="badge badge-pill badge-warning float-right">View all</span>
			</a>
			<div class="dropdown-divider"></div>
			<a class="dropdown-item preview-item">
			<div class="preview-thumbnail">
			<div class="preview-icon bg-success">
			<i class="mdi mdi-alert-circle-outline mx-0"></i>
			</div>
			</div>
			<div class="preview-item-content">
			<h6 class="preview-subject font-weight-medium text-dark">Application Error</h6>
			<p class="font-weight-light small-text">
			Just now
			</p>
			</div>
			</a>
			<div class="dropdown-divider"></div>
			<a class="dropdown-item preview-item">
			<div class="preview-thumbnail">
			<div class="preview-icon bg-warning">
			<i class="mdi mdi-comment-text-outline mx-0"></i>
			</div>
			</div>
			<div class="preview-item-content">
			<h6 class="preview-subject font-weight-medium text-dark">Settings</h6>
			<p class="font-weight-light small-text">
			Private message
			</p>
			</div>
			</a>
			<div class="dropdown-divider"></div>
			<a class="dropdown-item preview-item">
			<div class="preview-thumbnail">
			<div class="preview-icon bg-info">
			<i class="mdi mdi-email-outline mx-0"></i>
			</div>
			</div>
			<div class="preview-item-content">
			<h6 class="preview-subject font-weight-medium text-dark">New user registration</h6>
			<p class="font-weight-light small-text">
			2 days ago
			</p>
			</div>
			</a>
			</div>
			</li-->
			<li class="nav-item dropdown d-none d-xl-inline-block">
			<a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
			<span class="profile-text">Hello, Admin!</span>
			<img class="img-xs rounded-circle" src="{{ asset('assets/admin/images/faces/face1.jpg') }}" alt="Profile image">
			</a>
			<div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
			<!--a class="dropdown-item p-0">
			<div class="d-flex border-bottom">
			<div class="py-3 px-4 d-flex align-items-center justify-content-center">
			<i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
			</div>
			<div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
			<i class="mdi mdi-account-outline mr-0 text-gray"></i>
			</div>
			<div class="py-3 px-4 d-flex align-items-center justify-content-center">
			<i class="mdi mdi-alarm-check mr-0 text-gray"></i>
			</div>
			</div>
			</a>
			<a class="dropdown-item mt-2">
			Manage Accounts
			</a>
			<a class="dropdown-item">
			Change Password
			</a>
			<a class="dropdown-item">
			Check Inbox
			</a-->
			<a href="{{ route('admin.auth.logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="dropdown-item">
			Sign Out
			</a>
			<form id="logout-form" action="{{ route('admin.auth.logout') }}" method="POST" style="display: none;">
				{{ csrf_field() }}
			</form>
			</div>
			</li>
			</ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="{{ asset('assets/admin/images/faces/face1.jpg') }}" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">Admin</p>
                  <div>
                    <small class="designation text-muted">Online</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
              <a href="{{ url('/') }}" class="btn btn-success btn-block">View Website</a>
            </div>
          </li>
			<!--li class="nav-item">
            <a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard </span>
            </a>
          </li-->
		  
			<li class="nav-item">
				<a class="nav-link" data-toggle="collapse" href="#ui-flowers" aria-expanded="false" aria-controls="ui-flowers">
					<i class="menu-icon mdi mdi-content-copy"></i>
						<span class="menu-title">Flowers</span>
					<i class="menu-arrow"></i>
				</a>
				<div class="collapse" id="ui-flowers">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/admin/all-flowers') }}">All Flowers</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/admin/add-flower') }}">Add Flower</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/admin/flower-categories') }}">Flower Categories</a>
						</li>
					</ul>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="collapse" href="#ui-plants" aria-expanded="false" aria-controls="ui-plants">
					<i class="menu-icon mdi mdi-content-copy"></i>
						<span class="menu-title">Plants</span>
					<i class="menu-arrow"></i>
				</a>
				<div class="collapse" id="ui-plants">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/admin/all-plants') }}">All Plants</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/admin/add-plant') }}">Add Plant</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/admin/plant-categories') }}">Plant Categories</a>
						</li>
					</ul>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="collapse" href="#ui-cakes" aria-expanded="false" aria-controls="ui-cakes">
					<i class="menu-icon mdi mdi-content-copy"></i>
						<span class="menu-title">Cakes</span>
					<i class="menu-arrow"></i>
				</a>
				<div class="collapse" id="ui-cakes">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/admin/all-cakes') }}">All Cakes</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/admin/add-cake') }}">Add Cake</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/admin/cake-categories') }}">Cake Categories</a>
						</li>
					</ul>
				</div>
			</li>
		<!-- 	<li class="nav-item">
				<a class="nav-link" data-toggle="collapse" href="#ui-occasions" aria-expanded="false" aria-controls="ui-occasions">
					<i class="menu-icon mdi mdi-content-copy"></i>
						<span class="menu-title">Occasions</span>
					<i class="menu-arrow"></i>
				</a>
				<div class="collapse" id="ui-occasions">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/admin/all-occasions') }}">All Occasions</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/admin/add-occasion') }}">Add Occasion</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/admin/occasion-categories') }}">Occasion Categories</a>
						</li>
					</ul>
				</div>
			</li> -->
			<li class="nav-item">
				<a class="nav-link" data-toggle="collapse" href="#ui-gifts" aria-expanded="false" aria-controls="ui-gifts">
					<i class="menu-icon mdi mdi-content-copy"></i>
						<span class="menu-title">Gifts</span>
					<i class="menu-arrow"></i>
				</a>
				<div class="collapse" id="ui-gifts">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/admin/all-gifts') }}">All Gifts</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/admin/add-gift') }}">Add Gift</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/admin/gift-categories') }}">Gift Categories</a>
						</li>
					</ul>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="collapse" href="#ui-attribute" aria-expanded="false" aria-controls="ui-attribute">
					<i class="menu-icon mdi mdi-content-copy"></i>
						<span class="menu-title">Attributes</span>
					<i class="menu-arrow"></i>
				</a>
				<div class="collapse" id="ui-attribute">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/admin/list-attributes') }}">All Attribute</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/admin/add-attribute') }}">Add Attribute</a>
						</li>
						<!-- <li class="nav-item">
							<a class="nav-link" href="{{ url('/admin/gift-categories') }}">Gift Categories</a>
						</li> -->
					</ul>
				</div>
			</li>

			<li class="nav-item">
				<a class="nav-link" data-toggle="collapse" href="#ui-pages" aria-expanded="false" aria-controls="ui-pages">
					<i class="menu-icon mdi mdi-content-copy"></i>
						<span class="menu-title">Pages</span>
					<i class="menu-arrow"></i>
				</a>
				<div class="collapse" id="ui-pages">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/admin/all-pages') }}">All Pages</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/admin/add-page') }}">Add Page</a>
						</li>
						
					</ul>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="collapse" href="#ui-cities" aria-expanded="false" aria-controls="ui-cities">
					<i class="menu-icon mdi mdi-content-copy"></i>
						<span class="menu-title">Cities</span>
					<i class="menu-arrow"></i>
				</a>
				<div class="collapse" id="ui-cities">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/admin/all-cities') }}">All Cities</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/admin/add-city') }}">Add City</a>
						</li>
						
					</ul>
				</div>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="collapse" href="#ui-order" aria-expanded="false" aria-controls="ui-order">
					<i class="menu-icon mdi mdi-content-copy"></i>
						<span class="menu-title">Orders</span>
					<i class="menu-arrow"></i>
				</a>
				<div class="collapse" id="ui-order">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/admin/all-orders') }}">All Orders</a>
						</li>
					<!-- 	<li class="nav-item">
							<a class="nav-link" href="{{ url('/admin/add-city') }}">Add City</a>
						</li> -->
						
					</ul>
				</div>
			</li>

			<li class="nav-item">
				<a class="nav-link" data-toggle="collapse" href="#ui-user" aria-expanded="false" aria-controls="ui-user">
					<i class="menu-icon mdi mdi-content-copy"></i>
						<span class="menu-title">Users</span>
					<i class="menu-arrow"></i>
				</a>
				<div class="collapse" id="ui-user">
					<ul class="nav flex-column sub-menu">
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/admin/all-users') }}">All Users</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ url('/admin/add-user') }}">Add User</a>
						</li>
						
					</ul>
				</div>
			</li>
		  
		  
		  
		  
		  
		  
		  
		  
          <!--li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-user" aria-expanded="false" aria-controls="ui-user">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Users</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-user">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/admin/all-users') }}">All Users</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/admin/add-user') }}">Add User</a>
                </li>
              </ul>
            </div>
          </li-->
		   <!--li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-product" aria-expanded="false" aria-controls="ui-product">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Products</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-product">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
					<a class="nav-link" href="{{ url('/admin/all-products') }}">All Products</a>
                </li>
                <li class="nav-item">
					<a class="nav-link" href="{{ url('/admin/add-product') }}">Add Product</a>
                </li>
              </ul>
            </div>
          </li-->
		 
		   <!--li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-categories" aria-expanded="false" aria-controls="ui-categories">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Categories</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-categories">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
					<a class="nav-link" href="{{ url('/admin/all-categories') }}">All Categories</a>
                </li>
                <li class="nav-item">
					<a class="nav-link" href="{{ url('/admin/add-category') }}">Add Category</a>
                </li>
              </ul>
            </div>
          </li>
		  
		  <li class="nav-item">
            <a class="nav-link" href="{{ url('/admin/all-categories') }}">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">Pages</span>
            </a>
          </li-->
		  
          <!--li class="nav-item">
            <a class="nav-link" href="pages/forms/basic_elements.html">
              <i class="menu-icon mdi mdi-backup-restore"></i>
              <span class="menu-title">Form elements</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/charts/chartjs.html">
              <i class="menu-icon mdi mdi-chart-line"></i>
              <span class="menu-title">Charts</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/tables/basic-table.html">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">Tables</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/icons/font-awesome.html">
              <i class="menu-icon mdi mdi-sticker"></i>
              <span class="menu-title">Icons</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <i class="menu-icon mdi mdi-restart"></i>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/login.html"> Login </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/register.html"> Register </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/error-404.html"> 404 </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/samples/error-500.html"> 500 </a>
                </li>
              </ul>
            </div>
          </li-->
        </ul>
      </nav>
      <!-- partial -->
		<div class="main-panel">
			<div class="content-wrapper">
				<div class="col-12 grid-margin">
					@if(session()->has('success'))
						<div class="alert alert-success">
							<?php echo session()->get('success'); ?>
						</div>
					@endif
					@if(session()->has('error'))
						<div class="alert alert-danger">
							<?php echo session()->get('error'); ?>
						</div>
					@endif
				</div>
				@yield('content')
			</div>
			<!-- content-wrapper ends -->
			<!-- partial:partials/_footer.html -->
			<!--footer class="footer">
				<div class="container-fluid clearfix">
					<span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018
						<a href="http://www.bootstrapdash.com/" target="_blank">Bootstrapdash</a>. All rights reserved.</span>
					<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
						<i class="mdi mdi-heart text-danger"></i>
					</span>
				</div>
			</footer-->
			<!-- partial -->
		</div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->




	<!-- plugins:js -->
	<script src="{{ asset('assets/admin/vendors/js/vendor.bundle.base.js') }}"></script>
	<script src="{{ asset('assets/admin/vendors/js/vendor.bundle.addons.js') }}"></script>
	<!-- endinject -->
	<!-- Plugin js for this page-->
	<script src="{{ asset('assets/admin/js/variation.js') }}"></script>
	<!-- DataTable js for this page-->
	<script src="https://cdn.datatables.net/r/dt/dt-1.10.9/datatables.min.js"></script>
	<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
	<!-- End DataTable js for this page-->
	
	<!-- End plugin js for this page-->
	<!-- inject:js -->
	<script src="{{ asset('assets/admin/js/off-canvas.js') }}"></script>
	<script src="{{ asset('assets/admin/js/misc.js') }}"></script>
	<!-- endinject -->
	<!-- Custom js for this page-->
	<script src="{{ asset('assets/admin/js/dashboard.js') }}"></script>	
	<!-- End custom js for this page-->
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	
	@yield('custom-js')
	<script type="text/javascript">
     $( function() {
    $( "#datepicker" ).datepicker();
  } );
</script>
<script type="text/javascript">
     $( function() {
    $( "#datepicker1" ).datepicker();
  } );
</script>
<script type="text/javascript">
   $('#datepicker').datepicker({
     dateFormat: 'dd-mm-yy'
   });
</script>
<script type="text/javascript">
   $('#datepicker1').datepicker({
     dateFormat: 'dd-mm-yy'
   });
</script>
	<script>
$(document).ready(function(){
     $('.immi_sidebar_admin .collapse.show').removeClass('show');
});
</script>
  
<script>
	$(document).ready(function(){


       $('#change_status').on('change',function(){

       	var status = $(this).val();
       	var orderid = $('#order_id').val();
       	
       	var url= "{{url('/admin/approve-order')}}";
        $.ajax({
		      url:url,
		      type: "post",
		      data:{
							'status' :status,
							'order_id' :orderid,
							'_token' :"{{ csrf_token() }}",
							
							},
    
      

      success: function (data) {
          
         
       
               location.reload();

    
       
      } 

    });
       });
    });
</script>
	
</body>
</html>