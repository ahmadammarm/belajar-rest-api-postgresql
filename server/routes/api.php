<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('v1')->group(function () {
    Route::apiResource('products', 'App\Http\Controllers\ProductController');
});

Route::prefix('v1')->group(function () {
    Route::apiResource('mahasiswas', 'App\Http\Controllers\MahasiswaController');
});

Route::prefix('v1')->group(function () {
    Route::apiResource('barangs', 'App\Http\Controllers\BarangController');
});

Route::prefix('v1')->group(function () {
    Route::apiResource('pemain-timnas', 'App\Http\Controllers\PemainTimnasController');
});
