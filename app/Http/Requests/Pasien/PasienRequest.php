<?php

namespace App\Http\Requests\Pasien;

use Illuminate\Foundation\Http\FormRequest;

class PasienRequest extends FormRequest
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
      'umur' => 'required|integer|min:0',
      'tanggal_lahir' => 'required|date',
      'alamat' => 'required|string|max:255',
      'nik' => 'required|string|max:16',
      'jenis_kelamin' => 'required|string|in:Laki-laki,Perempuan',
      'telepon' => 'required|string|max:15',
    ];
  }
}
