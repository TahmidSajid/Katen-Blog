@extends('layouts.frontend')
@section('content')
    <section class="main-content">
        <div class="container-xl">

            <div class="row gy-4">

                <div class="col-lg-8">

                    <div class="row gy-4">
                        @forelse ($posts as $post)
                            <div class="col-sm-6">
                                <!-- post -->
                                <div class="post post-grid rounded bordered">
                                    <div class="thumb top-rounded">
                                        <a href="{{ route('category_post',[$post->blog_category,$post->getCategory->category_name]) }}"
                                            class="category-badge position-absolute">{{ $post->getCategory->category_name }}</a>
                                        <a href="{{ route('post_view',$post->id) }}">
                                            <div class="inner">
                                                <img src="{{ asset('uploads/blog_photos') }}/{{ $post->blog_photo }}"
                                                    alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details">
                                        <ul class="meta list-inline mb-0">
                                            <li class="list-inline-item">
                                                <a href="#">
                                                    {{-- <img src="{{ asset('uploads/profile_photos') }}/{{ $post->getUser->photo }}"
                                                        class="author rounded-circle" style="width: 35px; height:35px;" alt="author" /> --}}
                                                {{ $post->getUser->name }}</a>
                                            </li>
                                            <li class="list-inline-item">{{ $post->created_at }}</li>
                                        </ul>
                                        <h5 class="post-title mb-3 mt-3">
                                            <a href="{{ route('post_view',$post->id) }}">{{ $post->blog_title }}</a>
                                        </h5>
                                        @php
                                        $blog_des = strip_tags($post->blog);
                                        // $blog_id = $blog->id;
                                        if (strlen($blog_des > 80)):
                                            $blog_cut = substr($blog_des, 0, 80);
                                            $endpoint = strrpos($blog_cut, ' ');
                                            $blog_des = $endpoint ? substr($blog_cut, 0, $endpoint) : substr($blog_cut, 0);
                                            // $blog_des .= "..... <span class='text-info fw-bold'>Read More</span>";
                                        endif;
                                        @endphp
                                        <p class="excerpt mb-0">
                                            @php
                                                echo $blog_des;
                                            @endphp
                                        </p>
                                    </div>
                                    <div class="post-bottom clearfix d-flex align-items-center">
                                        <div class="social-share me-auto">
                                            <button class="toggle-button icon-share"></button>
                                            <ul class="icons list-unstyled list-inline mb-0">
                                                <li class="list-inline-item"><a href="#"><i
                                                            class="fab fa-facebook-f"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i
                                                            class="fab fa-twitter"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i
                                                            class="fab fa-linkedin-in"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i
                                                            class="fab fa-pinterest"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i
                                                            class="fab fa-telegram-plane"></i></a></li>
                                                <li class="list-inline-item"><a href="#"><i
                                                            class="far fa-envelope"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="more-button float-end">
                                            <a href="#"><span class="icon-options"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>

                    {{ $posts->links() }}

                </div>
                <div class="col-lg-4">

                    <!-- sidebar -->
                    @include('components.asidebar.asidebar')

                </div>

            </div>

        </div>
    </section>
@endsection
