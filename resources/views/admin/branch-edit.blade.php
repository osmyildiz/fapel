@extends('admin.layouts.master')

@section('title') ŞUBE @endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

    @component('admin.components.breadcrumb')
        @slot('li_1') Admin Panel @endslot
        @slot('title') Şube Düzenle @endslot
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
        <form method="POST" class="form-horizontal" action="/branch-update/{{$record->id}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <h4 class="card-title mb-4">Şube Düzenle</h4>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">

                                <div class="row mb-4">
                                    <label for="img" class="col-sm-3 col-form-label">
                                        <img src="{{url($record->img)}}" alt="" style="display:block;" width="300" height="170">
                                    </label>

                                </div>
                                <div class="row mb-4">
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <input type="file" class="form-control" id="img" name="img">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="name" class="col-sm-3 col-form-label">Şube İsmi</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name" value="{{$record->name}}">

                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="phone" class="col-sm-3 col-form-label">Telefon</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " id="phone" name="phone" value="{{$record->phone}}">

                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="address" class="col-sm-3 col-form-label">Adres</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " id="address" name="address" value="{{$record->address}}">

                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="menu_url" class="col-sm-3 col-form-label">Menü Dosyası(PDF)</label>
                                    <div class="col-sm-9">

                                        <div class="input-group">

                                            <input type="file" class="form-control" id="menu_url" name="menu_url">
                                        </div>
                                        <span>
                                            {{$record->menu_url}}
                                        </span>
                                    </div>
                                </div>


                                <div class="row mb-4">
                                    <label for="weekday_opening_time" class="col-sm-3 col-form-label">Hafta içi Açık Saatler</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " id="weekday_opening_time" name="weekday_opening_time" value="{{$record->weekday_opening_time}}">

                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="weekend_opening_time" class="col-sm-3 col-form-label">Hafta sonu Açık Saatler</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " id="weekend_opening_time" name="weekend_opening_time" value="{{$record->weekend_opening_time}}">

                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <label for="map" class="col-sm-3 col-form-label">Google Map Linki</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control " id="map" name="map" value="{{$record->map}}">

                                    </div>
                                </div>

                                <div class="mb-4 row">
                                    <label for="content_tr" class="col-md-3 col-form-label">İçerik (TR)</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="elm1" name="content_tr">{{ $record->content_tr }}</textarea>
                                    </div>

                                </div>

                                <div class="mb-4 row">
                                    <label for="content_en" class="col-md-3 col-form-label">Content (EN)</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="elm2" name="content_en">{{ $record->content_en }}</textarea>
                                    </div>

                                </div>

                                <div class="mb-4 row">
                                    <label for="content_ar" class="col-md-3 col-form-label">المحتوى (AR)</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" id="elm3" name="content_ar">{{ $record->content_ar }}</textarea>
                                    </div>

                                </div>

                                <div class="row mb-4">
                                    <label for="priority" class="col-sm-3 col-form-label">Öncelik</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="priority" name="priority" value="{{$record->priority}}">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="is_active" class="col-sm-3 col-form-label">Aktif mi?</label>
                                    <div class="col-sm-9">
                                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" {{$record->is_active == 1 ? "checked" : ""}}>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="row justify-content-end">
                                        <div class="col-sm-9">
                                            <div>
                                                <button type="submit" class="btn btn-primary w-md">Güncelle</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <script src="{{ URL::asset('/assets/libs/tinymce/tinymce.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ URL::asset('/assets/js/pages/form-editor.init.js') }}"></script>
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
