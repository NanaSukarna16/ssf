<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nazhir extends Model
{
    use HasFactory;
    protected $table = 'nazhir';
      
    public function tentang()
    {
        return $this->belongsTo(Tentang::class);
    }
}
