<form action="{{ route('admin.AccountManage.update.member') }}" method="POST" enctype="multipart/form-data" >
    @csrf
    <input type="hidden" name="id" value="{{ $user->id }}">
    <input type="hidden" name="modal" value="EditMember{{ $user->id }}">
    <div class="modal fade" id="EditMember{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h2 class="modal-title" >Form Member</h2>
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
                              <img id="PreviewMember{{ $user->id }}" src="{{ asset('assets/img/users/' . ((!empty($user->foto_profil)) ? $user->foto_profil : 'NoUserPic.png')) }}" class="figure-img img-fluid rounded border" alt="Foto Profil">                                        
                              <input class="form-control" name="foto_profil" type="file" set="preview" to="#PreviewMember{{ $user->id }}">                                                            
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
                          <input type="text" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Isi untuk mengganti Password" value="{{ old('password') }}">
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
              @php
              $member = $user->member()->first() or false;
              @endphp
              <div class="pl-lg-4 row">

                <div class="col-12">

                  <div class="form-group">
                    <label class="form-control-label" for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror" placeholder="Nama Lengkap" value="@if($member){{ $member->nama_lengkap }}@endif">
                    @error('nama_lengkap')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                  
                </div>
                
                <div class="col-12">

                  <div class="form-group">
                    <label class="form-control-label" for="alamat_rumah">Alamat Rumah</label>
                    <input type="text" name="alamat_rumah" id="alamat_rumah" class="form-control @error('alamat_rumah') is-invalid @enderror" placeholder="Alamat Rumah" value="@if($member){{ $member->alamat_rumah }}@endif">
                    @error('alamat_rumah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>

                </div>

                {{-- <div class="form-group">
                    <figcaption for="gambar_ktp" class="form-control-label">Gambar Ktp</label>
                    <figure class="figure text-center">
                        <img id="Preview_gambar_ktp{{ $user->id }}" src="{{ asset('assets/img/ktp/NoImageA.png') }}" class="figure-img img-fluid rounded border" alt="Gambar KTP">                                        
                        <input class="form-control" name="gambar_ktp" type="file" set="preview" to="#Preview_gambar_ktp{{ $user->id }}">                                                            
                    </figure>
                </div> --}}

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