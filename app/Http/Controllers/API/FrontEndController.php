<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\FrontendResource;
use App\Models\AparaturDesa;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\KategoriBerita;
use App\Models\KategoriProduk;
use App\Models\Produk;
use App\Models\Slide;
use App\Models\Toko;
use App\Models\VisiMisi;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function berita_api()
    {
        //get posts
        $beritaApi = Berita::orderBy('created_at', 'DESC')->get();

        //return collection of posts as a resource
        return new FrontendResource(true, 'List Data Berita Desa Tambong', $beritaApi);
    }

    public function kategori_berita_api()
    {
        //get posts
        $kategoriBeritaApi = KategoriBerita::all();

        //return collection of posts as a resource
        return new FrontendResource(true, 'List Data Kategori Berita Desa Tambong', $kategoriBeritaApi);
    }

    public function produk_api()
    {
        //get posts
        $produkApi = Produk::orderBy('created_at', 'DESC')->get();

        //return collection of posts as a resource
        return new FrontendResource(true, 'List Data Produk Desa Tambong', $produkApi);
    }

    public function kategori_produk_api()
    {
        //get posts
        $kategoriProdukApi = KategoriProduk::all();

        //return collection of posts as a resource
        return new FrontendResource(true, 'List Data Kategori Produk Desa Tambong', $kategoriProdukApi);
    }

    public function toko_api()
    {
        //get posts
        $tokoApi = Toko::all();

        //return collection of posts as a resource
        return new FrontendResource(true, 'List Data Toko Desa Tambong', $tokoApi);
    }

    public function slider_api()
    {
        //get posts
        $sliderApi = Slide::orderBy('id', 'DESC')->get();

        //return collection of posts as a resource
        return new FrontendResource(true, 'List Data Slider Banner', $sliderApi);
    }

    public function aparatur_api()
    {
        //get posts
        $aparaturApi = AparaturDesa::orderBy('id', 'ASC')->get();

        //return collection of posts as a resource
        return new FrontendResource(true, 'List Data Aparatur Desa', $aparaturApi);
    }

    public function galeri_api()
    {
        //get posts
        $galeriApi = Galeri::orderBy('created_at', 'DESC')->get();

        //return collection of posts as a resource
        return new FrontendResource(true, 'List Data Galeri Desa', $galeriApi);
    }

    public function visimisi_api()
    {
        //get posts
        $visimisiApi = VisiMisi::all();

        //return collection of posts as a resource
        return new FrontendResource(true, 'List Data Visi Misi Desa Tambong', $visimisiApi);
    }
}
