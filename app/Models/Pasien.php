<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $guarded = ['id'];
    public $timestamps = true;
    use HasFactory;

    protected $fillable = [
        'nama_pasien', 'alamat_pasien', 'nik', 'tgl_datang', 'keluhan_pasien', 'diagnosa_pasien', 'dokter_id', 'resep_obat'
    ];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'resep_obat');
    }

    public function perjanjian()
    {
        return $this->hasMany(Perjanjian::class, 'pasien_id');
    }
}
