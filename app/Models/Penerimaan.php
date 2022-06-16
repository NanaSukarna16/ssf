<?php

namespace App\Models;

use App\Http\Controllers\ProgramController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Carbon;

class Penerimaan extends Model
{
    use HasFactory;

    protected $table = 'penerimaan';
    protected $xyz = [
        'penerimaan' => 'array'
    ];
    protected $fillable = [
        'reff',
        'tgl',
        'tgl_tf',
        'bukti',
        'nominal',
        'nama_bs',
        'jumlah',
        'users_id',
        'prog_penerimaan_id',
        'grup_id',
        'lembaga_id',
        'rekening_id',
        'donatur_id',
        'groupTo',
        'relasi_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class, 'campaign_id', 'id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'prog_penerimaan_id', 'id');
    }

    public function grup()
    {
        return $this->belongsTo(Grup::class, 'grup_id', 'id');
    }

    public function lembaga()
    {
        return $this->belongsTo(Lembaga::class, 'lembaga_id', 'id');
    }

    public function rekening()
    {
        return $this->belongsTo(Rekening::class, 'rekening_id', 'id');
    }

    public function donatur()
    {
        return $this->belongsTo(Donatur::class, 'donatur_id', 'id');
    }
    public function relasi()
    {
        return $this->belongsTo(Relasi::class, 'relasi_id', 'id');
    }
}
