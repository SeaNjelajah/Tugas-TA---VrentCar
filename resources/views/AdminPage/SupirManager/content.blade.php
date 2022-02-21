   
<div class="card mt-0 contained-fluid">

    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-striped table-hover ">
          @if (empty($data->all()))
         
          <div class="container m-0 p-0">
            <div class="text-center position-absolute pt-6 w-100 h-100%" style="background-color: #d3d3d3; opacity: 0,5; height: 600px;">
              <span class="font-weight-bolder text-muted" style="font-size: 60px; font-variant: all-small-caps;">Tabel Empty</span>
            </div>
          </div>

          @else

          <thead>     

            <tr>            
              <th style="width: 7px">#</th>
              <th class="col-1">Foto</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Nomor HP</th>
              <th>Pendapatan</th>
              <th class="col-1">Status</th>
              <th style="width: 110px;">Action</th>
            </tr>
          </thead>
          
          <tbody>
           
              @php $num = 1; @endphp
              @foreach ($data as $item)
              @php $stat = $item->status @endphp                        
              <tr id="row{{ $num }}" >              
                  <td>{{ $num++ }}.</td>
                  <td>
                    <a class="btn btn-sm btn-primary text-white ImgPopOver" rel="popover" data-img="assets/img/dataImg/{{ $item->gmb_sp }}"><i class="fas fa-image"></i></a>
                  </td>               
                  <td>{{ $item->nama }}</td>
                  <td>{{ $item->al_sp }}</td>
                  <td>+{{ $item->no_tlp }}</td>
                  <td>Rp. {{ placeRp($item->gj_sp) }} </td>
                  <td><span class="font-weight-bold badge badge-pill badge-lg badge-{{ ($stat == 'Siap' ? $stat == 'Tidak tersedia' ? 'danger' : 'success' : 'warning')  }}"><i class="ni ni-button-power mr-2"></i>{{ $stat }}</span></td>
                  <td>
                      <div class="input-group">                
                          <button id="BE{{ $item->id }}" data-toggle="modal" data-target="#editSP{{ $item->id }}" type="button" class="mx-auto mb-sm-1 mb-lg-0 btn btn-warning btn-sm "><i class="fas fa-pencil-alt"></i></button>
                          <form action="{{ Route('SupirManagerDel') }}" class="p-0 m-0 mx-auto" method="POST">
                              @csrf
                              <input type="submit" style="display: none;">
                              <input type="hidden" name="itemSId" value="{{ $item->id }}">
                              <button type="button" onclick="SDel(this, 1)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                          </form>
  
                          <div class="modal fade" id="editSP{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                              <div class="modal-dialog modal-lg  modal-dialog-centered" role="document">
                                <div class="modal-content bg-secondary">
                                  
                                  <form action="{{ Route('SupirManagerEdit') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="idForScroll" value="row{{ $num }}">
                                    <input type="hidden" name="modal" value="BE{{ $item->id }}">
                                    <input type="hidden" name="itemSId" value="{{ $item->id }}">
                                    <div class="modal-body text-left">
                                      
                                      
                                      <hr class="my-4">
                                      <h6 class="heading-small text-muted mb-4">Informasi Supir</h6>
                                      <div class="pl-lg-4 row clearfix">
                
                                          <div class="float-left w-50">
                                              <div class="form-group">
                                                  <figure class="figure">
                                                      <img src="assets/img/dataImg/{{ $item->gmb_sp }}" class="figure-img img-fluid rounded border" alt="Gambar Supir">                                        
                                                      <input class="form-control" name="GMB" type="file" onchange="preview(this, this.parentElement.children[0])">                                                            
                                                  </figure>
                                              </div>
                                          </div>
                                        
                      
                                          <div class="col-md-6 mt-n4">
                                                                                                                                              
                                              <div class="form-group">
                                              <label class="form-control-label" for="nm_sp">Nama</label>
                                              <input type="text" name="nm_sp" value="{{ ((old('nm_sp')) ? old('nm_sp') : $item->nama) }}" id="nm_sp" class="form-control @error('nm_sp') is-invalid @enderror" placeholder="...">
                                              @error('nm_sp')
                                              <div class="invalid-feedback">
                                                  {{ $message }}
                                              </div>
                                              @enderror
                                              </div>
                                              
                                              <div class="form-group">
                                                  <label class="form-control-label" for="al_r">Alamat Rumah</label>
                                                  <input type="text" name="al_r" id="al_r" class="form-control @error('al_r') is-invalid @enderror" placeholder="..." value="{{ old('al_r') || $item->al_sp }}">
                                                  @error('al_r')
                                                  <div class="invalid-feedback">
                                                      {{ $message }}
                                                  </div>
                                                  @enderror
                                              </div>
              
                                          
              
                                              <div class="form-group">
                                                  <label class="form-control-label" for="n_hp">Nomor hp</label>
                                                  <input type="number" name="n_hp" id="n_hp" class="form-control @error('n_hp') is-invalid @enderror" placeholder="..." value="{{ ((old('n_hp')) ? old('n_hp') : $item->no_tlp) }}">
                                                  @error('n_hp')
                                                  <div class="invalid-feedback">
                                                      {{ $message }}
                                                  </div>
                                                  @enderror
                                              </div>                                
                
                                          </div>                                               
                                        
                      
                                      </div>
              
                                      <div class="pl-lg-4">
                                          <div class="row">
                                              <div class="col">
  
                                                  <div class="form-group">
                                                    <label class="form-control-label" for="gaji">Pendapatan Driver / Aksi</label>
                                                    <div class="input-group">
                                                      <div class="input-group-prepend">
                                                        <span class="input-group-text">Rp.</span>
                                                      </div>
                                                      <input @error('gaji') style="border: 1px solid #fb6340;" @enderror value="{{ ((old('gaji')) ? old('gaji') : $item->gj_sp) }}" type="number" name="gaji" id="gaji" class="form-control " placeholder="..." value="">                                
                                                    </div>
                                                    @error('gaji')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                  </div>
  
                                                  <div class="form-group">
                                                      <label class="form-control-label" for="st_sp">Set Status</label>
                                                      <select class="form-control" name="st_sp">                                                                                             
                                                        <option {{ ((old('st_sp') == "Siap") ? 'selected' : (( $stat == "Siap" ) ? 'selected' : '')) }}>Siap</option>
                                                        <option {{ ((old('st_sp') == "Tidak tersedia") ? 'selected' : (( $stat == "Tidak Tersedia" ) ? 'selected' : '')) }}>Tidak Tersedia</option>                                            
                                                      </select>
                                                  </div>
  
  
                                              </div>                                
                                          </div> 
                                      </div>
              
                                      <hr class="my-4">                                               
                                                                                                      
                                    </div>
  
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                  </form>
      
                                </div>
                              </div>
                          </div>
  
                          
                          
                      </div>
                  </td>
              </tr>
              @endforeach
  
              
          </tbody>

          @endif
        </table>
      </div>
    </div>
       

</div>
