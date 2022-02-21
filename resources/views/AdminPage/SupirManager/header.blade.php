<div class="header pb-1" style="background-color: #01d28e;">
 
  
    <div class="container-fluid">
  
      <div class="header-body">
  
        <div class="row align-items-center py-4">
  
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Supir Manager</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Display</a></li>
                <li class="breadcrumb-item active" aria-current="page">Supir Manager</li>
              </ol>
            </nav>
          </div>
          
          <div class="col-lg-6 col-5 text-right">
            <a id="createSupirbtn" class="btn btn-sm btn-neutral text-primary" data-toggle="modal" data-target="#createSupir">New</a>
            <a href="#" class="btn btn-sm btn-neutral">Filters</a>
            
            <!-- Modal -->
            <form action="{{ Route('SupirManagerAdd') }}" method="POST" enctype="multipart/form-data">
              @csrf
              
              <input type="hidden" name="modal" value="createSupirbtn">
              <div class="modal fade" id="createSupir" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h2 class="modal-title" >Form Supir Baru</h2>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    
                      <div class="modal-body text-left">
                                        
                        <hr class="my-4">
                        <h6 class="heading-small text-muted mb-4">Informasi Supir</h6>
                        <div class="pl-lg-4 row clearfix">
  
                            <div class="float-left w-50">
                                <div class="form-group">
                                    <figure class="figure">
                                        <img id="PreviewSupir" src="assets/img/dataImg/NoImageA.png" class="figure-img img-fluid rounded border" alt="Gambar Supir">                                        
                                        <input class="form-control" name="GMB" type="file" onchange="preview(this, '#PreviewSupir')">                                                            
                                    </figure>
                                </div>
                            </div>
                          
        
                            <div class="col-md-6 mt-n4">
                                                                                                                                
                                <div class="form-group">
                                <label class="form-control-label" for="nm_sp">Nama</label>
                                <input type="text" name="nm_sp" id="nm_sp" class="form-control @error('nm_sp') is-invalid @enderror" placeholder="..." value="{{ old('nm_sp') }}">
                                @error('nm_sp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-control-label" for="al_r">Alamat Rumah</label>
                                    <input type="text" name="al_r" id="al_r" class="form-control @error('al_r') is-invalid @enderror" placeholder="..." value="{{ old('al_r') }}">
                                    @error('al_r')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                            

                                <div class="form-group">
                                    <label class="form-control-label" for="al_r">Nomor hp</label>
                                    <input type="number" name="n_hp" id="n_hp" class="form-control @error('n_hp') is-invalid @enderror" placeholder="..." value="{{ old('n_hp') }}">
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
                                        <span class="input-group-text"  @error('gaji') style="border: 1px solid #fb6340;" @enderror>Rp.</span>
                                      </div>
                                      <input type="number" name="gaji" id="gaji" class="form-control @error('gaji') is-invalid @enderror" placeholder="..." value="150000">                                
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
                                            <option>Siap</option>
                                            <option>Tidak Tersedia</option>                                            
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
                    
                  </div>
                </div>
              </div>
            </form>
          </div>
        
        </div>
          
      </div>
  
    </div>
      
</div>