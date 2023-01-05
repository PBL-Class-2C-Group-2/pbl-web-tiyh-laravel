<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class KategoriProduk extends Model
{
    use HasFactory;
    protected $table = 'kategori_produk';

    protected $fillable = [
        'nama_kategori', 'slug', 'gambar'
    ];

    protected $hidden = [];

    public function setSlugAttribute($value) {
        $this->attributes['slug'] = Str::slug($value, '-');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
