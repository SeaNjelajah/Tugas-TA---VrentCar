<!DOCTYPE html>
<html lang="en">
  <head>
    <title>VrentCar - Persewaan mobil terbaik anda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
	@include('LandingPage.ZTemplate.navbar')
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Cars <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Choose Your Car</h1>
          </div>
        </div>
      </div>
    </section>
		

		<section class="ftco-section bg-light">		
    	<div class="container">
    		<div class="row">


				@foreach ($data as $item)
				@if ($item->status == 'Tidak Tersedia') @continue @endif
				@php $tag_decode = collect(json_decode($item->tag_mb, 1)); @endphp								
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url(assets/img/dataImg/{{ $item->gmb_mb }});">
    					</div>
    					<div class="text">
    						<h2 class="mb-0"><a href="/car-single">{{ $item->nama_mb }}</a></h2>
    						<div class="d-flex mb-3">
	    						@if(!empty($tag_decode['Merek'])) <span class="cat">{{ $tag_decode['Merek'] }}</span> @endif
	    						<p class="price ml-auto">Rp. {{ placeRp ($item->harga_mb) }} <span>/day</span></p>
    						</div>                

    						<form class="d-flex mb-0 d-block" method="POST" action="{{ Route('CarSinglePage') }}">
                  @csrf
                  <input type="hidden" name="Id" value="{{ $item->id }}">
								  <a type="button" href="{{ route('FormOrder') }}" class="ml-auto btn btn-primary py-2 mr-2 w-50">Book now</a>
								  <input type="submit" class="w-50 mr-auto btn btn-secondary py-2" value="Details">								
                </form>

    					</div>
    				</div>
    			</div>
				@endforeach
    		    			
    		</div>
    		<div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>
                <li><a href="/form-order">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="/form-order">2</a></li>
                <li><a href="/form-order">3</a></li>
                <li><a href="/form-order">4</a></li>
                <li><a href="/form-order">5</a></li>
                <li><a href="/form-order">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
    	</div>
    </section>
    
    @include('LandingPage.ZTemplate.footer')
 


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>