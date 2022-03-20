<!DOCTYPE html>
<html lang="en">
  <head>
    <title>VrentCar - Persewaan mobil terbaik anda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    @include('LandingPage.Style')

  </head>
  <body>
    
	@include('LandingPage.ZTemplate.navbar')
    <!-- END nav -->
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('/images/bg_3.jpg');" data-stellar-background-ratio="0.5">
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
        
        <div class="row mx-auto mb-3">
          <a href="{{ route('CarListPage') }}" class="btn btn-lg d-inline btn-outline-primary ml-auto mr-1 {{ (empty($_GET['DenganSupir'])) ? 'active' : '' }} ">Dengan Supir</a>
          <a href="{{ route('CarListPage',  ['DenganSupir' => 'false']) }}" class="btn btn-lg d-inline btn-outline-primary mr-auto ml-1 {{ (!empty($_GET['DenganSupir']) && $_GET['DenganSupir'] == 'false') ? 'active' : '' }}">Tanpa Supir</a>
        </div>

    		<div class="row">


				@foreach ($mobil as $item)
          @if ($item->status != 'Tersedia') 
            @continue
          @endif
				
    			<div class="col-md-4">
    				<div class="car-wrap rounded ftco-animate">
    					<div class="img rounded d-flex align-items-end" style="background-image: url('{{ asset('/assets/img/cars/' . $item->gambar) }}');">
    					</div>
    					<div class="text">

    						<h2 class="mb-0">{{ $item->nama }}</h2>

    						<div class="d-flex mb-3">
	    						<span class="cat">{{ $item->merek()->first()->merek }}</span>
	    						<p class="price ml-auto">Rp. {{ placeRp ($item->harga) }} <span>/day</span></p>
    						</div>                

    						<form class="d-flex mb-0 d-block" method="POST" action="{{ Route('CarSinglePage') }}">
                  @csrf
                  <input type="hidden" name="id" value="{{ $item->id }}">

                  <input type="submit" class="w-100 btn btn-secondary mb-2" value="Details">

                </form>

                <form class="d-flex mb-0 d-block" method="GET" action="{{ Route('FormOrder') }}">
                  <input type="hidden" name="id" value="{{ $item->id }}">
                  <input type="submit" class="btn btn-primary w-100" value="Book now">
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
 
    @include('LandingPage.Script')
    
  </body>
</html>