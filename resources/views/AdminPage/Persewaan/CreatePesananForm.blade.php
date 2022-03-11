<div class="card">
    <div class="row mx-2 my-3">
        <button id="DenganSupir" class="btn btn-outline-success col active">
            <span>Dengan Supir</span>
        </button>
        <button id="TanpaSupir" class="btn btn-outline-success col">
            <span>Tanpa Supir</span>
        </button>
    </div>
</div>

<form id="DenganSupirForm" class="card" method="GET" action="{{ route('CariMobilPersewaan') }}">
    <input name="dengan_supir" type="hidden" value="true">
    <div class="card-body">
        <div class="row">
            <div class="form-group col-8">
                <label for="#" class="font-poppins-400">Tanggal Penjemputan</label>
                <div class="form-group row px-3">

                    <input name="tanggal_penjemputan" id="tanggal-penjemputan-dengan-supir" type="date" class="col mr-3 form-control">

                </div>
                  
                <div class="invalid-feedback">
                      
                </div>
                  
            </div>

            <div class="form-group col-4">
                
                <label class="font-poppins-400">Durasi</label>
                <div class="input-group">
                    <input name="durasi_sewa" id="durasi-sewa-dengan-supir" type="number" class="form-control" min="1" max="14">
                    
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
                <label for="jam-waktu-penjemputan-dengan-supir" class="font-poppins-400">Waktu Penjemputan</label>
               
                <div class="input-group pr-3">

                    <div class="input-group-prepend">
                        <span class="input-group-text font-poppins-400">Pada Jam</span>
                    </div>
                    
                    <select name="jam_pejemputan" id="jam-waktu-penjemputan-dengan-supir" class="form-control" disabled="true">
                        @for ($i = 0; $i < 24; $i++)
                        <option>{{ ($i < 10) ? "0$i" : $i }}</option>
                        @endfor
                    </select>
                    
                    
                </div>
                    
                
                  
                <div class="invalid-feedback ">
                      
                </div>
                  
            </div>
            
            <div class="form-group col-4">
                <label for="menit-waktu-penjemputan-dengan-supir" style="font-poppins-400">Menit</label>
                <div class="input-group">
                    <select name="menit_jam_penjemputan" id="menit-waktu-penjemputan-dengan-supir" class="form-control" disabled="true">
                        @for ($i = 0; $i < 60; $i += 15)
                        <option>{{ ($i < 10) ? "0$i" : $i }}</option>
                        @endfor
                    </select>
                    <div class="input-group-append border-left">
                        <span class="input-group-text">Menit</span>
                    </div>
                </div>

                <div class="invalid-feedback ">
                      
                </div>

            </div>
        </div>

        <hr class="pl-3 mb-2">
        <div class="row">
            <span id="tanggal-selesai-dengan-supir" class="text-muted  mx-auto font-poppins-400">Tanggal Selesai: XXX, X XXX XXXX</span>
        </div>
        <hr class="pl-3 mt-2">
        <button id="cari-dengan-supir" type="button" class="pl-3 w-100 btn btn-success font-poppins-400" disabled="true">Cari Mobil</button>
    </div>
</form>

<form id="TanpaSupirForm" class="card d-none" method="GET" action="{{ route('CariMobilPersewaan') }}">
    <input name="dengan_supir" type="hidden" value="false">
    <div class="card-body">
        <div class="row">
            <div class="form-group col-6">
                <label for="#" class=" font-poppins-400">Tanggal Pengambilan</label>
                <div class="form-group row px-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text font-poppins-400">Pada Tanggal</span>
                    </div>

                    <input name="tanggal_pengambilan" id="tanggal-pengambilan-tanpa-supir" type="date" class="col mr-3 form-control" >

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

                    <select name="jam_pengambilan" id="waktu-jam-pengambilan-tanpa-supir" class="form-control" >
                        @for ($i = 0; $i < 24; $i++)
                            <option>{{ ($i < 10) ? "0$i" : $i }}</option>
                        @endfor
                    </select>

                    <div class="input-group-prepend">
                        <span class="input-group-text">Pada Menit</span>
                    </div>

                    <select name="menit_jam_pengambilan" id="waktu-menit-pengambilan-tanpa-supir" class="form-control" >
                        @for ($i = 0; $i < 60; $i += 30)
                            <option>{{ ($i < 10) ? "0$i" : $i }}</option>
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

                    <input name="tanggal_pengembalian" id="tanggal-pengembalian-tanpa-supir" type="date" class="form-control" disabled="true">
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
                        @for ($i = 0; $i < 24; $i++)
                            <option>{{ ($i < 10) ? "0$i" : $i }}</option>
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
        <button id="cari-tanpa-supir" type="button" class="pl-3 w-100 btn btn-success font-poppins-400" disabled="true">Cari Mobil</button>
    </div>
</form>
