@extends('admin.layouts.master')

@section('title') Contact Forms @endsection

@section('css')
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/libs/spectrum-colorpicker/spectrum-colorpicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/datepicker/datepicker.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/toastr/toastr.min.css') }}">
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />


@endsection


@section('content')


    @component('admin.components.breadcrumb')
        @slot('li_1') Admin Panel @endslot
        @slot('title') Contact Forms @endslot
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
    <div class="col-xl-12">


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Contact Forms</h4>

                        <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100" id="visitors" name="visitors">
                            <thead>
                            <tr>
                                <th class="align-middle">#</th>
                                <th class="align-middle">Name</th>
                                <th class="align-middle">Phone</th>
                                <th class="align-middle">Date</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Message</th>
                            </tr>
                            </thead>


                            <tbody>
                            @if($records->count()==0)
                                <td colspan="8">No record found</td>
                            @else

                                @foreach($records as $key=>$record)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$record->name}}</td>
                                        <td>{{$record->phone}}</td>
                                        <td>{{$record->created_at}}</td>
                                        <td>{{$record->email}}</td>
                                        <td>{{$record->message}}</td>
                                    </tr>
                                @endforeach

                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>



@endsection
@section('script')


    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jszip/jszip.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>

    <script type="text/javascript">

        $(document).ready(function(){
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });


            $('#visitors').DataTable( {
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.10.25/i18n/Turkish.json'
                },
                dom: 'Bfrtip',
                buttons: [
                    'pdf', 'print'
                ],


                "columnDefs": [
                    {
                        "targets": [ 1 ],
                        "visible": false,


                    },
                    {
                        className: 'text-right', targets: [3,4,5,6,7]

                    },
                ],

            } );


        });
    </script>










@endsection
