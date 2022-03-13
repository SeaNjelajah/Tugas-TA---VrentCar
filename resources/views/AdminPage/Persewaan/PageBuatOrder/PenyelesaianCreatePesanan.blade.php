<div class="container-fluid mt--1">
    <form id="formPesanan" action="" method="POST" enctype="multipart/form-data">
        <div class="card text-left">

            <div class="card-body">
                <div class="row d-block px-2">
                    <div class="form-group">
                        <label for="catatan" class="mx-auto d-block"><span class="subheading" style="color: #01d28e">Harga Sewa</span></label>

                        <div class="container content-center">

                            <div class="row">
                                <div class="col">
                                    <p>Harga sewa Perhari</p>
                                </div>
                                <div class="col">
                                    <p id="hargaPreview" style="color: orangered">
                                          
                                    </p>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="nama-customer" class="col-form-label">Nama Lengkap:</label>
                        <input class="form-control">   
                          
                        <div class="invalid-feedback">
                              
                        </div>
                          
                    </div>
                    <div class="form-group">
                        <label for="nomer" class="col-form-label">Nomer Telepon / Whatsapp:</label>
                        <input class="form-control"> 
                          
                        <div class="invalid-feedback">
                              
                        </div>
                          
                    </div>
                    <div class="form-group">
                        <label for="tanggal-sewa" class="col-form-label">Tanggal &amp; Waktu Pengambilan: </label>
                        <div class="form-group row px-3">
                            <input daterange="date" date-range-target="#Pengembalian" class="col mr-3 form-control">

                            <select name="jam_sewa" class="col-2 mr-2 form-control">
                                  
                                      
                            </select>

                            <select name="menit_sewa" class="col-2  form-control">
                                <option value="00">00</option>
                                <option value="30">30</option>
                            </select>

                        </div>
                          
                        <div class="invalid-feedback">
                              
                        </div>
                          
                    </div>

                    <div class="form-group">

                        <label for="Pengembalian" class="col-form-label">Tanggal &amp; Waktu Pengembalian:</label>
                        <input type="datetime-local" value=" " name="tgl_pgmbl" class="form-control" id="Pengembalian">

                    </div>
                    <div class="form-group">
                        <label for="tp_sewa" class="col-form-label">Tipe Sewa</label>
                        <select name="tp_sewa" id="tp_sewa" onchange="" class="form-control form-control-sm mb-3">
                            <option value="Lepas Kunci">Lepas Kunci</option>
                            <option value="Mobil Dengan Pengemudi">Mobil + Driver</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="serah-terima" class="col-form-label">Alamat Tempat Tinggal:</label>
                        <textarea class="form-control "></textarea>
                        <div class="invalid-feedback">
                              
                        </div>
                          
                    </div>
                    <div class="form-group">
                        <label for="catatan" class="col-form-label">Alamat Serah Terima Mobil:</label>
                        <textarea class="form-control"></textarea>
                          
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
                                    <p>Rp  </p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col d-flex">
                                    <p>Total Harga sewa (   Hari)</p>
                                </div>
                                <div class="col">
                                    <p>Rp  </p>
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
                                    <p style="color: orangered">Rp   </p>
                                    <input type="hidden" name="TotalTagihan">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="tipe_bayar" class="col-form-label">Lakukan Pembayaran Pada Salah Satu No.rekening dibawah:</label>
                        <select class="form-control" name="tipe_bayar" id="">
                            <option value="BCA" selected="">Rekening BCA : 0777562792898</option>
                            <option value="Direct">Link Aja : 085784793034 (a/n Asfa Hani)</option>
                        </select>

                    </div>

                      

                </div>
                  
                <hr>
                <label for="catatan" class="col-form-label">Upload Bukti Pembayaran Anda (Struk/Screenshot Bukti Pembayaran)</label>
                <input type="file" name="GMB_Bukti" onchange="preview(this, '#buktibayar')">
                <div class="container-fluid">
                    <img alt="Bukti Bayar" src="assets/img/dataImg/NoImageA.png" id="buktibayar" class="img-fluid img-thumbnail">
                </div>
                  
                <button type="submit" class="btn btn-warning btn-lg btn-block">Hitung Semua</button>
                  
            </div>
        </div>

          
        <section class="mt-3">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Booking Sekarang</button>
        </section>
          

    </form>
</div>