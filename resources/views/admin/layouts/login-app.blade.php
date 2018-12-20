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

	<!-- plugins:css -->
	<link rel="stylesheet" href="{{ asset('assets/admin/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/admin/vendors/css/vendor.bundle.base.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/admin/vendors/css/vendor.bundle.addons.css') }}">
	<!-- endinject -->
	<!-- plugin css for this page -->
	<!-- End plugin css for this page -->
	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('assets/admin/css/style.css') }}">
	<!-- endinject -->
	<link rel="shortcut icon" href="{{ asset('assets/admin/images/favicon.png') }}" />
	
	
</head>
<body>
	<div class="container-scroller">
		<div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
				<div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
					<div class="row w-100">
						<div class="col-lg-4 mx-auto">
							<div class="auto-form-wrapper">
							@yield('content')
							</div>
							<!--ul class="auth-footer">
								<li>
									<a href="#">Conditions</a>
								</li>
								<li>
									<a href="#">Help</a>
								</li>
								<li>
									<a href="#">Terms</a>
								</li>
							</ul>
							<p class="footer-text text-center">copyright © 2018 Bootstrapdash. All rights reserved.</p-->
						</div>
					</div>
				</div>
		  <!-- content-wrapper ends -->
		</div>
		<!-- page-body-wrapper ends -->
	</div>
  <!-- container-scroller -->


	<!-- plugins:js -->
	<script src="{{ asset('assets/admin/vendors/js/vendor.bundle.base.js') }}"></script>
	<script src="{{ asset('assets/admin/vendors/js/vendor.bundle.addons.js') }}"></script>
	<!-- endinject -->
	<!-- Plugin js for this page-->
	<!-- End plugin js for this page-->
	<!-- inject:js -->
	<script src="{{ asset('assets/admin/js/off-canvas.js') }}"></script>
	<script src="{{ asset('assets/admin/js/misc.js') }}"></script>
	<!-- endinject -->
	<!-- Custom js for this page-->
	<script src="{{ asset('assets/admin/js/dashboard.js') }}"></script>
	<!-- End custom js for this page-->
</body>
</html>