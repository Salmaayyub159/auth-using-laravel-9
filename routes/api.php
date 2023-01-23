<?php

use App\Http\Controllers\loginController;
use App\Http\Controllers\playDB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register',[loginController::class,'register']);
Route::post('/login',[loginController::class,'authController']);


Route::group(['middleware'=>'auth:api'],function (){
    Route::get('/beranda',[loginController::class,'postLogin']);
    Route::post('/logout',[loginController::class,'logout']); 

});

Route::get('/show',[playDB::class,'showAll']);
Route::get('/show/{id}',[playDB::class,'showId']);
Route::get('/produk-data',[playDB::class,'produkData']);
Route::post('/produk-data/tambah',[playDB::class,'addProduk']);
Route::put('/produk-data/edit/{id}',[playDB::class,'editProduk']);
Route::delete('/produk-data/hapus/{id}',[playDB::class,'deleteProduk']);