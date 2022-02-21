<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>Login | Argon Dashboard - Free Dashboard for Bootstrap 4</title>
    <!-- Favicon -->
    <link rel="icon" href="assets/img/brand/favicon.png" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <!-- Page plugins -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
    <!-- sweetAlert2 -->
    <link rel="stylesheet" href="assets/ownplug/css/ownStyle.css" type="text/css">
  </head>

  <body>
    
    <div class="container-fluid pt-3">

      <div class="card border-0 mb-0">
        
        <div class="card-body px-lg-5 py-lg-5">

          <div class="text-center text-muted mb-4">
            <span class="font-size-3 font-poppins-400">Login</span>
          </div>

          <form role="form" action="{{ route('login') }}" method="POST">
            @csrf
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
                <a class="btn btn-link" href="{{ route('registerView') }}">Don't have account?</a>
              </div>
            </div>
            

            <div class="text-center">
              <button type="submit" class="btn btn-primary my-4 w-100">Log In</button>
            </div>

          </form>

          
        </div>
      </div>
      
    </div>



    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/js-cookie/js.cookie.js"></script>
    <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
    <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
    <!-- Optional JS -->
    <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
    <!-- Argon JS -->
    <script src="assets/js/argon.js?v=1.2.0"></script>
    <!-- SweetAlert2 -->
    <script src="assets/ownplug/sweetalert2/SweetAlert2.js"></script>
    <!-- DatePicker-->
    <script src="assets/ownplug/js/bootstrap-datepicker.min.js"></script>


  </body>

</html>




