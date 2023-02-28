<!doctype html>
<html lang="en">

    <head>
        
        <meta charset="utf-8" />
        <title>Login | DCCP - Portal</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Online Supply Inventory System" name="Chrispin B. Zamoranos" />

        <!-- Favicon -->
	    <link rel="shortcut icon" type="image/x-icon" href="{{URL::to('assets/images/dccp.png')}}">

        <!-- Bootstrap Css -->
        <link href="{{URL::to('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{URL::to('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{URL::to('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

        {{-- message toastr --}}
        <link  href="{{URL::to('assets/css/toastr.min.css')}}" rel="stylesheet">

        {{-- message toastr --}}
        <script src="{{URL::to('assets/js/jquery.min.js')}}"></script>
        <script src="{{URL::to('assets/js/toastr.min.js')}}"></script>

    </head>

    <body class="auth-body-bg">
    {{-- message --}}
    {!! Toastr::message() !!}

        <div class="bg-overlay"></div>
        <div class="wrapper-page">
            <div class="container-fluid p-0">
                <div class="card">
                    <div class="card-body">

                        <div class="text-center mt-4">
                            <div class="mb-3">
                                <img src="{{asset('assets/images/dccp.png')}}" height="90" class="logo-dark mx-auto" alt="">
                                <img src="{{asset('assets/images/dccp.png')}}" height="90" class="logo-light mx-auto" alt="">
                                <h2 class="text-muted text-center"><b>Data Center College of the Philippines Bangued, Abra</b>
                                    <br/>Student Portal</h2>
                            </div>
                        </div>
    
                        <h4 class="text-muted text-center font-size-18"><b>Sign In</b> to Start Session</h4>
    
                        <div class="p-3">
                            <!-- Account Form -->
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
    
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input id="login" name="login" type="text" placeholder="Email/ID No." class="form-control {{$errors->has('idno') || $errors->has('email') ? 'is-invalid' : ''}}" value="{{ old('idno') ?:  old('email')}}" required autofocus>
                                        @if ($errors->has('idno') || $errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('idno') ?: $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
    
                                <div class="form-group mb-3 row">
                                    <div class="col-12">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                <div class="form-group mb-0 row mt-1">
                                    <div class="col-sm-6 mt-1">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="form-label ms-1" for="customCheck1">Remember me</label>
                                        </div>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <div class="col-sm-6 mt-1">
                                            <a class="text-muted" href="{{ route('password.request') }}"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                        </div>
                                    @endif
                                </div>
    
                                <div class="form-group mb-3 text-center row mt-3 pt-1">
                                    <div class="col-12">
                                        <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Log In</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <!-- end -->
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
        <!-- end -->

        <!-- JAVASCRIPT -->
        <script src="{{URL::to('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{URL::to('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{URL::to('assets/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{URL::to('assets/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{URL::to('assets/libs/node-waves/waves.min.js')}}"></script>

        <!-- App js -->
        <script src="{{URL::to('assets/js/app.js')}}"></script>

        <!-- Right Click Disabled js -->
        <script>
            document.addEventListener('contextmenu', event => event.preventDefault());
        </script>

    </body>
</html>