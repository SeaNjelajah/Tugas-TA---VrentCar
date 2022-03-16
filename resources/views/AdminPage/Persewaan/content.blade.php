<div class="container-fluid mt-1">
    <!-- /.TabBar -->
    <div class="card text-center">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item mx-auto">
                    <a class="nav-link {{ (empty(Request::get('v'))) ? 'active' : '' }}" href="{{ Route('admin.Persewaan.show') }}">Semua Pesanan</a>
                </li>
                <li class="nav-item mx-auto">
                    <a class="nav-link {{ (!empty(Request::get('v')) and Request::get('v') == 'Baru') ? 'active' : '' }}" href="{{ Route('admin.Persewaan.show', ['v' => 'Baru']) }}">Pesanan Baru</a>
                </li>
                <li class="nav-item mx-auto">
                    <a class="nav-link {{ (!empty(Request::get('v')) and Request::get('v') == 'DalamPersewaan') ? 'active' : '' }}" href="{{ Route('admin.Persewaan.show', ['v' => 'DalamPersewaan']) }}">Dalam Persewaan</a>
                </li>
                <li class="nav-item mx-auto">
                    <a class="nav-link {{ (!empty(Request::get('v')) and Request::get('v') == 'Selesai') ? 'active' : '' }}" href="{{ Route('admin.Persewaan.show', ['v' => 'Selesai']) }}">Pesanan Selesai</a>
                </li>
                <li class="nav-item mx-auto">
                    <a class="nav-link {{ (!empty(Request::get('v')) and Request::get('v') == 'Dibatalkan') ? 'active' : '' }}" href="{{ Route('admin.Persewaan.show', ['v' => 'Dibatalkan']) }}">Pesanan Dibatalkan</a>
                </li>
            </ul>
        </div>
        <form class="row mt-3 mb-3 px-4">
            <div class="mb-2 col-lg mx-md-auto col-md-12 d-inline-flex">
                <input class="form-control" type="text" placeholder="Search">
                <input type="submit" class="btn btn-primary ml-2" value="Search">
            </div>
            <div class="col-lg-7 mx-md-auto col-md-12 d-flex">
                <input daterange="date" set-date-min="now" date-range-target="#end_date_filter" id="start_date_filter" min="{{ Carbon\Carbon::now()->toDateString() }}" class="form-control" type="date" placeholder="Date">
                <span class="text-muted my-auto mx-3">to</span>
                <input id="end_date_filter" class="form-control" type="date" placeholder="Date" disabled>
            </div>
            <button type="submit" class="mt-2 mt-lg-0 mx-auto col-11 col-md-11 col-lg-1 w-25 ml-2 btn btn-outline-primary form-control">Go</button>
        </form>

    </div>
    <!-- /.TabBar -->

    <!-- /.CarContent -->
    @foreach ($order as $item)
    @php
    $mobil = $item->mobil()->first();
    @endphp

    <!-- Semua Pesanan -->
    @if (Request::get('v') == "Baru")
    @include('AdminPage.Persewaan.PageOfContent.PesananBaru')
    @elseif(Request::get('v') == "DalamPersewaan")
    @include('AdminPage.Persewaan.PageOfContent.PesananDalamPersewaan')
    @elseif(Request::get('v') == "Selesai")
    @include('AdminPage.Persewaan.PageOfContent.PesananSelesai')
    @elseif(Request::get('v') == "Dibatalkan")
    @include('AdminPage.Persewaan.PageOfContent.PesananDibatalkan')
    @else
    @if ($item->status == "Baru")
    @include('AdminPage.Persewaan.PageOfContent.PesananBaru')
    @elseif ($item->status == "Dalam Persewaan")
    @include('AdminPage.Persewaan.PageOfContent.PesananDalamPersewaan')
    @elseif ($item->status == "Selesai")
    @include('AdminPage.Persewaan.PageOfContent.PesananSelesai')
    @elseif ($item->status == "Dibatalkan")
    @include('AdminPage.Persewaan.PageOfContent.PesananDibatalkan')
    @endif
    @endif

    {{-- Modal Bukti Bayar --}}

    @php

    $bukti_bayar = $item->bukti_bayar()->first() or false;

    @endphp

    <!-- Modal Bukti Bayar -->
    <div class="modal fade" id="BuktiBayarModal{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bukti Bayar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    <figure>
                        <img src="{{ asset('storage/Bukti_Bayar/' . $bukti_bayar->gambar_bukti) }}" alt="Bukti Bayar" class="img-fluid img-thumbnail">
                    </figure>
                </div>
                <div class="modal-footer">
                    @if (empty($bukti_bayar->terverifikasi))
                    <form action="{{ route('admin.Persewaan.verifikasi.bukti') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $item->id }}">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Vertifikasi</button>
                    </form>

                    @else
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline-success"><i class="fas fa-check"></i> Tervertifikasi</button>
                    @endif

                </div>
            </div>
        </div>
    </div>

    @php
    $tipe_sewa = $mobil->tipe_sewa()->first()->tipe_sewa;
    $jenis_mobil = $mobil->jenis_mobil()->first()->jenis_mobil;
    $transmisi = $mobil->transmisi()->first()->nama_transmisi;
    @endphp
    <!-- Modal Info -->
    <div class="modal fade" id="infoOrder{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">Info Order</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">

                    <table class="text-center table mx-auto table-hover table-bordered shadow mx-3">
                        <thead>
                            <tr>
                                <th class="font-size-2 font-poppins-400">Lokasi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="d-flex">
                                    <h3 class="col-3 text-left">Alamat Rumah</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">{{ $item->alamat_rumah }}</h3>
                                </td>
                            </tr>

                            @if (!empty( $item->alamat_temu))
                            <tr>
                                <td class="d-flex">
                                    <h3 class="col-3 text-left">Alamat Penjemputan</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">{{ $item->alamat_temu }}</h3>
                                </td>
                            </tr>
                            @endif

                        </tbody>

                    </table>

                    <table class="mt-4 table mx-auto table-hover table-bordered shadow table">
                        <tbody class="text-center">

                            <tr>
                                <td class="d-flex">
                                    <h3 class="col-3 text-left">Nama Customer</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">{{ $item->penyewa }}</h3>
                                </td>
                            </tr>
                            <tr>
                                <td class="d-flex">
                                    <h3 class="col-3 text-left">Tipe Sewa</h3>
                                    <h3 class="col-1"> : </h3>

                                    <h3 class="col-8 ">{{ $tipe_sewa }}</h3>
                                </td>
                            </tr>
                            <tr>
                                <td class="d-flex">
                                    <h3 class="col-3 text-left">Nomer Telepon</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">{{ $item->No_tlp }}</h3>
                                </td>
                            </tr>
                            <tr>
                                <td class="d-flex">
                                    <h3 class="col-3 text-left">Tanggal Mulai Sewa</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">{{ $item->tgl_mulai_sewa }}</h3>
                                </td>
                            </tr>

                            <tr>
                                <td class="d-flex">
                                    <h3 class="col-3 text-left">Tanggal Akhir Sewa</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">{{ $item->tgl_akhir_sewa }}</h3>
                                </td>
                            </tr>

                            <tr>
                                <td class="d-flex">
                                    <h3 class="col-3 text-left">Durasi Sewa</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">{{ $item->durasi_sewa }} Hari</h3>
                                </td>
                            </tr>

                            <tr>
                                <td class="d-flex">
                                    <h3 class="col-3 text-left">Harga Sewa Perhari</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">Rp. {{ placeRp ($mobil->harga) }}</h3>
                                </td>
                            </tr>

                            <tr>
                                <td class="d-flex">
                                    <h3 class="col-3 text-left">Total Harga</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">Rp. {{ placeRp ($item->total) }}</h3>
                                </td>
                            </tr>

                        </tbody>
                    </table>



                    <table class="mt-3 table mx-auto table-hover text-left table-bordered shadow table">
                        <tbody class="text-center">
                            <tr>
                                <td class="display-3">Data Mobil</td>
                            </tr>
                            <tr>
                                <td class="d-flex">
                                    <h3 class="col-3 text-left">Nama</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">{{ $mobil->nama }}</h3>
                                </td>
                            </tr>
                            <tr>
                                <td class="d-flex">
                                    <h3 class="col-3 text-left">Nomer Pelat Mobil</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">{{ $mobil->pelat }}</h3>
                                </td>
                            </tr>
                            <tr>
                                <td class="d-flex">
                                    <h3 class="col-3 text-left">Jumlah Kursi</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">{{ $mobil->jumlah_kursi }}</h3>
                                </td>
                            </tr>
                            <tr>
                                <td class="d-flex">
                                    <h3 class="col-3 text-left">Tahun Beli</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">{{ $mobil->tahun }}</h3>
                                </td>
                            </tr>

                            <tr>
                                <td class="d-flex">
                                    <h3 class="col-3 text-left">Harga sewa Per-Hari</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">Rp. {{ placeRp ($mobil->harga) }}</h3>
                                </td>
                            </tr>

                        </tbody>
                    </table>

                    <table class="mx-auto mt-3 table-bordered shadow table table-hover text-left">
                        <tbody class="text-center">

                            <tr>
                                <td>
                                    <h3>Other</h3>
                                </td>
                            </tr>

                            <tr>
                                <td class="d-flex">
                                    <h3 class="col-3 text-left">Jenis Mobil</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8">{{ $jenis_mobil }}</h3>
                                </td>
                            </tr>

                            <tr>
                                <td class="d-flex">
                                    <h3 class="col-3 text-left">Jenis Transmisi</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8">{{ $transmisi }}</h3>
                                </td>
                            </tr>

                            <tr>
                                <td class="d-flex">
                                    <h3 class="col-3 text-left">Tipe Sewa</h3>
                                    <h3 class="col-1"> : </h3>
                                    <h3 class="col-8 ">{{ $tipe_sewa }}</h3>
                                </td>
                            </tr>

                        </tbody>
                    </table>


                    <div class="col-12 mx-auto mt-2">
                        <strong class="display-5">Gambar Mobil</strong>
                        <img src="{{ asset('assets/img/cars/' . $mobil->gambar) }}" alt="...." class="img-thumbnail mb-4 align-self-center">
                    </div>



                </div>
            </div>
        </div>
    </div>

    @php
      $status_order = $item->status_order()->orderBy('created_at', 'desc')->get(); 
    @endphp
    
    {{-- histori status_order Modal --}}
    <div class="modal fade" id="HistoryOrder{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h6 class="modal-title" id="modal-title-default">History Table Order</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">

                    <div class="card">

                        <div class="card-header text-left  text-md text-black font-weight-bold">
                            Descending Order
                        </div>

                        <div class="table-responsive card-body">

                            <table class="table table-hover text-center table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-white">No</th>
                                        <th class="text-white">Pada Tanggal</th>
                                        <th class="text-white">Isi Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $counter = 0; @endphp
                                    @foreach ($status_order as $status_order_item)

                                    <tr>
                                        <td>{{ ++$counter }}</td>
                                        <td>{{ $status_order_item->created_at }}</td>
                                        <td>{{ $status_order_item->status }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    

    @endforeach
    <!-- /.CarContent -->
</div>