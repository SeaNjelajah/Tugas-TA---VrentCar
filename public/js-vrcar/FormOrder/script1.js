$(document).ready ( function () {

    tanggal_penjemputan_dengan_supir = document.getElementById('tanggal-penjemputan-dengan-supir');
    tanggal_penjemputan_dengan_supir.min = new Date().toISOString().substr(0,10);

});


checkDenganSupir = () => {
    tanggal_penjemputan_dengan_supir = document.getElementById('tanggal-penjemputan-dengan-supir');
    durasi_sewa_dengan_supir = document.getElementById('durasi-sewa-dengan-supir');
    jam_waktu_penjemputan_dengan_supir = document.getElementById('jam-waktu-penjemputan-dengan-supir');
    menit_waktu_penjemputan_dengan_supir = document.getElementById('menit-waktu-penjemputan-dengan-supir');
    tanggal_selesai_dengan_supir = document.getElementById('tanggal-selesai-dengan-supir');
    
    

    

    if (
        tanggal_penjemputan_dengan_supir.value &&
        durasi_sewa_dengan_supir.value &&
        jam_waktu_penjemputan_dengan_supir.value &&
        menit_waktu_penjemputan_dengan_supir.value
    ) {
       

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






document.getElementById('tanggal-penjemputan-dengan-supir').addEventListener('change', checkDenganSupir);
document.getElementById('durasi-sewa-dengan-supir').addEventListener('change', checkDenganSupir);
document.getElementById('jam-waktu-penjemputan-dengan-supir').addEventListener('change', checkDenganSupir);
document.getElementById('menit-waktu-penjemputan-dengan-supir').addEventListener('change', checkDenganSupir);

$(document).ready ( function () {
    checkDenganSupir();
});


