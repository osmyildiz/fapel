@extends('layouts.master')
<!-- jQuery CDN -->

@section('content')
    <style>
        @media (max-width: 767px) {
            .resp-tab-item {
                font-size: 18px; /* Menü isimlerinin font boyutu sadece mobilde */
            }
        }
        .menu-scroll-container {
            overflow-x: auto;
            white-space: nowrap;
            display: flex;
        }

        .menu-scroll-container .list-menu {
            flex: 0 0 auto;
            margin-left: auto;
            margin-right: auto;
            white-space: normal;
        }

        .menu-classic-single .list-menu li {
            display: block;
            vertical-align: top;
        }


    </style>

    <!-- Page Content-->
    <main class="page-content">
        <!-- Swiper variant 3-->
        <section class="bg-gray-darker">
            <div class="swiper-variant-1">
                <div data-slide-effect="fade" data-min-height="600px" class="swiper-container swiper-slider">
                    <div class="swiper-wrapper">
                        @foreach($sliders as $slide)
                            <div data-slide-bg="{{$slide->img}}" class="swiper-slide">
                                <div class="swiper-slide-caption slide-caption-2 text-center">
                                    <div class="shell">
                                        <div class="range range-sm-center">
                                            <div class="cell-sm-12">
                                                <h5 data-caption-animate="fadeInUpSmall" data-caption-delay="100" class="text-italic font-secondary text-white">
                                                    {{$slide->yellow_title}}</h5>
                                                <h2 data-caption-animate="fadeInUpSmall" data-caption-delay="400" class="text-uppercase text-white offset-top-10 offset-sm-top-0">{{$slide->title}}</h2>
                                                <div class="range range-sm-center offset-top-15">
                                                    <div class="cell-sm-9 cell-lg-7">
                                                        <p data-caption-animate="fadeInUpSmall" data-caption-delay="700" class="text-white offset-top-18">{{$slide->text}}</p><a href="/booking" data-caption-animate="fadeInUpSmall" data-caption-delay="1000" class="btn btn-primary-lighter btn-md btn-shape-circle offset-top-20">BOOK A TABLE</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>
                    <!-- Swiper Navigation-->
                    <div class="swiper-pagination-wrap">
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section-50 section-sm-top-80">
            <div class="shell">
                <div class="range range-xs-center" id="reservation">
                    <div class="cell-md-12">
                        <h3>Make a Reservation</h3>
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
                        <form data-form-output="form-output-global" data-form-type="contact" method="post" action="/book_a_table_form" class="rd-mailform1 form-contact-line text-left offset-top-35">
                            @csrf
                            <div class="form-inline-flex offset-top-15">
                                <div class="form-group">
                                    <span class="error"style="color:red" role="alert">
                                       <strong> {!! $errors->first('guest_number', '<p class="form-group">:message</p>') !!}</strong>
                                    </span>
                                    <input id="guest_number" type="text" placeholder="Guest Number" name="guest_number" value="{{ old('guest_number') }}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <span class="error"style="color:red" role="alert">
                                       <strong> {!! $errors->first('time', '<p class="form-group">:message</p>') !!}</strong>
                                    </span>
                                    <select class="form-control" id="time" name="time">
                                        <option {{ old('time') ? "selected" : "" }} value="{{ old('time') }}">{{ old('time')?old('time'):"Time" }}</option>
                                        <option value="12.00 am">12.00 am</option>
                                        <option value="12.30 am">12.30 am</option>
                                        <option value="01.00 pm">01.00 pm</option>
                                        <option value="01.30 pm">01.30 pm</option>
                                        <option value="02.00 pm">02.00 pm</option>
                                        <option value="02.30 pm">02.30 pm</option>
                                        <option value="03.00 pm">03.00 pm</option>
                                        <option value="03.30 pm">03.30 pm</option>
                                        <option value="04.00 pm">04.00 pm</option>
                                        <option value="04.30 pm">04.30 pm</option>
                                        <option value="05.00 pm">05.00 pm</option>
                                        <option value="05.30 pm">05.30 pm</option>
                                        <option value="06.00 pm">06.00 pm</option>
                                        <option value="06.30 pm">06.30 pm</option>
                                        <option value="07.00 pm">07.00 pm</option>
                                        <option value="07.30 pm">07.30 pm</option>
                                        <option value="08.00 pm">08.00 pm</option>
                                        <option value="08.30 pm">08.30 pm</option>
                                        <option value="09.00 pm">09.00 pm</option>
                                        <option value="09.30 pm">09.30 pm</option>
                                        <option value="10.00 pm">10.00 pm</option>

                                    </select>
                                </div>
                                <div class="form-group">
                            <span class="error"style="color:red" role="alert">
                                       <strong> {!! $errors->first('res_date', '<p class="form-group">:message</p>') !!}</strong>
                                    </span>
                                    <!--<input class="form-control" id="datepicker1" placeholder="Booking Date" name="res_date" value="{{ old('res_date') }}" >-->
                                    <input class="form-control" type="text" id="datepicker" placeholder="Booking Date" name="res_date" value="{{ old('res_date') }}">

                                </div>
                            </div>
                            <div class="form-inline-flex offset-top-15">

                                <div class="form-group">
                                    <span class="error"style="color:red" role="alert">
                                       <strong> {!! $errors->first('name', '<p class="form-group">:message</p>') !!}</strong>
                                    </span>
                                    <input id="name" type="text" placeholder="Your First Name" name="name" value="{{ old('name') }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <span class="error"style="color:red" role="alert">
                                       <strong> {!! $errors->first('phone', '<p class="form-group">:message</p>') !!}</strong>
                                    </span>
                                    <input id="phone" type="text" placeholder="Enter your phone" name="phone" value="{{ old('phone') }}" class="form-control">
                                </div>

                                <div class="form-group">
                                     <span class="error"style="color:red" role="alert">
                                       <strong> {!! $errors->first('email', '<p class="form-group">:message</p>') !!}</strong>
                                    </span>
                                    <input id="email" type="email" placeholder="Enter your email" name="email" value="{{ old('email') }}" class="form-control">
                                </div>
                            </div>
                            <div class="form-inline-flex offset-top-15">
                                <div class="form-group" style="flex-basis: 66.66%">
                                    <textarea id="message" placeholder="Write your message here" name="message"  class="form-control" >{{ old('message') }}</textarea>
                                </div>
                                <div class="form-group" style="flex-basis: 33%">
                                    <button type="submit" class="btn btn-primary btn-fullwidth" >Send</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-50 section-sm-top-20 section-sm-bottom-100">
            <h3>Our Menu</h3>
            <div class="responsive-tabs responsive-tabs-button responsive-tabs-horizontal responsive-tabs-carousel offset-top-40">
                <ul class="resp-tabs-list">
                    @foreach($categories as $category)
                        <li onclick="event.preventDefault(); showCategoryMenu('{{ strtolower($category->name) }}')" data-hash="{{ strtolower($category->name) }}" class="resp-tab-item" aria-controls="tab_item-{{ $loop->index }}" role="tab">{{ $category->name }}</li>
                    @endforeach
                </ul>
                @foreach($categories as $category)
                    <div class="menu-scroll-container">
                    <ul class="list-menu" id="{{ strtolower($category->name) }}" style="{{ $loop->first ? 'display: block;' : 'display: none;' }}">
                        <section class="section-50 section-sm-100">
                            <div class="shell">
                                <div class="range range-xs-center">
                                    <div class="cell-xs-12">
                                        <div class="inset-lg-left-15 inset-lg-right-15"></div>
                                        <div class="menu-classic bg-menu-7 menu-classic-single">
                                            <h4 class="title"><a href="/menu" class="link-white"></a></h4>
                                            <ul class="list-menu">
                                                @foreach($menus as $menu)
                                                    @if($menu->category_id === $category->id)
                                                        <li>
                                                            <div class="menu-item h6"><span>{{ $menu->name }}</span><span class="price">{{ $menu->price }}</span></div>
                                                            <div class="menu-item-desc"><span>{{ $menu->description }}</span></div>
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </ul>
                        </div>
                @endforeach


            </div>
        </section>

        <!-- Gallery grid-->
        <section class="section-50 section-sm-80 bg-gray-darker1">
            <div class="shell isotope-wrap">
                <div class="range range-sm-center">
                    <div class="cell-xs-12">
                        <div class="cell-box">
                            <ul class="isotope-filters-responsive">
                                <div id="isotope-1" class="isotope-filters isotope-filters-horizontal">
                                    <ul class="inline-list">
                                        <li><a data-isotope-filter="*" data-isotope-group="gallery" href="#" class="active">All</a></li>
                                        <li><a data-isotope-filter="Category1" data-isotope-group="gallery" href="#">Food</a></li>
                                        <li><a data-isotope-filter="Category2" data-isotope-group="gallery" href="#">Venue</a></li>
                                    </ul>
                                </div>
                            </ul>
                        </div>
                    </div>
                    <div class="cell-xs-12 offset-top-40">
                        <!-- Isotope Content-->
                        <div data-isotope-layout="fitRows" data-isotope-group="gallery" data-photo-swipe-gallery="gallery" class="row isotope">
                            @foreach($food as $key=>$foo)
                                <div data-filter="Category1" class="col-xs-12 col-sm-6 col-md-4 isotope-item">
                                    <a href="{{$foo->url}}" data-photo-swipe-item="" data-size="1200x800" class="thumbnail thumbnail-variant-1">
                                        <figure>
                                            <img src="{{$foo->url}}" alt="" width="370" height="278" class="img1-responsive"/>
                                        </figure>
                                    </a>
                                </div>
                            @endforeach
                            @foreach($place as $key=>$foo)
                                <div data-filter="Category2" class="col-xs-12 col-sm-6 col-md-4 isotope-item">
                                    <a href="{{$foo->url}}" data-photo-swipe-item="" data-size="1200x800" class="thumbnail thumbnail-variant-1">
                                        <figure>
                                            <img src="{{$foo->url}}" alt="" width="370" height="278" class="img1-responsive"/>
                                        </figure>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--services-->
        <section class="section-20 section-sm-100">
            <div class="shell">
                <div class="range range-xs-center">
                    <div class="cell-sm-6 cell-md-4 view-animate fadeInUpBigger delay-04">
                        <!-- Box icon-->
                        <article class="box-icon box-icon-variant-1">
                            <div class="icon-wrap"><span class="icon icon-lg text-base restaurant-icon-35 icon-xl"></span></div>
                            <div class="box-icon-header">
                                <h5>{{$about->box1_title}}</h5>
                            </div>
                            <hr class="divider-xs bg-primary"/>
                            <p>{{$about->box1_content}}</p>
                        </article>
                    </div>
                    <div class="cell-sm-6 cell-md-4 offset-top-50 offset-sm-top-0 view-animate fadeInUpBigger delay-08">
                        <!-- Box icon-->
                        <article class="box-icon box-icon-variant-1">
                            <div class="icon-wrap"><span class="icon icon-lg text-base restaurant-icon-11 icon-xxl"></span></div>
                            <div class="box-icon-header">
                                <h5>{{$about->box2_title}}</h5>
                            </div>
                            <hr class="divider-xs bg-primary"/>
                            <p>{{$about->box2_content}}</p>
                        </article>
                    </div>
                    <div class="cell-sm-6 cell-md-4 offset-top-50 offset-md-top-0 view-animate fadeInUpBigger delay-04">
                        <!-- Box icon-->
                        <article class="box-icon box-icon-variant-1">
                            <div class="icon-wrap"><span class="icon icon-lg text-base restaurant-icon-20 icon-xxl"></span></div>
                            <div class="box-icon-header">
                                <h5>{{$about->box3_title}}</h5>
                            </div>
                            <hr class="divider-xs bg-primary"/>
                            <p>{{$about->box3_content}}</p>
                        </article>
                    </div>

                </div>
            </div>
        </section>
        <!--section gallery-->
        <section>
            <div data-photo-swipe-gallery="gallery" class="range range-condensed">
                @foreach($fours as $four)
                    <div class="cell-xs-6 cell-md-3"><a data-photo-swipe-item="" data-size="1200x800" href="{{$four->url}}" data-author="" class="thumbnail-gallery"><img src="{{$four->url}}" alt="" width="480" height="394"/></a></div>

                @endforeach

            </div>
        </section>
        <section>
            <div class="map-responsive1">
                <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d2482.518800875097!2d-0.13772004896390314!3d51.52204361735384!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNTHCsDMxJzE5LjciTiAwwrAwOCcwNy45Ilc!5e0!3m2!1str!2str!4v1681300229526!5m2!1str!2str" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                        frameborder="0"
                        style="border:0;"
                        allowfullscreen=""
                        aria-hidden="false"
                        tabindex="0"
                        center="51.52204361735384,-0.13772004896390314"
                        zoom="15"
                ></iframe>
            </div>
        </section>
        <div tabindex="-1" role="dialog" aria-hidden="true" class="pswp">
            <div class="pswp__bg"></div>
            <div class="pswp__scroll-wrap">
                <div class="pswp__container">
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                </div>
                <div class="pswp__ui pswp__ui--hidden">
                    <div class="pswp__top-bar">
                        <div class="pswp__counter"></div>
                        <button title="Close (Esc)" class="pswp__button pswp__button--close"></button>
                        <button title="Share" class="pswp__button pswp__button--share"></button>
                        <button title="Toggle fullscreen" class="pswp__button pswp__button--fs"></button>
                        <button title="Zoom in/out" class="pswp__button pswp__button--zoom"></button>
                        <div class="pswp__preloader">
                            <div class="pswp__preloader__icn">
                                <div class="pswp__preloader__cut">
                                    <div class="pswp__preloader__donut"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                        <div class="pswp__share-tooltip"></div>
                    </div>
                    <button title="Previous (arrow left)" class="pswp__button pswp__button--arrow--left"></button>
                    <button title="Next (arrow right)" class="pswp__button pswp__button--arrow--right"></button>
                    <div class="pswp__caption">
                        <div class="pswp__caption__cent"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script>
        function showCategoryMenu(category) {
            // PHP ile dinamik olarak kategori isimlerini alın
            const categories = @json($categories->pluck('name')->map(function ($name) {
            return strtolower($name);
        }));

            for (let cat of categories) {
                let menu = document.getElementById(cat);
                let innerListMenu = menu.querySelector('.list-menu');
                if (cat === category) {
                    menu.style.display = 'block';
                    innerListMenu.style.display = 'block';
                } else {
                    menu.style.display = 'none';
                    innerListMenu.style.display = 'none';
                }
            }
            // Kategori adını adres çubuğuna ekle
            if (category) {
                window.location.hash = category;
            } else {
                window.location.hash = '';
            }
            window.addEventListener('hashchange', function () {
                if (window.location.hash.includes("undefined")) {
                    history.replaceState("", document.title, window.location.pathname);
                }
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#datepicker').Zebra_DatePicker({
                direction: true,
                format: 'Y/m/d',
                startDate: new Date(),
                disabled_dates: ['*.*.{1900-01-01} to 0d'],
            });
        });
    </script>








@endsection
