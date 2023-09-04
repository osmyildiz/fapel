@extends('layouts.master')


@section('content')
    <!-- about area start -->

    @include('partials.breadcrumb', ['slider' => $slider])

    @php
        $lang = app()->getLocale();

    @endphp
    <!-- brand area start -->
    <div class="rts-team-details-area rts-section-gap bg-white">
        <div class="container">
            <div class="team-details-inner">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-5">
                        <div class="image-area">
                            <img src="{{ asset('assets1/images/about/about2.webp') }}" alt="team-iamge">
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="banner-one-wrapper">
                            <div class="banner-shape-area" data-sal="slide-up" data-sal-delay="400" data-sal-duration="800">
                                <span class="shape"></span>
                                <span class="shape"></span>
                                <span class="shape"></span>
                            </div>

                            <p class="desc">
                                {!! $about->{'content_'.$lang} !!}
                            </p>
                            <div class="get-touch">

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
                </div>
            </div>
        </div>
    </div>
    <!-- brand area end -->
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
    <!-- jQuery önce yüklenmeli -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!-- gallery area end -->
    <script>
        // $galleriesJS değişkenini JavaScript'e aktarıyoruz
        var galleries = @json($galleriesJS);
    </script>


    <script>
        $(document).ready(function() {
            // Tıklama işlemini engelle
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



