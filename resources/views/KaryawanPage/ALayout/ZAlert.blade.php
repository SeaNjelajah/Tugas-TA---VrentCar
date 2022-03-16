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
