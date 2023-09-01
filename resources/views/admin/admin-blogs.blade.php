@extends('admin.layouts.master')

@section('title') BLOG ADMIN PANEL @endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
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
    <div class="row">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Yeni Blog Ekle</h4>
                    <form class="form-horizontal" method="post" action="/add-blog" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4 row">
                            <label for="category" class="col-md-3 col-form-label">Kategori</label>
                            <div class="col-sm-9">
                                <select id="category" class="form-select" name="category" >
                                    <option value="0" {{ old('category') == 0 ? 'selected' : '' }}>Kategori Seç</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}" {{ old('category') == $category->id ? 'selected' : '' }}>{{$category->name_tr}}</option>
                                    @endforeach
                                </select>

                                @error('category')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="title_tr" class="col-md-3 col-form-label">Başlık (TR)</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title_tr" name="title_tr" value="{{ old('title_tr') }}" >
                            </div>
                            @error('title_tr')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4 row">
                            <label for="title_en" class="col-md-3 col-form-label">Başlık (EN)</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title_en" name="title_en" value="{{ old('title_en') }}">
                            </div>
                            @error('title_en')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4 row">
                            <label for="title_ar" class="col-md-3 col-form-label">Başlık (AR)</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="title_ar" name="title_ar" value="{{ old('title_ar') }}">
                            </div>
                            @error('title_ar')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4 row">
                            <label for="content_tr" class="col-md-3 col-form-label">İçerik (TR)</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="content_tr" name="content_tr" >{{ old('title_tr') }}</textarea>
                            </div>
                            @error('content_tr')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4 row">
                            <label for="content_en" class="col-md-3 col-form-label">İçerik (EN)</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="content_en" name="content_en" >{{ old('title_en') }}</textarea>
                            </div>
                            @error('content_en')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4 row">
                            <label for="content_ar" class="col-md-3 col-form-label">İçerik (AR)</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="content_ar" name="content_ar" >{{ old('title_ar') }}</textarea>
                            </div>
                            @error('content_ar')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="row mb-4">
                            <label for="img" class="col-sm-3 col-form-label">Blog Resmi</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="img" name="img">
                                @error('img')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="seo_title_tr" class="col-md-3 col-form-label">SEO Başlık (TR)</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="seo_title_tr" name="seo_title_tr">
                            </div>
                            @error('seo_title_tr')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4 row">
                            <label for="seo_title_en" class="col-md-3 col-form-label">SEO Başlık (EN)</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="seo_title_en" name="seo_title_en">
                            </div>
                            @error('seo_title_en')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4 row">
                            <label for="seo_title_ar" class="col-md-3 col-form-label">SEO Başlık (AR)</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="seo_title_ar" name="seo_title_ar">
                            </div>
                            @error('seo_title_ar')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- SEO İçerik (TR) -->
                        <div class="mb-4 row">
                            <label for="seo_description_tr" class="col-md-3 col-form-label">SEO Açıklama (TR)</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="seo_description_tr" name="seo_description_tr"></textarea>
                                @error('seo_description_tr')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- SEO İçerik (EN) -->
                        <div class="mb-4 row">
                            <label for="seo_description_en" class="col-md-3 col-form-label">SEO Açıklama (EN)</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="seo_description_en" name="seo_description_en"></textarea>
                                @error('seo_description_en')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-4 row">
                            <label for="seo_description_ar" class="col-md-3 col-form-label">SEO Açıklama (AR)</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="seo_description_ar" name="seo_description_ar"></textarea>
                                @error('seo_description_ar')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>



                        <p class="mb-4">Seo ile ilgili anahtar kelimeleri girerken kelimeler arasına virgül koyunuz.</p>

                        <div class="mb-4 row">
                            <label for="seo_keywords_tr" class="col-md-3 col-form-label">SEO Anahtar Kelimeler (TR)</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="seo_keywords_tr" name="seo_keywords_tr" value="{{ old('seo_keywords_tr') }}">
                            </div>
                            @error('seo_keywords_tr')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4 row">
                            <label for="seo_keywords_en" class="col-md-3 col-form-label">SEO Anahtar Kelimeler (EN)</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="seo_keywords_en" name="seo_keywords_en" value="{{ old('seo_keywords_en') }}">
                            </div>
                            @error('seo_keywords_en')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4 row">
                            <label for="seo_keywords_ar" class="col-md-3 col-form-label">SEO Anahtar Kelimeler (AR)</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="seo_keywords_ar" name="seo_keywords_ar" value="{{ old('seo_keywords_ar') }}">
                            </div>
                            @error('seo_keywords_ar')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <p class="mb-4">Burada Arapça başlığı temel alarak Latin harflerle kelimeler oluşturup her kelime arasına - işareti konulmalıdır.Örneğin dyaf-alnby-abrahym-oafabl gibi</p>

                        <div class="mb-4 row">
                            <label for="slug_ar" class="col-md-3 col-form-label">Link (AR)</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="slug_ar" name="slug_ar"  value="{{ old('slug_ar') }}">
                            </div>
                            @error('slug_ar')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Kaydet</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Yeni Kategori Ekle</h4>
                    <form method="POST" class="form-horizontal" action="/add-blog-category" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4 row">
                            <label for="name_tr" class="col-md-3 col-form-label">Kategori Adı (TR)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text"
                                       id="name_tr" name="name_tr">
                            </div>
                            @error('name_tr')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4 row">
                            <label for="name_en" class="col-md-3 col-form-label">Kategori Adı (EN)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text"
                                       id="name_en" name="name_en">
                            </div>
                            @error('name_en')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4 row">
                            <label for="name_ar" class="col-md-3 col-form-label">Kategori Adı (AR)</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="text"
                                       id="name_ar" name="name_ar">
                            </div>
                            @error('name_ar')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4 row">
                            <label for="priority" class="col-md-3 col-form-label">Öncelik</label>
                            <div class="col-sm-9">
                                <input class="form-control" type="number"
                                       id="priority" name="priority">
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
                                <th>Aktif/Pasif</th>
                                <th>Öncelik</th>
                                <th>Edit/Delete</th>
                            </tr>
                            </thead>


                            <tbody>
                            @if($categories->count()==0)
                                <td colspan="8">Kayıt bulunamadı.</td>
                            @else

                                @foreach($categories as $key=>$kategori)

                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$kategori->name_tr}}</td>
                                            <td>{{$kategori->name_en}}</td>
                                            <td>{{$kategori->name_ar}}</td>
                                            <td>{{$kategori->is_active==1?"Aktif":"Pasif"}}</td>
                                            <td>{{$kategori->priority}}</td>

                                            <td>
                                                <ul class="list-inline font-size-20 contact-links mb-0">

                                                    <li class="list-inline-item px-1">
                                                        <a href="{{route('blogcategory.edit',$kategori->id)}}" title="edit"><i class="bx bxs-edit"></i></a>
                                                    </li>


                                                    <li class="list-inline-item px-1">

                                                        <form method="POST" action="{{ route('blogcategory.delete',$kategori->id ) }}">
                                                            @csrf

                                                            <input name="_method" type="hidden" value="DELETE">


                                                            <button type="submit" class="btn btn-xs btn-danger  show_confirm_category" data-toggle="tooltip" title='Delete'><i class="bx bxs-trash"></i></button>
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

    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">BLOG</h4>

                    <form method="POST" class="form-horizontal" onsubmit="return submitForm()" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">

                                <div class="mb-4 row">
                                    <label for="time" class="col-md-3 col-form-label">Kategori</label>
                                    @if($blogs->count() == 0)
                                        <td colspan="8">No records found</td>
                                    @else
                                        <div class="col-sm-9">
                                            <select id="select-action" class="form-select" name="action">
                                                @foreach($categories as $kategori)
                                                    <option value="{{$kategori->id}}" {{ $kategori->id == $selectedCategory->id ? 'selected' : '' }}>
                                                        {{$kategori->name_tr}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                </div>

                                @if($blogs->count() != 0)
                                    <div class="row justify-content-end">
                                        <div class="col-sm-9">
                                            <div>
                                                <button type="submit" class="btn btn-primary w-md">GETİR</button>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @endif
                            </div>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table id="today_table" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Görsel</th>
                                <th>Başlık (TR)</th>
                                <th>Başlık (EN)</th>
                                <th>Başlık (AR)</th>
                                <th>İçerik (TR)</th>
                                <th>İçerik (EN)</th>
                                <th>İçerik (AR)</th>
                                <th>Aktif/Pasif</th>
                                <th>Öncelik</th>
                                <th>Güncelle/Sil</th>
                            </tr>
                            </thead>

                            <tbody id="menu-tbody">
                            @if($blogs->count() == 0)
                                <td colspan="8">Kayıt bulunamadı</td>
                            @else
                                @foreach($blogs as $key => $blog)
                                    <tr>
                                        <input type="hidden" name="menu-id" value="{{ $blog->id }}">
                                        <td>{{$key+1}}</td>
                                        <td>
                                            <div class="media">
                                                <div class="me-3">
                                                    <img src="{{url($blog->img ?? '')}}" alt="" style="display:block;" width="200px" height="200px">
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{$blog->title_tr}}</td>
                                        <td>{{$blog->title_en}}</td>
                                        <td>{{$blog->title_ar}}</td>
                                        <td>{{$blog->content_tr}}</td>
                                        <td>{{$blog->content_en}}</td>
                                        <td>{{$blog->content_ar}}</td>
                                        <td>{{$blog->is_active == 1 ? "Aktif" : "Pasif"}}</td>
                                        <td>{{$blog->priority}}</td>

                                        <td>
                                            <ul class="list-inline font-size-20 contact-links mb-0">
                                                <li class="list-inline-item px-1">
                                                    <a href="{{route('blog.edit', $blog->id)}}" title="edit"><i class="bx bxs-edit"></i></a>
                                                </li>
                                                <li class="list-inline-item px-1">
                                                    <a href="{{route('blog.delete', $blog->id)}}" title="delete"><i class="bx bxs-trash"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                        {{$blogs->links("pagination::bootstrap-4")}}
                    </div>
                </div>
            </div>
        </div>
    </div>



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
            var url = "/admin-blog/"+selectedOption;

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
                text: "kategoriye ait tüm blog yazıları silinecektir.",
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
