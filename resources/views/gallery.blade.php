@extends('layouts.master')


@section('content')
    <!-- about area start -->
    <style>
        .gallery-row > .col-lg-3:not(:last-child) {
            margin-bottom: calc(var(--bs-gutter-x) * 1);
        }
    </style>

    @include('partials.breadcrumb', ['slider' => $slider])

    <div class="rts-menu-area menu-area-2 dark">
        <div class="container">
            <div class="row text-center">
                <div class="col-lg-12">
                    <div class="banner-one-wrapper">
                        <div class="title-img" data-sal="zoom-in" data-sal-delay="100" data-sal-duration="800">
                            <img src="{{asset('assets1/images/about/title-shape.png')}}" alt="about">
                        </div>
                        <h1 class="title-banner" data-sal="slide-up" data-sal-delay="120" data-sal-duration="800">
                            {{__('static_text.categories')}}
                        </h1>

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
                        <button class="gf_btn active" data-filter="*">{{ __('static_text.all') }}</button>

                    @foreach($gallery_categories as $category)
                            @if($category->is_active)
                                @if($category->id !=1)
                                    <button class="gf_btn" data-filter=".cat{{$category->id}}"
                                            data-name="{{ $category->$columnName }}">
                                        {{$category->$columnName}}
                                    </button>
                                @endif
                            @endif
                        @endforeach


                    </div>
                </div>
            </div>

            <!-- gallery area start -->
            <div class="rts-gallery-area">
                <div class="gallery-area-inner">
                    <div class="row gallery-row">
                        @foreach ($galleries as $index => $gallery)
                            <div class="col-lg-3 cat{{ $gallery->category_id }}">
                                <div class="gallery-image" data-sal="slide-up" data-sal-delay="{{ 50 * ($index + 1) }}" data-sal-duration="800">
                                    <a class="dynamic-popup" href="#" data-index="{{ $index }}"><img src="{{asset("$gallery->image_path")  }}" alt="gallery"></a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery önce yüklenmeli -->


    <script src="https://cdnjs.cloudflare.com/ajax/libs/imagesloaded/4.1.4/imagesloaded.pkgd.min.js"></script>

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



