<!DOCTYPE html>
<html lang="zxx">
<head>
	<meta charset="utf-8">
	<title>Library Homepage</title>
	

	<meta name="description" content="----">

	<meta name="keywords" content="Premium HTML Template">

	<meta name="author" content="HTMLmate">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- css-include -->

	<!-- boorstrap -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
	<!-- themify-icon.css -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/themify-icons.css')}}">
	<!-- owl-carousel -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.css')}}">
	<!-- light-box -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/lightbox.css')}}">
	<!-- video css -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/video.min.css')}}">
	<!-- menu.css -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/menu.css')}}">
	<!-- style -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/style.css')}}">
	<!-- responsive.css -->
	<link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>


<body>
<div id="preloader"></div>
	<!-- Start of nav bar 
		============================================= -->

		 <nav id="poppin-nav">
			<div id="nav-off"></div>
			<div id="header-logo-1" class="text-center">
				<img src="{{asset('assets/img//logo/logo.png')}}" alt="img">
			</div>
			<ul id="menu">
		
				<li class="has-submenu">
				        <li><a href="{{ route('homepage')}}">Homepage</a></li>				
						<li><a href="#foot">Blog</a></li>
						<li><a href="{{ route('contact')}}">Contact Us</a></li>
						<li><a href="{{ route('aboutus')}}">About Us</a></li>
						@if(Auth::check())
						<li><a href="{{ route('logout')}}">LogOut</a></li>
                        @endif
			</ul>
		</nav>
		<div id="menu-overlay"></div>
	<!-- End of nav bar 
		============================================= -->



	<!-- Start of header
		============================================= -->
		<header id="site-header" class="not-stuck">
			<div class="container">
				<div class="row">
					<div id="header-logo">
						<img src="{{asset('assets/img//logo/logo.png')}}" alt="img">
					</div>

					<div id="menu-burger" class="pull-right not-stuck">
						<div id="menu-bar">
							<span class="icon-bar top"></span>
							<span class="icon-bar middle"></span>
							<span class="icon-bar bottom"></span>
						</div>
					</div>
				</div>
			</div>
		</header>
	<!-- End of header
		============================================= -->


@yield('content')





	<!-- Start of footer section
		============================================= -->
		<footer>
			<div class="footer-area footer-2">
				<div class="container">
					<div class="row">
						<div class="copy-right-area text-center">
							<div class="page-head-social-item ul-li">
								<ul class="page-head-social-list">
									<li><a href="{{asset('https://www.facebock.com')}}">
									<span class="ti-facebook"></span></a></li>
									<li><a href="{{asset('https://www.twitter.com')}}">
									<span class="ti-twitter-alt"></span></a></li>
									<li><a href="{{asset('https://www.google.com')}}">
									<span class="ti-google"></span></a></li>
									<li><a href="{{asset('https://www.instagram.com')}}">
									<span class="ti-instagram"></span></a></li>
								</ul><!-- /.page-head-social-list -->
							</div>
							<span>{{config('app.name')}} {{date('Y')}} </span>
						</div>
						<!-- //copy-right-area -->
					</div><!--  /.container -->
				</div><!--  /.row-->
			</div><!--  /.footer-area -->
		</footer>
	<!-- End of footer section
		============================================= -->



		<!--  Js Library -->
		<script src="{{asset('assets/js/jquery-2.1.4.min.js')}}"></script>
		<!-- Include  for bootstrap -->
		<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
		<!-- Include isotope Js -->
		<script src="{{asset('assets/js/jquery.isotope.min.js')}}"></script>
		<!-- Include lightbox -->
		<script src="{{asset('assets/js/lightbox.js')}}"></script>
		<!-- Include circle-effect.js -->
		<script src="{{asset('assets/js/circle-effect.js')}}"></script>
		<!-- Include Video js -->
		<script src="{{asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
		<!-- Include Owl-carousel -->
		<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
		<!-- Include Counter up -->
		<script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
		<script src="{{asset('assets/js/waypoints.min.js')}}"></script>



		<!-- Include script.js -->
		<script src="{{asset('assets/js/script.js')}}"></script>


	</body>
	</html>