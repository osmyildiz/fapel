<!DOCTYPE html>
<html class="wide wow-animation smoothscroll" lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets1/images/favicon.png">
    <title>Fapel</title>

    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}

    @include('layouts.head')
    @yield('css')

</head>
<body class="home-one dark">


@include('layouts.header')
@yield('content')
<!-- Footer Widgets -->

@include('layouts.footer')





<!-- JS Files -->
@include('layouts.script')
@yield('script')

</body>
</html>
