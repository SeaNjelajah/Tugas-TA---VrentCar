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
          
          <div class="col-11 text-center text-dark">

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
              <select class="form-control ml-3 mt-3 col-6 col-lg-10 " style="max-width: 85%;" onchange="document.getElementById('data_sp_id{{ $item->id }}').value = this.value;">
                  <option selected value="">Menu Sopir</option>

                  @foreach ($karyawan as $orang)

                    @php
                    $data_karyawan = $orang->karyawan()->first();
                    @endphp

                    @if($data_karyawan->status == "Siap")
                      @php 
                      $nama_lengkap = $data_karyawan->nama_lengkap or false;

                      if (!$nama_lengkap) {
                        $nama_lengkap = "Nama Lengkap belum di set";
                      }

                      @endphp
                      <option value="{{ $data_karyawan->id }}">{{ $nama_lengkap }}</option>
                    @endif

                  @endforeach

              </select>
              @endif


              <div class="row">
                <div class="col-6 col-md-12">

                  <h3 class="mb-0 mt-2">Pembayaran</h3>
                  <p class="mt-0">{{ ($tipe_bayar) ? $tipe_bayar->nama : "Belum" }}</p>
                
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

        <form action="{{ route('admin.Persewaan.batalkan', $item->id) }}" class="col-auto mr-auto text-left" method="POST">
          @csrf  
          <button class="btn btn-danger text-white" >Cancel</button>
        </form>

        @if ($tipe_sewa == "Tanpa Supir")

        @php
        $user_penyewa = $item->user()->first();
        $punya_data_member = $user_penyewa->member()->first() or false;

        if ($punya_data_member) { 
            $member = $user_penyewa->member()->first();
            $ktp = $member->ktp()->first();
            $kartu_keluarga = $member->kartu_keluarga()->first();
            $sim_a = $member->sim_a()->first();
        } else {
            $ktp = false;
            $kartu_keluarga = false;
            $sim_a = false;
        }
        
        @endphp
        
        @if ($sim_a)
        <div class="col-auto">
          <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#SimAModal{{ $item->id }}">
            SIM A
          </button>
        </div>
        @else
        <div class="col-auto">
          <button type="button" class="btn btn-dark" data-container="body" data-toggle="popover" data-placement="top" data-content="Gambar SIM A Belum dikirim">
            SIM A
          </button>          
        </div>
        @endif

        @if($kartu_keluarga)
        <div class="col-auto">
          <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#KartuKeluargaModal{{ $item->id }}">
            Kartu Keluarga
          </button>
        </div>
        @else
        <div class="col-auto">
          <button type="button" class="btn btn-warning" data-container="body" data-toggle="popover" data-placement="top" data-content="Gambar Kartu Keluarga Belum dikirim">
            Kartu Keluarga
          </button>          
        </div>
        @endif

        @if ($ktp)
        <div class="col-auto">
          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#KTPModal{{ $item->id }}">
            KTP
          </button>
        </div>
        @else
        <div class="col-auto">
          <button type="button" class="btn btn-info" data-container="body" data-toggle="popover" data-placement="top" data-content="Gambar KTP Belum dikirim">
            KTP
          </button>          
        </div>
        @endif

        @endif

        @if ($bukti_bayar)
          
          <div class="col-auto">

            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#BuktiBayarModal{{ $item->id }}">
              Bukti Bayar
            </button>

            @if (empty($bukti_bayar->terverifikasi))
            <span ><i class="fas fa-circle-xmark text-red align-middle"></i> Belum terverifikasi</span>
            @elseif ($bukti_bayar->terverifikasi == "Ditolak")
            <span ><i class="fas fa-circle-xmark text-red align-middle"></i> Ditolak</span> 
            @else
            <span ><i class="fas fa-check text-green align-middle"></i> terverifikasi</span> 
            @endif

          </div>
        @else
        <div class="col-auto">
          <button type="button" class="btn btn-danger" data-container="body" data-toggle="popover" data-placement="top" data-content="Bukti Bayar Belum dikirim">
            Bukti Bayar
          </button>          
        </div>
        @endif

        

        <form action="{{ route('admin.Persewaan.setujui', $item->id) }}" class="col-auto text-right" method="POST">
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