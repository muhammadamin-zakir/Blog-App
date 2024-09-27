@extends('components.admin-layout')
@section('title', 'All Comments')
@section('content')
    <div class="col-md-10">
        <div class="card">
            <div class="card-header card-title">
                <div class="d-flex align-items-center">
                    <h2 class="mb-0">All Comments</h2>
                    <div class="ml-auto">
                        <a href="{{ route('blogs.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add
                            New Blog</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if ($message = session('message'))
                    <div class="alert alert-success">{{ $message }}</div>
                @endif
                <table class="table-striped table-hover table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Content</th>
                            <th scope="col">Blog Title</th>
                            <th scope="col">User</th>
                            <th scope="col">Date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $id => $comment)
                            <tr>
                                <th scope="row">{{ $id + 1 }}</th>
                                <td>{{ $comment->content }}</td>
                                <td>{{ $comment->blog->title ?? 'No Blog' }}</td>
                                <td>{{ $comment->user->name ?? 'Anonymous' }}</td>
                                <td>{{ $comment->created_at }}</td>
                                <td width="150">

                                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST"
                                        onsubmit="confirm('Are you sure?')" style="display:inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-circle btn-outline-danger"
                                            title="Delete"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav class="mt-4">
                    {{ $comments->links() }}
                </nav>
            </div>
        </div>
    </div>
@endsection
