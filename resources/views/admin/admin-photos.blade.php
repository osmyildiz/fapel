@extends('admin.layouts.master')

@section('title') GALERİ ADMIN PANEL @endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

    @component('admin.components.breadcrumb')
        @slot('li_1') Admin Panel @endslot
        @slot('title') Galeri @endslot
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
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Yeni Görseller Ekle</h4>

                        <form class="form-horizontal" enctype="multipart/form-data" method="post" action="/add-photo">
                            @csrf

                            <div class="mb-4 row">
                                <label for="time" class="col-md-3 col-form-label">Category</label>

                                <div class="col-sm-9">
                                    <select id="time" class="form-select" name="category" required>
                                        <option value="0" selected>Kategori Seç</option>
                                        @foreach($categories as $category)
                                            @if($category->name_tr!="Tümü")
                                            <option value="{{$category->id}}">{{$category->name_tr}}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                </div>

                            </div>
                            <div>

                                <input required type="file" class="form-control" name="image[]" id="images" multiple="multiple" >
                            </div>
                            <p>Görsel boyutları 4MB üzeri olamaz</p>
                            <div>
                                <button type="submit" class="btn btn-primary w-md">KAYDET</button>
                            </div>

                        </form>

                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Yeni Kategori Ekle</h4>
                    <form method="POST" class="form-horizontal" action="/add-photo-category" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4 row">
                            <label for="name_tr" class="col-md-3 col-form-label">Kategori Adı (TR)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text"
                                       id="name_tr" name="name_tr" required>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="name_en" class="col-md-3 col-form-label">Kategori Adı (EN)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text"
                                       id="name_en" name="name_en" required>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="name_ar" class="col-md-3 col-form-label">Kategori Adı (AR)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text"
                                       id="name_ar" name="name_ar" required>
                            </div>
                        </div>



                        <div class="row mb-4">
                            <div class="row justify-content-end">
                                <div class="col-sm-9">
                                    <div>
                                        <button type="submit" class="btn btn-primary w-md">KAYDET</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">KATEGORİLER</h4>

                    <div class="table-responsive">

                        <table id="today_table" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name(TR)</th>
                                <th>Name(EN)</th>
                                <th>Name(AR)</th>
                                <th>Aktif/Pasif</th>
                                <th>Öncelik</th>
                                <th>Düzenle</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach($categories as $key=>$category)
                                @if($category->name_tr!="Tümü")
                                <tr>

                                    <td>{{$key+1}}</td>
                                    <td>{{$category->name_tr}}</td>
                                    <td>{{$category->name_en}}</td>
                                    <td>{{$category->name_ar}}</td>
                                    <td>{{$category->is_active==1?"Aktif":"Pasif"}}</td>
                                    <td>{{$category->priority}}</td>

                                    <td>
                                        <ul class="list-inline font-size-20 contact-links mb-0">

                                            <li class="list-inline-item px-1">
                                                <a href="{{route('photocategory.edit',$category->id)}}" title="edit"><i class="bx bxs-edit"></i></a>
                                            </li>
                                            <li class="list-inline-item px-1">

                                                <form method="POST" action="{{ route('photocategory.delete',$category->id ) }}">
                                                    @csrf

                                                    <input name="_method" type="hidden" value="DELETE">


                                                    <button type="submit" class="btn btn-xs btn-danger  show_confirm_category" data-toggle="tooltip" title='Delete'><i class="bx bxs-trash"></i></button>
                                                </form>
                                            </li>
                                        </ul>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach

                            </tbody>

                        </table>

                    </div></div>

            </div>
        </div>


    </div>


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">GÖRSELLER</h4>

                    <div class="table-responsive">

                        <table id="today_table" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Url</th>
                                <th>Foto</th>
                                <th>Aktif/Pasif</th>
                                <th>Güncelle/Sil</th>
                            </tr>
                            </thead>


                            <tbody>
                            @if($photos->count()==0)
                                <td colspan="8">Kayıt bulunamadı</td>
                            @else

                                @foreach($photos as $key=>$photo)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$photo->name_tr}}</td>
                                        <td>{{$photo->image_path}}</td>
                                        <td><img src="{{url($photo->image_path)}}" alt=""
                                                 style="display:block;" width="100" height="70"></td>
                                        <td>{{$photo->is_active==1?"Aktif":"Pasif"}}</td>



                                        <td>
                                            <ul class="list-inline font-size-20 contact-links mb-0">

                                                <li class="list-inline-item px-1">
                                                    <a href="{{route('photo.edit',$photo->id)}}" title="edit"><i class="bx bxs-edit"></i></a>
                                                </li>
                                                <li class="list-inline-item px-1">

                                                    <form method="POST" action="{{ route('photo.delete',$photo->id) }}">
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
                        {{$photos->links("pagination::bootstrap-4")}}


                    </div></div>



            </div>

        </div> <!-- end col -->

    </div> <!-- end row -->
    <div class="d-flex justify-content-center"></div>



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

        function submitForm() {

            var selectedOption = $('#select-action').val();
            var url = "/admin-photos/"+selectedOption;

            location.href=url;
            return false;
        }
    </script>
    <script type="text/javascript">

        $('.show_confirm').click(function(event) {
            var form =  $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: 'Bu görseli silmek istediğinizden emin misiniz?',
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
        $('.show_confirm_category').click(function(event) {
            var form = $(this).closest("form");
            event.preventDefault();
            swal({
                title: 'Lütfen DİKKAT bu kategoriyi silerseniz',
                text: "kategoriye ait tüm resimlerde silinecektir.",
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
