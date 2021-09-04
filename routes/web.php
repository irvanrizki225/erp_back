<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Barangs;
use App\Http\Livewire\karyawans;
use App\Http\Livewire\pos;
use App\Http\Livewire\PenerimaanBarangs;
use App\Http\Livewire\departemens;
use App\Http\Livewire\Includes\Sidebar;

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

//login
Route::get('/', [AuthController::class, 'showFormLogin'])->name('masuk');
Route::post('login', [AuthController::class, 'login'])->name('login');

//register
Route::get('register', [AuthController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::get('sidebar', Sidebar::class)->name('sidebar');

Route::group(['middleware' => 'auth'], function () {
 
    Route::get('admin', [HomeController::class, 'index'])->name('admin');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    
     //departemen
     Route::get('admin/departemen', departemens::class)->name('departemen');

    //karyawan
    Route::get('admin/karyawan', karyawans::class)->name('karyawan');

    //barang
    Route::get('admin/barang', Barangs::class)->name('barang');

    //PO
    Route::get('admin/purchase_order', pos::class)->name('po');

    //laporan

    //penerimaan barang
    Route::get('admin/penerimaan_barang', PenerimaanBarangs::class)->name('penerimaan_barang');
});