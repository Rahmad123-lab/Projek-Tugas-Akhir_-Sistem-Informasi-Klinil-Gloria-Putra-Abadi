<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perjanjian extends Model
{
    use HasFactory;

    protected $guarded = ['id']; // Kolom 'id' dilindungi dari penugasan massal

    protected $fillable = [
        'nama_pasien',
        'pasien_id',
        'dokter_id',
        'apoteker_id',
        'nama_dokter',
        'spesialisasi_dokter',
        'waktu_perjanjian',
        'umur_pasien',
        'alamat_pasien',
        'riwayat_alergi',
        'tanggal_pemeriksaan',
        'keluhan_pasien',
        'diagnosa_pasien',
        'terapis',
        'resep_obat',
    ];

    public function pasien()
{
    return $this->belongsTo(Pasien::class, 'pasien_id');
}


    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }

    public function apoteker()
    {
        return $this->belongsTo(Apoteker::class, 'apoteker_id');
    }
}
