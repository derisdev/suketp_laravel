<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ajuan extends Model
{
    protected $fillable = ['user_id', 'jenis', 'keterangan', 'kades', 'ttd', 'acc', 'pesan_penolakan', 'nomor', 'nosurat', 'kode'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function izinKeramaian()
    {
        return $this->hasOne(IzinKeramaian::class);
    }

    public function penganut()
    {
        return $this->hasOne(Penganut::class);
    }

    public function batalMenganut()
    {
        return $this->hasOne(BatalMenganut::class);
    }

    public function domisili()
    {
        return $this->hasOne(Domisili::class);
    }

    public function kuasa()
    {
        return $this->hasOne(Kuasa::class);
    }

    public function bedaNama()
    {
        return $this->hasOne(BedaNama::class);
    }

    public function ahliWaris()
    {
        return $this->hasOne(AhliWaris::class);
    }

    public function tidakKerja()
    {
        return $this->hasOne(TidakKerja::class);
    }

    public function izinOrtu()
    {
        return $this->hasOne(IzinOrtu::class);
    }

    public function diluarKota()
    {
        return $this->hasOne(DiluarKota::class);
    }

    public function kebakaran()
    {
        return $this->hasOne(Kebakaran::class);
    }

    public function jandaDuda()
    {
        return $this->hasOne(JandaDuda::class);
    }

    public function serbaguna()
    {
        return $this->hasOne(Serbaguna::class);
    }

    public function sk()
    {
        return $this->hasOne(Sk::class);
    }

    public function kehilangan()
    {
        return $this->hasOne(Kehilangan::class);
    }

    public function ktpExpire()
    {
        return $this->hasOne(KtpExpire::class);
    }

    public function penghasilan()
    {
        return $this->hasOne(Penghasilan::class);
    }

    public function belumMenikah()
    {
        return $this->hasOne(BelumMenikah::class);
    }
}
