@extends('admin.layouts.master')

@section('title') Hakkımızda @endsection

@section('css')
    <link href="{{ asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

    @component('admin.components.breadcrumb')
        @slot('li_1') Admin Panel @endslot
        @slot('title') Hakkımızda @endslot
    @endcomponent

    <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has($msg))
                <div class="alert alert-{{ $msg }} alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-check-all me-2"></i>
                    {{ Session::get($msg) }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Kapat"></button>
                </div>
            @endif
        @endforeach
    </div>

    <div class="card">
        <form method="POST" class="form-horizontal" action="/about-update" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <h4 class="card-title mb-4">Güncelle</h4>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">


                                <!-- Content Section -->
                                @foreach(['tr', 'en', 'ar'] as $lang)
                                    <div class="row mb-4">
                                        <label for="content_{{$lang}}" class="col-sm-3 col-form-label">İçerik ({{ strtoupper($lang) }})</label>
                                        <div class="col-sm-9">
                                            <textarea id="content_{{$lang}}" class="form-control" rows="5" name="content_{{$lang}}">{{ $record["content_".$lang] }}</textarea>
                                            <span class="error" style="color:red" role="alert">
                                            <strong>{!! $errors->first('content_'.$lang) !!}</strong>
                                        </span>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <label for="short_content_{{$lang}}" class="col-sm-3 col-form-label">Kısa İçerik ({{ strtoupper($lang) }})</label>
                                        <div class="col-sm-9">
                                            <textarea id="short_content_{{$lang}}" class="form-control" rows="5" name="short_content_{{$lang}}">{{ $record["short_content_".$lang] }}</textarea>
                                            <span class="error" style="color:red" role="alert">
                                            <strong>{!! $errors->first('short_content_'.$lang) !!}</strong>
                                        </span>
                                        </div>
                                    </div>
                                @endforeach

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
