@extends('frontend.master')



@section('seo')
<title>{{$siteSetting->meta_title}}</title>
<meta name="description" content="{{$siteSetting->meta_description}}">
<meta name="keywords" content="{{$siteSetting->meta_keyword}}">
<link rel="canonical" href="{{ url("/") }}">
<meta property="og:url" content="{{ url("/") }}">
<meta property="og:title" content="{{$siteSetting->meta_title}}">
<meta property="og:image" content="{{ asset('/storage/app/public/'.$siteSetting->website_banner) }}">
<meta property="og:image:alt" content="{{$siteSetting->logo_title}}">
<meta property="og:image:size" content="300">
<meta property="og:description" content="{{ $siteSetting->meta_description }}">
<meta name="twitter:card" content="summary">
<meta name="twitter:url" content="{{ url("/") }}">
<meta name="twitter:title" content="{{ $siteSetting->meta_title }}">
<meta name="twitter:description" content="{{ $siteSetting->meta_description }}">
<meta name="twitter:image" content="{{ asset('/storage/app/public/'.$siteSetting->website_banner) }}">
<meta name="twitter:image:alt" content="{{ $siteSetting->logo_title }}">
<meta itemprop="name" content="{{ $siteSetting->meta_title }}">
<meta itemprop="image" content="{{ asset('/storage/app/public/'.$siteSetting->website_banner) }}">
<meta name="description" itemprop="description" content="{{ $siteSetting->meta_description }}">
<meta name="pinterest" content="nopin" description="{{ $siteSetting->meta_description }}">
@endsection




@section('content')
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
				Start Frontpage Slider Posts
		~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<div class="frontpage-slider-posts">
			<div class="container-medium">
				<div class="row">
					<div class="col-12">
						<div class="owl-carousel frontpage-slider-one style-one carousel-rectangle carousel-nav-center">
							
							<!--~~~~~ Start Post ~~~~~-->
							@foreach ($slide_posts as $slide_post)
							<article class="post hentry post-slider-one text-center">
								<div class="entry-thumb">
									<figure class="thumb-wrap">
										<a href="{{url("/".$slide_post->post_custom_url)}}">
											{{-- <img src="{{('frontend/assets')}}/assets/images/post/slider/one/post1.jpg" alt="post" /> --}}
											<img src="{{ asset('storage/app/public/' . $slide_post->post_image) }}" alt="{{ $slide_post->meta_title }}" width="1268" height="634">

										</a>
									</figure>
									<!--./ thumb-wrap -->
								</div>
								<!--./ entry-thumb -->
								<div class="content-entry-wrap">
									
									<!--./ entry-category -->
									<h3 class="entry-title">
										<a href="{{url("/".$slide_post->post_custom_url)}}"> {{$slide_post->post_title}}</a>
									</h3>
									<!--./ entry-title -->
									<div class="entry-content">
										<div class="read-more-wrap">
											<a class="read-more" href="{{url("/".$slide_post->post_custom_url)}}">Read Details</a>
										</div>
									</div>
									<!--./ entry-content -->
								</div>
								<!--./ content-entry-wrap -->
							</article>
							<!--~./ end post ~-->
							<!--~~~~~ Start Post ~~~~~-->
							@endforeach
							<!--~./ end post ~-->
						</div>
						<!--/#frontpage-slide -->
					</div>
				</div>
			</div>
		</div>
		<!--~./End frontpage slider posts ~-->

		


		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            Start Main Wrapper
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<div class="main-wrapper pd-b-120">
			<div class="container">
				<div class="row justify-content-between gutters-50">
					<div class="col-lg-9 main-wrapper-content">
						<!--~~~~~ Start Site Main ~~~~~-->
						<main class="site-main style-one">
							<div class="row gutters-50">

								@foreach ($home_posts as $home_post)
								<!--~~~~~ Start Post ~~~~~-->
								<div class="col-lg-12">
									<article class="post hentry style-one text-center">
										<div class="entry-thumb">
											<figure class="thumb-wrap">
												<a href="{{url("/".$home_post->post_custom_url)}}">

													<img src="{{ asset('storage/app/public/' . $home_post->post_image) }}" alt="{{ $home_post->meta_title }}" width="825" height="523">

												</a>
											</figure>
											<!--./ thumb-wrap -->
										</div>
										<!--./ entry-thumb -->
										<div class="content-entry-wrap">
											
											<!--./ entry-category -->
											<h3 class="entry-title">
												<a href="{{url("/".$home_post->post_custom_url)}}">  {{$home_post->post_title}}</a>
											</h3>
											<!--./ entry-title -->
											<div class="entry-meta-content">
												
												<!--./ entry-date -->
												<div class="entry-date">
													<span>{{ \Carbon\Carbon::parse($home_post->updated_at)->format('j-M-y') }}</span>
												</div>
												<!--./ entry-date -->
											</div>
											<!--./ entry-meta-content -->
											<div class="entry-content">
												<div class="entry-summary">
													<p>
														{{ Illuminate\Support\Str::limit($home_post->post_short_description, 200) }}
													</p>
												</div>
												<div class="read-more-wrap">
													<a class="read-more" href="{{url("/".$home_post->post_custom_url)}}">Read More</a>
												</div>
											</div>
											<!--./ entry-content -->
										</div>
										<!--./ content-entry-wrap -->
									</article>
								</div>
								<!--~./ end post ~-->

								@endforeach

								@foreach ($posts as $post)
								<!--~~~~~ Start Post ~~~~~-->
								<div class="col-lg-6 col-md-6">
									<article class="post hentry post-grid text-center style-one">
										<div class="entry-thumb">
											<figure class="thumb-wrap">
												<a href="{{url("/".$post->post_custom_url)}}">
													<img src="{{ asset('storage/app/public/' . $post->post_image) }}" alt="{{ $post->meta_title }}" width="333" height="301">
												</a>
											</figure>
											<!--./ thumb-wrap -->
										</div>
										<!--./ entry-thumb -->
										<div class="content-entry-wrap">
											
											<!--./ entry-category -->
											<h3 class="entry-title">
												<a href="{{url("/".$post->post_custom_url)}}">                                      
													 {{$post->post_title}}
												</a>
											</h3>
											<!--./ entry-title -->
											<div class="entry-meta-content">
											
												<!--./ entry-date -->
												<div class="entry-date">
													<span>{{ \Carbon\Carbon::parse($post->updated_at)->format('j-M-y') }}
													</span>
												</div>
												<!--./ entry-date -->
											</div>
											<!--./ entry-meta-content -->
											<div class="read-more-wrap">
												<a class="read-more" href="{{url("/".$post->post_custom_url)}}">Read Details</a>
											</div>
											<!--./ entry-content -->
										</div>
										<!--./ content-entry-wrap -->
									</article>
								</div>
								<!--~./ end post ~-->
								
								
								@endforeach
								<!--~./ end post ~-->
							</div>
						</main>
						<!--~./ end site main ~-->

						<!--~~~~~ Start Paging Navigation ~~~~~-->
						<div class="read-more-wrap">
							<a class="read-more" href="{{url("/all-blogs")}}">All Blogs</a>
						</div>


						
						


						<!--~./ end paging navigation ~-->
					</div>

					<!--~~~~~ Start sidebar ~~~~~-->
					@include('frontend.sidebar')
					<!--~./ end sidebar ~-->
				</div>
			</div>
		</div>
		<!--~./ end main wrapper ~-->
@endsection