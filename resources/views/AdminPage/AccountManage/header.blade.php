<div class="header pb-1" style="background-color: #01d28e;">
 
  
    <div class="container-fluid">
  
      <div class="header-body">
  
        <div class="row align-items-center py-4">
  
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Account Manager</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Display</a></li>
                <li class="breadcrumb-item active" aria-current="page">Account Manager</li>
              </ol>
            </nav>
          </div>
          
          <div class="col-lg-6 col-5 text-right">
            <a id="createSupirbtn" class="btn btn-sm btn-neutral text-primary" data-toggle="modal" data-target="#createSupir">New</a>

            
            <!-- Modal -->
            <form action="{{ route('admin.AccountManage.create') }} " method="POST" enctype="multipart/form-data">
              @csrf
              
              <input type="hidden" name="modal" value="createSupirbtn">
              <div class="modal fade" id="createSupir" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h2 class="modal-title" >Form User Baru</h2>
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
                                        <img id="Preview" src="{{ asset('assets/img/users/NoUserPic.png') }}" class="figure-img img-fluid rounded border" alt="Gambar Supir">                                        
                                        <input class="form-control" name="foto_profil" type="file" set="preview" to="#Preview">                                                            
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
                                     
                                                                                        
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
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