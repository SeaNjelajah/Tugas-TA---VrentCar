<?php

use App\Http\Controllers\CombineController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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

Route::view('/register', 'AdminPage.ZTemplate.Register')->name('registerView');
Route::view('/login', 'AdminPage.ZTemplate.Login')->name('LoginView');
//Dashboard Start
Route::post('/login/check', [LoginController::class, 'Login'])->name('login');
Route::post('/register/check', [RegisterController::class, 'Login'])->name('register');

Route::get('/logout', [LoginController::class,'signOut'])->name('logout');

Route::view('/Dashboard/test', 'welcome');
//Route::redirect('/','/Dashboard');

Route::get('/Dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard.show')->middleware('AdminZone');
//Dashboard end

//Armada Mobil Start
Route::get('/ArmadaMobil', [CombineController::class, 'showMobil'])->name('admin.ArmadaMobil.show')->middleware('AdminZone');
Route::post('/ArmadaMobil/Create/',[CombineController::class, 'CreateMobil'])->name('admin.ArmadaMobil.create')->middleware('AdminZone');
Route::post('/ArmadaMobil/Delete/', [CombineController::class, 'deleteMobil'])->name('admin.ArmadaMobil.delete')->middleware('AdminZone');
Route::post('/ArmadaMobil/Update/', [CombineController::class, 'updateMobil'])->name('admin.ArmadaMobil.update')->middleware('AdminZone');
//Armada Mobil end

//Persewaan Start
Route::get('/Persewaan', [CombineController::class, 'PersewaanShow'])->name('admin.Persewaan.show')->middleware('AdminZone');

// Pesanan Order
Route::post('/Persewaan/Setujui/{id}', [CombineController::class, 'OrderSetujui'])->name('OrderSetujui')->middleware('AdminZone');
Route::post('/Persewaan/Batalkan/{id}', [CombineController::class, 'OrderBatalkan'])->name('OrderBatalkan')->middleware('AdminZone');
// Pesanan Order end

//carimobil
Route::get('/CariMobil', [CombineController::class, 'CariMobilPersewaan'])->name('CariMobilPersewaan')->middleware('AdminZone');
Route::post('/CariMobil/add', [CombineController::class, 'addPesanan'])->name('TambahPersewaan')->middleware('AdminZone');
//carimobil end


Route::post('/Persewaan/Calculate', [CombineController::class, 'HitungPesanan'])->name('HitungPesanan')->middleware('AdminZone');
Route::post('/Persewaan/Add', [CombineController::class, 'addPesanan'])->name('addPesanan')->middleware('AdminZone');

//Persewaan End

//Transaksi Start
Route::get('/TransaksiSelesai', [CombineController::class, 'TransaksiShow'])->name('admin.Transaksi.show')->middleware('AdminZone');
Route::post('/TransaksiSelesai', [CombineController::class, 'TransaksiTest'])->name('TransaksiTest')->middleware('AdminZone');
//Transaksi end

//TagManage Start
Route::get('/TagManage', [CombineController::class, 'tagManageShow'])->name('TagManage')->middleware('AdminZone');
Route::post('/TagManage/Create/Tag', [CombineController::class, 'tagManageAdd'])->name('TagManageAddTag')->middleware('AdminZone');
Route::post('/TagMange/Edit/Tag', [CombineController::class, 'TagManageEdit'])->name('TagManageEdit')->middleware('AdminZone');
Route::post('/TagManage/Delete/Tag', [CombineController::class, 'tagManageTagDel'])->name('TagManageDelTag')->middleware('AdminZone');

Route::post('/TagManage/Add/TagContain', [CombineController::class, 'tagContainAdd'])->name('addTagContain')->middleware('AdminZone');
Route::post('/TagManage/Delete/TagContain', [CombineController::class, 'tagContainDel'])->name('tagContainDel')->middleware('AdminZone');
Route::post('/TagManage/Edit/TagContain', [CombineController::class, 'tagContainEdit'])->name('tagContainEdit')->middleware('AdminZone');
//TagManage end

//SopirManager Start
Route::get('/SupirManager', [CombineController::class, 'SupirShow'])->name('SupirManager')->middleware('AdminZone');
Route::post('/SupirManager/add/', [CombineController::class, 'SupirAdd'])->name('SupirManagerAdd')->middleware('AdminZone');
Route::post('/SupirManager/Delete/', [CombineController::class, 'Supirdelete'])->name('SupirManagerDel')->middleware('AdminZone');
Route::post('/SupirManager/Edit/', [CombineController::class, 'SupirEdit'])->name('SupirManagerEdit')->middleware('AdminZone');
//SopirManager end




//Landing Page Start
Route::get('/LandingCars', [CombineController::class, 'CarListPage'])->name('CarListPage');
Route::post('/SingleCar', [CombineController::class, 'CarSingle'])->name('CarSinglePage');


Route::get('/Home', [CombineController::class, 'HomeShow'])->name('Home');

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

Route::get('/FormOrder', function () {
  return view('LandingPage.ZTemplate.form-order');
})->name('FormOrder');

//Landing Page end

Route::redirect('/', 'Home');