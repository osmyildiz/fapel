@extends('admin.layouts.master')

@section('title') Kategori Güncelle ADMIN PANEL @endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

    @component('admin.components.breadcrumb')
        @slot('li_1') Admin Panel @endslot
        @slot('title') Kategori Güncelle @endslot
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
        <form method="POST" class="form-horizontal" action="/update-photocategory/{{$res->id}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <h4 class="card-title mb-4">Kategori Güncelle</h4>
                <div class="row">

                    <div class="col-xl-6">


                        <div class="mb-4 row">
                            <label for="name_tr" class="col-md-3 col-form-label">Kategori Adı(TR)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text"
                                       value="{{$res->name_tr}}"     id="name_tr" name="name_tr">
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="name_en" class="col-md-3 col-form-label">Kategori Adı(EN)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text"
                                       value="{{$res->name_en}}"     id="name_en" name="name_en">
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="name_ar" class="col-md-3 col-form-label">Kategori Adı(AR)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text"
                                       value="{{$res->name_ar}}"     id="name_ar" name="name_ar">
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="priority" class="col-md-3 col-form-label">Öncelik</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text"
                                       value="{{$res->priority}}"     id="priority" name="priority">
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="is_active" class="col-sm-3 col-form-label">Aktif mi?</label>
                            <div class="col-sm-9">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active"  {{$res->is_active ==1?"checked":""}}>

                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="row justify-content-end">
                                <div class="col-sm-9">


                                    <div>
                                        <button type="submit" class="btn btn-primary w-md">GÜNCELLE</button>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- end card -->
                    </div>




                    <!-- end col -->
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
