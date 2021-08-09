<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domisili extends Model
{
    protected $fillable = ['ajuan_id', 'tanggal'];

    public function ajuan()
    {
        return $this->belongsTo(Ajuan::class);
    }
}
