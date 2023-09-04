@extends('layouts.master')


@section('content')
    @include('partials.breadcrumb', ['slider' => $slider])
    <div class="rts-blog-list-area rts-section-gap">
        <div class="container">
            <div class="row g-5">
                <!-- rts blo post area -->
                <div class="col-xl-8 col-md-12 col-sm-12 col-12">
                    <!-- single post -->
                    @php
                        $lang = app()->getLocale();
                        $columnName = 'name_' . $lang;
                    @endphp
                    <div class="blog-single-post-listing details mb--0">
                        <div class="thumbnail">
                            <img src="{{asset($blog->img)}}" alt="Food Blog">
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
                            <h3 class="title">{{$blog->{'title_'.$lang} }}</h3>
                            <p class="disc para-1">{!! html_entity_decode($blog->{'content_'.$lang}) !!}</p>


                        </div>
                    </div>
                    <!-- single post End-->
                </div>
                <!-- rts-blog post end area -->
                <!--rts blog wizered area -->
                <div class="col-xl-4 col-md-12 col-sm-12 col-12  pd-control-bg--40">

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
                            @foreach($recent_posts as $recent)
                                <div class="recent-post-single">
                                    <div class="thumbnail">
                                        <a href="{{ route($lang . '.blog_details', $blog->{'slug_'.$lang} ) }}"><img src="{{ asset('assets1/images/blog/blog-sm-01.jpg') }}" alt="Blog_post"></a>
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
                        <div class="wized-body">
                            <div class="tags-wrapper">
                                @foreach($tags as $tag)
                                    <a href="#">{{ trim($tag) }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- single wizered End -->
                </div>
                <!-- rts- blog wizered end area -->
            </div>
        </div>
    </div>

@endsection



