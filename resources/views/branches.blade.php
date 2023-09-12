@extends('layouts.master')


@section('content')
    @include('partials.breadcrumb', ['slider' => $slider])
    <!-- rts blog mlist area -->
    <div class="rts-blog-area ">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <div class="banner-one-wrapper">

                        <h1 class="title-banner" data-sal="slide-up" data-sal-delay="120" data-sal-duration="800">
                            <br>
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
                                    <a href="{{ route($lang . '.branch_details', $record->{'slug_'.$lang} ) }}"> <!-- Bu satır eklendi -->
                                        <div class="image-part">
                                            <img src="{{ asset($record->img) ?? asset('assets1/images/blog/blog-01.jpg') }}" alt="blog">
                                        </div>
                                    </a> <!-- Bu satır eklendi -->

                                    <div class="content">
                                        <h3 class="title">
                                            <a href="{{ route($lang . '.branch_details', $record->{'slug_'.$lang} ) }}">{{ $record->name }}</a>
                                        </h3>
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



