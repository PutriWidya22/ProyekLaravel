<!DOCTYPE HTML>
<html>
	<head>
	<title>Alesha Website</title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Rokkitt:100,300,400,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{ asset('02Customer') }}/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{ asset('02Customer') }}/css/icomoon.css">
	<!-- Ion Icon Fonts-->
	<link rel="stylesheet" href="{{ asset('02Customer') }}/css/ionicons.min.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ asset('02Customer') }}/css/bootstrap.min.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="{{ asset('02Customer') }}/css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{ asset('02Customer') }}/css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="{{ asset('02Customer') }}/css/owl.carousel.min.css">
	<link rel="stylesheet" href="{{ asset('02Customer') }}/css/owl.theme.default.min.css">
	
	<!-- Date Picker -->
	<link rel="stylesheet" href="{{ asset('02Customer') }}/css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="{{ asset('02Customer') }}/fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{ asset('02Customer') }}/css/style.css">

	</head>
	<body>
		
	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<!-- Header -->
			{{-- @include('client.component.header') --}}
			@yield('header')
			<!-- End Header -->
				
			<!-- Iklan -->
			@include('client.component.iklan')
			<!-- End Iklan -->
		</nav>

		<!-- Content -->
		<section id="main-content">
			@yield('content')
		<!-- End Content -->

		<!-- ======= Footer ======= -->
		@include('client.component.footer')
		<!-- End Footer -->
	</div>

	<div class="gototop js-top">
		<a href="#" class="{{ asset('02Customer') }}/js-gotop"><i class="ion-ios-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="{{ asset('02Customer') }}/js/jquery.min.js"></script>
	{{-- <script src="{{ asset('02Customer') }}/js/jquery-3.2.1.min.js"></script> --}}
	<!-- popper -->
	<script src="{{ asset('02Customer') }}/js/popper.min.js"></script>
	<!-- bootstrap 4.1 -->
	<script src="{{ asset('02Customer') }}/js/bootstrap.min.js"></script>
	<!-- jQuery easing -->
	<script src="{{ asset('02Customer') }}/js/jquery.easing.1.3.js"></script>
	<!-- Waypoints -->
	<script src="{{ asset('02Customer') }}/js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="{{ asset('02Customer') }}/js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="{{ asset('02Customer') }}/js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="{{ asset('02Customer') }}/js/jquery.magnific-popup.min.js"></script>
	<script src="{{ asset('02Customer') }}/js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="{{ asset('02Customer') }}/js/bootstrap-datepicker.js"></script>
	<!-- Stellar Parallax -->
	<script src="{{ asset('02Customer') }}/js/jquery.stellar.min.js"></script>
	<!-- Main -->
	<script src="{{ asset('02Customer') }}/js/main.js"></script>

	</body>
</html>