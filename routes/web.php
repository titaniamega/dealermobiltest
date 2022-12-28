<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MobilController;


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

Route::resource('/mobil', MobilController::class);
Route::get('/', 'App\Http\Controllers\MobilController@index');
Route::get('/create','App\Http\Controllers\MobilController@create');
Route::get('/update','App\Http\Controllers\MobilController@update');

Route::get('kliping', [HomeController::class, 'getKliping']);

Route::group(['prefix' => 'admin'], function() {
  Route::get('/', 'DashboardController@index');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
