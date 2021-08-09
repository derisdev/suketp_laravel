<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skck extends Model
{
    protected $fillable = ['user_id', 'klarifikasi', 'jenis', 'keterangan', 'kades', 'ttd', 'acc', 'pesan_penolakan', 'nomor', 'nosurat', 'kode'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
