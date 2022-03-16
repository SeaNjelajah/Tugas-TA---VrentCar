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

    @endphp

    <div class="container my-5">

        @if ($order->status == "Dalam Persewaan")
        <div class="alert alert-success">
            Pesanan anda telah sepenuhnya diterima <i class="float-right fas fa-check"></i>
        </div>
        @endif

        <div class="card">
            

            <div class="card-body">
                


                <div class="row px-4">

                    <div class="col-6 text-black">
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

                    
                    <div class="col-6">
                        
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

                <div class="row px-4">
                    <div class="col">

                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3" style="color: blue;">
                                <i class="fs-20 fas fa-calendar"></i>
                            </div>
                            <p class="text-dark">
                              <span>Tanggal Mulai:</span><br>
                              {{ $order->tgl_akhir_sewa }}
                            </p>
                        </div>

                    </div>

                    <div class="col">

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

                    <div class="col">

                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3" style="color: blue;">
                                <i class="fs-20 fas fa-calendar fa-outline"></i>
                            </div>
                            <p class="text-dark">
                              <span>Tanggal Berakhir:</span><br>
                              {{ $order->tgl_akhir_sewa }}
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
                                <div class="col">
                                    <p>Rp {{ placeRp($order->total) }}</p>
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
        
        {{-- untuk rencana lain  --}}
        {{-- <div class="card mt-3">
            <div class="card-body">

                <div class="alert alert-danger">
                    Anda belum mengupload KTP anda <i class="float-right fas fa-ban"></i><br>
                    <form action="#" method="POST">
                        <input type="file" name="input_ktp" id="input_ktp"><button type="submit" class="btn btn-info float-right">Kirim</button>
                    </form>
                </div>

                <div class="alert alert-warning">
                    KTP anda sedang dalam proses vertifikasi <i class="float-right fas fa-gear"></i>
                </div>

                <div class="alert alert-success">
                    Persyaratan untuk KTP anda Selesai <i class="float-right fas fa-check"></i>
                </div>


            </div>


        </div> --}}

        <div class="card mt-3">
            <div class="card-body">                

                <hr>
`              
                @php

                try {
                    $bukti_bayar = $order->bukti_bayar()->first();
                } catch (\Throwable $th) {
                    $bukti_bayar = false;
                }
                
                @endphp

                @if (!$bukti_bayar)

                <div class="alert alert-warning">
                    Batas Pembayaran adalah {{ Carbon\Carbon::create($order->tgl_mulai_sewa)->add('hour', -8)->toDateTimeString(); }}, 8 Jam sebelum Waktu Mulai Sewa <i class="fas fa-exclamation float-right"></i>
                    <br>Setelah itu order dibatalkan secara Otomatis.
                </div>

                <div class="alert alert-danger">
                    <form action="{{ route('user.BuktiBayar.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="tipe_bayar">Lakukan Pembayaran Pada Salah Satu No.rekening dibawah:</label>
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
                    @if (!empty($bukti_bayar->terverifikasi))
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

        @if ($order->status == "Dalam Persewaan")
        <div class="alert alert-success mt-3">
            Pesanan anda telah sepenuhnya diterima <i class="float-right fas fa-check"></i>
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