<?php

namespace App\Http\Controllers\Informasi;

use App\Http\Controllers\Controller;
use App\Models\AparaturDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AparaturDesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 5;
        $aparatur = AparaturDesa::paginate($pagination);
        return view('AdminDashboard.AparaturDesa.aparatur', compact('aparatur'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AdminDashboard.AparaturDesa.aparatur-create');
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
            'nama' => 'required|min:3',
            'foto' => 'mimes:png,jpg,jpeg,gif,bmp'
        ]);

        if (!empty($request->file('foto'))) {
            $aparatur = $request->all();
            $aparatur['foto'] = $request->file('foto')->store('aparatur');
            $aparatur['masa_jabatan'] = $request->mulai.' sd '.$request->selesai;

            AparaturDesa::create($aparatur);

            return redirect()->route('aparatur.index')->with('success', 'Data Berhasil Tersimpan!');
        } else {
            $aparatur = $request->all();
            $aparatur['masa_jabatan'] = $request->mulai.' sd '.$request->selesai;

            AparaturDesa::create($aparatur);

            return redirect()->route('aparatur.index')->with('success', 'Data Berhasil Tersimpan!');
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
        $aparatur = AparaturDesa::findorfail($id);
        return view('AdminDashboard.AparaturDesa.aparatur-edit', compact('aparatur'));
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
            'nama' => 'required|min:3',
            'foto' => 'mimes:png,jpg,jpeg,gif,bmp'
        ]);

        if (empty($request->file('foto'))) {
            $aparatur = AparaturDesa::findorfail($id);
            $aparatur->update([
                'nama' => $request->nama,
                'masa_jabatan' => $request->mulai.' sd '.$request->selesai,
                'jabatan' => $request->jabatan
            ]);
            return redirect()->route('aparatur.index')->with('info', 'Data Berhasil Diubah!');
        } else {
            $aparatur = AparaturDesa::findorfail($id);
            Storage::delete($aparatur->foto);
            $aparatur->update([
                'nama' => $request->nama,
                'masa_jabatan' => $request->mulai.' sd '.$request->selesai,
                'jabatan' => $request->jabatan,
                'foto' => $request->file('foto')->store('aparatur')
            ]);
            return redirect()->route('aparatur.index')->with('info', 'Data Berhasil Diubah!');
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
        $aparatur = AparaturDesa::findorfail($id);
        if (!$aparatur) {
            return redirect()->back()->with('success', 'Mohon Maaf Data Ditidak Ada!');
        }

        Storage::delete($aparatur->foto);
        $aparatur->delete();

        return redirect()->route('aparatur.index')->with('success', 'Data Berhasil Dihapus!');
    }
}
