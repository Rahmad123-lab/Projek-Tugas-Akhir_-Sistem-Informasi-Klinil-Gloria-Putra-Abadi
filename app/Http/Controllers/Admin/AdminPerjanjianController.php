<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Dokter;
use App\Models\Perjanjian;
use App\Models\Pasien;
use Illuminate\Support\Facades\Auth;

class AdminPerjanjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perjanjians = Perjanjian::all(); // Fetch all perjanjian data

        return view('admin.perjanjian.index', compact('perjanjians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dokters = Dokter::all(); // Fetch all dokters data

        return view('admin.perjanjian.create', ['dokters' => $dokters]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
            'pasien_id' => null, // Set to null for admin-created appointments
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

        // Redirect to the index page with success message
        return redirect()->route('admin.perjanjian.index')->with('success', 'Perjanjian berhasil dibuat');
    }
}
