@if ($item->status == "Dalam Persewaan")

@php
$status_order_last = $item->status_order()->orderBy('created_at', 'desc')->first();
$status_order_disetujui = $item->status_order()->where('status', 'Disetujui')->first();
$tipe_sewa = $mobil->tipe_sewa()->first()->tipe_sewa;
$tipe_bayar = $item->tipe_bayar()->first() or false;
$supir = $item->supir()->first();
@endphp

<div class="card mt pt-3">

    <span class="text-black text-md font-weight-bold pl-3">Last status: </span>
    <div class="row px-3">
        <div class="col-12 col-md text-center">
            <table class="table table-hover table-secondary">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-md text-white">Isi status</th>
                        <th class="text-md text-white">Pada tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-secondary">
                        <td class="text-md">{{ $status_order_last->status }}</td>
                        <td class="text-md">{{ ConvertDateToTextDateToIndonesia ($status_order_last->created_at) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        

        <div class="col-12 col-md-auto mt-2 mt-md-0 align-self-center">
            <button class="btn btn-info mb-1 w-100" data-toggle="modal" data-target="#HistoryOrder{{ $item->id }}">Histori Status Order </button> <br>
            <form action="{{ route('admin.Persewaan.order.selesai') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $item->id }}">
                <button class="btn btn-primary mt-1 w-100">Selesai</button>
            </form>
        </div>

    </div>

    
        <form action="{{ route('admin.Persewaan.status.order.update') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $item->id }}">
            <div class="row px-3 m-0 mt-3">
                @if ($tipe_sewa == "Dengan Supir")
                <div class="form-group d-inline-flex w-100 m-0 p-0">
                    <input type="text" name="status" class="form-control" placeholder="Update Status Order Hari ini">
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
                @else

                <div class="col m-0 p-0">
                    <div class="form-group d-inline-flex w-100 m-0 p-0">
                        <input type="text" name="status" class="form-control" placeholder="Update Status Order Hari ini">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>

                <div class="col-auto m-0 pr-0">
                    <button type="button" class="btn btn-danger h-100" data-toggle="modal" data-target="#DendaModal{{ $item->id }}">Denda</button>
                </div>
                
                @endif
            </div>
        </form>
    

    

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
                    Disetujui Pada | {{ $status_order_disetujui->created_at }}
                </div>

                <div class="row d-block mx-auto mb-1">
                    Mulai Sewa | {{ $item->tgl_mulai_sewa }} --- Akhir Sewa | {{ $item->tgl_akhir_sewa }} -- {{ $item->durasi_sewa }} Hari Sewa
                </div>

            </div>


        </div>

        <div class="row d-inline-flex">

            <div class="mx-sm-auto col-md-12 col-lg text-center d-block mt-1">
                <img src="{{ asset('assets/img/cars/' . $mobil->gambar) }}" alt="Gambar Mobil Pesanan" class="align-self-center m-2 img-fluid rounded-start img-thumbnail">
                <div class="row text-center">
                    <h2 class="col-6 text-center text-info">{{ $mobil->nama }}</h2>
                    <h2 class="col-6 text-center font-weight-bolder">{{ $mobil->pelat }}</h2>
                </div>
            </div>


            <div class="my-lg-0 col-md-12 col-lg mr-1 text-left">

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
                            <tr>
                                <td class="col-1 font-poppins-400">Supir</td>
                                <td class="col font-poppins-400">{{ $supir->nama_lengkap }}</td>
                            </tr>
                            @endif

                            <tr>
                                <td class="col-1 font-poppins-400">Jenis Pembayaran</td>
                                <td class="col font-poppins-400">{{ $tipe_bayar->deskripsi }}</td>
                            </tr>

                        </tbody>
                    </table>
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
            <form action="{{ route('admin.Persewaan.batalkan', $item->id) }}" class="col-auto mr-auto text-left" method="POST">
                @csrf
                <button class="btn btn-danger text-white" type="submit">Cancel</button>
            </form>

            @if ($tipe_sewa == "Tanpa Supir")

            @php
            $user_penyewa = $item->user()->first();
            $punya_data_member = $user_penyewa->member()->first() or false;

            if ($punya_data_member) { 
                $member = $user_penyewa->member()->first();
                $ktp = $member->ktp()->first();
                $kartu_keluarga = $member->kartu_keluarga()->first();
                $sim_a = $member->sim_a()->first();
            } else {
                $ktp = false;
                $kartu_keluarga = false;
                $sim_a = false;
            }
            
            @endphp
            
            @if ($sim_a)
            <div class="col-auto">
            <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#SimAModal{{ $item->id }}">
                SIM A
            </button>
            </div>
            @else
            <div class="col-auto">
            <button type="button" class="btn btn-dark" data-container="body" data-toggle="popover" data-placement="top" data-content="Gambar SIM A Belum dikirim">
                SIM A
            </button>          
            </div>
            @endif

            @if($kartu_keluarga)
            <div class="col-auto">
            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#KartuKeluargaModal{{ $item->id }}">
                Kartu Keluarga
            </button>
            </div>
            @else
            <div class="col-auto">
            <button type="button" class="btn btn-warning" data-container="body" data-toggle="popover" data-placement="top" data-content="Gambar Kartu Keluarga Belum dikirim">
                Kartu Keluarga
            </button>          
            </div>
            @endif

            @if ($ktp)
            <div class="col-auto">
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#KTPModal{{ $item->id }}">
                KTP
            </button>
            </div>
            @else
            <div class="col-auto">
            <button type="button" class="btn btn-info" data-container="body" data-toggle="popover" data-placement="top" data-content="Gambar KTP Belum dikirim">
                KTP
            </button>          
            </div>
            @endif

            @endif

            <div class="col-auto">
                <button type="button" class="btn btn-danger mr-auto text-right " data-toggle="modal" data-target="#BuktiBayarModal{{ $item->id }}">
                    Bukti Bayar
                  </button>
            </div>

            <div class="col-auto">
                <button type="button" class="text-right btn btn-info" data-toggle="modal" data-target="#infoOrder1">More Info</button>
            </div>
        </div>

    </div>


</div>
@endif