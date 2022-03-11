    $('input[daterange=date]').change((e) => {
        target = e.currentTarget.getAttribute('date-range-target');
        if (e.currentTarget.value) document.querySelector(target).min = min = new Date(e.currentTarget.value).toJSON().substr(0,10);
        if (e.currentTarget.value) document.querySelector(target).disabled = false;
    });

    $('input[daterange=datetimelocal]').change((e) => {
        target = e.currentTarget.getAttribute('date-range-target');
        if (e.currentTarget.value) document.querySelector(target).min = min = new Date(e.currentTarget.value).toJSON().substr(0,16);
        if (e.currentTarget.value) document.querySelector(target).disabled = false;
    });


    removeOverZero = (num) => {
        return (num.charAt(0) == "0") ? removeOverZero(num.substr(1, num.length)) : num;
    }

    placeRpJava = (num) => {
        num = removeOverZero((num).toString()).split("").reverse().join(""); result = "";

        for (i = 0; i < num.length - 2; i++) {
            result += num.substr(i * 3, 3) + ((num.substr(i * 3, 3).length < 3) ? "" : "," );
        }
        
        result = (result.charAt(result.length - 1) == ",") ? result.substr(0, result.length - 1) : result;
        return (i > 1) ? result.split("").reverse().join("") : num.split("").reverse().join("");
        
    } 



    $('.ImgPopOver[rel=popover]').popover({
        html: true,
        trigger: 'click',
        placement: 'right',
        content: () => { return '<img class="img-thumbnail" src="'+$(this).data('img') + '" />'; }
    });


    $('.datepicker-year-only').datepicker({
      format: "yyyy",
      viewMode: "years", 
      minViewMode: "years"
    });

    $('.datepicker').datepicker();

    

    preview = (source, where) => {
        document.querySelector(where).src = URL.createObjectURL(source.files[0]);       
    }

    $('input[set=preview]').change( (e) => {
        target = e.currentTarget.getAttribute('to');
        preview (e.currentTarget, target);
    });
    

    function SDel (whoCallMe, whoYourSiblingIClick) {
        willClick = whoCallMe.parentElement.children[whoYourSiblingIClick];
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) { willClick.click(); }
        });
    }

    function toast (message, type, setDetail = 0) {

        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
        
        if (setDetail == 1) {
            errorM = '  <a type="button" class="text-info text-decoration-none" data-toggle="modal" data-target="#modal-error">Detail<a>';
        } else {
            errorM = '';
        }

        if (type == 1) {
            Toast.fire({ icon: 'success', title: message});
        } else if (type == 2) {
            Toast.fire({ icon: 'error', title: message + errorM, background: '#f4c6c5'});
        }

    }

    clearInput = (idWhere) => {
        $('#' + idWhere)[0].value = "";
        $('#' + idWhere).focus();
    }

    
    function ClickWho (where, time = 600) {
        setTimeout( () => {
                $('#' + where).click();
        }, time)    
    }



    function oModal (where) {
        $(document).ready(() => {
            setTimeout((where) => {
                $(where).modal('show');
            }, 100);           
        });
    }

    var checkGlobal = 0;
    function OCModal (where1, where2) {
        if (checkGlobal == 0) {
            checkGlobal == 1
            $(where1).click();
            setTimeout(() => {
                $(where2).click();
            }, 500);
            checkGlobal == 0;
        }
        return;       
    }

    function CModal (where) {
        $(document).ready(() => {
            $(where).modal('hide');
        });
    }

    function wait (func, time = 200) {
        setTimeout(() => {
            func();
        }, time);
    }

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



