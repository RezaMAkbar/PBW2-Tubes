<?php

use App\Http\Controllers\DetailPenerimaanController;
use App\Http\Controllers\LogTransaksiController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StockOpname;
use App\Http\Controllers\StokOpnameController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\APIController;
use App\Http\Controllers\TransaksiController;
use App\Models\DetailPenerimaan;
use App\Models\LogTransaksi;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [ObatController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/users', [UsersController::class, 'index'])->name('users.index');

    Route::get('/tambahObat', [ObatController::class, 'create'])->name('obat.tambahObat');
    Route::post('/storeObat', [ObatController::class, 'store'])->name('obat.storeObat');
    Route::get('/editObat/{obat}', [ObatController::class, 'show'])->name('obat.editObat');
    Route::post('/updateObat', [ObatController::class, 'update'])->name('obat.updateObat');
    Route::post('/deleteObat', [ObatController::class, 'destroy'])->name('obat.deleteObat');
    Route::get('/transaksi', [DetailPenerimaanController::class, 'create'])->name('transaksi.transaksiObat');
    Route::post('/transaksiBeli', [DetailPenerimaanController::class, 'store'])->name('transaksi.storeTerima');
    Route::post('/transaksiJual', [PenjualanController::class, 'store'])->name('transaksi.storeJual');
    Route::get('/logTransaksi', [LogTransaksiController::class, 'index'])->name('log.logTransaksi');
    Route::get('/viewTransaksiTerima', [TransaksiController::class, 'indexTerima'])->name('transaksi.viewDetailTransaksiTerima');
    Route::get('/viewTransaksiJual', [TransaksiController::class, 'indexJual'])->name('transaksi.viewDetailTransaksiJual');

    Route::get('/stockOpname', [StokOpnameController::class, 'index'])->name('stockOpname.viewStockOpname');
    Route::get('/spesifikStockOpname/{stokOpname}', [StokOpnameController::class, 'indexSpesifik'])->name('stockOpname.spesifikStockOpname');
    Route::get('/editStockOpname/{stokOpname}', [StokOpnameController::class, 'show'])->name('stockOpname.editStockOpname');
    Route::post('/updateStockOpname', [StokOpnameController::class, 'update'])->name('stockOpname.updateStockOpname');
    Route::get('/tambahViewStockOpname/{stokOpname}', [StokOpnameController::class, 'create'])->name('stockOpname.tambahStockOpname');
    Route::post('/tambahStockOpname', [StokOpnameController::class, 'store'])->name('stockOpname.addStockOpname');

    Route::get('/about', function () {
        return view('about');
    })->name('about');
    // Route::get('/stockOpname', function () {
    //     return view('stockOpname.viewStockOpname');
    // })->name('viewStockOpname');
});
Route::get('callUserWithToken', [APIController::class, 'memanggilAPIUser']);
Route::get('callObatWithToken', [APIController::class, 'memanggilAPIObat']);
Route::get('callStockOpnameWithToken', [APIController::class, 'memanggilAPIStockOpname']);
Route::get('callDetailPenerimaanWithToken', [APIController::class, 'memanggilAPIDetailPenerimaan']);
Route::get('callPenjualanWithToken', [APIController::class, 'memanggilAPIPenjualan']);
Route::get('callLogTransaksiWithToken', [APIController::class, 'memanggilAPILogTransaksi']);

require __DIR__.'/auth.php';

// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
