<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kebakaran extends Model
{
    protected $fillable = ['ajuan_id', 'barang', 'tanggal'];

    public function ajuan()
    {
        return $this->belongsTo(Ajuan::class);
    }
}
