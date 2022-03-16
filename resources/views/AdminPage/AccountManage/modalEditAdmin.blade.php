<form action="#" method="POST" enctype="multipart/form-data">
    @csrf
    
    <input type="hidden" name="modal" value="EditAdmin{{ $user->id }}">
    <div class="modal fade" id="EditAdmin{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" >Form Admin</h2>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          
            <div class="modal-body text-left">
                              
              <hr class="my-4">
              <h6 class="heading-small text-muted mb-4">Informasi User</h6>
              <div class="pl-lg-4 row clearfix">

                  <div class="float-left w-50">
                      <div class="form-group">
                          <figure class="figure text-center">
                              <img id="Preview_Profil{{ $user->id }}" src="{{ asset('assets/img/users/NoUserPic.png') }}" class="figure-img img-fluid rounded border" alt="Foto Profil">                                        
                              <input class="form-control" name="gambar" type="file" set="preview" to="#Preview_Profil{{ $user->id }}">                                                            
                          </figure>
                      </div>
                  </div>
                

                  <div class="col-md-6 mt-n4">
                                                                                                                      
                      <div class="form-group">
                      <label class="form-control-label" for="username">Username</label>
                      <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" value="{{ old('username') }}">
                      @error('username')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                      </div>
                      
                      <div class="form-group">
                          <label class="form-control-label" for="email">Email</label>
                          <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}">
                          @error('email')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>

                  

                      <div class="form-group">
                          <label class="form-control-label" for="password">Password</label>
                          <input type="text" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" value="{{ old('password') }}">
                          @error('password')
                          <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                          @enderror
                      </div>                                

                  </div>                                                        
                 

              </div>

              <div class="pl-lg-4 row">

                <div class="col-12">

                  <div class="form-group">
                    <label for="group" class="form-control-label">User Group</label>
                    <select name="group" class="form-control">
                      <option>member</option>
                      <option>karyawan</option>
                      <option>admin</option>
                    </select>
                  </div>

                </div>

              </div>

              <hr class="my-4">
              <h6 class="heading-small text-muted mb-4">Data Lain</h6>
              <div class="pl-lg-4 row">

                <div class="form-group">
                  <label for="foto_diri" class="form-control-label">Foto Diri</label>
                    <figure class="figure text-center">
                        <img id="Preview_foto_diri{{ $user->id }}" src="{{ asset('assets/img/foto-diri/NoImageA.png') }}" class="figure-img img-fluid rounded border" alt="Foto Diri">                                        
                        <input class="form-control" name="foto_diri" type="file" set="preview" to="#Preview_foto_diri{{ $user->id }}">                                                           
                    </figure>
                </div>


              </div>
                           
                                                                              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          
        </div>
      </div>
    </div>
</form>