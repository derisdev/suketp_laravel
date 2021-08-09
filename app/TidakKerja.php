<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TidakKerja extends Model
{
    protected $fillable = ['ajuan_id', 'alasan', 'hari', 'tanggal', 'perusahaan'];

    public function ajuan()
    {
        return $this->belongsTo(Ajuan::class);
    }
}
