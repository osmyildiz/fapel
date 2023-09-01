@extends('admin.layouts.master-without-nav')



@section('css')

@endsection

@section('body')

    <body class="auth-body-bg">
    @endsection

    @section('content')

        <div style="background-color: #000000">
            <div class="container-fluid p-0">
                <div class="row g-0">

                    <div class="col-xl-9">
                        <img src="assets/images/admin.jpg" alt="" width="100%"
                             class="space">
                    </div>
                    <!-- end col -->

                    <div class="col-xl-3">
                        <div class="auth-full-page-content p-md-5 p-4">
                            <div class="w-100">

                                <div class="d-flex flex-column h-100">
                                    <div class="mb-4 mb-md-5">
                                        <a href="/admin" class="d-block auth-logo">
                                            <img src="{{ URL::asset('/img/logo_white.png') }}" alt=""
                                                 class="auth-logo-dark">
                                            <img src="{{ URL::asset('/img/logo_white.png') }}" alt=""

                                                 class="auth-logo-light">
                                        </a>
                                    </div>
                                    <div class="my-auto">

                                        <div class="mt-4">
                                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <div class="mb-3">
                                                    <input name="email" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        value="{{ old('email') }}" id="username"
                                                        placeholder="Email" autocomplete="email" autofocus>
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="mb-3">


                                                    <div
                                                        class="input-group auth-pass-inputgroup @error('password') is-invalid @enderror">
                                                        <input type="password" name="password"
                                                            class="form-control  @error('password') is-invalid @enderror"
                                                            id="userpassword" value="" placeholder="Password"
                                                            aria-label="Password" aria-describedby="password-addon">
                                                        <button class="btn btn-light " type="button" id="password-addon"><i
                                                                class="mdi mdi-eye-outline"></i></button>
                                                        @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>



                                                <div class="mt-3 d-grid">
                                                    <button class="btn btn-warning waves-effect waves-light"
                                                        type="submit">LOGIN</button>
                                                </div>


                                            </form>

                                        </div>
                                        <div class="mt-4  text-center">
                                            <p class="mb-0">© <script>
                                                    document.write(new Date().getFullYear())

                                                </script> Designed and developed <i class="mdi mdi-heart text-danger"></i>by
                                                Mayfair</p>
                                        </div>
                                    </div>


                                </div>


                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </div>

    @endsection
    @section('script')
        <!-- owl.carousel js -->
        <script src="{{ URL::asset('/assets/libs/owl.carousel/owl.carousel.min.js') }}"></script>
        <!-- auth-2-carousel init -->
        <script src="{{ URL::asset('/assets/js/pages/auth-2-carousel.init.js') }}"></script>
    @endsection
