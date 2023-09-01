@extends('admin.layouts.master')

@section('title') SEO ADMIN PANEL @endsection

@section('css')
    <!-- DataTables -->
    <link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')

    @component('admin.components.breadcrumb')
        @slot('li_1') Admin Panel @endslot
        @slot('title') Seo @endslot
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
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">SEO</h4>

                    <div class="table-responsive">

                        <table id="today_table" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Sayfa Adı</th>
                                @foreach($seos as $seo)
                                    <th>{{ $seo->page_name }}</th>
                                @endforeach
                            </tr>
                            </thead>

                            <tbody>
                            @if($seos->count() == 0)
                                <tr>
                                    <td colspan="{{ 3 + count($seos) }}">Kayıt bulunamadı</td>
                                </tr>
                            @else
                                @php $no = 1 @endphp
                                @foreach(['title' => 'Başlık', 'description' => 'Açıklama', 'canonical' => 'Kanonik', 'twitter_name' => 'Twitter Adı', 'logo_url' => 'Logo URL', 'keywords' => 'Anahtar Kelimeler'] as $field => $label)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $label }}</td>
                                        @foreach($seos as $seo)
                                            <td>{{ $seo[$field . '_tr'] }} / {{ $seo[$field . '_en'] }} / {{ $seo[$field . '_ar'] }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach

                                <!-- Düzenle satırı -->
                                <tr>
                                    <td colspan="2">Düzenle</td>
                                    @foreach($seos as $seo)
                                        <td>
                                            <ul class="list-inline font-size-20 contact-links mb-0">
                                                <li class="list-inline-item px-1">
                                                    <a href="{{ route('seo.edit', $seo->id) }}" title="edit"><i class="bx bxs-edit"></i></a>
                                                </li>
                                            </ul>
                                        </td>
                                    @endforeach
                                </tr>
                            @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="d-flex justify-content-center"></div>



@endsection
@section('script')
    <!-- Required datatable js -->
    <script src="{{ URL::asset('/assets/libs/dropzone/dropzone.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
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


@endsection
