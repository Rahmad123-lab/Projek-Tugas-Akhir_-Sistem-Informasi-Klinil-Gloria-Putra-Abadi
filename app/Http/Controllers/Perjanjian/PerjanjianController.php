<?php

namespace App\Http\Controllers\Perjanjian;

use App\Models\Perjanjian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Perjanjian\PerjanjianRequest;
use App\Models\Dokter;

class PerjanjianController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $dokter = Dokter::find($request->nama_dokter);
    $model = new Perjanjian();
    $model->nama_pasien = $request->nama_pasien;
    $model->pasien_id = $request->pasien_id;
    $model->id_dokter = $request->nama_dokter;
    $model->nama_dokter = $dokter->nama_dokter;
    $model->spesialiasi_dokter = $request->spesialiasi_dokter;
    $model->waktu_perjanjian = $request->waktu_perjanjian;
    $model->save();
    // dd($request->post());
    // $validdatedData = $request->all();
    // $perjanjian = Perjanjian::create($validdatedData);
    return redirect()->route('pasien.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Perjanjian  $perjanjian
   * @return \Illuminate\Http\Response
   */
  public function show(Perjanjian $perjanjian)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Perjanjian  $perjanjian
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    dd($id);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Perjanjian  $perjanjian
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Perjanjian $perjanjian)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Perjanjian  $perjanjian
   * @return \Illuminate\Http\Response
   */
  public function destroy(Perjanjian $perjanjian)
  {
    //
  }
}
