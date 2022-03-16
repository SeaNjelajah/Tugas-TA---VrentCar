<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scroll-wrapper scrollbar-inner" style="position: relative;">
        <div class="scrollbar-inner scroll-content scroll-scrolly_visible" style="height: auto; margin-bottom: 0px; margin-right: 0px; max-height: 647px;">
            <!-- Brand -->
            <div class="sidenav-header  align-items-center">
                <a class="navbar-brand" href="{{ route('Home') }}" style="font-family:'Poppins', Arial, sans-serif; font-size:26px; font-weight:800; padding-top:34px !important;">VRENT<span style="color: #01d28e">CAR</span></a>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <!-- SideBarMenu -->

                        

                        <li class="nav-item">
                            <a class="nav-link {{ (Route::is('karyawan.dashboard.show')) ? 'active' : '' }}" href="{{ Route('karyawan.dashboard.show') }}">
                                <i class="ni ni-tv-2 text-primary"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>

                        

                    </ul>
                    
                    
                </div>
            </div>
        </div>
        <div class="scroll-element scroll-x scroll-scrolly_visible">
            <div class="scroll-element_outer">
                <div class="scroll-element_size"></div>
                <div class="scroll-element_track"></div>
                <div class="scroll-bar" style="width: 0px;">
                </div>
            </div>
        </div>
        <div class="scroll-element scroll-y scroll-scrolly_visible">
            <div class="scroll-element_outer">
                <div class="scroll-element_size"></div>
                <div class="scroll-element_track"></div>
                <div class="scroll-bar" style="height: 564px; top: 0px;"></div>
            </div>
        </div>
    </div>
</nav>