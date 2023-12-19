<?php

use App\Http\Controllers\ObatRestController;
use App\Http\Controllers\StockOpnameRestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DetailPenerimaanController;
use App\Http\Controllers\LogTransaksiController;
use App\Http\Controllers\LogTransaksiRestController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\StokOpnameController;
use App\Http\Controllers\TransaksiJualRestController;
use App\Http\Controllers\TransaksiTerimaRestController;
use App\Models\StokOpname;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
route::get('getAllUsers', [UsersController::class, 'getUsers']);
route::get('getAllUsersToo', [UsersController::class, 'getUsers'])->middleware('auth:sanctum');
route::get('getAllObat', [ObatController::class, 'getObat']);
route::get('getAllObatToo', [ObatController::class, 'getObat'])->middleware('auth:sanctum');
route::get('getAllStockOpname', [StokOpnameController::class, 'getStockOpname']);
route::get('getAllStockOpnameToo', [StokOpnameController::class, 'getStockOpname'])->middleware('auth:sanctum');
route::get('getAllDetailPenerimaan', [DetailPenerimaanController::class, 'getDetailPenerimaan']);
route::get('getAllDetailPenerimaanToo', [DetailPenerimaanController::class, 'getDetailPenerimaan'])->middleware('auth:sanctum');
route::get('getAllDetailPenjualan', [PenjualanController::class, 'getPenjualan']);
route::get('getAllDetailPenjualanToo', [PenjualanController::class, 'getPenjualan'])->middleware('auth:sanctum');
route::get('getAllDetailLog', [LogTransaksiController::class, 'getLogTransaksi']);
route::get('getAllDetailLogToo', [LogTransaksiController::class, 'getLogTransaksi'])->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->group( function() {
    Route::put('/obatRestAPI/{obat}', [ObatRestController::class, 'update']);
    Route::delete('/obatRestAPI/{obat}', [ObatRestController::class, 'destroy']);
    route::resource('obatRestAPI', ObatRestController::class);

    Route::put('/TransaksiTerimaRestAPI/{terima}', [TransaksiTerimaRestController::class, 'update']);
    Route::delete('/TransaksiTerimaRestAPI/{terima}', [TransaksiTerimaRestController::class, 'destroy']);
    route::resource('TransaksiTerimaRestAPI', TransaksiTerimaRestController::class);

    Route::put('/TransaksiJualRestAPI/{jual}', [TransaksiJualRestController::class, 'update']);
    Route::delete('/TransaksiJualRestAPI/{jual}', [TransaksiJualRestController::class, 'destroy']);
    route::resource('TransaksiJualRestAPI', TransaksiJualRestController::class);

    Route::put('/StockOpnameRestAPI/{opname}', [StockOpnameRestController::class, 'update']);
    Route::delete('/StockOpnameRestAPI/{opname}', [StockOpnameRestController::class, 'destroy']);
    route::resource('StockOpnameRestAPI', StockOpnameRestController::class);

    Route::delete('/LogTransaksiRestAPI/{logTransaksi}', [LogTransaksiRestController::class, 'destroy']);
    route::resource('LogTransaksiRestAPI', LogTransaksiRestController::class);
});