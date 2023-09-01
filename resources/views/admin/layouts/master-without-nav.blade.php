<!doctype html>
<html>

    <head>
        <meta charset="utf-8" />

        <title>Fapel Restaurant Admin Panel</title>
        <link rel="icon" type="image/x-icon" href="assets1/images/favico.png"/>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="Fapel Restaurant" name="description" />
        <meta content="Fapel Restaurant" name="author" />

        <!-- App favicon -->

        @include('admin.layouts.head-css')
  </head>

    @yield('body')

    @yield('content')

    @include('admin.layouts.vendor-scripts')
    </body>
</html>
