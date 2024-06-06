<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
        protected $fillable = [
        'nama_dokter', 'spesialisasi', 'alamat', 'id_user', 
    ];

    public function pasiens()
    {
        return $this->hasMany(Pasien::class, 'dokter_id');
    }

    public function perjanjian()
    {
        return $this->hasMany(Perjanjian::class, 'dokter_id');
    }

    public function jadwal()
    {
        return $this->hasMany(JadwalDokterNew::class, 'dokter_id');
    }
}
