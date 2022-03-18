<!DOCTYPE html>
<html>

<head>
    <title>VrentCar - Persewaan mobil terbaik anda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @include('LandingPage.Style')

</head>

<body>

    @include('LandingPage.ZTemplate.navbar')

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url(&quot;images/bg_3.jpg&quot;); height: 695px; background-position: 50% 0px;" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start" style="height: 695px;">
                <div class="col-md-9 ftco-animate pb-5 fadeInUp ftco-animated">
                    <p class="breadcrumbs"><span class="mr-2">
                            <a href="index.html">
                                Home <i class="ion-ios-arrow-forward"></i>
                            </a></span>
                        <span>Log in <i class="ion-ios-arrow-forward"></i></span>
                    </p>
                    <h1 class="mb-3 bread">Log in</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container-fluid pt-3 mt-4">

        <div class="card border-0 mb-0">

            @if (!empty($error))
            <div class="mx-5 alert alert-warning alert-dismissible fade show" role="alert">
                Invalid Email or Password!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            @if (session()->get('Created'))
                <div class="mx-5 alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('Created') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card-body px-lg-5 py-lg-5">


                <form role="form" action="{{ route('Login') }}" method="POST">
                    @csrf

                    <div class="form-group mb-3">
                        <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                            </div>
                            <input class="form-control" name="username" placeholder="Username" type="text" value="{{ old('username') }}">
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                            </div>
                            <input class="form-control" name="email" placeholder="Email" type="email" value="{{ old('email') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="input-group input-group-merge input-group-alternative">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                            </div>
                            <input class="form-control" name="password" placeholder="Password" type="password" value="{{ old('password') }}">
                        </div>
                    </div>

                    <div class="row mb-n3">

                        <div class="col text-left">
                            <div class="custom-control custom-control-alternative custom-checkbox">
                                <input class="custom-control-input" id="Remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="Remember">
                                    <span class="text-muted">Remember me</span>
                                </label>
                            </div>
                        </div>

                        <div class="col text-right">
                            <a class="btn btn-link" href="{{ route('RegisterView') }}">Don't have a account?</a>
                        </div>
                    </div>


                    <div class="text-center">
                        <button type="submit" class="btn btn-primary my-4 w-100">Log In</button>
                    </div>

                </form>


            </div>
        </div>

    </div>



    @include('LandingPage.ZTemplate.footer')

    @include('LandingPage.Script')


</body>

</html>