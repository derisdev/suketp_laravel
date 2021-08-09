<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
    protected $fillable = ['user_id', 'nama_usaha', 'alamat_usaha', 'user_id', 'jenis', 'keterangan', 'kades', 'ttd', 'acc', 'pesan_penolakan', 'nomor', 'nosurat', 'kode'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
