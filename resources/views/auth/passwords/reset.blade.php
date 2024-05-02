<!DOCTYPE html>
<html lang="en" data-bs-theme="light" data-menu-color="brand" data-topbar-color="light">


<!-- Mirrored from myrathemes.com/dashtrap/pages-recoverpw by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Mar 2024 03:40:33 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8" />
    <title>Forgot Password | Dashtrap - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Myra Studio" name="author" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('dashboard-assets') }}/images/favicon.ico">

    <!-- App css -->
    <link href="{{ asset('dashboard-assets') }}/css/style.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('dashboard-assets') }}/css/icons.min.css" rel="stylesheet" type="text/css">
    <script src="{{ asset('dashboard-assets') }}/js/config.js"></script>
</head>

<body class="bg-primary d-flex justify-content-center align-items-center min-vh-100 p-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-md-5">
                <div class="card">

                    <div class="card-body p-4">

                        <div class="text-center w-75 mx-auto auth-logo mb-4">
                            <a class='logo-dark' href='index.html'>
                                <span><img src="{{ asset('dashboard-assets') }}/images/logo-dark.png" alt=""
                                        height="22"></span>
                            </a>

                            <a class='logo-light' href='index.html'>
                                <span><img src="{{ asset('dashboard-assets') }}/images/logo-light.png" alt=""
                                        height="22"></span>
                            </a>
                        </div>

                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group mb-3">
                                <label class="form-label" for="emailaddress">Email address</label>
                                <input class="form-control" type="email" id="emailaddress" name="email"
                                    value="{{ $email ?? old('email') }}" placeholder="Enter your email">
                                @error('email')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="password">Password</label>
                                <input class="form-control" id="password" type="password" name="password" placeholder="Enter your new password">
                                @error('password')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label class="form-label" for="password-confirm">Confirm Password</label>
                                <input class="form-control" id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Enter your confirm password">
                            </div>

                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary w-100" type="submit"> Reset Password </button>
                            </div>

                        </form>
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>

    <!-- App js -->
    <script src="{{ asset('dashboard-assets') }}/js/vendor.min.js"></script>
    <script src="{{ asset('dashboard-assets') }}/js/app.js"></script>

</body>


<!-- Mirrored from myrathemes.com/dashtrap/pages-recoverpw by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 22 Mar 2024 03:40:33 GMT -->

</html>
