<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\PencarianController; 
use App\Http\Controllers\DataPesananController;
use App\Http\Controllers\DataRefundController;
use App\Http\Controllers\TampilkanResiController;
use App\Http\Controllers\CartController;

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
Route::get('/barang',[PencarianController::class,'index']);
Route::get('/barang/{id_barang}', [PencarianController::class, 'show']); 

Route::group(['middleware'=>'api','prefix'=>'auth'], function($router){
    Route::post('/register',[AuthController::class,'register']);
    Route::post('/login',[AuthController::class,'login']);
    Route::get('/profile',[AuthController::class,'profile']);
    Route::post('/profile_update',[AuthController::class,'profile_update']);
}); 

Route::apiResource('data_pesanan', DataPesananController::class);
Route::apiResource('data_refund', DataRefundController::class);

Route::middleware('auth:sanctum')->get('/resi', function (Request $request) {
    return $request->resi();
});
Route::get('/resi',[TampilkanResiController::class,'index']);
Route::get('/resi/{id_pengemasan}', [TampilkanResiController::class, 'show']); 

Route::post('/tambahCart',[CartControllerController::class,'tambahCart']);
Route::get('/barang-keranjang',[CartController::class,'tambahCart']);
Route::get('/barang/{id_barang}',[CartController::class, 'addBarangtoCart']); 

