@extends('admin.layouts.master')

@section('title') İletişim @endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

    @component('admin.components.breadcrumb')
        @slot('li_1') Admin Panel @endslot
        @slot('title') İletişim @endslot
    @endcomponent
    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has($msg))
                <div class="alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-check-all me-2"></i>
                    {{ Session::get($msg) }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

            @endif
        @endforeach
    </div>

    <div class="card">
        <form method="POST" class="form-horizontal" action="/contact-update" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <h4 class="card-title mb-4">Güncelle</h4>
                <div class="row">

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">

                                <!-- Telefon -->
                                <div class="row mb-4">
                                    <label for="phone" class="col-sm-3 col-form-label">Telefon</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="phone" name="phone" value="{{$record->phone}}">
                                        <span class="error" style="color:red" role="alert">
                                        <strong>{!! $errors->first('phone') !!}</strong>
                                    </span>
                                    </div>
                                </div>

                                <!-- Adres -->
                                <div class="row mb-4">
                                    <label for="address" class="col-sm-3 col-form-label">Adres</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="address" name="address" value="{{$record->address}}">
                                        <span class="error" style="color:red" role="alert">
                                        <strong>{!! $errors->first('address') !!}</strong>
                                    </span>
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="row mb-4">
                                    <label for="email" class="col-sm-3 col-form-label">E-mail</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="email" name="email" value="{{$record->email}}">
                                        <span class="error" style="color:red" role="alert">
                                        <strong>{!! $errors->first('email') !!}</strong>
                                    </span>
                                    </div>
                                </div>

                                <!-- Instagram -->
                                <div class="row mb-4">
                                    <label for="instagram_link" class="col-sm-3 col-form-label">Instagram</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="instagram_link" name="instagram_link" value="{{$record->instagram_link}}">
                                        <span class="error" style="color:red" role="alert">
                                        <strong>{!! $errors->first('instagram_link') !!}</strong>
                                    </span>
                                    </div>
                                </div>

                                <!-- Facebook -->
                                <div class="row mb-4">
                                    <label for="facebook_link" class="col-sm-3 col-form-label">Facebook</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="facebook_link" name="facebook_link" value="{{$record->facebook_link}}">
                                        <span class="error" style="color:red" role="alert">
                                        <strong>{!! $errors->first('facebook_link') !!}</strong>
                                    </span>
                                    </div>
                                </div>

                                <!-- Twitter -->
                                <div class="row mb-4">
                                    <label for="twitter_link" class="col-sm-3 col-form-label">Twitter</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="twitter_link" name="twitter_link" value="{{$record->twitter_link}}">
                                        <span class="error" style="color:red" role="alert">
                                        <strong>{!! $errors->first('twitter_link') !!}</strong>
                                    </span>
                                    </div>
                                </div>

                                <!-- LinkedIn -->
                                <div class="row mb-4">
                                    <label for="linkedin_link" class="col-sm-3 col-form-label">LinkedIn</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="linkedin_link" name="linkedin_link" value="{{$record->linkedin_link}}">
                                        <span class="error" style="color:red" role="alert">
                                        <strong>{!! $errors->first('linkedin_link') !!}</strong>
                                    </span>
                                    </div>
                                </div>

                                <!-- Hafta İçi Açılış Saati -->
                                <div class="row mb-4">
                                    <label for="weekday_opening_time" class="col-sm-3 col-form-label">Hafta İçi Açılış Saati</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="weekday_opening_time" name="weekday_opening_time" value="{{$record->weekday_opening_time}}">
                                        <span class="error" style="color:red" role="alert">
                                        <strong>{!! $errors->first('weekday_opening_time') !!}</strong>
                                    </span>
                                    </div>
                                </div>

                                <!-- Hafta Sonu Açılış Saati -->
                                <div class="row mb-4">
                                    <label for="weekend_opening_time" class="col-sm-3 col-form-label">Hafta Sonu Açılış Saati</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="weekend_opening_time" name="weekend_opening_time" value="{{$record->weekend_opening_time}}">
                                        <span class="error" style="color:red" role="alert">
                                        <strong>{!! $errors->first('weekend_opening_time') !!}</strong>
                                    </span>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="border-top">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary">Güncelle</button>
                </div>
            </div>

        </form>
    </div>




@endsection
@section('script')
    <!-- Required datatable js -->
    <script src="{{ asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ asset('/assets/js/pages/datatables.init.js') }}"></script>
    <script language="javascript" type="text/javascript">
        function limitText(limitField, limitNum) {
            if (limitField.value.length > limitNum) {
                limitField.value = limitField.value.substring(0, limitNum);
            }
        }


    </script>
    <script>
        $(document).ready(function(){
            $('.alert-success').fadeIn().delay(3000).fadeOut('slow');
            $('.alert-danger').fadeIn().delay(3000).fadeOut('slow');
        });
    </script>
@endsection
