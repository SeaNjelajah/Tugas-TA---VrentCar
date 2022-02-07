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
                <label for="" class="font-poppins-400">Waktu Penjemputan</label>
               
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
                <label for="#" style="font-poppins-400">Menit</label>
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


<script>
    
    
    document.getElementById('DenganSupir').onclick = (e) => {
        const Node = document.getElementById('TanpaSupir');

        if (!e.target.classList.contains('active'))
            e.target.classList.add("active");
        

        if (Node.classList.contains('active'))
            Node.classList.remove('active');

        form = [document.getElementById('DenganSupirForm'), document.getElementById('TanpaSupirForm')];

        if (form[0].classList.contains('d-none'))
            form[0].classList.remove('d-none');
        
        if (!form[1].classList.contains('d-none'))
            form[1].classList.add('d-none');
        
    }

    document.getElementById('TanpaSupir').onclick = (e) => {
        const Node = document.getElementById('DenganSupir');

        if (!e.target.classList.contains('active'))
            e.target.classList.add("active");
        
        if (Node.classList.contains('active'))
            Node.classList.remove('active');

        form = [document.getElementById('DenganSupirForm'), document.getElementById('TanpaSupirForm')];

        if (form[1].classList.contains('d-none'))
            form[1].classList.remove('d-none');

        if (!form[0].classList.contains('d-none'))
            form[0].classList.add('d-none');
        
    }

    checkDenganSupir = () => {
        tanggal_penjemputan_dengan_supir = document.getElementById('tanggal-penjemputan-dengan-supir');
        durasi_sewa_dengan_supir = document.getElementById('durasi-sewa-dengan-supir');
        jam_waktu_penjemputan_dengan_supir = document.getElementById('jam-waktu-penjemputan-dengan-supir');
        menit_waktu_penjemputan_dengan_supir = document.getElementById('menit-waktu-penjemputan-dengan-supir');
        cari_dengan_supir = document.getElementById('cari-dengan-supir');
        tanggal_selesai_dengan_supir = document.getElementById('tanggal-selesai-dengan-supir');


        if (tanggal_penjemputan_dengan_supir.value && durasi_sewa_dengan_supir.value) {
            jam_waktu_penjemputan_dengan_supir.disabled = false;
            menit_waktu_penjemputan_dengan_supir.disabled = false;
        } else {
            jam_waktu_penjemputan_dengan_supir.disabled = true;
            menit_waktu_penjemputan_dengan_supir.disabled = true;
        }

        if (
            tanggal_penjemputan_dengan_supir.value &&
            durasi_sewa_dengan_supir.value &&
            jam_waktu_penjemputan_dengan_supir.value &&
            menit_waktu_penjemputan_dengan_supir.value
        ) {
            cari_dengan_supir.disabled = false;

            hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu'];
            bulan = [
                'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                'Juli', 'Agustus', 'September', 'Oktober', 'November', 
                'Desember'
            ];

            date_obj = new Date(tanggal_penjemputan_dengan_supir.value);
            date_obj.setHours(jam_waktu_penjemputan_dengan_supir.value);
            date_obj.setMinutes(menit_waktu_penjemputan_dengan_supir.value);

            date_obj.setDate(Number(date_obj.getDate()) + Number(durasi_sewa_dengan_supir.value));
            console.log(date_obj);
            tanggal_selesai_dengan_supir.innerText = 
                'Tanggal Selesai: ' + hari[date_obj.getDay()] + ", " + 
                date_obj.getDate() + " " + bulan[date_obj.getMonth()] + " " +
                date_obj.getFullYear() + " " + jam_waktu_penjemputan_dengan_supir.value
                + ":" + menit_waktu_penjemputan_dengan_supir.value;

        } else {
            cari_dengan_supir.disabled = true;
        }
        
        


        
    }

    checkTanpaSupir = () => {
        tanggal_pengambilan_tanpa_supir = document.getElementById('tanggal-pengambilan-tanpa-supir');
        waktu_jam_pengambilan_tanpa_supir = document.getElementById('waktu-jam-pengambilan-tanpa-supir');
        waktu_menit_pengambilan_tanpa_supir = document.getElementById('waktu-menit-pengambilan-tanpa-supir');

        tanggal_pengembalian_tanpa_supir = document.getElementById('tanggal-pengembalian-tanpa-supir');
        waktu_jam_pengembalian_tanpa_supir = document.getElementById('waktu-jam-pengembalian-tanpa-supir');
        waktu_menit_pengembalian_tanpa_supir = document.getElementById('waktu-menit-pengembalian-tanpa-supir');

        tanggal_selesai_tanpa_supir = document.getElementById('tanggal-selesai-tanpa-supir');
        cari_tanpa_supir = document.getElementById('cari-tanpa-supir');


        if (
            tanggal_pengambilan_tanpa_supir.value && 
            waktu_jam_pengambilan_tanpa_supir.value &&
            waktu_menit_pengambilan_tanpa_supir.value
        ) {
            tanggal_pengembalian_tanpa_supir.disabled = false;
            waktu_jam_pengembalian_tanpa_supir.disabled = false;
            waktu_menit_pengembalian_tanpa_supir.disabled = false;
        } else {
            tanggal_pengembalian_tanpa_supir.disabled = true;
            waktu_jam_pengembalian_tanpa_supir.disabled = true;
            waktu_menit_pengembalian_tanpa_supir.disabled = true;
        }

        if (
            tanggal_pengambilan_tanpa_supir.value &&
            waktu_jam_pengambilan_tanpa_supir.value &&
            waktu_menit_pengambilan_tanpa_supir.value &&
            tanggal_pengembalian_tanpa_supir.value &&
            waktu_jam_pengembalian_tanpa_supir.value &&
            waktu_menit_pengembalian_tanpa_supir.value
        ) {
            cari_tanpa_supir.disabled = false;

            hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu'];
            bulan = [
                'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                'Juli', 'Agustus', 'September', 'Oktober', 'November', 
                'Desember'
            ];

            date_obj1 = new Date(tanggal_pengambilan_tanpa_supir.value);
            date_obj1.setHours(waktu_jam_pengambilan_tanpa_supir.value);
            date_obj1.setMinutes(waktu_menit_pengambilan_tanpa_supir.value);

            date_obj2 = new Date(tanggal_pengembalian_tanpa_supir.value);
            date_obj2.setHours(waktu_jam_pengembalian_tanpa_supir.value);
            date_obj2.setMinutes(waktu_menit_pengembalian_tanpa_supir.value);
            
            tanggal_selesai_tanpa_supir.innerText = 
                hari[date_obj1.getDay()] + ", " + 
                date_obj1.getDate() + " " + bulan[date_obj1.getMonth()] + " " +
                date_obj1.getFullYear() + " " + waktu_jam_pengambilan_tanpa_supir.value
                 + ":" + waktu_menit_pengambilan_tanpa_supir.value +
                " Sampai " +
                hari[date_obj2.getDay()] + ", " + 
                date_obj2.getDate() + " " + bulan[date_obj2.getMonth()] + " " +
                date_obj2.getFullYear() + " " + waktu_jam_pengembalian_tanpa_supir.value
                 + ":" + waktu_menit_pengembalian_tanpa_supir.value;

        } else {
            cari_tanpa_supir.disabled = true;
        }
        
        


        
    }

    onClickSubmit = (e) => {
        document.getElementById(e).submit();
    }
    
    document.getElementById('tanggal-penjemputan-dengan-supir').onchange = checkDenganSupir;
    document.getElementById('durasi-sewa-dengan-supir').onchange = checkDenganSupir;
    document.getElementById('jam-waktu-penjemputan-dengan-supir').onchange = checkDenganSupir;
    document.getElementById('menit-waktu-penjemputan-dengan-supir').onchange = checkDenganSupir;
    document.getElementById('cari-dengan-supir').onclick = () => onClickSubmit('DenganSupirForm');

    document.getElementById('tanggal-pengambilan-tanpa-supir').onchange = checkTanpaSupir;
    document.getElementById('waktu-jam-pengambilan-tanpa-supir').onchange = checkTanpaSupir;
    document.getElementById('waktu-menit-pengambilan-tanpa-supir').onchange = checkTanpaSupir;
    document.getElementById('tanggal-pengembalian-tanpa-supir').onchange = checkTanpaSupir;
    document.getElementById('waktu-jam-pengembalian-tanpa-supir').onchange = checkTanpaSupir;
    document.getElementById('waktu-menit-pengembalian-tanpa-supir').onchange = checkTanpaSupir;
    document.getElementById('cari-tanpa-supir').onclick = () => onClickSubmit('TanpaSupirForm');



</script>