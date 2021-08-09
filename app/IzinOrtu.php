<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IzinOrtu extends Model
{
    protected $fillable = ['ajuan_id', 'hubungan', 'nama', 'nik', 'tempat_lahir', 'tanggal_lahir'];

    public function ajuan()
    {
        return $this->belongsTo(Ajuan::class);
    }
}
