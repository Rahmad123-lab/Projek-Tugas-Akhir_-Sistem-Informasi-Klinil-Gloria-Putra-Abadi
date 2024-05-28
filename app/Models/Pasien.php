<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
  use HasFactory;
  protected $guarded = ['id'];
  public $timestamps = true;
    protected $fillable = [
    'nama_pasien',
    'nama_dokter',
    'spesialiasi_dokter',
    'id_dokter',
    'waktu_perjanjian',
    'pasien_id',
  ];


  public function dokter()
  {
    return $this->belongsTo(Dokter::class);
  }
  public function obats()
  {
    return $this->hasMany(Obat::class);
  }
}
