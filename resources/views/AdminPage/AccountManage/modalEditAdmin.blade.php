<form action="{{ route('admin.AccountManage.update.admin') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $user->id }}">
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
                              <img id="Preview_Profil{{ $user->id }}" src="{{ asset('assets/img/users/' . ((!empty($user->foto_profil)) ? $user->foto_profil : 'NoUserPic.png')) }}" class="figure-img img-fluid rounded border" alt="Foto Profil">                                        
                              <input class="form-control" name="foto_profil" type="file" set="preview" to="#Preview_Profil{{ $user->id }}">                                                            
                          </figure>
                      </div>
                  </div>
                

                  <div class="col-md-6 mt-n4">
                                                                                                                      
                      <div class="form-group">
                      <label class="form-control-label" for="username">Username</label>
                      <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" value="{{ $user->username }}">
                      @error('username')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                      </div>
                      
                      <div class="form-group">
                          <label class="form-control-label" for="email">Email</label>
                          <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ $user->email }}">
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

                      <option @if ($user->group == 'member') selected @endif>member</option>
                      <option @if ($user->group == 'karyawan') selected @endif>karyawan</option>
                      <option @if ($user->group == 'admin') selected @endif>admin</option>

                    </select>
                  </div>

                </div>

              </div>

              <hr class="my-4">
              <h6 class="heading-small text-muted mb-4">Data Lain</h6>
              <div class="row">

                @php
                    $admin = $user->admin()->first() or false;
                @endphp

                <div class="form-group text-center col">
                  <label for="foto_diri" class="form-control-label">Foto Diri</label>

                    <figure class="figure">

                      @if ($admin and !empty($admin->foto_diri))
                        <img id="Preview_foto_diri{{ $user->id }}" src="{{ asset('assets/img/foto-diri/' . $admin->foto_diri) }}" class="figure-img img-fluid rounded border" alt="Foto Diri">
                      @else
                      <img id="Preview_foto_diri{{ $user->id }}" src="{{ asset('assets/img/foto-diri/NoImageA.png') }}" class="figure-img img-fluid rounded border" alt="Foto Diri">
                      @endif

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