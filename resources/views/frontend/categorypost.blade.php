@extends('frontend.master')



@section('seo')

<title>{{$category->meta_title}}</title>
<meta name="description"  content="{{$category->meta_description}}">
<meta name="keywords" content="{{$category->meta_keyword}}">

<link rel="canonical" href="{{url("/".$category->category_url)}}">
	<!-- Links to a document that describes a collection of records, documents, or other materials of historical interest -->
<link rel="archives" href="{{url("/".$category->category_url)}}">

<!-- Links to top level resource in an hierarchical structure -->
<link rel="index" href="{{url("/".$category->category_url)}}">



<meta property="og:url" content="{{url("/".$category->category_url)}}">

<meta property="og:title" content="{{$category->meta_title}}">
<meta property="og:image" content="{{asset('storage/app/public/' . $category->fb_share_image)}}">
<meta property="og:image:alt" content="{{$category->meta_title}}">
<meta property="og:image:size" content="300">
<meta property="og:description" content="{{$category->meta_description}}">




<meta name="twitter:card" content="summary">

<meta name="twitter:url" content="{{url("/".$category->category_url)}}">
<meta name="twitter:title" content="{{$category->meta_title}}">
<meta name="twitter:description" content="{{$category->meta_description}}">
<meta name="twitter:image" content="{{asset('storage/app/public/' . $category->fb_share_image)}}">
<meta name="twitter:image:alt" content="{{$category->meta_title}}">




<meta itemprop="name" content="{{$category->meta_title}}">
<meta itemprop="image" content="{{asset('storage/app/public/' . $category->fb_share_image)}}">
<meta name="description" itemprop="description" content="{{$category->meta_description}}">



<meta name="pinterest" content="nopin" description="{{$category->meta_description}}">


{!!$category->custom_code!!}
@endsection




@section('content')
<!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
			
		


		-~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~
            Start Main Wrapper
        ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
		<div class="main-wrapper pd-b-120">
			<div class="container">
				<div class="row justify-content-between gutters-50">
					<div class="col-lg-9 main-wrapper-content">
						<!--~~~~~ Start Site Main ~~~~~-->
						<main class="site-main style-one">
							<div class="row gutters-50">

								

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
						
                        <nav class="navigation paging-navigation pd-t-30">
                            <ul class="nav-links">
                                @if ($posts->onFirstPage())
                                    <li class="disabled"><span>&laquo;</span></li>
                                @else
                                    <li><a href="{{ $posts->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                                @endif
                        
                                @foreach ($posts->getUrlRange(1, $posts->lastPage()) as $page => $url)
                                    @if ($page == $posts->currentPage())
                                        <li class="active"><span class="page-numbers">{{ $page }}</span></li>
                                    @else
                                        <li><a href="{{ $url }}" class="page-numbers">{{ $page }}</a></li>
                                    @endif
                                @endforeach
                        
                                @if ($posts->hasMorePages())
                                    <li><a href="{{ $posts->nextPageUrl() }}" rel="next">&raquo;</a></li>
                                @else
                                    <li class="disabled"><span>&raquo;</span></li>
                                @endif
                            </ul>
                        </nav>
                        

						
						


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