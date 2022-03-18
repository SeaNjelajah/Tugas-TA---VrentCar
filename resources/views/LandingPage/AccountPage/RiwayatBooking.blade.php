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
                                <a class="card-link" href="{{ route('user.bookingBerjalan') }}">Booking Yang Berjalan</a>
                            </li>

                            <li class="list-group-item">
                                Riwayat Booking
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="col">

                    <span class="w-100 px-auto">Dibatalkan</span>
                    <hr class="pl-3 mt-n1">

               



                    @foreach (Auth::user()->order()->get()->where('status', 'Dibatalkan') as $order)

                    @php
                    $mobil = $order->mobil()->first();
                    $transmisi = $mobil->transmisi()->first()->nama_transmisi;
                    @endphp

                    <div class="card my-2">

                        <div class="row">
                            <figure class="col-4">
                                <img class="rounded figure img-fluid" src="{{ asset('assets/img/cars/' . $mobil->gambar) }}" style="transform: translate(10px, 25px);">
                            </figure>

                            <div class="card-body col-8">
                                <h5 class="card-title">{{ $mobil->nama }}<span class="float-right" style="color: #01d28e">Rp. {{ placeRp($mobil->harga) }} / Hari</span></h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ "Merek Belum" }}<span class="float-right" style="color: #01d28e">Total: Rp {{ placeRp($order->total) }}</span></h6>



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

                                </div>

                                <div class="row justify-content-between mt-4 pl-3">
                                    <p class="text-muted">{{ $order->tgl_mulai_sewa }} - {{ $order->tgl_akhir_sewa }}</p>
                                    <form action="{{ route('user.RingkasanOrder') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $order->id }}">
                                        <button type="submit" class="card-link btn btn-danger mr-3">Ringkasan</button>
                                    </form>
                                </div>



                            </div>


                        </div>

                    </div>

                    @endforeach

                    <span class="w-100 px-auto">Selesai</span>
                    <hr class="pl-3 mt-n1">

                    @foreach (Auth::user()->order()->get()->where('status', 'Selesai') as $order)

                    @php
                    $mobil = $order->mobil()->first();
                    $transmisi = $mobil->transmisi()->first()->nama_transmisi;
                    @endphp

                    <div class="card my-2">

                        <div class="row">
                            <figure class="col-4">
                                <img class="rounded figure img-fluid" src="{{ asset('assets/img/cars/' . $mobil->gambar) }}" style="transform: translate(10px, 25px);">
                            </figure>

                            <div class="card-body col-8">
                                <h5 class="card-title">{{ $mobil->nama }}<span class="float-right" style="color: #01d28e">Rp. {{ placeRp($mobil->harga) }} / Hari</span></h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ "Merek Belum" }}<span class="float-right" style="color: #01d28e">Total: Rp {{ placeRp($order->total) }}</span></h6>



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

                                </div>

                                <div class="row justify-content-between mt-4 pl-3">
                                    <p class="text-muted">{{ $order->tgl_mulai_sewa }} - {{ $order->tgl_akhir_sewa }}</p>
                                    <form action="{{ route('user.RingkasanOrder') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $order->id }}">
                                        <button type="submit" class="card-link btn btn-danger mr-3">Ringkasan</button>
                                    </form>
                                </div>



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