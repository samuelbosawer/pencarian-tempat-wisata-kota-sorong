<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPenilaian extends Model
{
    public $timestamps = false;


    protected $fillable = [
        'penilaian_id',
        'kriteria_id',
        'skala_penilaian_id',
    ];

    public function penilaian()
    {
        return $this->belongsTo(Penilaian::class);
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class);
    }

    public function skalaPenilaian()
    {
        return $this->belongsTo(SkalaPenilaian::class);
    }
}
