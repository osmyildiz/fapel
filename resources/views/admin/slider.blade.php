@extends('admin.layouts.master')

@section('title') Slider @endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

    @component('admin.components.breadcrumb')
        @slot('li_1') Admin Panel @endslot
        @slot('title') Anasayfa Slider Sayfası @endslot
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
    <form method="POST" class="form-horizontal" action="/add-slider" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <h4 class="card-title">Yeni Slider Ekle</h4>
            <p class="alert alert-warning">Not: Slider ekleme sadece ana sayfa için yapılabilir. Diğerlerini aşağıdan düzenleyebilirsiniz.</p>

            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-4">
                            <label for="img" class="col-sm-3 col-form-label">Resim</label>
                            <div class="col-sm-9">
                                <span class="alert-info" role="alert">Resim boyutu 1400x630 olmalıdır.</span>
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
                            <label for="first_title_tr" class="col-sm-3 col-form-label">Birinci Başlık (TR)</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('first_title_tr') is-invalid @enderror" id="first_title_tr" name="first_title_tr">
                                @error('first_title_tr')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="first_title_en" class="col-sm-3 col-form-label">Birinci Başlık (EN)</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('first_title_en') is-invalid @enderror" id="first_title_en" name="first_title_en">
                                @error('first_title_en')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="first_title_ar" class="col-sm-3 col-form-label">Birinci Başlık (AR)</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('first_title_ar') is-invalid @enderror" id="first_title_ar" name="first_title_ar">
                                @error('first_title_ar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- İkinci başlık için alanlar -->
                        <div class="row mb-4">
                            <label for="second_title_tr" class="col-sm-3 col-form-label">İkinci Başlık (TR)</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('second_title_tr') is-invalid @enderror" id="second_title_tr" name="second_title_tr">
                                @error('second_title_tr')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="second_title_en" class="col-sm-3 col-form-label">İkinci Başlık (EN)</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('second_title_en') is-invalid @enderror" id="second_title_en" name="second_title_en">
                                @error('second_title_en')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <label for="second_title_ar" class="col-sm-3 col-form-label">İkinci Başlık (AR)</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('second_title_ar') is-invalid @enderror" id="second_title_ar" name="second_title_ar">
                                @error('second_title_ar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
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
                    <h4 class="card-title">Sliders</h4>
                    <div class="table-responsive">
                        <table id="today_table" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Resim</th>
                                <th>Sayfa Adı</th>
                                <th>İlk Başlık (TR)</th>
                                <th>İlk Başlık (EN)</th>
                                <th>İkinci Başlık (TR)</th>
                                <th>İkinci Başlık (EN)</th>
                                <th>Öncelik</th>
                                <th>Aktif Mi?</th>
                                <th>Düzenle/Sil</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($sliders)==0)
                                <td colspan="9">Kayıt bulunamadı</td>
                            @else
                                @foreach($sliders as $key=>$slider)
                                    @if($slider->is_video==0)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>
                                                <div class="media">
                                                    <div class="me-3">
                                                        <img src="{{url($slider->img ?? '')}}" alt="" style="display:block;" width="300px" height="170px">
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$slider->page_name}}</td>
                                            <td>{{$slider->first_title_tr}}</td>
                                            <td>{{$slider->first_title_en}}</td>
                                            <td>{{$slider->second_title_tr}}</td>
                                            <td>{{$slider->second_title_en}}</td>
                                            <td>{{$slider->priority}}</td>
                                            <td>{{$slider->is_active==1?"Aktif":"Pasif"}}</td>
                                            <td>
                                                <ul class="list-inline font-size-20 contact-links mb-0">
                                                    <li class="list-inline-item px-1">
                                                        <a href="{{route('slider.edit',$slider->id)}}" title="edit" class="btn btn-xs btn-warning"><i class="bx bxs-edit text-white"></i></a>
                                                    </li>
                                                    @if($slider->page_name=="home")
                                                    <li class="list-inline-item px-1">
                                                        <form method="POST" action="{{ route('slider.delete',$slider->id) }}">
                                                            @csrf

                                                                <input name="_method" type="hidden" value="DELETE">


                                                            <button type="submit" class="btn btn-xs btn-danger  show_confirm" data-toggle="tooltip" title='Delete'><i class="bx bxs-trash"></i></button>
                                                        </form>
                                                    </li>
                                                    @endif
                                                </ul>
                                            </td>
                                        </tr>
                                    @else
                                        <!-- Video için olan kısmı kaldırmadım, eğer ihtiyaç olmazsa bu kısmı silebilirsiniz -->
                                        ...
                                    @endif
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
                        title: 'Bu slide silmek istediğinizden emin misiniz?',
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
