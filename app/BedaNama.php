<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BedaNama extends Model
{
    protected $fillable = ['ajuan_id', 'perbedaan', 'dokumen_salah', 'tertulis_salah', 'dokumen_benar', 'tertulis_benar'];

    public function ajuan()
    {
        return $this->belongsTo(Ajuan::class);
    }
}
