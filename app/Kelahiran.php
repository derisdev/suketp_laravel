<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelahiran extends Model
{
    protected $fillable = ['user_id', 'jenis', 'keterangan', 'kades', 'ttd', 'acc', 'pesan_penolakan', 'nomor', 'nosurat', 'kode', 'hari', 'tanggal', 'tempat', 'pukul', 'jk_anak', 'anak_ke', 'nama_anak', 'nama_ibu', 'umur_ibu', 'agama_ibu', 'pekerjaan_ibu', 'alamat_ibu', 'nama_ayah', 'umur_ayah', 'agama_ayah', 'pekerjaan_ayah', 'alamat_ayah'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
