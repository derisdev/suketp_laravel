<?php

namespace App;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'nik', 'no_kk', 'ttl', 'agama', 'jk', 'status', 'ibu', 'ayah', 'pendidikan', 'pekerjaan', 'rt', 'rw', 'alamat', 'kewarganegaraan', 'password', 'status_verifikasi', 'telp', 'penghasilan', 'pasfoto', 'fotoktp', 'fotokk', 'status_lengkap', 'status_user',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function ajuans()
    {
        return $this->hasMany(Ajuan::class);
    }

    public function kelahiran()
    {
        return $this->hasMany(Kelahiran::class);
    }

    public function puskesos()
    {
        return $this->hasMany(Puskesos::class);
    }

    public function sktb()
    {
        return $this->hasMany(Sktb::class);
    }

    public function sku()
    {
        return $this->hasMany(Sku::class);
    }

    public function sktm()
    {
        return $this->hasMany(Sktm::class);
    }

    public function skck()
    {
        return $this->hasMany(Skck::class);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
