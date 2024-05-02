@extends('layouts.frontend')
@section('content')
    <!-- section main content -->
    <section class="main-content mt-3">
        <div class="container-xl">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Inspiration</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $post->blog_title }}</li>
                </ol>
            </nav>

            <div class="row gy-4">

                <div class="col-lg-8">
                    <!-- post single -->
                    <div class="post post-single">
                        <!-- post header -->
                        <div class="post-header">
                            <h1 class="title mt-0 mb-3">{{ $post->blog_title }}</h1>
                            <ul class="meta list-inline mb-0">
                                <li class="list-inline-item"><a href="#">
                                        <img src="{{ asset('dashboard-assets/images/default_profile.png') }}"
                                            style="width: 30px; height:30px;" class="author"
                                            alt="author" />{{ $post->getUser->name }}</a></li>
                                <li class="list-inline-item"><a href="#">{{ $post->getCategory->category_name }}</a>
                                </li>
                                <li class="list-inline-item">{{ $post->created_at }}</li>
                            </ul>
                        </div>
                        <!-- featured image -->
                        <div class="featured-image">
                            <img src="{{ asset('uploads/blog_photos') }}/{{ $post->blog_photo }}" alt="post-title" />
                        </div>
                        <!-- post content -->
                        <div class="post-content clearfix">
                            @php
                                echo $post->blog;
                            @endphp
                        </div>
                        <!-- post bottom section -->
                        <div class="post-bottom">
                            <div class="row d-flex align-items-center">
                                <div class="col-md-6 col-12 text-center text-md-start">
                                    <!-- tags -->
                                    <a href="#" class="tag">#{{ $post->getCategory->category_slug }}</a>
                                    @if ($post->blog_speciality)
                                        <a href="#" class="tag">#{{ $post->blog_speciality }}</a>
                                    @endif
                                </div>

                                <!-- Make Special
                                ================================================== -->
                                @if (Auth::check() && auth()->user()->role == 'admin')
                                    <div class="col-md-6 col-12 text-center text-md-start">
                                        <a href="{{ route('make_feature', $post->id) }}" class="tag">#Make Feature</a>
                                        <a href="{{ route('make_editor', $post->id) }}" class="tag">#Make Editor's
                                            pick</a>
                                        <a href="{{ route('make_trending', $post->id) }}" class="tag">#Make Trending</a>
                                        <a href="{{ route('delete_speciality', $post->id) }}" class="tag">#Delete
                                            Speciality</a>
                                    </div>
                                @endif
                                {{-- <div class="col-md-6 col-12">
                                    <!-- social icons -->
                                    @if (Auth::check() && auth()->user()->id == $post->user_id)
                                        <ul class="social-icons list-unstyled list-inline mb-0 float-md-end">
                                            <li class="list-inline-item">
                                                <a href="{{ route('post.edit', $post) }}" data-bs-toggle="tooltip"
                                                    data-bs-placement="a" title="Edit Post">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <form action="{{ route('post.destroy',$post) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button data-bs-toggle="tooltip" data-bs-placement="a"
                                                        title="Delete Post" class="bg-transparent border-0">
                                                        <i class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            </li>
                                        </ul>
                                    @endif
                                </div> --}}
                            </div>
                        </div>

                    </div>

                    <div class="spacer" data-height="50"></div>

                    <div class="about-author padding-30 rounded">
                        <div class="thumb">
                            <img src="{{ asset('frontend-assets') }}/images/other/avatar-about.png" alt="Katen Doe" />
                        </div>
                        <div class="details">
                            <h4 class="name"><a href="#">Katen Doe</a></h4>
                            <p>Hello, I’m a content writer who is fascinated by content fashion, celebrity and lifestyle.
                                She helps clients bring the right content to the right people.</p>
                            <!-- social icons -->
                            <ul class="social-icons list-unstyled list-inline mb-0">
                                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="spacer" data-height="50"></div>

                    <!-- Comment components start
                    ================================================== -->

                    @include('components.comments.comment')

                    <!-- Comment components end
                    ================================================== -->

                </div>

                <div class="col-lg-4">
                    @include('components.asidebar.asidebar')
                </div>
            </div>
        </div>
    </section>
@endsection

@if (session('success'))
    @section('alert')
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "{{ session('success') }}"
            });
        </script>
    @endsection
@endif
@if (session('warning'))
    @section('alert')
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "warning",
                title: "{{ session('warning') }}"
            });
        </script>
    @endsection
@endif
