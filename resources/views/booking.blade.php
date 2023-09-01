@extends('layouts.master')
<style>
    .alert {
        padding: 20px;
        background-color: #f44336;
        color: white;
        opacity: 0.83;
        transition: opacity 0.6s;
        margin-bottom: 15px;
    }

    .alert.success {background-color: #04AA6D;}
    .alert.info {background-color: #2196F3;}
    .alert.warning {background-color: #ff9800;}

    .closebtn {
        padding-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 20px;
        line-height: 18px;
        cursor: pointer;
        transition: 0.3s;
    }

    .closebtn:hover {
        color: black;
    }
</style>


@section('content')
    @include('partials.breadcrumb', ['slider' => $slider])
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
                            <option value="{{ $branch->name }}" {{ (old('branch') == $branch->name) ? 'selected' : '' }}>{{ $branch->name }}</option>
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

    <script>
        $(document).ready(function(){
            $('.alert-success').fadeIn().delay(3000).fadeOut('slow');
            $('.alert-danger').fadeIn().delay(3000).fadeOut('slow');
        });
    </script>
@endsection



