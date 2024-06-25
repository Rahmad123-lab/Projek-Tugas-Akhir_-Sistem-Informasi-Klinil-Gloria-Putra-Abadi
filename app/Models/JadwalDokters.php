<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalDokters extends Model
{
    protected $fillable = ['nama_dokter', 'spesialisasi', 'hari', 'jam_praktek', 'dokter_id'];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }
}
