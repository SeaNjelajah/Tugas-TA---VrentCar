<div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">

                <div class="card-header border-0">
                    <form method="GET">
                        <div class="row p-0 m-0">
                        

                            <div class="col-auto p-0 m-0 mr-3 pt-1 mr-auto">

                                <div class="input-daterange datepicker row">

                                    

                                    <div class="col-auto">

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input class="form-control" name="mulai_sewa" placeholder="Tanggal Mulai Sewa" type="text" value="{{ Request::get('mulai_sewa'); }}">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-auto">

                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                                </div>
                                                <input class="form-control" name="akhir_sewa" placeholder="Tanggal Akhir Sewa" type="text" value="{{ Request::get('akhir_sewa'); }}">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-auto m-0">

                                        <button type="submit" class="btn btn-primary">Search</button>

                                    </div>




                                </div>

                            </div>

                            <div class="col-auto p-0 m-0 mx-1">
                                <div class="alert alert-warning mb-0 col-auto">
                                    Total Pendapatan
                                </div>
                            </div>

                            <div class="col-auto p-0 m-0">
                                <div class="alert alert-primary mb-0 col-auto">
                                    Rp {{ placeRp($total) }}
                                </div>
                            </div>

                        </div>
                    </form>

                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort text-dark">No</th>
                                <th scope="col" class="sort text-dark">Nama Penyewa</th>
                                <th scope="col" class="sort text-dark">Nama Mobil</th>
                                <th scope="col" class="sort text-dark">Mulai Sewa</th>
                                <th scope="col" class="sort text-dark">Akhir Sewa</th>
                                <th scope="col" class="sort text-dark">Biaya sopir</th>
                                <th scope="col" class="sort text-dark">Denda</th>
                                <th scope="col" class="sort text-dark">Harga / Hari</th>
                                <th scope="col" class="sort text-dark">Durasi</th>
                                <th scope="col" class="sort text-dark">Total</th>
                            </tr>
                        </thead>
                        <tbody class="list">

                            @php
                            $counter = 0;
                            @endphp
                            @foreach ($orders as $order)

                            @php
                            $mobil = $order->mobil()->first();
                            $totalDenda = $order->denda()->get()->sum('denda');
                            $supir = $order->supir()->first() or false;
                            @endphp

                            <tr>
                                <th scope="row">
                                    {{ ++$counter }}
                                </th>
                                <td>
                                    {{ $order->penyewa }}
                                </td>
                                <td>
                                    {{ $order->mobil()->first()->nama }}
                                </td>
                                <td>
                                    {{ ConvertDateToTextDateToIndonesia ($order->tgl_mulai_sewa) }}
                                </td>
                                <td>
                                    {{ ConvertDateToTextDateToIndonesia ($order->tgl_akhir_sewa) }}
                                </td>
                                @php
                                    $BiayaSupir = 150000;
                                @endphp
                                <td>
                                    @if ($supir)
                                    Rp. {{ placeRp($BiayaSupir) }}
                                    @else
                                    Rp. 0
                                    @endif
                                </td>

                                <td>
                                    Rp. {{ placeRp($totalDenda) }}
                                </td>
                                
                                <td class="budget">
                                    Rp {{ placeRp($mobil->harga) }}
                                </td>

                                <td>
                                    {{ $order->durasi_sewa }} Hari
                                </td>

                                <td class="budget">
                                    Rp. {{ placeRp($order->total) }}
                                </td>
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>

                
                <div class="card-footer py-4 pr-2 text-right">
                    @php
                    $between = Request::get('between');
                    $mulai_sewa = Request::get('mulai_sewa');
                    $akhir_sewa = Request::get('akhir_sewa');

                    if (!empty($between)) {
                        $currently = ['between' => $between];

                    } else if (!empty($mulai_sewa) and !empty($akhir_sewa)) {
                        $currently = [
                            'mulai_sewa' => $mulai_sewa,
                            'akhir_sewa' => $akhir_sewa,
                        ];

                    } else {
                        $currently = ['between' => 'week'];
                    }
                    @endphp
                    
                    <a class="btn btn-danger" href="{{ route('admin.Laporan.Keuangan.get.laporan', $currently) }}">Download Currently Data</a>
                    <a class="btn btn-danger" href="{{ route('admin.Laporan.Keuangan.get.laporan', ['between' => 'all']) }}">Download All Data</a>

                    {{-- <nav aria-label="...">
                        <ul class="pagination justify-content-end mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    <i class="fas fa-angle-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="fas fa-angle-right"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav> --}}

                    <div class="row py-1"></div>
                </div>
            </div>
        </div>
    </div>
</div>