<?php

namespace App\Models;

use Carbon\Carbon as CarbonCarbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Grup extends Model
{
    use HasFactory;
    protected $table = 'grup';
    protected $fillable = ['nama', 'craeted_at', 'updated_at'];

    public function penerimaan()
    {
        return $this->hasMany(Penerimaan::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    }
}
