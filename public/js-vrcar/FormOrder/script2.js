$(document).ready ( function () {
    tanggal_pengambilan_tanpa_supir = document.getElementById('tanggal-pengambilan-tanpa-supir');
    tanggal_pengambilan_tanpa_supir.min = new Date().toISOString().substr(0,10);

    tanggal_pengembalian_tanpa_supir = document.getElementById('tanggal-pengembalian-tanpa-supir');
    tanggal_pengembalian_tanpa_supir.min = new Date().toISOString().substr(0,10);
});


checkTanpaSupir = () => {
    tanggal_pengambilan_tanpa_supir = document.getElementById('tanggal-pengambilan-tanpa-supir');
    waktu_jam_pengambilan_tanpa_supir = document.getElementById('waktu-jam-pengambilan-tanpa-supir');
    waktu_menit_pengambilan_tanpa_supir = document.getElementById('waktu-menit-pengambilan-tanpa-supir');

    tanggal_pengembalian_tanpa_supir = document.getElementById('tanggal-pengembalian-tanpa-supir');
    waktu_jam_pengembalian_tanpa_supir = document.getElementById('waktu-jam-pengembalian-tanpa-supir');
    waktu_menit_pengembalian_tanpa_supir = document.getElementById('waktu-menit-pengembalian-tanpa-supir');

    tanggal_selesai_tanpa_supir = document.getElementById('tanggal-selesai-tanpa-supir');
    
    
    // cari_tanpa_supir = document.getElementById('cari-tanpa-supir');


    if (
        tanggal_pengambilan_tanpa_supir.value && 
        waktu_jam_pengambilan_tanpa_supir.value &&
        waktu_menit_pengambilan_tanpa_supir.value
    ) {
        tanggal_pengembalian_tanpa_supir.disabled = false;
        waktu_jam_pengembalian_tanpa_supir.disabled = false;
        waktu_menit_pengembalian_tanpa_supir.disabled = false;

        tanggal_pengembalian_tanpa_supir.min = tanggal_pengambilan_tanpa_supir.value;

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
        // cari_tanpa_supir.disabled = false;

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
        // cari_tanpa_supir.disabled = true;
    }
    
}

// onClickSubmit = (e) => {
//     document.getElementById(e).submit();
// }

document.getElementById('tanggal-pengambilan-tanpa-supir').addEventListener('change', checkTanpaSupir);
document.getElementById('waktu-jam-pengambilan-tanpa-supir').addEventListener('change', checkTanpaSupir);
document.getElementById('waktu-menit-pengambilan-tanpa-supir').addEventListener('change', checkTanpaSupir);
document.getElementById('tanggal-pengembalian-tanpa-supir').addEventListener('change', checkTanpaSupir);
document.getElementById('waktu-jam-pengembalian-tanpa-supir').addEventListener('change', checkTanpaSupir);
document.getElementById('waktu-menit-pengembalian-tanpa-supir').addEventListener('change', checkTanpaSupir);

// document.getElementById('cari-tanpa-supir').addEventListener('click', () => onClickSubmit('TanpaSupirForm'));

$(document).ready ( function () {
    checkTanpaSupir();
});