@php
$supir = Auth::user()->karyawan()->first();
@endphp

<div class="container-fluid mt-3">

    <div class="card pt-2 border border-dark mb-3">

        <div class="row d-block d-md-flex text-center">

            <div class="col-md-4 col p-0 m-0 px-4 pb-3 pt-2">
                <img class="img-thumbnail mb-2 mt-2 mx-0 h-100" src="{{ asset('assets/img/foto-diri/' . $supir->foto_diri) }}" alt="Gambar Diri Supir">
            </div>

            <div class="col col-md-8 text-left text-black font-weight-bolder pl-3 pl-md-0" style="font-family: Quicksand;">
                <div class="container">
                    <div class="row">
                        <div class="card-title col display-4">IDENTITAS DRIVER</div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="font-size-2">Nama Lengkap</p>
                        </div>
                        <div class="col-auto">
                            :
                        </div>
                        <div class="col">
                            <p class="font-size-2">
                                {{ (!empty($supir->nama_lengkap)) ? $supir->nama_lengkap : 'Belum Diisi' }}
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <p class="font-size-2">Umur</p>
                        </div>
                        <div class="col-auto">
                            :
                        </div>
                        <div class="col">
                            <p class="font-size-2">
                                {{ (!empty($supir->umur)) ? $supir->umur : 'Belum Diisi' }}
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <p class="font-size-2">Alamat Rumah</p>
                        </div>
                        <div class="col-auto">
                            :
                        </div>
                        <div class="col">
                            <p class="font-size-2">
                                {{ (!empty($supir->alamat_rumah)) ? $supir->alamat_rumah : 'Belum Diisi' }}
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <p class="font-size-2">No. Telepon</p>
                        </div>
                        <div class="col-auto">
                            :
                        </div>
                        <div class="col">
                            <p class="font-size-2">
                                {{ (!empty($supir->no_tlp)) ? $supir->no_tlp : 'Belum Diisi' }}
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <p class="font-size-2">Status</p>
                        </div>
                        <div class="col-auto">
                            :
                        </div>
                        <div class="col">
                            <p class="font-size-2">
                                {{ (!empty($supir->status)) ? $supir->status : 'Belum Diisi' }}
                            </p>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

    @php
    $order = Auth::user()->order()->where('status', 'Dalam Persewaan')->first() or false;
    @endphp

    @if ($order)

    @php
    $mobil = $order->mobil()->first();
    $tipe_sewa = $mobil->tipe_sewa()->first()->tipe_sewa;
    @endphp
    <div class="card border border-dark">

        <div class="card-header" style="background-color: #BCE3B6;">
            <b class="float-left">Pekerjaan Baru</b>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="p-3 col-12 col-lg-6 d-flex d-lg-none">
                    <img class="img-thumbnail" src="{{ asset('assets/img/cars/' . $mobil->gambar) }}" alt="Gambar Mobil">
                </div>

                <div class="col-12 col-md-6">
                    <div class="container">
                        <div class="row">
                            <div class="card-title font-size-2">Identitas Pelanggan</div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="font-size-2">{{ $order->penyewa }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                @if ($tipe_sewa == "Dengan Supir")
                                <p class="font-size-2">Alamat Penjemputan:</p>
                                @else
                                <p class="font-size-2">Alamat Serah Terima:</p>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p class="font-size-2">{{ $order->penyewa }}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p class="font-size-2">Jumlah Hari Sewa: {{ $order->durasi_sewa }} Hari Sewa</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p class="font-size-2">Tanggal Sewa: {{ $order->tgl_mulai_sewa }} - {{ $order->tgl_akhir_sewa }}</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-lg-6 p-3 d-none d-lg-flex">
                    <img class="img-thumbnail" src="{{ asset('assets/img/cars/' . $mobil->gambar) }}" alt="Gambar Mobil">
                </div>

            </div>
        </div>

        <form action="{{ route('karyawan.dashboard.update.status.order') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $order->id }}">
            <div class="row p-0 m-0 border border-bottom-0 border-right-0 border-left-0 border-dark">
                <div class="form-group d-inline-flex w-100 m-0 p-0">
                    <input type="text" name="status" class="form-control" placeholder="Update Status Order Hari ini">
                    <button class="btn btn-success">Update</button>
                </div>
            </div>
        </form>

    </div>

    <div class="card">

        <div class="card-header text-lg text-black font-weight-bold">
            History Table Order
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
                    @foreach ($order->status_order()->orderBy('created_at', 'desc')->get() as $status_order_item)
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
    @endif

</div>