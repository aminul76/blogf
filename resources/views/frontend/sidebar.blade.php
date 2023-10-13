
@php
    $setting=App\Models\Setting::first();
	$categories=App\Models\Category::where('header_show',1)->where('category_status',1)->orderBy('category_number', 'asc')->orderBy('id', 'desc')->limit(4)->get();
    $posts=App\Models\Post::where('status',1)->orderBy('post_number', 'asc')->orderBy('id', 'desc')->limit(4)->get();
@endphp



<!--~~~~~ Start sidebar ~~~~~-->
<div class="col-lg-3">
    <!-- Sidebar Items -->
    <div class="sidebar-items style-one">
        <!--~~~~~ Start About Me Widget ~~~~~-->
        <aside class="widget bt-about-me-widget">
            <h4 class="widget-title">
                About Me
            </h4>
            <!-- /.widget-title -->
            <div class="widget-content">
                <div class="author-thumb">
                    <a href="#">
                        <img src="{{ asset('/storage/app/public/'.$siteSetting->website_banner) }}" alt="img"  width="75" height="75" />
                    </a>
                </div>
                <div class="info">
                    <h3 class="designation">{{$siteSetting->website_name}}</h3>
                    <p>
                        {{$siteSetting->website_short_description}}
                    </p>
                
                </div>
            </div>
        </aside>
        <!--~./ end about me widget ~-->


            <!--~~~~~ Start Bt Social Widget~~~~~-->
            <aside class="widget bt-socail-widget">
                <h4 class="widget-title">
                    Social
                </h4>
                <!-- /.widget-title -->
                <div class="widget-content">
                    <div class="bt-socail-profile">
                        <a class="bt-facebook-icon icon" href="{{$siteSetting->website_fb}}" target="_blank">
                            <span class="social-icon">
                                <i class="fab fa-facebook-square"></i>
                            </span>
                            <span class="bt-name">facebook</span>
                        </a>
                    </div>
                    <!--~./ bt-socail-profile ~-->

                    <div class="bt-socail-profile">
                        <a class="bt-twitter-icon icon" href="{{$siteSetting->website_tw}}" target="_blank">
                            <span class="social-icon">
                                <i class="fab fa-twitter"></i>
                            </span>
                            <span class="bt-name">twitter</span>
                        </a>
                    </div>
                    <!--~./ bt-socail-profile ~-->

                    <div class="bt-socail-profile">
                        <a class="bt-linkedin-icon icon" href="{{$siteSetting->website_ln}}" target="_blank">
                            <span class="social-icon">
                                <i class="fab fa-linkedin-in"></i>
                            </span>
                            <span class="bt-name">linkedin</span>
                        </a>
                    </div>
                    <!--~./ bt-socail-profile ~-->

                    <div class="bt-socail-profile">
                        <a class="bt-youtube-icon icon" href="{{$siteSetting->website_yt}}" target="_blank">
                            <span class="social-icon">
                                <i class="fab fa-youtube"></i>
                            </span>
                            <span class="bt-name">youtube</span>
                        </a>
                    </div>
                    <!--~./ bt-socail-profile ~-->
                </div>
            </aside>
            <!--~./ end bt social widget ~-->


        <!--~~~~~ Start Categories Widget ~~~~~-->
        <aside class="widget widget_categories">
            <h4 class="widget-title">
                Categories
            </h4>
            <!-- /.widget-title -->
            <div class="widget-content">
                <ul>

                    @foreach($categories as $category)
                    <li>
                        <a  href="{{url("/".$category->category_url)}}">{{ $category->category_name }}
                        </a>
                    </li>
				@endforeach
                    {{-- <li>
                        <a href="#">Foods <span class="count">24</span></a>
                    </li> --}}
                    
                </ul>
            </div>
            <!-- /.widget-content -->
        </aside>
        <!--~./ end categories widget ~-->

        
    

        <!--~~~~~ Start Post List Widget~~~~~-->
        <aside class="widget widget-post-list">
            <h4 class="widget-title">Recent Post</h4>
            <!-- /.widget-title -->

            <div class="widget-content">
                @foreach ($posts as $post)
                <article class="post">
                    <div class="thumb-wrap">
                        <a href="{{url("/".$post->post_custom_url)}}">
                            <img src="{{ asset('storage/app/public/' . $post->post_image) }}" alt="{{ $post->meta_title }}" width="91" height="79">											</a>
                    </div>
                    <!--./ thumb-wrap -->
                    <div class="content-entry-wrap">
                        <h3 class="entry-title">
                            <a href="{{url("/".$post->post_custom_url)}}"> {{$post->post_title}}</a>
                        </h3>
                        <!--./ entry-title -->
                        <div class="entry-meta-content">
                            <div class="entry-date">
                                {{ \Carbon\Carbon::parse($post->updated_at)->format('j-M-y') }}
                            </div>
                        </div>
                        <!--./ entry-meta-content -->
                    </div>
                </article>
                
                @endforeach
            </div>
        </aside>
        <!--~./ end post list widget ~-->

        <!--~~~~~ Start Advertisement Widget ~~~~~-->
        
        <!--~./ end Advertisement widget ~-->
    </div>
    <!--  /.sidebar-items -->
</div>
<!--~./ end sidebar ~-->