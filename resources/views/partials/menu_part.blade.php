<div class="menu-area-2-inner">
    <div class="shape-1"><img src="{{ asset('assets1/images/project/vector3.webp') }}" alt="shape"></div>
    <div class="row justify-content-center">
        @foreach($menus as $menu)
            <div class="col-lg-6 cat{{ $menu->category_id }}">
                <div class="menu-wrapper" data-sal="zoom-in" data-sal-delay="150" data-sal-duration="800">
                    <div class="menu-image">
                        <img src="{{ asset($menu->img) }}" alt="{{ $menu->{"name_" . app()->getLocale()} }}">
                    </div>
                    <div class="content">
                        <h4 class="p-title">
                            <a>{{ $menu->{"name_" . app()->getLocale()} }}</a>
                        </h4>
                        @if(empty($menu->{"description_" . app()->getLocale()}))
                            <p class="desc" style="visibility: hidden;">empty description</p>
                        @else
                            <p class="desc">{{ $menu->{"description_" . app()->getLocale()} }}</p>
                        @endif
                    </div>
                    <div class="price-tag">
                        {{ $menu->price1 }}₺
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
