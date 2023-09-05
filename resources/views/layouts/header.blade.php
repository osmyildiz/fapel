@php
    use App\Models\Contact;
    $contact = Contact::find(1);
@endphp
<style>
    .active-lang {
        font-weight: bold;
        color: #ffffff; /* İstediğiniz bir renk değerini kullanabilirsiniz. */
    }
</style>
<header class="header-one header--sticky">
    <div class="header-one-container">
        <div class="row">
            <div class="col-12">
                <div class="header-main-wrapper">
                    <div class="logo-area">
                        <a href="/" class="logo">
                            <img src="{{asset('assets1/images/logo/fapel-restaurant-logo.png')}}" alt="image-logo">
                        </a>
                    </div>
                    <div class="menu-area" id="menu-btn">
                        <a href="#" class="nav-menu-link menu-button">
                            <span class="dot1"></span>
                            <span class="dot2"></span>
                            <span class="dot3"></span>
                            <span class="dot4"></span>
                        </a>
                    </div>

                    <div class="rts-header-mid d-none d-lg-block">
                        <!-- nav area start -->
                        <div class="main-nav-desk nav-area">
                            <nav>
                                <ul>

                                    <li>
                                        <a class="nav-link" href="{{ route(app()->getLocale() . '.about') }}">{{ __('static_text.about') }}</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="{{ route(app()->getLocale() . '.menu') }}">{{ __('static_text.menu') }}</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="{{ route(app()->getLocale() . '.gallery') }}">{{ __('static_text.gallery') }}</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="{{ route(app()->getLocale() . '.blog') }}">{{ __('static_text.blog') }}</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="{{ route(app()->getLocale() . '.reservation') }}">{{ __('static_text.booking') }}</a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="{{ route(app()->getLocale() . '.contact') }}">{{ __('static_text.contact') }}</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>

                        <!-- nav-area end -->
                    </div>
                    <!-- header right start -->
                    <div class="rts-header-right">
                        <!-- bottom header start -->
                        <div class="bottom">
                            @php
                                $currentLang = app()->getLocale();
    $currentRouteName = Illuminate\Support\Facades\Route::currentRouteName() ?? 'home';

    $routeSuffix = str_replace($currentLang . '.', '', $currentRouteName);

    $translatedRouteNames = [
        'tr' => 'tr.' . $routeSuffix,
        'en' => 'en.' . $routeSuffix,
        'ar' => 'ar.' . $routeSuffix
    ];

    // Varsayılan olarak boş slug değerlerini tanımlıyoruz.
    $translatedSlugs = [
        'tr' => null,
        'en' => null,
        'ar' => null,
    ];

    // Eğer rota slug parametresine sahipse, bu değeri kullanarak blog gönderisini çekiyoruz.
    if (request()->route()->hasParameter('slug')) {
        $currentSlug = request()->route('slug');
        $currentPost = \App\Models\BlogPost::where('slug_' . $currentLang, $currentSlug)->first();
        \Illuminate\Support\Facades\Log::info('Mevcut Slug:', ['slug' => $currentSlug]);

        if ($currentPost) {
            // Blog gönderisinin mevcut olduğunu loglayalım
            \Illuminate\Support\Facades\Log::info('Mevcut Blog Gönderisi:', ['post_id' => $currentPost->id, 'title' => $currentPost->title]);

            // Slug'ları doğru bir şekilde set ediyoruz.
            $translatedSlugs = [
                'tr' => $currentPost->slug_tr,
                'en' => $currentPost->slug_en,
                'ar' => $currentPost->slug_ar,
            ];
        } else {
            // Blog gönderisinin bulunamadığını loglayalım
            \Illuminate\Support\Facades\Log::warning('Blog gönderisi bulunamadı', ['slug' => $currentSlug]);
        }
    }
                            @endphp


                            <div class="query-list">
                                <a href="{{ route($translatedRouteNames['tr'], ['slug' => $translatedSlugs['tr']]) }}"
                                   class="{{ App::getLocale() == 'tr' ? 'active-lang' : '' }}">TR</a>
                                |
                                <a href="{{ route($translatedRouteNames['en'], ['slug' => $translatedSlugs['en']]) }}"
                                   class="{{ App::getLocale() == 'en' ? 'active-lang' : '' }}">EN</a>
                                |
                                <a href="{{ route($translatedRouteNames['ar'], ['slug' => $translatedSlugs['ar']]) }}"
                                   class="{{ App::getLocale() == 'ar' ? 'active-lang' : '' }}">AR</a>
                            </div>
                        </div>

                        <!-- bottom header end -->
                    </div>
                    <!-- header right end -->
                </div>
            </div>
        </div>
    </div>
</header>
<!-- side bar for desktop -->
<div id="side-bar" class="side-bar header-one">
    <div class="inner">
        <button class="close-icon-menu"><i class="far fa-times"></i></button>
        <!-- inner menu area desktop start -->
        <div class="inner-main-wrapper-desk d-none d-lg-block">
            <div class="thumbnail">
                <img src="{{asset('assets1/images/logo/fapel-steakhouse-ocakbasi-logo.png')}}" alt="dinenos">
            </div>
            <div class="banner-shape-area">
                <span class="shape"></span>
                <span class="shape"></span>
                <span class="shape"></span>
            </div>
            <div class="inner-content">
                <ul class="feature-list">
                    <li class="query-list">
                        <span class="sub-text">{{$contact->address}}</span>
                        <a class="phone" href="tel:{{$contact->phone}}">{{$contact->phone}}</a>
                        <a class="email" href="mail-to:{{$contact->email}}">{{$contact->email}}</a>
                    </li>
                    <li class="query-list two">
                        <p class="time">09:00-00:00</p>

                    </li>
                </ul>
                <div class="footer">
                    <ul class="social-area">
                        <li><a href="{{$contact->facebook}}" ><i class="fa-brands fa-facebook-f"></i></a></li>
                        <li><a href="{{$contact->twitter}}"  ><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="{{$contact->instagram}}"><i class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="{{$contact->linkedin}}" ><i class="fa-brands fa-linkedin"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- mobile menu area start -->
        <div class="mobile-menu d-block d-lg-none">
            <nav class="nav-main mainmenu-nav mt--30">
                <ul class="mainmenu" id="mobile-menu-active">

                    <li>
                        <a class="nav-link" href="{{ route(app()->getLocale() . '.about') }}">{{ __('static_text.about') }}</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route(app()->getLocale() . '.menu') }}">{{ __('static_text.menu') }}</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route(app()->getLocale() . '.gallery') }}">{{ __('static_text.gallery') }}</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route(app()->getLocale() . '.blog') }}">{{ __('static_text.blog') }}</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route(app()->getLocale() . '.reservation') }}">{{ __('static_text.booking') }}</a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{ route(app()->getLocale() . '.contact') }}">{{ __('static_text.contact') }}</a>
                    </li>

                </ul>
            </nav>

            <div class="social-wrapper-one">
                <ul>
                    <li>
                        <a href="{{$contact->facebook}}" >
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{$contact->twitter}}"  >
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{$contact->instagram}}">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{$contact->linkedin}}" >
                            <i class="fa-brands fa-linkedin-in"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- mobile menu area end -->
</div>
<!-- header style two End -->
