<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Http\Resources\BeritaResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
     {
     $code = 200;
     $status = true;
     $data = Berita::latest()->get();
     return response()->json([ 'kode : ' . $code , 'status : ' . $status, 'data : ', BeritaResource::collection($data)]);
     }
     /**
      * Store a newly created resource in storage.
      *
      * @param \Illuminate\Http\Request $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
     $validator = Validator::make($request->all(),[
         'judul' => 'required|string|max:255',
         'deskripsi' => 'required',
         'kategori_berita_id' => 'required',
         'gambar_berita' => 'required|mimes:png,jpg,jpeg,gif,bmp',
         'aktivasi' => 'required',
     ]);

     if($validator->fails()){
     return response()->json($validator->errors());
     }

     $berita = Berita::create([
         'judul' => $request->judul,
         'slug' => Str::slug($request->judul),
         'deskripsi' => $request->deskripsi,
         'kategori_berita_id' => $request->kategori_berita_id,
         'user_id' => Auth::id(),
         'gambar_berita' => $request->file('gambar_berita')->store('berita'),
         'aktivasi' => $request->aktivasi,
         'views' => 0,
     ]);


     return response()->json([ 'Berita Berhasil Ditambahkan.', new BeritaResource($berita)]);

    }
     /**
      * Display the specified resource.
      *

     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
     {
     $berita = Berita::find($id);
     if (is_null($berita)) {
     return response()->json('Data not found', 404);
     }
     return response()->json([new BeritaResource($berita)]);
     }

     /**
      * Update the specified resource in storage.
      *
      * @param \Illuminate\Http\Request $request
      * @param int $id
      * @return \Illuminate\Http\Response
      */

    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'judul' => 'required|min:4',
        // ]);
         $validator = Validator::make($request->all(),[
        'judul' => 'required|string|max:255',
        ]);
        if($validator->fails()){
        return response()->json($validator->errors());
        }

        if (empty($request->file('gambar_berita'))) {
            $berita = Berita::findorfail($id);
            $berita->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'slug' => Str::slug($request->judul),
                'kategori_berita_id' => $request->kategori_berita_id,
                'aktivasi' => $request->aktivasi,
                'user_id' => Auth::id(),
                'views' => 0
            ]);
            return response()->json(['Berita Berhasil Diubah.', new BeritaResource($berita)]);
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
                'gambar_berita' => $request->file('gambar_berita')->store('berita'),
                'views' => 0
            ]);
            return response()->json(['Berita Berhasil Diubah.', new BeritaResource($berita)]);
        }
    }

     /**
      * Remove the specified resource from storage.
      *
      * @param int $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
        $berita = Berita::find($id);
        if (is_null($berita)) {
        return response()->json('Data not found', 404);
        }
        Storage::delete($berita->gambar_berita);
        $berita->delete();
        return response()->json('Berita Berhasil Dihapus!');

     }
}
