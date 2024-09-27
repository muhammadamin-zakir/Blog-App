@extends('components.admin-layout')
@section('title', 'All Users')
@section('content')
    <div class="col-md-10">
        <div class="card">
            <div class="card-header card-title">
                <div class="d-flex align-items-center">
                    <h2 class="mb-0">All Users</h2>
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
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $id => $user)
                            <tr>
                                <th scope="row">{{ $id + 1 }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ ucfirst($user->role) }}</td>
                                <td width="150">
                                    <!-- Edit User -->
                                    <a href="{{ route('users.edit', ['id' => $user->id]) }}"
                                        class="btn btn-sm btn-circle btn-outline-secondary" title="Edit">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <!-- Delete User -->
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure?')" style="display:inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-circle btn-outline-danger"
                                            title="Delete">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <nav class="mt-4">
                    {{ $users->links() }}
                </nav>
            </div>
        </div>
    </div>
@endsection
