<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';

    protected $fillable = [
        'nama_produk', 'slug', 'harga', 'deskripsi', 'toko_id', 'kategori_produk_id', 'foto', 'aktivasi', 'views'
    ];

    protected $hidden = [];

    public function kategori_produk()
    {
        return $this->belongsTo(KategoriProduk::class, 'kategori_produk_id', 'id');
    }

    public function toko()
    {
        return $this->belongsTo(Toko::class, 'toko_id', 'id');
    }
}
