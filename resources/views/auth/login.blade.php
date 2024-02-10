<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{env('APP_NAME')}} - Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Web Agency Portal." name="description" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('dist/assets/images/favicon.ico')}}">

    <!-- App css -->
    <link href="{{asset('dist/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dist/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('dist/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg">

    <div class="account-pages my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="card">
                        <div class="card-body p-0">
                            @if(count($errors)>0)
                            @if($errors->first() == 'WrongPassword')
                            <div class="alert alert-danger">
                                Wrong Email or Password!
                            </div>
                            @endif
                            @endif
                            <div class="row">

                                <div style="margin-left: 15rem!important;" class="col-md-6 mt-5 mb-5">
                                    <div class="mx-auto mb-5">
                                        <a href="index.html">
                                            <img src="{{asset('dist/assets/images/logo.png')}}" alt="" height="24" />
                                            <h3 class="d-inline align-middle ml-1 text-logo">{{env('APP_NAME')}}</h3>
                                        </a>
                                    </div>

                                    <h6 class="h5 mb-0 mt-4">Welcome back!</h6>
                                    <p class="text-muted mt-1 mb-4">Enter your email address and password to
                                        access panel.</p>



                                    <form action="{{route('login.custom')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-control-label">Email Address</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="mail"></i>
                                                    </span>
                                                </div>
                                                <input required type="email" class="form-control" name="email" id="email" placeholder="hello@coderthemes.com">
                                            </div>
                                        </div>

                                        <div class="form-group mt-4">
                                            <label class="form-control-label">Password</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="lock"></i>
                                                    </span>
                                                </div>
                                                <input required type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
                                            </div>
                                        </div>




                                        <div class="form-group mb-0 text-center">
                                            <button class="btn btn-primary btn-block" type="submit"> Log In
                                            </button>
                                        </div>
                                    </form>
                                </div>

                            </div>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Don't have an account? <a href="/register" class="text-primary font-weight-bold ml-1">Sign Up</a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- Vendor js -->
    <script src="{{asset('dist/assets/js/vendor.min.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('dist/assets/js/app.min.js')}}"></script>

</body>

</html>