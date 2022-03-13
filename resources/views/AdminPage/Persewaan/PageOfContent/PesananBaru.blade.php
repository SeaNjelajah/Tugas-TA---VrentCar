@if ($item->status == "Baru")
<div class="card mt-n3">
  <div class="card-body">

      <div class="row mx-1 rounded-pill" style="background-color: #b8e6a8;">
      
          <div class="col-1 my-auto">
              <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="Pcheck{{ $item->id }}">
                  <label class="custom-control-label" for="Pcheck{{ $item->id }}"></label>
              </div>
          </div>

          <div class="col-11 text-center">

              <div class="row d-lg-inline-block d-block mx-auto float-md-left">
                  Siap Diproses / {{ $item->tgl_mulai_sewa }} 
              </div>
      
              <div class="row d-lg-inline-block d-block mx-auto float-md-right">
                  {{ $item->tgl_akhir_sewa }} / {{ Carbon\Carbon::create($item->tgl_mulai_sewa)->diff(Carbon\Carbon::create($item->tgl_akhir_sewa), false)->d }} Hari Sewa
              </div>

          </div>
          

      </div>

      <div class="row d-inline-flex">
          
          <div class="mx-sm-auto col-md-12 col-lg text-center d-block mt-1 border border-top-0 border-bottom-0" style="border-color: #d3ddcf;" >
              <img src="assets/img/dataImg/{{ $mobil->gmb_mb }}" alt="Gambar Mobil Pesanan" class="align-self-center m-2 img-fluid rounded-start img-thumbnail">
              <div class="row text-center">
                  <h2 class="col-6 text-center text-info">{{ $mobil->nama_mb }}</h2>
                  <h2 class="col-6 text-center font-weight-bolder">{{ $mobil->plat_mb }}</h2>
              </div>
          </div>
          
      
          <div class="my-lg-0 col-md-12 col-lg text-left border border-top-0 border-bottom-0" style="border-color: #d3ddcf;">
              <h2 class="mt-3">Alamat Serah Terima</h2>
              <p class="text-left text-justify-center">{{ (!empty($item->alamat_temu)) ? $item->alamat_temu : "Alamat Rumah: <br>" . $item->alamat_rumah }}</p>
              <div class="row h-50 px-2 align-content-end">
                <button type="button" class="btn btn-info ml-auto" data-toggle="modal" data-target="#infoOrder{{ $item->id }}">More Info</button>
              </div>

              <!-- Modal info -->
              <div class="modal fade" id="infoOrder{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                      
                      <div class="modal-header">
                        <h6 class="modal-title" id="modal-title-default">Info Order</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>

                      <div class="modal-body">

                          <table class="text-center table mx-auto table-hover table-bordered shadow mx-3">
                            <thead>
                              <tr>
                                <th class="font-size-2 font-poppins-400">Lokasi</th>
                              </tr>
                            </thead>
                            <tbody>

                              <tr>
                                <td class="d-flex">
                                  <h3 class="col-3 text-left">Alamat Rumah</h3>
                                  <h3 class="col-1"> : </h3>
                                  <h3 class="col-8 ">{{ $item->alamat_rumah }}</h3>
                                </td>                                      
                              </tr>

                              <tr>
                                <td class="d-flex">
                                  <h3 class="col-3 text-left">Alamat Serah Terima</h3>
                                  <h3 class="col-1"> : </h3>
                                  <h3 class="col-8 ">{{ $item->alamat_temu }}</h3>
                                </td>                                      
                              </tr>


                            </tbody>

                          </table>

                          <table class="mt-4 table mx-auto table-hover table-bordered shadow table">                  
                              <tbody class="text-center">

                                <tr>
                                  <td class="d-flex">
                                    <h3 class="col-3 text-left">Nama Customer</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">{{ $item->penyewa }}</h3>
                                  </td>                                      
                                </tr>
                                <tr>
                                  <td class="d-flex">
                                    <h3 class="col-3 text-left">Tipe Sewa</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">{{ $mobil->tipe_bayar()->first()->tipe_sewa }}</h3>
                                  </td>                                           
                                </tr>                                                                     
                                <tr>
                                  <td class="d-flex">
                                    <h3 class="col-3 text-left">Nomer Telepon</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">{{ $item->No_tlp }}</h3>
                                  </td>                                           
                                </tr>
                                <tr>
                                  <td class="d-flex">
                                    <h3 class="col-3 text-left">Tanggal Mulai Sewa</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">{{ $item->tgl_mulai_sewa }}</h3>
                                  </td>                                           
                                </tr>
                                
                                <tr>
                                  <td class="d-flex">
                                    <h3 class="col-3 text-left">Tanggal Akhir Sewa</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">{{ $item->tgl_akhir_sewa }}</h3>
                                  </td>                                        
                                </tr>
                                
                                <tr>
                                  <td class="d-flex">
                                    <h3 class="col-3 text-left">Harga Sewa Perhari</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">Rp. {{ placeRp ($mobil->harga_mb) }}</h3>
                                  </td>                                        
                                </tr>

                                <tr>
                                  <td class="d-flex">
                                    <h3 class="col-3 text-left">Total Harga</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">Rp. {{ placeRp ($item->total) }}</h3>
                                  </td>                                        
                                </tr>
                                                                                                            
                              </tbody>                          
                          </table>

                          

                          <table class="table mx-auto table-hover text-left table-bordered shadow table">                  
                              <tbody class="text-center">
                                  <tr>
                                      <td class="display-3">Data Mobil</td>
                                  </tr>
                                <tr>
                                  <td class="d-flex">
                                    <h3 class="col-3 text-left">Nama</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">{{ $mobil->nama }}</h3>
                                  </td>                                      
                                </tr>                                                                             
                                <tr>
                                  <td class="d-flex">
                                    <h3 class="col-3 text-left">Nomer Pelat Mobil</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">{{ $mobil->pelat }}</h3>
                                  </td>                                           
                                </tr>
                                <tr>
                                  <td class="d-flex">
                                    <h3 class="col-3 text-left">Jumlah Kursi</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">{{ $mobil->jumlah_kursi }}</h3>
                                  </td>                                           
                                </tr>
                                <tr>
                                  <td class="d-flex">
                                    <h3 class="col-3 text-left">Tahun Beli</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">{{ $mobil->tahun }}</h3>
                                  </td>                                        
                                </tr>
                                
                                <tr>
                                  <td class="d-flex">
                                    <h3 class="col-3 text-left">Harga sewa Per-Hari</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">Rp. {{ placeRp ($mobil->harga) }}</h3>
                                  </td>                                        
                                </tr>   
                                                                                                            
                              </tbody>                                    
                          </table>
                          
                          <table class="mx-auto mt-3 table-bordered shadow table table-hover text-left">                  
                              <tbody class="text-center">
                                  
                                  <tr>
                                    <td><h3>Other</h3></td>
                                  </tr>
                                  
                                  <tr>
                                    <td class="d-flex">
                                        <h3 class="col-3 text-left">Jenis Mobil</h3>
                                        <h3 class="col-1"> : </h3>
                                        <h3 class="col-8">{{ $item->jenis_mobil()->first()->jenis_mobil }}</h3>
                                    </td>
                                  </tr>

                                  <tr>
                                    <td class="d-flex">
                                        <h3 class="col-3 text-left">Jenis Transmisi</h3>
                                        <h3 class="col-1"> : </h3>
                                        <h3 class="col-8">{{ $mobil->transmisi()->first()->nama_transmisi }}</h3>
                                    </td>
                                  </tr>

                                  <tr>
                                    <td class="d-flex">
                                      <h3 class="col-3 text-left">Tipe Sewa</h3>
                                      <h3 class="col-1"> : </h3>
                                      <h3 class="col-8 ">{{ $mobil->tipe_bayar()->first()->tipe_sewa }}</h3>
                                    </td>                                           
                                  </tr>    
                                                                                                                                                                                         
                              </tbody>                                    
                          </table>
                          

                          <div class="col-12 mx-auto mt-2">
                              <strong class="display-5">Gambar Mobil</strong>
                              <img src="assets/img/dataImg/{{ $mobil->gmb_mb }}" alt="...." class="img-thumbnail mb-4 align-self-center">
                          </div>



                      </div>
                    </div>
                  </div>
              </div>
              
          </div>

          <div class="my-lg-0 col-md-12 col-lg text-left my-3 border border-top-0 border-bottom-0" style="border-color: #d3ddcf;">
              <h3 class="mb-0 mt-2">Tipe sewa: {{ $item->tipe_sewa }}</h3>
              @if (strcmp($item->tipe_sewa, "Dengan Supir") == 0)
              <select class="form-select ml-3 mt-3 w-100" style="max-width: 85%;" onchange="document.getElementById('data_sp_id{{ $item->id }}').value = this.value;">
                  <option selected value="">Menu Sopir</option>
                  @foreach ($data2 as $supir)
                    @if($supir->status == "Siap")
                    <option value="{{ $supir->id }}">{{ $supir->nama }}</option>
                    @endif
                  @endforeach
              </select>
              @endif

              {{-- @if (empty($item->d_mobil_id))
              <select class="form-select ml-3 mt-2 w-100" style="max-width: 85%;">
                  <option selected>Ada X Mobil yg sejenis</option>
                  <option value="1">One</option>
                  <option value="2">Two</option>
              </select>
              @endif --}}

              <h3 class="mb-0 mt-2">Pembayaran</h3>
              <p class="mt-0">{{ $item->tipe_bayar }}</p>
          </div>

      </div>

      <div class="row rounded-pill mx-1" style="background-color: #c4c4c4;">
          <div class="col-auto w-50 text-left">
              Total Bayar
          </div>
          <div class="col-auto w-50 text-right">
              Rp. {{ placeRp($item->total) }}
          </div>
      </div>
      <div class="row mt-1 mx-1">
        <form action="{{ route('admin.Persewaan.batalkan', $item->id) }}" class="col-auto w-50 text-left" method="POST">
          @csrf  
          <button class="btn btn-danger text-white" >Cancel</button>
        </form>
        <form action="{{ route('admin.Persewaan.setujui', $item->id) }}" class="col-auto w-50 text-right" method="POST">
          @csrf
          @if (strcmp($item->tipe_sewa, "Dengan Supir") == 0)
          <input id="data_sp_id{{ $item->id }}" type="hidden" name="data_supir_id">
          @endif
          <button class="btn btn-success text-white">PROSES</button>
        </form>
      </div>

  </div>
</div>
@endif