@extends('layouts.master')


@section('content')

    <!-- Page Content-->
    @include('partials.breadcrumb', ['slider' => $slider])
    <!-- rts team area start -->
    <!-- contact area start -->
    <div class="rts-contact-area" id="contactDiv">
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
                            <img src="{{ asset('assets1/images/contact/fapel-sube-1.webp') }}" alt="contact">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area end -->


    <div class="rts-map-area chef rts-section-gap1 bg-dark">
        <h1 class="title-banner text-center" data-sal="slide-up" data-sal-delay="120" data-sal-duration="800" style="margin-bottom: 10px;">
            {{__('static_text.branch')."-1:".$branches[0]->name}}</h1>
        <div class="container">
            <div class="map-inner">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3011.7299292444586!2d28.794668175631266!3d40.98739427135349!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14caa3e6ac4a559d%3A0xf157c5fcbd3a77c9!2zRmFwZWwgT2Nha2JhxZ_EsQ!5e0!3m2!1str!2str!4v1692285493051!5m2!1str!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

    <div class="rts-map-area chef rts-section-gap1 bg-dark">
        <h1 class="title-banner text-center" data-sal="slide-up" data-sal-delay="120" data-sal-duration="800" style="margin-bottom: 10px;">
            {{__('static_text.branch')."-2:".$branches[1]->name}}</h1>
        <div class="container">
            <div class="map-inner">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3012.2597230905294!2d28.85742947912733!3d40.97579330804727!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cabd3002c9c1a7%3A0x6994aa80fec4245!2sFapel%20Atak%C3%B6y!5e0!3m2!1str!2str!4v1692285624709!5m2!1str!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>            </div>
        </div>
    </div>

    <div class="rts-map-area rts-section-gap1 bg-dark">
        <h1 class="title-banner text-center" data-sal="slide-up" data-sal-delay="120" data-sal-duration="800" style="margin-bottom: 10px;">
            {{__('static_text.branch')."-3:".$branches[2]->name}}</h1>
        <div class="container">
            <div class="map-inner">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3010.3302967050417!2d28.906648379141114!3d41.01802920802821!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14cabbe01cc2f129%3A0xbd5c08d5d5747430!2sFapel%20Cevizlibag!5e0!3m2!1str!2str!4v1692285670670!5m2!1str!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
    <!-- rts team area end -->



@endsection

@section('script')

    <script>
        $(document).ready(function(){
            $('.alert-success').fadeIn().delay(3000).fadeOut('slow');
            $('.alert-danger').fadeIn().delay(3000).fadeOut('slow');
        });
    </script>

@endsection

