<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Toko extends Model
{
    use HasFactory;
    protected $table = 'toko';

    protected $fillable = [
        'nama_toko', 'slug', 'no_telp', 'alamat', 'foto'
    ];

    protected $hidden = [];

    public function setSlugAttribute($value) {
        $this->attributes['slug'] = Str::slug($value, '-');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function toko_desa() {
        return $this->hasMany(Produk::class, 'toko_id', 'id');
    }
}
