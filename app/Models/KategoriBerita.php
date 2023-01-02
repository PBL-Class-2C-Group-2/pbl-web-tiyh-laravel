<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class KategoriBerita extends Model
{
    use HasFactory;
    protected $table = 'kategori_berita';

    protected $fillable = [
        'nama_kategori', 'slug'
    ];

    protected $hidden = [];

    public function setSlugAttribute($value) {
        $this->attributes['slug'] = Str::slug($value, '-');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function berita() {
        return $this->hasMany(Berita::class, 'kategori_berita_id', 'id');
    }
}
