@extends('layouts.master')


@section('content')
    @include('partials.breadcrumb', ['slider' => $slider])
    <!-- rts blog mlist area -->
    <div class="rts-blog-list-area rts-section-gap">
        <div class="container">
            <div class="row g-5">
                <!-- rts blo post area -->
                <div class="col-xl-8 col-md-12">
                    @php
                        $lang = app()->getLocale();
                        $columnName = 'name_' . $lang;
                    @endphp
                        <!-- single post -->
                    @foreach($blogs as $blog)
                        <div class="blog-single-post-listing details mb--30">
                            <div class="thumbnail">
                                <img src="{{ asset($blog->img) }}" alt="Food Blog">
                            </div>
                            <div class="blog-listing-content">
                                <div class="user-info">
                                    <!-- single info -->
                                    <div class="single">
                                        <i class="far fa-user-circle"></i>
                                        <span>by Fapel</span>
                                    </div>
                                    <!-- single infoe end -->
                                    <!-- single info -->
                                    <div class="single">
                                        <i class="far fa-clock"></i>
                                        <span>{{ $blog->updated_at->format('F j, Y') }}</span>
                                    </div>
                                    <!-- single infoe end -->
                                    <!-- single info -->
                                    <div class="single">
                                        <i class="far fa-tags"></i>
                                        <span>{{$blog->{'category_name_'.$lang} }}</span>
                                    </div>
                                    <!-- single infoe end -->
                                </div>
                                <a href="{{ route($lang . '.blog_details', $blog->{'slug_'.$lang} ) }}">
                                    <h3 class="title">{{$blog->{'title_'.$lang} }}</h3>
                                </a>
                                <p class="disc para-1 mb--30">
                                <p class="disc para-1">{!! mb_substr(strip_tags(htmlspecialchars_decode($blog->{'content_'.$lang})), 0,300) !!}...</p>



                                <a class="rts-btn btn-primary mt--0" href="{{ route($lang . '.blog_details', $blog->{'slug_'.$lang} ) }}">{{__('static_text.details')}}</a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- rts-blog post end area -->
                <!--rts blog wizered area -->
                <div class="col-xl-4 col-md-12 pl-b-list-controler">

                    <!-- single wizered start -->
                    <!--<div class="rts-single-wized Categories">
                        <div class="wized-header">
                            <h5 class="title">
                                {{__('static_text.categories')}}
                            </h5>
                        </div>
                        <div class="wized-body">

                            @foreach($blog_categories as $category)
                                <ul class="single-categories">
                                    <li><a href="#">{{$category->{'name_'.$lang} }} <i class="far fa-long-arrow-right"></i></a></li>
                                </ul>
                            @endforeach



                        </div>
                    </div>-->
                    <!-- single wizered End -->
                    <!-- single wizered start -->
                    <div class="rts-single-wized Recent-post">
                        <div class="wized-header">
                            <h5 class="title">
                                {{__('static_text.recent_posts')}}
                            </h5>
                        </div>
                        <div class="wized-body">
                            <!-- recent-post -->
                            @foreach($recent_posts as $recent)
                                <div class="recent-post-single">
                                    <div class="thumbnail">
                                        <a href="{{ route($lang . '.blog_details', $recent->{'slug_'.$lang} ) }}"><img src="{{ asset($recent->img_home) }}" alt="Blog_post" width="124" height="124"></a>
                                    </div>
                                    <div class="content-area">
                                        <div class="user">
                                            <i class="fal fa-clock"></i>
                                            <span>{{ $recent->updated_at->format('F j, Y') }}</span>
                                        </div>
                                        <a class="post-title" href="{{ route($lang . '.blog_details', $blog->{'slug_'.$lang} ) }}">
                                            <h6 class="title">{{$recent->{'title_'.$lang} }}</h6>
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <!-- single wizered End -->
                    <!-- single wizered start -->
                    <div class="rts-single-wized">
                        <div class="wized-header">
                            <h5 class="title">
                                Popular Tags
                            </h5>
                        </div>
                        <div class="tags-wrapper">
                            @foreach($tags as $tag)
                                <a href="#">{{ trim($tag) }}</a>
                            @endforeach
                        </div>

                    </div>
                    <!-- single wizered End -->
                </div>
                <!-- rts- blog wizered end area -->
            </div>
            <div class="row mt--30">
                <div class="col-lg-12">
                    <div class="rts-elevate-pagination">
                        {{ $blogs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts blog mlist area End -->

@endsection



