<?php


use App\Http\Controllers\CombineController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Global\LoginController as Login;
use App\Http\Controllers\Global\RegisterController as Register;

use App\Http\Controllers\Admin\DashboardController as Dashboard;
use App\Http\Controllers\Admin\ArmadaMobilController as Armada;
use App\Http\Controllers\Admin\PersewaanController as Persewaan;
use App\Http\Controllers\Admin\AccountManageController as Account;
use App\Http\Controllers\Admin\FiturController;
use App\Http\Controllers\Admin\FiturMobilController as FiturMobil;
use App\Http\Controllers\Admin\JenisMobilController;
use App\Http\Controllers\Admin\JenisTransmisiController;
use App\Http\Controllers\Karyawan\KaryawanController as Karyawan;
use App\Http\Controllers\Admin\LaporanKeuanganController as Laporan;
use App\Http\Controllers\Admin\MerekController;
use App\Http\Controllers\LandingPageController as Landing;
use App\Http\Controllers\UserPageController as UserPage;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

function placeRp ($num) {
    $n = strlen($num); $g[] = substr($num, 0, ($n % 3 == 0) ? $c = 3 : $c = $n % 3);
    for ($i = $c; $i < $n; $i += 3) {
      $g[] = substr($num, $i, 3);
    }
    return implode(',', $g);
}

function ConvertDateToTextDateToIndonesia ($date) {
  $CarbonDate = Carbon::create($date)->format('l, j F Y H:i:s');
  $FindingWord = [
    "/Sunday/", "/Monday/", "/Tuesday/",
    "/Thursday/", "/Friday/", "/Saturday/",
    "/January/", "/February/", "/March/",
    "/May/", "/June/", "/July/", "/August/",
    "/October/", "/December/"
  ];

  $ReplaceWith = [
    "Minggu", "Senin", "Selasa",
    "Rabu", "Jum'at", "Sabtu",
    "Januari", "Februari", "Maret",
    "Mei", "Juni", "Juli", "Agustus",
    "Oktober", "Desember"
  ];

  ksort($FindingWord);
  ksort($ReplaceWith);

  return preg_replace($FindingWord, $ReplaceWith, $CarbonDate);

}


Route::get('/register', [Register::class, 'RegisterView'])->name('RegisterView');
Route::post('/register/check', [Register::class, 'Register'])->name('register');

Route::get('/login', [Login::class, 'LoginView'])->name('LoginView');
Route::post('/login/check', [Login::class, 'Login'])->name('Login');
Route::get('/logout', [Login::class,'signOut'])->name('Logout');





Route::prefix('Admin')->name('admin.')->middleware('Admin')->group( function () {

    Route::get('/GetFile/Bukti', [Persewaan::class, 'getBuktiBayar'])->name('GetBukti');

    Route::prefix('Dashboard')->name('dashboard.')->group( function () {
      Route::get('/', [Dashboard::class, 'Dashboard'])->name('show');
    });

    Route::prefix('ArmadaMobil')->name('ArmadaMobil.')->group( function () {
      Route::get('/', [Armada::class, 'index'])->name('show');
      Route::post('/Create',[Armada::class, 'create'])->name('create');
      Route::post('/Delete', [Armada::class, 'delete'])->name('delete');
      Route::post('/Update', [Armada::class, 'edit'])->name('edit');
    });

    Route::prefix('Persewaan')->name('Persewaan.')->group( function () {
      Route::get('/', [Persewaan::class, 'index'])->name('show');
      Route::post('/Setujui/{id}', [Persewaan::class, 'Setujui'])->name('setujui');
      Route::post('/Batalkan/{id}', [Persewaan::class, 'Batalkan'])->name('batalkan');
      Route::post('/CariMobil', [Persewaan::class, 'CariMobilPersewaan'])->name('cari');
      Route::post('/CariMobil/add', [Persewaan::class, 'BuatPesanan'])->name('tambah');
      Route::post('/Verifikasi/Bukti', [Persewaan::class, 'VerifikasiBukti'])->name('verifikasi.bukti');
      Route::post('/Tolak/Bukti', [Persewaan::class, 'TolakBuktiBayar'])->name('tolak.bukti');
      Route::post('/StatusOrder/update', [Persewaan::class, 'update_status_order'])->name('status.order.update');
      Route::post('/Order/Selesai', [Persewaan::class, 'Selesai'])->name('order.selesai');
      Route::post('/Verifikasi/KTP', [Persewaan::class, 'VerifikasiKTP'])->name('verifikasi.ktp');
      Route::post('/Tolak/KTP', [Persewaan::class, 'TolakKTP'])->name('tolak.ktp');
      Route::post('/Verifikasi/KartuKeluarga', [Persewaan::class, 'VerifikasiKartuKeluarga'])->name('verifikasi.KartuKeluarga');
      Route::post('/Tolak/KartuKeluarga', [Persewaan::class, 'TolakKartuKeluarga'])->name('tolak.KartuKeluarga');
      Route::post('/Verifikasi/SimA', [Persewaan::class, 'VerifikasiSimA'])->name('verifikasi.SimA');
      Route::post('/Tolak/SimA', [Persewaan::class, 'TolakSimA'])->name('tolak.SimA');
      Route::post('/Tambah/Denda', [Persewaan::class, 'TambahDenda'])->name('tambah.denda');
    });

    Route::prefix('AccountManage')->name('AccountManage.')->group( function () {
      Route::get('/', [Account::class, 'index'])->name('show');
      Route::post('/Create', [Account::class, 'Create'])->name('create');
      Route::post('/Update/Karyawan', [Account::class, 'Update_Karyawan'])->name('update.karyawan');
      Route::post('/Update/Member', [Account::class, 'Update_Member'])->name('update.member');
      Route::post('/Update/Admin', [Account::class, 'Update_Admin'])->name('update.admin');
    });

    Route::prefix('Laporan')->name('Laporan.Keuangan.')->group( function () {
      Route::get('/', [Laporan::class, 'index'])->name('show');
      Route::get('/Get/Laporan', [Laporan::class, 'GetLaporan'])->name('get.laporan');
    });

    Route::prefix('FiturMobil')->name('fitur.mobil.')->group( function () {
      Route::get('/', [FiturMobil::class, 'index'])->name('show');
      Route::resources([
        'Merek' => MerekController::class,
        'Jenis_Mobil' => JenisMobilController::class,
        'Jenis_Transmisi' => JenisTransmisiController::class,
        'feature' => FiturController::class
      ]);
    });

});

Route::prefix('Karyawan')->name('karyawan.')->middleware('Karyawan')->group( function () {

  Route::prefix('Dashboard')->name('dashboard.')->group( function () {
    Route::get('/', [Karyawan::class, 'index'])->name('show');
    Route::post('/Update/StatusOrder', [Karyawan::class, 'update_status_order'])->name('update.status.order');
    Route::post('/Update/Member', [Karyawan::class, 'Update_Karyawan'])->name('update.karyawan');
  });

});



Route::post('/Persewaan/Calculate', [CombineController::class, 'HitungPesanan'])->name('HitungPesanan')->middleware('Admin');
Route::post('/Persewaan/Add', [CombineController::class, 'addPesanan'])->name('addPesanan')->middleware('Admin');

//Persewaan End

//Transaksi Start
Route::get('/TransaksiSelesai', [CombineController::class, 'TransaksiShow'])->name('admin.Transaksi.show')->middleware('Admin');
Route::post('/TransaksiSelesai', [CombineController::class, 'TransaksiTest'])->name('TransaksiTest')->middleware('Admin');
//Transaksi end

//TagManage Start
Route::get('/TagManage', [CombineController::class, 'tagManageShow'])->name('TagManage')->middleware('Admin');
Route::post('/TagManage/Create/Tag', [CombineController::class, 'tagManageAdd'])->name('TagManageAddTag')->middleware('Admin');
Route::post('/TagMange/Edit/Tag', [CombineController::class, 'TagManageEdit'])->name('TagManageEdit')->middleware('Admin');
Route::post('/TagManage/Delete/Tag', [CombineController::class, 'tagManageTagDel'])->name('TagManageDelTag')->middleware('Admin');

Route::post('/TagManage/Add/TagContain', [CombineController::class, 'tagContainAdd'])->name('addTagContain')->middleware('Admin');
Route::post('/TagManage/Delete/TagContain', [CombineController::class, 'tagContainDel'])->name('tagContainDel')->middleware('Admin');
Route::post('/TagManage/Edit/TagContain', [CombineController::class, 'tagContainEdit'])->name('tagContainEdit')->middleware('Admin');
//TagManage end

//SopirManager Start
Route::get('/SupirManager', [CombineController::class, 'SupirShow'])->name('SupirManager')->middleware('Admin');
Route::post('/SupirManager/add/', [CombineController::class, 'SupirAdd'])->name('SupirManagerAdd')->middleware('Admin');
Route::post('/SupirManager/Delete/', [CombineController::class, 'Supirdelete'])->name('SupirManagerDel')->middleware('Admin');
Route::post('/SupirManager/Edit/', [CombineController::class, 'SupirEdit'])->name('SupirManagerEdit')->middleware('Admin');
//SopirManager end




//Landing Page Start
Route::get('/LandingCars', [Landing::class, 'CarListPage'])->name('CarListPage');
Route::post('/SingleCar', [Landing::class, 'CarSingle'])->name('CarSinglePage');


Route::get('/Home', [Landing::class, 'Home'])->name('Home');

Route::get('/About', function() {
return view('LandingPage.ZTemplate.about');
})->name('About');

Route::get('/Services', function() {
return view('LandingPage.ZTemplate.services');
})->name('Service');

Route::get('/Kontak', function() {
return view('LandingPage.ZTemplate.contact');
})->name('kontak');

Route::get('/Blog', function() {
  return view('LandingPage.ZTemplate.blog');
})->name('blog');

Route::get('/Blog/Single', function () {
  return view('LandingPage.BlogPage.blog-single');
})->name('blog.single');
  

Route::get('/Ketentuan', function() {
  return view('LandingPage.ZTemplate.ketentuan');
})->name('ketentuan');

Route::get('/Tips', function() {
  return view('LandingPage.ZTemplate.booking-tips');
})->name('tips');


Route::get('/FormOrder', [Landing::class, 'BookCar'])->name('FormOrder');
Route::post('/FormOrder/create', [Landing::class, 'Booking'])->name('FormOrder.create');

Route::prefix('User')->name('user.')->middleware('Member')->group( function () {
  Route::get('/Dashboard', [UserPage::class, 'DashboardPage'])->name('dashboard');
  Route::get('/BookingBerjalan', [UserPage::class, 'BookingBerjalanPage'])->name('bookingBerjalan');
  Route::get('/RiwayatBooking', [UserPage::class, 'RiwayatBokingPage'])->name('RiwayatBooking');
  Route::post('/RingkasanOrder', [UserPage::class, 'RingkasanOrder'])->name('RingkasanOrder');
  Route::get('/RingkasanOrder', [UserPage::class, 'RingkasanOrderGet'])->name('RingkasanOrder');
  Route::post('/RingkasanOrder/BuktiBayar/Upload', [UserPage::class, 'KirimBuktiBayar'])->name('BuktiBayar.upload');
  Route::post('/RingkasanOrder/Ktp/Upload', [UserPage::class, 'KirimKtp'])->name('ktp.upload');
  Route::post('/RingkasanOrder/KartuKeluarga/Upload', [UserPage::class, 'KirimKartuKeluarga'])->name('kartu.keluarga.upload');
  Route::post('/RingkasanOrder/SimA/Upload', [UserPage::class, 'KirimSimA'])->name('simA.upload');
  Route::post('/Dashboard/Update/', [UserPage::class, 'Update_Member'])->name('update');
});

//Landing Page end
Route::redirect('/', 'Home');