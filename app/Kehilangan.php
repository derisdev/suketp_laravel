<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kehilangan extends Model
{
    protected $fillable = ['ajuan_id', 'barang', 'lokasi', 'tanggal'];

    public function ajuan()
    {
        return $this->belongsTo(Ajuan::class);
    }
}
