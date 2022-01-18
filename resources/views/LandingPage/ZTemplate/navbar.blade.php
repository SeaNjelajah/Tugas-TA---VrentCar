
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      <a class="navbar-brand" href="{{ route('Home') }}">Vrent<span>Car</span></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span> Menu
      </button>

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">
       
              <li class="nav-item {{ (Route::is('Home')) ? 'active' : '' }}"><a href="{{ Route('Home') }}" class="nav-link" >Home</a></li>
              <li class="nav-item {{ (Route::is('About')) ? 'active' : '' }}"><a href="{{ Route('About') }}" class="nav-link">About</a></li>
              <li class="nav-item {{ (Route::is('Service')) ? 'active' : '' }}"><a href="{{ Route('Service') }}" class="nav-link">Services</a></li>
       
              <li class="nav-item {{ (Route::is('CarListPage')) ? 'active' : '' }}"><a href="{{ Route('CarListPage') }}" class="nav-link">Cars</a></li>
              <li class="nav-item {{ (Route::is('blog')) ? 'active' : '' }}"><a href="{{ Route('blog') }}" class="nav-link">Blog</a></li>
              <li class="nav-item {{ (Route::is('kontak')) ? 'active' : '' }}"><a href="{{ Route('kontak') }}" class="nav-link" >Contact</a></li>

        </ul>
      </div>
    </div>
</nav>