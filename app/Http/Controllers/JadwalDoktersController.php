<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use App\Models\JadwalDokters;

class JadwalDoktersController extends Controller
{
    public function index()
    {
        $jadwalDokter = JadwalDokters::all();
        return view('admin.jadwal.index', compact('jadwalDokter'));
    }

    public function create()
    {
        return view('admin.jadwal.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'dokter_id' => 'required|exists:dokters,id', // Pastikan 'dokter_id' ada dan valid
            'nama_dokter' => 'required',
            'spesialisasi' => 'required',
            'hari_praktek' => 'required',
            'jam_praktek' => 'required',
        ]);

        JadwalDokters::create($request->all());

        return redirect()->route('admin.jadwal.index')->with('success', 'Jadwal dokter berhasil ditambahkan');
    }
    public function show($id)
    {
        $dokter = Dokter::findOrFail($id);
        return view('admin.dokter.show', compact('dokter'));
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
}
