@extends('layouts.master')
<!-- jQuery CDN -->
<style>
    .alert {
        padding: 20px;
        background-color: #f44336;
        color: white;
        opacity: 0.83;
        transition: opacity 0.6s;
        margin-bottom: 15px;
    }

    .alert.success {background-color: #04AA6D;}
    .alert.info {background-color: #2196F3;}
    .alert.warning {background-color: #ff9800;}

    .closebtn {
        padding-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 20px;
        line-height: 18px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }
</style>




@section('content')
    <!-- banner start -->
    <div class="rts-banner-main-area-swiper banner-one">
        <div class="banner-area-sidebar">
            <div class="mail"><a href="mail-to:{{$contact->email}}">{{$contact->email}}</a></div>
            <div class="content">
                <p class="open">{{ __('static_text.opening_hour') }}</p>
                <div class="time">{{$contact->weekday_opening_time}}</div>
            </div>
        </div>
        <!-- Slider main container -->
        <div class="swiper-container">
            <!-- Additional required wrapper -->

            <div class="swiper-pagination"></div>

            <div class="swiper-wrapper">
                <!-- Slides -->
                @foreach($sliders as $slider)
                    <div class="swiper-slide">
                        <!-- rts-banner area start-->
                        <div class="rts-section-gap ptb_sm-20 rts-banner-one bg_image" style="background-image: url({{ asset($slider->img) }})">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="banner-one-wrapper">
                        <span class="b_one-pre">
                            {{ $slider->{'first_title_' . app()->getLocale()} }}
                        </span>
                                            <div class="banner-shape-area">
                                                <span class="shape"></span>
                                                <span class="shape"></span>
                                                <span class="shape"></span>
                                            </div>
                                            <h1 class="title-banner">
                                                {{ $slider->{'second_title_' . app()->getLocale()} }}
                                            </h1>
                                            <div class="button-area-banner">
                                                <a href="{{ route(app()->getLocale() . '.about') }}" class="rts-btn btn-primary"> {{ __('static_text.view_more') }}</a>
                                                <a href="{{ route(app()->getLocale() . '.menu') }}" class="rts-btn btn-seconday">{{ __('static_text.food_menu') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- rts-banner area end -->
                    </div>
                @endforeach


            </div>
            <!-- If we need navigation buttons -->
        </div>
    </div>
    <!-- banner end -->

    <div class="rts-reservation-area reservation" id="reservation">
        @if(session()->has('message'))
            <div class="alert {{session('alert') ?? 'info'}} alert-dismissible fade show">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>

                @if(session('alert')=="success")
                    {{session('message')}}
                @else
                    {{session('message')}}
                @endif
            </div>
        @endif
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <div class="banner-one-wrapper">
                        <div class="title-img" data-sal="zoom-in" data-sal-delay="100" data-sal-duration="800">
                            <img src="{{asset('assets1/images/about/title-shape.png')}}" alt="about">
                        </div>
                        <h1 class="title-banner" data-sal="slide-up" data-sal-delay="120" data-sal-duration="800">
                            {{__('static_text.booking')}}
                        </h1>

                    </div>
                </div>
            </div>
            <form action="{{ route(app()->getLocale() . '.book_a_table') }}" class="appoinment-form" enctype="multipart/form-data" method="post">
                @csrf


                <div class="single-input">
                    @error('name')
                    <span class="text-white">{{ trans('validation.required', ['attribute' => trans('validation.attributes.name')]) }}</span>
                    @enderror
                    <input type="text" id="name" name="name" placeholder="{{ __('static_text.name') }}" value="{{ old('name') }}" >

                </div>
                <div class="single-input">
                    @error('email')
                    <span class="text-white">{{ trans('validation.required', ['attribute' => trans('validation.attributes.email')]) }}</span>
                    @enderror
                    <input type="email" id="email" name="email" placeholder="{{ __('static_text.email') }}" value="{{ old('email') }}" >

                </div>
                <div class="single-input">
                    @error('phone')
                    <span class="text-white">{{ trans('validation.required', ['attribute' => trans('validation.attributes.phone')]) }}</span>
                    @enderror
                    <input type="tel" id="phone" name="phone" placeholder="{{ __('static_text.phone') }}" value="{{ old('phone') }}" >

                </div>
                <div class="single-input">
                    @error('branch')
                    <span class="text-white">{{ trans('validation.required', ['attribute' => trans('validation.attributes.branch')]) }}</span>
                    @enderror
                    <select id="branch" name="branch" >
                        <option value="99" {{ (old('branch') == '99') ? 'selected' : '' }}>{{__('static_text.branch1')}}</option>
                        @foreach($branches as $branch)
                            <option value="{{ $branch->name }}" {{ (old('branch') == $branch->name) ? 'selected' : '' }}>{{ $branch->name }}</option>
                        @endforeach
                    </select>

                </div>


                <!-- Alt satır -->
                <div class="single-input">
                    @error('guest_number')
                    <span class="text-white">{{ trans('validation.required', ['attribute' => trans('validation.attributes.guest_number')]) }}</span>
                    @enderror
                    <input type="number" id="guest_number" name="guest_number" placeholder="{{ __('static_text.guest_number') }}" value="{{ old('guest_number') }}" >

                </div>
                <div class="single-input">
                    @error('res_date')
                    <span class="text-white">{{ trans('validation.required', ['attribute' => trans('validation.attributes.res_date')]) }}</span>
                    @enderror

                    <input placeholder="{{ __('static_text.date') }}" type="text" name="res_date" id="datepicker" value="{{ old('res_date') }}" class="calendar" >
                </div>
                <div class="single-input">
                    @error('time')
                    <span class="text-white">{{ trans('validation.required', ['attribute' => trans('validation.attributes.time')]) }}</span>
                    @enderror

                    <input type="text" name='time' id="timepicker" placeholder="{{ __('static_text.time') }}" value="{{ old('time') }}" />
                </div>
                <div class="single-input">

                    <button type="submit" class="rts-btn btn-primary">{{ __('static_text.submit') }}</button>
                </div>


                <!-- Submit butonu -->


            </form>
        </div>
    </div>






    <!-- about area start -->
    <div class="rts-about-area rts-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 pr--60 pr_sm--0 mt_md--50 mt_sm--50 pl_md--0 pl_sm--0 pb_md--150 pb_sm--70">
                    <div class="about-one-img">
                        <div class="thumbnail-1">
                            <img src="{{asset('assets1/images/about/about1.webp')}}" alt="about">
                            <div class="line">
                                <img src="{{asset('assets1/images/about/line-shape-1.webp')}}" alt="about">
                            </div>
                        </div>
                        <div class="thumbnail-2">
                            <div class="reveal-item overflow-hidden aos-init">
                                <div class="reveal-animation reveal-end reveal-primary aos aos-init" data-aos="reveal-end"></div>
                                <img src="{{asset('assets1/images/about/about3.webp')}}" alt="about">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-5 pr--10">
                    <div class="banner-one-wrapper ptb--110">
                        <div class="title-img" data-sal="zoom-in" data-sal-delay="150" data-sal-duration="800">
                            <img src="{{asset('assets1/images/about/title-shape.png')}}" alt="about">
                        </div>
                        <h1 class="title-banner" data-sal="slide-up" data-sal-delay="170" data-sal-duration="800">
                            {{ __('static_text.about') }}
                        </h1>
                        <div class="banner-shape-area" data-sal="slide-up" data-sal-delay="200" data-sal-duration="800">
                            <span class="shape"></span>
                            <span class="shape"></span>
                            <span class="shape"></span>
                        </div>
                        <?php
                        $locale = App::getLocale();
                        $shortContentField = "short_content_" . $locale;
                        ?>

                        <p class="desc" data-sal="slide-up" data-sal-duration="800">{{ $about->$shortContentField }}</p>

                        <div class="button-area-banner" data-sal="slide-up" data-sal-delay="350" data-sal-duration="800">
                            <a href="{{ route(app()->getLocale() . '.about') }}" class="rts-btn btn-secondary">{{ __('static_text.details') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about area end -->
    <div class="rts-contact-area">
        <div class="contact-area-inner">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="container">
                        <div class="banner-one-wrapper text-center">
                            <div class="shape-1"><img src="{{asset('assets1/images/contact/overly-line.webp')}}" alt=""></div>
                            <div class="title-img" data-sal="zoom-in" data-sal-delay="100" data-sal-duration="800">
                                <img src="{{asset('assets1/images/about/title-shape.png')}}" alt="about">
                            </div>
                            <h1 class="title-banner" data-sal="slide-up" data-sal-delay="120" data-sal-duration="800">
                                {{ __('static_text.branches') }}                        </h1>
                            <div class="banner-shape-area" data-sal="slide-up" data-sal-delay="400" data-sal-duration="800">
                                <span class="shape"></span>
                                <span class="shape"></span>
                                <span class="shape"></span>
                            </div>
                            @foreach($branches as $key=>$branch)
                                <ul class="address" data-sal="slide-up" data-sal-delay="450" data-sal-duration="800">
                                    <li style="color: #F4F5FF"><strong>{{__('static_text.branch')."-".($key+1).":".$branch->name}}</strong> </li>
                                    <li style="text-align: center; padding-left: 15%; padding-right: 15%;">{{$branch->address}}</li>

                                    <li><a href="tel:{{$branch->phone}}">{{$branch->phone}}</a></li>
                                    <li><a href="mailto:{{$branch->email}}">{{$branch->email}}</a></li>
                                    <li>{{$contact->weekday_opening_time}}</li>

                                </ul>
                            @endforeach

                            <ul class="social-area">
                                <li>
                                    <a href="{{$contact->facebook}}">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{$contact->twitter}}">
                                        <i class="fa-brands fa-twitter"></i>
                                    </a>
                                </li>

                                <li>
                                    <a href="{{$contact->instagram}}">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{$contact->linkedin}}">
                                        <i class="fa-brands fa-linkedin-in"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="right-side-image">
                        <div class="reveal-item overflow-hidden aos-init">
                            <div class="reveal-animation reveal-end reveal-primary aos aos-init" data-aos="reveal-end"></div>
                            <img src="{{ asset('assets1/images/contact/fapel-sube.webp') }}" alt="contact">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Menu Area -->
    <div class="rts-menu-area menu-area-2 rts-section-gap">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    @php
                        $lang = app()->getLocale();
                        $columnName = 'name_' . $lang;
                    @endphp
                    <div class="banner-one-wrapper">
                        <div class="shape-2"><img src="{{ asset('assets1/images/project/vector4.webp') }}" alt="shape"></div>
                        <div class="title-img" data-sal="zoom-in" data-sal-delay="100" data-sal-duration="800">
                            <img src="{{ asset('assets1/images/about/title-shape.png') }}" alt="about">
                        </div>
                        <h1 class="title-banner" id="banner-title1" data-sal="slide-up" data-sal-delay="120" data-sal-duration="800">
                            {{$menu_categories[0]->{"slogan_" . $lang} }}
                        </h1>
                        <p class="desc" id="banner-desc1" data-sal="slide-up" data-sal-duration="800">{{$menu_categories[0]->{"description_" . $lang} }}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xxl-12 text-center">
                    <div class="portfolio-menu mb-35" data-sal="slide-up" data-sal-delay="450" data-sal-duration="800">
                        @php
                            $lang = app()->getLocale();
                            $columnName = 'name_' . $lang;
                        @endphp
                        <button class="gf_btn active" data-filter="*"
                                data-name="{{$menu_categories[0]->{"slogan_" . $lang} }}"
                                data-slogan=""
                                data-description="{{$menu_categories[0]->{"description_" . $lang} }}">
                            {{__('static_text.all')}}
                        </button>


                        @foreach($menu_categories as $category)
                            @if($category->is_active)
                                @if($category->id !=1)
                                    <button class="gf_btn" data-filter=".cat{{$category->id}}"
                                            data-name="{{ $category->$columnName }}"
                                            data-slogan="{{ $category->{"slogan_" . $lang} }}"
                                            data-description="{{ $category->{"description_" . $lang} }}">
                                        {{$category->$columnName}}
                                    </button>
                                @endif
                            @endif
                        @endforeach


                    </div>
                </div>
            </div>

            @include('partials.menu_part', ['menus' => $menus])
        </div>
    </div>


    <!-- gallery area start -->
    <div class="rts-gallery-area">
        <div class="gallery-area-inner">
            <div class="row">
                @foreach ($galleries as $index => $gallery)
                    <div class="col-lg-3">
                        <div class="gallery-image" data-sal="slide-up" data-sal-delay="{{ 50 * ($index + 1) }}" data-sal-duration="800">
                            <a class="dynamic-popup" href="#" data-index="{{ $index }}"><img src="{{asset("$gallery->image_path")  }}" alt="gallery"></a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- gallery area end -->

    <!-- blog area start -->
    <!--<div class="rts-blog-area rts-section-gap">-->
    <div class="rts-blog-area ">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <div class="banner-one-wrapper">
                        <div class="title-img" data-sal="zoom-in" data-sal-delay="100" data-sal-duration="800">
                            <img src="{{asset('assets1/images/about/title-shape.png')}}" alt="about">
                        </div>
                        <h1 class="title-banner" data-sal="slide-up" data-sal-delay="120" data-sal-duration="800">
                            {{__('static_text.blog')}}
                        </h1>

                    </div>
                </div>
            </div>
            <div class="swiper-technical-main-wrapper" data-sal="slide-up" data-sal-delay="1200" data-sal-duration="800">
                <div class="swiper mySwiper-blog">
                    <div class="swiper-wrapper">
                        @php
                            $lang = app()->getLocale();
                        @endphp

                        @foreach($blogs as $blog)
                            <div class="swiper-slide">
                                <div class="blog-wrapper">
                                    <div class="image-part">
                                        <!-- Resim yolu şu an eksik, eğer bir 'image_path' veya benzeri bir alanınız varsa burada kullanabilirsiniz -->
                                        <img src="{{ asset($blog->img) ?? asset('assets1/images/blog/blog-01.jpg') }}" alt="blog">
                                    </div>
                                    <span class="blog-badge"> {{ $blog->updated_at->format('F j, Y') }}</span>
                                    <div class="content">
                                        <!--<p class="tag">{{ $blog->{"category_name_" . $lang} }}</p>-->
                                        <h3 class="title"><a href="{{ route($lang . '.blog_details', $blog->{'slug_'.$lang} ) }}">{{ $blog->{"title_" . $lang} }}</a></h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery önce yüklenmeli -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Daha sonra İsotope -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>

    <!-- gallery area end -->
    <script>
        // $galleriesJS değişkenini JavaScript'e aktarıyoruz
        var galleries = @json($galleriesJS);
    </script>

    <script>

    $(document).ready(function() {

        // İsotope başlatılıyor
        var grid = $('.menu-area-2-inner .row').isotope({
            itemSelector: '.col-lg-6',
            layoutMode: 'masonry',
        });

        $('.gf_btn').on('click', function() {
            $(".gf_btn").removeClass('filter-active');
            $(this).addClass('filter-active');
            grid.isotope({
                filter: $(this).data('filter')
            });

            // Kategori başlığını ve açıklamasını güncelleme
            let titleBanner = $('#banner-title1');
            let desc = $('#banner-desc1');

            titleBanner.text($(this).data('name'));
            desc.text($(this).data('description'));
        });

        $('.gf_btn[data-filter="*"]').click();

        $('.dynamic-popup').on('click', function(e) {
            e.preventDefault();
        });

        let galleryImages = [];

        galleries.forEach(function(gallery) {
            galleryImages.push({
                src: gallery.image_path, // Burada zaten tam yol olacak
                title: gallery.title // Eğer title adında bir property'niz yoksa bu kısmı düzenlemeniz gerekebilir
            });
        });

        $('.dynamic-popup').magnificPopup({
            items: galleryImages,
            gallery: {
                enabled: true
            },
            type: 'image',
            callbacks: {
                beforeOpen: function() {
                    let index = parseInt($.magnificPopup.instance.st.el.data('index'));
                    $.magnificPopup.instance.goTo(index);
                }
            }
        });
    });




</script>


@endsection
