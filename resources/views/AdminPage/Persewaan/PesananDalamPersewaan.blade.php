@if ($item->status == "Dalam Persewaan")
<div class="card mt-n3">

    <div class="card-body mb--4">

        <div class="progress-wrapper">
            <div class="progress-info text-center d-flex">
                <div class="progress-label" data-toggle="tooltip" data-placement="top" title="Disetujui">
                    <span>
                        <font class="d-none d-md-block">Disetujui</font>
                        <i class="fas fa-circle d-block d-md-none"></i>
                    </span>
                </div>
                <div class="progress-label" data-toggle="tooltip" data-placement="top" title="Dalam Perjalanan Menemui Penyewa">
                    <span>
                        <font class="d-none d-md-block">Dalam Perjalanan Menemui Penyewa</font>
                        <i class="fas fa-circle d-block d-md-none"></i>
                    </span>
                </div>
                <div class="progress-label" data-toggle="tooltip" data-placement="top" title="Sudah Menemui Penyewa">
                    <span>
                        <font class="d-none d-md-block">Sudah Menemui Penyewa</font>
                        <i class="fas fa-circle d-block d-md-none"></i>
                    </span>
                </div>
                <div class="progress-label" data-toggle="tooltip" data-placement="top" title="Dalam Sewa">
                    <span>
                        <font class="d-none d-md-block">Dalam Sewa</font>
                        <i class="fas fa-circle d-block d-md-none"></i>
                    </span>
                </div>
                <div class="progress-label" data-toggle="tooltip" data-placement="top" title="Selesai">
                    <span>
                        <font class="d-none d-md-block">Selesai</font>
                        <i class="fas fa-circle d-block d-md-none"></i>
                    </span>
                </div>
            </div>


            <div class="progress">
                @php
                if ($item->status_proses == 'Disetujui') $progress = '8';
                else if ($item->status_proses == 'Dalam Perjalanan Menemui Penyewa') $progress ='28';
                else if ($item->status_proses == 'Sudah Menemui Penyewa') $progress = '54';
                else if ($item->status_proses == 'Dalam Sewa') $progress = '77';
                else if ($item->status_proses == 'Selesai') $progress = '100';
                else $progress = '0';
                @endphp
                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="100" style="width:{{ $progress }}%;"></div>
            </div>

        </div>

    </div>

    <div class="card-body">

        <div class="row mx-1 rounded-pill" style="background-color: #b8e6a8;">

            <div class="col-1 my-auto">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="Pcheck1">
                    <label class="custom-control-label" for="Pcheck1"></label>
                </div>
            </div>

            <div class="col-11 text-center">

                <div class="row d-block mx-auto my-1">
                    Disetujui Pada | {{ json_decode($item->historical_date, 1)['Disetujui'] }}
                </div>

                <div class="row d-block mx-auto mb-1">
                    Mulai Sewa | {{ $item->mulai_sewa }} --- Akhir Sewa | {{ $item->akhir_sewa }} -- {{ Carbon\Carbon::create($item->mulai_sewa)->diff(Carbon\Carbon::create($item->akhir_sewa), false)->d }} Hari Sewa
                </div>

            </div>


        </div>

        <div class="row d-inline-flex">

            <div class="mx-sm-auto col-md-12 col-lg text-center d-block mt-1">
                <img src="assets/img/dataImg/{{ $mobil->gmb_mb }}" alt="Gambar Mobil Pesanan" class="align-self-center m-2 img-fluid rounded-start img-thumbnail">
                <div class="row text-center">
                    <h2 class="col-6 text-center text-info">{{ $mobil->nama_mb }}</h2>
                    <h2 class="col-6 text-center font-weight-bolder">{{ $mobil->plat_mb }}</h2>
                </div>
            </div>


            <div class="my-lg-0 col-md-12 col-lg mr-1 text-left">

                <div class="table-responsive mx-auto my-3">
                    <table class="table table-hover table-bordered shadow">
                        <tbody class="text-center font-size-2">

                            <tr>
                                <td class="col-1 font-poppins-400">{{ (empty($item->address_serah_terima)) ? 'Alamat Rumah' : 'Alamat Serah Terima' }}</th>
                                <td class="col font-poppins-400">{{ (empty($item->address_serah_terima)) ? $item->address_home : $item->address_serah_terima  }}</td>
                            </tr>
                            
                            <tr>
                                <td class="col-1 font-poppins-400">Tipe Sewa</th>
                                <td class="col font-poppins-400">{{ $item->tipe_sewa }}</td>
                            </tr>

                            <tr>
                                <td class="col-1 font-poppins-400">Supir</td>
                                <td class="col font-poppins-400">xxxxx</td>
                            </tr>

                            <tr>
                                <td class="col-1 font-poppins-400">Jenis Pembayaran</td>
                                <td class="col font-poppins-400">{{ $item->tipe_bayar }}</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>


                <!-- Modal info -->
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
                                <table class="table mx-auto table-hover text-center table-bordered shadow table mb-3">
                                    <thead>
                                        <tr>
                                            <th class="display-3">
                                                <h3>Alamat Rumah</h3>
                                            </th>
                                            @if (!empty($item->address_serah_terima))
                                            <th class="display-3">
                                                <h3>Alamat Serah Terima</h3>
                                            </th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="display-3">
                                                <h3>{{ $item->address_home }}</h3>
                                            </td>
                                            @if (!empty($item->address_serah_terima))
                                            <td class="display-3">
                                                <h3>{{ $item->address_serah_terima }}</h3>
                                            </td>
                                            @endif
                                        </tr>
                                    </tbody>
                                </table>


                                <table class="table mx-auto table-hover text-left table-bordered shadow table mb-3">
                                    <tbody class="text-center">

                                        <tr>
                                            <td class="d-flex">
                                                <h3 class="col-3 text-left">Nama Customer</h3>
                                                <h3 class="col-1"> : </h3>
                                                <h3 class="col-8 ">{{ $item->nama }}</h3>
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
                                                <h3 class="col-8 ">{{ $item->mulai_sewa }}</h3>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="d-flex">
                                                <h3 class="col-3 text-left">Tanggal Akhir Sewa</h3>
                                                <h3 class="col-1"> : </h3>
                                                <h3 class="col-8 ">{{ $item->akhir_sewa }}</h3>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="d-flex">
                                                <h3 class="col-3 text-left">Harga Sewa Perhari</h3>
                                                <h3 class="col-1"> : </h3>
                                                <h3 class="col-8 ">Rp. {{ placeRp ($mobil->harga_mb) }}</h3>
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



                                <table class="table mx-auto table-hover text-left table-bordered shadow table">
                                    <tbody class="text-center">
                                        <tr>
                                            <td class="display-3">Data Mobil</td>
                                        </tr>
                                        <tr>
                                            <td class="d-flex">
                                                <h3 class="col-3 text-left">Nama</h3>
                                                <h3 class="col-1"> : </h3>
                                                <h3 class="col-8 ">{{ $mobil->nama_mb }}</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="d-flex">
                                                <h3 class="col-3 text-left">Nomer Pelat Mobil</h3>
                                                <h3 class="col-1"> : </h3>
                                                <h3 class="col-8 ">{{ $mobil->plat_mb }}</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="d-flex">
                                                <h3 class="col-3 text-left">Jumlah Kursi</h3>
                                                <h3 class="col-1"> : </h3>
                                                <h3 class="col-8 ">{{ $mobil->jml_tp_d }}</h3>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="d-flex">
                                                <h3 class="col-3 text-left">Tahun Beli</h3>
                                                <h3 class="col-1"> : </h3>
                                                <h3 class="col-8 ">{{ $mobil->t_mb }}</h3>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td class="d-flex">
                                                <h3 class="col-3 text-left">Harga sewa Per-Hari</h3>
                                                <h3 class="col-1"> : </h3>
                                                <h3 class="col-8 ">Rp. {{ placeRp ($mobil->harga_mb) }}</h3>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                                @php $tag_decode = json_decode($mobil->tag_mb, 1) @endphp
                                @if (!empty($tag_decode))
                                <table class="mx-auto mt-3 table-bordered shadow table table-hover text-left">
                                    <tbody class="text-center">
                                        <tr>
                                            <td>
                                                <h3>Other</h3>
                                            </td>
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

                                <strong class="display-5 d-block mx-auto pl-3">Gambar Mobil</strong>

                                <div class="mx-auto mt-2 text-center">
                                    <img src="assets/img/dataImg/{{ $mobil->gmb_mb }}" alt="...." class="img-thumbnail mb-4 align-self-center">
                                </div>



                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>

        <div class="row rounded-pill mx-1" style="background-color: #c4c4c4;">
            <div class="col-auto w-50 text-left">
                Total Bayar
            </div>
            <div class="col-auto w-50 text-right">
                Rp. {{ placeRp($item->total) }}
            </div>
        </div>
        <div class="row mt-1 mx-1">
            <form action="{{ route('OrderBatalkan', $item->id) }}" class="col-auto w-50 text-left" method="POST">
                @csrf
                <button class="btn btn-danger text-white" type="submit">Cancel</button>
            </form>

            <div class="col-auto w-50 text-right">
                <button type="button" class="text-right btn btn-info" data-toggle="modal" data-target="#infoOrder1">More Info</button>
            </div>
        </div>

    </div>


</div>
@endif