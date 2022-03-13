@if ($item->status == "Selesai")
<div class="card mt-n3">
  <div class="card-body">

      <div class="row mx-1 rounded-pill" style="background-color: #81a0f5;">
      
          <div class="col-1 my-auto">
              <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="Pcheck{{ $item->id }}">
                  <label class="custom-control-label" for="Pcheck{{ $item->id }}"></label>
              </div>
          </div>

          <div class="col-11 text-center">

              <div class="row d-lg-inline-block d-block mx-auto float-md-left">
                  Selesai Pada | {{ $item->updated_at }} 
              </div>
      
              <div class="row d-lg-inline-block d-block mx-auto float-md-right">
                  Mulai Sewa | {{ $item->mulai_sewa }} --- Akhir Sewa | {{ $item->akhir_sewa }} || {{ Carbon\Carbon::create($item->mulai_sewa)->diff(Carbon\Carbon::create($item->akhir_sewa), false)->d }} Hari Sewa
              </div>

          </div>
          

      </div>

      <div class="row d-inline-flex">
          
          <div class="mx-sm-auto col-md-12 col-lg-5 text-center d-block mt-1" >
              <img src="assets/img/dataImg/{{ $mobil->gmb_mb }}" alt="Gambar Mobil Pesanan" class="align-self-center m-2 img-fluid rounded-start img-thumbnail">
              <div class="row text-center">
                  <h2 class="col-6 text-center text-info">{{ $mobil->nama_mb }}</h2>
                  <h2 class="col-6 text-center font-weight-bolder">{{ $mobil->plat_mb }}</h2>
              </div>
          </div>
          
      
          <div class="my-lg-0 col-md-12 col-lg mr-1 text-left" style="border-left: 2px #d3ddcf solid;">
            <div class="table-responsive mx-auto">
              <table class="mt-3 table w-100 align-items-center text-center">
                  <thead class="thead-light">
                      <tr>
                          <th>{{  (empty($item->address_home)) ? 'Alamat Serah Terima' : 'Alamat Rumah' }}</th>
                          <th>Tipe Sewa</th>
                      </tr>
                  </thead>
                  
                  <tbody class="list">
                      <tr>
                          <td>{{ (empty($item->address_home)) ? $item->address_serah_terima  : $item->address_home}}</td>
                          <td>{{ $item->tipe_sewa }}</td>
                      </tr>
                  </tbody>
                  
              </table> 

              <table class="mt-5 table w-100 align-items-center text-center">
                  <thead class="thead-light">
                      <tr>
                          <th>Supir</th>
                          <th>Jenis Pembayaran</th>
                      </tr>
                  </thead>
                  
                  <tbody class="list">
                      <tr>
                          <td>XXXXX</td>
                          <td>{{ $item->tipe_bayar }}</td>
                      </tr>
                  </tbody>
                  
              </table> 
          </div>
            <button type="button" class="float-right btn btn-info mx-auto mb-3" data-toggle="modal" data-target="#infoOrder{{ $item->id }}">More Info</button>
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

                          <div class="row d-flex text-center">
                              <div class="col-{{ (!empty($item->address_serah_terima)) ? '6' : '12' }}">
                                  <strong class="display-4">Alamat Rumah</strong>
                                  <p class="display-5">{{ $item->address_home }}</p>
                              </div>

                              @if (!empty($item->address_serah_terima))
                              <div class="col-6">
                                  <strong class="display-4">Alamat Serah Terima</strong>
                                  <p class="display-5">{{ $item->address_serah_terima }}</p>
                              </div>
                              @endif

                          </div>

                          <table class="table mx-auto table-hover text-left table-bordered shadow table">                  
                              <tbody class="text-center">

                                <tr>
                                  <td class="d-flex">
                                    <h3 class="col-3 text-left">Nama Customer</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">{{ $item->nama }}</h3>
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
                                    <h3 class="col-8 ">{{ $item->mulai_sewa }}</h3>
                                  </td>                                           
                                </tr>
                                
                                <tr>
                                  <td class="d-flex">
                                    <h3 class="col-3 text-left">Tanggal Akhir Sewa</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">{{ $item->akhir_sewa }}</h3>
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
                                    <h3 class="col-8 ">{{ $mobil->nama_mb }}</h3>
                                  </td>                                      
                                </tr>                                                                             
                                <tr>
                                  <td class="d-flex">
                                    <h3 class="col-3 text-left">Nomer Pelat Mobil</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">{{ $mobil->plat_mb }}</h3>
                                  </td>                                           
                                </tr>
                                <tr>
                                  <td class="d-flex">
                                    <h3 class="col-3 text-left">Jumlah Kursi</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">{{ $mobil->jml_tp_d }}</h3>
                                  </td>                                           
                                </tr>
                                <tr>
                                  <td class="d-flex">
                                    <h3 class="col-3 text-left">Tahun Beli</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">{{ $mobil->t_mb }}</h3>
                                  </td>                                        
                                </tr>
                                
                                <tr>
                                  <td class="d-flex">
                                    <h3 class="col-3 text-left">Harga sewa Per-Hari</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">Rp. {{ placeRp ($mobil->harga_mb) }}</h3>
                                  </td>                                        
                                </tr>   
                                                                                                            
                              </tbody>                                    
                          </table>
                          @php $tag_decoder = json_decode($mobil->tag_mb, 1) @endphp
                          @if (!empty($tag_decode))                                                     
                          <table class="mx-auto mt-3 table-bordered shadow table table-hover text-left">                  
                              <tbody class="text-center">
                                  <tr>
                                    <td><h3>Other</h3></td>
                                  </tr>                                        
                                  @foreach ($tag_decode as $k => $v)      
                                  <tr>
                                    <td class="d-flex">
                                      <h3 class="col-3 text-left">{{ $k }}</h3>
                                      <h3 class="col-1"> : </h3>
                                      <h3 class="col-8">{{ $v }}</h3>
                                    </td>                                        
                                  </tr>    
                                  @endforeach                                                                                                                                                          
                              </tbody>                                    
                          </table>
                          @endif

                          <div class="col-12 mx-auto mt-2">
                              <strong class="display-5">Gambar Mobil</strong>
                              <img src="assets/img/dataImg/{{ $mobil->gmb_mb }}" alt="...." class="img-thumbnail mb-4 align-self-center">
                          </div>



                      </div>
                    </div>
                  </div>
              </div>
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

  </div>
</div>
@endif