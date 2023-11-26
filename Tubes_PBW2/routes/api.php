<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DetailPenerimaanController;
use App\Http\Controllers\LogTransaksiController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\StokOpnameController;
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
