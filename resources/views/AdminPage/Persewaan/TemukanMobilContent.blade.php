<div class="container-fluid mt-1">
    @foreach ($data as $item)
    @php
        $tag = json_decode($item->tag_mb, 1);
        $getData = Request::all();
    @endphp

    <div class="card">
        <div class="container p-3">
            <figure class="figure w-100 p-0 d-flex d-md-none">
                <img src="{{ asset('assets/img/dataImg/' . $item->gmb_mb) }}" class="mx-auto figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
            </figure>
            <div class="row pl-3">
                <span class="text-black font-poppins-400 font-size-2">{{ $item->nama_mb }}</span>
                <button class="btn btn-outline-success bg-none ml-auto font-poppins-400 mr-md-3 mr-0">{{ (!empty($tag['Supir'])) ? $tag['Supir'] : "Belum Ditentukan"  }}</button>
            </div>
            <div class="row pl-3 mt-1 h-100">
                <figure class="figure col-4 d-none d-md-flex">
                    <img src="{{ asset('assets/img/dataImg/' . $item->gmb_mb) }}" class="img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                </figure>
                <div class="col pb-2">
                    
                    <div class="row mb-0"style="height: 10%">
                        <div class="col-auto">
                            <i class="fas fa-user font-size-2 pr-3"></i>
                            {{ $item->jml_tp_d }}
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-suitcase font-size-2 pr-3"></i>
                            {{ $item->bagasi }}
                        </div>
                        @if (!empty($tag['Transmission']))
                        <div class="col-auto">
                            <i class="fas fa-steering-wheel pr-3"></i>
                            {{ $tag['Transmission'] }}
                        </div>
                        @endif
                    </div>

                    <div class="row my-3 ml-1 mr-3 h-50">

                        @foreach ($tag as $k => $v)
                        @php if ($k == "Supir") continue; @endphp
                        <div class="col-auto mb-2">
                            <span class="mx-auto d-flex badge rounded-pill bg-secondary badge-lg mr-2">
                                <i class="fa fa-tag pr-2"></i>
                                {{ $k }}
                            </span>
                            <div class="row mt-1">
                                <span class="font-poppins-400 mx-auto border-bottom border-darker">{{ $v }}</span>
                            </div>
                        </div>
                        @endforeach
                        

                    </div>

                    <div class="row pl-0 mt-4 align-content-end h-25">
                        <div class="col text-left">
                            <span class="mt-0 mt-md-2 font-poppins-400 d-flex w-100">Dari</span>
                            <span class="font-poppins-400 font-size-2 text-red">Rp {{ placeRp($item->harga_mb) }}
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
                            <img src="{{ asset('assets/img/dataImg/' . $item->gmb_mb) }}" class=" w-100 figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                        </figure>
                    </a>
        
                    <div class="row pl-0">
                        <span class="font-size-3 font-poppins-400 ml-3">{{ $item->nama_mb }}</span>
                    </div>
                    <div class="container pl-4 mt-4 pb-4">
                        <div class="row mb-0">
                            <div class="col-auto">
                                <i class="fas fa-user font-size-2 pr-3"></i>
                                {{ $item->jml_tp_d }}
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-suitcase font-size-2 pr-3"></i>
                                {{ $item->bagasi }}
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-car font-size-2 pr-3"></i>
                                <span class="font-poppins-400 text-muted">{{ $item->t_mb }} atau setelahnya</span>
                            </div>
        
                        </div>
                    </div>

                </div>

                <div class="container p-0 m-0">
                    
                    <form id="formPesanan" action="{{ route('TambahPersewaan') }}" method="POST" enctype="multipart/form-data">
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
                                                    <p>Rp. {{ placeRp($item->harga_mb) }}  </p>
                                                </div>
                                            </div>
            
                                            <div class="row">
                                                <div class="col d-flex">
                                                    <p>Total Harga sewa ( {{ $getData['durasi_sewa'] }}  Hari)</p>
                                                </div>
                                                <div class="col">
                                                    <p>Rp  {{ placeRp($total = $getData['durasi_sewa'] * $item->harga_mb) }}</p>
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
                                                    <p>Rp. {{ placeRp($item->harga_mb) }}  </p>
                                                </div>
                                            </div>
            
                                            <div class="row">
                                                <div class="col d-flex">
                                                    <p>Total Harga sewa ( {{ $getData['durasi_sewa'] }}  Hari)</p>
                                                </div>
                                                <div class="col">
                                                    <p>Rp  {{ placeRp($total = $getData['durasi_sewa'] * $item->harga_mb) }}</p>
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
                            <img src="{{ asset('assets/img/dataImg/' . $item->gmb_mb) }}" class=" w-100 figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                        </figure>
                    </a>
        
                    <div class="row pl-0">
                        <span class="font-size-3 font-poppins-400 ml-3">{{ $item->nama_mb }}</span>
                    </div>
                    <div class="container pl-4 mt-4 pb-4">
                        <div class="row mb-0">
                            <div class="col-auto">
                                <i class="fas fa-user font-size-2 pr-3"></i>
                                {{ $item->jml_tp_d }}
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-suitcase font-size-2 pr-3"></i>
                                {{ $item->bagasi }}
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-car font-size-2 pr-3"></i>
                                <span class="font-poppins-400 text-muted">{{ $item->t_mb }} atau setelahnya</span>
                            </div>
        
                        </div>
                    </div>

                </div>

                <div class="container p-0 m-0">
                    
                    <form id="formPesanan" action="{{ route('TambahPersewaan') }}" method="POST" enctype="multipart/form-data">
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
                                                    <p>Rp. {{ placeRp($item->harga_mb) }}  </p>
                                                </div>
                                            </div>
            
                                            <div class="row">
                                                <div class="col d-flex">
                                                    <p>Total Harga sewa ({{ $durasi = $tanggal_pengembalian->diff($tanggal_pengambilan)->d }}  Hari)</p>
                                                </div>
                                                <div class="col">
                                                    <p>Rp  {{ placeRp($total = $durasi * $item->harga_mb) }}</p>
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
                                                    <p>Rp. {{ placeRp($item->harga_mb) }}  </p>
                                                </div>
                                            </div>
            
                                            <div class="row">
                                                <div class="col d-flex">
                                                    <p>Total Harga sewa ( {{ $durasi = $tanggal_pengembalian->diff($tanggal_pengambilan)->d; }}  Hari)</p>
                                                </div>
                                                <div class="col">
                                                    <p>Rp  {{ placeRp($total = $durasi * $item->harga_mb) }}</p>
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