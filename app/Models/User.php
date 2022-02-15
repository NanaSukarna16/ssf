<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nama',
        'grup_id',
        'hp',
        'ktp',
        'tmptlhr',
        'tgllhr',
        'jk',
        'alamat',
        'kelurahan',
        'kecamatan',
        'kota',
        'provinsi',
        'kdpos',
        'negara',
        'email',
        'role',
        'status',
        'password',
        'email',
        'created_at',
        'updated_at'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function penerimaan()
    {
        return $this->hasMany(Penerimaan::class);
    }

    public function grup()
    {
        return $this->belongsTo(Grup::class);
    }
    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    }
}
