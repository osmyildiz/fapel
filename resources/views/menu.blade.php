@extends('layouts.master')


@section('content')
    @include('partials.breadcrumb', ['slider' => $slider])
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
    <!-- jQuery önce yüklenmeli -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Daha sonra İsotope -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>


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



        });




    </script>


@endsection



