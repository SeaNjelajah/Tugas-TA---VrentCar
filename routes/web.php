<?php

use App\Http\Controllers\CombineController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Global\LoginController as Login;
use App\Http\Controllers\Global\RegisterController as Register;

use App\Http\Controllers\Admin\DashboardController as Dashboard;
use App\Http\Controllers\Admin\ArmadaMobilController as Armada;


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

Route::view('/Dashboard/test', 'welcome');
//Route::redirect('/','/Dashboard');


Route::prefix('Admin')->name('admin.')->middleware('Admin')->group( function () {

    Route::prefix('Dashboard')->name('dashboard.')->group( function () {
      Route::get('/', [Dashboard::class, 'Dashboard'])->name('show')->middleware('Admin');
    });

    Route::prefix('ArmadaMobil')->name('ArmadaMobil.')->group( function () {
      Route::get('/', [Armada::class, 'index'])->name('show');
      Route::post('/Create',[Armada::class, 'create'])->name('create');
      Route::post('/Delete', [Armada::class, 'delete'])->name('delete');
      Route::post('/Update', [Armada::class, 'edit'])->name('edit');
    });

    

});


//Dashboard end

//Armada Mobil Start

//Armada Mobil end

//Persewaan Start
Route::get('/Persewaan', [CombineController::class, 'PersewaanShow'])->name('admin.Persewaan.show')->middleware('Admin');

// Pesanan Order
Route::post('/Persewaan/Setujui/{id}', [CombineController::class, 'OrderSetujui'])->name('OrderSetujui')->middleware('Admin');
Route::post('/Persewaan/Batalkan/{id}', [CombineController::class, 'OrderBatalkan'])->name('OrderBatalkan')->middleware('Admin');
// Pesanan Order end

//carimobil
Route::get('/CariMobil', [CombineController::class, 'CariMobilPersewaan'])->name('CariMobilPersewaan')->middleware('Admin');
Route::post('/CariMobil/add', [CombineController::class, 'addPesanan'])->name('TambahPersewaan')->middleware('Admin');
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

Route::post('/FormOrder', [CombineController::class, 'BookCar'])->name('FormOrder');
Route::view('/RingkasanOrder', 'LandingPage.ZTemplate.RingkasanOrder')->name('RingkasanOrder');

//Landing Page end

Route::redirect('/', 'Home');