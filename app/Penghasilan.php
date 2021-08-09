<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penghasilan extends Model
{
    protected $fillable = ['ajuan_id', 'besar'];

    public function ajuan()
    {
        return $this->belongsTo(Ajuan::class);
    }
}
