@extends('admin.layouts.master')

@section('content')

    <div class="row">
        <div class="col-xl-12">
            <div class="card overflow-hidden">
                <div class="bg-primary bg-soft">
                    <div class="row">
                        <div class="col-7">
                            <div class="text-primary p-3">
                                <p>Admin Panel</p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>
    <!--<div class="row">
        <div class="col-md-3">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <p class="text-muted fw-medium">Join Us</p>
                            <h4 class="mb-0">5<span class="badge rounded-pill bg-info float-end">NEW</span></h4>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <p class="text-muted fw-medium">Book Artist</p>
                            <h4 class="mb-0">3<span class="badge rounded-pill bg-info float-end">NEW</span></h4>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <p class="text-muted fw-medium">Contact Form</p>
                            <h4 class="mb-0">2<span class="badge rounded-pill bg-info float-end">NEW</span></h4>

                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <p class="text-muted fw-medium">Personal Booking</p>
                            <h4 class="mb-0">1<span class="badge rounded-pill bg-info float-end">NEW</span></h4>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>-->


@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- dashboard init -->
    <script src="{{ URL::asset('/assets/js/pages/dashboard.init.js') }}"></script>
@endsection
