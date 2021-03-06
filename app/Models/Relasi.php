<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relasi extends Model
{
    use HasFactory;

    protected $table = 'relasi';
    protected $fillable = ['nama'];
    public function penerimaan()
    {
        return $this->hasMany(Penerimaan::class);
    }
}
