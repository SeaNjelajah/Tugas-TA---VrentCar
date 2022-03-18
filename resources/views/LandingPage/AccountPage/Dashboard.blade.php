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
                                My Profile
                            </li>
                            <li class="list-group-item">
                                <a class="card-link" href="{{ route('user.bookingBerjalan') }}">Booking Yang Berjalan</a>
                            </li>
                            <li class="list-group-item">
                                <a class="card-link" href="{{ route('user.RiwayatBooking') }}">Riwayat Booking</a>
                            </li>
                        </ul>
                    </div>

                </div>

                <div class="col">

                    <div class="card">
                        <div class="row">

                            <div class="col-3">
                                <img class="avatar position-absolute w-100 h-75 align-self-center" src="{{ asset('images/car-1.jpg') }}" style="transform: translate(23px, 31px);width: 120%!important;" alt="User Picture">
                            </div>
                            @php
                            $user = Auth::user();
                            $order = $user->order();
                            $order_count_of_selesai = $order->where('status', 'Selesai')->count();
                            $order_count_of_dibatalkan = $order->where('status', 'Dibatalkan')->count();
                            @endphp

                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <div class="card-profile-stats d-flex justify-content-center">
                                            <div>
                                                <span class="heading">{{ $order_count_of_selesai }}</span>
                                                <span class="description">Booking Selesai</span>
                                            </div>
                                            <div>
                                                <span class="heading">{{ $order_count_of_dibatalkan }}</span>
                                                <span class="description">Booking Dibatalkan</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <h5 class="h3">
                                        {{ $user->username }}
                                    </h5>
                                    <div class="h5 font-weight-300">
                                        <i class="fas fa-envelope mr-2"></i>{{ $user->email }}
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>

                    <form>
                        <div class="card mt-2">
                            <div class="card-header">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <h3 class="mb-0">Edit profile </h3>
                                    </div>
                                    <div class="col-4 text-right">
                                        <a href="#!" type="submit" class="btn btn-sm btn-primary">Save</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">

                                <h6 class="heading-small text-muted mb-4">User information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="username">Username</label>
                                                <input type="text" id="username" class="form-control" placeholder="Username" value="{{ $user->username }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="email">Email</label>
                                                <input type="email" id="email" class="form-control" placeholder="email@example.com" value="{{ $user->email }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-control-label" for="nama_lengkap">Nama Lengkap</label>
                                                <input name="nama_lengkap" type="text" id="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <hr class="my-4">
                                <!-- Address -->
                                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                                <div class="pl-lg-4">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-control-label" for="alamat_rumah">Alamat Rumah</label>
                                                <input name="alamat_rumah" id="alamat_rumah" class="form-control" placeholder="Alamat Rumah" type="text">
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                    </form>

                    @php
                    $punya_data_member = $user->member()->first() or false;
                    @endphp

                    <div class="card mt-3">

                        <div class="card-body">

                            <span class="text-lg" style="color: #01d28e">Persyaratan Dibawah adalah Persyaratan yang harus dipenuhi saat anda ingin menyewa mobil <b>Tanpa Supir</b>. Sebuah saran untuk menglengkapinya lebih awal agar lebih cepat diterima order anda saat menyewa.!</span>
                            <hr>

                            @php

                            if ($punya_data_member) {

                            $member = $user->member()->first();
                            $ktp = $member->ktp()->first();

                            } else {
                            $ktp = false;
                            }


                            @endphp
                            @if (!$ktp || $ktp->terverifikasi == "Ditolak")

                            @if ($ktp)
                            @if($ktp->terverifikasi == "Ditolak")
                            <div class="alert alert-danger">
                                KTP Anda di Tolak Silakan ulangi Upload KTP Lagi
                            </div>
                            @endif
                            @endif

                            <div class="alert alert-danger">
                                <form action="{{ route('user.ktp.upload') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="ktp" class="col-form-label">Upload KTP Anda (Screenshot Ktp)</label>
                                        <input class="form-control" type="file" name="ktp">
                                    </div>

                                    <button class="btn btn-danger w-100">Kirim</button>

                                </form>
                            </div>
                            @else
                            @if ($ktp->terverifikasi == "Diterima")
                            <div class="alert alert-success">
                                Persyaratan untuk untuk KTP anda Selesai <i class="float-right fas fa-check"></i>
                            </div>
                            @else
                            <div class="alert alert-warning">
                                KTP anda sedang dalam proses vertifikasi <i class="float-right fas fa-gear"></i>
                            </div>
                            @endif
                            @endif

                            `
                            @php


                            if ($punya_data_member) {

                            $member = $user->member()->first();
                            $kartu_keluarga = $member->kartu_keluarga()->first();

                            } else {
                            $kartu_keluarga = false;
                            }


                            @endphp

                            @if (!$kartu_keluarga || $kartu_keluarga->terverifikasi == "Ditolak")

                            @if ($kartu_keluarga)
                            @if($kartu_keluarga->terverifikasi == "Ditolak")
                            <div class="alert alert-danger">
                                Kartu Keluarga Anda di Tolak Silakan ulangi Upload Kartu Keluarga Lagi
                            </div>
                            @endif
                            @endif

                            <div class="alert alert-danger">
                                <form action="{{ route('user.kartu.keluarga.upload') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="kartu_keluarga" class="col-form-label">Upload Kartu Keluarga Anda (Screenshot Kartu Keluarga)</label>
                                        <input class="form-control" type="file" name="kartu_keluarga">
                                    </div>

                                    <button class="btn btn-danger w-100">Kirim</button>

                                </form>
                            </div>
                            @else

                            @if (!empty($kartu_keluarga->terverifikasi) and $kartu_keluarga->terverifikasi == "Diterima")
                            <div class="alert alert-success">
                                Persyaratan untuk untuk Kartu Keluarga anda Selesai <i class="float-right fas fa-check"></i>
                            </div>
                            @else
                            <div class="alert alert-warning">
                                Kartu Keluarga anda sedang dalam proses vertifikasi <i class="float-right fas fa-gear"></i>
                            </div>
                            @endif

                            @endif

                            `
                            @php

                            if ($punya_data_member) {

                            $member = $user->member()->first();

                            $sim_a = $member->sim_a()->first();

                            } else {
                            $sim_a = false;
                            }


                            @endphp

                            @if (!$sim_a || $ktp->terverifikasi == "Ditolak")

                            @if ($sim_a)
                            @if($sim_a->terverifikasi == "Ditolak")
                            <div class="alert alert-danger">
                                SIM A Anda di Tolak Silakan ulangi Upload SIM A Lagi
                            </div>
                            @endif
                            @endif

                            <div class="alert alert-danger">
                                <form action="{{ route('user.simA.upload') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label for="sim_a" class="col-form-label">Upload SIM A Anda (Screenshot SIM A)</label>
                                        <input class="form-control" type="file" name="sim_a">
                                    </div>

                                    <button class="btn btn-danger w-100">Kirim</button>

                                </form>
                            </div>
                            @else

                            @if (!empty($sim_a->terverifikasi) and $sim_a->terverifikasi == "Diterima")
                            <div class="alert alert-success">
                                Persyaratan untuk untuk SIM A anda Selesai <i class="float-right fas fa-check"></i>
                            </div>
                            @else
                            <div class="alert alert-warning">
                                SIM A anda sedang dalam proses vertifikasi <i class="float-right fas fa-gear"></i>
                            </div>
                            @endif

                            @endif

                            <hr>

                        </div>

                    </div>



                </div>



            </div>

        </div>

    </div>

    @include('LandingPage.Script')
</body>

</html>