<?php

namespace App\Http\Controllers\Perjanjian;

use App\Models\Perjanjian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Perjanjian\PerjanjianRequest;
use App\Models\Dokter;
use App\Models\Obat;

class PerjanjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
    // Ambil dokter yang sedang login
    $user = auth()->user();
    $dokter = $user->dokter;

    // Ambil semua perjanjian yang terkait dengan dokter yang sedang login
    if ($dokter) {
        $perjanjians = Perjanjian::where('dokter_id', $dokter->id)->get();
    } else {
        // Jika bukan dokter yang login, tampilkan semua perjanjian atau sesuai dengan logika lain
        $perjanjians = Perjanjian::all();
    }

    // Kirim data perjanjian ke tampilan
    return view('pasien.index', compact('perjanjians'));
}



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Logika untuk menampilkan form pembuatan perjanjian
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'umur' => 'required|integer',
            'nik' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'nama_dokter' => 'required|exists:dokters,id',
            'spesialiasi_dokter' => 'required|string',
            'waktu_perjanjian' => 'required|string',
        ]);

        $dokter = Dokter::find($request->nama_dokter);

        $perjanjian = new Perjanjian([
            'nama_pasien' => $request->nama,
            'pasien_id' => $request->pasien_id,
            'dokter_id' => $request->nama_dokter,
            'nama_dokter' => $dokter->nama_dokter,
            'spesialiasi_dokter' => $dokter->spesialisasi_dokter,
            'waktu_perjanjian' => $request->waktu_perjanjian,
            'umur_pasien' => $request->umur,
            'alamat_pasien' => $request->alamat,
            'tanggal_lahir_pasien' => $request->tanggal_lahir,
            'jenis_kelamin_pasien' => $request->jenis_kelamin,
        ]);

        $perjanjian->save();

        return redirect()->route('pasien.index')->with('success', 'Perjanjian berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Perjanjian  $perjanjian
     * @return \Illuminate\Http\Response
     */
    public function show(Perjanjian $perjanjian)
    {
        $perjanjian = Perjanjian::findOrFail();
        $obat = Obat::find($perjanjian->resep_obat);
        return view('pasien.index', compact('perjanjian', 'obat'));
        // Logika untuk menampilkan detail perjanjian
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Ambil data perjanjian berdasarkan id
        $perjanjian = Perjanjian::findOrFail($id);

        // Kirim data perjanjian ke tampilan untuk diedit
        return view('admin-pasien.edit', compact('perjanjian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Perjanjian  $perjanjian
     * @return \Illuminate\Http\Response
     */
    public function update(PerjanjianRequest $request, Perjanjian $perjanjian)
    {
        // Validasi data yang diterima melalui objek Request
        $validatedData = $request->validated();

        // Update data perjanjian
        $perjanjian->update($validatedData);
        $perjanjian->keluhan = $request->keluhan;

        return redirect()->route('pasien.index')->with('success', 'Perjanjian berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Perjanjian  $perjanjian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perjanjian $perjanjian)
    {
        // Hapus perjanjian dari database
        $perjanjian->delete();

        return redirect()->route('pasien.index')->with('success', 'Perjanjian berhasil dihapus.');
    }
}
