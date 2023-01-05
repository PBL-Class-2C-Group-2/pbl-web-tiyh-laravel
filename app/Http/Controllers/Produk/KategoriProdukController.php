<?php

namespace App\Http\Controllers\Produk;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class KategoriProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 5;
        $kategori = KategoriProduk::paginate($pagination);
        return view('AdminDashboard.KategoriProduk.kategoriProduk', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminDashboard.KategoriProduk.kategoriProduk-create');
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
            'nama_kategori' => 'required|min:3',
            'gambar' => 'mimes:png,jpg,jpeg,gif,bmp,webp'
        ]);

        if (!empty($request->file('gambar'))) {
            $kategori = $request->all();
            $kategori['slug'] = Str::slug($request->nama_kategori);
            $kategori['gambar'] = $request->file('gambar')->store('kategoriProduk');

            KategoriProduk::create($kategori);

            return redirect()->route('kategori-produk.index')->with('success', 'Data Berhasil Tersimpan!');
        } else {
            $kategori = $request->all();
            $kategori['slug'] = Str::slug($request->nama_kategori);

            KategoriProduk::create($kategori);

            return redirect()->route('kategori-produk.index')->with('success', 'Data Berhasil Tersimpan!');
        }
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
        $kategori = KategoriProduk::findorfail($id);
        return view('AdminDashboard.KategoriProduk.kategoriProduk-edit', compact('kategori'));
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
        $this->validate($request, [
            'nama_kategori' => 'required|min:3',
            'gambar' => 'mimes:png,jpg,jpeg,gif,bmp,webp'
        ]);

        if (empty($request->file('gambar'))) {
            $kategori = KategoriProduk::findorfail($id);
            $kategori->update([
                'nama_kategori' => $request->nama_kategori,
                'slug' => Str::slug($request->nama_kategori)
            ]);
            return redirect()->route('kategori-produk.index')->with('info', 'Data Berhasil Diubah!');
        } else {
            $kategori = KategoriProduk::findorfail($id);
            Storage::delete($kategori->gambar);
            $kategori->update([
                'nama_kategori' => $request->nama_kategori,
                'slug' => Str::slug($request->nama_kategori),
                'gambar' => $request->file('gambar')->store('kategoriProduk')
            ]);
            return redirect()->route('kategori-produk.index')->with('info', 'Data Berhasil Diubah!');
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
        $kategori = KategoriProduk::findorfail($id);
        if (!$kategori) {
            return redirect()->back()->with('success', 'Mohon Maaf Data Ditidak Ada!');
        }

        Storage::delete($kategori->gambar);
        $kategori->delete();

        return redirect()->route('kategori-produk.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
