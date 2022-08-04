<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tentang extends Model
{
    use HasFactory;
    protected $table = 'tentang';

    public function profil()
    {
        return $this->hasMany(Profil::class);
    }

    public function visi()
    {
        return $this->hasMany(Visi::class);
    }

    public function struktur()
    {
        return $this->hasMany(Struktur::class);
    }

    public function nazhir()
    {
        return $this->hasMany(Nazhir::class);
    }
}
