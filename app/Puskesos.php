<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puskesos extends Model
{
    protected $fillable = ['user_id', 'jenis', 'keperluan', 'keterangan', 'kades', 'ttd', 'acc', 'pesan_penolakan', 'nomor', 'nosurat', 'kode'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
