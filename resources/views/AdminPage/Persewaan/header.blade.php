<div class="header pb-0 mb-3" style="background-color: #01D28E;">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Persewaan</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Persewaan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Display</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="#" id="tambahPm" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#tambahPesanan">New</a>
                    <a href="#" class="btn btn-sm btn-neutral">Filters</a>

                    <!-- /.tambah pesanan Baru Modal -->
                    @if (session()->get('pesananADD'))
                    @php $arr = collect(session()->all()); @endphp
                    @endif
                    <div class="modal fade" id="tambahPesanan" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-secondary modal-dialog-centered modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title">Form tambah pesanan baru</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true" class="text-black">X</span>
                                    </button>
                                </div>

                                <div class="modal-body">

                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">


                                                <div class="col-sm-12 col-lg-{{(session()->get('pesananADD')) ? '12' : '4' }}">
                                                    <div class="card w-100">
                                                        <img id="previewImg" class="card-img-top" src="assets/img/dataImg/{{ old('gmbM') ? old('gmbM') : 'NoImageA.png' }}">
                                                        <div class="card-body text-left">
                                                            <h3 class="card-title mb-0 mt-1">
                                                                <span>{{ old('namaMB') }}</span>
                                                            </h3>
                                                            <p class="card-text">{{ old('descM') }}.</p>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-lg-8 h-100 {{(session()->get('pesananADD')) ? 'd-none' : '' }}">
                                                    <div class="card" style="width: 100%">
                                                        <div class="card-header d-flex">
                                                            <h3 class="card-title">Tabel Mobil</h3>

                                                            <div class="card-tools ml-auto">
                                                                <div class="input-group input-group-sm" style="width: 150px;">
                                                                    <input type="text" name="table_search" class="form-control" placeholder="Search">

                                                                    <div class="input-group-append">
                                                                        <button type="submit" class="btn btn-default">
                                                                            <i class="fas fa-search"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="card-body table-responsive p-0 overflow-auto" style="max-height: 350px;">
                                                            <table class="table table-hover text-nowrap">
                                                                @if (empty($data1->all()))
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center text-muted fs-2">table is empty</th>
                                                                    </tr>
                                                                </thead>
                                                                @else
                                                                <thead>
                                                                    <tr>
                                                                        <th class="position-relative mr-n4">Select</th>
                                                                        <th>Nama</th>
                                                                        <th>Sewa / Hari</th>
                                                                        <th>Jumlah <i class="fas fa-chair"></i></th>
                                                                        <th>No. Pelat</th>
                                                                        <th class="text-center">Tags <i class="fas fa-tags"></i></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    @foreach ($data1 as $item)
                                                                    @php $tag_decode = json_decode($item->tag_mb, 1) @endphp
                                                                    @if ($item->status == "Tersedia")
                                                                    <tr class="text-center align-middle">
                                                                        <td class="p-0 align-middle">
                                                                            <input type="hidden" name="descM" value="{{ $item->desc_mb }}">
                                                                            <input type="hidden" name="gmbM" value="{{ $item->gmb_mb }}">
                                                                            <input type="hidden" name="namaMB" value="{{ $item->nama_mb }}">
                                                                            <input type="hidden" name="hargaMB" value="{{ $item->harga_mb }}">
                                                                            <input type="hidden" name="NoMb" value="{{ $item->id }}">
                                                                            <input type="hidden" name="clickL" value="list{{ $item->id }}">
                                                                            <a id="list{{ $item->id }}" onclick="sendTopreview(this, '#previewImg');" class="mx-auto btn btn-warning btn-sm h-100 text-white"><strong>></strong></a>
                                                                        </td>
                                                                        <td class="align-middle">{{ $item->nama_mb }}</td>
                                                                        <td class="align-middle">Rp. {{ placeRp($item->harga_mb) }}</td>
                                                                        <td class="align-middle">{{ $item->jml_tp_d }}</td>
                                                                        <td class="align-middle">{{ $item->plat_mb }}</td>
                                                                        <td class="{{ (empty($tag_decode)) ? '' : 'p-0' }}">
                                                                            @if (empty($tag_decode))
                                                                            <h4 class="text-muted my-auto">this row haven't any tags</h4>
                                                                            @else
                                                                            @foreach ($tag_decode as $k => $v)
                                                                            <div class="col text-center mx-1">
                                                                                <h3 class="row mt-1 mb-1 d-inline-block">
                                                                                    <span class="badge rounded-pill bg-secondary badge-lg">
                                                                                        <i class="fa fa-tag"></i>
                                                                                        {{ $k }}
                                                                                    </span>
                                                                                </h3>
                                                                                <div class="row mb-1 d-block">{{ $v }}</div>
                                                                            </div>
                                                                            @endforeach
                                                                            @endif
                                                                        </td>
                                                                    </tr>
                                                                    @endif
                                                                    @endforeach
                                                                </tbody>
                                                                @endif
                                                            </table>
                                                        </div>
                                                        <!-- /.card-body -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <form id="formPesanan" action="{{ (session()->get('pesananADD')) ? route('addPesanan') : route('HitungPesanan') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if (session()->get('pesananADD')) <input type="hidden" name="NoMb" value="{{ old('NoMb') }}"> @endif
                                        <input type="hidden" name="ClickM" value="tambahPm">
                                        <div class="card text-left">

                                            <div class="card-body">
                                                <div class="row d-block px-2">
                                                    <div class="form-group">
                                                        <label for="catatan" class="mx-auto d-block"><span class="subheading" style="color: #01d28e">Harga Sewa</span></label>

                                                        <div class="container content-center">

                                                            <div class="row">
                                                                <div class="col">
                                                                    <p>Harga sewa Perhari</p>
                                                                </div>
                                                                <div class="col">
                                                                    <p id="hargaPreview" style="color: orangered">
                                                                        @if (session()->get('pesananADD')) {{ "Rp " . placeRp($arr->get('harga_hari')) }} @endif
                                                                    </p>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="form-group">
                                                        <label for="nama-customer" class="col-form-label">Nama Lengkap:</label>
                                                        <input class="form-control @error('nama_customer') is-invalid @enderror" {{ (old('nama_customer')) ? "" : "disabled"  }} type="text" value="{{ old('nama_customer') }}" name="nama_customer" class="form-control" id="nama-customer">
                                                        @error('nama_customer')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nomer" class="col-form-label">Nomer Telepon / Whatsapp:</label>
                                                        <input class="form-control @error('nomer') is-invalid @enderror" {{ (old('nomer')) ? "" : "disabled"  }} type="number" value="{{ old('nomer') }}" name="nomer" class="form-control" id="nomer">
                                                        @error('nomer')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tanggal-sewa" class="col-form-label">Tanggal & Waktu Pengambilan: </label>
                                                        <div class="form-group row px-3">
                                                            <input daterange="date" date-range-target="#Pengembalian" class="col mr-3 form-control @error('tgl_sewa') is-invalid @enderror" {{ (old('tgl_sewa')) ? "" : "disabled"  }} type="date" value="{{ old('tgl_sewa') }}" name="tgl_sewa" class="form-control" min="@once{{ Carbon\Carbon::now()->toDateTimeLocalString('minute'); }}@endonce" id="tanggal-sewa">

                                                            <select name="jam_sewa" class="col-2 mr-2 form-control">
                                                                @for ($i = 1; $i <= 24; $i++) <option value="{{ $i }}">{{ $i }}</option>
                                                                    @endfor
                                                            </select>

                                                            <select name="menit_sewa" class="col-2  form-control">
                                                                <option value="00">00</option>
                                                                <option value="30">30</option>
                                                            </select>

                                                        </div>
                                                        @error('tgl_sewa')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">

                                                        <label for="Pengembalian" class="col-form-label">Tanggal & Waktu Pengembalian:</label>
                                                        <input {{ (old('tgl_pgmbl')) ? "" : "disabled "  }} type="datetime-local" value="{{ old('tgl_pgmbl') }}" name="tgl_pgmbl" class="form-control" id="Pengembalian">

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tp_sewa" class="col-form-label">Tipe Sewa</label>
                                                        <select {{ (old('tp_sewa')) ? "" : "disabled"  }} name="tp_sewa" id="tp_sewa" onchange="" class="form-control form-control-sm mb-3">
                                                            <option {{ old('tp_sewa') == 'Lepas Kunci' ? 'selected' : '' }} value="Lepas Kunci">Lepas Kunci</option>
                                                            <option {{ old('tp_sewa') == 'Mobil Dengan Pengemudi' ? 'selected' : '' }} value="Mobil Dengan Pengemudi">Mobil + Driver</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="serah-terima" class="col-form-label">Alamat Tempat Tinggal:</label>
                                                        <textarea {{ (old('alamat_rm')) ? "" : "disabled"  }} class="form-control @error('alamat_rm') is-invalid @enderror" name="alamat_rm" id="serah-terima" placeholder="Isi alamat lengkap serah terima mobil">{{ old('alamat_rm') }}</textarea>
                                                        @error('alamat_rm')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="catatan" class="col-form-label">Alamat Serah Terima Mobil:</label>
                                                        <textarea {{ (old('alamat_rm')) ? "" : "disabled"  }} class="form-control @error('alamat_st') is-invalid @enderror" name="alamat_st" id="catatan" placeholder="Jika sama dengan alamat tempat tinggal, boleh tidak di isi">{{ old('alamat_st') }}</textarea>
                                                        @error('alamat_st')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>

                                                    @if (session()->get('pesananADD'))
                                                    <div class="form-group">
                                                        <label for="catatan" class="mx-auto d-block">
                                                            <span class="subheading" style="color: #01d28e">Ringkasan Order</span>
                                                        </label>
                                                        <div class="container content-center">
                                                            <div class="row">
                                                                <div class="col d-flex">
                                                                    <p>Harga sewa / Hari</p>
                                                                </div>
                                                                <div class="col">
                                                                    <p>Rp {{ placeRp($arr->get('harga_hari')) }}</p>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col d-flex">
                                                                    <p>Total Harga sewa ({{ $arr->get('hari_sewa') }} Hari)</p>
                                                                </div>
                                                                <div class="col">
                                                                    <p>Rp {{ placeRp($arr->get('harga_total')) }}</p>
                                                                </div>
                                                            </div>
                                                            @if ($arr->get('plusDriver') && $arr->get('pesananADD'))
                                                            <div id="hargaSopirP" class="row">
                                                                <div class="col">
                                                                    <p>Biaya Sopir</p>
                                                                </div>
                                                                <div id="hargaSopirC" class="col">
                                                                    <p>Rp 150.000</p>
                                                                </div>
                                                            </div>
                                                            @endif
                                                            <div class="row">
                                                                <div class="col">
                                                                    <p style="color: #01d28e">Total Tagihan</p>
                                                                </div>
                                                                <div class="col">
                                                                    <p style="color: orangered">Rp {{ ($arr->get('plusDriver')) ? placeRp($totalTagihan = $arr->get('harga_total') + 150000) : placeRp($totalTagihan = $arr->get('harga_total')) }}</p>
                                                                    <input type="hidden" value="{{ $totalTagihan }}" name="TotalTagihan">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="form-group">
                                                        <label for="tipe_bayar" class="col-form-label">Lakukan Pembayaran Pada Salah Satu No.rekening dibawah:</label>
                                                        <select class="form-control" name="tipe_bayar" id="">
                                                            <option value="BCA" selected>Rekening BCA : 0777562792898</option>
                                                            <option value="Direct">Link Aja : 085784793034 (a/n Asfa Hani)</option>
                                                        </select>

                                                    </div>

                                                    @endif

                                                </div>
                                                @if (session()->get('pesananADD'))
                                                <hr>
                                                <label for="catatan" class="col-form-label">Upload Bukti Pembayaran Anda (Struk/Screenshot Bukti Pembayaran)</label>
                                                <input type="file" name="GMB_Bukti" onchange="preview(this, '#buktibayar')">
                                                <div class="container-fluid">
                                                    <img alt="Bukti Bayar" src="assets/img/dataImg/NoImageA.png" id="buktibayar" class="img-fluid img-thumbnail">
                                                </div>
                                                @else
                                                <button type="submit" class="btn btn-warning btn-lg btn-block">Hitung Semua</button>
                                                @endif
                                            </div>
                                        </div>

                                        @if (session()->get('pesananADD'))
                                        <section class="mt-3">
                                            <button type="submit" class="btn btn-primary btn-lg btn-block">Booking Sekarang</button>
                                        </section>
                                        @endif
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>