@extends('admin.layouts.master')

@section('title') Şubeler @endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

    @component('admin.components.breadcrumb')
        @slot('li_1') Admin Panel @endslot
        @slot('title') Şubeler Sayfası @endslot
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
    <form method="POST" class="form-horizontal" action="/add-branch" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <h4 class="card-title">Yeni Şube Ekle</h4>

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-4">
                            <label for="img" class="col-sm-3 col-form-label">Şube Görseli</label>
                            <div class="col-sm-9">

                                <div class="input-group">
                                    <input type="file" class="form-control @error('img') is-invalid @enderror" id="img" name="img">
                                    @error('img')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="name" class="col-sm-3 col-form-label">Şube İsmi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="phone" class="col-sm-3 col-form-label">Telefon</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="address" class="col-sm-3 col-form-label">Adres</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address">
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-4">
                            <label for="weekday_opening_time" class="col-sm-3 col-form-label">Hafta içi Açık Saatler</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('weekday_opening_time') is-invalid @enderror" id="weekday_opening_time" name="weekday_opening_time">
                                @error('weekday_opening_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="weekend_opening_time" class="col-sm-3 col-form-label">Hafta sonu Açık Saatler</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('weekend_opening_time') is-invalid @enderror" id="weekend_opening_time" name="weekend_opening_time">
                                @error('weekend_opening_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label for="map" class="col-sm-3 col-form-label">Google Map Linki</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('map') is-invalid @enderror" id="map" name="map">
                                @error('map')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="content_tr" class="col-md-3 col-form-label">İçerik (TR)</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="elm1" name="content_tr">{{ old('content_tr') }}</textarea>
                            </div>
                            @error('content_tr')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4 row">
                            <label for="content_en" class="col-md-3 col-form-label">Content (EN)</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="elm2" name="content_en">{{ old('content_en') }}</textarea>
                            </div>
                            @error('content_en')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4 row">
                            <label for="content_ar" class="col-md-3 col-form-label">المحتوى (AR)</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="elm3" name="content_ar">{{ old('content_ar') }}</textarea>
                            </div>
                            @error('content_ar')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Diğer kalan alanlar -->
                        <div class="row mb-4">
                            <label for="priority" class="col-sm-3 col-form-label">Öncelik</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control @error('priority') is-invalid @enderror" id="priority" name="priority">
                                @error('priority')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="is_active" class="col-sm-3 col-form-label">Aktif Mi?</label>
                            <div class="col-sm-9">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" checked>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="row justify-content-end">
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary w-md">Ekle</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Şubeler</h4>
                    <div class="table-responsive">
                        <table id="today_table" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Resim</th>
                                <th>Şube Adı</th>
                                <th>Telefon</th>
                                <th>Adres</th>
                                <th>Haftaiçi</th>
                                <th>Haftasonu</th>
                                <th>İçerik (TR)</th>
                                <th>İçerik (EN)</th>
                                <th>İçerik (AR)</th>

                                <th>Öncelik</th>
                                <th>Aktif Mi?</th>
                                <th>Düzenle/Sil</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($branches)==0)
                                <td colspan="9">Kayıt bulunamadı</td>
                            @else
                                @foreach($branches as $key=>$branch)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>
                                                <div class="media">
                                                    <div class="me-3">
                                                        <img src="{{url($branch->img ?? '')}}" alt="" style="display:block;" width="300px" height="170px">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$branch->name}}</td>
                                            <td>{{$branch->phone}}</td>
                                            <td>{{$branch->address}}</td>
                                            <td>{{$branch->weekday_opening_time}}</td>
                                            <td>{{$branch->weekend_opening_time}}</td>
                                            <td>{!! mb_substr(strip_tags(htmlspecialchars_decode($branch->content_tr)), 0,150) !!}...</td>
                                            <td>{!! mb_substr(strip_tags(htmlspecialchars_decode($branch->content_en)), 0,150) !!}...</td>
                                            <td>{!! mb_substr(strip_tags(htmlspecialchars_decode($branch->content_ar)), 0,150) !!}...</td>

                                            <td>{{$branch->priority}}</td>
                                            <td>{{$branch->is_active==1?"Aktif":"Pasif"}}</td>
                                            <td>
                                                <ul class="list-inline font-size-20 contact-links mb-0">
                                                    <li class="list-inline-item px-1">
                                                        <a href="{{route('branch.edit',$branch->id)}}" title="edit" class="btn btn-xs btn-warning"><i class="bx bxs-edit text-white"></i></a>
                                                    </li>

                                                    <li class="list-inline-item px-1">
                                                        <form method="POST" action="{{ route('branch.delete',$branch->id) }}">
                                                            @csrf

                                                                <input name="_method" type="hidden" value="DELETE">


                                                            <button type="submit" class="btn btn-xs btn-danger  show_confirm" data-toggle="tooltip" title='Delete'><i class="bx bxs-trash"></i></button>
                                                        </form>
                                                    </li>

                                                </ul>
                                            </td>
                                        </tr>

                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center"></div>
    </div>




@endsection
    @section('script')
        <!-- Required datatable js -->
            <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
            <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
            <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ URL::asset('/assets/libs/tinymce/tinymce.min.js') }}"></script>

        <!-- init js -->
        <script src="{{ URL::asset('/assets/js/pages/form-editor.init.js') }}"></script>

        <!-- Datatable init js -->
            <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
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
            <script type="text/javascript">

                $('.show_confirm').click(function(event) {
                    var form =  $(this).closest("form");
                    var name = $(this).data("name");
                    event.preventDefault();
                    swal({
                        title: 'Bu kaydı silmek istediğinizden emin misiniz?',
                        text: "Eğer silerseniz geri dönülemez.",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                        .then((willDelete) => {
                            if (willDelete) {
                                form.submit();
                            }
                        });
                });

            </script>

@endsection
