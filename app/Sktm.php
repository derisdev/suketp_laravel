<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sktm extends Model
{
    protected $fillable = ['user_id', 'nama_anak', 'nik_anak', 'tanggal_lahir', 'tempat_lahir', 'jk_anak', 'sekolah', 'kelas', 'jenis', 'keterangan', 'kades', 'ttd', 'acc', 'pesan_penolakan', 'nomor', 'nosurat', 'kode'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
