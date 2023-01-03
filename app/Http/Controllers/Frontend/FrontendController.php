<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AparaturDesa;
use App\Models\Berita;
use App\Models\KategoriBerita;
use App\Models\Slide;
use App\Models\VisiMisi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;//

class FrontendController extends Controller
{
    public function index() {
        $berita = Berita::orderBy('created_at', 'DESC')->limit(3)->get();
        $slide = Slide::orderBy('id', 'DESC')->get();
        return view('HalamanUtama.beranda', [
            'berita' => $berita,
            'slide' => $slide
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
            'berita_terbaru' => $berita_terbaru
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

        return view('AdminDashboard.VisiMisi', compact('visimisi'));
    }
}

