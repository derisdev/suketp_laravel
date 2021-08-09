<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IzinKeramaian extends Model
{
    protected $fillable = ['ajuan_id', 'hari', 'tanggal', 'tempat'];

    public function ajuan()
    {
        return $this->belongsTo(Ajuan::class);
    }
}
