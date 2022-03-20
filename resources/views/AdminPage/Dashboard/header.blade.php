<div class="header pb-6" style="background-color: #01d28e;">

    <div class="container-fluid">
        <div class="header-body">
            
            <!-- Card stats -->
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Pesanan Baru</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $PesananBaru }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                        <i class="far fa-clipboard"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-sm">
                               
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Dalam Persewaan</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $DalamPersewaan }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                        <i class="ni ni-chart-pie-35"></i>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Pesanan Selesai</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $PesananSelesai }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                        {{-- <i class="ni ni-money-coins"></i> --}}
                                        <i class="fas fa-check"></i>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                  <div class="card card-stats">
                    <!-- Card body -->
                    <div class="card-body">

                      <div class="row">
                        <div class="col">
                          <h5 class="card-title text-uppercase text-muted mb-0">Pendapatan Bulan ini</h5>
                          <span class="h2 font-weight-bold mb-0">Rp.{{ placeRp($Pendapatan) }}</span>
                        </div>
                        <div class="col-auto">
                          <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                            <i class="ni ni-money-coins"></i>
                          </div>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                </div>

            </div>


        </div>
    </div>

</div>