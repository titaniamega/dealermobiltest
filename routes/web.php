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
Route::get('/umum/video',[UmumController::class,'video' ])->name("umum.video");
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
      Route::get('/home/destroy',[HomeController::class,'destroy'])->name("home.destroy");
      Route::get('/video/updateStatus/{id}',[VideoController::class,'updateStatus'])->name("video.updateStatus");
      Route::delete('berita/destroy/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');
      Route::delete('konsumen/destroy/{id}', [KonsumenController::class, 'destroy'])->name('konsumen.destroy');
      Route::delete('produk/destroy/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
      Route::delete('tipe/destroy/{id}', [TipeController::class, 'destroy'])->name('tipe.destroy');
      Route::delete('promo/destroy/{id}', [PromoController::class, 'destroy'])->name('promo.destroy');
      Route::delete('kredit/destroy/{id}', [KreditController::class, 'destroy'])->name('kredit.destroy');
      Route::delete('video/destroy/{id}', [VideoController::class, 'destroy'])->name('video.destroy');
    }
  );

  Route::group(
    ['middleware'=>['auth','admin']],function(){
      Route::resource('/akun', AkunController::class);
      Route::delete('akun/destroy/{id}', [AkunController::class, 'destroy'])->name('akun.destroy');
  }
);

Route::group(
  ['middleware'=>'auth'],function(){
      Route::get('/home', 'App\Http\Controllers\HomeController@index');
      Route::get('/users', 'App\Http\Controllers\UserController@index');
      Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
      Route::get('/home',[HomeController::class,'index'])->name("home"); 
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
