<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{

    public $timestamps = false;

     protected $fillable = [
        'nama_w',
        'gambar_w',
        'desk_w',
        'user_id',
        'kategori_wisata_id',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Kategori Wisata
    public function kategoriWisata()
    {
        return $this->belongsTo(KategoriWisata::class);
    }

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class);
    }
}
