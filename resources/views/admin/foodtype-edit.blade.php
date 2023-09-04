@extends('admin.layouts.master')

@section('title') MENU KATEGORİ @endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

    @component('admin.components.breadcrumb')
        @slot('li_1') Admin Panel @endslot
        @slot('title') Menu Kategori @endslot
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
        <form method="POST" class="form-horizontal" action="/update-foodtype/{{$res->id}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <h4 class="card-title mb-4">Menü Kategori Güncelle </h4>
                <div class="row">

                    <div class="col-xl-6">

                        <!-- Name fields for TR, EN, AR -->
                        <div class="mb-4 row">
                            <label for="name_tr" class="col-md-3 col-form-label">Category Name (TR)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" id="name_tr" name="name_tr" value="{{$res->name_tr}}">
                            </div>
                            @error('name_tr')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4 row">
                            <label for="name_en" class="col-md-3 col-form-label">Category Name (EN)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" id="name_en" name="name_en" value="{{$res->name_en}}">
                            </div>
                            @error('name_en')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4 row">
                            <label for="name_ar" class="col-md-3 col-form-label">Category Name (AR)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" id="name_ar" name="name_ar" value="{{$res->name_ar}}">
                            </div>
                            @error('name_ar')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Description fields for TR, EN, AR -->
                        <!-- You can update these fields' values to fetch appropriate data from $res if available -->
                        <div class="mb-4 row">
                            <label for="description_tr" class="col-md-3 col-form-label">Description (TR)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" id="description_tr" name="description_tr" value="{{$res->description_tr ?? ''}}">
                            </div>
                            @error('description_tr')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4 row">
                            <label for="description_en" class="col-md-3 col-form-label">Description (EN)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" id="description_en" name="description_en" value="{{$res->description_en ?? ''}}">
                            </div>
                            @error('description_en')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4 row">
                            <label for="description_ar" class="col-md-3 col-form-label">Description (AR)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" id="description_ar" name="description_ar" value="{{$res->description_ar ?? ''}}">
                            </div>
                            @error('description_ar')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Priority and IsActive fields as they were -->
                        <div class="mb-4 row">
                            <label for="priority" class="col-md-3 col-form-label">Priority</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="number" id="priority" name="priority" value="{{$res->priority}}">
                            </div>

                        </div>

                        <div class="row mb-4">
                            <label for="is_active" class="col-sm-3 col-form-label">Enable?</label>
                            <div class="col-sm-9">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" {{$res->is_active == 1 ? "checked" : ""}}>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="row justify-content-end">
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary w-md">GÜNCELLE</button>
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
