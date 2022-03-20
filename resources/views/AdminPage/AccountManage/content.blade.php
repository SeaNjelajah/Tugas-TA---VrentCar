   <div class="mt--8 contained-fluid">



       @if (empty($users))

       <div class="container m-0 p-0">
           <div class="text-center position-absolute pt-6 w-100 h-100%" style="background-color: #d3d3d3; opacity: 0,5; height: 600px;">
               <span class="font-weight-bolder text-muted" style="font-size: 60px; font-variant: all-small-caps;">Tabel Empty</span>
           </div>
       </div>

       @else

       <div class="container">

           <div class="card mt-3">
               
                <div class="card-header m-0">
                    <div class="row p-0 m-0">
                        
                        <div class="col-auto align-middle align-item-center text-lg text-dark">
                            Tabel User
                        </div>

                        <div class="ml-auto col-3 p-0 m-0">
                            <form method="GET">
                                <div class="row">

                                    <div class="form-group m-0 p-0">
                                        <input type="text" name="search" class="form-control" placeholder="Cari User" value="{{ Request::get('search') }}">
                                    </div>
    
                                    <button class="btn btn-primary">Search</button>
                                </div>
                            </form>
                        </div>

                        <div class="col-auto  ml-2">
                            <button id="createSupirbtn" class="btn h-100 btn-primary text-white" data-toggle="modal" data-target="#createSupir">Baru</button>
                        </div>

                    </div>
                </div>

               <div class="card-body">

                   <table class="table align-items-center table-hover">
                       <thead class="thead-light">
                           <tr class="text-center">
                               <th scope="col" class="sort ">id</th>
                               <th scope="col" class="sort" data-sort="name">Username</th>
                               <th scope="col" class="sort" data-sort="budget">Group</th>
                               <th scope="col" class="sort" data-sort="status">Created Date</th>

                               <th scope="col" class="sort text-center" data-sort="completion">Data Lainnya</th>
                               <th scope="col" class="sort" >Option</th>
                           </tr>
                       </thead>
                       <tbody class="list">
                        
                        @foreach ($users as $user)
                            
                        
                           <tr class="text-center border border-top-0 border-bottom-0r">
                               <th>
                                   <span>{{ $user->id }}</span>
                               </th>

                               <td>
                                   <div class="media align-items-center">
                                     @if (empty($user->foto_profil))
                                    <a href="#" class="avatar rounded-circle mr-3" rel="popover" data-img="{{ asset('assets/img/users/NoUserPic.png') }}">

                                      <img alt="Image placeholder" src="{{ asset('assets/img/users/NoUserPic.png') }}">

                                    </a>
                                    @else
                                    <a href="#" class="avatar rounded-circle mr-3" rel="popover" data-img="{{ asset('assets/img/users/' . $user->foto_profil) }}">

                                      <img alt="Image placeholder" src="{{ asset('assets/img/users/' . $user->foto_profil) }}">

                                    </a>
                                    @endif

                                       <div class="media-body text-left">
                                           <span class="name mb-0 text-md">{{ $user->username }}</span>
                                       </div>
                                   </div>
                               </td>

                               <td>
                                {{ $user->group }}
                               </td>

                               <td>
                                  {{ $user->created_at ?  $user->created_at : "Null" }}
                               </td>

                               <td>
                                   @php
                                    if ($user->group == "admin")
                                        $data_lain_check = $user->admin()->first() or false;
                                    else if ($user->group == "member")
                                        $data_lain_check = $user->member()->first() or false;
                                    else if ($user->group == "karyawan")
                                        $data_lain_check = $user->karyawan()->first() or false;
                                   @endphp
                                   
                                    @if ($data_lain_check)
                                    <i class="fas fa-check text-green"></i> Ada
                                    @else
                                    <i class="fas fa-circle-xmark text-red"></i> Tidak ada
                                    @endif
                               </td>

                               <td class="text-center">
                                @if ($user->group == "admin")

                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#EditAdmin{{ $user->id }}"><i class="fas fa-pencil"></i></button>
                                

                                @elseif ($user->group == "member")
                                
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#EditMember{{ $user->id }}"><i class="fas fa-pencil"></i></button>
                                

                                @else
                                
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#EditKaryawan{{ $user->id }}"><i class="fas fa-pencil"></i></button>
                                

                                @endif


                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-trash"></i></button>
                                
                               </td>

                           </tr>

                            @if ($user->group == "admin")
                                @include('AdminPage.AccountManage.modalEditAdmin')
                            @elseif ($user->group == "member")
                                @include('AdminPage.AccountManage.modalEditMember')
                            @else
                                @include('AdminPage.AccountManage.modalEditKaryawan')  
                            @endif

                            
                    
                            @endforeach

                            @empty($users)
                            
                            <tr class="text-center border border-top-0 border-bottom-0r">
                                <th>
                                    <span>0</span>
                                </th>
 
                                <td>
                                    <div class="media align-items-center">
                                     
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="No Data" class="avatar rounded-circle mr-3"  data-img="{{ asset('assets/img/users/NoUserPic.png') }}">
                                        <img alt="Image placeholder" src="{{ asset('assets/img/users/NoUserPic.png') }}">
                                        </a>

                                        <div class="media-body text-left">
                                            <span class="name mb-0 text-md">No Data</span>
                                        </div>
                                     
                                    </div>
                                   
                                </td>
 
                                <td>
                                 No Data
                                </td>
 
                                <td>
                                    No Data
                                </td>
 
                                <td>
                                    <i class="fas fa-circle-xmark text-red"></i> No Data
                                </td>
 
                                <td class="text-center">
                                 
                                 <button class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="No Data" ><i class="fas fa-pencil"></i></button>
                                 
                                 <button class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="No Data"><i class="fas fa-trash"></i></button>
                                 
                                </td>
 
                            </tr>

                            @endempty


                       </tbody>
                   </table>

               </div>

           </div>

       </div>

       @endif

        <!-- Modal Buat User Baru-->
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