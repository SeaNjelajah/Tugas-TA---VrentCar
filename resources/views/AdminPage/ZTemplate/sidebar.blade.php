<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scroll-wrapper scrollbar-inner" style="position: relative;"><div class="scrollbar-inner scroll-content scroll-scrolly_visible" style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 647px;">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="javascript:void(0)">
          <img src="assets/img/brand/blue.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <!-- SideBarMenu -->

            <li class="nav-item d-xl-none">
              <input type="button" value="Close" class="mx-auto d-block btn-danger btn sidenav-toggler sidenav-toggler-dark active" data-action="sidenav-pin" data-target="#sidenav-main" style="width: 85%">
            </li>

            <li class="nav-item">
              <a class="nav-link {{ (Route::is('Dashboard')) ? 'active' : '' }}" href="{{ Route('Dashboard') }}">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link {{ (Route::is('ArmadaMobil')) ? 'active' : '' }}" href="{{ Route('ArmadaMobil') }}">
                <i class="fa fa-car text-red"></i>
                <span class="nav-link-text">Armada Mobil</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link {{ (Route::is('Persewaan')) ? 'active' : '' }}" href="{{ Route('Persewaan') }}">
                <i class="ni ni-chart-bar-32 text-purple"></i>
                <span class="nav-link-text">Persewaan</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link {{ (Route::is('Transaksi')) ? 'active' : '' }}" href="{{ Route('Transaksi') }}">
                <i class="fa fa-hammer text-yellow"></i>
                <span class="nav-link-text">Build</span>
              </a>
            </li>

            

            <!-- /SideBarMenu -->

          </ul>
          <!-- Divider -->
          <hr class="my-3">
          <!-- Heading -->
          <h6 class="navbar-heading p-0 text-muted">
            <span class="docs-normal">Other Tools</span>
          </h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">

            <li class="nav-item ">
              <a class="nav-link {{ (Route::is('TagManage')) ? 'active' : '' }}" href="{{ Route('TagManage') }}">
                <i class="ni ni-tag"></i>
                <span class="nav-link-text">Tag Manager</span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link {{ (Route::is('SupirManager')) ? 'active' : '' }}" href="{{ Route('SupirManager') }}"">
                <i class="ni ni-circle-08 text-green"></i>
                <span class="nav-link-text">Sopir Manager</span>
              </a>
            </li>

          </ul>
        </div>
      </div>
    </div><div class="scroll-element scroll-x scroll-scrolly_visible"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar" style="width: 0px;"></div></div></div><div class="scroll-element scroll-y scroll-scrolly_visible"><div class="scroll-element_outer"><div class="scroll-element_size"></div><div class="scroll-element_track"></div><div class="scroll-bar" style="height: 564px; top: 0px;"></div></div></div></div>
</nav>