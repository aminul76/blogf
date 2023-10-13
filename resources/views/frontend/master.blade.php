<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Basic Page Needs
    ================================================== -->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<!-- Specific Meta
    ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	
	<!-- Titles
    ================================================== -->
	@php
	$setting=App\Models\Setting::first();
	$plugins=App\Models\Plugin::where('status',1)->get();
	@endphp

	<!-- Favicons
    ================================================== -->
	<link rel="shortcut icon" href="{{asset('/storage/app/public/'.$setting->website_favicon) }}" />
	<link rel="apple-touch-icon" sizes="72x72" href="{{asset('/storage/app/public/'.$setting->website_favicon) }}" />
	<link rel="apple-touch-icon" sizes="114x114" href="{{asset('/storage/app/public/'.$setting->website_favicon) }}" />

	<!-- Custom Font
	================================================== -->
	<link
		href="https://fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:wght@400;500;600;700;800&family=Barlow:wght@400;500;600;700&family=Roboto+Slab:wght@400;500;600;700;800&family=Roboto:wght@400;500;700&display=swap"
		rel="stylesheet">

	<!-- CSS
    ================================================== -->
	<link rel="stylesheet" href="{{('frontend/assets')}}/assets/css/bootstrap.min.css" />
	<link rel="stylesheet" href="{{('frontend/assets')}}/assets/css/magnific-popup.css" />
	<link rel="stylesheet" href="{{('frontend/assets')}}/assets/css/owl.carousel.min.css" />
	<link rel="stylesheet" href="{{('frontend/assets')}}/assets/css/simple-scrollbar.css" />
	<link rel="stylesheet" href="{{('frontend/assets')}}/assets/css/fontawesome.all.min.css" />
	<link rel="stylesheet" href="{{('frontend/assets')}}/assets/css/style.css" />

	<script src="{{('frontend/assets')}}/assets/js/modernizr.min.js"></script>
		@yield('seo')

		@foreach ($plugins as $plugin)
			{!!$plugin->header_code!!}
		@endforeach
		

</head>

<body class="bg-white-smoke">
	@foreach ($plugins as $plugin)
			{!!$plugin->body_code!!}
	@endforeach
	<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
        Start Preloader
    ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
	{{-- <div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div><!-- /preloader-icon -->
		</div><!-- /preloader-inner -->
	</div> --}}
    <!-- /preloader -->

	<div class="site-content">
		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            Start Site Header
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		@include('frontend.include.header')
		<!--~~./ end site header ~~-->
		<!--~~~ Sticky Header ~~~-->
		<div id="sticky-header" class="active"></div>
		<!--~./ end sticky header ~-->

		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
				Start Frontpage Slider Posts
		~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
	
        @yield('content')
		<!--~./ end main wrapper ~-->

		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            Start Site Footer
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		@include('frontend.include.footer')
		<!--~./ end site footer ~-->
	</div>
	@yield('js')
	<!--~~./ end site content ~~-->

	<!-- All The JS Files

		
    ================================================== -->
	<script src="{{('frontend/assets')}}/assets/js/jquery.js"></script>
	<script src="{{('frontend/assets')}}/assets/js/popper.min.js"></script>
	<script src="{{('frontend/assets')}}/assets/js/bootstrap.min.js"></script>
	<script src="{{('frontend/assets')}}/assets/js/plugins.js"></script>
	<script src="{{('frontend/assets')}}/assets/js/imagesloaded.pkgd.min.js"></script>
	<script src="{{('frontend/assets')}}/assets/js/simple-scrollbar.min.js"></script>
	<script src="{{('frontend/assets')}}/assets/js/jquery.magnific-popup.min.js"></script>
	<script src="{{('frontend/assets')}}/assets/js/masonry.pkgd.min.js"></script>
	<script src="{{('frontend/assets')}}/assets/js/theia-sticky-sidebar.min.js"></script>
	<script src="{{('frontend/assets')}}/assets/js/ResizeSensor.min.js"></script>
	<script src="{{('frontend/assets')}}/assets/js/owl.carousel.min.js"></script>
	<script src="{{('frontend/assets')}}/assets/js/scrolla.jquery.min.js"></script>
	<script src="{{('frontend/assets')}}/assets/js/main.js"></script>
	<!-- main-js -->
</body>

</html>