<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <title>Oriartist</title>
    <meta charset="utf-8">
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <![endif]-->
    <meta name="description" content="">
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
