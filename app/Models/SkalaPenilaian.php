<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkalaPenilaian extends Model
{
    public $timestamps = false;
    
    protected $fillable = [
        'nama_s',
        'nilai_s',
    ];

    public function detailPenilaian()
    {
        return $this->hasMany(DetailPenilaian::class);
    }
}
