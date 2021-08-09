<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sktb extends Model
{
    protected $fillable = ['user_id', 'jenis', 'keterangan', 'kades', 'ttd', 'acc', 'pesan_penolakan', 'nomor', 'nosurat', 'kode', 'pemilik', 'memiliki', 'akta', 'no_akta', 'blok', 'no_personil', 'no_kohir', 'no_shm', 'no_nib', 'no_surat_ukur', 'lokasi', 'luas', 'luas_persegi', 'harga', 'harga_terbilang', 'total_harga_tanah', 'nominal_bangunan', 'terbilang_bangunan', 'total_harga', 'utara', 'barat', 'selatan', 'timur', 'keperluan'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
