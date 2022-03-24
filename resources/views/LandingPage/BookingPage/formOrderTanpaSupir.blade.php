<!DOCTYPE html>
<html lang="en">

<head>
    <title>VrentCar - Persewaan mobil terbaik anda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('LandingPage.Style')

</head>

<body>

    @include('LandingPage.ZTemplate.navbar')
    <!-- END nav -->

    <section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('images/bg_3.jpg');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Form Order <i class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Form Order</h1>
                </div>
            </div>
        </div>
    </section>
    {{-- konten --}}
    <section class="ftco-section p-1 mt-5">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Form Booking</span>
                    <h2 class="mb-1">Lengkapi Data Diri Anda</h2>
                </div>
            </div>
        </div>
    </section>

    {{-- muncul mobil yang dipilih --}}


    <section class="ftco-section ftco-car-details p-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="car-details">
                        <div class="img rounded" style="background-image: url({{ asset('assets/img/cars/' . $mobil->gambar) }});"></div>
                        <div class="text text-center">
                            {{-- @if (!empty($tag['Merek'])) <span class="subheading">{{ $tag['Merek'] }}</span> @endif --}}
                            <h2>{{ $mobil->nama_mb }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-dashboard"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Mileage
                                        <span>{{ $mobil->millage }}</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-pistons"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Transmission
                                        <span>{{ $mobil->transmisi()->first()->nama_transmisi }}</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car-seat"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Seats
                                        <span>{{ $mobil->jumlah_kursi }} Adults</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-backpack"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Luggage
                                        <span>{{ $mobil->kapasitas_koper }} Bags</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12 pills">
                    <div class="bd-example bd-example-tabs">
                        <div class="d-flex justify-content-center">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">


                                <li class="nav-item">
                                    <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill" href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer" aria-expanded="true">Description</a>
                                </li>

                            </ul>
                        </div>

                        <div class="tab-content" id="pills-tabContent">


                            <div class="tab-pane fade show active" id="pills-manufacturer" role="tabpanel" aria-labelledby="pills-manufacturer-tab">
                                <p>{{ $mobil->desc_mb }}</p>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- akhir data mobil --}}
    
    <form class="mb-5" method="POST" action="{{ route('FormOrder.create') }}">
        @csrf
        <input required type="hidden" name="id" value="{{ $mobil->id }}">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <section>
                        <div class="form-group">
                            <label for="catatan" class="mx-auto d-block"><span class="subheading" style="color: #01d28e">Harga Sewa</span></label>

                            <div class="container content-center">
                                <div class="row">
                                    <div class="col">
                                        <p>Harga sewa Perhari</p>
                                    </div>
                                    <div class="col">
                                        <p style="color: orangered">Rp {{ placeRp($mobil->harga) }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <p>Biaya Sopir</p>
                                    </div>
                                    <div class="col">
                                        <p>Rp 150.000</p>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="form-group">
                            <label for="penyewa" class="col-form-label">Nama Lengkap:</label>
                            <input required name="penyewa" type="text" class="form-control" id="penyewa" />
                        </div>

                        <div class="form-group">
                            <label for="No_tlp" class="col-form-label">Nomer Telepon / Whatsapp:</label>
                            <input required name="No_tlp" type="number" class="form-control" id="No_tlp" />
                        </div>



                        <div class="row">
                            <div class="form-group col-6">
                                <label for="#" class=" font-poppins-400">Tanggal Pengambilan</label>
                                <div class="form-group row px-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-poppins-400">Pada Tanggal</span>
                                    </div>

                                    <input required daterange="date" date-range-target="#tanggal-pengembalian-tanpa-supir" name="tanggal_pengambilan" id="tanggal-pengambilan-tanpa-supir" type="date" class="col mr-3 form-control">

                                </div>

                                <div class="invalid-feedback">

                                </div>

                            </div>

                            <div class="form-group col-6">
                                <label for="#" style="font-poppins-400">Waktu Pengambilan</label>
                                <div class="input-group">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Pada Jam</span>
                                    </div>

                                    <select name="jam_pengambilan" id="waktu-jam-pengambilan-tanpa-supir" class="form-control">
                                        @for ($i = 0; $i < 24; $i++) <option>{{ ($i < 10) ? "0$i" : $i }}</option>
                                            @endfor
                                    </select>

                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Pada Menit</span>
                                    </div>

                                    <select name="menit_jam_pengambilan" id="waktu-menit-pengambilan-tanpa-supir" class="form-control">
                                        @for ($i = 0; $i < 60; $i +=30) <option>{{ ($i < 10) ? "0$i" : $i }}</option>
                                            @endfor
                                    </select>

                                </div>

                            </div>

                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="" class="font-poppins-400">Tanggal Pengembalian</label>

                                <div class="input-group pr-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text font-poppins-400">Pada Tanggal</span>
                                    </div>

                                    <input required name="tanggal_pengembalian" id="tanggal-pengembalian-tanpa-supir" type="date" class="form-control" disabled="true">
                                </div>



                                <div class="invalid-feedback ">

                                </div>

                            </div>
                            <div class="form-group col-6">
                                <label for="#" style="font-poppins-400">Waktu Pengembalian</label>
                                <div class="input-group">

                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Pada Jam</span>
                                    </div>

                                    <select name="jam_pengembalian" id="waktu-jam-pengembalian-tanpa-supir" class="form-control" disabled="true">
                                        @for ($i = 0; $i < 24; $i++) <option>{{ ($i < 10) ? "0$i" : $i }}</option>
                                            @endfor
                                    </select>

                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Pada Menit</span>
                                    </div>

                                    <select name="menit_jam_pengembalian" id="waktu-menit-pengembalian-tanpa-supir" class="form-control" disabled="true">
                                        @for ($i = 0; $i < 60; $i += 30)
                                        <option>{{ ($i == 0) ? '00' : $i }}</option>
                                        @endfor
                                    </select>

                                </div>

                            </div>
                        </div>

                        <hr class="pl-3 mb-2">
                        <div class="row">
                            <span id="tanggal-selesai-tanpa-supir" class="text-muted  mx-auto font-poppins-400">XXX, X XXX XXXX Sampai XXX, X XXX XXXX</span>
                        </div>

                        <hr class="pl-3 mt-2">

                        @php
                            $member = Auth::user()->member()->first() or false;
                        @endphp

                        <div class="form-group">
                            <label for="alamat_rumah" class="col-form-label">Alamat Tempat Tinggal:</label>
                            <textarea name="alamat_rumah" class="form-control" id="alamat_rumah" placeholder="Isi alamat lengkap tempat tinggal Anda">@if($member){{ $member->alamat_rumah }}@endif</textarea>
                        </div>

                        <div class="form-group">
                            <label for="alamat_temu" class="col-form-label">Alamat Serah Terima Mobil:</label>
                            <textarea disabled name="alamat_temu" class="form-control" id="alamat_temu">Jl. Jagir Sidoresmo VI/66</textarea>
                            <small class="font-weight-bolder text-dark">Note: Alamat serah terima mobil hanya bisa berada di alamat rental mobil</small>
                        </div>

                        <div class="form-check">
                            <input required class="form-check-input" name="syarat" type="checkbox">
                            <label class="form-check-label" for="syarat">
                              Dengan mencheck box ini anda telah membaca, dan setuju dengan <a class="btn btn-link m-0 p-0" href="{{ route('ketentuan') }}">persyaratan ini</a>.
                            </label>
                        </div>


                    </section>
                    <hr>

                </div>


            </div>
            <section class="mt-3">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Selanjutnya</button>
            </section>

        </div>
    </form>

    {{-- akhir konten --}}
    {{-- footer --}}
    @include('LandingPage.ZTemplate.footer')
    {{-- akhir footer --}}

    @include('LandingPage.Script')
    <script src="{{ asset('js-vrcar/FormOrder/script2.js') }}"></script>

</body>

</html>