<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BatalMenganut extends Model
{
    protected $fillable = ['ajuan_id', 'organisasi', 'agama_baru', 'dasar_perubahan', 'tanggal_perubahan'];

    public function ajuan()
    {
        return $this->belongsTo(Ajuan::class);
    }
}
