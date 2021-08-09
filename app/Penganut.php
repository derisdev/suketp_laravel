<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penganut extends Model
{
    protected $fillable = ['ajuan_id', 'organisasi', 'saksi_1', 'agama_sebelumnya', 'dasar_perubahan', 'tanggal_perubahan', 'saksi_2'];

    public function ajuan()
    {
        return $this->belongsTo(Ajuan::class);
    }
}
