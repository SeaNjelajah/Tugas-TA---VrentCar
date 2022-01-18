<div class="container-fluid mt-1">

    <!-- /.TabBar -->
    <div class="card text-center">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs">
            <li class="nav-item mx-auto">
              <a class="nav-link {{ (empty($OtherContent)) ? 'active' : '' }}" href="{{ Route('Persewaan') }}">Semua Pesanan</a>
            </li>
            <li class="nav-item mx-auto">
              <a class="nav-link {{ (!empty($_GET['f'])) ? (($_GET['f'] === 'Baru') ? 'active' : '') : '' }}" href="{{ Route('Persewaan', ['f' => 'Baru']) }}">Pesanan Baru</a>
            </li>
            <li class="nav-item mx-auto">
              <a class="nav-link {{ (!empty($_GET['f'])) ? (($_GET['f'] === 'DalamPersewaan') ? 'active' : '') : '' }}" href="{{ Route('Persewaan', ['f' => 'DalamPersewaan']) }}">Dalam Persewaan</a>
            </li>
            <li class="nav-item mx-auto">
              <a class="nav-link {{ (!empty($_GET['f'])) ? (($_GET['f'] === 'Selesai') ? 'active' : '') : '' }}" href="{{ Route('Persewaan', ['f' => 'Selesai']) }}">Pesanan Selesai</a>
            </li>
            <li class="nav-item mx-auto">
              <a class="nav-link {{ (!empty($_GET['f'])) ? (($_GET['f'] === 'Dibatalkan') ? 'active' : '') : '' }}" href="{{ Route('Persewaan', ['f' => 'Dibatalkan']) }}">Pesanan Dibatalkan</a>
            </li>
          </ul>
        </div>
        <form class="row mt-3 mb-3 px-4">
            <div class="mb-2 col-lg mx-md-auto col-md-12 d-inline-flex">
              <input class="form-control" type="text" placeholder="Search">
              <input type="submit" class="btn btn-primary ml-2" value="Search">
            </div>
            <div class="col-lg-7 mx-md-auto col-md-12 d-flex">
                <input daterange="date" set-date-min="now" date-range-target="#end_date_filter" id="start_date_filter" min="{{ Carbon\Carbon::now()->toDateString() }}" class="form-control" type="date" placeholder="Date">
                <span class="text-muted my-auto mx-3">to</span>
                <input id="end_date_filter" class="form-control" type="date" placeholder="Date" disabled>
            </div>
            <button type="submit" class="mt-2 mt-lg-0 mx-auto col-11 col-md-11 col-lg-1 w-25 ml-2 btn btn-outline-primary form-control">Go</button>
        </form>
        
    </div>
    <!-- /.TabBar -->

    <!-- /.CarContent -->
    @foreach ($data3 as $item)
    @php foreach ($data1 as $v) if ($item->d_mobil_id == $v->id) {$mobil = $v; break;} @endphp
    <!-- Semua Pesanan -->
    @if (empty($OtherContent))

      @if ($item->status == "Baru")
        @include('AdminPage.Persewaan.PesananBaru')
      @elseif ($item->status == "Dalam Persewaan")
        @include('AdminPage.Persewaan.PesananDalamPersewaan')
      @elseif ($item->status == "Selesai")
        @include('AdminPage.Persewaan.PesananSelesai')
      @elseif ($item->status == "Dibatalkan")
        @include('AdminPage.Persewaan.PesananDibatalkan')
      @endif

    @else
    
    @include($OtherContent)

    @endif

    @endforeach
    <!-- /.CarContent -->
</div>