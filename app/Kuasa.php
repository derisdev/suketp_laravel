<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kuasa extends Model
{
    protected $fillable = ['ajuan_id', 'nama', 'nik', 'umur', 'pekerjaan', 'alamat', 'desa', 'kecamatan'];

    public function ajuan()
    {
        return $this->belongsTo(Ajuan::class);
    }
}
