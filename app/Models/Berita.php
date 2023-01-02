<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $fillable = [
        'judul', 'slug', 'deskripsi', 'kategori_berita_id', 'user_id', 'gambar_berita', 'aktivasi', 'views'
    ];

    protected $hidden = [];

    public function kategori_berita()
    {
        return $this->belongsTo(KategoriBerita::class, 'kategori_berita_id', 'id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


}
