<div class="header pb-6" style="background-color: #01d28e;">
    <div class="container-fluid">

        <div class="header-body">

            <div class="row align-items-center py-4">

                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Laporan Keuangan</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Laporan Keuangan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Display</li>
                        </ol>
                    </nav>
                </div>
                @php
                    $between = Request::get('between');
                    $mulai_sewa = Request::get('mulai_sewa');
                @endphp

                <div class="col-auto ml-auto mt--4 bg-lighter p-2 rounded mr-3">
                    <a href="{{ route('admin.Laporan.Keuangan.show') }}" class="btn btn{{ (empty($between) and empty($mulai_sewa)) ? '' : '-outline' }}-primary">Minggu Ini</a>
                    <a href="{{ route('admin.Laporan.Keuangan.show', ['between' => 'month']) }}" class="btn btn{{ ($between == "month") ? '' : '-outline' }}-primary">Bulan Ini</a>
                    <a href="{{ route('admin.Laporan.Keuangan.show', ['between' => 'year']) }}" class="btn btn{{ ($between == "year") ? '' : '-outline' }}-primary">Tahun Ini</a>
                    <a href="{{ route('admin.Laporan.Keuangan.show', ['between' => 'all']) }}" class="btn btn{{ ($between == "all") ? '' : '-outline' }}-primary">Semua</a>
                </div>

                

            </div>

        </div>

    </div>

</div>

