<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\PencarianController; 
use App\Http\Controllers\DataPesananController;
use App\Http\Controllers\DataRefundController;
use App\Http\Controllers\TampilkanResiController;
use App\Http\Controllers\KeranjangController;

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
Route::get('/databarang',[PencarianController::class,'index']);
Route::get('/databarang-inventory/{id_barang}', [PencarianController::class, 'show']); 
Route::get('/databarang-inventory',[PencarianController::class,'fetchDataFromAPI']);

Route::group(['middleware'=>'api','prefix'=>'auth'], function($router){
    Route::post('/register',[AuthController::class,'register']);
    Route::POST('/login',[AuthController::class,'login']);
    Route::get('/profile',[AuthController::class,'profile']);
    Route::post('/profile_update',[AuthController::class,'profile_update']);
}); 

Route::apiResource('data_pesanan', DataPesananController::class);
Route::apiResource('data_refund', DataRefundController::class);

Route::middleware('auth:sanctum')->get('/resi', function (Request $request) {
    return $request->resi();
});

Route::GET('/keranjang', [KeranjangController::class, 'index']);
Route::POST('/keranjang/add', [KeranjangController::class, 'store']);
Route::GET('/keranjang/{id_keranjang}', [KeranjangController::class, 'showbyid']);
Route::PUT('/keranjang/update/{id_keranjang}', [KeranjangController::class, 'update']);
