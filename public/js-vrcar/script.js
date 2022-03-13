    $('input[daterange=date]').change((e) => {
        e.currentTarget.min = new Date().toISOString().substr(0,10);
        target = e.currentTarget.getAttribute('date-range-target');
        if (e.currentTarget.value) document.querySelector(target).min = min = new Date(e.currentTarget.value).toJSON().substr(0,10);
        if (e.currentTarget.value) document.querySelector(target).disabled = false;
    }).ready ( () => {
        e.currentTarget.min = new Date().toISOString().substr(0,10);
    });

    $('input[daterange=datetimelocal]').change((e) => {
        e.currentTarget.min = new Date().toISOString().substr(0,16);
        target = e.currentTarget.getAttribute('date-range-target');
        if (e.currentTarget.value) document.querySelector(target).min = min = new Date(e.currentTarget.value).toJSON().substr(0,16);
        if (e.currentTarget.value) document.querySelector(target).disabled = false;
    }).ready ( () => {
        e.currentTarget.min = new Date().toISOString().substr(0,10);
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

    



