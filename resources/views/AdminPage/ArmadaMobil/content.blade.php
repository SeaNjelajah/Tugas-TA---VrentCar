@if (count($data1) == 0)
              
<div class="text-center position-absolute pt-6 w-100 h-100%" style="background-color: #d3d3d3; opacity: 0,5; height: 600px;">
  <span class="font-weight-bolder text-muted" style="font-size: 60px; font-variant: all-small-caps;">Tabel Empty</span>
</div>
              
@endif

<div class="container-fluid mt-1">

    <!-- core-of-contents -->

    <div class="container">
     
        <div class="row">
            <div class="col">
              @php $num = 1; @endphp
              
              @foreach ($data1 as $item)
              @php $tag_decode = json_decode($item->tag_mb, 1); @endphp
              <!-- table_row -->
        
              
                <div id="Card{{ $item->id }}" class="card text-center w-100 mb-2 mt-2" style="box-shadow: 0px 0px 15px 0px grey">
                  
                    <div class="card-header mt-1">
                        <ul class="nav nav-tabs card-header-tabs mt-n3">
                            <li class="nav-item">
                                <a class="nav-link active font-weight-bold">{{ $num }}</a>
                            </li>                            
                            
                            <li class="nav-item ml-auto">
                              @php $stat = $item->status; @endphp
                              <td><span class="font-weight-bold badge badge-pill badge-lg badge-{{ ($stat == 'Tersedia' ? $stat == 'Tidak Tersedia' ? 'danger' : 'success' : 'warning')  }}"><i class="ni ni-button-power mr-2"></i>{{ $stat }}</span></td>
                            </li>
                        </ul>
                    </div>
                  <div class="row text-center">
                    <div class="col-lg-4">                      
                      <img class="img-thumbnail rounded" src="/assets/img/dataImg/{{ $item->gmb_mb }}" alt="...">                                                   
                    </div>

                    <div class="col-lg-2 my-auto p-lg-0 p-md-3 p-sm-3">

                      <div class="p-1 p-lg-0"><a id="detailBtn{{ $item->id }}" class="btn btn-primary w-100 active" data-toggle="modal" data-target="#detailModal{{ $item->id }}">Detail</a></div>                                                   
                      <div class="p-1 p-lg-0 my-2"><a id="editBtn{{ $item->id }}" class="btn btn-light w-100 active" data-toggle="modal" data-target="#updateMobil{{ $item->id }}" >Edit</a></div>                        
                      
                      <form action="{{ Route('admin.ArmadaMobil.delete') }}" class="p-1 p-lg-0" method="POST">
                        @csrf      
                        <button id="delId{{ $item->id }}" type="submit" style="display: none;"></button>
                        <input type="hidden" name="itemId" value="{{ $item->id }}">
                        <input type="hidden" name="aftermath" value="{{ 'r'.(($num > 0) ? $num-1 : $num) }}">
                        <button type="button" class="btn btn-danger active w-100" onclick="SDel(this, 1)">Delete</button>
                      </form>
                    
                      <!-- Detail-Modal -->                                                               
                      <div style="scroll-behavior: smooth;" class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1" role="dialog"  aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Detail Mobil - {{ $item->nama_mb }}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              
                              <div class="row">
                                <a href="#text-detail{{ $item->id }}" type="button" class="btn btn-outline-primary ml-auto mr-3 mb-2"><i class="fas fa-arrow-down"></i><strong>GO-TO text</strong></a>
                                <div class="col-12 mx-auto">
                                  <img src="/assets/img/dataImg/{{ $item->gmb_mb }}" alt="...." class="img-thumbnail mb-4 align-self-center">
                                </div>
                                <div class="col-12 mx-auto" id="text-detail{{ $item->id }}">
                                  
                                  <table class="table mx-auto table-hover text-left table-bordered shadow table">                  
                                    <tbody class="text-center">

                                      <tr>
                                        <td class="d-flex">
                                          <h3 class="col-3 text-left">Nama</h3>
                                          <h3 class="col-1"> : </h3>
                                          <h3 class="col-8 ">{{ $item->nama_mb }}</h3>
                                        </td>                                      
                                      </tr>                                                                             
                                      <tr>
                                        <td class="d-flex">
                                          <h3 class="col-3 text-left">Nomer Pelat Mobil</h3>
                                          <h3 class="col-1"> : </h3>
                                          <h3 class="col-8 ">{{ $item->plat_mb }}</h3>
                                        </td>                                           
                                      </tr>
                                      <tr>
                                        <td class="d-flex">
                                          <h3 class="col-3 text-left">Jumlah Kursi</h3>
                                          <h3 class="col-1"> : </h3>
                                          <h3 class="col-8 ">{{ $item->jml_tp_d }}</h3>
                                        </td>                                           
                                      </tr>
                                      <tr>
                                        <td class="d-flex">
                                          <h3 class="col-3 text-left">Tahun Beli</h3>
                                          <h3 class="col-1"> : </h3>
                                          <h3 class="col-8 ">{{ $item->t_mb }}</h3>
                                        </td>                                        
                                      </tr>

                                      <tr>
                                        <td class="d-flex">
                                          <h3 class="col-3 text-left">Bagasi</h3>
                                          <h3 class="col-1"> : </h3>
                                          <h3 class="col-8 ">{{ $item->bagasi }}</h3>
                                        </td>                                        
                                      </tr>   

                                      <tr>
                                        <td class="d-flex">
                                          <h3 class="col-3 text-left">Millage</h3>
                                          <h3 class="col-1"> : </h3>
                                          <h3 class="col-8 ">{{ placeRp ($item->millage) }}</h3>
                                        </td>                                        
                                      </tr>   
                                      
                                      <tr>
                                        <td class="d-flex">
                                          <h3 class="col-3 text-left">Harga sewa Per-Hari</h3>
                                          <h3 class="col-1"> : </h3>
                                          <h3 class="col-8 ">Rp. {{ placeRp ($item->harga_mb) }}</h3>
                                        </td>                                        
                                      </tr>   
                                                                                                                  
                                    </tbody>                                    
                                  </table>
                                  
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

                                </div>				
                              </div>                    
                               
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-warning" onclick="OCModal('#detailModal{{ $item->id }}', '#editBtn{{ $item->id }}');">Edit</button>
                              <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                          </div>
                        </div>
                      </div>                      
                      <!-- /Detail-Modal -->
                      
                      <!-- Edit Modal -->
                      <form action="{{ Route('admin.ArmadaMobil.edit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="idForScroll" value="{{ "r" . $num }}">
                        <input type="hidden" name="modal" value="editBtn{{ $item->id }}">
                        <input type="hidden" name="editid" value="{{ $item->id }}">                        
                        <div class="modal fade" id="updateMobil{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h2 class="modal-title">Update {{ $item->nama_mb }}</h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              
                                <div class="modal-body text-left">
                                                  
                                  <hr class="my-4">
                                  <h6 class="heading-small text-muted mb-4">{{ $item->nama_mb }} information</h6>
                                  <div class="pl-lg-4 row clearfix">
            
                                      
                                    <div class="mx-auto col-md-12 col-lg-6">
                                      <div class="form-group">
                                        <figure class="figure">
                                          <img src="/assets/img/dataImg/{{ $item->gmb_mb }}" class="figure-img img-fluid rounded border" alt="Gambar Mobil" id="PreviewGMBUpdate">                                        
                                          <input class="form-control" value="" name="GMB" type="file" onchange="preview(this, '#PreviewGMBUpdate')">                                                            
                                        </figure>
                                      </div>
                                    </div>
                  
                                    <div class="col-md-12 col-lg-6 mt-n4">
                                                                                                                                          
                                      <div class="form-group">
                                        <label class="form-control-label" for="nm_mb">Nama</label>
                                        <input type="text" name="nm_mb" id="nm_mb" class="form-control @error('nm_mb', 'editf' . $item->id) is-invalid @enderror" placeholder="..." value="{{ ((old('nm_mb')) ? old('nm_mb') : $item->nama_mb) }}">
                                        @error('nm_mb', 'editf' . $item->id)
                                        <div class="invalid-feedback">
                                          {{ $message }}
                                        </div>
                                        @enderror
                                      </div>
            
                                      <div class="form-group">
                                        <label class="form-control-label" for="JumlahTD">Jumlah Tempat Duduk</label>
                                        <div class="input-group">
                                          <input type="text" value="{{ $item->jml_tp_d }}" class="form-control @error('jtd', 'editf' . $item->id) is-invalid @enderror" id="JumlahTD" name="jtd" value="{{ ((old('jtd')) ? old('jtd') : $item->jml_tp_d) }}">
                                          <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">Kursi</span>
                                          </div>
                                          @error('jtd', 'editf' . $item->id)
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
                                              <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                          </div>
                                          <input name="thn_m" class="form-control datepicker-year-only @error('thn_m', 'editf' . $item->id) is-invalid @enderror"  placeholder="Select date" type="text" value="{{ ((old('thn_m')) ? old('thn_m') : $item->t_mb) }}">
                                          @error('thn_m', 'editf' . $item->id)
                                          <div class="invalid-feedback">
                                            {{ $message }}
                                          </div>
                                          @enderror
                                        </div>
                                      </div>
                                      
                                      <div class="form-group">
                                        <label class="form-control-label" for="pelatMb">Nomor Pelat</label>
                                        <input type="text" name="pl_mb" id="pelatMb" class="form-control @error('pl_mb', 'editf' . $item->id) is-invalid @enderror" placeholder="..." value="{{ ((old('pl_mb')) ? old('pl_mb') : $item->plat_mb) }}">
                                        @error('pl_mb', 'editf' . $item->id)
                                        <div class="invalid-feedback">
                                          {{ $message }}
                                        </div>
                                        @enderror
                                      </div>
            
                                    </div>                                                                                                                                                                                                                  
                  
                                  </div>             
                                  
                                  <div class="pl-lg-4 row">

                                    <div class="col-6">
                                      <div class="form-group">
                                        <label class="form-control-label" for="pelatMb">Nomor Pelat</label>
                                        <input type="text" name="pl_mb" id="pelatMb" class="form-control @error('pl_mb', 'editf' . $item->id) is-invalid @enderror" placeholder="..." value="{{ ((old('pl_mb')) ? old('pl_mb') : $item->plat_mb) }}">
                                        @error('pl_mb', 'editf' . $item->id)
                                        <div class="invalid-feedback">
                                          {{ $message }}
                                        </div>
                                        @enderror
                                      </div>
                                    </div>
                                    
            
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label class="form-control-label" for="Millage">Millage</label>
                                        <input type="number" name="Millage" id="Millage" class="form-control @error('Millage', 'editf' . $item->id) is-invalid @enderror" placeholder="..." value="{{ ((old('Millage')) ? old('Millage') : $item->millage) }}">
                                        @error('Millage', 'editf' . $item->id)
                                        <div class="invalid-feedback">
                                          {{ $message }}
                                        </div>
                                        @enderror
                                      </div>
                                    </div>
            
                                    <div class="col-6">
                                      <div class="form-group">
                                        <label class="form-control-label" for="Bagasi">Bagasi</label>
                                        <input type="number" name="Bagasi" id="Bagasi" class="form-control @error('Bagasi', 'editf' . $item->id) is-invalid @enderror" placeholder="..." value="{{ ((old('Bagasi')) ? old('Bagasi') : $item->bagasi) }}">
                                        @error('Bagasi','editf' . $item->id)
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
                                              <option {{ (old('st_mb') == 'Tersedia') ? 'selected' : (( $stat == 'Tersedia') ? 'selected' : '') }} >Tersedia</option>
                                              <option {{ (old('st_mb') == 'Tidak tersedia') ? 'selected' : (( $stat == 'Tidak Tersedia') ? 'selected' : '') }} >Tidak Tersedia</option>                                            
                                          </select>
                                      </div>
                                    </div>

                                    <div class="col-md-12 col-lg-6">
                                      <div class="form-group">
                                        <label class="form-control-label" for="hs_ph">Harga Sewa Per/Hari</label>
                                        <div class="input-group">
                                          <div class="input-group-prepend">
                                            <span class="input-group-text" @error('hs_ph', 'editf' . $item->id) style="border: 1px solid #fb6340;" @enderror >Rp.</span>
                                          </div>
                                          <input type="number" value="{{ ((old('hs_ph')) ? old('hs_ph') : $item->harga_mb) }}" name="hs_ph" id="hs_ph" class="form-control @error('hs_ph', 'editf' . $item->id) is-invalid @enderror" placeholder="..." >                                
                                        </div>
                                        @error('hs_ph', 'editf' . $item->id)
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
                                            <select class="form-control" id="{{ $tag->nama_tag . '_id' }}" name="{{ $tag->nama_tag . '_tag' }}">
                                              <option value="none">unselected</option>
                                              @foreach ($data3 as $list)
                                              @if ($tag->id == $list->tag_list_id)                                                                            
                                              <option @if (!empty($tag_decode)) @foreach ($tag_decode as $k => $v) {{ ((old($tag->nama_tag . '_id') == $list->contain) ? 'selected' : (($tag->nama_tag == $k and $list->contain == $v) ? 'selected' : '')) }} @endforeach @endif >{{ $list->contain }}</option>
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
                                        <textarea rows="4" name="desc_mb" class="form-control @error('desc_mb', 'editf' . $item->id) is-invalid @enderror" placeholder="...">{{ ((old('desc_mb')) ? old('desc_mb') : $item->desc_mb) }}</textarea>
                                        @error('desc_mb', 'editf' . $item->id)
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
                      <!-- /Edit Modal -->

                    </div>

                    <div class="col-lg-6 d-block">
                      <div class="card col-lg-12 h-100">
                        <h3 class="card-header text-left pt-1 pb-0">Description: </h3>
                        <div class="card-body text-left text-black">                          
                          <div class="card-text font-weight-bold">{{ $item->desc_mb }}</div>
                        </div>
                      </div>                      
                    </div>

                  </div>

                </div>
              
        
        
              
              <!-- /table row -->
              @php $num++ @endphp
              @endforeach
              <!-- space-block -->
              @if (count($data1) == 1)
              <div class="row" style="opacity: 0;height: 30%; width: 100%;"></div>
              @endif
              <!-- /space-block -->
              
        
              <!-- footer -->
              @if(count($data1) > 0)
              <div class="row">
                  <div class="card mx-auto mt-auto mb-0 pb--1 w-100">
                    <div class="card-footer py-4">
                      <nav aria-label="...">
                        <ul class="pagination justify-content-end mb-0">
                          <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">
                              <i class="fas fa-angle-left"></i>
                              <span class="sr-only">Previous</span>
                            </a>
                          </li>
                          <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                          </li>
                          <li class="page-item">
                            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                          </li>
                          <li class="page-item"><a class="page-link" href="#">3</a></li>
                          <li class="page-item">
                            <a class="page-link" href="#">
                              <i class="fas fa-angle-right"></i>
                              <span class="sr-only">Next</span>
                            </a>
                          </li>
                        </ul>
                      </nav>
                    </div>
                  </div>
              </div>
              @endif
              <!-- end footer -->
        
            </div>
        </div>

    </div>

    <!-- /core-of-contents -->

    
</div>