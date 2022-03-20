<form action="{{ Route('admin.ArmadaMobil.edit') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="idForScroll" value="{{ "r" . $num }}">
    <input type="hidden" name="modal" value="editBtn{{ $item->id }}">
    <input type="hidden" name="editid" value="{{ $item->id }}">
    <div class="modal fade" id="updateMobil{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Update {{ $item->nama }}</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body text-left">

                    <hr class="my-4">
                    <h6 class="heading-small text-muted mb-4">{{ $item->nama }} information</h6>
                    <div class="pl-lg-4 row clearfix">


                        <div class="mx-auto col-md-12 col-lg-6">
                            <div class="form-group">
                                <figure class="figure">
                                    <img src="{{ asset('/assets/img/cars/'. $item->gambar)  }}" class="figure-img img-fluid rounded border" alt="Gambar Mobil" id="PreviewUpdate">
                                    <input class="form-control"name="gambar" type="file" set="preview" to="#PreviewUpdate">
                                </figure>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-6 mt-n4">

                            <div class="form-group">
                                <label class="form-control-label" for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control @error('nama', 'editf' . $item->id) is-invalid @enderror" placeholder="..." value="{{  $item->nama }}">
                                @error('nama', 'editf' . $item->id)
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-control-label" for="jumlah_kursi">Jumlah Tempat Duduk</label>
                                <div class="input-group">
                                    <input type="text" value="{{ $item->jumlah_kursi }}" class="form-control @error('jumlah_kursi', 'editf' . $item->id) is-invalid @enderror" id="jumlah_kursi" name="jumlah_kursi" value="{{  $item->jumlah_kursi }}">
                                    <div class="input-group-append">
                                        <span class="input-group-text" id="basic-addon2">Kursi</span>
                                    </div>
                                    @error('jumlah_kursi', 'editf' . $item->id)
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
                                    <input name="tahun" class="form-control datepicker-year-only @error('tahun', 'editf' . $item->id) is-invalid @enderror" placeholder="Select date" type="text" value="{{ $item->tahun }}">
                                    @error('tahun', 'editf' . $item->id)
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
                                <label class="form-control-label" for="pelat">Nomor Pelat</label>
                                <input type="text" name="pelat" id="pelat" class="form-control @error('pelat', 'editf' . $item->id) is-invalid @enderror" placeholder="..." value="{{ $item->pelat }}">
                                @error('pelat', 'editf' . $item->id)
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>


                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-control-label" for="millage">Mill age</label>
                                <input type="number" name="millage" id="millage" class="form-control @error('millage', 'editf' . $item->id) is-invalid @enderror" placeholder="..." value="{{ $item->millage }}">
                                @error('Millage', 'editf' . $item->id)
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-control-label" for="kapasitas_koper">kapasitas_koper</label>
                                <input type="number" name="kapasitas_koper" id="kapasitas_koper" class="form-control @error('kapasitas_koper', 'editf' . $item->id) is-invalid @enderror" placeholder="..." value="{{  $item->kapasitas_koper }}">
                                @error('kapasitas_koper','editf' . $item->id)
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
                                    <option {{ ($item->transmisi()->first()->id == $v->id) ? "selected" : "" }} value="{{ $v->id }}">{{ $v->nama_transmisi }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="tipe_sewa">Tipe Sewa</label>
                                <select class="form-control" name="tipe_sewa">
                                    @foreach ($tipe_sewa as $v)
                                    <option {{ ($item->tipe_sewa()->first()->id == $v->id) ? "selected" : "" }} value="{{ $v->id }}">{{ $v->tipe_sewa }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="jenis_mobil">Jenis Mobil</label>
                                <select class="form-control" name="jenis_mobil">
                                    @foreach ($jenis_mobil as $v)
                                    <option {{ ($item->jenis_mobil()->first()->id == $v->id) ? "selected" : "" }} value="{{ $v->id }}">{{ $v->jenis_mobil }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        

                        <div class="col-md-12 col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="harga">Harga Sewa Per/Hari</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" @error('harga', 'editf' . $item->id) style="border: 1px solid #fb6340;" @enderror >Rp.</span>
                                    </div>
                                    <input type="number" value="{{ $item->harga }}" name="harga" id="harga" class="form-control @error('harga', 'editf' . $item->id) is-invalid @enderror" placeholder="...">
                                </div>
                                @error('harga', 'editf' . $item->id)
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
                                    <option {{ ( $stat == 'Tersedia') ? 'selected' : '' }}>Tersedia</option>
                                    <option {{ ( $stat == 'Tidak Tersedia') ? 'selected' : '' }}>Tidak Tersedia</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="merek">Merek</label>
                                <select class="form-control" name="merek">
                                    
                                    @foreach ($mereks as $merek)
                                        <option {{ ( $item->id_merek == $merek->id) ? 'selected' : '' }} value="{{ $merek->id }}" >{{ $merek->merek }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                    </div>



                    {{-- <hr class="my-4">

                    <h6 class="heading-small text-muted mb-4">Other</h6>

                    <div class="pl-lg-4">
                        @if (true)
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

                    </div> --}}

                    <hr class="my-4">
                    <!-- Description -->
                    <h6 class="heading-small text-muted mb-4">Deskripsi Mobil</h6>
                    <div class="pl-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Deskripsi Mobil</label>
                            <textarea rows="4" name="desc_mb" class="form-control @error('desc_mb', 'editf' . $item->id) is-invalid @enderror" placeholder="...">{{ $item->desc_mb }}</textarea>
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