<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>

<body>
    <section class="vh-100" style="background-color: #eee;">
        <div class="h-100 container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-lg-1 order-2">

                                    <p class="h1 fw-bold mx-md-4 mx-1 mb-5 mt-4 text-center">Sign up</p>

                                    <form action="{{ route('register') }}" method="POST" class="mx-md-4 mx-1">
                                        @csrf
                                        <div class="d-flex align-items-center mb-4 flex-row">
                                            <i class="fas fa-user fa-lg fa-fw me-3"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example1c"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    name="name" value="{{ old('name') }}" />
                                                <label class="form-label" for="form3Example1c">Your Name</label>
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center mb-4 flex-row">
                                            <i class="fas fa-envelope fa-lg fa-fw me-3"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <input type="email" id="form3Example3c"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" />
                                                <label class="form-label" for="form3Example3c">Your Email</label>
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-center mb-4 flex-row">
                                            <i class="fas fa-lock fa-lg fa-fw me-3"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4c"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" />
                                                <label class="form-label" for="form3Example4c">Password</label>
                                                @error('password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="d-flex align-items-center mb-4 flex-row">
                                            <i class="fas fa-key fa-lg fa-fw me-3"></i>
                                            <div data-mdb-input-init class="form-outline flex-fill mb-0">
                                                <input type="password" id="form3Example4cd" class="form-control"
                                                    name="password_confirmation" />
                                                <label class="form-label" for="form3Example4cd">Repeat your
                                                    password</label>
                                            </div>
                                        </div>

                                        <div class="form-check d-flex justify-content-center mb-5">
                                            <input class="form-check-input me-2" type="checkbox" value=""
                                                id="form2Example3c" />
                                            <label class="form-check-label" for="form2Example3">
                                                I agree all statements in <a href="#!">Terms of service</a>
                                            </label>
                                        </div>

                                        <div class="d-flex justify-content-center mb-lg-4 mx-4 mb-3">
                                            <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                                class="btn btn-primary btn-lg">Register</button>
                                        </div>
                                        <div class="text-muted py-4 text-center">
                                            Already have account?
                                            <a href="{{ route('login') }}"
                                                class="text-muted font-weight-bold text-decoration-none">Login</a>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-lg-2 order-1">
                                    <img src="/images/registerImage.png" class="img-fluid" alt="Sample image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
</body>

</html>
