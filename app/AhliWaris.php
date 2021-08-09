<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AhliWaris extends Model
{
    protected $fillable = ['ajuan_id', 'hubungan', 'nama_pewaris', 'kejadian', 'tanggal'];

    public function ajuan()
    {
        return $this->belongsTo(Ajuan::class);
    }
}
