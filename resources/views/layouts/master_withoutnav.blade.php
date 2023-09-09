<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <meta charset="utf-8">
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
    <title> @yield('title')FAPEL Restaurant Admin Panel</title>
    <link rel="icon" type="image/x-icon" href="assets1/images/favicon.png"/>


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Fapel Restaurant, Anadolu mutfağının en seçkin lezzetlerini sunmaktadır. Urfalıların eşsiz misafirperverliğiyle birleştirilmiş benzersiz bir deneyim için bizi ziyaret edin. " name="description" />
    <meta content="ana sayfa, restoran, fapel, Anadolu mutfağı, Urfalı lezzetler" name="keywords" />
    <meta content="Fapel Restaurant Team" name="author" />
    <!-- App favicon -->

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    @include('layouts.head')
    @yield('css')

</head>
<body>
<div id="canvas">
    <div id="box_wrapper">


@yield('content')
<!-- Footer Widgets -->



    </div><!-- eof #box_wrapper -->
</div><!-- eof #canvas -->



<!-- JS Files -->
@include('layouts.script')
@yield('script')

</body>
</html>
