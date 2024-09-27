<x-layout :hideFooter="true">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <title>@yield('title', 'Default Title')</title>


    <main class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="card">
                        <div class="list-group list-group-flush">
                            <a href="{{ route('admin.dashboard') }}"
                                class="list-group-item list-group-item-action {{ Route::currentRouteNamed('admin.dashboard') ? 'active' : '' }}">List
                                All
                                Blogs</span></a>
                            <a href="{{ route('admin.comments') }}"
                                class="list-group-item list-group-item-action {{ Route::currentRouteNamed('admin.comments') ? 'active' : '' }}">List
                                All
                                Comments</span></a>
                            <a href="{{ route('admin.users') }}"
                                class="list-group-item list-group-item-action {{ Route::currentRouteNamed('admin.users') ? 'active' : '' }}">List
                                All
                                Users</span></a>
                        </div>
                    </div>
                </div>

                @yield('content')

            </div>
        </div>
    </main>








    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</x-layout>
