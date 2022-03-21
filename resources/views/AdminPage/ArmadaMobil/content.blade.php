@if (count($mobil) == 0)

<div class="text-center position-absolute pt-6 w-100 h-100%" style="background-color: #d3d3d3; opacity: 0,5; height: 600px;">
    <span class="font-weight-bolder text-muted" style="font-size: 60px; font-variant: all-small-caps;">Tabel Empty</span>
</div>

@endif

<div class="container-fluid mt--9">

    <!-- core-of-contents -->

    <div class="container">

        @php $num = 0; @endphp
        @foreach ($mobil as $item)

        <div class="card rounded" id="Card{{ $item->id }}">
            <div class="row">
                <div class="col-4 p-0 m-0">
                    <img class="img-fluid" src="{{ asset('assets/img/cars/' . $item->gambar) }}" alt="Car Picture">
                </div>

                <div class="col font-poppins-400 ">
                    <div class="row pr-4">
                        <div class="col-auto mt-3">
                            <h2 class="">Description</h2>
                        </div>

                        <div class="col-auto ml-auto mt-2">
                            @php $stat = $item->status; @endphp
                            @if ($stat == "Tersedia")
                            <button class=" btn btn-outline-success">Tersedia</button>
                            @elseif ($stat == "Tidak Tersedia")
                            <button class=" btn btn-outline-danger">Tidak Tersedia</button>
                            @else
                            <button class=" btn btn-outline-warning">Dalam Sewa</button>
                            @endif
                        </div>
                        
                    </div>
                    <p>{{ $item->desc_mb }}.</p>
                    

                </div>
            </div>
            <div class="card-footer py-2 pr-0 rounded border border-lighter border-bottom-0 border-right-0 border-left-0">
                <div class="row m-0 p-0 pr-3">
                    <div class="col-auto m-0 p-0">
                        <button id="detailBtn{{ $item->id }}" class="btn btn-primary " data-toggle="modal" data-target="#detailModal{{ $item->id }}" style="width: 150px">Detail</button>
                    </div>
                    <div class="col-auto m-0 mx-2 p-0">
                        <button id="editBtn{{ $item->id }}" class="btn btn-warning " data-toggle="modal" data-target="#updateMobil{{ $item->id }}" class="btn btn-outline-success" style="width: 150px">Edit</button>
                    </div>
                    <div class="col-auto m-0 p-0  ml-auto">
                        <form action="{{ Route('admin.ArmadaMobil.delete') }}" method="POST">
                            @csrf
                            <button id="delId{{ $item->id }}" type="submit" style="display: none;"></button>
                            <input type="hidden" name="itemId" value="{{ $item->id }}">
                            <input type="hidden" name="aftermath" value="{{ 'r'.(($num > 0) ? $num-1 : $num) }}">
                            <button class="btn btn btn-danger ml-auto" onclick="SDel(this, 1)" style="width: 150px">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Detail-Modal -->
        @include('AdminPage.ArmadaMobil.ModalInfo')
        <!-- /Detail-Modal -->
        <!-- Edit Modal -->
        @include('AdminPage.ArmadaMobil.FormEditMobil')
        <!-- /Edit Modal -->
        @php $num += 1; @endphp
        @endforeach

        

    </div>


</div>