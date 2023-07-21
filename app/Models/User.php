<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function adminDetail()
    {
        return $this->hasOne(AdminDetail::class);
    }

    public function wargaDetail()
    {
        return $this->hasOne(WargaDetail::class);
    }

    public function suratKtp()
    {
        return $this->hasMany(SuratKtp::class);
    }

    public function suratKk()
    {
        return $this->hasMany(SuratKk::class);
    }

    public function suratSktm()
    {
        return $this->hasMany(SuratSktm::class);
    }
}
