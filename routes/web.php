<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Berita\KategoriBeritaController;
use App\Http\Controllers\Berita\BeritaController;
use App\Http\Controllers\Berita\SlideController;
use App\Http\Controllers\Informasi\AparaturDesaController;
<<<<<<< HEAD
use App\Http\Controllers\Informasi\VisiMisiController;
=======
use App\Http\Controllers\Informasi\GaleriController;
>>>>>>> cee9b5b7f4506e2d7151b3cb620ac19818840bb2

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
Route::get('/', [FrontendController::class, 'index'])->name('beranda');
Route::get('/tentang-desa', [FrontendController::class, 'tentang_desa'])->name('tentang-desa');
Route::get('/berita-desa', [FrontendController::class, 'berita_desa'])->name('berita-desa');
Route::get('/detail-berita/{slug}', [FrontendController::class, 'detail_berita'])->name('detail-berita');
Route::get('/kategori/{kategori}', [FrontendController::class, 'detail_kategori'])->name('berita.kategori');
<<<<<<< HEAD
Route::get('/visi-misi}', [FrontendController::class, 'visimisi'])->name('visi-misi');
=======
Route::get('/aparatur-desa}', [FrontendController::class, 'aparatur'])->name('aparatur-desa');
Route::get('/galeri-desa}', [FrontendController::class, 'galeri_desa'])->name('galeri-desa');
>>>>>>> cee9b5b7f4506e2d7151b3cb620ac19818840bb2


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
<<<<<<< HEAD
    // Visi Misi
    Route::resource('visi-misi', VisiMisiController::class);
=======
    // Galeri
    Route::resource('galeri', GaleriController::class);
>>>>>>> cee9b5b7f4506e2d7151b3cb620ac19818840bb2
});



