<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Berita;
use App\Http\Resources\BeritaResource;


class BeritaController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get berita
        $berita = Berita::latest()->paginate(5);

        //return collection of berita as a resource
        return new BeritaResource(true, 'List Data Berita Desa', $berita);
    }
}
