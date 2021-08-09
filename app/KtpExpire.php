<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KtpExpire extends Model
{
    protected $fillable = ['ajuan_id', 'noblanko', 'masa'];

    public function ajuan()
    {
        return $this->belongsTo(Ajuan::class);
    }
}
