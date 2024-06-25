<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Perjanjian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */
  public function index()
{
    $pasien = Pasien::count();
    $dokter = Dokter::count();
    $obat = Obat::count();

    $user = Auth::user();
    if ($user->role == 'dokter') {
        $perjanjians = Perjanjian::where('nama_dokter', $user->name)->get();
    } else {
        $perjanjians = Perjanjian::all();
    }

    $data = [
      'pasien' => $pasien,
      'dokter' => $dokter,
      'obat' => $obat,
      'perjanjians' => $perjanjians
    ];
    if ($user->role == 'pasien') {
        return view('home_pasien', $data);
    } else {
        return view('home', $data);
    }
}

}
