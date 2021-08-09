<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serbaguna extends Model
{
    protected $fillable = ['ajuan_id', 'isi'];

    public function ajuan()
    {
        return $this->belongsTo(Ajuan::class);
    }
}
