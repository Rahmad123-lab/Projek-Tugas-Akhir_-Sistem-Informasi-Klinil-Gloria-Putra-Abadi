<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalDokters extends Model
{
    use HasFactory;

    protected $fillable = [
        'dokter_id',
        'nama_dokter',
        'spesialisasi',
        'hari_praktek',
        'jam_praktek',
    ];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }
}
