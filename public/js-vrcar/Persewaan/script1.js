document.getElementById('DenganSupir').addEventListener('click', (e) => {
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
    
});

document.getElementById('TanpaSupir').addEventListener('click',(e) => {
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
    
});

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



document.getElementById('tanggal-penjemputan-dengan-supir').addEventListener('change', checkDenganSupir);
document.getElementById('durasi-sewa-dengan-supir').addEventListener('change', checkDenganSupir);
document.getElementById('jam-waktu-penjemputan-dengan-supir').addEventListener('change', checkDenganSupir);
document.getElementById('menit-waktu-penjemputan-dengan-supir').addEventListener('change', checkDenganSupir);
document.getElementById('cari-dengan-supir').addEventListener('click', () => onClickSubmit('DenganSupirForm'));

document.getElementById('tanggal-pengambilan-tanpa-supir').addEventListener('change', checkTanpaSupir);
document.getElementById('waktu-jam-pengambilan-tanpa-supir').addEventListener('change', checkTanpaSupir);
document.getElementById('waktu-menit-pengambilan-tanpa-supir').addEventListener('change', checkTanpaSupir);
document.getElementById('tanggal-pengembalian-tanpa-supir').addEventListener('change', checkTanpaSupir);
document.getElementById('waktu-jam-pengembalian-tanpa-supir').addEventListener('change', checkTanpaSupir);
document.getElementById('waktu-menit-pengembalian-tanpa-supir').addEventListener('change', checkTanpaSupir);

document.getElementById('cari-tanpa-supir').addEventListener('click', () => onClickSubmit('TanpaSupirForm'));

$(document).ready( () => {
    now = new Date().toISOString().substr(0,10);
    document.getElementById('tanggal-penjemputan-dengan-supir').min = now;
});