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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        $dokter = $user->dokter;
        $filter = $request->query('filter');

        if ($user->role === 'admin') {
            if ($filter == 'selesai') {
                $perjanjians = Perjanjian::where('status', 'selesai')->get();
            } elseif ($filter == 'batal') {
                $perjanjians = Perjanjian::where('status', 'batal')->get();
            } else {
                $perjanjians = Perjanjian::all();
            }
        } elseif ($dokter) {
            if ($filter == 'selesai') {
                $perjanjians = Perjanjian::where('dokter_id', $dokter->id)->where('status', 'selesai')->get();
            } elseif ($filter == 'batal') {
                $perjanjians = Perjanjian::where('dokter_id', $dokter->id)->where('status', 'batal')->get();
            } else {
                $perjanjians = Perjanjian::where('dokter_id', $dokter->id)->get();
            }
        } else {
            if ($filter == 'selesai') {
                $perjanjians = Perjanjian::where('pasien_id', $user->id)->where('status', 'selesai')->get();
            } elseif ($filter == 'batal') {
                $perjanjians = Perjanjian::where('pasien_id', $user->id)->where('status', 'batal')->get();
            } else {
                $perjanjians = Perjanjian::where('pasien_id', $user->id)->get();
            }
        }

        return view('pasien.index', compact('perjanjians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Logic to show the form for creating appointments
        return view('perjanjian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'umur' => 'required|integer',
            'nik' => 'required|string|max:255',
            'jenis_kelamin' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'nama_dokter' => 'required|exists:dokters,id',
            'spesialisasi_dokter' => 'required|string',
            'waktu_perjanjian' => 'required|string',
        ]);

        $dokter = Dokter::findOrFail($request->nama_dokter);

        $perjanjian = new Perjanjian([
            'nama_pasien' => $validatedData['nama'],
            'pasien_id' => auth()->id(),
            'dokter_id' => $request->nama_dokter,
            'nama_dokter' => $dokter->nama_dokter,
            'spesialisasi_dokter' => $dokter->spesialisasi_dokter,
            'waktu_perjanjian' => $validatedData['waktu_perjanjian'],
            'umur_pasien' => $validatedData['umur'],
            'alamat_pasien' => $validatedData['alamat'],
            'tanggal_lahir_pasien' => $validatedData['tanggal_lahir'],
            'jenis_kelamin_pasien' => $validatedData['jenis_kelamin'],
        ]);

        $perjanjian->save();

        return redirect()->route('pasien.index')->with('success', 'Perjanjian berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $perjanjian = Perjanjian::findOrFail($id);
        // Assuming 'resep_obat' is an array field in your database for prescription IDs
        $obat = Obat::whereIn('id', $perjanjian->resep_obat)->get();

        return view('pasien.show', compact('perjanjian', 'obat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perjanjian = Perjanjian::findOrFail($id);

        return view('perjanjian.edit', compact('perjanjian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Perjanjian $perjanjian
     * @return \Illuminate\Http\Response
     */
    public function update(PerjanjianRequest $request, Perjanjian $perjanjian)
    {
        $validatedData = $request->validated();

        $perjanjian->update($validatedData);

        return redirect()->route('pasien.index')->with('success', 'Perjanjian berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Perjanjian $perjanjian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Perjanjian $perjanjian)
    {
        $perjanjian->update(['status' => 'batal']);

        return redirect()->route('pasien.index')->with('success', 'Perjanjian berhasil dibatalkan.');
    }
}
