<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from themeger.shop/html/katen/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Nov 2023 05:32:38 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Katen - Minimal Blog & Magazine HTML Theme</title>
    <meta name="description" content="Katen - Minimal Blog & Magazine HTML Theme">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend-assets') }}/images/favicon.png">

    <!-- STYLES -->
    <link rel="stylesheet" href="{{ asset('frontend-assets') }}/css/bootstrap.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('frontend-assets') }}/css/all.min.css" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('frontend-assets') }}/css/slick.css" type="text/css" media="all">
    <link rel="stylesheet" href="{{ asset('frontend-assets') }}/css/simple-line-icons.css" type="text/css"
        media="all">
    <link rel="stylesheet" href="{{ asset('frontend-assets') }}/css/style.css" type="text/css" media="all">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css' />

    <link rel="stylesheet" href="{{ asset('frontend-assets/css/form.css') }}">


    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- preloader -->
    <div id="preloader">
        <div class="book">
            <div class="inner">
                <div class="left"></div>
                <div class="middle"></div>
                <div class="right"></div>
            </div>
            <ul>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </div>




    <div class="container">
        <div class="row" style="margin-bottom: 80px">
            <div class="col-lg-6 offset-lg-3 text-center">
                <img src="{{ asset('frontend-assets') }}/images/logo.svg" alt="img">
            </div>
        </div>

        <div class="frame">
            <div class="nav">
                <ul class="links">
                    <li class="signin-active"><a class="btn">Sign in</a></li>
                    <li class="signup-inactive"><a class="btn">Sign up </a></li>
                </ul>
            </div>
            <div ng-app ng-init="checked = false">
                <form class="form-signin" action="{{ route('user_login') }}" method="post">
                    @csrf
                    <label for="username">User email</label>
                    <input class="form-styling" type="email" name="email" placeholder="" />
                    @error('email')
                        <span style="font-size: 15px; margin-top:-10px !important"
                            class="text-danger">{{ $message }}</span>
                    @enderror
                    <label for="password">Password</label>
                    <input class="form-styling" type="password" name="password" placeholder="" />
                    @error('password')
                        <span style="font-size: 15px; margin-top:-10px !important"
                            class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="checkbox" id="checkbox" />
                    <label for="checkbox"><span class="ui"></span>Keep me signed in</label>
                    <div class="">
                        <button class="btn-signin" type="submit">Sign in</button>
                    </div>
                </form>

                <form class="form-signup" action="{{ route('user_register') }}" method="POST">
                    @csrf
                    <label for="fullname">Name</label>
                    <input class="form-styling mb-1" type="text" name="name" placeholder="" />
                    @error('name')
                        <span style="font-size: 15px; margin-top:-10px !important"
                            class="text-danger">{{ $message }}</span>
                    @enderror
                    <label for="email">Email</label>
                    <input class="form-styling mb-1" type="email" name="email" placeholder="" />
                    @error('email')
                        <span style="font-size: 15px; margin-top:-10px !important"
                            class="text-danger">{{ $message }}</span>
                    @enderror
                    <label for="password">Password</label>
                    <input class="form-styling mb-1" type="password" name="password" placeholder="" />
                    @error('password')
                        <span style="font-size: 15px; margin-top:-10px !important"
                            class="text-danger">{{ $message }}</span>
                    @enderror
                    <label for="confirmpassword">Confirm password</label>
                    <input class="form-styling mb-1" type="password" name="password_confirmation" placeholder="" />
                    <div class="">
                        <button class="btn-signin" type="submit">Sign Up</button>
                    </div>
                </form>
            </div>
        </div>
        @if (session('crede_error'))
            <div class="row">
                <div class="col-lg-6 offset-lg-3 text-center">
                    <p class="text-danger">{{ session('crede_error') }}</p>
                </div>
            </div>
        @endif
    </div>




    <!-- JAVA SCRIPTS -->
    <script src="{{ asset('frontend-assets') }}/js/jquery.min.js"></script>
    <script src="{{ asset('frontend-assets') }}/js/popper.min.js"></script>
    <script src="{{ asset('frontend-assets') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontend-assets') }}/js/slick.min.js"></script>
    <script src="{{ asset('frontend-assets') }}/js/jquery.sticky-sidebar.min.js"></script>
    <script src="{{ asset('frontend-assets') }}/js/custom.js"></script>

    <!-- From Js
    ================================================== -->
    <script src="{{ asset('frontend-assets/js/form.js') }}"></script>

</body>

<!-- Mirrored from themeger.shop/html/katen/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Nov 2023 05:32:47 GMT -->

</html>
