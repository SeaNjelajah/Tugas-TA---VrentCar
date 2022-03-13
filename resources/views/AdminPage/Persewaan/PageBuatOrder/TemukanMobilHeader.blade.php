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
                            <li class="breadcrumb-item"><a href="#">Cari Mobil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Display</li>
                        </ol>
                    </nav>
                </div>

                <div class="col-lg-6 col-5 text-right">
                    @php
                        $addUrl = '';
                        foreach (Request::all() as $key => $value):
                        $addUrl .= $key.'='.$value.'&';
                        endforeach;

                        $addUrl = substr($addUrl,0, count(str_split($addUrl)) - 1);

                    @endphp
                    <a href="{{ route('admin.Persewaan.show') . '?' . $addUrl }} " id="kembali" class="btn btn-sm btn-neutral">Back</a>
                    <a href="#" class="btn btn-sm btn-neutral">Filters</a>
                </div>
            </div>

        </div>
    </div>
</div>