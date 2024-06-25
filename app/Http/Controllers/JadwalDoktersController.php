<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\JadwalDokters;

class JadwalDoktersController extends Controller
{
    public function index()
    {
        $jadwalDokter = JadwalDokters::all();
        if (Auth::check() && Auth::user()->role == 'admin') {
            return view('admin.jadwal.index', compact('jadwalDokter'));
        } else {
            return view('frontend.jadwaldokter', compact('jadwalDokter'));
        }
    }

    public function create()
    {
        $listDokter = Dokter::all(); // Assuming 'Dokter' is your model for doctors
        return view('admin.jadwal.create', compact('listDokter'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama_dokter' => 'required',
            'spesialisasi' => 'required',
            'hari' => 'required',
            'jam_praktek' => 'required',
        ]);

        // Assuming you want to associate the schedule with the logged-in user (assuming it's a dokter)
        $dokterId = Auth::id(); // This retrieves the ID of the logged-in user

        JadwalDokters::create([
            'nama_dokter' => $request->nama_dokter,
            'spesialisasi' => $request->spesialisasi,
            'hari' => $request->hari,
            'jam_praktek' => $request->jam_praktek,
            'dokter_id' => $dokterId, // Assign the dokter_id here
        ]);

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal dokter berhasil ditambahkan');
    }




    public function edit($id)
    {
        $jadwalDokter = JadwalDokters::findOrFail($id);
        return view('admin.jadwal.edit', compact('jadwalDokter'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_dokter' => 'required',
            'spesialisasi' => 'required',
            'hari' => 'required',
            'jam_praktek' => 'required',
        ]);

        $jadwalDokter = JadwalDokters::findOrFail($id);
        $jadwalDokter->update($request->all());

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal dokter berhasil diperbarui');
    }
    public function destroy($id)
    {
        $jadwalDokter = JadwalDokters::findOrFail($id);
        $jadwalDokter->delete();

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal dokter berhasil dihapus');
    }
}
