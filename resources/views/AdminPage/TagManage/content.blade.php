<div class="container-fluid mt-1">
    <div class="container mt-3">

        <div class="row">

            <div class="col-lg-4">
                <form action="{{ Route('TagManageAddTag') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card shadow">
                        <div class="card-body align-content-center">
                            <div class="card-title">
                                <label for="tb_tag" class="form-label h3">Tambah Tag Baru</label>
                            </div>
                            <div class="mb-3">
                                <input type="text" id="AddNewTagF" class="form-control" name="tb_tag"
                                    placeholder="Type something..">
                                <small id="helpId" class="form-text text-muted">Nama tag</small>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-grid gap-2 row">
                                <button type="submit" class="btn btn-success">Tambahkan</button>
                                <button type="button" onclick="clearInput('AddNewTagF')" class="btn btn-dark"><i
                                        class="fa fa-redo"></i> Clear</button>
                                <input type="button" class="ml-auto btn btn-info fs-4" data-toggle="modal"
                                data-target="#MInfo" data-toggle="tooltip" data-placement="right"
                                    title="Some important Info" value="?">

                                <!-- /.ModalInfo -->

                                <div class="modal fade" id="MInfo" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content bg-secondary">

                                            <div class="modal-header bg-info">
                                                <h6 class="modal-title text-white text-weight-bolder">Some important Info of exclusive name of tags</h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>

                                            <div class="modal-body text-warning">
                                                
                                                <div class="card card-body my-3">
                                                    <h3 class="mb-4">Nama Tag Khusus</h3>
                                                    <ul>
                                                      <li class="text-muted">'Merek': Digunakan untuk menampilkan icon dan nilai merek di daftar mobil</li>
                                                      <li class="text-muted">'Fuel': Digunakan untuk menampilkan icon bahan bakar di detail mobil</li>
                                                      <li class="text-muted">'Transmission' : Digunakan untuk menampilkan icon mode transmission (Auto|Manual) pada mobil.</li>
                                                      
                                                    </ul>
                                                </div>


                                            </div>

                                            <div class="modal-footer border-top">
                                                <p class="text-danger">Important All of Name of Tags are Sensitive-Case</p>
                                                <button type="button" class="btn btn-link ml-auto" data-dismiss="modal">Close</button>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- /.ModalInfo -->

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            @php $check = 0 @endphp
            @foreach ($data1 as $list)
            <div class="col-lg-{{ (0 == $check++) ? "8" : "6" }} mx-auto">

                <div class="card">
                    <div class="card-header">
                        <div class="row">

                            <form action="{{ Route('addTagContain') }}" method="POST" class="py-0 float-left">
                                @csrf
                                <div class="input-group">
                                    <input type="hidden" value="{{ $list->id }}" name="InputId">
                                    <input type="text" name="addTC" class="form-control w-75"
                                        placeholder="Add Something...">
                                    <button type="submit" class=" ml-1 btn btn-success">
                                        <span class="text-white d-none d-md-block">Tambahkan</span>
                                        <i class="fas fa-plus d-md-none d-block mx-auto"></i>
                                    </button>
                                </div>
                            </form>

                            <form action="{{ Route('TagManageDelTag') }}" class="p-0 row ml-auto mr-3" method="POST">
                                @csrf
                                <div class="input-group">
                                    <input type="hidden" value="{{ $list->id }}" name="InputId">
                                    <input type="submit" style="display: none;">
                                    <button type="button" onclick="SDel(this,1)" class="btn btn-danger">
                                        <span class="text-white d-none d-md-block">Delete</span>
                                        <i class="fas fa-trash d-md-none d-block mx-auto"></i>                                    
                                    </button>
                                </div>
                            </form>

                        </div>

                    </div>
                    <div class="card-body">
                        <h3 class="card-title mb-2 mt-n3 font-weight-bolder">
                            Tag {{ $list->nama_tag }}
                            <span>
                                <button id="BTE{{ $list->id }}" data-toggle="modal"
                                    data-target="#editTag{{ $list->id }}" type="button"
                                    class="btn btn-outline-warning btn-sm ">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                            </span>
                        </h3>

                        <div class="modal fade" id="editTag{{ $list->id }}" tabindex="-1" role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content bg-secondary">

                                    <div class="modal-body">
                                        <div class="container-fluid p-0">
                                            <hr class="mt-n2 mb-3">
                                            <form class="row" method="POST" action="{{ Route('TagManageEdit') }}">
                                                @csrf
                                                <input type="hidden" name="modal" value="BTE{{ $list->id }}">
                                                <div class="col-9 text-left">
                                                    <input type="hidden" name="InputI" value="{{ $list->id }}">
                                                    <input type="text" class="form-control" name="editIn"
                                                        placeholder="{{ $list->nama_tag }}">
                                                    <small class="form-text">Edit data, cannot same with before!</small>
                                                </div>
                                                <dib class="col-3">
                                                    <button type="submit" class="btn btn-warning">Edit</button>
                                                </dib>
                                            </form>
                                            <hr class="mt-3 mb-n2">
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col p-0" style="overflow: auto; max-height: 380px;">

                            <table class="table table-bordered table-striped table-hover text-center">
                                <thead>
                                    <tr>
                                        <th class="col-1">
                                            <h4>No.</h4>
                                        </th>
                                        <th>
                                            <h4>Nama</h4>
                                        </th>
                                        <th>
                                            <h4>Action </h4>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $numI = 1 @endphp
                                    @foreach ($data2 as $item)
                                    @if ($list->id == $item->tag_list_id)
                                    <tr>
                                        <td>
                                            <h4>{{ $numI++ }}</h4>
                                        </td>
                                        <td>
                                            <h4>{{ $item->contain }}</h4>
                                        </td>
                                        <td class="col-1">
                                            <div class="input-group">

                                                <button id="BE{{ $item->id }}" data-toggle="modal"
                                                    data-target="#editContain{{ $item->id }}" type="button"
                                                    class="btn btn-warning btn-sm "><i
                                                        class="fas fa-pencil-alt"></i></button>
                                                <form action="{{ Route('tagContainDel') }}" class="p-0 m-0 mx-auto"
                                                    method="POST">
                                                    @csrf
                                                    <input type="submit" style="display: none;">
                                                    <input type="hidden" name="itemLId" value="{{ $item->id }}">
                                                    <button type="button" onclick="SDel(this, 1)"
                                                        class="btn btn-danger btn-sm"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>

                                                <div class="modal fade" id="editContain{{ $item->id }}" tabindex="-1"
                                                    role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content bg-secondary">

                                                            <div class="modal-body">
                                                                <div class="container-fluid p-0">
                                                                    <hr class="mt-n2 mb-3">
                                                                    <form class="row" method="POST"
                                                                        action="{{ Route('tagContainEdit') }}">
                                                                        @csrf
                                                                        <input type="hidden" name="modal"
                                                                            value="BE{{ $item->id }}">
                                                                        <div class="col-9 text-left">
                                                                            <input type="hidden" name="InputI"
                                                                                value="{{ $item->id }}">
                                                                            <input type="text" class="form-control"
                                                                                name="editIn"
                                                                                placeholder="{{ $item->contain }}">
                                                                            <small class="form-text">Edit data, cannot
                                                                                same with before!</small>
                                                                        </div>
                                                                        <dib class="col-3">
                                                                            <button type="submit"
                                                                                class="btn btn-warning">Edit</button>
                                                                        </dib>
                                                                    </form>
                                                                    <hr class="mt-3 mb-n2">
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>



                                            </div>

                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
            @endforeach
            



        </div>

    </div>
</div>
