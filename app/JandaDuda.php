<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JandaDuda extends Model
{
    protected $fillable = ['ajuan_id', 'janda_duda', 'pasangan', 'kepemilikan'];

    public function ajuan()
    {
        return $this->belongsTo(Ajuan::class);
    }
}
