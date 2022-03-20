<div class="container-fluid mt--6">

    <!-- core-of-contents -->
    <div class="row">

      <div class="col-xl-6">
        <div class="card">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Order Terbaru</h3>
              </div>
              <div class="col text-right">
                <a href="{{ route('admin.Persewaan.show', ['v' => 'Baru']) }}" class="btn btn-sm btn-primary">See all</a>
              </div>
            </div>
          </div>
          <div class="table-responsive" style="max-height: 500px;">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                  
                <tr>
                  <th scope="col">Created At</th>
                  <th scope="col">Nama Penyewa</th>
                  <th scope="col">Nama Mobil</th>
                  <th scope="col">Mulai Sewa</th>
                  <th scope="col">Akhir Sewa</th>
                  <th scope="col">Harga / Hari</th>
                  <th scope="col">Durasi</th>
                  <th scope="col">Total</th>

                </tr>
              </thead>
              
              <tbody>

                  @foreach ($orders as $order)

                  @php
                  $mobil = $order->mobil()->first();
                  $totalDenda = $order->denda()->get()->sum('denda');
                  @endphp

                  <tr scope="row">
                      <th >
                        {{ ConvertDateToTextDateToIndonesia ( $order->created_at ) }}
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
        </div>
        

      </div>

      <div class="col-xl-6">
        
        <div class="card">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">User Terbaru</h3>
              </div>
              <div class="col text-right">
                <a href="{{ route('admin.AccountManage.show') }}" class="btn btn-sm btn-primary">See all</a>
              </div>
            </div>
          </div>
          <div class="table-responsive" style="max-height: 500px;">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                  
                <tr>
                  <th scope="col">Created At</th>
                  <th scope="col">Username</th>
                  <th scope="col">Email</th>

                </tr>
              </thead>
              
              <tbody>

                @php
                  $counter = 0;
                  @endphp
                  @foreach ($users as $user)

                  <tr scope="row">
                      <th >
                          {{ ConvertDateToTextDateToIndonesia ( $user->created_at ) }}
                      </th>
                      <td>
                          {{ $user->username }}
                      </td>
                      <td>
                          {{ $user->email }}
                      </td>
                  </tr>
                  @endforeach
               
              </tbody>
            </table>
          </div>
        </div>


      </div>

    </div>
    
    {{-- <div class="row">
      
      <div class="col">
        <div class="card">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Page visits</h3>
              </div>
              <div class="col text-right">
                <a href="#!" class="btn btn-sm btn-primary">See all</a>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <!-- Projects table -->
            <table class="table align-items-center table-flush">
              <thead class="thead-light">
                <tr>
                  <th scope="col">Page name</th>
                  <th scope="col">Visitors</th>
                  <th scope="col">Unique users</th>
                  <th scope="col">Bounce rate</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">
                    /argon/
                  </th>
                  <td>
                    4,569
                  </td>
                  <td>
                    340
                  </td>
                  <td>
                    <i class="fas fa-arrow-up text-success mr-3"></i> 46,53%
                  </td>
                </tr>
                <tr>
                  <th scope="row">
                    /argon/index.html
                  </th>
                  <td>
                    3,985
                  </td>
                  <td>
                    319
                  </td>
                  <td>
                    <i class="fas fa-arrow-down text-warning mr-3"></i> 46,53%
                  </td>
                </tr>
                <tr>
                  <th scope="row">
                    /argon/charts.html
                  </th>
                  <td>
                    3,513
                  </td>
                  <td>
                    294
                  </td>
                  <td>
                    <i class="fas fa-arrow-down text-warning mr-3"></i> 36,49%
                  </td>
                </tr>
                <tr>
                  <th scope="row">
                    /argon/tables.html
                  </th>
                  <td>
                    2,050
                  </td>
                  <td>
                    147
                  </td>
                  <td>
                    <i class="fas fa-arrow-up text-success mr-3"></i> 50,87%
                  </td>
                </tr>
                <tr>
                  <th scope="row">
                    /argon/profile.html
                  </th>
                  <td>
                    1,795
                  </td>
                  <td>
                    190
                  </td>
                  <td>
                    <i class="fas fa-arrow-down text-danger mr-3"></i> 46,53%
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      
    </div> --}}
    <!-- /core-of-contents -->

  
</div>