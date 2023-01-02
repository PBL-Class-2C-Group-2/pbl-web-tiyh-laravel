<?php

namespace App\Http\Controllers\Informasi;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paggination = 10;
        $galeri = Galeri::paginate($paggination);

        return view('AdminDashboard.Galeri.galeri', compact('galeri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminDashboard.Galeri.galery-create');
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
            'foto_galeri' => 'mimes:png,jpg,jpeg,gif,bmp,webp'
        ]);

        if (!empty($request->file('foto_galeri'))) {
            $galeri = $request->all();
            $galeri['foto_galeri'] = $request->file('foto_galeri')->store('galeri');

            Galeri::create($galeri);

            return redirect()->route('galeri.index')->with('success', 'Data Berhasil Tersimpan!');
        } else {
            $galeri = $request->all();

            Galeri::create($galeri);

            return redirect()->route('galeri.index')->with('success', 'Data Berhasil Tersimpan!');
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
        $galeri = Galeri::findorfail($id);

        return view('AdminDashboard.Galeri.galeri-edit', compact('galeri'));
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
            'foto_galeri' => 'mimes:png,jpg,jpeg,gif,bmp,webp'
        ]);

        if (empty($request->file('foto_galeri'))) {
            $galeri = Galeri::findorfail($id);
            $galeri->update([
                'keterangan' => $request->keterangan,
            ]);
            return redirect()->route('galeri.index')->with('info', 'Data Berhasil Diubah!');
        } else {
            $galeri = Galeri::findorfail($id);
            Storage::delete($galeri->foto_galeri);
            $galeri->update([
                'keterangan' => $request->keterangan,
                'foto_galeri' => $request->file('foto_galeri')->store('galeri')
            ]);
            return redirect()->route('galeri.index')->with('info', 'Data Berhasil Diubah!');
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
        $galeri = Galeri::findorfail($id);
        if (!$galeri) {
            return redirect()->back()->with('success', 'Mohon Maaf Data Ditidak Ada!');
        }

        Storage::delete($galeri->foto_galeri);
        $galeri->delete();

        return redirect()->route('galeri.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
