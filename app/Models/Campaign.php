<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    protected $table = 'campaign';
    protected $fillable = ['video', 'nama', 'target_jumlah', 'waktu', 'prog_id', 'img', 'detail', 'craeted_at', 'updated_at'];

    public function program()
    {
        return $this->belongsTo(Program::class, 'prog_id', 'id');
    }

    public function penerimaan()
    {
        return $this->hasMany(Penerimaan::class);
    }
}
