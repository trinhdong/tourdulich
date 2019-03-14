<!DOCTYPE html>
<html lang="en">
<head>
	<title>Phiêu Bạt | @yield('title')</title>

	<base href="{{asset('')}}" target="_blank, _self, _parent, _top">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Travello template project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">

	{{-- CSS Trang chu --}}
	<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/responsive.css">
	{{-- CSS Liên hệ --}}
	<link rel="stylesheet" type="text/css" href="styles/contact.css">
	<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
	{{-- CSS Loại tour --}}
	<link rel="stylesheet" type="text/css" href="styles/destinations.css">
	<link rel="stylesheet" type="text/css" href="styles/destinations_responsive.css">
	{{-- CSS chi tiết tour --}}
	<link rel="stylesheet" type="text/css" href="styles/about.css">
	<link rel="stylesheet" type="text/css" href="styles/about_responsive.css">


	


	@yield('css')

</head>
<body>

	@include('layouts.header')
	
	@yield('content')
	<!-- Footer -->

	@include('layouts.footer')


	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="styles/bootstrap4/popper.js"></script>
	<script src="styles/bootstrap4/bootstrap.min.js"></script>
	<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
	<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
	<script src="plugins/easing/easing.js"></script>
	<script src="plugins/parallax-js-master/parallax.min.js"></script>
	<script src="js/custom.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
	<script src="js/contact.js"></script>
	<script src="js/destinations.js"></script>
	<script src="js/about.js"></script>

	@yield('script')
</body>
</html>