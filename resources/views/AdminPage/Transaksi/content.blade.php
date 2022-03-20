<div class="container-fluid mt-2">
    <div class="container">

        <div class="card">
            <div class="container p-3">
                <figure class="figure w-100 p-0 d-flex d-md-none">
                    <img src="" class="mx-auto figure-img img-fluid rounded" alt="Gambar Mobil">
                </figure>
                <div class="row pl-3">
                    <span class="text-black font-poppins-400 font-size-2"></span>
                    <button class="btn btn-outline-success bg-none ml-auto font-poppins-400 mr-3">Tersedia</button>
                </div>
                <div class="row pl-3 mt-1 h-100">
                    <figure class="figure col-4 d-none d-md-flex">
                        <img src="{{ asset('assets/img/cars/car-6.jpg') }}" class="img-fluid rounded" alt="Gambar Mobil">
                    </figure>
                    <div class="col pb-2">
                        
                        <div class="row mb-0"style="height: 10%">
                            <div class="col-auto">

                                <i class="fas fa-user  pr-3">4</i>
                                
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-suitcase  pr-3">4</i>
                                
                            </div>
                
                            <div class="col-auto">
                                <i class="fa fa-gear  pr-3">Manual</i>
                                
                            </div>
                            
                        </div>
    
                        <div class="row mb-0 mt-3 position-absolute">
                            <p class="bg-lighter p-2 text-md rounded text-dark font-weight-600">
                                Dark Underground
                            </p>
                        </div>
    
    
                        <div class="row pl-0 mt-6 mt-md-8 align-content-end h-25">
                            <div class="col text-left">
                                <span class="mt-0 mt-md-2 font-poppins-400 d-flex w-100">Dari</span>
                                <span class="font-poppins-400 font-size-2 text-red">Rp 
                                    <span class="text-muted font-poppins-400">12.000 / hari</span>
                                </span>
                            </div>
                            <div class="col text-right pt-3">
                                <button data-toggle="modal" data-target="#modal" class="mx-auto btn btn-success font-poppins-400" style="width: 140px; ">Pilih</button>
                            </div>
                        </div>
    
                    </div>
                </div>
                
            </div>
        </div>


        <div class="card">
            <div class="card-header">
                <span style="font-size: 20px;">Register Form</span>
            </div>
            <div class="card-body">
                <div class="container">
                    <form class="p-0 m-0">

                        <label for="username">Username</label>
                        <div class="form-group">
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Username:</span>
                                </div>
                                <input class="form-control" type="text" name="name" id="username">
    
                            </div>
                        </div>
    
                        <label for="password">Password</label>
                        <div class="form-group">
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Password: </span>
                                </div>
    
                                <input class="form-control" type="password" name="password" id="password">
    
                            </div>
                        </div>

                        <div class="row px-3">
                            <button class="w-100 btn mx-auto btn-primary">Register</button>
                        </div>

                    </form>



                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <span style="font-size: 20px;">Login Form</span>
            </div>
            <div class="card-body">
                <div class="container">
                    <form class="p-0 m-0">

                        <label for="username">Username</label>
                        <div class="form-group">
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Username:</span>
                                </div>
                                <input class="form-control" type="text" name="name" id="username">
    
                            </div>
                        </div>
    
                        <label for="password">Password</label>
                        <div class="form-group">
                            <div class="input-group input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Password: </span>
                                </div>
    
                                <input class="form-control" type="password" name="password" id="password">
    
                            </div>
                        </div>

                        <div class="row px-3">
                            <button class="w-100 btn mx-auto btn-primary">Login</button>
                        </div>

                    </form>



                </div>
            </div>
        </div>

        <div class="card">
            <div class="input-daterange datepicker row align-items-center">
                <div class="col">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                            </div>
                            <input class="form-control" placeholder="Start date" type="text" value="06/18/2020">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                            </div>
                            <input class="form-control" placeholder="End date" type="text" value="06/22/2020">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="TanpaSupirForm" class="card">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-8">
                        <label for="#" class=" font-poppins-400">Tanggal Pengambilan</label>
                        <div class="form-group row px-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-poppins-400">Pada Tanggal</span>
                            </div>
        
                            <input type="date" class="col mr-3 form-control">
        
                        </div>
                          
                        <div class="invalid-feedback">
                              
                        </div>
                          
                    </div>
        
                    <div class="form-group col-4">
                        
                        <label for="#" class=" ont-poppins-400">Waktu Pengambilan</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-poppins-400">Pada Waktu</span>
                            </div>
        
                            <input type="time" class="form-control">
                            
                           
                        </div>
                          
                        <div class="invalid-feedback">
                              
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
        
                            <input type="date" class="form-control">
                        </div>
                            
                        
                          
                        <div class="invalid-feedback ">
                              
                        </div>
                          
                    </div>

                    <div class="col ">
                        
                        <div class="form-group w-50 mr-3">
                            
    
                            <div class="input-group">
                                
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Pada Jam</span>
                                </div>
            
                                <select name="" id="" class="form-control">
                                    @for ($i = 0; $i < 24; $i++)
                                        <option></option>
                                    @endfor
                                </select>
            
                            </div>
            
                        </div>

                        <div class="form-group w-50">
                            <div class="input-group">
                                
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Pada Menit</span>
                                </div>
            
                                <select name="" id="" class="form-control">
                                    @for ($i = 0; $i < 60; $i += 15)
                                        <option></option>
                                    @endfor
                                </select>
            
                            </div>

                        </div>

                    </div>

                </div>
                <hr class="pl-3 mb-2">
                <div class="row">
                    <span class="text-muted  mx-auto font-poppins-400">Tanggal Selesai: Kam, 3 Feb 2022</span>
                </div>
                <hr class="pl-3 mt-2">
                <button class="pl-3 w-100 btn btn-success font-poppins-400">Cari Mobil</button>
            </div>
        </div>

        <div class="card">
            <div class="row mx-2 my-3">
                <button class="btn btn-outline-success active col">
                    <span>Dengan Supir</span>
                </button>
                <button class="btn btn-outline-success col">
                    <span>Tanpa Supir</span>
                </button>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-8">
                        <label for="#" class=" font-poppins-400">Tanggal Penjemputan</label>
                        <div class="form-group row px-3">
    
                            <input type="date" class="col mr-3 form-control">
    
                        </div>
                          
                        <div class="invalid-feedback">
                              
                        </div>
                          
                    </div>
    
                    <div class="form-group col-4">
                        
                        <label for="#" class=" ont-poppins-400">Durasi</label>
                        <div class="input-group">
                            <input type="number" class="form-control" min="1" max="14">
                            
                            <div class="input-group-append">
                                <span class="input-group-text font-poppins-400">Hari</span>
                            </div>
                        </div>
                        <small class="font-poppins-400">Minimal Durasi 1 Hari dan Maksimal 14 Hari</small>
                       
                          
                        <div class="invalid-feedback">
                              
                        </div>
                          
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-8">
                        <label for="" class="font-poppins-400">Waktu Penjemputan</label>
                       
                        <div class="input-group">
                            <div class="input-group-append border-left ">
                                <span class="input-group-text font-poppins-400">Pada Jam</span>
                            </div>

                            <select class="form-control">
                                @for ($i = 1; $i <= 24; $i += 1)
                                <option></option>
                                @endfor
                            </select>
                        </div>
                            
                        
                          
                        <div class="invalid-feedback ">
                              
                        </div>
                          
                    </div>
                    <div class="form-group col-4">
                        <label for="#" style="font-poppins-400" >Menit</label>
                        <div class="input-group">
                            <select class="form-control">
                                @for ($i = 0; $i < 60; $i += 15)
                                <option></option>
                                @endfor
                            </select>
                            <div class="input-group-append border-left">
                                <span class="input-group-text">Menit</span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="pl-3 mb-2">
                <div class="row">
                    <span class="text-muted  mx-auto font-poppins-400">Tanggal Selesai: Kam, 3 Feb 2022</span>
                </div>
                <hr class="pl-3 mt-2">
                <button class="pl-3 w-100 btn btn-success font-poppins-400">Cari Mobil</button>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-8">
                        <label for="#" class=" font-poppins-400">Tanggal Pengambilan</label>
                        <div class="form-group row px-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-poppins-400">Pada Tanggal</span>
                            </div>

                            <input type="date" class="col mr-3 form-control">
    
                        </div>
                          
                        <div class="invalid-feedback">
                              
                        </div>
                          
                    </div>
    
                    <div class="form-group col-4">
                        
                        <label for="#" class=" ont-poppins-400">Waktu Pengambilan</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-poppins-400">Pada Waktu</span>
                            </div>

                            <input type="time" class="form-control">
                            
                           
                        </div>
                          
                        <div class="invalid-feedback">
                              
                        </div>
                          
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-8">
                        <label for="" class="font-poppins-400">Tanggal Pengembalian</label>
                       
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text font-poppins-400">Pada Tanggal</span>
                            </div>

                            <input type="date" class="form-control">
                            
                        </div>
                            
                        
                          
                        <div class="invalid-feedback ">
                              
                        </div>
                          
                    </div>
                    <div class="form-group col-4">
                        <label for="#" style="font-poppins-400">Waktu Pengembalian</label>
                        <div class="input-group">
                            
                            <div class="input-group-prepend">
                                <span class="input-group-text">Pada Waktu</span>
                            </div>

                            <input type="time" class="form-control">

                        </div>
                    </div>
                </div>
                <hr class="pl-3 mb-2">
                <div class="row">
                    <span class="text-muted  mx-auto font-poppins-400">Tanggal Selesai: Kam, 3 Feb 2022</span>
                </div>
                <hr class="pl-3 mt-2">
                <button class="pl-3 w-100 btn btn-success font-poppins-400">Cari Mobil</button>
            </div>
        </div>

        
        <div class="card">
            <div class="container p-3">
                <figure class="figure w-100 p-0 d-flex d-md-none">
                    <img src="assets/img/dataimg/NoImageA.png" class="mx-auto figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                </figure>
                <div class="row px-3">
                    <span class="text-black font-poppins-400 font-size-2">Toyata Contoh</span>
                    <button class="btn btn-outline-success bg-none ml-auto font-poppins-400 mr-md-3 mr-0">Dengan Supir</button>
                </div>
                <div class="row pl-3 mt-1 h-100">
                    <figure class="figure col-4 d-none d-md-flex">
                        <img src="assets/img/dataimg/NoImageA.png" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                    </figure>
                    <div class="col">
                        <div class="row mb-0">
                            <div class="col-auto">
                                <i class="fas fa-user font-size-2 pr-3"></i>
                                4
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-suitcase font-size-2 pr-3"></i>
                                4
                            </div>
                        </div>

                    

                        <div class="row px-0 px-md-3 pb-4 h-100">
                            <div class="col text-left pl-0 align-self-end">
                                <span class="mt-2 font-poppins-400 d-block w-100">Dari</span>
                                <span class="font-poppins-400 font-size-2 text-red">Rp 160.000
                                    <span class="text-muted font-poppins-400">/hari</span>
                                </span>
                            </div>
                            <div class="col text-right align-self-end">
                                <button class="mt-2 btn btn-success font-poppins-400" style="width: 140px; ">Pilih</button>
                            </div>
                        </div>

                    </div>
                </div>
                
            </div>
        </div>

        <div class="card d-inline-flex mx-auto">
          
            <a class="row px-4" href="#">
                <figure class="figure mx-auto mt-3">
                    <img src="assets/img/dataimg/NoImageA.png" class=" w-100 figure-img img-fluid rounded img-thumbnail" alt="A generic square placeholder image with rounded corners in a figure.">
                </figure>
            </a>

            <div class="row pl-3">
                <span class="font-size-3 font-poppins-400 ml-3">Toyota Contoh</span>
            </div>
            <div class="container pl-4 mt-4 pb-4">
                <div class="row mb-0">
                    <div class="col-auto">
                        <i class="fas fa-user font-size-2 pr-3"></i>
                        4
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-suitcase font-size-2 pr-3"></i>
                        4
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-car font-size-2 pr-3"></i>
                        <span class="font-poppins-400 text-muted">2015 atau setelahnya</span>
                    </div>

                </div>
            </div>
            
        </div>






        <div class="card">
            <div class="card-body">
                <div class="row">


                    <div class="col-sm-12 col-lg-4 }}">
                        <div class="card w-100">
                            <img id="previewImg" class="card-img-top" src="assets/img/dataImg/NoImageA.png">
                            <div class="card-body text-left">
                                <h3 class="card-title mb-0 mt-1">
                                    <span></span>
                                </h3>
                                <p class="card-text">.</p>

                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 col-lg-8 h-100  ">
                        <div class="card" style="width: 100%">
                            <div class="card-header d-flex">
                                <h3 class="card-title">Tabel Mobil</h3>

                                <div class="card-tools ml-auto">
                                    <div class="input-group input-group-sm" style="width: 150px;">
                                        <input type="text" name="table_search" class="form-control" placeholder="Search">

                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-0 overflow-auto" style="max-height: 350px;">
                                <table class="table table-hover text-nowrap">
                                      
                                    <thead>
                                        <tr>
                                            <th class="text-center text-muted fs-2">table is empty</th>
                                        </tr>
                                    </thead>
                                      
                                    <thead>
                                        <tr>
                                            <th class="position-relative mr-n4">Select</th>
                                            <th>Nama</th>
                                            <th>Sewa / Hari</th>
                                            <th>Jumlah <i class="fas fa-chair"></i></th>
                                            <th>No. Pelat</th>
                                            <th class="text-center">Tags <i class="fas fa-tags"></i></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                          
                                          
                                          
                                        <tr class="text-center align-middle">
                                            <td class="p-0 align-middle">
                                                <input type="hidden" name="descM" value="  ">
                                                <input type="hidden" name="gmbM" value="  ">
                                                <input type="hidden" name="namaMB" value="  ">
                                                <input type="hidden" name="hargaMB" value="  ">
                                                <input type="hidden" name="NoMb" value="  ">
                                                <input type="hidden" name="clickL" value="list  ">
                                                <a id="list  " onclick="sendTopreview(this, '#previewImg');" class="mx-auto btn btn-warning btn-sm h-100 text-white"><strong>></strong></a>
                                            </td>
                                            <td class="align-middle">  </td>
                                            <td class="align-middle">Rp.  </td>
                                            <td class="align-middle">  </td>
                                            <td class="align-middle">  </td>
                                            <td class="  ">
                                                  
                                                <h4 class="text-muted my-auto">this row haven't any tags</h4>
                                                  
                                                  
                                                <div class="col text-center mx-1">
                                                    <h3 class="row mt-1 mb-1 d-inline-block">
                                                        <span class="badge rounded-pill bg-secondary badge-lg">
                                                            <i class="fa fa-tag"></i>
                                                              
                                                        </span>
                                                    </h3>
                                                    <div class="row mb-1 d-block">  </div>
                                                </div>
                                                  
                                                  
                                            </td>
                                        </tr>
                                          
                                          
                                    </tbody>
                                      
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <form id="formPesanan" action="" method="POST" enctype="multipart/form-data">
              
              
            <input type="hidden" name="ClickM" value="tambahPm">
            <div class="card text-left">

                <div class="card-body">
                    <div class="row d-block px-2">
                        <div class="form-group">
                            <label for="catatan" class="mx-auto d-block"><span class="subheading" style="color: #01d28e">Harga Sewa</span></label>

                            <div class="container content-center">

                                <div class="row">
                                    <div class="col">
                                        <p>Harga sewa Perhari</p>
                                    </div>
                                    <div class="col">
                                        <p id="hargaPreview" style="color: orangered">
                                              
                                        </p>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="form-group">
                            <label for="nama-customer" class="col-form-label">Nama Lengkap:</label>
                            <input class="form-control">   
                              
                            <div class="invalid-feedback">
                                  
                            </div>
                              
                        </div>
                        <div class="form-group">
                            <label for="nomer" class="col-form-label">Nomer Telepon / Whatsapp:</label>
                            <input class="form-control"> 
                              
                            <div class="invalid-feedback">
                                  
                            </div>
                              
                        </div>
                        <div class="form-group">
                            <label for="tanggal-sewa" class="col-form-label">Tanggal & Waktu Pengambilan: </label>
                            <div class="form-group row px-3">
                                <input daterange="date" date-range-target="#Pengembalian" class="col mr-3 form-control">

                                <select name="jam_sewa" class="col-2 mr-2 form-control">
                                      
                                          
                                </select>

                                <select name="menit_sewa" class="col-2  form-control">
                                    <option value="00">00</option>
                                    <option value="30">30</option>
                                </select>

                            </div>
                              
                            <div class="invalid-feedback">
                                  
                            </div>
                              
                        </div>

                        <div class="form-group">

                            <label for="Pengembalian" class="col-form-label">Tanggal & Waktu Pengembalian:</label>
                            <input type="datetime-local" value=" " name="tgl_pgmbl" class="form-control" id="Pengembalian">

                        </div>
                        <div class="form-group">
                            <label for="tp_sewa" class="col-form-label">Tipe Sewa</label>
                            <select    name="tp_sewa" id="tp_sewa" onchange="" class="form-control form-control-sm mb-3">
                                <option   value="Lepas Kunci">Lepas Kunci</option>
                                <option   value="Mobil Dengan Pengemudi">Mobil + Driver</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="serah-terima" class="col-form-label">Alamat Tempat Tinggal:</label>
                            <textarea class="form-control "></textarea>
                            <div class="invalid-feedback">
                                  
                            </div>
                              
                        </div>
                        <div class="form-group">
                            <label for="catatan" class="col-form-label">Alamat Serah Terima Mobil:</label>
                            <textarea class="form-control"></textarea>
                              
                            <div class="invalid-feedback">
                                  
                            </div>
                              
                        </div>

                          
                        <div class="form-group">
                            <label for="catatan" class="mx-auto d-block">
                                <span class="subheading" style="color: #01d28e">Ringkasan Order</span>
                            </label>
                            <div class="container content-center">
                                <div class="row">
                                    <div class="col d-flex">
                                        <p>Harga sewa / Hari</p>
                                    </div>
                                    <div class="col">
                                        <p>Rp  </p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col d-flex">
                                        <p>Total Harga sewa (   Hari)</p>
                                    </div>
                                    <div class="col">
                                        <p>Rp  </p>
                                    </div>
                                </div>
                                  
                                <div id="hargaSopirP" class="row">
                                    <div class="col">
                                        <p>Biaya Sopir</p>
                                    </div>
                                    <div id="hargaSopirC" class="col">
                                        <p>Rp 150.000</p>
                                    </div>
                                </div>
                                  
                                <div class="row">
                                    <div class="col">
                                        <p style="color: #01d28e">Total Tagihan</p>
                                    </div>
                                    <div class="col">
                                        <p style="color: orangered">Rp   </p>
                                        <input type="hidden" name="TotalTagihan">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="tipe_bayar" class="col-form-label">Lakukan Pembayaran Pada Salah Satu No.rekening dibawah:</label>
                            <select class="form-control" name="tipe_bayar" id="">
                                <option value="BCA" selected>Rekening BCA : 0777562792898</option>
                                <option value="Direct">Link Aja : 085784793034 (a/n Asfa Hani)</option>
                            </select>

                        </div>

                          

                    </div>
                      
                    <hr>
                    <label for="catatan" class="col-form-label">Upload Bukti Pembayaran Anda (Struk/Screenshot Bukti Pembayaran)</label>
                    <input type="file" name="GMB_Bukti" onchange="preview(this, '#buktibayar')">
                    <div class="container-fluid">
                        <img alt="Bukti Bayar" src="assets/img/dataImg/NoImageA.png" id="buktibayar" class="img-fluid img-thumbnail">
                    </div>
                      
                    <button type="submit" class="btn btn-warning btn-lg btn-block">Hitung Semua</button>
                      
                </div>
            </div>

              
            <section class="mt-3">
                <button type="submit" class="btn btn-primary btn-lg btn-block">Booking Sekarang</button>
            </section>
              

        </form>


        <div class="card pt-2 border border-dark">

            <div class="row d-block d-md-flex text-center">

                <div class="col-md-4 col p-0 m-0 px-4 pb-3 pt-2">
                    <img class="img-thumbnail mb-2 mt-2 mx-0 h-100" src="  " alt="Gambar Diri Supir">
                </div>

                <div class="col col-md-8 text-left text-black font-weight-bolder pl-3 pl-md-0" style="font-family: Quicksand;">
                    <div class="container">
                        <div class="row">
                            <div class="card-title col display-4">IDENTITAS DRIVER</div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p class="font-size-2">Nama</p>
                            </div>
                            <div class="col-auto">
                                :
                            </div>
                            <div class="col">
                                <p class="font-size-2">
                                    Lorem, ipsum dolor.
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
                                    32.
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p class="font-size-2">Alamat</p>
                            </div>
                            <div class="col-auto">
                                :
                            </div>
                            <div class="col">
                                <p class="font-size-2">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing..
                                </p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p class="font-size-2">Tanggal Mulai Kerja</p>
                            </div>
                            <div class="col-auto">
                                :
                            </div>
                            <div class="col">
                                <p class="font-size-2">
                                    Lorem ipsum dolor sit.
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
                                    Lorem, ipsum..
                                </p>
                            </div>
                        </div>

                    </div>
                </div>

            </div>



        </div>

        <div class="card border border-dark">

            <div class="card-header" style="background-color: #BCE3B6;">
                <b class="float-left">Pekerjaan Baru</b>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="p-3 col-12 col-lg-6 d-flex d-lg-none">
                        <img class="img-thumbnail" src="  " alt="Gambar Mobil">
                    </div>

                    <div class="col-12 col-md-6">
                        <div class="container">
                            <div class="row">
                                <div class="card-title font-size-2">Identitas Pelanggan</div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <p class="font-size-2">Rudi (0451231231)</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <p class="font-size-2">Alamat Pickup:</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <p class="font-size-2">Jl. Jagorindo Surabaya No.75</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <p class="font-size-2">Jumlah Hari Sewa: 1 Hari Sewa</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <p class="font-size-2">Tanggal Sewa: 17/01/2020 - 18/01/2022</p>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-12 col-lg-6 p-3 d-none d-lg-flex">
                        <img class="img-thumbnail" src="  " alt="Gambar Mobil">
                    </div>

                </div>
            </div>

            <div class="row p-0 m-0 border border-bottom-0 border-right-0 border-left-0 border-dark">
                <div class="col text-center my-3">
                    <select name="updateOp" id="updateOp" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
                <button class="btn btn-success">Update</button>
            </div>



        </div>

        <div class="card">

            <div class="card-header pt-1 mt-2 text-center border-bottom-0 ">


                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item w-100">
                        <a class="nav-link active pt-3 pb-2 h-100 d-flex">

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="Pcheck1">
                                <label class="custom-control-label" for="Pcheck1"></label>
                            </div>

                            <span class="float-left m-0 mb-2 p-0 d-block">
                                Diproses / XX-XX-XXXX
                            </span>

                            <span class="float-right m-0 mb-2 p-0 ">
                                XX-XX-XXXX / 1 Hari Sewa
                            </span>
                        </a>
                    </li>


                </ul>
            </div>

            <div class="card-body mt-2">

                {{-- <div class="row mx-1 rounded-pill" style="background-color: #b8e6a8;">
                
                    <div class="col-1 my-auto">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="Pcheck1">
                            <label class="custom-control-label" for="Pcheck1"></label>
                        </div>
                    </div>
          
                    <div class="col-11 text-center">
          
                        <div class="row d-lg-inline-block d-block mx-auto float-md-left">
                            Siap Diproses / XX-XX-XXXX
                        </div>
                
                        <div class="row d-lg-inline-block d-block mx-auto float-md-right">
                            XX-XX-XXXX / 1 Hari Sewa
                        </div>
          
                    </div>
                    
          
                </div> --}}

                <div class="row d-inline-flex">

                    <div class="mx-sm-auto col-md-12 col-lg text-center d-block mt-1">
                        <img src="storage/1.jpg" alt="Gambar Mobil Pesanan" class="align-self-center m-2 img-fluid rounded-start img-thumbnail">
                        <div class="row text-center">
                            <h2 class="col-6 text-center text-info"></h2>
                            <h2 class="col-6 text-center font-weight-bolder"></h2>
                        </div>
                    </div>


                    <div class="my-lg-0 col-md-12 col-lg mr-1 text-left" style="border-left: 2px #d3ddcf solid;">
                        <h2 class="mt-3">Alamat Serah Terima</h2>
                        <p class="text-left text-justify-center"></p>
                        <button type="button" class="float-right btn btn-info mt-auto" data-toggle="modal" data-target="#infoOrder1">More Info</button>

                        <!-- Modal info -->
                        <div class="modal fade" id="infoOrder1" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h6 class="modal-title" id="modal-title-default">Info Order</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">

                                        <div class="row d-flex text-center">
                                            <div class="col-12">
                                                <strong class="display-4">Alamat Rumah</strong>
                                                <p class="display-5">Lorem, ipsum dolor.</p>
                                            </div>


                                            <div class="col-6">
                                                <strong class="display-4">Alamat Serah Terima</strong>
                                                <p class="display-5">Lorem, ipsum dolor.</p>
                                            </div>


                                        </div>

                                        <table class="table mx-auto table-hover text-left table-bordered shadow table">
                                            <tbody class="text-center">

                                                <tr>
                                                    <td class="d-flex">
                                                        <h3 class="col-3 text-left">Nama Customer</h3>
                                                        <h3 class="col-1"> : </h3>
                                                        <h3 class="col-8 ">Lorem, ipsum dolor.</h3>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="d-flex">
                                                        <h3 class="col-3 text-left">Nomer Telepon</h3>
                                                        <h3 class="col-1"> : </h3>
                                                        <h3 class="col-8 ">Lorem.</h3>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="d-flex">
                                                        <h3 class="col-3 text-left">Tanggal Mulai Sewa</h3>
                                                        <h3 class="col-1"> : </h3>
                                                        <h3 class="col-8 ">Lorem ipsum dolor sit.</h3>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="d-flex">
                                                        <h3 class="col-3 text-left">Tanggal Akhir Sewa</h3>
                                                        <h3 class="col-1"> : </h3>
                                                        <h3 class="col-8 ">Lorem, ipsum dolor.</h3>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="d-flex">
                                                        <h3 class="col-3 text-left">Harga Sewa Perhari</h3>
                                                        <h3 class="col-1"> : </h3>
                                                        <h3 class="col-8 ">Rp. Lorem, ipsum dolor.</h3>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="d-flex">
                                                        <h3 class="col-3 text-left">Total Harga</h3>
                                                        <h3 class="col-1"> : </h3>
                                                        <h3 class="col-8 ">Rp. </h3>
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
                                                        <h3 class="col-8 ">Lorem.</h3>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="d-flex">
                                                        <h3 class="col-3 text-left">Nomer Pelat Mobil</h3>
                                                        <h3 class="col-1"> : </h3>
                                                        <h3 class="col-8 ">Lorem ipsum dolor sit.</h3>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="d-flex">
                                                        <h3 class="col-3 text-left">Jumlah Kursi</h3>
                                                        <h3 class="col-1"> : </h3>
                                                        <h3 class="col-8 ">Lorem, ipsum dolor.</h3>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="d-flex">
                                                        <h3 class="col-3 text-left">Tahun Beli</h3>
                                                        <h3 class="col-1"> : </h3>
                                                        <h3 class="col-8 ">Lorem, ipsum dolor.</h3>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="d-flex">
                                                        <h3 class="col-3 text-left">Harga sewa Per-Hari</h3>
                                                        <h3 class="col-1"> : </h3>
                                                        <h3 class="col-8 ">Rp. 11111</h3>
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

                                            </tbody>
                                        </table>


                                        <div class="col-12 mx-auto mt-2">
                                            <strong class="display-5">Gambar Mobil</strong>
                                            <img src="storage/1.jpg" alt="...." class="img-thumbnail mb-4 align-self-center">
                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="my-lg-0 col-md-12 col-lg ml-0 text-left" style="border-left: 2px #d3ddcf solid;">
                        <h3 class="mb-0 mt-2 pl-3">Tipe sewa: bayae</h3>
                        <select class="form-select ml-3 mt-3 w-100" style="max-width: 85%;">
                            <option selected value="">Menu Sopir</option>
                            <option selected value="">Menu Sopir</option>
                            <option selected value="">Menu Sopir</option>

                        </select>

                          
                        <select class="form-select ml-3 mt-2 w-100" style="max-width: 85%;">
                            <option selected>Ada X Mobil yg sejenis</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                        </select>
                          

                        <h3 class="mb-0 mt-2 pl-3">Pembayaran</h3>
                        <p class="mt-0 pl-3"></p>
                    </div>

                </div>

                <div class="row rounded-pill mx-1" style="background-color: #c4c4c4;">
                    <div class="col-auto w-50 text-left">
                        Total Bayar
                    </div>
                    <div class="col-auto w-50 text-right">
                        Rp. 10.000
                    </div>
                </div>
                <div class="row mt-1 mx-1">
                    <form action="" class="col-auto w-50 text-left" method="POST">

                        <button class="btn btn-danger text-white">Cancel</button>
                    </form>
                    <form action="" class="col-auto w-50 text-right" method="POST">

                        <button class="btn btn-success text-white">PROSES</button>
                    </form>
                </div>

            </div>
        </div>


        <div class="container p-0 w-50 mx-auto">

            <div class="text-center bg-white border border-dark rounded">
                <span class="font-size-2">
                    Lorem ipsum dolor sit.
                </span>
            </div>
            
            
            <div class="bg-white border">
                <div class="text-center font-size-2">Lorem, ipsum dolor.</div>
            </div>
            <div class="bg-white border">
                <div class="text-center font-size-2">Lorem, ipsum dolor.</div>
            </div>
            <div class="bg-white border">
                <div class="text-center font-size-2">Lorem, ipsum dolor.</div>
            </div>
            

        </div>

    </div>
</div>