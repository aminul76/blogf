@extends('frontend.master')



@section('seo')

<title>{{$post->meta_title}}</title>
<meta name="description"  content="{{$post->meta_description}}">
<meta name="keywords" content="{{$post->meta_keyword}}">

<link rel="canonical" href="{{url("/".$post->post_custom_url)}}">
	<!-- Links to a document that describes a collection of records, documents, or other materials of historical interest -->
<link rel="archives" href="{{url("/".$post->post_custom_url)}}">

<!-- Links to top level resource in an hierarchical structure -->
<link rel="index" href="{{url("/".$post->post_custom_url)}}">



<meta property="og:url" content="{{url("/".$post->post_custom_url)}}">

<meta property="og:title" content="{{$post->meta_title}}">
<meta property="og:image" content="{{asset('storage/app/public/' . $post->fb_image)}}">
<meta property="og:image:alt" content="{{$post->meta_title}}">
<meta property="og:image:size" content="300">
<meta property="og:description" content="{{$post->meta_description}}">




<meta name="twitter:card" content="summary">

<meta name="twitter:url" content="{{url("/".$post->post_custom_url)}}">
<meta name="twitter:title" content="{{$post->meta_title}}">
<meta name="twitter:description" content="{{$post->meta_description}}">
<meta name="twitter:image" content="{{asset('storage/app/public/' . $post->fb_image)}}">
<meta name="twitter:image:alt" content="{{$post->meta_title}}">




<meta itemprop="name" content="{{$post->meta_title}}">
<meta itemprop="image" content="{{asset('storage/app/public/' . $post->fb_image)}}">
<meta name="description" itemprop="description" content="{{$post->meta_description}}">



<meta name="pinterest" content="nopin" description="{{$post->meta_description}}">


{!!$post->post_custom_code!!}
@endsection




@section('content')
	
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
			Start Preloader
	~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->


		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
				Start Site Header
		~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
	

		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            Start Main Wrapper
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<div class="main-wrapper pd-b-100">
			<!-- Blog Items -->
			<div class="blog-single-page">
				<article class="post single-post single-post-one">
					<div class="container">
						<div class="post-thumbnail-area">
							<figure class="post-thumb">

								<img src="{{ asset('storage/app/public/' . $post->post_image) }}" alt="{{ $post->meta_title }}" width="1141" height="723">
                            </figure><!-- /.post-thumb -->
							<div class="entry-header-outer">
								<div class="entry-header">
								
									<!--./ entry-category -->
									<h3 class="entry-title">

                                       {{$post->post_title}}
									</h3>
									<!--./ entry-title -->
									
									<!--./ entry-meta-content -->
								</div><!-- /.entry-header-outer -->
							</div>
						</div>

						<div class="post-details">
							<div class="social-network">
								<ul class="social-share">
									
								</ul><!-- /.social-share -->
							</div>
							<div class="entry-content">
								<p style="text-align: justify">{{$post->post_short_description}}</p>
								
                                 
								{!!$post->post_description!!}
								
									
							</div><!--  /.entry-content -->
						</div><!--  /.post-details -->
						
					</div>
				</article><!-- /.post -->

				
			</div><!--  /.blog-latest-items -->
		</div>
		<!--~./ end main wrapper ~-->

		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
      Start Subscribe Section
		~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		
		<!--~./ end subscribe section ~-->

		<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
				Start Site Footer
		~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		
		<!--~./ end site footer ~-->

	<!--~~./ end site content ~~-->

	<!-- All The JS Files
	================================================== -->
    @endsection
    @section('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var images = document.querySelectorAll("img");
        
            images.forEach(function(image) {
                image.classList.add("img-responsive");
                image.style.maxWidth = "100%";
            });
        });
        </script>
        
    @endsection