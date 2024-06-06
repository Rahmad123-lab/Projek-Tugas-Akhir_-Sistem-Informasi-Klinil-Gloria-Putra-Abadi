<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalDokterNew;
use App\Models\Dokter;

class JadwalDokterController extends Controller
{
    public function index()
    {
        $jadwals = JadwalDokterNew::with('dokter')->get();
        return view('jadwal.index', compact('jadwals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'dokter_id' => 'required|exists:dokters,id',
            'hari' => 'required|string',
            'jam_mulai' => 'required|string',
            'jam_selesai' => 'required|string',
        ]);

        JadwalDokterNew::create($request->all());

        return redirect()->back()->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $jadwal = JadwalDokterNew::findOrFail($id);
        $request->validate([
            'dokter_id' => 'required|exists:dokters,id',
            'hari' => 'required|string',
            'jam_mulai' => 'required|string',
            'jam_selesai' => 'required|string',
        ]);

        $jadwal->update($request->all());

        return redirect()->back()->with('success', 'Jadwal berhasil diupdate');
    }

    public function destroy($id)
    {
        $jadwal = JadwalDokterNew::findOrFail($id);
        $jadwal->delete();

        return redirect()->back()->with('success', 'Jadwal berhasil dihapus');
    }
}
