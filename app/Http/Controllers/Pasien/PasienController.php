<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Requests\Pasien\PasienRequest;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Perjanjian;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Obat;
use Illuminate\Support\Facades\App;
use PDF;

class PasienController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  // Di dalam controller, pastikan Anda melewatkan data ke tampilan dengan menggunakan variabel $pasiens
public function index()
{
    // Ambil data pasien dari database
    $pasiens = Perjanjian::with('pasien')->where('pasien_id', Auth::user()->id)->get();

    // Kirim data ke view
    return view('pasien.index', ['pasiens' => $pasiens]);
}


   /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $dokter = Dokter::all();
    $data  = [
      'dokters' => $dokter
    ];
    return view('pasien.create', $data);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(PasienRequest $request)
  {
      $validatedData = $request->all();
      // Debugging data yang diterima
      //dd($validatedData);

      $validatedData['tgl_datang'] = Carbon::now();
      Pasien::create($validatedData);

      return redirect()->route('dokter.index')->with('success', 'Pasien berhasil ditambahkan');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Pasien  $pasien
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $pasien = Perjanjian::find($id);
    $data = [
      'pasien' => $pasien
    ];
    return view('dokter.show', $data);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Pasien  $pasien
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    // dd($id);
    $dokters = Dokter::all();
    $obats = Obat::all();
    $model = Perjanjian::find($id);
    $data = [
      'model' => $model,
      'obats' => $obats,
      'dokters' => $dokters
    ];
    return view('dokter.edit', $data);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Pasien  $pasien
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    // $validatedData = $request->all();
    // $validatedData['tgl_datang'] = $pasien->tgl_datang;
    // // return $validatedData;
    // $pasien->update($validatedData);
// dd($request->post());
    $model = Perjanjian::find($id);
    $model->dokter_id = $request->dokter_id;
    $model->keluhan_pasien = $request->keluhan_pasien;
    $model->obat_id = $request->obat_id;
    $model->save();
    return redirect()->route('dokter.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Pasien  $pasien
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $perjanjian = Perjanjian::find($id)->delete();
    return redirect()->route('pasien.index');
  }

  public function generatePDF(Pasien $pasien)
  {
    $dataPasien = Pasien::with('dokter')->where('nama_pasien', $pasien->nama_pasien)->get();
    $data = [
      'pasiens' => $dataPasien
    ];
    return view('cetak-pasien', $data);
    dd($dataPasien);
    $data = $dataPasien;
    view()->share('pasiens', $data);
    $pdf = PDF::loadView('cetak-pasien', $data);
    return $pdf->download($pasien->nama_pasien . '.pdf');
  }
}
