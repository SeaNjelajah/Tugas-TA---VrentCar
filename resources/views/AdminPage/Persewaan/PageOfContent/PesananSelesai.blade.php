@if ($item->status == "Selesai")

@php
$status_order_last = $item->status_order()->orderBy('created_at', 'desc')->first();
$tipe_sewa = $mobil->tipe_sewa()->first()->tipe_sewa;
$tipe_bayar = $item->tipe_bayar()->first() or false;
$supir = $item->supir()->first();
@endphp

<div class="card mt-n3">
    <div class="card-body">

        <div class="row mx-1 rounded-pill" style="background-color: #81a0f5;">

            <div class="col-1 my-auto">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="Pcheck{{ $item->id }}">
                    <label class="custom-control-label" for="Pcheck{{ $item->id }}"></label>
                </div>
            </div>

            <div class="col-11 text-center text-white">

                <div class="row d-lg-inline-block d-block mx-auto text-center">
                    Selesai Pada | {{ ConvertDateToTextDateToIndonesia($status_order_last->created_at) }}
                </div>

                <div class="row d-lg-inline-block d-block mx-auto text-center">
                    Mulai Sewa | {{ ConvertDateToTextDateToIndonesia ($item->tgl_mulai_sewa) }} --- Akhir Sewa | {{ ConvertDateToTextDateToIndonesia ($item->tgl_akhir_sewa) }} || {{ $item->durasi_sewa }} Hari Sewa
                </div>

            </div>


        </div>

        <div class="row d-inline-flex">

            <div class="mx-sm-auto col-md-12 col-lg-5 text-center d-block mt-1">
                <img src="{{ asset('assets/img/cars/' . $mobil->gambar) }}" alt="Gambar Mobil Pesanan" class="align-self-center m-2 img-fluid rounded-start img-thumbnail">
                <div class="row text-center">
                    <h2 class="col-6 text-center text-info">{{ $mobil->nama }}</h2>
                    <h2 class="col-6 text-center font-weight-bolder">{{ $mobil->pelat }}</h2>
                </div>
            </div>


            <div class="my-lg-0 col-md-12 col-lg mr-1 text-left" style="border-left: 2px #d3ddcf solid;">

                <div class="table-responsive mx-auto my-3">
                    <table class="table table-hover table-bordered shadow">
                        <tbody class="text-center font-size-2 border">

                            <tr>
                                <div class="p-2 text-black text-center">
                                    @if ($tipe_sewa == "Dengan Supir")
                                    <span class="mt-3 text-lg text-center">{{ (!empty($item->alamat_temu)) ? "Alamat Penjemputan" : "Alamat Rumah" }}</span>
                                    <p class="text-md">{{ (!empty($item->alamat_temu)) ? $item->alamat_temu : $item->alamat_rumah }}</p>
                                    @else
                                    <span class="mt-3 text-lg text-center">{{ (!empty($item->alamat_temu)) ? "Alamat Serah Terima" : "Alamat Rumah" }}</span>
                                    <p class="text-md">{{ (!empty($item->alamat_temu)) ? $item->alamat_temu : $item->alamat_rumah }}</p>
                                    @endif
                                </div>
                            </tr>

                            <tr>
                                <td class="col-1 font-poppins-400">Tipe Sewa</th>
                                <td class="col font-poppins-400">{{ $tipe_sewa }}</td>
                            </tr>
                            
                            @if ($tipe_sewa == "Dengan Supir")
                                @if (empty($supir->nama_lengkap))

                                <tr>
                                    <td class="col-1 font-poppins-400">Supir</td>
                                    <td class="col font-poppins-400">Nama Lengkap Tidak Ada</td>
                                </tr>

                                @else

                                <tr>
                                    <td class="col-1 font-poppins-400">Supir</td>
                                    <td class="col font-poppins-400">{{ $supir->nama_lengkap }}</td>
                                </tr>

                                @endif
                            @endif

                            <tr>
                                <td class="col-1 font-poppins-400">Jenis Pembayaran</td>
                                <td class="col font-poppins-400">{{ $tipe_bayar->deskripsi }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <div class="row">
                    @if ($tipe_sewa == "Tanpa Supir")
                    <button type="button" class="btn btn-dark mx-auto mb-3" data-toggle="modal" data-target="#SimAModal{{ $item->id }}">
                        SIM A
                    </button>
                    <button type="button" class="btn btn-warning mx-auto mb-3" data-toggle="modal" data-target="#KartuKeluargaModal{{ $item->id }}">
                        Kartu Keluarga
                    </button>
                    <button type="button" class="btn btn-info mx-auto mb-3" data-toggle="modal" data-target="#KTPModal{{ $item->id }}">
                        KTP
                    </button>
                    @endif
                    <button type="button" class="btn btn-danger mx-auto mb-3" data-toggle="modal" data-target="#BuktiBayarModal{{ $item->id }}">Bukti Bayar</button>
                    <button type="button" class="btn btn-info mx-auto mb-3" data-toggle="modal" data-target="#HistoryOrder{{ $item->id }}">Histori Status Order </button> <br>
                    <button type="button" class="btn btn-info mx-auto mb-3" data-toggle="modal" data-target="#infoOrder{{ $item->id }}">More Info</button>
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

    </div>
</div>
@endif