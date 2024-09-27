@extends('components.admin-layout')

@section('title', 'All Blogs')
@section('content')
    <div class="col-md-10">
        <div class="card">
            <div class="card-header card-title">
                <div class="d-flex align-items-center">
                    <h2 class="mb-0">All Blogs</h2>
                    <div class="ml-auto">
                        <a href="{{ route('blogs.create') }}" class="btn btn-success"><i class="fa fa-plus-circle"></i>
                            Add
                            New Blog</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if ($message = session('message'))
                    <div class="alert alert-success">{{ $message }}</div>
                @endif
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <form method="GET">
                            <div class="row">
                                <div class="col">
                                    <select class="custom-select" name="category_id" id="search-select"
                                        onchange="this.form.submit()">
                                        <option value="" selected>All Categories</option>

                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if ($category->id == request()->query('category_id')) selected @endif>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" value="{{ request()->query('search') }}"
                                            class="form-control" id="search-input" placeholder="Search..."
                                            aria-label="Search..." aria-describedby="button-addon2">
                                        <div class="input-group-append">
                                            @if (request()->query('search') || request()->query('company_id'))
                                                <button class="btn btn-outline-secondary" type="button"
                                                    onclick="document.getElementById('search-input').value='',
                                                                document.getElementById('search-select').selectedIndex='',
                                                                this.form.submit()">
                                                    <i class="fa fa-refresh"></i>
                                                </button>
                                            @endif
                                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table-striped table-hover table">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Date</th>
                            <th scope="col">active</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($blogs as $id => $blog)
                            <tr>
                                <td>{{ $blog->title }}</td>
                                <td>{{ $blog->description }}</td>
                                <td>{{ $blog->category->name }}</td>
                                <td>{{ $blog->created_at->format('Y-m-d') }}</td>
                                <td style="color: {{ $blog->is_active ? 'green' : 'red' }};">
                                    {{ $blog->is_active ? 'True' : 'False' }}</td>

                                <td width="150">
                                    <a href="{{ route('blogs.show', ['id' => $blog->id]) }}"
                                        class="btn btn-sm btn-circle btn-outline-info" title="Show"><i
                                            class="fa fa-eye"></i></a>
                                    <a href="{{ route('blogs.edit', ['id' => $blog->id]) }}"
                                        class="btn btn-sm btn-circle btn-outline-secondary" title="Edit"><i
                                            class="fa fa-edit"></i></a>
                                    <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST"
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
                    {{ $blogs->links() }}
                </nav>
            </div>
        </div>
    </div>
@endsection
