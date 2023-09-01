@extends('admin.layouts.master')

@section('title') BLOG @endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

    @component('admin.components.breadcrumb')
        @slot('li_1') Admin Panel @endslot
        @slot('title') BLOG @endslot
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
        <form method="POST" class="form-horizontal" action="/update-blog/{{$res->id}}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <h4 class="card-title mb-4">BLOG GÜNCELLE</h4>
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
                        <!-- Türkçe başlık -->
                        <div class="mb-4 row">
                            <label for="title_tr" class="col-md-3 col-form-label">Başlık (TR)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" value="{{$res->title_tr}}" id="title_tr" name="title_tr">
                            </div>
                        </div>
                        <!-- İngilizce başlık -->
                        <div class="mb-4 row">
                            <label for="title_en" class="col-md-3 col-form-label">Başlık (EN)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" value="{{$res->title_en}}" id="title_en" name="title_en">
                            </div>
                        </div>
                        <!-- Arapça başlık -->
                        <div class="mb-4 row">
                            <label for="title_ar" class="col-md-3 col-form-label">Başlık (AR)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" value="{{$res->title_ar}}" id="title_ar" name="title_ar">
                            </div>
                        </div>
                        <!-- Türkçe içerik -->
                        <div class="row mb-4">
                            <label for="content_tr" class="col-sm-3 col-form-label">İçerik (TR)</label>
                            <div class="col-sm-9">
                                <textarea id="content_tr" class="form-control" rows="4" name="content_tr">{{$res->content_tr}}</textarea>
                            </div>
                        </div>
                        <!-- İngilizce içerik -->
                        <div class="row mb-4">
                            <label for="content_en" class="col-sm-3 col-form-label">İçerik (EN)</label>
                            <div class="col-sm-9">
                                <textarea id="content_en" class="form-control" rows="4" name="content_en">{{$res->content_en}}</textarea>
                            </div>
                        </div>
                        <!-- Arapça içerik -->
                        <div class="row mb-4">
                            <label for="content_ar" class="col-sm-3 col-form-label">İçerik (AR)</label>
                            <div class="col-sm-9">
                                <textarea id="content_ar" class="form-control" rows="4" name="content_ar">{{$res->content_ar}}</textarea>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="title_ar" class="col-md-3 col-form-label">Arapça URL</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" value="{{$res->slug_ar}}" id="title_ar" name="title_ar">
                            </div>
                        </div>
                        <!-- Türkçe SEO Başlık -->
                        <div class="mb-4 row">
                            <label for="seo_title_tr" class="col-md-3 col-form-label">SEO Başlık (TR)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" value="{{$res->seo_title_tr}}" id="seo_title_tr" name="seo_title_tr">
                            </div>
                        </div>
                        <!-- İngilizce SEO Başlık -->
                        <div class="mb-4 row">
                            <label for="seo_title_en" class="col-md-3 col-form-label">SEO Başlık (EN)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" value="{{$res->seo_title_en}}" id="seo_title_en" name="seo_title_en">
                            </div>
                        </div>
                        <!-- Arapça SEO Başlık -->
                        <div class="mb-4 row">
                            <label for="seo_title_ar" class="col-md-3 col-form-label">SEO Başlık (AR)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" value="{{$res->seo_title_ar}}" id="seo_title_ar" name="seo_title_ar">
                            </div>
                        </div>
                        <!-- Türkçe SEO Açıklama -->
                        <div class="mb-4 row">
                            <label for="seo_description_tr" class="col-md-3 col-form-label">SEO Açıklama (TR)</label>
                            <div class="col-sm-9">
                                <textarea id="seo_description_tr" class="form-control" rows="4" name="seo_description_tr">{{$res->seo_description_tr}}</textarea>
                            </div>
                        </div>
                        <!-- İngilizce SEO Açıklama -->
                        <div class="mb-4 row">
                            <label for="seo_description_en" class="col-md-3 col-form-label">SEO Açıklama (EN)</label>
                            <div class="col-sm-9">
                                <textarea id="seo_description_en" class="form-control" rows="4" name="seo_description_en">{{$res->seo_description_en}}</textarea>
                            </div>
                        </div>
                        <!-- Arapça SEO Açıklama -->
                        <div class="mb-4 row">
                            <label for="seo_description_ar" class="col-md-3 col-form-label">SEO Açıklama (AR)</label>
                            <div class="col-sm-9">
                                <textarea id="seo_description_ar" class="form-control" rows="4" name="seo_description_ar">{{$res->seo_description_ar}}</textarea>
                            </div>
                        </div>
                        <!-- Türkçe SEO Anahtar Kelimeler -->
                        <div class="mb-4 row">
                            <label for="seo_keywords_tr" class="col-md-3 col-form-label">SEO Anahtar Kelimeler (TR)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" value="{{$res->seo_keywords_tr}}" id="seo_keywords_tr" name="seo_keywords_tr">
                            </div>
                        </div>
                        <!-- İngilizce SEO Anahtar Kelimeler -->
                        <div class="mb-4 row">
                            <label for="seo_keywords_en" class="col-md-3 col-form-label">SEO Anahtar Kelimeler (EN)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" value="{{$res->seo_keywords_en}}" id="seo_keywords_en" name="seo_keywords_en">
                            </div>
                        </div>
                        <!-- Arapça SEO Anahtar Kelimeler -->
                        <div class="mb-4 row">
                            <label for="seo_keywords_ar" class="col-md-3 col-form-label">SEO Anahtar Kelimeler (AR)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text" value="{{$res->seo_keywords_ar}}" id="seo_keywords_ar" name="seo_keywords_ar">
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
