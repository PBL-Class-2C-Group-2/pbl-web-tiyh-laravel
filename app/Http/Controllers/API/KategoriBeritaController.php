<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\KategoriBeritaResource;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class KategoriBeritaController extends Controller
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
    $data = KategoriBerita::latest()->get();
    return response()->json([ 'kode : ' . $code , 'status : ' . $status, 'data : ', KategoriBeritaResource::collection($data)]);
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
        'nama_kategori' => 'required|string|max:255'
    ]);
    if($validator->fails()){
    return response()->json($validator->errors());
    }

    $kategori = KategoriBerita::create([
        'nama_kategori' => $request->nama_kategori,
        'slug' => Str::slug($request->nama_kategori)
    ]);


    return response()->json([ 'Kategori Berita Berhasil Ditambahkan.', new
    KategoriBeritaResource($kategori)]);
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
    $kategori = KategoriBerita::find($id);
    if (is_null($kategori)) {
    return response()->json('Data not found', 404);
    }
    return response()->json([new KategoriBeritaResource($kategori)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KategoriBerita $kategori)
    {
    $validator = Validator::make($request->all(),[
        'nama_kategori' => 'required|string|max:255'
    ]);
    if($validator->fails()){
    return response()->json($validator->errors());
    }

        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->slug = Str::slug($request -> nama_kategori);
        $kategori->save();

    return response()->json(['Kategori Berita Berhasil Diubah.', new
    KategoriBeritaResource($kategori)]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriBerita $kategori)
    {
    $kategori->delete();
    return response()->json('Kategori Berita Berhasil Dihapus!');
    }
}
