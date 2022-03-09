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
    
    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
          <div class="col-md-9 ftco-animate pb-5">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Form Order <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">Form Order</h1>
          </div>
        </div>
      </div>
    </section>
	{{-- konten --}}
	<section class="ftco-section p-1 mt-5">
        <div class="container">
            <div class="row justify-content-center mb-5">
            <div class="col-md-7 text-center heading-section ftco-animate">
              <span class="subheading">Form Booking</span>
            <h2 class="mb-1">Lengkapi Data Diri Anda</h2>
            </div>
            </div>
        </div>
    </section>

    {{-- muncul mobil yang dipilih --}}
    @php
    $tag = json_decode ($data->tag_mb, 1);
    @endphp

    <section class="ftco-section ftco-car-details p-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="car-details">
                        <div class="img rounded" style="background-image: url({{ asset('assets/img/dataImg/' . $data->gmb_mb) }});"></div>
                        <div class="text text-center">
                            @if (!empty($tag['Merek'])) <span class="subheading">{{ $tag['Merek'] }}</span> @endif
                            <h2>{{ $data->nama_mb }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md d-flex align-self-stretch ftco-animate">
              <div class="media block-6 services">
                <div class="media-body py-md-4">
                    <div class="d-flex mb-3 align-items-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-dashboard"></span></div>
                        <div class="text">
                          <h3 class="heading mb-0 pl-3">
                              Mileage
                              <span>{{ $data->millage }}</span>
                          </h3>
                      </div>
                  </div>
                </div>
              </div>      
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
              <div class="media block-6 services">
                <div class="media-body py-md-4">
                    <div class="d-flex mb-3 align-items-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-pistons"></span></div>
                        <div class="text">
                          <h3 class="heading mb-0 pl-3">
                              Transmission
                              <span>Manual</span>
                          </h3>
                      </div>
                  </div>
                </div>
              </div>      
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
              <div class="media block-6 services">
                <div class="media-body py-md-4">
                    <div class="d-flex mb-3 align-items-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car-seat"></span></div>
                        <div class="text">
                          <h3 class="heading mb-0 pl-3">
                              Seats
                              <span>{{ $data->jml_tp_d }} Adults</span>
                          </h3>
                      </div>
                  </div>
                </div>
              </div>      
            </div>
            <div class="col-md d-flex align-self-stretch ftco-animate">
              <div class="media block-6 services">
                <div class="media-body py-md-4">
                    <div class="d-flex mb-3 align-items-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-backpack"></span></div>
                        <div class="text">
                          <h3 class="heading mb-0 pl-3">
                              Luggage
                              <span>{{ $data->bagasi }} Bags</span>
                          </h3>
                      </div>
                  </div>
                </div>
              </div>      
            </div>
            
            </div>
            <div class="row">
                <div class="col-md-12 pills">
                          <div class="bd-example bd-example-tabs">
                              <div class="d-flex justify-content-center">
                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  
                                  
                                  <li class="nav-item">
                                    <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Description</a>
                                  </li>
                                  
                                </ul>
                              </div>
  
                            <div class="tab-content" id="pills-tabContent">
                              
  
                              <div class="tab-pane fade show active" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
                                <p>{{ $data->desc_mb }}</p>
                                
                              </div>
  
                              
                            </div>
                          </div>
                </div>
                  </div>
        </div>
      </section>
      {{-- akhir data mobil --}}
    
      <form class="mb-5">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="catatan" class="mx-auto d-block"><span class="subheading" style="color: #01d28e">Harga Sewa</span></label>
                            
                            <div class="container content-center">
                                <div class="row">
                                    <div class="col">
                                        <p>Harga sewa Perhari</p>
                                    </div>
                                    <div class="col">
                                        <p style="color: orangered">Rp 250.000</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p>Biaya Sopir (Jika ada)</p>
                                    </div>
                                    <div class="col">
                                        <p>Rp 150.000</p>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                        <div class="form-group">
                        <label for="nama-customer" class="col-form-label">Nama Lengkap:</label>
                        <input type="text" class="form-control" id="nama-customer" />
                        </div>
                        <div class="form-group">
                        <label for="nomer" class="col-form-label">Nomer Telepon / Whatsapp:</label>
                        <input type="text" class="form-control" id="nomer" />
                        </div>

                        <div class="row w-100 pl-3">

                          <div class="form-group w-75 pr-2">
                            <label for="tanggal_sewa" class="col-form-label">Tanggal Mulai Sewa:</label>
                            <input type="date" name="tanggal_sewa" class="form-control" id="tanggal_sewa" />
                          </div>

                          <div class="form-group w-25">

                            <label for="hari_sewa" class="col-form-label">Durasi Sewa:</label>
  
                            <div class="input-group">
                              <input type="number" name="hari_sewa" class="form-control" id="hari_sewa" />
                              <div class="input-group-append">
                                <span class="input-group-text font-poppins-400">Hari</span>
                              </div>
                            </div>
  
                          </div>



                        </div>
                        

                        
                        
                        <div class="form-group">
                        <label for="serah-terima" class="col-form-label">Alamat Tempat Tinggal:</label>
                        <textarea class="form-control" id="serah-terima" placeholder="Isi alamat lengkap serah terima mobil"></textarea>
                        </div>
                        <div class="form-group">
                        <label for="catatan" class="col-form-label">Alamat Serah Terima Mobil:</label>
                        <textarea
                            class="form-control"
                            id="catatan"
                            placeholder="Jika sama dengan alamat tempat tinggal, boleh tidak di isi
                        "
                        ></textarea>
                        </div>
                        <div class="form-group">
                            <label for="catatan" class="mx-auto d-block"><span class="subheading" style="color: #01d28e">Ringkasan Order</span></label>
                            {{-- <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <img src="/images/car-2.jpg" alt="car" style="max-width: 300px" class="rounded mx-auto d-block">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <img src="/images/car-2.jpg" alt="car" style="max-width: 300px" class="rounded mx-auto d-block">
                                    </div>
                                </div>
                            </div> --}}

                            {{-- ini sebagai contoh cak, iki aku gk eroh dinamis no e --}}
                            <div class="container content-center">
                                <div class="row">
                                    <div class="col">
                                        <p>Total Harga sewa (4 Hari)</p>
                                    </div>
                                    <div class="col">
                                        <p>Rp 1.000.000</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p>Biaya Sopir</p>
                                    </div>
                                    <div class="col">
                                        <p>Rp 150.000</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p style="color: #01d28e">Total Tagihan</p>
                                    </div>
                                    <div class="col">
                                        <p style="color: orangered">Rp 1.150.000</p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label for="catatan" class="col-form-label">Lakukan Pembayaran Pada Salah Satu No.rekening dibawah:</label>
                            <h3>Rekening BCA :</h3>
                            <h5>0777562792898 (a/n Agus Wisnu)</h5>
                            <h3>Link Aja :</h3>
                            <h5>085784793034 (a/n Asfa Hani)</h5>  
                        </div>
                    </form>
                    <hr>
                    <label for="catatan" class="col-form-label">Upload Bukti Pembayaran Anda (Struk/Screenshot Bukti Pembayaran)</label>
                    <input type="file" name="" id="">
                </div>
                
            </div>
            <section class="mt-3">
            <a href="{{ route('RingkasanOrder') }}" type="button" class="btn btn-primary btn-lg btn-block" >Selanjutnya</a>
            </section>
        </div>
      </form>

	{{-- akhir konten --}}
	{{-- footer --}}
    @include('LandingPage.ZTemplate.footer')
	{{-- akhir footer --}}

  @include('LandingPage.Script')
    
  </body>
</html>