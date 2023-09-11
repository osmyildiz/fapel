@extends('layouts.master')


@section('content')
    @include('partials.breadcrumb', ['slider' => $slider])
    <!-- rts blog mlist area -->
    <div class="rts-blog-area ">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <div class="banner-one-wrapper">
                        <div class="title-img" data-sal="zoom-in" data-sal-delay="100" data-sal-duration="800">
                            <img src="{{asset('assets1/images/about/title-shape.png')}}" alt="about">
                        </div>
                        <h1 class="title-banner" data-sal="slide-up" data-sal-delay="120" data-sal-duration="800">
                            {{__('static_text.branches1')}}
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

                        @foreach($records as $record)
                            <div class="swiper-slide">
                                <div class="blog-wrapper">
                                    <div class="image-part">
                                        <!-- Resim yolu şu an eksik, eğer bir 'image_path' veya benzeri bir alanınız varsa burada kullanabilirsiniz -->
                                        <img src="{{ asset($record->img) ?? asset('assets1/images/blog/blog-01.jpg') }}" alt="blog">
                                    </div>

                                    <div class="content">

                                        <h3 class="title"><a href="{{ route($lang . '.branch_details', $record->slug ) }}">{{ $record->name }}</a></h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- rts blog mlist area End -->

@endsection



