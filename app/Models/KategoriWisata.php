<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriWisata extends Model
{
     public $timestamps = false;
     protected $fillable = [
        'nama_ktg',
    ];

    public function wisata()
{
    return $this->hasMany(Wisata::class);
}
}
