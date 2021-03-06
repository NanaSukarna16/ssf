<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Donatur extends Model
{
    use HasFactory;
    protected $table = 'donatur';
    protected $fillable = ['nama','hp','email', 'craeted_at', 'updated_at'];

    public function penerimaan()
    {
        return $this->hasMany(Penerimaan::class);
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    }
}
