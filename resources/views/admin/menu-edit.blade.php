@extends('admin.layouts.master')

@section('title') MENU @endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

    @component('admin.components.breadcrumb')
        @slot('li_1') Admin Panel @endslot
        @slot('title') MENU @endslot
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
        <form method="POST" class="form-horizontal" action="/update-menu/{{$res->id}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <h4 class="card-title mb-4">MENÜ GÜNCELLE</h4>
                <div class="row">
                    <div class="col-xl-6">
                        <!-- Kategori -->
                        <div class="mb-4 row">
                            <label for="category" class="col-md-3 col-form-label">Kategori</label>
                            <div class="col-sm-9">
                                <select id="category" class="form-select" name="category">
                                    @foreach($kategori_all as $kategori)
                                        <option value="{{$kategori->id}}" {{$kategori->id == $res->category_id?"selected":""}}>{{$kategori->name_tr}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Fiyat -->
                        <div class="row mb-4">
                            <label for="price" class="col-sm-3 col-form-label">Fiyat</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="price" name="price" value="{{$res->price}}" required>
                            </div>
                        </div>
                        <!-- Adı (TR) -->
                        <div class="mb-4 row">
                            <label for="name_tr" class="col-md-3 col-form-label">Adı (TR)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" value="{{$res->name_tr}}" id="name_tr" name="name_tr">
                            </div>
                        </div>
                        <!-- Adı (EN) -->
                        <div class="mb-4 row">
                            <label for="name_en" class="col-md-3 col-form-label">Adı (EN)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" value="{{$res->name_en}}" id="name_en" name="name_en">
                            </div>
                        </div>
                        <!-- Adı (AR) -->
                        <div class="mb-4 row">
                            <label for="name_ar" class="col-md-3 col-form-label">Adı (AR)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" value="{{$res->name_ar}}" id="name_ar" name="name_ar">
                            </div>
                        </div>
                        <!-- Açıklama (TR) -->
                        <div class="row mb-4">
                            <label for="description_tr" class="col-sm-3 col-form-label">Açıklama (TR)</label>
                            <div class="col-sm-9">
                                <textarea id="description_tr" class="form-control" rows="4" name="description_tr">{{$res->description_tr}}</textarea>
                            </div>
                        </div>
                        <!-- Açıklama (EN) -->
                        <div class="row mb-4">
                            <label for="description_en" class="col-sm-3 col-form-label">Açıklama (EN)</label>
                            <div class="col-sm-9">
                                <textarea id="description_en" class="form-control" rows="4" name="description_en">{{$res->description_en}}</textarea>
                            </div>
                        </div>
                        <!-- Açıklama (AR) -->
                        <div class="row mb-4">
                            <label for="description_ar" class="col-sm-3 col-form-label">Açıklama (AR)</label>
                            <div class="col-sm-9">
                                <textarea id="description_ar" class="form-control" rows="4" name="description_ar">{{$res->description_ar}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="avatar">Foto</label>
                            <div class="media">
                                <div class="me-3">
                                    <img src="{{url($res->img==NULL?"":$res->img)}}" alt=""
                                         style="display:block;" width="50%" height="50%">
                                </div>
                            </div>
                            <div class="input-group">
                                <input type="file" class="form-control" id="img" name="img" >

                            </div>
                        </div>
                        <!-- Aktif/Pasif -->
                        <div class="row mb-4">
                            <label for="is_active" class="col-sm-3 col-form-label">Aktif/Pasif</label>
                            <div class="col-sm-9">
                                <input type="checkbox" id="is_active" name="is_active" {{$res->is_active == 1 ? 'checked' : ''}}>
                            </div>
                        </div>
                        <!-- Öncelik -->
                        <div class="row mb-4">
                            <label for="priority" class="col-sm-3 col-form-label">Öncelik</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" id="priority" name="priority" value="{{$res->priority}}">
                            </div>
                        </div>
                        <!-- Güncelle Butonu -->
                        <div class="row mb-4">
                            <div class="row justify-content-end">
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary w-md">Güncelle</button>
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
