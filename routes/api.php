<?php

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

//API route for register new user
Route::post('/register', [App\Http\Controllers\API\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);

//Protecting Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    // Kategori Berita
    Route::resource('kategori-berita',
    App\Http\Controllers\API\KategoriBeritaController::class);

    // Berita
    Route::apiResource('/berita', App\Http\Controllers\API\BeritaController::class);

    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\API\AuthController::class, 'logout']);
});

// Api Frontend
// Berita API
Route::get('/front-berita', [App\Http\Controllers\API\FrontEndController::class, 'berita_api']);
Route::get('/front-kategori-berita', [App\Http\Controllers\API\FrontEndController::class, 'kategori_berita_api']);
// Produk API
Route::get('/front-produk', [App\Http\Controllers\API\FrontEndController::class, 'produk_api']);
Route::get('/front-kategori-produk', [App\Http\Controllers\API\FrontEndController::class, 'kategori_produk_api']);
Route::get('/front-toko', [App\Http\Controllers\API\FrontEndController::class, 'toko_api']);
// Tentang Desa
Route::get('/front-slider', [App\Http\Controllers\API\FrontEndController::class, 'slider_api']);
Route::get('/front-aparatur', [App\Http\Controllers\API\FrontEndController::class, 'aparatur_api']);
Route::get('/front-galeri', [App\Http\Controllers\API\FrontEndController::class, 'galeri_api']);
Route::get('/front-visi-misi', [App\Http\Controllers\API\FrontEndController::class, 'visimisi_api']);

