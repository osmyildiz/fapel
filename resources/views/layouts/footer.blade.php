@php
    use App\Models\Contact;
    use App\Models\Gallery;
    $contact = Contact::find(1);
    $galleries = Gallery::where('is_active',1)->orderBy('priority','ASC')->limit(6)->get();

@endphp
<div class="rts-footer-one rts-section-gap2Top">
    <!--<div class="shape-1"><img src="{{asset('assets1/images/footer/vector5.webp')}}" alt="shape"></div>-->
    <!--<div class="shape-2"><img src="{{asset('assets1/images/footer/vector6.webp')}}" alt="shape"></div>-->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- main footer area start -->
                <div class="main-footer-wrapper-one">
                    <div class="single-footer-wized-one logo-area" data-sal="slide-up" data-sal-delay="150" data-sal-duration="800">
                        <a href="/" class="logo">
                            <img src="{{asset('assets1/images/logo/fapel-steakhouse-ocakbasi-logo.png')}}" alt="logo">
                        </a>
                        <p class="disc-f">
                            {{ $contact->{'footer_text_' . app()->getLocale()} }}
                        </p>
                        <div class="query-list">
                            <span class="sub-text">{{ __('static_text.book_a_table') }}</span>
                            <a href="tel:{{$contact->phone}}">
                                <span class="text-heading">{{$contact->phone}}</span>
                            </a>
                        </div>
                    </div>
                    <div class="single-footer-wized-one get-in-touch" data-sal="slide-up" data-sal-delay="350" data-sal-duration="800">
                        <div class="footer-header-two get-touch">
                            <h6 class="title">{{ __('static_text.get_in_touch') }}</h6>
                            <div class="get-touch">
                                <ul>
                                    <li><i class="fa-solid fa-location-dot"></i>{{$contact->address}}</li>
                                    <li><a href="tel:{{$contact->phone}}"><i class="fa-solid fa-phone-flip"></i>+{{$contact->phone}}</a></li>
                                    <li><a href="mailto:{{$contact->email}}"><i class="fa-solid fa-envelope-open"></i>{{$contact->email}}</a></li>
                                </ul>
                                <div class="rts-social-wrapper">
                                    <ul>
                                        <li><a href="{{$contact->facebook}}"><i class="fa-brands fa-facebook-f"></i></a></li>
                                        <li><a href="{{$contact->twitter}}"><i class="fa-brands fa-twitter"></i></a></li>
                                        <li><a href="{{$contact->instagram}}"><i class="fa-brands fa-instagram"></i></a></li>
                                        <li><a href="{{$contact->linkedin}}"><i class="fa-brands fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="single-footer-wized-one pages" data-sal="slide-up" data-sal-delay="250" data-sal-duration="800">
                        <div class="footer-header-two pages">
                            <h6 class="title">{{ __('static_text.pages') }}</h6>
                            <div class="pages">
                                <ul>

                                    <li><a href="{{ route(app()->getLocale() . '.about') }}">{{ __('static_text.about') }}</a></li>
                                    <li><a href="{{ route(app()->getLocale() . '.menu') }}">{{ __('static_text.menu') }}</a></li>
                                    <li><a href="{{ route(app()->getLocale() . '.gallery') }}">{{ __('static_text.gallery') }}</a></li>
                                    <li><a href="{{ route(app()->getLocale() . '.blog') }}">{{ __('static_text.blog') }}</a></li>
                                    <li><a href="{{ route(app()->getLocale() . '.contact') }}">{{ __('static_text.contact') }}</a></li>

                                </ul>

                            </div>
                        </div>
                    </div>
                    <div class="single-footer-wized-one gallery" data-sal="slide-up" data-sal-delay="550" data-sal-duration="800">
                        @if($galleries->count())
                            @foreach ($galleries as $gallery)
                                <div class="gallery-item">
                                    <img src="{{asset("$gallery->image_path")  }}" alt="gallery">
                                </div>
                            @endforeach
                        @else
                            <div class="gallery-item"><img src="{{ asset('assets1/images/gallery/sm-01.jpg') }}" alt=""></div>
                            <div class="gallery-item"><img src="{{ asset('assets1/images/gallery/sm-02.jpg') }}" alt=""></div>
                            <div class="gallery-item"><img src="{{ asset('assets1/images/gallery/sm-03.jpg') }}" alt=""></div>
                            <div class="gallery-item"><img src="{{ asset('assets1/images/gallery/sm-04.jpg') }}" alt=""></div>
                            <div class="gallery-item"><img src="{{ asset('assets1/images/gallery/sm-05.jpg') }}" alt=""></div>
                            <div class="gallery-item"><img src="{{ asset('assets1/images/gallery/sm-06.jpg') }}" alt=""></div>
                        @endif
                    </div>


                </div>
                <!-- ,main footer area end -->
            </div>
        </div>
    </div>

    <!-- copy right area start -->
    <div class="copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-footer-one">
                        <p class="disc">
                            Designed and Developed by <a href="https://mayfairdigital.co.uk" target="_blank"><img src="{{asset('assets1/images/mayfair_logo_black.png')}}" alt="Mayfair Digital Logo" style="width: 100px;"></a>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- copyright area end -->
</div>
