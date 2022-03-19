<div class="container-fluid mt--6">
    <div class="row p-0 m--4">

        <div class="col-6">

            <div class="card">

                <div class="card-header border-0">

                    <div class="row">

                        <div class="col">
                            <form action="">
                                <div class="row">

                                    <div class="col m-0 p-0">
                                        <input value="{{ old('search_merek') }}" name="search_merek" type="text" class="form-control d-inline-flex" placeholder="Search Merek">

                                    </div>
                                    <div class="col m-0 p-0 mr-auto">
                                        <button class="btn btn-primary">Search</button>
                                    </div>

                                </div>

                            </form>
                        </div>
                        <div class="col">
                            <form action="{{ route('admin.fitur.mobil.Merek.store') }}" method="POST">
                                @csrf
                                <div class="row">

                                    <div class="col ml-auto m-0 p-0">
                                        <input type="text" name="merek" class="form-control" placeholder="Tambah data Merek">
                                    </div>
                                    <div class="col-auto m-0 text-right m-0 p-0 pr-3">
                                        <button class="btn btn-primary m-0">Add</button>
                                    </div>

                                </div>

                            </form>
                        </div>


                    </div>


                </div>

                <div class="table-responsive" style="max-height: 350px;">
                    <table class="table align-items-center table-flush" style="max-height: 100px;">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th scope="col" class="sort text-dark">No</th>
                                <th scope="col" class="sort text-dark">Merek</th>
                                <th scope="col" class="sort text-dark">Option</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @php
                            $counter = 0;
                            @endphp
                            @foreach ($mereks as $merek)

                            <tr class="text-center">
                                <th scope="row">
                                    {{ ++$counter }}
                                </th>
                                <td>
                                    {{ $merek->merek }}
                                </td>
                                <td>
                                    <div class="row p-0 m-0 justify-content-center">
                                        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#MerekEdit{{ $merek->id }}">
                                            <i class="fas fa-pencil"></i>
                                        </button>
                                        <form action="{{ route('admin.fitur.mobil.Merek.destroy', $merek->id ) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            

                            {{-- Modal Edit --}}

                            <div class="modal fade" id="MerekEdit{{ $merek->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content bg-secondary">

                                        <div class="modal-body">
                                            <div class="container-fluid p-0">
                                                <hr class="mt-n2 mb-3">
                                                <form method="POST" action="{{ route('admin.fitur.mobil.Merek.update', $merek->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">

                                                        <div class="col-8">
                                                            <input type="text" class="form-control" name="merek" placeholder="{{ $merek->merek }}">
                                                            <small class="form-text">Edit data, cannot same with before!</small>
                                                        </div>
                                                        <div class="col-auto">
                                                            <button type="submit" class="btn btn-warning">Edit</button>
                                                        </div>

                                                    </div>
                                                   
                                                </form>
                                                <hr class="mt-3 mb-n2">
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            @endforeach

                            @if (empty($mereks[0]))
                            <tr class="text-center">
                                <th scope="row">
                                    0
                                </th>
                                <td>
                                    No Data
                                </td>
                                <td>
                                    <div class="row p-0 m-0 justify-content-center">
                                        <button class="btn btn-sm btn-warning active" data-container="body" data-toggle="popover" data-placement="top" data-content="No Data">
                                            <i class="fas fa-pencil"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger active" data-container="body" data-toggle="popover" data-placement="top" data-content="No Data">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endif
                           


                        </tbody>
                    </table>
                </div>


                <div class="card-footer py-4 pr-2 text-right">


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

        <div class="col-6">

            <div class="card">

                <div class="card-header border-0">

                    <div class="row">

                        <div class="col">
                            <form action="">
                                <div class="row">

                                    <div class="col m-0 p-0">
                                        <input value="{{ old('search_jenis_mobil') }}" name="search_jenis_mobil" type="text" class="form-control d-inline-flex" placeholder="Search Jenis Mobil">

                                    </div>
                                    <div class="col m-0 p-0 mr-auto">
                                        <button class="btn btn-primary">Search</button>
                                    </div>

                                </div>

                            </form>
                        </div>
                        <div class="col">
                            <form action="{{ route('admin.fitur.mobil.Jenis_Mobil.store') }}" method="POST">
                                @csrf
                                <div class="row">

                                    <div class="col ml-auto m-0 p-0">
                                        <input type="text" name="jenis_mobil" class="form-control" placeholder="Tambah data Jenis Mobil">
                                    </div>
                                    <div class="col-auto m-0 text-right m-0 p-0 pr-3">
                                        <button class="btn btn-primary m-0">Add</button>
                                    </div>

                                </div>

                            </form>
                        </div>


                    </div>


                </div>

                <div class="table-responsive" style="max-height: 350px;">
                    <table class="table align-items-center table-flush" style="max-height: 100px;">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th scope="col" class="sort text-dark">No</th>
                                <th scope="col" class="sort text-dark">Jenis Mobil</th>
                                <th scope="col" class="sort text-dark">Option</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @php
                            $counter = 0;
                            @endphp
                            @foreach ($jenis_mobils as $jenis_mobil)

                            <tr class="text-center">
                                <th scope="row">
                                    {{ ++$counter }}
                                </th>
                                <td>
                                    {{ $jenis_mobil->jenis_mobil }}
                                </td>
                                <td>
                                    <div class="row p-0 m-0 justify-content-center">
                                        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#jenis_mobil_Edit{{ $jenis_mobil->id }}">
                                            <i class="fas fa-pencil"></i>
                                        </button>
                                        <form action="{{ route('admin.fitur.mobil.Jenis_Mobil.destroy', $jenis_mobil->id ) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            

                            {{-- Modal Edit --}}

                            <div class="modal fade" id="jenis_mobil_Edit{{ $jenis_mobil->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content bg-secondary">

                                        <div class="modal-body">
                                            <div class="container-fluid p-0">
                                                <hr class="mt-n2 mb-3">
                                                <form method="POST" action="{{ route('admin.fitur.mobil.Jenis_Mobil.update', $jenis_mobil->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">

                                                        <div class="col-8">
                                                            <input type="text" class="form-control" name="jenis_mobil" placeholder="{{ $jenis_mobil->jenis_mobil }}">
                                                            <small class="form-text">Edit data, cannot same with before!</small>
                                                        </div>
                                                        <div class="col-auto">
                                                            <button type="submit" class="btn btn-warning">Edit</button>
                                                        </div>

                                                    </div>
                                                   
                                                </form>
                                                <hr class="mt-3 mb-n2">
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            @endforeach

                            @if (empty($jenis_mobils[0]))
                            <tr class="text-center">
                                <th scope="row">
                                    0
                                </th>
                                <td>
                                    No Data
                                </td>
                                <td>
                                    <div class="row p-0 m-0 justify-content-center">
                                        <button class="btn btn-sm btn-warning active" data-container="body" data-toggle="popover" data-placement="top" data-content="No Data">
                                            <i class="fas fa-pencil"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger active" data-container="body" data-toggle="popover" data-placement="top" data-content="No Data">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endif
                           


                        </tbody>
                    </table>
                </div>


                <div class="card-footer py-4 pr-2 text-right">


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

        <div class="col-6">

            <div class="card">

                <div class="card-header border-0">

                    <div class="row">

                        <div class="col">
                            <form action="">
                                <div class="row">

                                    <div class="col m-0 p-0">
                                        <input value="{{ old('search_jenis_transmisi') }}" name="search_jenis_transmisi" type="text" class="form-control d-inline-flex" placeholder="Search Jenis Transmisi">

                                    </div>
                                    <div class="col m-0 p-0 mr-auto">
                                        <button class="btn btn-primary">Search</button>
                                    </div>

                                </div>

                            </form>
                        </div>
                        <div class="col">
                            <form action="{{ route('admin.fitur.mobil.Jenis_Transmisi.store') }}" method="POST">
                                @csrf
                                <div class="row">

                                    <div class="col ml-auto m-0 p-0">
                                        <input type="text" name="nama_transmisi" class="form-control" placeholder="Tambah data Jenis Transmisi">
                                    </div>
                                    <div class="col-auto m-0 text-right m-0 p-0 pr-3">
                                        <button class="btn btn-primary m-0">Add</button>
                                    </div>

                                </div>

                            </form>
                        </div>


                    </div>


                </div>

                <div class="table-responsive" style="max-height: 350px;">
                    <table class="table align-items-center table-flush" style="max-height: 100px;">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th scope="col" class="sort text-dark">No</th>
                                <th scope="col" class="sort text-dark">Jenis Transmisi</th>
                                <th scope="col" class="sort text-dark">Option</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @php
                            $counter = 0;
                            @endphp
                            @foreach ($jenis_transmisis as $jenis_transmisi)

                            <tr class="text-center">
                                <th scope="row">
                                    {{ ++$counter }}
                                </th>
                                <td>
                                    {{ $jenis_transmisi->nama_transmisi }}
                                </td>
                                <td>
                                    <div class="row p-0 m-0 justify-content-center">
                                        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#jenis_transmisi_Edit{{ $jenis_transmisi->id }}">
                                            <i class="fas fa-pencil"></i>
                                        </button>
                                        <form action="{{ route('admin.fitur.mobil.Jenis_Transmisi.destroy', $jenis_transmisi->id ) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            

                            {{-- Modal Edit --}}

                            <div class="modal fade" id="jenis_transmisi_Edit{{ $jenis_transmisi->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content bg-secondary">

                                        <div class="modal-body">
                                            <div class="container-fluid p-0">
                                                <hr class="mt-n2 mb-3">
                                                <form method="POST" action="{{ route('admin.fitur.mobil.Jenis_Transmisi.update', $jenis_transmisi->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">

                                                        <div class="col-8">
                                                            <input type="text" class="form-control" name="nama_transmisi" placeholder="{{ $jenis_transmisi->nama_transmisi }}">
                                                            <small class="form-text">Edit data, cannot same with before!</small>
                                                        </div>
                                                        <div class="col-auto">
                                                            <button type="submit" class="btn btn-warning">Edit</button>
                                                        </div>

                                                    </div>
                                                   
                                                </form>
                                                <hr class="mt-3 mb-n2">
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            @endforeach

                            @if (empty($jenis_transmisis[0]))
                            <tr class="text-center">
                                <th scope="row">
                                    0
                                </th>
                                <td>
                                    No Data
                                </td>
                                <td>
                                    <div class="row p-0 m-0 justify-content-center">
                                        <button class="btn btn-sm btn-warning active" data-container="body" data-toggle="popover" data-placement="top" data-content="No Data">
                                            <i class="fas fa-pencil"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger active" data-container="body" data-toggle="popover" data-placement="top" data-content="No Data">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endif
                           


                        </tbody>
                    </table>
                </div>


                <div class="card-footer py-4 pr-2 text-right">


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


        <div class="col-6">

            <div class="card">

                <div class="card-header border-0">

                    <div class="row">

                        <div class="col">
                            <form action="">
                                <div class="row">

                                    <div class="col m-0 p-0">
                                        <input value="{{ old('search_feature') }}" name="search_feature" type="text" class="form-control d-inline-flex" placeholder="Search feature">

                                    </div>
                                    <div class="col m-0 p-0 mr-auto">
                                        <button class="btn btn-primary">Search</button>
                                    </div>

                                </div>

                            </form>
                        </div>
                        <div class="col">
                            <form action="{{ route('admin.fitur.mobil.feature.store') }}" method="POST">
                                @csrf
                                <div class="row">

                                    <div class="col ml-auto m-0 p-0">
                                        <input type="text" name="nama_feature" class="form-control" placeholder="Tambah data feature">
                                    </div>
                                    <div class="col-auto m-0 text-right m-0 p-0 pr-3">
                                        <button class="btn btn-primary m-0">Add</button>
                                    </div>

                                </div>

                            </form>
                        </div>


                    </div>


                </div>

                <div class="table-responsive" style="max-height: 350px;">
                    <table class="table align-items-center table-flush" style="max-height: 100px;">
                        <thead class="thead-light">
                            <tr class="text-center">
                                <th scope="col" class="sort text-dark">No</th>
                                <th scope="col" class="sort text-dark">Feature</th>
                                <th scope="col" class="sort text-dark">Option</th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @php
                            $counter = 0;
                            @endphp
                            @foreach ($features as $feature)

                            <tr class="text-center">
                                <th scope="row">
                                    {{ ++$counter }}
                                </th>
                                <td>
                                    {{ $feature->nama_feature }}
                                </td>
                                <td>
                                    <div class="row p-0 m-0 justify-content-center">
                                        <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#feature_Edit{{ $feature->id }}">
                                            <i class="fas fa-pencil"></i>
                                        </button>
                                        <form action="{{ route('admin.fitur.mobil.Jenis_Transmisi.destroy', $feature->id ) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            

                            {{-- Modal Edit --}}

                            <div class="modal fade" id="feature_Edit{{ $feature->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content bg-secondary">

                                        <div class="modal-body">
                                            <div class="container-fluid p-0">
                                                <hr class="mt-n2 mb-3">
                                                <form method="POST" action="{{ route('admin.fitur.mobil.feature.update', $feature->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row">

                                                        <div class="col-8">
                                                            <input type="text" class="form-control" name="nama_feature" placeholder="{{ $feature->nama_feature }}">
                                                            <small class="form-text">Edit data, cannot same with before!</small>
                                                        </div>
                                                        <div class="col-auto">
                                                            <button type="submit" class="btn btn-warning">Edit</button>
                                                        </div>

                                                    </div>
                                                   
                                                </form>
                                                <hr class="mt-3 mb-n2">
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                            @endforeach

                            @if (empty($features[0]))
                            <tr class="text-center">
                                <th scope="row">
                                    0
                                </th>
                                <td>
                                    No Data
                                </td>
                                <td>
                                    <div class="row p-0 m-0 justify-content-center">
                                        <button class="btn btn-sm btn-warning active" data-container="body" data-toggle="popover" data-placement="top" data-content="No Data">
                                            <i class="fas fa-pencil"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger active" data-container="body" data-toggle="popover" data-placement="top" data-content="No Data">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endif
                           


                        </tbody>
                    </table>
                </div>


                <div class="card-footer py-4 pr-2 text-right">


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