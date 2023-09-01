@extends('admin.layouts.master')

@section('title') SEO @endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

    @component('admin.components.breadcrumb')
        @slot('li_1') Admin Panel @endslot
        @slot('title') SEO EDIT @endslot
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
        <form method="POST" class="form-horizontal" action="/update-seo/{{$seo->id}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <h4 class="card-title mb-4">SEO Düzenle</h4>

                <!-- Türkçe Alanlar -->
                <h5>Türkçe</h5>
                @php $lang = "tr"; @endphp
                @include('admin.partials.seo-inputs', ['lang' => $lang])

                <!-- English Alanlar -->
                <h5>English</h5>
                @php $lang = "en"; @endphp
                @include('admin.partials.seo-inputs', ['lang' => $lang])

                <!-- العربية Alanlar -->
                <h5>العربية</h5>
                @php $lang = "ar"; @endphp
                @include('admin.partials.seo-inputs', ['lang' => $lang])

                <div class="row mb-4">
                    <label for="twitter_name" class="col-md-3 col-form-label">Twitter Adı</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" value="{{$seo->twitter_name}}" id="twitter_name" name="twitter_name">
                        <span class="error" style="color:red" role="alert">
                        <strong>{!! $errors->first('twitter_name') !!}</strong>
                    </span>
                    </div>
                </div>

                <div class="row mb-4">
                    <label for="logo_url" class="col-md-3 col-form-label">Logo URL</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text" value="{{$seo->logo_url}}" id="logo_url" name="logo_url">
                        <span class="error" style="color:red" role="alert">
                        <strong>{!! $errors->first('logo_url') !!}</strong>
                    </span>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="row justify-content-end">
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-primary w-md">Güncelle</button>
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
