   <div class="mt-0 contained-fluid">



       @if (empty($users))

       <div class="container m-0 p-0">
           <div class="text-center position-absolute pt-6 w-100 h-100%" style="background-color: #d3d3d3; opacity: 0,5; height: 600px;">
               <span class="font-weight-bolder text-muted" style="font-size: 60px; font-variant: all-small-caps;">Tabel Empty</span>
           </div>
       </div>

       @else

       <div class="container">

           <div class="card mt-3">

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

                       </tbody>
                   </table>

               </div>

           </div>
       </div>



       @endif

   </div>


   </div>