<div class="header pb-6" style="background-color: #01d28e;">
    <div class="container-fluid">

        <div class="header-body">

            <div class="row align-items-center py-4">

                
                @php
                    $between = Request::get('between');
                    $mulai_sewa = Request::get('mulai_sewa');
                @endphp

                <div class="col-auto mx-auto mt--4 bg-lighter p-2 rounded mr-3">
                    <a href="{{ route('admin.Laporan.Keuangan.show') }}" class="btn btn{{ (empty($between) and empty($mulai_sewa)) ? '' : '-outline' }}-primary">Minggu Ini</a>
                    <a href="{{ route('admin.Laporan.Keuangan.show', ['between' => 'month']) }}" class="btn btn{{ ($between == "month") ? '' : '-outline' }}-primary">Bulan Ini</a>
                    <a href="{{ route('admin.Laporan.Keuangan.show', ['between' => 'year']) }}" class="btn btn{{ ($between == "year") ? '' : '-outline' }}-primary">Tahun Ini</a>
                    <a href="{{ route('admin.Laporan.Keuangan.show', ['between' => 'all']) }}" class="btn btn{{ ($between == "all") ? '' : '-outline' }}-primary">Semua</a>
                </div>

                

            </div>

        </div>

    </div>

</div>

