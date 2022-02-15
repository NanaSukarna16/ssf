<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;
    protected $table = 'campaign';
    protected $fillable = ['prog_id', 'img', 'detail', 'craeted_at', 'updated_at'];

    public function program()
    {
        return $this->belongsTo(Program::class, 'prog_id', 'id');
    }
}
