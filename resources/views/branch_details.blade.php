@extends('layouts.master')


@section('content')
    @php
        $lang = app()->getLocale();
        $columnName = 'name_' . $lang;
    @endphp
    @include('partials.breadcrumb', ['slider' => $slider])

    <div class="rts-blog-list-area rts-section-gap">
        @php
            $lang = app()->getLocale();
            $columnName = 'name_' . $lang;
        @endphp
        <div class="container">
            <div class="row g-5">
                <!-- rts blo post area -->
                <div class="col-xl-8 col-md-12 col-sm-12 col-12">
                    <!-- single post -->
                    <div class="blog-single-post-listing details mb--0">
                        <div class="thumbnail">
                            <img src="{{asset($record->img)}}" alt="{{$record->name_tr}}">
                        </div>
                        <div class="blog-listing-content">
                            <h3 class="title">FAPEL {{$record->name}}</h3>
                            <p class="disc para-1">
                                {!! html_entity_decode($record->{'content_'.$lang}) !!}
                            </p>





                        </div>
                    </div>
                    <!-- single post End-->
                </div>

                <!-- rts-blog post end area -->
                <!--rts blog wizered area -->
                <div class="col-xl-4 col-md-12 col-sm-12 col-12  pd-control-bg--40">
                    <!-- single wizered start -->
                    <div class="rts-single-wized Categories">
                        <div class="wized-header">
                            <h5 class="title">
                                FAPEL {{$record->name}}
                            </h5>
                        </div>
                        <div class="wized-body">

                            @foreach($branches as $branch)
                                <ul class="single-categories">
                                    <li><a href="{{ route($lang . '.branch_details', $branch->{'slug_'.$lang} ) }}">{{$branch->name}}<i class="far fa-long-arrow-right"></i></a></li>
                                </ul>
                            @endforeach

                        </div>
                    </div>
                    <!-- single wizered End -->
                    <!-- single wizered start -->
                    <div class="rts-single-wized Recent-post">
                        <div class="wized-header">
                            <h5 class="title">
                                {{__('static_text.contact')}}
                            </h5>
                        </div>
                        <div class="wized-body">
                            <!-- recent-post -->
                            <div class="recent-post-single">

                                <div class="content-area">
                                    <div class="user">
                                        <i class="fal fa-phone"></i>
                                        <a href="tel:{{$branch->phone}}" style="color: inherit; text-decoration: none;">
                                            <span>{{$branch->phone}}</span>
                                        </a>
                                    </div>

                                    <div class="content-area">
                                        <i class="fal fa-map-pin"></i>
                                        <span>{{$record->address}}</span>
                                    </div>
                                    <br>
                                    <div class="content-area">
                                        <div class="map-inner">
                                            <iframe src="{{$record->map}}" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- rts- blog wizered end area -->
            </div>
        </div>

    </div>
    <div class="rts-reservation-area reservation" id="reservation">
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
            <div class="row text-center">
                <div class="col-lg-12">
                    <div class="banner-one-wrapper">
                        <div class="title-img" data-sal="zoom-in" data-sal-delay="100" data-sal-duration="800">
                            <img src="{{asset('assets1/images/about/title-shape.png')}}" alt="about">
                        </div>
                        <h1 class="title-banner" data-sal="slide-up" data-sal-delay="120" data-sal-duration="800">
                            {{__('static_text.booking')}}
                        </h1>

                    </div>
                </div>
            </div>
        <div class="container">
            <form action="{{ route(app()->getLocale() . '.book_a_table') }}" class="appoinment-form" enctype="multipart/form-data" method="post">
                @csrf


                <div class="single-input">
                    @error('name')
                    <span class="text-white">{{ trans('validation.required', ['attribute' => trans('validation.attributes.name')]) }}</span>
                    @enderror
                    <input type="text" id="name" name="name" placeholder="{{ __('static_text.name') }}" value="{{ old('name') }}" >

                </div>
                <div class="single-input">
                    @error('email')
                    <span class="text-white">{{ trans('validation.required', ['attribute' => trans('validation.attributes.email')]) }}</span>
                    @enderror
                    <input type="email" id="email" name="email" placeholder="{{ __('static_text.email') }}" value="{{ old('email') }}" >

                </div>
                <div class="single-input">
                    @error('phone')
                    <span class="text-white">{{ trans('validation.required', ['attribute' => trans('validation.attributes.phone')]) }}</span>
                    @enderror
                    <input type="tel" id="phone" name="phone" placeholder="{{ __('static_text.phone') }}" value="{{ old('phone') }}" >

                </div>
                <div class="single-input">
                    @error('branch')
                    <span class="text-white">{{ trans('validation.required', ['attribute' => trans('validation.attributes.branch')]) }}</span>
                    @enderror
                    <select id="branch" name="branch" >
                        <option value="99" {{ (old('branch') == '99') ? 'selected' : '' }}>{{__('static_text.branch1')}}</option>
                        @foreach($branches as $branch)
                            <option value="{{ $branch->name }}" {{ (old('branch') == $branch->name || (isset($record) && $record->name == $branch->name)) ? 'selected' : '' }}>{{ $branch->name }}</option>
                        @endforeach
                    </select>
                </div>



                <!-- Alt satır -->
                <div class="single-input">
                    @error('guest_number')
                    <span class="text-white">{{ trans('validation.required', ['attribute' => trans('validation.attributes.guest_number')]) }}</span>
                    @enderror
                    <input type="number" id="guest_number" name="guest_number" placeholder="{{ __('static_text.guest_number') }}" value="{{ old('guest_number') }}" >

                </div>
                <div class="single-input">
                    @error('res_date')
                    <span class="text-white">{{ trans('validation.required', ['attribute' => trans('validation.attributes.res_date')]) }}</span>
                    @enderror

                    <input placeholder="{{ __('static_text.date') }}" type="text" name="res_date" id="datepicker" value="{{ old('res_date') }}" class="calendar" >
                </div>
                <div class="single-input">
                    @error('time')
                    <span class="text-white">{{ trans('validation.required', ['attribute' => trans('validation.attributes.time')]) }}</span>
                    @enderror

                    <input type="text" name='time' id="timepicker" placeholder="{{ __('static_text.time') }}" value="{{ old('time') }}" />
                </div>
                <div class="single-input">

                    <button type="submit" class="rts-btn btn-primary">{{ __('static_text.submit') }}</button>
                </div>

                <!-- Submit butonu -->


            </form>
        </div>
    </div>

@endsection



