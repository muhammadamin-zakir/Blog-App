<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <div class="navbar-collapse collapse" id="navbarSupportedContent">
                <a class="navbar-brand mt-lg-0 mt-2" href="#">
                    <img src="/images/logo.png" height="30" alt="Logo" loading="lazy" />
                </a>
                <ul class="navbar-nav mb-lg-0 mb-2 me-auto">
                    <li class="nav-item">
                        <a href="/blogs" class="nav-link">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Projects</a>
                    </li>
                </ul>
            </div>


            <div class="d-flex align-items-center">

                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-secondary me-3">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-secondary me-3">Register</a>
                @else
                    <div class="dropdown">
                        <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#"
                            id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <span class="d-none d-md-inline" style="color:grey">{{ Auth::user()->name }}</span>
                            <img src="/images/userImage.png" style="margin-left:5px" class="rounded-circle ml-2"
                                height="25" alt="Black and White Portrait of a Man" loading="lazy" />
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                            <li>
                                <a class="dropdown-item" href="#">My profile</a>
                            </li>
                            <li>
                                @if (Auth::check() && Auth::user()->role === 'admin')
                                    <a class="dropdown-item" href="/blogs/admin_dashboard">Admin Dashboard</a>
                                @endif
                            </li>
                            <li>
                                {{-- <a class="dropdown-item" href="/dashboard">Logout</a> --}}
                                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endguest
            </div>
        </div>
    </nav>

    {{ $slot }}

    @if (!isset($hideFooter) || !$hideFooter)
        <div class="container my-5">
            <!-- Footer -->
            <footer class="text-center text-white" style="background-color: #3f51b5">
                <!-- Grid container -->
                <div class="container">
                    <!-- Section: Links -->
                    <section class="mt-5">
                        <!-- Grid row-->
                        <div class="row d-flex justify-content-center pt-5 text-center">
                            <!-- Grid column -->
                            <div class="col-md-2">
                                <h6 class="text-uppercase font-weight-bold">
                                    <a href="#!" class="text-white">About us</a>
                                </h6>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-2">
                                <h6 class="text-uppercase font-weight-bold">
                                    <a href="#!" class="text-white">Products</a>
                                </h6>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-2">
                                <h6 class="text-uppercase font-weight-bold">
                                    <a href="#!" class="text-white">Awards</a>
                                </h6>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-2">
                                <h6 class="text-uppercase font-weight-bold">
                                    <a href="#!" class="text-white">Help</a>
                                </h6>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-md-2">
                                <h6 class="text-uppercase font-weight-bold">
                                    <a href="#!" class="text-white">Contact</a>
                                </h6>
                            </div>
                            <!-- Grid column -->
                        </div>
                        <!-- Grid row-->
                    </section>
                    <!-- Section: Links -->

                    <hr class="my-5" />

                    <!-- Section: Text -->
                    <section class="mb-5">
                        <div class="row d-flex justify-content-center">
                            <div class="col-lg-8">
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt
                                    distinctio earum repellat quaerat voluptatibus placeat nam,
                                    commodi optio pariatur est quia magnam eum harum corrupti
                                    dicta, aliquam sequi voluptate quas.
                                </p>
                            </div>
                        </div>
                    </section>
                    <!-- Section: Text -->

                    <!-- Section: Social -->
                    <section class="mb-5 text-center">
                        <a href="" class="me-4 text-white">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="" class="me-4 text-white">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="" class="me-4 text-white">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="" class="me-4 text-white">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="" class="me-4 text-white">
                            <i class="fab fa-linkedin"></i>
                        </a>
                        <a href="" class="me-4 text-white">
                            <i class="fab fa-github"></i>
                        </a>
                    </section>
                    <!-- Section: Social -->
                </div>
                <!-- Grid container -->

                <!-- Copyright -->
                <div class="p-3 text-center" style="background-color: rgba(0, 0, 0, 0.2)">
                    © 2020 Copyright:
                    <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
                </div>
                <!-- Copyright -->
            </footer>
            <!-- Footer -->
        </div>
        <!-- End of .container -->
    @endif




    <script src="/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.0/mdb.min.js"></script>
    <script type="module">
        import {
            Dropdown,
            Collapse,
            initMDB
        } from "mdb-ui-kit";

        initMDB({
            Dropdown,
            Collapse
        });
    </script>
</body>

</html>
