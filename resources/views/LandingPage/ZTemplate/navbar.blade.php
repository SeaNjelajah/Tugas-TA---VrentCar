<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('Home') }}">Vrent<span>Car</span></a>
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        @if (Auth::check())
        <ul class="navbar-nav align-items-center ml-3  d-lg-none">
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="/assets/img/theme/team-4.jpg">
                        </span>
                        <div class="media-body  ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm font-weight-bold">{{ Auth::user()->name }}</span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right position-absolute">
                    <div class="dropdown-header">
                        <h6 class="m-0">Welcome!</h6>
                    </div>
                    <a href="#!" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>My profile</span>
                    </a>
                    <a href="#!" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>Settings</span>
                    </a>
                    <a href="#!" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>Activity</span>
                    </a>
                    <a href="#!" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>Support</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('Logout') }}" class="dropdown-item">
                        <i class="ni ni-user-run"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>
        @endif

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">

                <li class="nav-item {{ (Route::is('Home')) ? 'active' : '' }}"><a href="{{ Route('Home') }}" class="nav-link">Home</a></li>
                <li class="nav-item {{ (Route::is('About')) ? 'active' : '' }}"><a href="{{ Route('About') }}" class="nav-link">About</a></li>
                <li class="nav-item {{ (Route::is('Service')) ? 'active' : '' }}"><a href="{{ Route('Service') }}" class="nav-link">Services</a></li>

                <li class="nav-item {{ (Route::is('CarListPage')) ? 'active' : '' }}"><a href="{{ Route('CarListPage') }}" class="nav-link">Cars</a></li>
                <li class="nav-item {{ (Route::is('blog')) ? 'active' : '' }}"><a href="{{ Route('blog') }}" class="nav-link">Blog</a></li>
                <li class="nav-item {{ (Route::is('kontak')) ? 'active' : '' }}"><a href="{{ Route('kontak') }}" class="nav-link">Contact</a></li>
                @if (!Auth::check())
                <li class="nav-item {{ (Route::is('LoginView')) ? 'active' : '' }}"><a href="{{ Route('LoginView') }}" class="nav-link">Login</a></li>
                <li class="nav-item {{ (Route::is('RegisterView')) ? 'active' : '' }}"><a href="{{ Route('RegisterView') }}" class="nav-link">Register</a></li>
                @endif
            </ul>
            @if (Auth::check())
            <ul class="navbar-nav align-items-center ml-auto ml-md-0 d-none d-lg-block">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                            <span class="avatar avatar-sm rounded-circle">
                                <img alt="Image placeholder" src="/assets/img/theme/team-4.jpg">
                            </span>
                            <div class="media-body  ml-2  d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold">{{ Auth::user()->name }}</span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu  dropdown-menu-right ">
                        <div class="dropdown-header">
                            <h6 class="m-0">Welcome!</h6>
                        </div>
                        <a href="#!" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>My Dashboard</span>
                        </a>
                        <a href="#!" class="dropdown-item">
                            <i class="ni ni-settings-gear-65"></i>
                            <span>Settings</span>
                        </a>
                        <a href="#!" class="dropdown-item">
                            <i class="ni ni-calendar-grid-58"></i>
                            <span>Activity</span>
                        </a>
                        <a href="#!" class="dropdown-item">
                            <i class="ni ni-support-16"></i>
                            <span>Support</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('Logout') }}" class="dropdown-item">
                            <i class="ni ni-user-run"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
            @endif
        </div>
    </div>
</nav>