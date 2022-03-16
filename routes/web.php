<?php

use App\Http\Controllers\Admin\AccountManageController;
use App\Http\Controllers\CombineController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Global\LoginController as Login;
use App\Http\Controllers\Global\RegisterController as Register;

use App\Http\Controllers\Admin\DashboardController as Dashboard;
use App\Http\Controllers\Admin\ArmadaMobilController as Armada;
use App\Http\Controllers\Admin\PersewaanController as Persewaan;
use App\Http\Controllers\Admin\AccountManageController as Account;
use App\Http\Controllers\Karyawan\KaryawanController as Karyawan;

use App\Http\Controllers\LandingPageController as Landing;
use App\Http\Controllers\UserPageController as User;



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


Route::get('/register', [Register::class, 'RegisterView'])->name('RegisterView');
Route::get('/login', [Login::class, 'LoginView'])->name('LoginView');


Route::post('/login/check', [Login::class, 'Login'])->name('Login');
Route::post('/register/check', [Register::class, 'Login'])->name('register');

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
      Route::post('/StatusOrder/update', [Persewaan::class, 'update_status_order'])->name('status.order.update');
      Route::post('/Order/Selesai', [Persewaan::class, 'Selesai'])->name('order.selesai');
    });

    Route::prefix('AccountManage')->name('AccountManage.')->group( function () {
      Route::get('/', [Account::class, 'index'])->name('show');
      Route::post('/Create', [Account::class, 'Create'])->name('create');
      Route::post('/Update/Karyawan', [Account::class, 'Update_Karyawan'])->name('update.karyawan');
    });

});

Route::prefix('Karyawan')->name('karyawan.')->middleware('Karyawan')->group( function () {

  Route::prefix('Dashboard')->name('dashboard.')->group( function () {
    Route::get('/', [Karyawan::class, 'index'])->name('show');
    Route::post('/Update/StatusOrder', [Karyawan::class, 'update_status_order'])->name('update.status.order');
  });

});


//Dashboard end

//Armada Mobil Start

//Armada Mobil end

//Persewaan Start


// Pesanan Order

// Pesanan Order end 

//carimobil

//carimobil end


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

Route::get('/Ketentuan', function() {
  return view('LandingPage.ZTemplate.ketentuan');
  })->name('ketentuan');

Route::get('/Tips', function() {
  return view('LandingPage.ZTemplate.booking-tips');
})->name('tips');


Route::get('/FormOrder', [Landing::class, 'BookCar'])->name('FormOrder');


Route::post('/FormOrder/create', [Landing::class, 'Booking'])->name('FormOrder.create');



Route::prefix('User')->name('user.')->group( function () {
  Route::get('/Dashboard', [User::class, 'DashboardPage'])->name('dashboard');
  Route::get('/BookingBerjalan', [User::class, 'BookingBerjalanPage'])->name('bookingBerjalan');
  Route::post('/RingkasanOrder', [User::class, 'RingkasanOrder'])->name('RingkasanOrder');
  Route::get('/RingkasanOrder', [User::class, 'RingkasanOrderGet'])->name('RingkasanOrder');
  Route::post('/RingkasanOrder/BuktiBayar/Upload', [User::class, 'KirimBuktiBayar'])->name('BuktiBayar.upload');
});

//Landing Page end
Route::redirect('/', 'Home');