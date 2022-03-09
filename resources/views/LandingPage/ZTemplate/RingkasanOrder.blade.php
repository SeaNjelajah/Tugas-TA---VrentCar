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
        <div class="card">
            <div class="card header">

                

            </div>

            <div class="card-body">
                


                <a class="row px-4" href="#">
                    <div class="col-6">
                        <figure class="figure mx-auto mt-3">
                            <img src="{{ asset('images/bg_1.jpg') }}" class=" w-100 figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                        </figure>
                    </div>

                    <div class="col-6">
                        <div class="border w-100 p-4 rounded mb-2 d-flex mt-3">
                            <div class="icon mr-3">
                                <span class="icon-map-o"></span>
                            </div>
                          <p class="text-black"><span>Address:</span> Jl.Jagir Sidoresmo VI No.72, Kota Surabaya</p>
                        </div>

                        <div class="border w-100 p-4 rounded mb-2 d-flex">
                            <div class="icon mr-3">
                                <span class="icon-map-o"></span>
                            </div>
                          <p class="text-black"><span>Address:</span> Jl.Jagir Sidoresmo VI No.72, Kota Surabaya</p>
                        </div>

                    </div>

                   

                </a>

                <div class="row pl-0">
                    <span class="font-size-3 font-poppins-400 ml-3">asdsadsa</span>
                </div>
                <div class="container pl-4 mt-4 pb-4">
                    <div class="row mb-0">
                        <div class="col-auto">
                            <i class="fas fa-user font-size-2 pr-3"></i>
                            3
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-suitcase font-size-2 pr-3"></i>
                            4
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-car font-size-2 pr-3"></i>
                            <span class="font-poppins-400 text-muted">2004 atau setelahnya</span>
                        </div>

                    </div>
                </div>

            </div>

            <div class="card-body">
                <div class="row d-block px-2">

                    <div class="row mb-2 mt-1 w-100">
                        <span class="ml-auto font-poppins-400 font-size-2">Dengan Supir</span>
                    </div>

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
                                    <p>Rp. 1111111 </p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col d-flex">
                                    <p>Total Harga sewa ( 2 Hari)</p>
                                </div>
                                <div class="col">
                                    <p>Rp 12121</p>
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
                                    <p style="color: orangered">Rp 123213 </p>
                                    <input type="hidden" name="total" value="123213">
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="nama" class="col-form-label">Nama Lengkap:</label>
                        <input class="form-control" name="nama" value="">

                        <div class="invalid-feedback">

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="No_tlp" class="col-form-label">Nomer Telepon / Whatsapp:</label>
                        <input type="number" class="form-control" name="No_tlp" value="{{ old('No_tlp') }}">
                        <div class="invalid-feedback">

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="address_home" class="col-form-label">Alamat Tempat Tinggal:</label>
                        <textarea class="form-control" name="address_home">{{ old('address_home') }}</textarea>
                        <div class="invalid-feedback">

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="address_serah_terima" class="col-form-label">Alamat Serah Terima Mobil:</label>
                        <textarea class="form-control" name="address_serah_terima">{{ old('address_serah_terima') }}</textarea>
                        <div class="invalid-feedback">

                        </div>
                    </div>

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


                    <div class="form-group">
                        <label for="tipe_bayar">Lakukan Pembayaran Pada Salah Satu No.rekening dibawah:</label>
                        <select class="form-control" name="tipe_bayar">
                            <option value="BCA" selected="">Rekening BCA : 0777562792898</option>
                            <option value="Direct">Link Aja : 085784793034 (a/n Asfa Hani)</option>
                        </select>

                    </div>



                </div>

                <hr>
                <label for="catatan" class="col-form-label">Upload Bukti Pembayaran Anda (Struk/Screenshot Bukti Pembayaran)</label>
                <input class="form-control" type="file" name="GMB_Bukti" onchange="preview(this, '#buktibayar')">
                <div class="container-fluid mt-3 text-center">
                    <img alt="Bukti Bayar" src="assets/img/dataImg/NoImageA.png" id="buktibayar" class="img-fluid img-thumbnail">
                </div>



            </div>

        </div>
    </div>

    @include('LandingPage.ZTemplate.footer')

    @include('LandingPage.Script')

</body>

</html>