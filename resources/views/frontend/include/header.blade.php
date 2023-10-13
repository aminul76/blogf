
@php
	$setting=App\Models\Setting::first();
	$categories=App\Models\Category::where('header_show',1)->where('category_status',1)->orderBy('category_number', 'asc')->orderBy('id', 'desc')->limit(4)->get();
@endphp


<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            Start Site Header
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<header class="site-header default-header-style intro-element">
			<div class="header-top-area">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-4">
							<div class="intro-socail-share">
								<div class="share-alt"><span class="fa fa-share-alt"></span></div>
								<div class="socail-share">
									<a target="_blank" href="{{$setting->website_fb}}"><span class="fab fa-facebook-f"></span></a>
									<a target="_blank" href="{{$setting->website_tw}}"><span class="fab fa-twitter"></span></a>
									<a target="_blank" href="{{$setting->website_yt}}"><span class="fab fa-youtube"></span></a>
									<a target="_blank" href="{{$setting->website_ln}}"><span class="fab fa-linkedin-in"></span></a>
								</div>
							</div><!-- /.intro-socail-share -->
						</div>
						<div class="col-4">
							<div class="site-branding text-center">
								<a href="{{url('/')}}">

									<img src="{{asset('/storage/app/public/'.$setting->website_logo) }}" alt="{{$setting->logo_title}}" />
								</a>
							</div><!-- /.site-branding -->
						</div>
						<div class="col-4">
							<div class="header-right-area">
								{{-- <div class="search-wrap">
									<div class="search-btn">
										<i class="fas fa-search"></i>
									</div>
									<div class="search-form">
										<form action="#">
											<input type="search" placeholder="Search">
											<button type="submit"><i class="fas fa-search"></i></button>
										</form>
									</div>
								</div> --}}
								<!--~./ search-wrap ~-->
								<!-- <div class="header-card-area">
									<a href="#">
										<span class="fas fa-shopping-cart"></span>
										<sup>2</sup>
									</a>
								</div> -->
								<!--~./ header card area ~-->

								<div class="hamburger-menus">
									<span></span>
									<span></span>
									<span></span>
								</div>
							</div><!-- /.header-top-right-area -->
						</div>
					</div>
				</div>
			</div><!-- /.header-top-area -->

			<div class="navigation-area">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="site-navigation">
								<nav class="navigation">
									<div class="menu-wrapper">
										<div class="menu-content">
											<ul class="mainmenu">
												<li class="megamenu">
													<a  href="{{url('/')}}">Home</a>
													
												</li>

												@foreach($categories as $category)
												<li>
													<a  href="{{url("/".$category->category_url)}}">{{ $category->category_name }}
													</a>
												</li>
											@endforeach


											</ul> <!-- /.menu-list -->
										</div> <!-- /.hours-content-->
									</div><!-- /.menu-wrapper -->
								</nav>
							</div><!-- /.site-navigation -->
						</div><!-- /.col-12 -->
					</div><!-- /.row -->
				</div><!-- /.container -->
			</div><!-- /.navigation-area -->

			<div class="mobile-sidebar-menu sidebar-menu">
				<div class="overlaybg"></div>
			</div>
		</header>
		<!--~~./ end site header ~~-->