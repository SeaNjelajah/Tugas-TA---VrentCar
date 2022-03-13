<div class="container-fluid mt-1">
    @foreach ($mobil as $item)
    @php
        $getData = Request::all();
    @endphp

    <div class="card">
        <div class="container p-3">
            <figure class="figure w-100 p-0 d-flex d-md-none">
                <img src="{{ asset('assets/img/cars/' . $item->gambar) }}" class="mx-auto figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
            </figure>
            <div class="row pl-3">
                <span class="text-black font-poppins-400 font-size-2">{{ $item->nama }}</span>
                <button class="btn btn-outline-success bg-none ml-auto font-poppins-400 mr-3">{{ $item->tipe_sewa()->first()->tipe_sewa }}</button>
            </div>
            <div class="row pl-3 mt-1 h-100">
                <figure class="figure col-4 d-none d-md-flex">
                    <img src="{{ asset('assets/img/cars/' . $item->gambar) }}" class="img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                </figure>
                <div class="col pb-2">
                    
                    <div class="row mb-0"style="height: 10%">
                        <div class="col-auto">
                            <i class="fas fa-user font-size-2 pr-3"></i>
                            {{ $item->jumlah_kursi }}
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-suitcase font-size-2 pr-3"></i>
                            {{ $item->kapasitas_koper }}
                        </div>
            
                        <div class="col-auto">
                            <i class="fa fa-gear font-size-2 pr-3"></i>
                            {{ $item->transmisi()->first()->nama_transmisi }}
                        </div>
                        
                    </div>


                    <div class="row pl-0 mt-6 mt-md-8 align-content-end h-25">
                        <div class="col text-left">
                            <span class="mt-0 mt-md-2 font-poppins-400 d-flex w-100">Dari</span>
                            <span class="font-poppins-400 font-size-2 text-red">Rp {{ placeRp($item->harga) }}
                                <span class="text-muted font-poppins-400">/hari</span>
                            </span>
                        </div>
                        <div class="col text-right pt-3">
                            <button data-toggle="modal" data-target="#modal{{ $item->id }}" class="mx-auto btn btn-success font-poppins-400" style="width: 140px; ">Pilih</button>
                        </div>
                    </div>

                </div>
            </div>
            
        </div>
    </div>







    <!-- Modal Pilih -->
    @if ($getData['dengan_supir'] == 'true')
    <div class="modal fade" id="modal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Info Mobil</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <div class="container card">

                    <a class="row px-4" href="#">
                        <figure class="figure mx-auto mt-3">
                            <img src="{{ asset('assets/img/cars/' . $item->gambar) }}" class=" w-100 figure-img img-fluid rounded" alt="Cars Picture">
                        </figure>
                    </a>
        
                    <div class="row pl-0">
                        <span class="font-size-3 font-poppins-400 ml-3">{{ $item->nama }}</span>
                    </div>

                    <div class="container pl-4 mt-4 pb-4">
                        <div class="row mb-0">
                            <div class="col-auto">
                                <i class="fas fa-user font-size-2 pr-3"></i>
                                {{ $item->jumlah_kursi }}
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-suitcase font-size-2 pr-3"></i>
                                {{ $item->kapasitas_koper }}
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-car font-size-2 pr-3"></i>
                                <span class="font-poppins-400 text-muted">{{ $item->tahun }} atau setelahnya</span>
                            </div>
        
                        </div>
                    </div>

                </div>

                <div class="container p-0 m-0">
                    
                    <form id="formPesanan" action="{{ route('admin.Persewaan.tambah') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @foreach ($getData as $k => $v)
                        <input type="hidden" name="{{ $k }}" value="{{ $v }}">
                        @endforeach
                        <input type="hidden" name="d_mobil_id" value="{{ $item->id }}">

                        <div class="card text-left">
            
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
                                                    <p>Rp. {{ placeRp($item->harga) }}  </p>
                                                </div>
                                            </div>
            
                                            <div class="row">
                                                <div class="col d-flex">
                                                    <p>Total Harga sewa ( {{ $getData['durasi_sewa'] }}  Hari)</p>
                                                </div>
                                                <div class="col">
                                                    <p>Rp  {{ placeRp($total = $getData['durasi_sewa'] * $item->harga) }}</p>
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
                                                    <p style="color: orangered">Rp {{  placeRp($total += 150000) }}  </p>
                                                    <input type="hidden" name="total" value="{{ $total }}">
                                                </div>
                                            </div>

                                        </div>
            
                                    </div>
            
                                    <div class="form-group">
                                        <label for="penyewa" class="col-form-label">Nama Lengkap:</label>
                                        <input class="form-control" name="penyewa" value="{{ old('penyewa') }}">

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
                                        <label for="alamat_rumah" class="col-form-label">Alamat Tempat Tinggal:</label>
                                        <textarea class="form-control" name="alamat_rumah">{{ old('alamat_rumah') }}</textarea>
                                        <div class="invalid-feedback">
                                              
                                        </div>
                                          
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat_temu" class="col-form-label">Alamat Penjemputan:</label>
                                        <textarea class="form-control" name="alamat_temu">{{ old('alamat_temu') }}</textarea>
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
                                                    <p>Rp. {{ placeRp($item->harga) }}  </p>
                                                </div>
                                            </div>
            
                                            <div class="row">
                                                <div class="col d-flex">
                                                    <p>Total Harga sewa ( {{ $getData['durasi_sewa'] }}  Hari)</p>
                                                </div>
                                                <div class="col">
                                                    <p>Rp  {{ placeRp($total = $getData['durasi_sewa'] * $item->harga) }}</p>
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
                                                    <p style="color: orangered">Rp {{  placeRp($total += 150000) }}  </p>
                                                </div>
                                            </div>

                                        </div>
            
                                    </div>
                                    
            
                                    <div class="form-group">
                                        <label for="tipe_bayar">Lakukan Pembayaran Pada Salah Satu No.rekening dibawah:</label>
                                        <select class="form-control" name="tipe_bayar" >
                                            @foreach ($tipe_bayar as $tipe)
                                            <option value="{{ $tipe->nama }}">{{ $tipe->deskripsi }}</option>
                                            @endforeach
                                        </select>
            
                                    </div>
            
                                      
            
                                </div>
                                  
                                <hr>
                                <label for="catatan" class="col-form-label">Upload Bukti Pembayaran Anda (Struk/Screenshot Bukti Pembayaran)</label>
                                <input class="form-control" type="file" name="bukti_bayar" set="preview" to="#buktibayar{{ $item->id }}">
                                <div class="container-fluid mt-3 text-center">
                                    <img alt="Bukti Bayar" src="{{ asset('assets/img/cars/NoImageA.png') }}" id="buktibayar{{ $item->id }}" class="img-fluid img-thumbnail">
                                </div>
                                  
                                
                                  
                            </div>
                        </div>
            
                          
                        <section class="mt-3">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Booking Sekarang</button>
                        </section>
                          
            
                    </form>
                </div>


            </div>


          </div>
        </div>
    </div>
    @elseif ($getData['dengan_supir'] == 'false')


    @php
        $tanggal_pengambilan = Carbon\Carbon::create($getData['tanggal_pengambilan']."T".$getData['jam_pengambilan'].":".$getData['menit_jam_pengambilan']);
        $tanggal_pengembalian = Carbon\Carbon::create($getData['tanggal_pengembalian']."T".$getData['jam_pengembalian'].":".$getData['menit_jam_pengembalian']);
    @endphp


    <div class="modal fade" id="modal{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Info Mobil</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <div class="container card">

                    <a class="row px-4" href="#">
                        <figure class="figure mx-auto mt-3">
                            <img src="{{ asset('assets/img/cars/' . $item->gambar) }}" class=" w-100 figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                        </figure>
                    </a>
        
                    <div class="row pl-0">
                        <span class="font-size-3 font-poppins-400 ml-3">{{ $item->nama }}</span>
                    </div>
                    <div class="container pl-4 mt-4 pb-4">
                        <div class="row mb-0">
                            <div class="col-auto">
                                <i class="fas fa-user font-size-2 pr-3"></i>
                                {{ $item->jumlah_kursi }}
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-suitcase font-size-2 pr-3"></i>
                                {{ $item->kapasitas_koper }}
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-car font-size-2 pr-3"></i>
                                <span class="font-poppins-400 text-muted">{{ $item->tahun }} atau setelahnya</span>
                            </div>
        
                        </div>
                    </div>

                </div>

                <div class="container p-0 m-0">
                    
                    <form id="formPesanan" action="{{ route('admin.Persewaan.tambah') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @foreach ($getData as $k => $v)
                        <input type="hidden" name="{{ $k }}" value="{{ $v }}">
                        @endforeach
                        <input type="hidden" name="d_mobil_id" value="{{ $item->id }}">

                        <div class="card text-left">
            
                            <div class="card-body">
                                <div class="row d-block px-2">

                                    <div class="row mb-2 mt-1 w-100">
                                        <span class="ml-auto font-poppins-400 font-size-2">Tanpa Supir</span>
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
                                                    <p>Rp. {{ placeRp($item->harga) }}  </p>
                                                </div>
                                            </div>
            
                                            <div class="row">
                                                <div class="col d-flex">
                                                    <p>Total Harga sewa ({{ $durasi = $tanggal_pengembalian->diff($tanggal_pengambilan)->d }}  Hari)</p>
                                                </div>
                                                <div class="col">
                                                    <p>Rp  {{ placeRp($total = $durasi * $item->harga) }}</p>
                                                </div>
                                            </div>
                                              
                                              
                                            <div class="row">
                                                <div class="col">
                                                    <p style="color: #01d28e">Total Tagihan</p>
                                                </div>
                                                <div class="col">
                                                    <p style="color: orangered">Rp {{  placeRp($total) }}  </p>
                                                    <input type="hidden" name="total" value="{{ $total }}">
                                                </div>
                                            </div>

                                        </div>
            
                                    </div>
            
                                    <div class="form-group">
                                        <label for="nama" class="col-form-label">Nama Lengkap:</label>
                                        <input class="form-control" name="nama" value="{{ old('nama') }}">

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
                                        <label for="alamat_rumah" class="col-form-label">Alamat Tempat Tinggal:</label>
                                        <textarea class="form-control" name="alamat_rumah">{{ old('alamat_rumah') }}</textarea>
                                        <div class="invalid-feedback">
                                              
                                        </div>
                                          
                                    </div>

                                    <div class="form-group">
                                        <label for="alamat_temu" class="col-form-label">Alamat Serah Terima Mobil:</label>
                                        <textarea class="form-control" name="alamat_temu">{{ old('alamat_temu') }}</textarea>
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
                                                    <p>Rp. {{ placeRp($item->harga) }}  </p>
                                                </div>
                                            </div>
            
                                            <div class="row">
                                                <div class="col d-flex">
                                                    <p>Total Harga sewa ({{ $durasi = $tanggal_pengembalian->diff($tanggal_pengambilan)->d; }}  Hari)</p>
                                                </div>
                                                <div class="col">
                                                    <p>Rp  {{ placeRp($total = $durasi * $item->harga) }}</p>
                                                </div>
                                            </div>
                                              
                                            
                                              
                                            <div class="row">
                                                <div class="col">
                                                    <p style="color: #01d28e">Total Tagihan</p>
                                                </div>
                                                <div class="col">
                                                    <p style="color: orangered">Rp {{  placeRp($total) }}  </p>
                                                    <input type="hidden" name="total" value="{{ $total }}">
                                                </div>
                                            </div>

                                        </div>
            
                                    </div>
                                    
            
                                    <div class="form-group">
                                        <label for="tipe_bayar">Lakukan Pembayaran Pada Salah Satu No.rekening dibawah:</label>
                                        <select class="form-control" name="tipe_bayar" >
                                            @foreach ($tipe_bayar as $tipe)
                                            <option value="{{ $tipe->nama }}">{{ $tipe->deskripsi }}</option>
                                            @endforeach
                                        </select>
            
                                    </div>
            
                                      
            
                                </div>
                                  
                                <hr>
                                <label for="catatan" class="col-form-label">Upload Bukti Pembayaran Anda (Struk/Screenshot Bukti Pembayaran)</label>
                                <input class="form-control" type="file" name="bukti_bayar" set="preview" to="#buktibayar{{ $item->id }}">
                                <div class="container-fluid mt-3 text-center">
                                    <img alt="Bukti Bayar" src="{{ asset('assets/img/cars/NoImageA.png') }}" id="buktibayar{{ $item->id }}" class="img-fluid img-thumbnail">
                                </div>
                                  
                                
                                  
                            </div>
                        </div>
            
                          
                        <section class="mt-3">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Booking Sekarang</button>
                        </section>
                          
            
                    </form>
                    
                </div>


            </div>


          </div>
        </div>
    </div>
    @endif

    @endforeach

</div>