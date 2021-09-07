<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Livewire\Barangs;
use App\Http\Livewire\Karyawans;
use App\Http\Livewire\Pos;
use App\Http\Livewire\PenerimaanBarangs;
use App\Http\Livewire\Departemens;
use App\Http\Livewire\Jobs;
use App\Http\Livewire\Suplayers;
use App\Http\Livewire\Prs;
use App\Http\Livewire\Items;
use App\Http\Livewire\ItemLists;
use App\Http\Livewire\JobLists;

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

    //suplayer
    Route::get('admin/suplayer', Suplayers::class)->name('suplayer');

    //job
    Route::get('admin/job', Jobs::class)->name('job');

    //departemen
    Route::get('admin/departemen', Departemens::class)->name('departemen');

    //karyawan
    Route::get('admin/karyawan', Karyawans::class)->name('karyawan');

    //Job_lists
    Route::get('admin/job_lists', JobLists::class)->name('job_list');

    //Items
    Route::get('admin/item', Items::class)->name('item');

    //Prs
    Route::get('admin/purchase_Request', Prs::class)->name('pr');

    //item_list
    Route::get('admin/item_list', ItemLists::class)->name('item_list');

    //PO
    Route::get('admin/purchase_order', Pos::class)->name('po');

    //penerimaan barang
    Route::get('admin/penerimaan_barang', PenerimaanBarangs::class)->name('penerimaan_barang');

    //barang
    Route::get('admin/barang', Barangs::class)->name('barang');

});