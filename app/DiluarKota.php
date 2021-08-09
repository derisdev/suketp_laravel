<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiluarKota extends Model
{
    protected $fillable = ['ajuan_id'];

    public function ajuan()
    {
        return $this->belongsTo(Ajuan::class);
    }
}
