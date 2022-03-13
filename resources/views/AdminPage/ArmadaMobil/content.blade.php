@if (count($mobil) == 0)

<div class="text-center position-absolute pt-6 w-100 h-100%" style="background-color: #d3d3d3; opacity: 0,5; height: 600px;">
    <span class="font-weight-bolder text-muted" style="font-size: 60px; font-variant: all-small-caps;">Tabel Empty</span>
</div>

@endif

<div class="container-fluid mt-1">

    <!-- core-of-contents -->

    <div class="container">

        <div class="row">
            <div class="col">
                @php $num = 1; @endphp

                @foreach ($mobil as $item)
                @php $tag_decode = json_decode($item->tag_mb, 1); @endphp
                <!-- table_row -->


                <div id="Card{{ $item->id }}" class="card text-center w-100 mb-2 mt-2" style="box-shadow: 0px 0px 15px 0px grey">

                    <div class="card-header mt-1">
                        <ul class="nav nav-tabs card-header-tabs mt-n3">
                            <li class="nav-item">
                                <a class="nav-link active font-weight-bold">{{ $num }}</a>
                            </li>

                            <li class="nav-item ml-auto">
                                @php $stat = $item->status; @endphp
                                <td><span class="font-weight-bold badge badge-pill badge-lg badge-{{ ($stat == 'Tersedia' ? $stat == 'Tidak Tersedia' ? 'danger' : 'success' : 'warning')  }}"><i class="ni ni-button-power mr-2"></i>{{ $stat }}</span></td>
                            </li>
                        </ul>
                    </div>
                    <div class="row text-center">
                        <div class="col-lg-4">
                            <img class="img-thumbnail rounded" src="{{ asset('/assets/img/cars/'. $item->gambar)  }}" alt="...">
                        </div>

                        <div class="col-lg-2 my-auto p-lg-0 p-md-3 p-sm-3">

                            <div class="p-1 p-lg-0"><a id="detailBtn{{ $item->id }}" class="btn btn-primary w-100 active" data-toggle="modal" data-target="#detailModal{{ $item->id }}">Detail</a></div>
                            <div class="p-1 p-lg-0 my-2"><a id="editBtn{{ $item->id }}" class="btn btn-light w-100 active" data-toggle="modal" data-target="#updateMobil{{ $item->id }}">Edit</a></div>

                            <form action="{{ Route('admin.ArmadaMobil.delete') }}" class="p-1 p-lg-0" method="POST">
                                @csrf
                                <button id="delId{{ $item->id }}" type="submit" style="display: none;"></button>
                                <input type="hidden" name="itemId" value="{{ $item->id }}">
                                <input type="hidden" name="aftermath" value="{{ 'r'.(($num > 0) ? $num-1 : $num) }}">
                                <button type="button" class="btn btn-danger active w-100" onclick="SDel(this, 1)">Delete</button>
                            </form>

                            <!-- Detail-Modal -->
                            <div style="scroll-behavior: smooth;" class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detail Mobil - {{ $item->nama }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="row">
                                                <a href="#text-detail{{ $item->id }}" type="button" class="btn btn-outline-primary ml-auto mr-3 mb-2"><i class="fas fa-arrow-down"></i><strong>GO-TO text</strong></a>
                                                <div class="col-12 mx-auto">
                                                    <img src="{{ asset('/assets/img/cars/'. $item->gambar)  }}" alt="...." class="img-thumbnail mb-4 align-self-center">
                                                </div>
                                                <div class="col-12 mx-auto" id="text-detail{{ $item->id }}">

                                                    <table class="table mx-auto table-hover text-left table-bordered shadow table">
                                                        <tbody class="text-center">

                                                            <tr>
                                                                <td class="d-flex">
                                                                    <h3 class="col-3 text-left">Nama</h3>
                                                                    <h3 class="col-1"> : </h3>
                                                                    <h3 class="col-8 ">{{ $item->nama }}</h3>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="d-flex">
                                                                    <h3 class="col-3 text-left">Nomer Pelat Mobil</h3>
                                                                    <h3 class="col-1"> : </h3>
                                                                    <h3 class="col-8 ">{{ $item->pelat }}</h3>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="d-flex">
                                                                    <h3 class="col-3 text-left">Jumlah Kursi</h3>
                                                                    <h3 class="col-1"> : </h3>
                                                                    <h3 class="col-8 ">{{ $item->jumlah_kursi }}</h3>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="d-flex">
                                                                    <h3 class="col-3 text-left">Tahun Beli</h3>
                                                                    <h3 class="col-1"> : </h3>
                                                                    <h3 class="col-8 ">{{ $item->tahun }}</h3>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="d-flex">
                                                                    <h3 class="col-3 text-left">Kapasitas Koper</h3>
                                                                    <h3 class="col-1"> : </h3>
                                                                    <h3 class="col-8 ">{{ $item->kapasitas_koper }}</h3>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="d-flex">
                                                                    <h3 class="col-3 text-left">Millage</h3>
                                                                    <h3 class="col-1"> : </h3>
                                                                    <h3 class="col-8 ">{{ placeRp ($item->millage) }}</h3>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                              <td class="d-flex">
                                                                  <h3 class="col-3 text-left">Jenis Transmisi</h3>
                                                                  <h3 class="col-1"> : </h3>
                                                                  <h3 class="col-8">{{ $item->transmisi()->first()->nama_transmisi }}</h3>
                                                              </td>
                                                            </tr>

                                                            

                                                        </tbody>
                                                    </table>

                                                    @if (true)
                                                    <table class="mx-auto mt-3 table-bordered shadow table table-hover text-left">
                                                        <tbody class="text-center">
                                                            <tr>
                                                                <td>
                                                                    <h3>Important Info</h3>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                              <td class="d-flex">
                                                                  <h3 class="col-3 text-left">Harga sewa Per-Hari</h3>
                                                                  <h3 class="col-1"> : </h3>
                                                                  <h3 class="col-8 ">Rp. {{ placeRp ($item->harga) }}</h3>
                                                              </td>
                                                            </tr>

                                                            

                                                            <tr>
                                                              <td class="d-flex">
                                                                  <h3 class="col-3 text-left">Tipe Sewa</h3>
                                                                  <h3 class="col-1"> : </h3>
                                                                  <h3 class="col-8">{{ $item->tipe_sewa()->first()->tipe_sewa }}</h3>
                                                              </td>
                                                            </tr>

                                                            <tr>
                                                              <td class="d-flex">
                                                                  <h3 class="col-3 text-left">Jenis Mobil</h3>
                                                                  <h3 class="col-1"> : </h3>
                                                                  <h3 class="col-8">{{ $item->jenis_mobil()->first()->jenis_mobil }}</h3>
                                                              </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                    @endif

                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-warning" onclick="OCModal('#detailModal{{ $item->id }}', '#editBtn{{ $item->id }}');">Edit</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Detail-Modal -->

                            <!-- Edit Modal -->
                            @include('AdminPage.ArmadaMobil.FormEditMobil')
                            <!-- /Edit Modal -->

                        </div>

                        <div class="col-lg-6 d-block">
                            <div class="card col-lg-12 h-100">
                                <h3 class="card-header text-left pt-1 pb-0">Description: </h3>
                                <div class="card-body text-left text-black">
                                    <div class="card-text font-weight-bold">{{ $item->desc_mb }}</div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>




                <!-- /table row -->
                @php $num++ @endphp
                @endforeach
                <!-- space-block -->
                @if (count($mobil) == 1)
                <div class="row" style="opacity: 0;height: 30%; width: 100%;"></div>
                @endif
                <!-- /space-block -->


                <!-- footer -->
                @if(count($mobil) > 0)
                <div class="row">
                    <div class="card mx-auto mt-auto mb-0 pb--1 w-100">
                        <div class="card-footer py-4">
                            <nav aria-label="...">
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
                            </nav>
                        </div>
                    </div>
                </div>
                @endif
                <!-- end footer -->

            </div>
        </div>

    </div>

    <!-- /core-of-contents -->


</div>