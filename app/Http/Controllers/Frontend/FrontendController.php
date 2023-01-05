<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AparaturDesa;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\KategoriBerita;
use App\Models\KategoriProduk;
use App\Models\Produk;
use App\Models\Slide;
use App\Models\VisiMisi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index() {
        $berita = Berita::orderBy('created_at', 'DESC')->limit(3)->get();
        $slide = Slide::orderBy('id', 'DESC')->get();
        $produk = Produk::orderBy('created_at', 'DESC')->limit(3)->get();
        return view('HalamanUtama.beranda', [
            'berita' => $berita,
            'slide' => $slide,
            'produk' => $produk
        ]);
    }

    public function tentang_desa() {
        $slide = Slide::orderBy('id', 'DESC')->get();
        return view('HalamanUtama.tentang-desa', compact('slide'));
    }

    public function berita_desa() {
        $berita = Berita::orderBy('created_at', 'DESC')->get();
        $kategoriberita = KategoriBerita::all();
        $slide = Slide::orderBy('id', 'DESC')->get();
        return view('HalamanUtama.HalamanBerita.berita-desa', [
            'berita' => $berita,
            'kategoriberita'=> $kategoriberita,
            'slide' => $slide
        ]);
    }

    public function detail_berita($slug) {
        $berita = Berita::where('slug', $slug)->first();
        $kategoriberita = KategoriBerita::all();
        $aparatur = AparaturDesa::orderBy('id', 'ASC')->get();
        $galeri = Galeri::orderBy('id', 'ASC')->get();
        $berita_terbaru = Berita::orderBy('created_at', 'DESC')->limit(5)->get();
        $jumlah = $berita->views + 1;
              Berita::where('slug', $slug)->update(
              [
                  'views' => $jumlah
              ]
              );
        return view('HalamanUtama.HalamanBerita.detail-berita', [
            'berita' => $berita,
            'kategoriberita'=> $kategoriberita,
            'aparatur' => $aparatur,
            'berita_terbaru' => $berita_terbaru,
            'galeri' => $galeri
        ]);
    }

    public function detail_kategori(KategoriBerita $kategori)
    {
        $beritaKategori = $kategori->berita()->get();
        $berita = Berita::all();
        $kategoriberita = KategoriBerita::all();
        $aparatur = AparaturDesa::orderBy('id', 'ASC')->get();
        $berita_terbaru = Berita::orderBy('created_at', 'DESC')->limit(5)->get();

        return view('HalamanUtama.HalamanBerita.kategori-berita', [
            'kategoriberita' => $kategoriberita,
            'beritaKategori' => $beritaKategori,
            'aparatur' => $aparatur,
            'berita_terbaru' => $berita_terbaru,
            'berita' => $berita,
        ]);
    }

    public function aparatur() {
        $aparatur = AparaturDesa::orderBy('id', 'ASC')->get();

        return view('HalamanUtama.TentangDesa.aparatur', compact('aparatur'));
    }

    public function visimisi() {
        $visimisi = VisiMisi::all();

        return view('HalamanUtama.TentangDesa.visimisi', compact('visimisi'));
    }

    public function galeri_desa() {
        $galeri = Galeri::orderBy('id', 'DESC')->get();

        return view('HalamanUtama.TentangDesa.galeri-desa', compact('galeri'));

    }

    // fungsi untuk halaman Produk Desa
    public function produk_desa() {
        $kategori_produk = KategoriProduk::orderBy('id', 'DESC')->get();
        $slide = Slide::orderBy('id', 'DESC')->get();

        return view('HalamanUtama.HalamanProduk.produk-desa', [
            'kategori_produk'=> $kategori_produk,
            'slide' => $slide
        ]);
    }
}

