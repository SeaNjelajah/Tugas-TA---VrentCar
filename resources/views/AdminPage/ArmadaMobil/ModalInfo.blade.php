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

                                @php
                                    $merek = $item->merek()->first() or false
                                @endphp

                                @if ($merek)
                                <tr>
                                    <td class="d-flex">
                                        <h3 class="col-3 text-left">Merek</h3>
                                        <h3 class="col-1"> : </h3>
                                        <h3 class="col-8">{{ $merek->merek }}</h3>
                                    </td>
                                  </tr>
                                @endif

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