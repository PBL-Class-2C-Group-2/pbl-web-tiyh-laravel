<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Berita\KategoriBeritaController;
use App\Http\Controllers\Berita\BeritaController;
use App\Http\Controllers\Berita\SlideController;
use App\Http\Controllers\Informasi\AparaturDesaController;
use App\Http\Controllers\Informasi\VisiMisiController;
use App\Http\Controllers\Informasi\GaleriController;
use App\Http\Controllers\Produk\KategoriProdukController;
use App\Http\Controllers\Produk\TokoController;
use App\Http\Controllers\Produk\ProdukController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


// Frontend
// beranda
Route::get('/', [FrontendController::class, 'index'])->name('beranda');
// berita
Route::get('/berita-desa', [FrontendController::class, 'berita_desa'])->name('berita-desa');
Route::get('/detail-berita/{slug}', [FrontendController::class, 'detail_berita'])->name('detail-berita');
Route::get('/kategori/{kategori}', [FrontendController::class, 'detail_kategori'])->name('berita.kategori');
// Produk Desa
Route::get('/produk-desa', [FrontendController::class, 'produk_desa'])->name('produk-desa');
Route::get('/detail-produk/{slug}', [FrontendController::class, 'detail_produk'])->name('detail-produk');
Route::get('/kategori-produk/{kategoriproduk}', [FrontendController::class, 'kategoriProduk'])->name('produk-kategori');
Route::get('/toko-desa/{slug}', [FrontendController::class, 'tokoDesa'])->name('toko-desa');
// Tentang Desa
Route::get('/tentang-desa', [FrontendController::class, 'tentang_desa'])->name('tentang-desa');
Route::get('/visimisi', [FrontendController::class, 'visimisi'])->name('visimisi');
Route::get('/aparatur-desa', [FrontendController::class, 'aparatur'])->name('aparatur-desa');
Route::get('/galeri-desa', [FrontendController::class, 'galeri_desa'])->name('galeri-desa');




// login ke admin
Route::controller(LoginController::class)->group(function(){

    Route::get('login', 'index')->name('login');

    Route::get('registration', 'registration')->name('registrasi');

    Route::get('logout', 'logout')->name('logout');

    Route::post('validate_registration', 'validate_registration')->name('sample.validate_registration');

    Route::post('validate_login', 'validate_login')->name('sample.validate_login');

});

// dashboard harus login
Route::group(['middleware' => ['auth']], function() {
    Route::get('dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
    // kategori berita desa tambong
    Route::resource('kategori-berita', KategoriBeritaController::class);
    // Berita
    Route::resource('berita', BeritaController::class);
    // Slide
    Route::resource('slide', SlideController::class);
    // Aparatur Desa
    Route::resource('aparatur', AparaturDesaController::class);
    // Visi Misi
    Route::resource('visi-misi', VisiMisiController::class);
    // Galeri
    Route::resource('galeri', GaleriController::class);
    // Kategori Produk
    Route::resource('kategori-produk', KategoriProdukController::class);
    // Toko
    Route::resource('toko', TokoController::class);
    // Produk
    Route::resource('produk', ProdukController::class);
});



