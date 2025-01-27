<?php

use Illuminate\Http\Response;
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

Route::post('register', 'App\Http\Controllers\AuthController@register');
Route::get('/login', function () {
    return response()->json([
        'status' => 401,
        'error' => 'true',
        'message' => 'Unauthorized'
    ], Response::HTTP_UNAUTHORIZED);
})->name('login');
Route::post('login', 'App\Http\Controllers\AuthController@login');
Route::post('logout', 'App\Http\Controllers\AuthController@logout');
Route::get('user', 'App\Http\Controllers\AuthController@user',)->middleware('auth');
