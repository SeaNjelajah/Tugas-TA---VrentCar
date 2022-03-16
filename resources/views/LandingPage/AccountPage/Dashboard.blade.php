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
                                <a class="card-link" href="#">Riwayat Booking</a>
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
                            
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <div class="card-profile-stats d-flex justify-content-center">
                                            <div>
                                                <span class="heading">22</span>
                                                <span class="description">Booking Selesai</span>
                                            </div>
                                            <div>
                                                <span class="heading">10</span>
                                                <span class="description">Booking Dibatalkan</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <h5 class="h3">
                                        {{ Auth::user()->username }}
                                    </h5>
                                    <div class="h5 font-weight-300">
                                        <i class="fas fa-envelope mr-2"></i>{{ Auth::user()->email }}
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
                                        <input type="text" id="username" class="form-control" placeholder="Username" value="{{ Auth::user()->username }}">
                                    </div>
                                    </div>
                                    <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="email">Email</label>
                                        <input type="email" id="email" class="form-control" placeholder="email@example.com" value="{{ Auth::user()->email }}">
                                    </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col">
                                    <div class="form-group">
                                        <label class="form-control-label" for="nama_lengkap">Nama Lengkap</label>
                                        <input name="nama_lengkap" type="text" id="nama_lengkap" class="form-control" placeholder="Nama Lengkap" >
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

                    

                </div>



            </div>

        </div>

    </div>
    
    @include('LandingPage.Script')
</body>
</html>