@extends('AdminPage.Ztemplate.0index')

@section('sidebar')
    @if (!empty($sidebar))
        @include($sidebar)
    @else
        @include('AdminPage.Ztemplate.sidebar')
    @endif 
@endsection

@section('topnavbar')
    @if (!empty($topnavbar))
        @include($topnavbar)
    @else
        @include('AdminPage.Ztemplate.topnavbar')
    @endif    
@endsection

@section('header')
    @if (!empty($header))
        @include($header)
    @else
        @include('AdminPage.Ztemplate.header')
    @endif
@endsection

@section('content')
    @if (!empty($content))
        @include($content)
    @else
        @include('AdminPage.Ztemplate.content')
    @endif
@endsection

@section('script')


<script>
    

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

    var saveInput, saveSource;

    sendTopreview = (Element, to) => {
        if (Element.parentElement == saveSource) return;
        e = Element.parentElement;
        InputElement = Element.parentElement.querySelectorAll('input');
        Element = Element.parentElement.querySelectorAll('input');
        document.getElementById(to.substr(1)).src = "assets/img/dataImg/" + Element[1].value;
        to = document.getElementById(to.substr(1)).nextElementSibling.children;
        to[0].children[0].innerText = Element[2].value;
        to[1].innerText = Element[0].value;
        document.getElementById("hargaPreview").innerText = "Rp " + placeRpJava(Element[3].value);
        if (document.getElementById('formPesanan').querySelectorAll('input').length > 6) {
            for (let i = 0; i < saveInput.length; i++) {
                saveSource.appendChild(saveInput[i]);
            }
        }

        formOnOff = document.getElementById('formPesanan').querySelectorAll('.form-control');
        for (let i = 0; i < formOnOff.length; i++) {
            if (formOnOff[i].id == 'Pengembalian') continue;
            formOnOff[i].disabled = false;
        }

        for (let i = 0; i < InputElement.length; i++) {
            document.getElementById('formPesanan').appendChild(InputElement[i]);
            saveInput = InputElement;
            saveSource = e;
        }
    } 

</script>

<script>
    $('.ImgPopOver[rel=popover]').popover({
        html: true,
        trigger: 'click',
        placement: 'right',
        content: function() {return '<img class="img-thumbnail" src="'+$(this).data('img') + '" />';}
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



</script>

@if (Session()->get('ClickM') ? true : false)
<script>
    ClickWho ("{{ Session()->get('ClickM') }}");
</script>
@endif


@if (Session()->get('failed') ? true : false)

<script>
    toast("{{ Session()->get('failed') }}",2, "{{ ((count($errors->all()) > 0) ? 1 : 0) }}");
</script> 


<div class="modal fade" id="modal-error" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content bg-secondary">
              
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default text-dark">Errors</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
              
            <div class="modal-body text-danger">
                @if (!empty($errors))
                    @php $n = 1 @endphp
                    @foreach ($errors->all() as $e)
                        <p><span>{{ $n++ }}.</span> {{ $e }}<p>
                    @endforeach
                @endif                                                                
            </div>
              
            <div class="modal-footer">
                <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
            </div>
              
        </div>
    </div>
</div>


@endif

@if (Session()->get('success') ? true : false)
<script>
    toast("{{ Session()->get('success') }}", 1);
</script> 
@endif



@endsection