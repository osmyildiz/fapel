<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title> @yield('title')FAPEL Restaurant Admin Panel</title>
    <link rel="icon" type="image/x-icon" href="assets1/images/favicon.png"/>


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Fapel Restaurant, Anadolu mutfağının en seçkin lezzetlerini sunmaktadır. Urfalıların eşsiz misafirperverliğiyle birleştirilmiş benzersiz bir deneyim için bizi ziyaret edin. " name="description" />
    <meta content="ana sayfa, restoran, fapel, Anadolu mutfağı, Urfalı lezzetler" name="keywords" />
    <meta content="Fapel Restaurant Team" name="author" />
    <!-- App favicon -->
    !-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('/img/ico.png') }}">
    @include('admin.layouts.head-css')
</head>

@section('body')
    <body data-topbar="dark" data-layout="horizontal">
@show

    <!-- Begin page -->
    <div id="layout-wrapper">
        @include('admin.layouts.horizontal')
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <!-- Start content -->
                <div class="container-fluid">
                    @yield('content')
                </div> <!-- content -->
            </div>
            @include('admin.layouts.footer')
        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    @include('admin.layouts.right-sidebar')
    <!-- END Right Sidebar -->

    @include('admin.layouts.vendor-scripts')
</body>

</html>
