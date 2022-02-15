<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Program extends Model
{
    use HasFactory;
    protected $table = 'prog_penerimaan';
    protected $fillable = [
        'nama',
        'target_jml',
        'keterangan'
    ];
    public function penerimaan()
    {
        return $this->hasMany(Penerimaan::class);
    }

    public function campaign()
    {
        return $this->hasMany(Campaign::class);
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    }
}
