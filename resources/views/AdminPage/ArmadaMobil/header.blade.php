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
                     <!-- Modal Button -->
                    <a id="createMobilbtn" class="btn btn-sm btn-neutral text-primary" data-toggle="modal" data-target="#createMobil">New</a>
                    <a href="#" class="btn btn-sm btn-neutral">Filters</a>

                    <!-- Modal Button -->



                </div>

            </div>

        </div>

    </div>

</div>

{{-- Modal Section  --}}
{{-- Buat Modal Baru --}}



<div class="modal fade" id="createMobil" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <form action="{{ Route('admin.ArmadaMobil.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="modal" value="createMobilbtn">
            <div class="modal-content">

                <div class="modal-header">
                    <h2 class="modal-title">Tambah Mobil Baru</h2>
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
                                    <img src="{{ asset('assets/img/cars/NoImageA.png')}}" class="figure-img img-fluid rounded border" alt="Gambar Mobil" id="previewGambarMobil">
                                    <input class="form-control" name="gambar" type="file" onchange="preview(this, '#previewGambarMobil')">
                                </figure>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-6 mt-n4">

                            <div class="form-group">
                                <label class="form-control-label" for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="..." value="{{ old('nama') }}">
                                @error('nama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label" for="JumlahTD">Jumlah Tempat Duduk</label>
                                <div class="input-group">
                                    <input type="number" class="form-control @error('jumlah_kursi') is-invalid @enderror" id="JumlahTD" name="jumlah_kursi" value="{{ old('jumlah_kursi') }}">
                                    <div class="input-group-append" >
                                        <span class="input-group-text" id="basic-addon2" @error('jumlah_kursi') style="border: 1px solid #fb6340;" @enderror>Kursi</span>
                                    </div>
                                    
                                    @error('jumlah_kursi')
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
                                        <span class="input-group-text" @error('tahun') style="border: 1px solid #fb6340;" @enderror><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input name="tahun" class="form-control datepicker-year-only @error('tahun') is-invalid @enderror" placeholder="Select date" type="number" value="{{ old('tahun') }}">
     
                                    @error('tahun')
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
                                <input type="text" name="pelat" id="pelatMb" class="form-control @error('pelat') is-invalid @enderror" placeholder="..." value="{{ old('pelat') }}">
                                @error('pelat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-control-label" for="millage">Mill Age</label>
                                <input type="number" name="millage" id="millage" class="form-control @error('millage') is-invalid @enderror" placeholder="..." value="{{ old('millage') }}">
                                @error('millage')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-control-label" for="kapasitas_koper">Kapasitas Koper</label>
                                <input type="number" name="kapasitas_koper" id="kapasitas_koper" class="form-control @error('kapasitas_koper') is-invalid @enderror" placeholder="..." value="{{ old('kapasitas_koper') }}">
                                @error('kapasitas_koper')
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
                                <label class="form-control-label" for="jenis_transmisi">Jenis Transmisi Mesin</label>
                                <select class="form-control" name="jenis_transmisi">
                                    @foreach ($transmisi as $v)
                                        <option value="{{ $v->id }}" >{{ $v->nama_transmisi }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="tipe_sewa">Tipe Sewa</label>
                                <select class="form-control" name="tipe_sewa">
                                    @foreach ($tipe_sewa as $v)
                                        <option value="{{ $v->id }}" >{{ $v->tipe_sewa }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        

                        
                        <div class="col-md-12 col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="jenis_mobil">Jenis Mobil</label>
                                <select class="form-control" name="jenis_mobil">
                                    @foreach ($jenis_mobil as $v)
                                        <option value="{{ $v->id }}" >{{ $v->jenis_mobil }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        

                        <div class="col-md-12 col-lg-6">

                            <div class="form-group">
                                <label class="form-control-label" for="harga">Harga Sewa Per/Hari</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" @error('harga') style="border: 1px solid #fb6340;" @enderror>Rp.</span>
                                    </div>
                                    <input type="number" name="harga" id="harga" class="form-control @error('harga') is-invalid @enderror" placeholder="..." value="{{ old('harga') }}">
                                </div>
                                @error('harga')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                        </div>


                        <div class="col-md-12 col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="status">Set Status</label>
                                <select class="form-control" name="status">
                                    <option>Tersedia</option>
                                    <option>Tidak Tersedia</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <hr class="my-4">
                    <h6 class="heading-small text-muted mb-4">Other</h6>

                    @if (true)
                    <div class="pl-lg-4">
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
                    </div>
                    @endif
                

                    <hr class="my-4">
                    <!-- Description -->
                    <h6 class="heading-small text-muted mb-4">Deskripsi Mobil</h6>
                    <div class="mx-lg-auto ">
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
            
        </form>
    </div>
</div>
