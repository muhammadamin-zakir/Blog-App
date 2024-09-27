 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Document</title>
     <link href="/bootstrap-5.3.3-dist/css/bootstrap.css" rel="stylesheet">
     <link href="/css/login.css" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

 </head>

 <body>
     <section class="vh-100">
         <div class="container-fluid h-custom">
             <div class="row d-flex justify-content-center align-items-center h-100">
                 <div class="col-md-9 col-lg-6 col-xl-5">
                     <img src="/images/loginImage.png" class="img-fluid" alt="Sample image">
                 </div>
                 <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                     <form action="{{ route('login') }}" method="POST">
                         @csrf
                         <div
                             class="d-flex align-items-center justify-content-center justify-content-lg-start flex-row">
                             <p class="lead fw-normal mb-0 me-3">Sign in with</p>
                             <button type="button" data-mdb-button-init data-mdb-ripple-init
                                 class="btn btn-primary btn-floating mx-1">
                                 <i class="fab fa-facebook-f"></i>
                             </button>

                             <button type="button" data-mdb-button-init data-mdb-ripple-init
                                 class="btn btn-primary btn-floating mx-1">
                                 <i class="fab fa-twitter"></i>
                             </button>

                             <button type="button" data-mdb-button-init data-mdb-ripple-init
                                 class="btn btn-primary btn-floating mx-1">
                                 <i class="fab fa-linkedin-in"></i>
                             </button>
                         </div>

                         <div class="divider d-flex align-items-center my-4">
                             <p class="fw-bold mx-3 mb-0 text-center">Or</p>
                         </div>

                         <!-- Email input -->
                         <div data-mdb-input-init class="form-outline mb-4">
                             <label class="form-label" for="form3Example3">Email</label>
                             <input type="email" id="form3Example3"
                                 class="form-control form-control-lg @error('email') is-invalid @enderror"
                                 name="email" value="{{ old('email') }}" placeholder="Enter a valid email address" />
                             @error('email')
                                 <div class="invalid-feedback">{{ $message }}</div>
                             @enderror
                         </div>

                         <!-- Password input -->
                         <div data-mdb-input-init class="form-outline mb-3">
                             <label class="form-label" for="form3Example4">Password</label>
                             <input type="password" id="form3Example4"
                                 class="form-control form-control-lg @error('password') is-invalid @enderror"
                                 name="password" placeholder="Enter password" />
                             @error('password')
                                 <div class="invalid-feedback">{{ $message }}</div>
                             @enderror
                         </div>

                         <div class="d-flex justify-content-between align-items-center">
                             <!-- Checkbox -->
                             <div class="form-check mb-0">
                                 <input class="form-check-input me-2" type="checkbox" name="remember" value="true"
                                     id="form2Example3" />
                                 <label class="form-check-label" for="form2Example3">
                                     Remember me
                                 </label>
                             </div>
                             <a href="#!" class="text-body">Forgot password?</a>
                         </div>

                         <div class="text-lg-start mt-4 pt-2 text-center">
                             <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                 class="btn btn-primary btn-lg"
                                 style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                             <p class="small fw-bold mb-0 mt-2 pt-1">Don't have an account? <a
                                     href="{{ route('register') }}" class="link-danger">Register</a></p>
                         </div>

                     </form>
                 </div>
             </div>
         </div>
         <div
             class="d-flex flex-column flex-md-row text-md-start justify-content-between px-xl-5 bg-primary px-4 py-4 text-center">
             <!-- Copyright -->
             <div class="mb-md-0 mb-3 text-white">
                 Copyright © 2020. All rights reserved.
             </div>
             <!-- Copyright -->

             <!-- Right -->
             <div>
                 <a href="#!" class="me-4 text-white">
                     <i class="fab fa-facebook-f"></i>
                 </a>
                 <a href="#!" class="me-4 text-white">
                     <i class="fab fa-twitter"></i>
                 </a>
                 <a href="#!" class="me-4 text-white">
                     <i class="fab fa-google"></i>
                 </a>
                 <a href="#!" class="text-white">
                     <i class="fab fa-linkedin-in"></i>
                 </a>
             </div>
             <!-- Right -->
         </div>
     </section>

     <script src="/bootstrap-5.3.3-dist/js/bootstrap.js"></script>
 </body>

 </html>
