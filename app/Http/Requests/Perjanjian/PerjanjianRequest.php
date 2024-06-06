<?php

namespace App\Http\Requests\Perjanjian;

use Illuminate\Foundation\Http\FormRequest;

class PerjanjianRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize()
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules()
  {
    return [
      'nama_pasien' => 'required|string|max:255',
      'pasien_id' => 'required|exists:pasiens,id',
      'dokter_id' => 'required|exists:dokters,id',
      'nama_dokter' => 'required|string|max:255',
      'spesialiasi_dokter' => 'required|string|max:255',
      'waktu_perjanjian' => 'required|string|max:255',
      'umur_pasien' => 'required|integer',
      'alamat_pasien' => 'required|string|max:255',
      'tanggal_pemeriksaan' => 'required|date',
      'keluhan' => 'required|string|max:255',
    ];
  }
}
