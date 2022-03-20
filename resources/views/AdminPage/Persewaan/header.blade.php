{{-- Header Section --}}

<div class="header pb-0 mb-3" style="background-color: #01D28E;">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Persewaan</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Persewaan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Display</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="#" id="tambahPm" class="btn btn-sm btn-neutral" data-toggle="modal" data-target="#tambahPesanan">New</a>
                </div>
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