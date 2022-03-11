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
    <div class="container my-5">

        <div class="alert alert-success">
            Pesanan anda telah sepenuhnya diterima <i class="float-right fas fa-check"></i>
        </div>

        <div class="card">
            

            <div class="card-body">
                


                <div class="row px-4">

                    <div class="col-6 text-black">
                        <figure class="figure mx-auto mt-3">
                            <img src="{{ asset('images/bg_1.jpg') }}" class=" w-100 figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                        </figure>

                        <div class="row">
                            <span class="font-size-3 font-poppins-400 ml-3 fs-25">ROB</span>
                        </div>

                        <div class="row mb-0">
                            <div class="col-auto">
                                <i class="fas fa-user pr-3"></i>
                                3
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-suitcase pr-3"></i>
                                4
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-car pr-3"></i>
                                <span class="font-poppins-400 text-muted">2004 atau setelahnya</span>
                            </div>
    
                        </div>

                        <a type="button" class="btn btn-secondary w-100 mt-4">Detail</a>

                    </div>

                    
                    <div class="col-6">
                        
                        <div class="border w-100 p-4 rounded mb-2 d-flex mt-3">
                            <div class="icon mr-3" style="color: blue;">
                                <span class="icon-map-o"></span>
                            </div>

                            <p class="text-dark">
                            <span>Nama Penyewa:</span><br>
                            Adiwanto Sasta
                            </p>
                        </div>

                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3" style="color: blue;">
                                <span class="fs-25 icon-mobile-phone"></span>
                            </div>
                            <p class="text-dark">
                              <span>Nomor Telepon:</span><br>
                              +62 921 3333 1223
                            </p>
                        </div>

                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3" style="color: blue;">
                                <span class="icon-map-o"></span>
                            </div>
                            <p class="text-dark">
                              <span>Alamat Rumah:</span><br>
                              Jl.Jagir Sidoresmo VI No.72, Kota Surabaya
                            </p>
                        </div>

                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3" style="color: blue;">
                                <span class="icon-map-o"></span>
                            </div>
                            <p class="text-black">
                              <span>Alamat Serah-Terima:</span><br>
                              Jl.Jagir Sidoresmo VI No.72, Kota Surabaya
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
                                    <p>Rp. asdsadad </p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col d-flex">
                                    <p>Total Harga sewa ( Hari)</p>
                                </div>
                                <div class="col">
                                    <p>Rp 123213213</p>
                                </div>
                            </div>

                            <div id="hargaSopirP" class="row">
                                <div class="col">
                                    <p>Biaya Sopir</p>
                                </div>
                                <div id="hargaSopirC" class="col">
                                    <p>Rp 150.000</p>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col">
                                    <p style="color: #01d28e">Total Tagihan</p>
                                </div>
                                <div class="col">
                                    <p style="color: orangered">Rp 12.333 </p>
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

                <div class="form-group">
                    <label for="tipe_bayar">Lakukan Pembayaran Pada Salah Satu No.rekening dibawah:</label>
                    <select class="form-control" name="tipe_bayar">
                        <option value="BCA">Rekening BCA : 0777562792898</option>
                        <option value="Direct">Link Aja : 085784793034 (a/n Asfa Hani)</option>
                    </select>

                </div>

                <hr>
                <div class="alert alert-danger">
                    <label for="bukti_bayar" class="col-form-label">Upload Bukti Pembayaran Anda (Struk/Screenshot Bukti Pembayaran)</label>
                <input class="form-control"  type="file" name="GMB_Bukti" >
                </div>

                <div class="alert alert-warning">
                    Bukti bayar anda sedang dalam proses vertifikasi <i class="float-right fas fa-gear"></i>
                </div>

                <div class="alert alert-success">
                    Persyaratan untuk Bukti Bayar anda Selesai <i class="float-right fas fa-check"></i>
                </div>

            </div>

        </div>

        <div class="alert alert-success mt-3">
            Pesanan anda telah sepenuhnya diterima <i class="float-right fas fa-check"></i>
        </div>

    </div>

    @include('LandingPage.ZTemplate.footer')

    @include('LandingPage.Script')

</body>

</html>