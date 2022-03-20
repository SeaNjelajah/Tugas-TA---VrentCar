{{-- Header Section --}}

<div class="header pb-6 mb-3" style="background-color: #01D28E;">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                
                
            </div>

        </div>
    </div>
</div>

{{-- Modal section  --}}

    {{-- Create Pesanan Modal Form  --}}
<div class="modal fade" id="tambahPesanan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-secondary modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">Form tambah pesanan baru</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="text-black">X</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="container">

                    @include('AdminPage.Persewaan.PageOfContent.CreatePesananForm')

                </div>

            </div>

        </div>
    </div>
</div>