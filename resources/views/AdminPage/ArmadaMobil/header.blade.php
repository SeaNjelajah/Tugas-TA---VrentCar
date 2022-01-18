<div class="header pb-1" style="background-color: #01d28e;">
  <div class="container-fluid">

    <div class="header-body">

      <div class="row align-items-center py-4">

        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Armada Mobil</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="#">Armada Mobil</a></li>
              <li class="breadcrumb-item active" aria-current="page">Display</li>
            </ol>
          </nav>
        </div>
        
        <div class="col-lg-6 col-5 text-right">
          <a id="createMobilbtn" class="btn btn-sm btn-neutral text-primary" data-toggle="modal" data-target="#createMobil">New</a>
          <a href="#" class="btn btn-sm btn-neutral">Filters</a>
          
          <!-- Modal -->
          <form action="{{ Route('AMCreate') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="idForScroll" value="{{ "r" . count($data1) }}">
            <input type="hidden" name="modal" value="createMobilbtn">
            <div class="modal fade" id="createMobil" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h2 class="modal-title" >Tambah Mobil Baru</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  
                    <div class="modal-body text-left">
                                      
                      <hr class="my-4">
                      <h6 class="heading-small text-muted mb-4">Mobil information</h6>
                      <div class="pl-lg-4 row">

                          
                        <div class="mx-auto col-md-12 col-lg-6">
                          <div class="form-group">
                            <figure class="figure">
                              <img src="assets/img/dataImg/NoImageA.png" class="figure-img img-fluid rounded border" alt="Gambar Mobil" id="previewGambarMobil">                                        
                              <input class="form-control" name="GMB" type="file" onchange="preview(this, '#previewGambarMobil')">                                                            
                            </figure>
                          </div>
                        </div>
      
                        <div class="col-md-12 col-lg-6 mt-n4">
                                                                                                                              
                          <div class="form-group">
                            <label class="form-control-label" for="nm_mb">Nama</label>
                            <input type="text" name="nm_mb" id="nm_mb" class="form-control @error('nm_mb') is-invalid @enderror" placeholder="..." value="{{ old('nm_mb') }}">
                            @error('nm_mb')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>

                          <div class="form-group">
                            <label class="form-control-label" for="JumlahTD">Jumlah Tempat Duduk</label>
                            <div class="input-group">
                              <input type="number" class="form-control @error('jtd') is-invalid @enderror" id="JumlahTD" name="jtd" value="{{ old('jtd') }}">
                              <div class="input-group-append">
                                <span class="input-group-text" @error('jtd') style="border: 1px solid #fb6340;" @enderror id="basic-addon2">Kursi</span>
                              </div>
                              @error('jtd')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror      
                            </div>
                          </div>

                          <div class="form-group">
                            <label class="form-control-label" for="date1">Tahun Mobil</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                  <span class="input-group-text" @error('thn_m') style="border: 1px solid #fb6340;" @enderror><i class="ni ni-calendar-grid-58"></i></span>
                              </div>
                              <input name="thn_m" class="form-control datepicker-year-only @error('thn_m') is-invalid @enderror"  placeholder="Select date" type="number" value="{{ old('thn_m') }}">
                              @error('thn_m')
                              <div class="invalid-feedback">
                                {{ $message }}
                              </div>
                              @enderror
                            </div>
                          </div>
                         

                        </div>                                                                                                                                                                                                                  
      
                      </div>
                      <div class="pl-lg-4 row">

                        <div class="col-6">
                          <div class="form-group">
                            <label class="form-control-label" for="pelatMb">Nomor Pelat</label>
                            <input type="text" name="pl_mb" id="pelatMb" class="form-control @error('pl_mb') is-invalid @enderror" placeholder="..." value="{{ old('pl_mb') }}">
                            @error('pl_mb')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <label class="form-control-label" for="Millage">Millage</label>
                            <input type="number" name="Millage" id="Millage" class="form-control @error('Millage') is-invalid @enderror" placeholder="..." value="{{ old('Millage') }}">
                            @error('Millage')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <label class="form-control-label" for="Bagasi">Bagasi</label>
                            <input type="number" name="Bagasi" id="Bagasi" class="form-control @error('Bagasi') is-invalid @enderror" placeholder="..." value="{{ old('Bagasi') }}">
                            @error('Bagasi')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>
                        </div>

                      </div>

                      <hr class="my-4">                     
                      <h6 class="heading-small text-muted mb-4">Important Information</h6>

                      <div class="pl-lg-4 row">
                        
                        <div class="col-md-12 col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="st_mb">Set Status</label>
                            <select class="form-control" name="st_mb">                                            
                                <option>Tersedia</option>
                                <option>Tidak Tersedia</option>                                            
                            </select>
                          </div>
                        </div>
                        

                        <div class="col-md-12 col-lg-6">

                          <div class="form-group">
                            <label class="form-control-label" for="hs_ph">Harga Sewa Per/Hari</label>
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text" @error('hs_ph') style="border: 1px solid #fb6340;" @enderror >Rp.</span>
                              </div>
                              <input type="number" name="hs_ph" id="hs_ph" class="form-control @error('hs_ph') is-invalid @enderror" placeholder="..." value="{{ old('hs_ph') }}">                                
                            </div>
                            @error('hs_ph')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                          </div>

                        </div>                                                                                                                                                   
                       
                      </div>

                      <hr class="my-4">        
                      <h6 class="heading-small text-muted mb-4">Other</h6>
                      
                      <div class="pl-lg-4">                          
                          @if (count($data2) <= 0)
                          <div class="row">
                            <div class="col-8 mx-auto">
                              <div class="card text-center bg-white">

                                <div class="card-body">
                                  <h2 class="card-title text-black">Can't find a Tag that was added</h2>
                                  <p class="text-muted card-text">Please, add some Tag on <strong>Tag Manage</strong> Menu. for those Tag input will reveal at here.</p>
                                </div>

                              </div>
                            </div>
                          </div>
                          @endif
                          
                          <div class="row">

                            @foreach ($data2 as $tag)                                                            
                            <div class="col-lg-6 col-sm-12">

                              <div class="form-group">
                                <label class="form-control-label" for="{{ $tag->nama_tag . '_id' }}">{{ $tag->nama_tag }}</label>
                                <select class="form-control @error($tag->nama_tag . '_tag') is-invalid @enderror" id="{{ $tag->nama_tag . '_id' }}" name="{{ $tag->nama_tag . '_tag' }}">
                                  <option value="none">Unselected</option>
                                  @foreach ($data3 as $list)                                  
                                  @if ($tag->id == $list->tag_list_id)
                                  <option>{{ $list->contain }}</option>
                                  @endif                                  
                                  @endforeach
                                </select>                                
                                
                              </div>                              

                            </div>
                            @endforeach                            
      
                          </div>
      
                      </div>
      
                      <hr class="my-4">
                      <!-- Description -->
                      <h6 class="heading-small text-muted mb-4">Deskripsi Mobil</h6>
                      <div class="pl-lg-4">
                          <div class="form-group">
                            <label class="form-control-label">Deskripsi Mobil</label>
                            <textarea rows="4" name="desc_mb" class="form-control @error('desc_mb') is-invalid @enderror" placeholder="..."></textarea>
                            @error('desc_mb')
                            <div class="invalid-feedback">
                              {{ $message }}
                            </div>
                            @enderror
                          </div>
                      </div>
      
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                  
                </div>
              </div>
            </div>
          </form>
        </div>
      
      </div>
        
    </div>

  </div>
    
</div>