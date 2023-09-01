<div class="rts-breadcrumb-area bg-breadcrumb bg-dark " style="background-image: url({{ asset($slider->img) }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- bread crumb inner wrapper -->
                <div class="breadcrumb-inner text-center">
                    <div class="banner-shape-area" data-sal="slide-up" data-sal-delay="120" data-sal-duration="800">
                        <span class="shape"></span>
                        <span class="shape"></span>
                    </div>
                    <h2 class="heading-title" data-sal="slide-up" data-sal-delay="120" data-sal-duration="800">
                        {{ $slider->{'second_title_' . app()->getLocale()} }}</h2>
                    <h1 class="main-title" data-sal="slide-up" data-sal-delay="120"
                        data-sal-duration="800">{{ $slider->{'first_title_' . app()->getLocale()} }}</h1>
                </div>
                <!-- bread crumb inner wrapper end -->
            </div>
        </div>
    </div>
</div>
