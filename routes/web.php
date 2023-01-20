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
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UmumController;


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

Route::get('/umum', [UmumController::class,'index']);
Route::get('/umum/produk',[UmumController::class,'produk'])->name("umum.produk");
Route::get('/umum/harga',[UmumController::class,'harga'])->name("umum.harga");
Route::get('/umum/promo',[UmumController::class,'promo'])->name("umum.promo");
Route::get('/umum/video',[UmumController::class,'video'])->name("umum.video");
Route::get('/umum/galeri',[UmumController::class,'galeri'])->name("umum.galeri");
Route::get('/umum/berita',[UmumController::class,'berita'])->name("umum.berita");
Route::get('/umum/kredit',[UmumController::class,'kredit'])->name("umum.kredit");
Route::get('/umum/kontak',[UmumController::class,'kontak'])->name("umum.kontak");
Route::get('/umum/detailPromo/{id}',[UmumController::class,'detailPromo'])->name("umum.detailPromo");
Route::get('/umum/detailBerita/{id}',[UmumController::class,'detailBerita'])->name("umum.detailBerita");
Route::get('/umum/detailProduk/{id}',[UmumController::class,'detailProduk'])->name("umum.detailProduk");
Route::get('/umum/detailVideo/{id}',[UmumController::class,'detailVideo'])->name("umum.detailVideo");
Route::get('/','HomeController@index');

Auth::routes();

Route::group(
  ['middleware'=>['auth','user']],function(){
      Route::get('/', 'App\Http\Controllers\ProdukController@index');
      Route::resource('/produk', ProdukController::class);
      Route::resource('/tipe', TipeController::class);
      Route::resource('/promo', PromoController::class);
      Route::resource('/berita', BeritaController::class);
      Route::resource('/konsumen', KonsumenController::class);
      Route::resource('/video', VideoController::class);
      Route::resource('/kredit', KreditController::class);
      Route::resource('/contact', ContactController::class);        
    }
  );

  Route::group(
    ['middleware'=>['auth','admin']],function(){
      Route::resource('/akun', AkunController::class);
  }
);

Route::group(
  ['middleware'=>'auth'],function(){
      Route::get('/home', 'App\Http\Controllers\HomeController@index');
      Route::get('/users', 'App\Http\Controllers\UserController@index');
      Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
  }
);



// Route::group(['prefix' => 'admin'], function() {
//   Route::get('/', 'DashboardController@index');
// });
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', function() {
//     return view('home');
// })->name('home')->middleware('auth');
