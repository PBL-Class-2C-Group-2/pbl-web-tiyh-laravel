<?php

namespace App\Http\Controllers\Berita;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 5;
        $berita = Berita::paginate($pagination);
        return view('AdminDashboard.Berita.berita', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoriberita = KategoriBerita::all();
        return view('AdminDashboard.Berita.berita-create', compact('kategoriberita'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|min:4',
        ]);

        $berita = $request->all();
        $berita['slug'] = Str::slug($request->judul);
        $berita['user_id'] = Auth::id();
        $berita['views'] = 0;
        $berita['gambar_berita'] = $request->file('gambar_berita')->store('berita');

        Berita::create($berita);

        return redirect()->route('berita.index')->with('success', 'Data Berhasil Tersimpan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $berita = Berita::findorfail($id);
        $kategoriberita = KategoriBerita::all();

        return view('AdminDashboard.Berita.berita-edit', compact('berita', 'kategoriberita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'judul' => 'required|min:4',
        // ]);

        if (empty($request->file('gambar_berita'))) {
            $berita = Berita::findorfail($id);
            $berita->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'slug' => Str::slug($request->judul),
                'kategori_berita_id' => $request->kategori_berita_id,
                'aktivasi' => $request->aktivasi,
                'user_id' => Auth::id()
            ]);
            return redirect()->route('berita.index')->with('info', 'Data Berhasil Diubah!');
        } else {
            $berita = Berita::findorfail($id);
            Storage::delete($berita->gambar_berita);
            $berita->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'slug' => Str::slug($request->judul),
                'kategori_berita_id' => $request->kategori_berita_id,
                'aktivasi' => $request->aktivasi,
                'user_id' => Auth::id(),
                'gambar_berita' => $request->file('gambar_berita')->store('berita')
            ]);
            return redirect()->route('berita.index')->with('info', 'Data Berhasil Diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Berita::findorfail($id);
        Storage::delete($berita->gambar_berita);
        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Data Berhasil Dihapus!');
    }

}
