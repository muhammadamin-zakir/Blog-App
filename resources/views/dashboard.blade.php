<x-layout>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/css/style.css" rel="stylesheet">

    <title>@yield('title', 'Blogs')</title>

    <div id="main-content" class="blog-page mt-5">
        <div class="container">
            @if ($message = session('message'))
                <div class="alert alert-success">{{ $message }}</div>
            @endif
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 left-box">
                    @foreach ($blogs as $blog)
                        <div class="card single_post">
                            <div class="body">
                                <div class="img-post">
                                    <img class="d-block img-fluid img-width"
                                        src="{{ asset('storage/' . $blog->image) }}" alt="First slide">
                                </div>
                                <h3><a href="blog-details.html">{{ $blog->title }}</a></h3>
                                <p>{{ $blog->description }}</p>
                            </div>
                            <div class="footer">
                                <div class="actions">
                                    <a href="{{ route('blogs.show', ['id' => $blog->id]) }}"
                                        class="btn btn-outline-secondary">Continue
                                        Reading </a>
                                </div>
                                <ul class="stats">
                                    <li><a href="javascript:void(0);">General</a></li>
                                    <li><a href="javascript:void(0);" class="fa fa-heart">28</a></li>
                                    <li><a href="javascript:void(0);" class="fa fa-comment">128</a></li>
                                </ul>
                            </div>
                        </div>
                    @endforeach

                    {{ $blogs->links() }}
                </div>
                <div class="col-lg-4 col-md-12 right-box">
                    <div class="card">
                        <div class="header">
                            <h2>Categories</h2>
                        </div>
                        @include('components._filter-category', $blogs);
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>Latest Post</h2>
                        </div>
                        <div class="body widget popular-post">
                            <div class="row">
                                <div class="col-lg-12">
                                    @foreach ($allBlogs as $blog)
                                        <div class="single_post">
                                            <h4>{{ $blog->title }}</h4>
                                            <p class="m-b-0">{{ $blog->description }}</p>
                                            <div class="img-post">
                                                <img src="{{ asset('storage/' . $blog->image) }}" alt="Awesome Image">
                                                {{-- /images/post/post-1.jpg --}}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>Instagram Post</h2>
                        </div>
                        <div class="body widget">
                            <ul class="list-unstyled instagram-plugin m-b-0">
                                <li><a href="javascript:void(0);"><img class="instagram-image"
                                            src="/images/instagram-image.jpg" alt="image description"></a></li>
                                <li><a href="javascript:void(0);"><img class="instagram-image"
                                            src="/images/instagram-image.jpg" alt="image description"></a></li>
                                <li><a href="javascript:void(0);"><img class="instagram-image"
                                            src="/images/instagram-image.jpg" alt="image description"></a></li>
                                <li><a href="javascript:void(0);"><img class="instagram-image"
                                            src="/images/instagram-image.jpg" alt="image description"></a></li>
                                <li><a href="javascript:void(0);"><img class="instagram-image"
                                            src="/images/instagram-image.jpg" alt="image description"></a></li>
                                <li><a href="javascript:void(0);"><img class="instagram-image"
                                            src="/images/instagram-image.jpg" alt="image description"></a></li>
                                <li><a href="javascript:void(0);"><img class="instagram-image"
                                            src="/images/instagram-image.jpg" alt="image description"></a></li>
                                <li><a href="javascript:void(0);"><img class="instagram-image"
                                            src="/images/instagram-image.jpg" alt="image description"></a></li>
                                <li><a href="javascript:void(0);"><img class="instagram-image"
                                            src="/images/instagram-image.jpg" alt="image description"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>Email Newsletter <small>Get our products/news earlier than others, let’s get in
                                    touch.</small></h2>
                        </div>
                        <div class="body widget newsletter">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Enter Email">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="icon-paper-plane"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-layout>
