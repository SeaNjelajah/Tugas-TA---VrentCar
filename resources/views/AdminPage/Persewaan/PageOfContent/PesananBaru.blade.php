@if ($item->status == "Baru")
@php
  
  $tipe_sewa = $mobil->tipe_sewa()->first()->tipe_sewa;
  $tipe_bayar = $item->tipe_bayar()->first() or false;
  $supir = $item->supir()->first();

  $tipe_bayar = $item->tipe_bayar()->first() or false;
  $bukti_bayar = $item->bukti_bayar()->first() or false;
@endphp
<div class="card mt-n3">
  <div class="card-body">

      <div class="row mx-1 rounded-pill" style="background-color: #b8e6a8;">
      
          <div class="col-1 my-auto">
              <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="Pcheck{{ $item->id }}">
                  <label class="custom-control-label" for="Pcheck{{ $item->id }}"></label>
              </div>
          </div>
          
          <div class="col-11 text-center">

              <div class="row d-lg-inline-block d-block mx-auto float-md-left">
                  Siap Diproses / {{ $item->tgl_mulai_sewa }} 
              </div>
      
              <div class="row d-lg-inline-block d-block mx-auto float-md-right">
                  {{ $item->tgl_akhir_sewa }} / {{ $item->durasi_sewa }} Hari Sewa
              </div>

          </div>
          

      </div>

      <div class="row d-inline-flex">
          
          <div class="mx-sm-auto col-md-12 col-lg text-center d-block mt-1 border border-top-0 border-bottom-0" style="border-color: #d3ddcf;" >
              <img src="{{ asset('assets/img/cars/' . $mobil->gambar) }}" alt="Gambar Mobil Pesanan" class="align-self-center m-2 img-fluid rounded-start img-thumbnail">
              <div class="row text-center">
                  <h2 class="col-6 text-center text-info">{{ $mobil->nama }}</h2>
                  <h2 class="col-6 text-center font-weight-bolder">{{ $mobil->pelat }}</h2>
              </div>
          </div>
          
      
          <div class="my-lg-0 col-md-12 col-lg text-left border border-top-0 border-bottom-0" style="border-color: #d3ddcf;">
              
              @if ($tipe_sewa == "Dengan Supir")
              <h2 class="mt-3 text-center">{{ (!empty($item->alamat_temu)) ? "Alamat Penjemputan" : "Alamat Rumah" }}</h2>
              <p class="text-justify-center">{{ (!empty($item->alamat_temu)) ? $item->alamat_temu : $item->alamat_rumah }}</p>
              @else
              <h2 class="mt-3">{{ (!empty($item->alamat_temu)) ? "Alamat Serah Terima" : "Alamat Rumah" }}</h2>
              <p class="text-left text-justify-center">{{ (!empty($item->alamat_temu)) ? $item->alamat_temu : $item->alamat_rumah }}</p>
              @endif

              <div class="row h-50 px-2 align-content-end">
                <button type="button" class="btn btn-info ml-auto" data-toggle="modal" data-target="#infoOrder{{ $item->id }}">More Info</button>
              </div>

              
          </div>

          <div class="my-lg-0 col-md-12 col-lg text-left my-3 border border-top-0 border-bottom-0" style="border-color: #d3ddcf;">
              <h3 class="mb-0 mt-2">Tipe sewa: {{ $tipe_sewa }}</h3>
              
              @if (strcmp($tipe_sewa, "Dengan Supir") == 0)
              <select class="form-control ml-3 mt-3 col-6 col-lg-10 style="max-width: 85%;" onchange="document.getElementById('data_sp_id{{ $item->id }}').value = this.value;">
                  <option selected value="">Menu Sopir</option>

                  @foreach ($karyawan as $orang)
                   
                    @if($orang->karyawan()->first()->status == "Siap")
                    <option value="{{ $orang->id }}">{{ $orang->username }}</option>
                    @endif
                  @endforeach

              </select>
              @endif


              <div class="row">
                <div class="col-6 col-md-12">

                  <h3 class="mb-0 mt-2">Pembayaran</h3>
                  <p class="mt-0">{{ ($tipe_bayar) ? $tipe_bayar->nama : "Belum" }}</p>
                
                </div>
                <div class="col-6 col-md-12">
                  @if ($bukti_bayar)

                  <button type="button" class="btn btn-danger mr-auto float-right mt-3 mb-0 mb-md-4" data-toggle="modal" data-target="#BuktiBayarModal{{ $item->id }}">
                    Bukti Bayar
                  </button>

                    @if (empty($bukti_bayar->terverifikasi))
                    <span ><i class="fas fa-circle-xmark text-red "></i> Belum terverifikasi</span>
                    @else
                    <span ><i class="fas fa-check text-green "></i> terverifikasi</span> 
                    @endif

                  @endif

                </div>

              </div>
              

              
          </div>

      </div>

      <div class="row rounded-pill mx-1" style="background-color: #c4c4c4;">
          <div class="col-auto w-50 text-left">
              Total Bayar
          </div>
          <div class="col-auto w-50 text-right">
              Rp. {{ placeRp($item->total) }}
          </div>
      </div>
      <div class="row mt-1 mx-1">
        <form action="{{ route('admin.Persewaan.batalkan', $item->id) }}" class="col-auto w-50 text-left" method="POST">
          @csrf  
          <button class="btn btn-danger text-white" >Cancel</button>
        </form>

        <form action="{{ route('admin.Persewaan.setujui', $item->id) }}" class="col-auto w-50 text-right" method="POST">
          @csrf
          @if ($tipe_sewa == "Dengan Supir")
          <input id="data_sp_id{{ $item->id }}" type="hidden" name="data_supir_id">
          @endif
          <button class="btn btn-success text-white">PROSES</button>
        </form>
      </div>

  </div>
</div>
@endif