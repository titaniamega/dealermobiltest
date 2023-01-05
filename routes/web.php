<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\KonsumenController;
use App\Http\Controllers\KreditController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\AkunController;

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
Route::get('/update','App\Http\Controllers\TipeController@update');

Route::resource('/promo', PromoController::class);
Route::get('/', 'App\Http\Controllers\PromoController@index');
Route::get('/create','App\Http\Controllers\PromoController@create');
Route::get('/update','App\Http\Controllers\PromoController@update');

Route::resource('/berita', BeritaController::class);
Route::get('/', 'App\Http\Controllers\BeritaController@index');
Route::get('/create','App\Http\Controllers\BeritaController@create');
Route::get('/update','App\Http\Controllers\BeritaController@update');


Route::resource('/konsumen', KonsumenController::class);
Route::get('/', 'App\Http\Controllers\KonsumenController@index');
Route::get('/create','App\Http\Controllers\KonsumenController@create');
Route::get('/update','App\Http\Controllers\KonsumenController@update');

Route::resource('/video', VideoController::class);
Route::get('/', 'App\Http\Controllers\VideoController@index');
Route::get('/create','App\Http\Controllers\VideoController@create');
Route::get('/update','App\Http\Controllers\VideoController@update');

Route::resource('/kredit', KreditController::class);
Route::get('/', 'App\Http\Controllers\KreditController@index');
Route::get('/create', 'App\Http\Controllers\KreditController@create');
Route::get('/update', 'App\Http\Controllers\KreditController@update');

Route::resource('/akun', AkunController::class);
Route::get('/update', 'App\Http\Controllers\KreditController@update');

Route::get('/admin', 'AdminController@index');
Route::get('/user', 'UserController@index');


Route::group(['prefix' => 'admin'], function() {
  Route::get('/', 'DashboardController@index');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
