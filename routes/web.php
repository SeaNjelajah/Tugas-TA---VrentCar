<?php

use App\Http\Controllers\CombineController;
use Illuminate\Support\Facades\Route;


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


//Dashboard Start
Route::view('/', 'welcome');
//Route::redirect('/','/Dashboard');
Route::view('/Dashboard', 'AdminPage.Combine')->name('Dashboard');
//Dashboard end

//Armada Mobil Start
Route::get('/ArmadaMobil', [CombineController::class, 'showMobil'])->name('ArmadaMobil');
Route::post('/ArmadaMobil/Create/',[CombineController::class, 'CreateMobil'])->name('AMCreate');
Route::post('/ArmadaMobil/Delete/', [CombineController::class, 'deleteMobil'])->name('delMobil');
Route::post('/ArmadaMobil/Update/', [CombineController::class, 'updateMobil'])->name('upMobil');
//Armada Mobil end

//Persewaan Start
Route::get('/Persewaan', [CombineController::class, 'PersewaanShow'])->name('Persewaan');

// Pesanan Order
Route::post('/Persewaan/Setujui/{id}', [CombineController::class, 'OrderSetujui'])->name('OrderSetujui');
Route::post('/Persewaan/Batalkan/{id}', [CombineController::class, 'OrderBatalkan'])->name('OrderBatalkan');
// Pesanan Order end


Route::post('/Persewaan/Calculate', [CombineController::class, 'HitungPesanan'])->name('HitungPesanan');
Route::post('/Persewaan/Add', [CombineController::class, 'addPesanan'])->name('addPesanan');
//Persewaan End

//Transaksi Start
Route::get('/TransaksiSelesai', [CombineController::class, 'TransaksiShow'])->name('Transaksi');
Route::post('/TransaksiSelesai', [CombineController::class, 'TransaksiTest'])->name('TransaksiTest');
//Transaksi end

//TagManage Start
Route::get('/TagManage', [CombineController::class, 'tagManageShow'])->name('TagManage');
Route::post('/TagManage/Create/Tag', [CombineController::class, 'tagManageAdd'])->name('TagManageAddTag');
Route::post('/TagMange/Edit/Tag', [CombineController::class, 'TagManageEdit'])->name('TagManageEdit');
Route::post('/TagManage/Delete/Tag', [CombineController::class, 'tagManageTagDel'])->name('TagManageDelTag');

Route::post('/TagManage/Add/TagContain', [CombineController::class, 'tagContainAdd'])->name('addTagContain');
Route::post('/TagManage/Delete/Contain', [CombineController::class, 'tagContainDel'])->name('tagContainDel');
Route::post('/TagManage/Edit/Contain', [CombineController::class, 'tagContainEdit'])->name('tagContainEdit');
//TagManage end

//SopirManager Start
Route::get('/SupirManager', [CombineController::class, 'SupirShow'])->name('SupirManager');
Route::post('/SupirManager/add/', [CombineController::class, 'SupirAdd'])->name('SupirManagerAdd');
Route::post('/SupirManager/Delete/', [CombineController::class, 'Supirdelete'])->name('SupirManagerDel');
Route::post('/SupirManager/Edit/', [CombineController::class, 'SupirEdit'])->name('SupirManagerEdit');
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