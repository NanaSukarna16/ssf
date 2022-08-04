<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Struktur extends Model
{
    use HasFactory;
    protected $table = 'struktur';
      
    public function tentang()
    {
        return $this->belongsTo(Tentang::class);
    }
}
