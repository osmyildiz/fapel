<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title> @yield('title')FAPEL Restaurant Admin Panel</title>
    <link rel="icon" type="image/x-icon" href="assets1/images/favicon.png"/>


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Fapel Restaurant, Anadolu mutfağının en seçkin lezzetlerini sunmaktadır. Urfalıların eşsiz misafirperverliğiyle birleştirilmiş benzersiz bir deneyim için bizi ziyaret edin. " name="description" />
    <meta content="ana sayfa, restoran, fapel, Anadolu mutfağı, Urfalı lezzetler" name="keywords" />
    <meta content="Fapel Restaurant Team" name="author" />
    <!-- App favicon -->


    @include('admin.layouts.head-css')
</head>
@section('body')
    <body data-sidebar="dark">
@show
    <!-- Begin page -->
    <div id="layout-wrapper">
    @include('admin.layouts.topbar')
    @include('admin.layouts.sidebar1')



        <!--  -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            @include('admin.layouts.footer')
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    @include('admin.layouts.vendor-scripts')
</body>

</html>
