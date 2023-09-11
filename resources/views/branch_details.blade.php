@extends('layouts.master')


@section('content')
    @php
        $lang = app()->getLocale();
        $columnName = 'name_' . $lang;
    @endphp
    @include('partials.breadcrumb', ['slider' => $slider])
    <!--<div class="rts-blog-list-area rts-section-gap">
        <div class="container">
            <div class="row g-5">

                <div class="col-xl-8 col-md-12 col-sm-12 col-12">


                    <div class="blog-single-post-listing details mb--0">
                        <div class="thumbnail">
                            <img src="{{asset($blog->img)}}" alt="Food Blog">
                        </div>
                        <div class="blog-listing-content">
                            <div class="user-info">

                                <div class="single">
                                    <i class="far fa-user-circle"></i>
                                    <span>by Fapel</span>
                                </div>

                                <div class="single">
                                    <i class="far fa-clock"></i>
                                    <span>{{ $blog->updated_at->format('F j, Y') }}</span>
                                </div>

                                <div class="single">
                                    <i class="far fa-tags"></i>
                                    <span>{{$blog->{'category_name_'.$lang} }}</span>
                                </div>

                            </div>
                            <h3 class="title">{{$blog->{'title_'.$lang} }}</h3>
                            <p class="disc para-1">{!! html_entity_decode($blog->{'content_'.$lang}) !!}</p>


                        </div>
                    </div>

                </div>

                <div class="col-xl-4 col-md-12 col-sm-12 col-12  pd-control-bg--40">


                  <div class="rts-single-wized Categories">
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
                    </div>

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

                </div>

            </div>
        </div>
    </div>-->
    <div class="rts-blog-list-area rts-section-gap">
        <div class="container">
            <div class="row g-5">
                <!-- rts blo post area -->
                <div class="col-xl-8 col-md-12 col-sm-12 col-12">
                    <!-- single post -->
                    <div class="blog-single-post-listing details mb--0">
                        <div class="thumbnail">
                            <img src="assets1/images/blog/blog-04-1.jpg" alt="Food Blog">
                        </div>
                        <div class="blog-listing-content">
                            <div class="user-info">
                                <!-- single info -->
                                <div class="single">
                                    <i class="far fa-user-circle"></i>
                                    <span>by David Smith</span>
                                </div>
                                <!-- single infoe end -->
                                <!-- single info -->
                                <div class="single">
                                    <i class="far fa-clock"></i>
                                    <span>by David Smith</span>
                                </div>
                                <!-- single infoe end -->
                                <!-- single info -->
                                <div class="single">
                                    <i class="far fa-tags"></i>
                                    <span>by David Smith</span>
                                </div>
                                <!-- single infoe end -->
                            </div>
                            <h3 class="title">Building smart business solution for you</h3>
                            <p class="disc para-1">
                                Collaboratively pontificate bleeding edge resources with inexpensive methodologies
                                globally initiate multidisciplinary compatible architectures pidiously repurpose leading
                                edge growth strategies with just in time web readiness communicate timely meta services
                            </p>
                            <p class="disc">
                                Onubia semper vel donec torquent fusce mauris felis aptent lacinia nisl, lectus
                                himenaeos euismod molestie iaculis interdum in laoreet condimentum dictum, quisque quam
                                risus sollicitudin gravida ut odio per a et. Gravida maecenas lobortis suscipit mus
                                sociosqu convallis, mollis vestibulum donec aliquam risus sapien ridiculus, nulla
                                sollicitudin eget in venenatis. Tortor montes platea iaculis posuere per mauris, eros
                                porta blandit curabitur ullamcorper varius
                            </p>
                            <!-- quote area start -->
                            <div class="rts-quote-area text-center">
                                <h5 class="title">“Choices to take a holiday and travelling out in this pandemic situation are limited. Why not take a stay action on quality design. ”</h5>
                                <a href="#" class="name">Rosalina D. William</a>
                            </div>
                            <!-- quote area end -->

                            <p class="disc">
                                Ultrices iaculis commodo parturient euismod pulvinar donec cum eget a, accumsan viverra
                                cras praesent cubilia dignissim ad rhoncus. Gravida maecenas lobortis suscipit mus
                                sociosqu convallis, mollis vestibulum donec aliquam risus sapien ridiculus, nulla
                                sollicitudin eget in venenatis. Tortor montes platea iaculis posuere per mauris, eros
                                porta blandit curabitur ullamcorper varius, nostra ante risus egestas suscipit. Quisque
                                interdum nec parturient facilisis nunc ac quam, ad est cubilia mauris himenaeos nascetur
                                vestibulum.
                            </p>

                            <h4 class="title mt--40 mt_sm--20">Ultimate Business Strategy Solution</h4>
                            <p class="disc mb--25">
                                Gravida maecenas lobortis suscipit mus sociosqu convallis, mollis vestibulum donec
                                aliquam risus sapien ridiculus, nulla sollicitudin eget in venenatis. Tortor montes
                                platea iaculis posuere per mauris, eros porta blandit curabitur ullamcorper varius
                                nostra ante risus egestas.
                            </p>
                            <div class="row align-items-center">
                                <div class="col-lg-3">
                                    <div class="thumbnail details mb_sm--15"><img src="assets/images/blog/inner-blog.png" alt="Dinenos">
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="check-area-details">
                                        <!-- single check -->
                                        <div class="single-check">
                                            <span>From connecting back-office operations to front-of-the-house A/B testing and dynamic personalization for each customer, the shared foundation is fast server side rendering powered by fast storefront data access. On top of this foundation, we add layers of caching, prerendering and edge delivery optimizations — not the other way</span>
                                        </div>
                                        <!-- single check End -->
                                    </div>
                                </div>
                            </div>
                            <p class="disc mt--30">
                                Cubilia hendrerit luctus sem aptent curae gravida maecenas eleifend nunc nec vitae morbi
                                sodales fusce tristique aenean habitasse mattis sociis feugiat conubia mus auctor
                                praesent urna tincidunt taciti dui lobortis nullam. Mattis placerat feugiat ridiculus
                                sed a per curae fermentum aenean facilisi, vitae urna imperdiet ac mauris non inceptos
                                luctus hac odio.
                            </p>
                            <div class="author-area">
                                <div class="thumbnail details mb_sm--15">
                                    <img src="assets/images/blog/author.png" alt="finbiz_buseness">
                                </div>
                                <div class="author-details team">
                                    <h5>Dinenos</h5>
                                    <p class="disc">
                                        Nullam varius luctus pharetra ultrices volpat facilisis donec tortor, nibhkisys
                                        habitant curabitur at nunc nisl magna ac rhoncus vehicula sociis tortor nist
                                        hendrerit molestie integer.
                                    </p>
                                </div>
                            </div>
                            <div class="replay-area-details">
                                <h4 class="title">Leave a Reply</h4>
                                <form action="#">
                                    <div class="row g-4">
                                        <div class="col-lg-6">
                                            <input type="text" placeholder="Your Name" required>
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text" placeholder="Your Name" required>
                                        </div>
                                        <div class="col-12">
                                            <input type="text" placeholder="Select Topic">
                                            <textarea placeholder="Type your message"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <button class="rts-btn btn-primary" type="submit"> Submit Message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- single post End-->
                </div>
                <!-- rts-blog post end area -->
                <!--rts blog wizered area -->
                <div class="col-xl-4 col-md-12 col-sm-12 col-12  pd-control-bg--40">
                    <!-- single wizered start -->
                    <div class="rts-single-wized search">
                        <div class="wized-header">
                            <h5 class="title">
                                Search Hear
                            </h5>
                        </div>
                        <div class="wized-body">
                            <div class="rts-search-wrapper">
                                <input class="Search" type="text" placeholder="Enter Keyword">
                                <button><i class="fal fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <!-- single wizered End -->
                    <!-- single wizered start -->
                    <div class="rts-single-wized Categories">
                        <div class="wized-header">
                            <h5 class="title">
                                Categories
                            </h5>
                        </div>
                        <div class="wized-body">
                            <!-- single categoris -->
                            <ul class="single-categories">
                                <li><a href="#">Business Solution <i class="far fa-long-arrow-right"></i></a></li>
                            </ul>
                            <!-- single categoris End -->
                            <!-- single categoris -->
                            <ul class="single-categories">
                                <li><a href="#">Strategy Growth<i class="far fa-long-arrow-right"></i></a></li>
                            </ul>
                            <!-- single categoris End -->
                            <!-- single categoris -->
                            <ul class="single-categories">
                                <li><a href="#">Finance Solution<i class="far fa-long-arrow-right"></i></a></li>
                            </ul>
                            <!-- single categoris End -->
                            <!-- single categoris -->
                            <ul class="single-categories">
                                <li><a href="#">Investment Policy<i class="far fa-long-arrow-right"></i></a></li>
                            </ul>
                            <!-- single categoris End -->
                            <!-- single categoris -->
                            <ul class="single-categories">
                                <li><a href="#">Tax Managment<i class="far fa-long-arrow-right"></i></a></li>
                            </ul>
                            <!-- single categoris End -->
                        </div>
                    </div>
                    <!-- single wizered End -->
                    <!-- single wizered start -->
                    <div class="rts-single-wized Recent-post">
                        <div class="wized-header">
                            <h5 class="title">
                                Recent Posts
                            </h5>
                        </div>
                        <div class="wized-body">
                            <!-- recent-post -->
                            <div class="recent-post-single">
                                <div class="thumbnail">
                                    <a href="blog-details.html"><img src="assets/images/blog/blog-sm-01.jpg" alt="Blog_post"></a>
                                </div>
                                <div class="content-area">
                                    <div class="user">
                                        <i class="fal fa-clock"></i>
                                        <span>15 Jan, 2023</span>
                                    </div>
                                    <a class="post-title" href="blog-details.html">
                                        <h6 class="title">We would love to share a similar experience</h6>
                                    </a>
                                </div>
                            </div>
                            <!-- recent-post End -->
                            <!-- recent-post -->
                            <div class="recent-post-single">
                                <div class="thumbnail">
                                    <a href="blog-details.html"><img src="assets/images/blog/blog-sm-02.jpg" alt="Blog_post"></a>
                                </div>
                                <div class="content-area">
                                    <div class="user">
                                        <i class="fal fa-clock"></i>
                                        <span>15 Jan, 2023</span>
                                    </div>
                                    <a class="post-title" href="blog-details.html">
                                        <h6 class="title">We would love to share a similar experience</h6>
                                    </a>
                                </div>
                            </div>
                            <!-- recent-post End -->
                            <!-- recent-post -->
                            <div class="recent-post-single">
                                <div class="thumbnail">
                                    <a href="blog-details.html"><img src="assets/images/blog/blog-sm-03.webp" alt="Blog_post"></a>
                                </div>
                                <div class="content-area">
                                    <div class="user">
                                        <i class="fal fa-clock"></i>
                                        <span>15 Jan, 2023</span>
                                    </div>
                                    <a class="post-title" href="blog-details.html">
                                        <h6 class="title">We would love to share a similar experience</h6>
                                    </a>
                                </div>
                            </div>
                            <!-- recent-post End -->
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
                                <a href="#">Services</a>
                                <a href="#">Business</a>
                                <a href="#">Growth</a>
                                <a href="#">Finance</a>
                                <a href="#">UI/UX Design</a>
                                <a href="#">Solution</a>
                                <a href="#">Speed</a>
                                <a href="#">Strategy</a>
                                <a href="#">Technology</a>
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



