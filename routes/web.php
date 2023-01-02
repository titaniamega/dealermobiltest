<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\KreditController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/produk', ProdukController::class);
Route::get('/', 'App\Http\Controllers\ProdukController@index');
Route::get('/create','App\Http\Controllers\ProdukController@create');
Route::get('/update','App\Http\Controllers\ProdukController@update');

Route::resource('/tipe', TipeController::class);
Route::get('/', 'App\Http\Controllers\TipeController@index');
Route::get('/create','App\Http\Controllers\TipeController@create');

Route::resource('/promo', PromoController::class);
Route::get('/', 'App\Http\Controllers\PromoController@index');
Route::get('/create','App\Http\Controllers\PromoController@create');

Route::resource('/konsumen', KonsumenController::class);
Route::get('/', 'App\Http\Controllers\KonsumenController@index');

Route::resource('/kredit', KreditController::class);
Route::get('/', 'App\Http\Controllers\KreditController@index');
Route::get('/create', 'App\Http\Controllers\KreditController@create');

Route::group(['prefix' => 'admin'], function() {
  Route::get('/', 'DashboardController@index');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
