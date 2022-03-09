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

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{ asset('images/bg_3.jpg') }}); height: 695px; background-position: 50% 0px;" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
          <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start" style="height: 695px;">
              <div class="col-md-9 ftco-animate pb-5 fadeInUp ftco-animated">
                  <p class="breadcrumbs"><span class="mr-2">
                      <a href="index.html">
                          Home <i class="ion-ios-arrow-forward"></i>
                      </a></span>
                      <span>Register<i class="ion-ios-arrow-forward"></i></span>
                  </p>
                  <h1 class="mb-3 bread">Register</h1>
              </div>
          </div>
      </div>
    </section>
    
    <div class="container-fluid pt-3 h-100 align-middle">

      <div class="card border-0 mb-0">
        
        <div class="card-body px-lg-5 py-lg-5 mt-3">
          

          <form role="form">

            <div class="form-group mb-3">
              <div class="input-group input-group-merge input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                </div>
                <input class="form-control" name="username" placeholder="Username" type="text">
              </div>
            </div>

            <div class="form-group mb-3">
              <div class="input-group input-group-merge input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                </div>
                <input class="form-control" name="email" placeholder="Email" type="email">
              </div>
            </div>

            <div class="form-group">
              <div class="input-group input-group-merge input-group-alternative">
                <div class="input-group-prepend">
                  <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                </div>
                <input class="form-control" name="password" placeholder="Password" type="password">
              </div>
            </div>

            <div class="row mb-n3">

              <div class="col text-left">
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id="Remember" type="checkbox" name="remember">
                  <label class="custom-control-label" for="Remember">
                    <span class="text-muted">Remember me</span>
                  </label>
                </div>
              </div>

              <div class="col text-right">
                <a class="btn btn-link" href="{{ route('LoginView') }}">Already have a account? Log in then.</a>
              </div>

            </div>

            <div class="text-center">
              <button type="button" class="btn btn-primary my-4 w-100">Register</button>
            </div>

          </form>

        </div>
      </div>
      
    </div>


    @include('LandingPage.ZTemplate.footer')

    @include('LandingPage.Script')


  </body>

</html>  
         