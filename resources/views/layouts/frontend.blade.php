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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('frontend-assets') }}/css/style.css" type="text/css" media="all">

    <!--[if lt IE 9]
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="position-relative">

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

    <!-- site wrapper -->
    <div class="site-wrapper">

        <div class="main-overlay"></div>

        <!-- header -->
        <header class="header-default">
            <nav class="navbar navbar-expand-lg">
                <div class="container-xl">
                    <!-- site logo -->
                    <a class="navbar-brand" href="index.html"><img src="{{ asset('frontend-assets') }}/images/logo.svg"
                            alt="logo" /></a>

                    <div class="collapse navbar-collapse">
                        <!-- menus -->
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('index') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                @php
                                    $banner_one = App\Models\Categories::where('showcase', 'banner_one')->first();
                                @endphp
                                <a class="nav-link"
                                    href="{{ route('category_post', [$banner_one->id, $banner_one->category_name]) }}">{{ $banner_one->category_name }}</a>
                            </li>
                            <li class="nav-item">
                                @php
                                    $banner_two = App\Models\Categories::where('showcase', 'banner_two')->first();
                                @endphp
                                <a class="nav-link"
                                    href="{{ route('category_post', [$banner_two->id, $banner_two->category_name]) }}">{{ $banner_two->category_name }}</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#">More Categories</a>
                                <ul class="dropdown-menu">
                                    @forelse (App\Models\Categories::where('id','!=',$banner_one->id)->where('id','!=',$banner_two->id)->get() as $category)
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ route('category_post', [$category->id, $category->category_name]) }}">{{ $category->category_name }}</a>
                                        </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact_page') }}">Contact</a>
                            </li>
                        </ul>
                    </div>

                    <!-- header right section -->
                    <div class="header-right">
                        <!-- social icons -->
                        {{-- <ul class="social-icons list-unstyled list-inline mb-0">
                            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
                        </ul> --}}
                        <!-- header buttons -->
                        <div class="header-buttons">
                            <button class="search icon-button">
                                <i class="icon-magnifier"></i>
                            </button>
                            <button class="burger-menu icon-button" style="margin-right: 10px">
                                <span class="burger-icon"></span>
                            </button>
                            @if (Auth::check())
                                <a class="d-inline-block icon-button" style="margin-right: 10px"
                                    href="{{ route('user_profile') }}">
                                    <span class="icon-user"></span>
                                </a>
                                <a class="d-inline-block icon-button" href="{{ route('user_logout') }}">
                                    <span class="icon-logout"></span>
                                </a>
                            @else
                                <a class="d-inline-block icon-button" href="{{ route('login_view') }}">
                                    <span class="icon-login"></span>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <!-- section main content start-->

        @yield('content')

        <!-- section main content end-->

        <!-- Post form start
        ================================================== -->
        @auth
            <div class="row position-fixed" style="right: 0px !important; top:800px !important;">
                <div class="col-lg-4">
                    <a class="btn btn-danger mx-4" href="{{ route('post.index') }}"
                        style="font-size: 20px; background: linear-gradient(to right, #FE4F70 0%, #FFA387 100%) !important">
                        <span class="icon-pencil mx-2"></span>Write</a>
                </div>
            </div>
        @endauth
        <!-- Post form end
        ================================================== -->


        <!-- instagram feed -->
        {{-- <div class="instagram">
            <div class="container-xl">
                <!-- button -->
                <a href="#" class="btn btn-default btn-instagram">@Katen on Instagram</a>
                <!-- images -->
                <div class="instagram-feed d-flex flex-wrap">
                    <div class="insta-item col-sm-2 col-6 col-md-2">
                        <a href="#">
                            <img src="{{ asset('frontend-assets') }}/images/insta/insta-1.jpg" alt="insta-title" />
                        </a>
                    </div>
                    <div class="insta-item col-sm-2 col-6 col-md-2">
                        <a href="#">
                            <img src="{{ asset('frontend-assets') }}/images/insta/insta-2.jpg" alt="insta-title" />
                        </a>
                    </div>
                    <div class="insta-item col-sm-2 col-6 col-md-2">
                        <a href="#">
                            <img src="{{ asset('frontend-assets') }}/images/insta/insta-3.jpg" alt="insta-title" />
                        </a>
                    </div>
                    <div class="insta-item col-sm-2 col-6 col-md-2">
                        <a href="#">
                            <img src="{{ asset('frontend-assets') }}/images/insta/insta-4.jpg" alt="insta-title" />
                        </a>
                    </div>
                    <div class="insta-item col-sm-2 col-6 col-md-2">
                        <a href="#">
                            <img src="{{ asset('frontend-assets') }}/images/insta/insta-5.jpg" alt="insta-title" />
                        </a>
                    </div>
                    <div class="insta-item col-sm-2 col-6 col-md-2">
                        <a href="#">
                            <img src="{{ asset('frontend-assets') }}/images/insta/insta-6.jpg" alt="insta-title" />
                        </a>
                    </div>
                </div>
            </div>
        </div> --}}

        <!-- footer -->
        <footer>
            <div class="container-xl">
                <div class="footer-inner">
                    <div class="row d-flex align-items-center gy-4">
                        <!-- copyright text -->
                        <div class="col-md-4">
                            <span class="copyright">© 2021 Katen. Template by ThemeGer.</span>
                        </div>

                        <!-- social icons -->
                        <div class="col-md-4 text-center">
                            <ul class="social-icons list-unstyled list-inline mb-0">
                                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a>
                                </li>
                            </ul>
                        </div>

                        <!-- go to top button -->
                        <div class="col-md-4">
                            <a href="#" id="return-to-top" class="float-md-end"><i
                                    class="icon-arrow-up"></i>Back to Top</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div><!-- end site wrapper -->

    <!-- search popup area -->
    <div class="search-popup">
        <!-- close button -->
        <button type="button" class="btn-close" aria-label="Close"></button>
        <!-- content -->
        <div class="search-content">
            <div class="text-center">
                <h3 class="mb-4 mt-0">Press ESC to close</h3>
            </div>
            <!-- form -->
            <form class="d-flex search-form" action="{{ route('search') }}" method="post">
                @csrf
                <input class="form-control me-2" type="search" name="search"
                    placeholder="Search and press enter ..." aria-label="Search">
                <button class="btn btn-default btn-lg" type="submit"><i class="icon-magnifier"></i></button>
            </form>
        </div>
    </div>

    <!-- canvas menu -->
    <div class="canvas-menu d-flex align-items-end flex-column">
        <!-- close button -->
        <button type="button" class="btn-close" aria-label="Close"></button>

        <!-- logo -->
        <div class="logo">
            <img src="{{ asset('frontend-assets') }}/images/logo.svg" alt="Katen" />
        </div>

        <!-- menu -->
        <nav>
            <ul class="vertical-menu">
                <li class="active">
                    <a href="{{ route('index') }}">Home</a>
                </li>
                @php
                    $banner_one = App\Models\Categories::where('showcase', 'banner_one')->first();
                @endphp
                <li><a href="{{ route('category_post', [$banner_two->id, $banner_two->category_name]) }}">{{ $banner_two->category_name }}</a>
                </li>
                @php
                    $banner_two = App\Models\Categories::where('showcase', 'banner_two')->first();
                @endphp
                <li><a
                        href="{{ route('category_post', [$banner_two->id, $banner_two->category_name]) }}">{{ $banner_two->category_name }}</a>
                </li>
                <li>
                    <a href="#">More Categories</a>
                    <ul class="submenu">
                        @forelse (App\Models\Categories::where('id','!=',$banner_one->id)->where('id','!=',$banner_two->id)->get() as $category)
                            <li>
                                <a href="{{ route('category_post', [$category->id, $category->category_name]) }}">{{ $category->category_name }}</a>
                            </li>
                        @empty
                        @endforelse
                    </ul>
                </li>
                <li><a href="{{ route('contact_page') }}">Contact</a></li>
            </ul>
        </nav>

        <!-- social icons -->
        <ul class="social-icons list-unstyled list-inline mb-0 mt-auto w-100">
            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
            <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
        </ul>
    </div>

    <!-- JAVA SCRIPTS -->
    <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.js"></script>
    {{-- <script src="{{ asset('frontend-assets') }}/js/jquery.min.js"></script> --}}
    <script src="{{ asset('frontend-assets') }}/js/popper.min.js"></script>
    <script src="{{ asset('frontend-assets') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontend-assets') }}/js/slick.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
    <script src="{{ asset('frontend-assets') }}/js/jquery.sticky-sidebar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('frontend-assets') }}/js/custom.js"></script>

    @yield('alert')

</body>

<!-- Mirrored from themeger.shop/html/katen/html/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Nov 2023 05:32:47 GMT -->

</html>
