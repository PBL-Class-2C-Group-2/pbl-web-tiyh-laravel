<?php

namespace App\Http\Controllers\Produk;

use App\Http\Controllers\Controller;
use App\Models\KategoriProduk;
use App\Models\Produk;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paggination = 5;
        $produk = Produk::paginate($paggination);
        return view('AdminDashboard.Produk.produk', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = KategoriProduk::all();
        $toko = Toko::all();

        return view('AdminDashboard.Produk.produk-create', compact('kategori', 'toko'));
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
            'nama_produk' => 'required|min:3',
            'foto' => 'mimes:png,jpg,jpeg,gif,bmp,webp'
        ]);

        if (!empty($request->file('foto'))) {
            $produk = $request->all();
            $produk['slug'] = Str::slug($request->nama_produk);
            $produk['foto'] = $request->file('foto')->store('Produk');
            $produk['views'] = 0;

            Produk::create($produk);

            return redirect()->route('produk.index')->with('success', 'Data Berhasil Tersimpan!');
        } else {
            $produk = $request->all();
            $produk['slug'] = Str::slug($request->nama_produk);
            $produk['views'] = 0;

            Produk::create($produk);

            return redirect()->route('produk.index')->with('success', 'Data Berhasil Tersimpan!');
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
        $produk = Produk::findorfail($id);
        $kategori = KategoriProduk::all();
        $toko = Toko::all();

        return view('AdminDashboard.Produk.produk-edit', compact('produk', 'kategori', 'toko'));
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
            'nama_produk' => 'required|min:3',
            'foto' => 'mimes:png,jpg,jpeg,gif,bmp,webp'
        ]);

        if (empty($request->file('foto'))) {
            $produk = Produk::findorfail($id);
            $produk->update([
                'nama_produk' => $request->nama_produk,
                'slug' => Str::slug($request->nama_produk),
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
                'toko_id' => $request->toko_id,
                'kategori_produk_id' => $request->kategori_produk_id,
                'aktivasi' => $request->aktivasi
            ]);
            return redirect()->route('produk.index')->with('info', 'Data Berhasil Diubah!');
        } else {
            $produk = Produk::findorfail($id);
            Storage::delete($produk->foto);
            $produk->update([
                'nama_produk' => $request->nama_produk,
                'slug' => Str::slug($request->nama_produk),
                'harga' => $request->harga,
                'deskripsi' => $request->deskripsi,
                'toko_id' => $request->toko_id,
                'kategori_produk_id' => $request->kategori_produk_id,
                'aktivasi' => $request->aktivasi,
                'foto' => $request->file('foto')->store('Produk')
            ]);
            return redirect()->route('produk.index')->with('info', 'Data Berhasil Diubah!');
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
        $produk = Produk::findorfail($id);
        if (!$produk) {
            return redirect()->back()->with('success', 'Mohon Maaf Data Ditidak Ada!');
        }

        Storage::delete($produk->foto);
        $produk->delete();

        return redirect()->route('produk.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
