@extends('admin.layouts.master')

@section('title') MENU @endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
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
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <form method="POST" class="form-horizontal" action="/add-menu" enctype="multipart/form-data">
                    @csrf
                <div class="card-body">
                    <h4 class="card-title mb-4">Menü Ekle</h4>

                    <div class="mb-4 row">
                        <label for="category_id" class="col-md-3 col-form-label">Kategori Seç</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="category_id" name="category_id">
                                <option value="" {{ old('category_id') == "" ? 'selected' : '' }}>Seçiniz...</option>
                                @foreach($kategori_all as $kategori)

                                        <option value="{{ $kategori->id }}" {{ old('category_id') == $kategori->id ? 'selected' : '' }}>{{ $kategori->name_tr }}</option>

                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <!-- Price -->
                    <div class="mb-4 row">
                        <label for="price" class="col-md-3 col-form-label">Fiyat</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" id="price" name="price" value="{{ old('price') }}">
                            @error('price')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                            <!-- Name TR -->
                            <div class="mb-4 row">
                                <label for="name_tr" class="col-md-3 col-form-label">Menü Adı (TR)</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" id="name_tr" name="name_tr" value="{{ old('name_ar') }}">
                                    @error('name_tr')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Name EN -->
                            <div class="mb-4 row">
                                <label for="name_en" class="col-md-3 col-form-label">Menü Adı (EN)</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" id="name_en" name="name_en" value="{{ old('name_en') }}">
                                    @error('name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Name AR -->
                            <div class="mb-4 row">
                                <label for="name_ar" class="col-md-3 col-form-label">Menü Adı (AR)</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="text" id="name_ar" name="name_ar" value="{{ old('name_ar') }}">
                                    @error('name_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>


                            <!-- Description TR -->
                            <div class="row mb-4">
                                <label for="description_tr" class="col-sm-3 col-form-label">Açıklama (TR)</label>
                                <div class="col-sm-9">
                                    <textarea id="description_tr" class="form-control" rows="4" name="description_tr">{{ old('description_tr') }}</textarea>
                                    @error('description_tr')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Description EN -->
                            <div class="row mb-4">
                                <label for="description_en" class="col-sm-3 col-form-label">Açıklama (EN)</label>
                                <div class="col-sm-9">
                                    <textarea id="description_en" class="form-control" rows="4" name="description_en">{{ old('description_en') }}</textarea>
                                    @error('description_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Description AR -->
                            <div class="row mb-4">
                                <label for="description_ar" class="col-sm-3 col-form-label">Açıklama (AR)</label>
                                <div class="col-sm-9">
                                    <textarea id="description_ar" class="form-control" rows="4" name="description_ar">{{ old('description_ar') }}</textarea>
                                    @error('description_ar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Image Upload -->
                            <div class="row mb-4">
                                <label for="img" class="col-sm-3 col-form-label">Menü Resmi</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="img" name="img">
                                    @error('img')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                    <div class="mb-4 row">
                        <label for="priority" class="col-md-3 col-form-label">Öncelik</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="number"
                                   id="priority" name="priority" >
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label for="is_active" class="col-sm-3 col-form-label">Aktif Mi?</label>
                        <div class="col-sm-9">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" checked>
                        </div>
                    </div>


                    <!-- Submit Button -->
                            <div class="row mb-4">
                                <div class="row justify-content-end">
                                    <div class="col-sm-9">
                                        <div>
                                            <button type="submit" class="btn btn-primary w-md">EKLE</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                </div>
                </form>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Menü Kategori Ekle</h4>
                    <form method="POST" class="form-horizontal" action="/add-foodtype" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4 row">
                            <label for="name_tr" class="col-md-3 col-form-label">Kategori Adı(TR)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text"
                                       id="name_tr" name="name_tr" required>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="name_en" class="col-md-3 col-form-label">Kategori Adı(en)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text"
                                       id="name_en" name="name_en" required>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="name_ar" class="col-md-3 col-form-label">Kategori Adı(ar)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text"
                                       id="name_ar" name="name_ar" required>
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="description_tr" class="col-md-3 col-form-label">Açıklama (TR)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text"
                                       id="description_tr" name="description_tr" required>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="description_en" class="col-md-3 col-form-label">Açıklama (en)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text"
                                       id="description_en" name="description_en" required>
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="description_ar" class="col-md-3 col-form-label">Açıklama (ar)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text"
                                       id="description_ar" name="description_ar" required>
                            </div>
                        </div>


                        <div class="mb-4 row">
                            <label for="priority" class="col-md-3 col-form-label">Öncelik</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="number"
                                       id="priority" name="priority" required>
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


                                    <div>
                                        <button type="submit" class="btn btn-primary w-md">EKLE</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>




    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Kategoriler</h4>
                    <div class="table-responsive">

                        <table id="today_table" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Adı(TR)</th>
                                <th>Adı(EN)</th>
                                <th>Adı(AR)</th>
                                <th>Açıklama(TR)</th>
                                <th>Açıklama(EN)</th>
                                <th>Açıklama(AR)</th>
                                <th>Aktif/Pasif</th>
                                <th>Öncelik</th>
                                <th>Edit/Delete</th>
                            </tr>
                            </thead>


                            <tbody>
                            @if($kategori_all->count()==0)
                                <td colspan="8">Kayıt bulunamadı.</td>
                            @else

                                @foreach($kategori_all as $key=>$kategori)
                                    @if($kategori->name_en!="All")
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$kategori->name_tr}}</td>
                                            <td>{{$kategori->name_en}}</td>
                                            <td>{{$kategori->name_ar}}</td>
                                            <td>{{$kategori->description_tr}}</td>
                                            <td>{{$kategori->description_en}}</td>
                                            <td>{{$kategori->description_ar}}</td>
                                            <td>{{$kategori->is_active==1?"Aktif":"Pasif"}}</td>
                                            <td>{{$kategori->priority}}</td>

                                            <td>
                                                <ul class="list-inline font-size-20 contact-links mb-0">

                                                    <li class="list-inline-item px-1">
                                                        <a href="{{route('foodtype.edit',$kategori->id)}}" title="edit"><i class="bx bxs-edit"></i></a>
                                                    </li>


                                                    <li class="list-inline-item px-1">

                                                        <form method="POST" action="{{ route('foodtype.delete',$kategori->id ) }}">
                                                            @csrf

                                                            <input name="_method" type="hidden" value="DELETE">


                                                            <button type="submit" class="btn btn-xs btn-danger  show_confirm_category" data-toggle="tooltip" title='Delete'><i class="bx bxs-trash"></i></button>
                                                        </form>
                                                    </li>

                                                </ul>
                                            </td>
                                        </tr>
                                    @endif

                                @endforeach

                            @endif

                            </tbody>

                        </table>




                    </div>
                </div>

            </div>



        </div>

    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">MENÜ</h4>

                    <form method="POST" class="form-horizontal" onsubmit="return submitForm()" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">

                                <div class="mb-4 row">
                                    <label for="time" class="col-md-3 col-form-label">Kategori</label>
                                    @if($data==0)
                                        <td colspan="8">No records found</td>
                                    @else

                                        <div class="col-sm-9">
                                            <select id="select-action" class="form-select" name="action">
                                                <option value="{{$kategori1->id}}" selected>{{$kategori1->name_tr}}</option>
                                                @foreach($kategori_all as $kategori)
                                                    @if($kategori->id !=$kategori1->id)
                                                        <option value="{{$kategori->id}}">{{$kategori->name_tr}}</option>
                                                    @endif
                                                @endforeach
                                            </select>

                                        </div>
                                </div>

                                @if($menu_all->count()!=0)

                                    <div class="row justify-content-end">
                                        <div class="col-sm-9">


                                            <div>
                                                <button type="submit" class="btn btn-primary w-md">GETİR</button>
                                            </div>
                                        </div>
                                    </div>
                            @endif



                            <!-- end card -->
                            </div>
                            <!-- end col -->


                        </div>
                </div>
                </form>

                <div class="table-responsive">

                    <table id="today_table" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Görsel</th>
                            <th>Fiyat</th>
                            <th>Adı(TR)</th>
                            <th>Adı(EN)</th>
                            <th>Adı(AR)</th>
                            <th>Açıklama(TR)</th>
                            <th>Açıklama(EN)</th>
                            <th>Açıklama(AR)</th>
                            <th>Aktif/Pasif</th>
                            <th>Öncelik</th>
                            <th>Güncelle/Sil</th>
                        </tr>
                        </thead>


                        <tbody id="menu-tbody">
                        @if($menu_all->count()==0)
                            <td colspan="8">No records found</td>
                        @else

                            @foreach($menu_all as $key=>$menu)
                                <tr>
                                    <input type="hidden" name="menu-id" value="{{ $menu->id }}">
                                    <td>{{$key+1}}</td>
                                    <td>
                                        <div class="media">
                                            <div class="me-3">
                                                <img src="{{url($menu->img ?? '')}}" alt="" style="display:block;" width="200px" height="200px">
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{$menu->price}}</td>
                                    <td>{{$menu->name_tr}}</td>
                                    <td>{{$menu->name_en}}</td>
                                    <td>{{$menu->name_ar}}</td>
                                    <td>{{$menu->description_tr}}</td>
                                    <td>{{$menu->description_en}}</td>
                                    <td>{{$menu->description_ar}}</td>
                                    <td>{{$menu->is_active==1?"Active":"Inactive"}}</td>
                                    <td>{{$menu->priority}}</td>



                                    <td>
                                        <ul class="list-inline font-size-20 contact-links mb-0">

                                            <li class="list-inline-item px-1">
                                                <a href="{{route('menu.edit',$menu->id)}}" title="edit"><i class="bx bxs-edit"></i></a>
                                            </li>
                                            <li class="list-inline-item px-1">
                                                <a href="{{route('menu.delete',$menu->id)}}" title="delete"><i class="bx bxs-trash"></i></a>
                                            </li>

                                        </ul>
                                    </td>
                                </tr>
                            @endforeach

                        @endif

                        </tbody>

                    </table>
                    {{$menu_all->links("pagination::bootstrap-4")}}


                    @endif

                </div></div>



        </div>

    </div>
    <div class="d-flex justify-content-center"></div>



@endsection
@section('script')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
    <script language="javascript" type="text/javascript">
        function limitText(limitField, limitNum) {
            if (limitField.value.length > limitNum) {
                limitField.value = limitField.value.substring(0, limitNum);
            }
        }


    </script>
    <script>
        $(document).ready(function(){
            $('.alert-success').fadeIn().delay(6000).fadeOut('slow');
            $('.alert-danger').fadeIn().delay(6000).fadeOut('slow');
        });
    </script>
    <script type="text/javascript">

        function submitForm() {

            var selectedOption = $('#select-action').val();
            var url = "/admin-menu/"+selectedOption;

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
                title: 'Are you sure you want to delete the record?',
                text: "If you delete, it will be gone forever.",
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
    <script>
        $(document).ready(function() {
            var tbody = document.getElementById("menu-tbody");
            var sortable = Sortable.create(tbody, {
                onEnd: function (evt) {
                    var newPriority = [];
                    $("#menu-tbody tr").each(function(index, element) {
                        var id = $(element).find("input[name='menu-id']").val();
                        newPriority.push({ id: id, priority: index + 1 });
                    });

                    // Burada AJAX isteğini kullanarak sunucuya yeni öncelikleri gönderebilirsiniz.
                    $.ajaxSetup({
                        headers:
                            {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
                    });
                    $.ajax({
                        type: "POST",
                        url: "{{ route('menu-update-priority') }}",
                        data: { newPriority: newPriority },
                        success: function (response) {
                            console.log(response);
                        }
                    });
                },
            });
        });
    </script>
    <script type="text/javascript">

        $('.show_confirm_category').click(function(event) {
            var form = $(this).closest("form");
            event.preventDefault();
            swal({
                title: 'Lütfen DİKKAT bu kategoriyi silerseniz',
                text: "kategoriye ait tüm menülerde silinecektir.",
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
