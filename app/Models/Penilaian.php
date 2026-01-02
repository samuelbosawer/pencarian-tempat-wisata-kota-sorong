<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    public $timestamps = false;

     protected $fillable = [
        'user_id',
        'wisata_id',
        'saran_p',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Wisata
    public function wisata()
    {
        return $this->belongsTo(Wisata::class);
    }

    public function detailPenilaian()
    {
        return $this->hasMany(DetailPenilaian::class);
    }


}
