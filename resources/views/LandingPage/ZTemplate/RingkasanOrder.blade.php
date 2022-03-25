<!DOCTYPE html>
<html lang="en">

<head>
    <title>VrentCar - Persewaan mobil terbaik anda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    @include('LandingPage.Style')

</head>

<body>

    @include('LandingPage.ZTemplate.navbar2')
    <!-- END nav -->

    @php
    $mobil = $order->mobil()->first();

    $tipe_sewa = $mobil->tipe_sewa()->first()->tipe_sewa;
    $jenis_mobil = $mobil->jenis_mobil()->first()->jenis_mobil;
    $transmisi = $mobil->transmisi()->first()->nama_transmisi;
    $status_order = $order->status;
    @endphp

    <div class="container my-5">

        @if ($status_order == "Dalam Persewaan" )
        <div class="alert alert-success">
            Pesanan anda telah sepenuhnya diterima  <i class="float-right fas fa-check"></i>
        </div>
        @elseif ($status_order == "Selesai")
        <div class="alert alert-success">
            Pesanan ini telah Selesai Terima Kasih. 😊 telah menggunakan layanan kami <i class="float-right fas fa-check"></i>
        </div>
        @elseif ($status_order == "Dibatalkan")
        <div class="alert alert-success">
            Pesanan ini telah Dibatalan kerena alasan tertentu. 😔 Mohon Maaf Kerena Ketidaknyaman nya <i class="float-right fas fa-circle-xmark"></i>
        </div>
        @endif

        @if ($tipe_sewa == "Dengan Supir")
        @php
            $supir = $order->supir()->first() or false;   
        @endphp


            @if ($supir)
        <div class="alert alert-info">
            Informasi tentang Driver yang melayani anda <i class="float-right fas fa-info"></i>
        </div>

        <div class="card mb-5">
            

            <div class="card-body">
                


                <div class="row px-4">

                    <div class="col-12 col-lg-6 text-black">

                        <figure class="figure mx-auto mt-3">
                            @if ($supir->foto_diri)
                            <img src="{{ asset('assets/img/foto-diri/' . $supir->foto_diri) }}" class=" w-100 figure-img img-fluid rounded" alt="Driver Picture">
                            @else
                            <img src="{{ asset('assets/img/foto-diri/NoUserPic.png') }}" class=" w-100 figure-img img-fluid rounded" alt="Driver Picture">
                            @endif
                        </figure>

                        <div class="row">
                            @if ($supir->nama_lengkap)
                            <span class="font-size-3 font-poppins-400 ml-3 fs-25">{{ $supir->nama_lengkap }}</span>
                            @else
                            <span class="font-size-3 font-poppins-400 ml-3 fs-25">Mohon Maaf Nama Lengkap belum di isi</span>
                            @endif
                        </div>

                    </div>

                    
                    <div class="col-12 col-lg-6">
                        
                        <div class="border w-100 p-4 rounded mb-2 d-flex mt-3">
                            <div class="icon mr-3" style="color: blue;">
                                <span class="icon-map-o"></span>
                            </div>

                            <p class="text-dark">
                                @if ($supir->umur)
                                <span>Umur:</span><br>
                                {{ $supir->umur }}
                                @else
                                <span>Umur:</span><br>
                                Mohon Maaf Umur Supir Belum terdaftar
                                @endif
                            
                            </p>

                        </div>

                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3" style="color: blue;">
                                <span class="fs-25 icon-mobile-phone"></span>
                            </div>

                            <p class="text-dark">
                                @if ($supir->no_tlp)
                                <span>Nomor Telepon:</span><br>
                                {{ $supir->no_tlp }}
                                @else
                                <span>Nomor Telepon:</span><br>
                                Mohon Maaf Nomor Telepon Supir Belum terdaftar
                                @endif
                            
                            </p>
                            
                        </div>

                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3" style="color: blue;">
                                <span class="icon-map-o"></span>
                            </div>

                            <p class="text-dark">
                                @if ($supir->alamat_rumah)
                                <span>Alamat Rumah:</span><br>
                                {{ $supir->alamat_rumah }}
                                @else
                                <span>Alamat Rumah:</span><br>
                                Mohon Maaf Alamat Rumah Supir Belum terdaftar
                                @endif
                            
                            </p>

                        
                        </div>

                    </div>

                </div>


            </div>

        </div>

            @endif
        @endif

        <div class="card">
            

            <div class="card-body">
                


                <div class="row px-4">

                    <div class="col-12 col-lg-6 text-black">
                        <figure class="figure mx-auto mt-3">
                            <img src="{{ asset('assets/img/cars/' . $mobil->gambar) }}" class=" w-100 figure-img img-fluid rounded" alt="Car Picture">
                        </figure>

                        <div class="row">
                            <span class="font-size-3 font-poppins-400 ml-3 fs-25">{{ $mobil->nama }}</span>
                        </div>

                        <div class="row mb-0">
                            <div class="col-auto">
                                <i class="fas fa-user pr-3"></i>
                                {{ $mobil->jumlah_kursi }}
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-suitcase pr-3"></i>
                                {{ $mobil->kapasitas_koper }}
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-car pr-3"></i>
                                <span class="font-poppins-400 text-muted">{{ $mobil->tahun }} atau setelahnya</span>
                            </div>
    
                        </div>

                        <a type="button" data-toggle="modal" data-target="#infoOrder{{ $order->id }}" class="btn btn-secondary w-100 mt-4">Detail</a>

                    </div>

                    
                    <div class="col-12 col-lg-6">
                        
                        <div class="border w-100 p-4 rounded mb-2 d-flex mt-3">
                            <div class="icon mr-3" style="color: blue;">
                                <span class="icon-map-o"></span>
                            </div>

                            <p class="text-dark">
                            <span>Nama Penyewa:</span><br>
                            {{ $order->penyewa }}
                            </p>
                        </div>

                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3" style="color: blue;">
                                <span class="fs-25 icon-mobile-phone"></span>
                            </div>
                            <p class="text-dark">
                              <span>Nomor Telepon:</span><br>
                              {{ $order->No_tlp }}
                            </p>
                        </div>

                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3" style="color: blue;">
                                <span class="icon-map-o"></span>
                            </div>
                            <p class="text-dark">
                              <span>Alamat Rumah:</span><br>
                              {{ $order->alamat_rumah }}
                            </p>
                        </div>

                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3" style="color: blue;">
                                <span class="icon-map-o"></span>
                            </div>

                            @if ($tipe_sewa == "Dengan Supir")
                            <p class="text-black">
                              <span>Alamat Penjemputan:</span><br>
                              {{ $order->alamat_temu }}
                            </p>
                            @else
                            <p class="text-black">
                                <span>Alamat Serah-Terima:</span><br>
                                {{ $order->alamat_temu }}
                              </p>
                            @endif

                        </div>

                    </div>

                </div>

                <hr class="pl-3">

                <div class="row px-4">
                    <div class="col-12 mx-auto col-lg">

                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3" style="color: blue;">
                                <i class="fs-20 fas fa-calendar"></i>
                            </div>
                            <p class="text-dark">
                              <span>Tanggal Mulai:</span><br>
                              {{ ConvertDateToTextDateToIndonesia($order->tgl_mulai_sewa) }}
                            </p>
                        </div>

                    </div>

                    

                    <div class="col-12 mx-auto col-lg">

                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3" style="color: blue;">
                                <i class="fs-20 fas fa-calendar fa-outline"></i>
                            </div>
                            <p class="text-dark">
                              <span>Tanggal Berakhir:</span><br>
                              {{ ConvertDateToTextDateToIndonesia($order->tgl_akhir_sewa) }}
                            </p>
                        </div>

                    </div>

                    <div class="col-12">

                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3" style="color: blue;">
                                <i class="fs-20 fas fa-calendar"></i>
                            </div>
                            <p class="text-dark">
                              <span>Durasi Sewa:</span><br>
                              {{ $order->durasi_sewa }} Hari
                            </p>
                        </div>

                    </div>
                    

                    
                </div>


            </div>

        </div>

        <div class="card mt-3">

            <div class="card-body">
                <div class="row d-block px-2">  

                    <div class="form-group">
                        <label for="catatan" class="mx-auto d-block">
                            <span class="subheading" style="color: #01d28e">Ringkasan Order</span>
                        </label>
                        <div class="container content-center">
                            <div class="row">
                                <div class="col d-flex">
                                    <p>Harga sewa / Hari</p>
                                </div>
                                <div class="col">
                                    <p>Rp. {{ placeRp($mobil->harga) }} </p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col d-flex">                                    
                                    <p>Total Harga sewa ({{ $order->durasi_sewa }} Hari)</p>
                                </div>

                                @php
                                    $HargaTanpaSupir = $mobil->harga * $order->durasi_sewa;
                                @endphp

                                <div class="col">
                                    <p>Rp {{ placeRp($HargaTanpaSupir) }}</p>
                                </div>
                            </div>
                            
                            @if ($tipe_sewa == "Dengan Supir")
                            <div id="hargaSopirP" class="row">
                                <div class="col">
                                    <p>Biaya Sopir</p>
                                </div>
                                <div id="hargaSopirC" class="col">
                                    <p>Rp 150.000</p>
                                </div>
                            </div>
                            @endif

                            <div class="row">

                                <div class="col">
                                    <p style="color: #01d28e">Total Tagihan</p>
                                </div>
                                <div class="col">
                                    <p style="color: orangered">Rp {{ placeRp($order->total) }} </p>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
        
        @if ($tipe_sewa == "Tanpa Supir")

            @php
                $user = Auth::user();

                $punya_data_member = $user->member()->first() or false;
            @endphp

            <div class="card mt-3">

                <div class="card-body">

                    <span class="text-lg" style="color: orangered">Persyaratan yang Harus Dipenuhi!</span>
                    <hr>
                    
                    @php

                    if ($punya_data_member) {
                        
                        $member = $user->member()->first();
                        $ktp = $member->ktp()->first();
                        
                    } else {
                        $ktp = false;
                    }

                    
                    @endphp
                    @if (!$ktp || $ktp->terverifikasi == "Ditolak")

                    @if ($ktp)
                        @if($ktp->terverifikasi == "Ditolak")
                        <div class="alert alert-danger">
                            KTP Anda di Tolak Silakan ulangi Upload KTP Lagi
                        </div>
                        @endif
                    @endif

                    <div class="alert alert-danger">
                        <form action="{{ route('user.ktp.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="ktp" class="col-form-label">Upload KTP Anda (Screenshot Ktp)</label>
                                <input class="form-control" type="file" name="ktp" >
                            </div>

                            <button class="btn btn-danger w-100">Kirim</button>

                        </form>
                    </div>
                    @else
                        @if ($ktp->terverifikasi == "Diterima")
                        <div class="alert alert-success">
                            Persyaratan untuk untuk KTP anda Selesai <i class="float-right fas fa-check"></i>
                        </div>
                        @else
                        <div class="alert alert-warning">
                            KTP anda sedang dalam proses vertifikasi <i class="float-right fas fa-gear"></i>
                        </div>
                        @endif
                    @endif
                                 
    `              
                    @php


                    if ($punya_data_member) {
                        
                        $member = $user->member()->first();
                        $kartu_keluarga = $member->kartu_keluarga()->first();

                    } else {
                        $kartu_keluarga = false;
                    }
                        
                        
                    @endphp

                    @if (!$kartu_keluarga || $kartu_keluarga->terverifikasi == "Ditolak")

                    @if ($kartu_keluarga)
                        @if($kartu_keluarga->terverifikasi == "Ditolak")
                        <div class="alert alert-danger">
                            Kartu Keluarga Anda di Tolak Silakan ulangi Upload Kartu Keluarga Lagi
                        </div>
                        @endif
                    @endif

                    <div class="alert alert-danger">
                        <form action="{{ route('user.kartu.keluarga.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="kartu_keluarga" class="col-form-label">Upload Kartu Keluarga Anda (Screenshot Kartu Keluarga)</label>
                                <input class="form-control" type="file" name="kartu_keluarga" >
                            </div>

                            <button class="btn btn-danger w-100">Kirim</button>

                        </form>
                    </div>
                    @else

                        @if (!empty($kartu_keluarga->terverifikasi) and $kartu_keluarga->terverifikasi == "Diterima")
                        <div class="alert alert-success">
                            Persyaratan untuk untuk Kartu Keluarga anda Selesai <i class="float-right fas fa-check"></i>
                        </div>
                        @else
                        <div class="alert alert-warning">
                            Kartu Keluarga anda sedang dalam proses vertifikasi <i class="float-right fas fa-gear"></i>
                        </div>
                        @endif

                    @endif

    `              
                    @php

                    if ($punya_data_member) {
                        
                        $member = $user->member()->first();
                        
                        $sim_a = $member->sim_a()->first();
                        
                    } else {
                        $sim_a = false;
                    }
                        
                        
                    @endphp

                    @if (!$sim_a || $sim_a->terverifikasi == "Ditolak")
                    
                    @if ($sim_a)
                        @if($sim_a->terverifikasi == "Ditolak")
                        <div class="alert alert-danger">
                            SIM A Anda di Tolak Silakan ulangi Upload SIM A Lagi
                        </div>
                        @endif
                    @endif

                    <div class="alert alert-danger">
                        <form action="{{ route('user.simA.upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label for="sim_a" class="col-form-label">Upload SIM A Anda (Screenshot SIM A)</label>
                                <input class="form-control" type="file" name="sim_a" >
                            </div>

                            <button class="btn btn-danger w-100">Kirim</button>

                        </form>
                    </div>
                    @else

                        @if (!empty($sim_a->terverifikasi) and $sim_a->terverifikasi == "Diterima")
                        <div class="alert alert-success">
                            Persyaratan untuk untuk SIM A anda Selesai <i class="float-right fas fa-check"></i>
                        </div>
                        @else
                        <div class="alert alert-warning">
                            SIM A anda sedang dalam proses vertifikasi <i class="float-right fas fa-gear"></i>
                        </div>
                        @endif

                    @endif

                    <hr>

                </div>

            </div>

        
        @endif

        <div class="card mt-3">
            <div class="card-body">                

                
`              
                @php

                try {
                    $bukti_bayar = $order->bukti_bayar()->first();
                } catch (\Throwable $th) {
                    $bukti_bayar = false;
                }
                
                @endphp

                @if (!$bukti_bayar || $bukti_bayar->terverifikasi == "Ditolak")

                <div class="alert alert-warning">
                    Batas Pembayaran adalah {{ Carbon\Carbon::create($order->tgl_mulai_sewa)->add('hour', -8)->toDateTimeString(); }}, 8 Jam sebelum Waktu Mulai Sewa <i class="fas fa-exclamation float-right"></i>
                    <br>Setelah itu order dibatalkan secara Otomatis.
                </div>
                @if (!empty($bukti_bayar->terverifikasi))
                    @if($bukti_bayar->terverifikasi == "Ditolak")
                    <div class="alert alert-danger">
                        Bukti Anda di Tolak Silakan ulangi Upload Bukti Bayar Lagi
                    </div>
                    @endif
                @endif

                <div class="alert alert-danger">
                    <form action="{{ route('user.BuktiBayar.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="tipe_bayar">Lakukan Pembayaran Pada Salah Satu Cara pembayaran dibawah ini:</label>
                            <select class="form-control" name="tipe_bayar">
                                @foreach ($tipe_bayar as $tipe)
                                <option value="{{ $tipe->nama }}">{{ $tipe->deskripsi }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="bukti_bayar" class="col-form-label">Upload Bukti Pembayaran Anda (Struk/Screenshot Bukti Pembayaran)</label>
                            <input class="form-control" type="file" name="bukti_bayar" >
                            <input type="hidden" name="id" value="{{ $order->id }}">
                        </div>

                        <button class="btn btn-danger w-100">Kirim</button>

                    </form>
                </div>
                @else

                    @if ($bukti_bayar->terverifikasi == "Diterima")
                    <div class="alert alert-success">
                        Persyaratan untuk Bukti Bayar anda Selesai <i class="float-right fas fa-check"></i>
                    </div>
                    @else
                    <div class="alert alert-warning">
                        Bukti bayar anda sedang dalam proses vertifikasi <i class="float-right fas fa-gear"></i>
                    </div>
                    @endif

                @endif

            </div>

        </div>

        @if ($status_order == "Dalam Persewaan" )
        <div class="alert alert-success">
            Pesanan anda telah sepenuhnya diterima  <i class="float-right fas fa-check"></i>
        </div>
        @elseif ($status_order == "Selesai")
        <div class="alert alert-success">
            Pesanan ini telah Selesai Terima Kasih. 😊 telah menggunakan layanan kami <i class="float-right fas fa-check"></i>
        </div>
        @elseif ($status_order == "Dibatalkan")
        <div class="alert alert-success">
            Pesanan ini telah Dibatalan kerena alasan tertentu. 😔 Mohon Maaf Kerena Ketidaknyaman nya <i class="float-right fas fa-circle-xmark"></i>
        </div>
        @endif

    </div>

    {{-- Modal Info Order --}}
    <div class="modal fade" id="infoOrder{{ $order->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
          <div class="modal-content">
            
            <div class="modal-header">
              <h6 class="modal-title" id="modal-title-default">Info Order</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>

            <div class="modal-body">


                <table class="mt-3 table mx-auto table-hover text-left table-bordered shadow table">                  
                    <tbody class="text-center">
                        <tr>
                            <td class="display-3">Data Mobil</td>
                        </tr>
                      
                      <tr>
                        <td class="d-flex">
                          <span class="col-3 text-left">Nama Mobil</span>
                          <span class="col-1"> : </span>
                          <span class="col-8 ">{{ $mobil->nama }}</span>
                        </td>                                           
                      </tr>                                                                        
                      <tr>
                        <td class="d-flex">
                          <span class="col-3 text-left">Nomer Pelat Mobil</span>
                          <span class="col-1"> : </span>
                          <span class="col-8 ">{{ $mobil->pelat }}</span>
                        </td>                                           
                      </tr>
                      <tr>
                        <td class="d-flex">
                          <span class="col-3 text-left">Jumlah Kursi</span>
                          <span class="col-1"> : </span>
                          <span class="col-8 ">{{ $mobil->jumlah_kursi }}</span>
                        </td>                                           
                      </tr>
                      <tr>
                        <td class="d-flex">
                          <span class="col-3 text-left">Kapasitan Koper</span>
                          <span class="col-1"> : </span>
                          <span class="col-8 ">{{ $mobil->kapasitas_koper }}</span>
                        </td>                                           
                      </tr>
                      <tr>
                        <td class="d-flex">
                          <span class="col-3 text-left">Mill Age</span>
                          <span class="col-1"> : </span>
                          <span class="col-8 ">{{ $mobil->millage }}</span>
                        </td>                                           
                      </tr>
                      <tr>
                        <td class="d-flex">
                          <span class="col-3 text-left">Tahun Beli</span>
                          <span class="col-1"> : </span>
                          <span class="col-8 ">{{ $mobil->tahun }}</span>
                        </td>                                        
                      </tr>
                      
                      <tr>
                        <td class="d-flex">
                          <span class="col-3 text-left">Harga sewa Per-Hari</span>
                          <span class="col-1"> : </span>
                          <span class="col-8 ">Rp. {{ placeRp ($mobil->harga) }}</span>
                        </td>                                        
                      </tr>   
                                                                                                  
                    </tbody>                                    
                </table>
                
                

                <table class="mx-auto mt-3 table-bordered shadow table table-hover text-left">                  
                    <tbody class="text-center">
                        
                        <tr>
                          <td><span>Other</span></td>
                        </tr>
                        
                        <tr>
                          <td class="d-flex">
                              <span class="col-3 text-left">Jenis Mobil</span>
                              <span class="col-1"> : </span>
                              <span class="col-8">{{ $jenis_mobil }}</span>
                          </td>
                        </tr>

                        <tr>
                          <td class="d-flex">
                              <span class="col-3 text-left">Jenis Transmisi</span>
                              <span class="col-1"> : </span>
                              <span class="col-8">{{ $transmisi }}</span>
                          </td>
                        </tr>

                        <tr>
                          <td class="d-flex">
                            <span class="col-3 text-left">Tipe Sewa</span>
                            <span class="col-1"> : </span>
                            <span class="col-8 ">{{ $tipe_sewa }}</span>
                          </td>                                           
                        </tr>    
                                                                                                                                                                               
                    </tbody>                                    
                </table>
                

                <div class="col-12 mx-auto mt-2">
                    <strong class="display-5">Gambar Mobil</strong>
                    <img src="{{ asset('assets/img/cars/' . $mobil->gambar) }}" alt="...." class="img-thumbnail mb-4 align-self-center">
                </div>



            </div>
          </div>
        </div>
    </div>

    @include('LandingPage.ZTemplate.footer')

    @include('LandingPage.Script')


</body>

</html>