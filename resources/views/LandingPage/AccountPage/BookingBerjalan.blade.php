<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, ifatial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>

    @include('LandingPage.Style')

</head>

<body>
    @include('LandingPage.ZTemplate.navbar2')

    <div class="container my-3 mx-auto">

        <div class="container-fluid">

            <div class="row">
                <div class="col-3">

                    <div class="card">
                        <div class="card-header">
                            Featured
                        </div>
                        <ul class="list-group list-group-flush hover">
                            <li class="list-group-item">
                                <a class="card-link" href="{{ route('user.dashboard') }}">My Profile</a>
                            </li>
                            <li class="list-group-item">
                                Booking Yang Berjalan
                            </li>
                            <li class="list-group-item">
                                <a class="card-link" href="{{ route('user.RiwayatBooking') }}">Riwayat Booking</a>
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="col">

                    <span class="w-100 px-auto">Baru</span>
                    <hr class="pl-3 mt-n1">
                    @php
                    $user = Auth::user();
                    @endphp

                    @foreach ($user->order()->where('status', 'Baru')->get() as $order)

                    @php
                    $mobil = $order->mobil()->first();
                    $transmisi = $mobil->transmisi()->first()->nama_transmisi;
                    $merek = $mobil->merek()->first()->merek;
                    $tipe_sewa = $mobil->tipe_sewa()->first()->tipe_sewa;

                    $bukti_bayar = $order->bukti_bayar()->first() or false;

                    $member = $user->member()->first();
                    $sim_a = $member->sim_a()->first() or false;
                    $ktp = $member->ktp()->first() or false;
                    $kartu_keluarga = $member->kartu_keluarga()->first() or false;

                    @endphp

                    <div class="card my-2">

                        @if ($tipe_sewa == "Dengan Supir" and $bukti_bayar)
                            @if($bukti_bayar->terverifikasi != "Diterima")
                            <div class="card-header text-center text-black">
                                Menunggu Vertifikasi
                            </div>
                            @else
                            <div class="card-header text-center text-black">
                                Pesanan Anda Diterima
                            </div>
                            @endif
                        @endif 

                        @if ($tipe_sewa == "Tanpa Supir" and $bukti_bayar and $sim_a and $ktp and $kartu_keluarga)
                            @if($bukti_bayar->terverifikasi != "Diterima" or $sim_a->terverifikasi != "Diterima" or $ktp->terverifikasi != "Diterima" or $kartu_keluarga->terverifikasi != "Diterima")
                            <div class="card-header text-center text-black">
                                Menunggu Vertifikasi
                            </div>
                            @else
                            <div class="card-header text-center text-black">
                                Pesanan Anda Diterima
                            </div>
                            @endif
                        @endif 

                        <div class="row">
                            <figure class="col-4">
                                <img class="rounded figure img-fluid" src="{{ asset('assets/img/cars/' . $mobil->gambar) }}" style="transform: translate(10px, 25px);">
                            </figure>

                            <div class="card-body col-8">
                                <h5 class="card-title">{{ $mobil->nama }}<span class="float-right" style="color: black">Rp. {{ placeRp($mobil->harga) }} / Hari</span></h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $merek }}
                                    @if ($tipe_sewa == "Dengan Supir")
                                        <span class="float-right" style="color: #999999">Biaya Supir: Rp 150,000</span>
                                    @else
                                        <span class="float-right" style="color: #e3a10d">Total: Rp {{ placeRp($order->total) }} ({{ $order->durasi_sewa }} Hari)</span>
                                    @endif
                                </h6>



                                <div class="row">
                                    <div class="col-auto">
                                        <i class="fas fa-user font-size-2 pr-3"></i>
                                        {{ $mobil->jumlah_kursi }}
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-suitcase font-size-2 pr-3"></i>
                                        {{ $mobil->kapasitas_koper }}
                                    </div>

                                    <div class="col-auto">
                                        <i class="fa fa-gear font-size-2 pr-3"></i>
                                        {{ $transmisi }}
                                    </div>

                                    @if ($tipe_sewa == "Dengan Supir")
                                    <div class="col">
                                        <span class="float-right" style="color: #e3a10d">Total: Rp {{ placeRp($order->total) }} ({{ $order->durasi_sewa }} Hari)</span>
                                    </div>
                                    @endif

                                </div>

                                <div class="row justify-content-end mt-4 pl-3">
                                    
                                    <form action="{{ route('user.RingkasanOrder') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $order->id }}">
                                        <button type="submit" class="card-link btn btn-primary mr-3">Ringkasan</button>
                                    </form>
                                </div>



                            </div>

                            <div class="col-12 mt-3 pl-4">
                                
                                <p class="text-muted fs-20">{{ ConvertDateToTextDateToIndonesia ($order->tgl_mulai_sewa) }} - {{ ConvertDateToTextDateToIndonesia ($order->tgl_akhir_sewa) }}</p>

                            </div>

                        </div>

                    </div>

                    @endforeach

                    <div class="mt-4"></div>
                    <span class="w-100 px-auto text-lg">Berjalan</span>
                    <hr class="pl-3 mt-n1">
                    
                    
                    @foreach ($user->order()->where('status', 'Dalam Persewaan')->get() as $order)

                    @php
                    $mobil = $order->mobil()->first();
                    $transmisi = $mobil->transmisi()->first()->nama_transmisi;
                    $merek = $mobil->merek()->first()->merek;
                    $tipe_sewa = $mobil->tipe_sewa()->first()->tipe_sewa;

                    $bukti_bayar = $order->bukti_bayar()->first() or false;

                    $member = $user->member()->first();
                    $sim_a = $member->sim_a()->first() or false;
                    $ktp = $member->ktp()->first() or false;
                    $kartu_keluarga = $member->kartu_keluarga()->first() or false;

                    @endphp

                    <div class="card my-2">
                        
                        @if ($tipe_sewa == "Dengan Supir" and $bukti_bayar)
                            @if($bukti_bayar->terverifikasi != "Diterima")
                            <div class="card-header text-center text-black">
                                Menunggu Vertifikasi
                            </div>
                            @else
                            <div class="card-header text-center text-black">
                                Pesanan Anda Diterima
                            </div>
                            @endif
                        @endif 

                        @if ($tipe_sewa == "Tanpa Supir" and $bukti_bayar and $sim_a and $ktp and $kartu_keluarga)
                            @if($bukti_bayar->terverifikasi != "Diterima" or $sim_a->terverifikasi != "Diterima" or $ktp->terverifikasi != "Diterima" or $kartu_keluarga->terverifikasi != "Diterima")
                            <div class="card-header text-center text-black">
                                Menunggu Vertifikasi
                            </div>
                            @else
                            <div class="card-header text-center text-black">
                                Pesanan Anda Diterima
                            </div>
                            @endif
                        @endif 

                        <div class="row">
                            <figure class="col-4">
                                <img class="rounded figure img-fluid" src="{{ asset('assets/img/cars/' . $mobil->gambar) }}" style="transform: translate(10px, 25px);">
                            </figure>

                            <div class="card-body col-8">
                                <h5 class="card-title">{{ $mobil->nama }}<span class="float-right" style="color: black">Rp. {{ placeRp($mobil->harga) }} / Hari</span></h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $merek }}
                                    
                                    @if ($tipe_sewa == "Dengan Supir")
                                        <span class="float-right" style="color: #999999">Biaya Supir: Rp 150,000</span>
                                    @else
                                        <span class="float-right" style="color: #e3a10d">Total: Rp {{ placeRp($order->total) }} ({{ $order->durasi_sewa }} Hari)</span>
                                    @endif
                                </h6>


                                <div class="row">
                                    <div class="col-auto">
                                        <i class="fas fa-user font-size-2 pr-3"></i>
                                        {{ $mobil->jumlah_kursi }}
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-suitcase font-size-2 pr-3"></i>
                                        {{ $mobil->kapasitas_koper }}
                                    </div>

                                    <div class="col-auto">
                                        <i class="fa fa-gear font-size-2 pr-3"></i>
                                        {{ $transmisi }}
                                    </div>

                                    @if ($tipe_sewa == "Dengan Supir")
                                    <div class="col">
                                        <span class="float-right" style="color: #e3a10d">Total: Rp {{ placeRp($order->total) }} ({{ $order->durasi_sewa }} Hari)</span>
                                    </div>
                                    @endif


                                </div>

                                <div class="row justify-content-end mt-4 pl-3">
                                    
                                    <form action="{{ route('user.RingkasanOrder') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $order->id }}">
                                        <button type="submit" class="card-link btn btn-primary mr-3">Ringkasan</button>
                                    </form>
                                </div>



                            </div>

                            <div class="col-12 mt-3 pl-4">
                                
                                <p class="text-muted fs-20">{{ ConvertDateToTextDateToIndonesia ($order->tgl_mulai_sewa) }} - {{ ConvertDateToTextDateToIndonesia ($order->tgl_akhir_sewa) }}</p>

                            </div>

                        </div>

                    </div>

                    @endforeach

                    



                </div>



            </div>

        </div>

    </div>

    @include('LandingPage.Script')
</body>

</html>