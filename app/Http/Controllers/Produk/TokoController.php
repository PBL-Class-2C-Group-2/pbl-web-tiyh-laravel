<?php

namespace App\Http\Controllers\Produk;

use App\Http\Controllers\Controller;
use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 5;
        $toko = Toko::paginate($pagination);
        return view('AdminDashboard.Toko.toko', compact('toko'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminDashboard.Toko.toko-create');
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
            'nama_toko' => 'required|min:5',
            'foto' => 'mimes:png,jpg,jpeg,gif,bmp,webp'
        ]);

        if (!empty($request->file('foto'))) {
            $toko = $request->all();
            $toko['slug'] = Str::slug($request->nama_toko);
            $toko['foto'] = $request->file('foto')->store('Toko');

            Toko::create($toko);

            return redirect()->route('toko.index')->with('success', 'Data Berhasil Tersimpan!');
        } else {
            $toko = $request->all();
            $toko['slug'] = Str::slug($request->nama_toko);

            Toko::create($toko);

            return redirect()->route('toko.index')->with('success', 'Data Berhasil Tersimpan!');
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
        $toko = Toko::findorfail($id);
        return view('AdminDashboard.Toko.toko-edit', compact('toko'));
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
            'nama_toko' => 'required|min:5',
            'foto' => 'mimes:png,jpg,jpeg,gif,bmp,webp'
        ]);

        if (empty($request->file('foto'))) {
            $toko = Toko::findorfail($id);
            $toko->update([
                'nama_toko' => $request->nama_toko,
                'slug' => Str::slug($request->nama_toko),
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat
            ]);
            return redirect()->route('toko.index')->with('info', 'Data Berhasil Diubah!');
        } else {
            $toko = Toko::findorfail($id);
            Storage::delete($toko->foto);
            $toko->update([
                'nama_toko' => $request->nama_toko,
                'slug' => Str::slug($request->nama_toko),
                'no_telp' => $request->no_telp,
                'alamat' => $request->alamat,
                'gambar' => $request->file('foto')->store('Toko')
            ]);
            return redirect()->route('toko.index')->with('info', 'Data Berhasil Diubah!');
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
        $toko = Toko::findorfail($id);
        if (!$toko) {
            return redirect()->back()->with('success', 'Mohon Maaf Data Ditidak Ada!');
        }

        Storage::delete($toko->foto);
        $toko->delete();

        return redirect()->route('toko.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
