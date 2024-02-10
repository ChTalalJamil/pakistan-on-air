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

                            <div class="row">

                                <div style="margin-left: 15rem!important;" class="col-md-6 mt-5 mb-5">
                                    <div class="mx-auto mb-5">
                                        <a href="index.html">
                                            <img src="{{asset('dist/assets/images/logo.png')}}" alt="" height="24" />
                                            <h3 class="d-inline align-middle ml-1 text-logo">{{env('APP_NAME')}}</h3>
                                        </a>
                                    </div>
                                    <h6 class="h5 mb-0 mt-4">Create your account</h6>
                                    <p class="text-muted mt-0 mb-4">Create a free account and start using Shreyu</p>

                                    <form action="{{ route('register.custom') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-control-label">First Name</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="user"></i>
                                                    </span>
                                                </div>
                                                <input type="text" placeholder="First Name" id="first_name" class="form-control" name="first_name" required autofocus>
                                                @if ($errors->has('first_name'))
                                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Last Name</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="user"></i>
                                                    </span>
                                                </div>
                                                <input type="text" placeholder="Last Name" id="last_name" class="form-control" name="last_name" required>
                                                @if ($errors->has('last_name'))
                                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Email Address</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="mail"></i>
                                                    </span>
                                                </div>
                                                <input type="email" placeholder="Email" id="email_address" class="form-control" name="email" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-control-label">Phone</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="phone"></i>
                                                    </span>
                                                </div>
                                                <input type="tel" id="phone" name="phone" class="form-control" placeholder="Phone" maxlength="16">
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label class="form-control-label">Password</label>
                                            <div class="input-group input-group-merge">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="icon-dual" data-feather="lock"></i>
                                                    </span>
                                                </div>
                                                <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                                @if ($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group mb-0 text-center">
                                            <button class="btn btn-primary btn-block" type="submit">Sign Up</button>
                                        </div>
                                    </form>
                                </div>

                            </div>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Do you have an account? <a href="/" class="text-primary font-weight-bold ml-1">Log In</a></p>
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