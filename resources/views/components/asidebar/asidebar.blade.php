<div class="sidebar">
    <!-- widget about -->
    <div class="widget rounded">
        <div class="widget-about data-bg-image text-center"
            data-bg-image="{{ asset('frontend-assets') }}/images/map-bg.png">
            <img src="{{ asset('frontend-assets') }}/images/logo.svg" alt="logo" class="mb-4" />
            <p class="mb-4">Hello, We’re content writer who is fascinated by content fashion,
                celebrity and lifestyle. We helps clients bring the right content to the right people.
            </p>
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
    </div>

    <!-- widget popular posts -->
    <div class="widget rounded">
        <div class="widget-header text-center">
            <h3 class="widget-title">Popular Posts</h3>
            <img src="{{ asset('frontend-assets') }}/images/wave.svg" class="wave" alt="wave" />
        </div>
        <div class="widget-content">
            @forelse ($popular_posts as $post)
                <!-- post -->
                <div class="post post-list-sm circle">
                    <div class="thumb circle">
                        <span class="number">
                            {{ App\Models\Comments::where('blog_id',$post->getPost->id)->count() }}
                        </span>
                        <a href="{{ route('post_view',$post->getPost->id) }}">
                            <div class="inner">
                                <img src="{{ asset('uploads/blog_photos') }}/{{ $post->getPost->blog_photo }}"
                                    alt="post-title" />
                            </div>
                        </a>
                    </div>
                    <div class="details clearfix">
                        <h6 class="post-title my-0">
                            <a href="{{ route('post_view',$post->getPost->id) }}">
                                {{ $post->getPost->blog_title }}
                            </a>
                        </h6>
                        <ul class="meta list-inline mt-1 mb-0">
                            <li class="list-inline-item">{{ $post->getPost->created_at }}</li>
                        </ul>
                    </div>
                </div>

            @empty
                <h5>No post added yet</h5>
            @endforelse
        </div>
    </div>

    <!-- widget categories -->
    <div class="widget rounded">
        <div class="widget-header text-center">
            <h3 class="widget-title">Explore Topics</h3>
            <img src="{{ asset('frontend-assets') }}/images/wave.svg" class="wave" alt="wave" />
        </div>
        <div class="widget-content">
            <ul class="list">
                @forelse ($categories as $category)
                    @php
                        $post_count = App\Models\Posts::where('blog_category', $category->id)->count();
                    @endphp
                    <li><a
                            href="{{ route('category_post', [$category->id, $category->category_name]) }}">{{ $category->category_name }}</a><span>({{ $post_count }})</span>
                    </li>
                @empty
                @endforelse
            </ul>
        </div>

    </div>

    <!-- widget newsletter -->
    {{-- <div class="widget rounded">
        <div class="widget-header text-center">
            <h3 class="widget-title">Newsletter</h3>
            <img src="{{ asset('frontend-assets') }}/images/wave.svg" class="wave" alt="wave" />
        </div>
        <div class="widget-content">
            <span class="newsletter-headline text-center mb-3">Join 70,000 subscribers!</span>
            <form>
                <div class="mb-2">
                    <input class="form-control w-100 text-center" placeholder="Email address…" type="email">
                </div>
                <button class="btn btn-default btn-full" type="submit">Sign Up</button>
            </form>
            <span class="newsletter-privacy text-center mt-3">By signing up, you agree to our <a
                    href="#">Privacy
                    Policy</a></span>
        </div>
    </div> --}}

    <!-- widget post carousel -->
    <div class="widget rounded">
        <div class="widget-header text-center">
            <h3 class="widget-title">{{ $showcase_two->category_name }}</h3>
            <img src="{{ asset('frontend-assets') }}/images/wave.svg" class="wave" alt="wave" />
        </div>
        <div class="widget-content">
            <div class="post-carousel-widget">
                @forelse ($banner_two as $post)
                    <!-- post -->
                    <div class="post post-carousel">
                        <div class="thumb rounded">
                            <a href="{{ route('category_post',[$post->blog_category,$post->getCategory->category_name]) }}"
                                class="category-badge position-absolute">{{ $post->getCategory->category_name }}</a>
                            <a href="{{ route('post_view',$post->id) }}">
                                <div class="inner">
                                    <img src="{{ asset('uploads/blog_photos') }}/{{ $post->blog_photo }}"
                                        alt="post-title" />
                                </div>
                            </a>
                        </div>
                        <h5 class="post-title mb-0 mt-4"><a href="{{ route('post_view',$post->id) }}">{{ $post->blog_title }}</a></h5>
                        <ul class="meta list-inline mt-2 mb-0">
                            <li class="list-inline-item"><a href="#">{{ $post->getUser->name }}</a></li>
                            <li class="list-inline-item">{{ $post->created_at }}</li>
                        </ul>
                    </div>
                @empty
                @endforelse
            </div>
            <!-- carousel arrows -->
            <div class="slick-arrows-bot">
                <button type="button" data-role="none" class="carousel-botNav-prev slick-custom-buttons"
                    aria-label="Previous"><i class="icon-arrow-left"></i></button>
                <button type="button" data-role="none" class="carousel-botNav-next slick-custom-buttons"
                    aria-label="Next"><i class="icon-arrow-right"></i></button>
            </div>
        </div>
    </div>

    {{-- <!-- widget advertisement -->
    <div class="widget no-container rounded text-md-center">
        <span class="ads-title">- Sponsored Ad -</span>
        <a href="#" class="widget-ads">
            <img src="{{ asset('frontend-assets') }}/images/ads/ad-360.png" alt="Advertisement" />
        </a>
    </div> --}}

    <!-- widget tags -->
    <div class="widget rounded">
        <div class="widget-header text-center">
            <h3 class="widget-title">Tag Clouds</h3>
            <img src="{{ asset('frontend-assets') }}/images/wave.svg" class="wave" alt="wave" />
        </div>
        <div class="widget-content">
            <a href="{{ route('special_post','trending') }}" class="tag">#Trending</a>
            <a href="{{ route('special_post','feature') }}" class="tag">#Featured</a>
            <a href="{{ route('category_post',[$showcase_one->id,$showcase_one->category_name]) }}" class="tag">#{{ $showcase_one->category_name }}</a>
            <a href="{{ route('category_post',[$showcase_two->id,$showcase_two->category_name]) }}" class="tag">#{{ $showcase_two->category_name }}</a>
        </div>
    </div>

</div>
