<x-layout>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="/css/style.css" rel="stylesheet">

    <div id="main-content " class="blog-page" style="margin-top: 20px">
        <div class="container">
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 left-box">
                    <div class="card single_post">
                        <div class="body">
                            <div class="img-post">
                                <img class="d-block img-fluid" src="{{ asset('storage/' . $blog->image) }}"
                                    alt="First slide">
                            </div>
                            <h3>{{ $blog->title }}</h3>
                            <p>{{ $blog->content }}</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>Comments {{ $comments->total() }}</h2>
                        </div>
                        <div class="body">
                            <ul class="comment-reply list-unstyled">
                                @foreach ($comments as $comment)
                                    <li class="row clearfix">
                                        <div class="icon-box col-md-2 col-4"><img class="img-fluid img-thumbnail"
                                                src="https://bootdey.com/img/Content/avatar/avatar7.png"
                                                alt="Awesome Image">
                                        </div>
                                        <div class="text-box col-md-10 col-8 p-l-0 p-r0">
                                            <h5 class="m-b-0">{{ $comment->user->name }}</h5>
                                            <p>{{ $comment->content }}</p>
                                            <ul class="list-inline">
                                                <li><a
                                                        href="javascript:void(0);">{{ $comment->created_at->format('Y-m-d') }}</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </li>
                                @endforeach
                                <!-- Pagination Linkleri -->
                                <div class="pagination">
                                    {{ $comments->links() }}
                                </div>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>Leave a reply <small>Your email address will not be published</small></h2>
                        </div>
                        <div class="body">
                            <div class="comment-form">
                                @if (auth()->check())
                                    <form class="row clearfix" action="{{ route('comments.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                        <div class="col-sm-12 mt-4">
                                            <div class="form-group">
                                                <textarea rows="4" class="form-control no-resize" name="comment" placeholder="Please comment what you want..."></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-block btn-primary">Comment</button>
                                        </div>
                                    </form>
                                @else
                                    <div class="alert alert-warning mt-4">
                                        Please <a href="{{ route('login') }}">login</a> to leave a comment.
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 right-box">
                    <div class="card">
                        <div class="header">
                            <h2>Latest Post</h2>
                        </div>
                        <div class="body widget popular-post">
                            <div class="row">
                                <div class="col-lg-12">
                                    @foreach ($blogs as $blog)
                                        <div class="single_post">
                                            <p class="m-b-0">{{ $blog->title }}</p>
                                            <span>{{ $blog->created_at->format('Y-m-d') }}</span>
                                            <div class="img-post">
                                                <img src="{{ asset('storage/' . $blog->image) }}" alt="Awesome Image">
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
                                <li><a href="javascript:void(0);"><img
                                            src="https://www.bootdey.com/image/100x100/87CEFA/000000"
                                            alt="image description"></a></li>
                                <li><a href="javascript:void(0);"><img
                                            src="https://www.bootdey.com/image/100x100/87CEFA/000000"
                                            alt="image description"></a></li>
                                <li><a href="javascript:void(0);"><img
                                            src="https://www.bootdey.com/image/100x100/87CEFA/000000"
                                            alt="image description"></a></li>
                                <li><a href="javascript:void(0);"><img
                                            src="https://www.bootdey.com/image/100x100/87CEFA/000000"
                                            alt="image description"></a></li>
                                <li><a href="javascript:void(0);"><img
                                            src="https://www.bootdey.com/image/100x100/87CEFA/000000"
                                            alt="image description"></a></li>
                                <li><a href="javascript:void(0);"><img
                                            src="https://www.bootdey.com/image/100x100/87CEFA/000000"
                                            alt="image description"></a></li>
                                <li><a href="javascript:void(0);"><img
                                            src="https://www.bootdey.com/image/100x100/87CEFA/000000"
                                            alt="image description"></a></li>
                                <li><a href="javascript:void(0);"><img
                                            src="https://www.bootdey.com/image/100x100/87CEFA/000000"
                                            alt="image description"></a></li>
                                <li><a href="javascript:void(0);"><img
                                            src="https://www.bootdey.com/image/100x100/87CEFA/000000"
                                            alt="image description"></a></li>
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
