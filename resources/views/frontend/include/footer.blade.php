@php
	$setting=App\Models\Setting::first();
	$categories=App\Models\Category::where('category_status',1)->orderBy('category_number', 'asc')->orderBy('id', 'desc')->limit(4)->get();
@endphp



<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            Start Site Footer
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<footer class="site-footer footer-style-two">
			<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
                Start Instagram Widget Area
            ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
			{{-- <div class="instagram-widget-area pd-b-35">
				<div class="widget bt-instafeed-widget style-two">
					<ul id="instafeed">
						<li class="feed-item">
							<a href="#">
								<img src="{{('frontend/assets')}}/assets/images/widget/instagram/1/img1.jpg" alt="#">
								<div class="overlay"><i class="fab fa-instagram"></i></div>
							</a>
						</li>
						<li class="feed-item">
							<a href="#">
								<img src="{{('frontend/assets')}}/assets/images/widget/instagram/1/img2.jpg" alt="#">
								<div class="overlay"><i class="fab fa-instagram"></i></div>
							</a>
						</li>
						<li class="feed-item">
							<a href="#">
								<img src="{{('frontend/assets')}}/assets/images/widget/instagram/1/img3.jpg" alt="#">
								<div class="overlay"><i class="fab fa-instagram"></i></div>
							</a>
						</li>
						<li class="feed-item">
							<a href="#">
								<img src="{{('frontend/assets')}}/assets/images/widget/instagram/1/img4.jpg" alt="#">
								<div class="overlay"><i class="fab fa-instagram"></i></div>
							</a>
						</li>
						<li class="feed-item">
							<a href="#">
								<img src="{{('frontend/assets')}}/assets/images/widget/instagram/1/img5.jpg" alt="#">
								<div class="overlay"><i class="fab fa-instagram"></i></div>
							</a>
						</li>
						<li class="feed-item">
							<a href="#">
								<img src="{{('frontend/assets')}}/assets/images/widget/instagram/1/img6.jpg" alt="#">
								<div class="overlay"><i class="fab fa-instagram"></i></div>
							</a>
						</li>
						<li class="feed-item">
							<a href="#">
								<img src="{{('frontend/assets')}}/assets/images/widget/instagram/1/img7.jpg" alt="#">
								<div class="overlay"><i class="fab fa-instagram"></i></div>
							</a>
						</li>
					</ul>
				</div>
				<!--/.widget-instafeed-->
			</div> --}}
			<!--~./ end instagram widget area ~-->
			<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
					Start Footer Widget Area
				~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
			<div class="footer-widget-area">
				<div class="container">
					<div class="row">
						<!--~~~~~ Start Widget Location ~~~~~-->
						<div class="col-lg-4 col-md-6">
							<aside class="widget bt-location-widget">
								<h2 class="widget-title">{{$setting->website_name}}</h2>
								<div class="widget-content">
									<div class="info-box">
										<p>
											{{$setting->website_short_description}}
										</p>
									</div>
									
								</div>
							</aside>
						</div>
						<!--~./ end location widget ~-->

						<!--~~~~~ Start Widget Links ~~~~~-->
						<div class="col-lg-2 col-md-6">
							<aside class="widget widget_links">
								<h2 class="widget-title">Quick Links</h2>
								<div class="widget-content">
									<ul>
										<li><a href="#">Careers</a></li>
										<li><a href="#">Services</a></li>
										<li><a href="#">Stories</a></li>
										<li><a href="{{route('login')}}">Login</a></li>
									</ul>
								</div>
							</aside>
						</div>
						<!--~./ end links widget ~-->
						<!--~~~~~ Start Widget Links ~~~~~-->
						<div class="col-lg-2 col-md-6">
							<aside class="widget widget_links">
								<h2 class="widget-title">Categories</h2>
								<div class="widget-content">
									<ul>
											@foreach($categories as $category)
												<li>
													<a  href="{{url("/".$category->category_url)}}">{{ $category->category_name }}
													</a>
												</li>
											@endforeach
									</ul>
								</div>
							</aside>
						</div>
						<!--~./ end links widget ~-->

							<!--~~~~~ Start Widget Location ~~~~~-->
							<div class="col-lg-4 col-md-6">
								<aside class="widget bt-location-widget">
									<h2 class="widget-title">Our Address</h2>
									<div class="widget-content">
										<div class="info-box">
											<p>
												{{$setting->website_address}}
											</p>
										</div>
										<div class="info-box">
											<p>{{$setting->website_phone_number}}</p>
											<p>
												{{$setting->website_email}}
											</p>
										</div>
									</div>
								</aside>
							</div>
							<!--~./ end location widget ~-->
					</div>
				</div>
			</div>
			<!--~./ end footer widgets area ~-->

			<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
				Start Footer Bottom Area
			~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
			<div class="footer-bottom-area">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<div class="footer-bottom-content">
								<div class="copyright-text text-center">
									<p>
										Copyright - {{ now()->year }} {{$setting->website_name}} theme by
										<a href="#">{{$setting->website_name}}</a>
									</p>
								</div>
								<!--~./ end copyright text ~-->
							</div>
						</div>
						<!--~./ col-12 ~-->
					</div>
				</div>
			</div>
			<!--~./ end footer bottom area ~-->
		</footer>
		<!--~./ end site footer ~-->