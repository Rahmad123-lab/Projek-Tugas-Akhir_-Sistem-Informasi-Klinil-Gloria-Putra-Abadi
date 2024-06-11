<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dokter;
use App\Models\JadwalDokterNew;

class AdminDokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::all();
        return view('admin.dokter.index', compact('dokters'));
    }

    public function create()
    {
        return view('admin.dokter.create');
    }



    public function store(Request $request)
    {
        $request->validate([
            'nama_dokter' => 'required|string|max:255',
            'alamat_dokter' => 'required|string|max:255',
            'spesialisasi_dokter' => 'required|string|max:255',
            'jadwal_dokter' => 'nullable|string|max:255',
        ]);

        Dokter::create([
            'nama_dokter' => $request->nama_dokter,
            'alamat_dokter' => $request->alamat_dokter,
            'spesialisasi_dokter' => $request->spesialisasi_dokter,
            'jadwal_dokter' => $request->jadwal_dokter,
            'id_user' => auth()->id(),
        ]);

        return redirect()->route('admin-dokter.index')->with('success', 'Dokter berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $dokter = Dokter::findOrFail($id);
        return view('admin.dokter.edit', compact('dokter'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_dokter' => 'required|string|max:255',
            'alamat_dokter' => 'nullable|string',
            'spesialisasi_dokter' => 'required|string',
        ]);

        $dokter = Dokter::findOrFail($id);
        $dokter->update([
            'nama_dokter' => $request->input('nama_dokter'),
            'alamat_dokter' => $request->input('alamat_dokter'),
            'spesialisasi_dokter' => $request->input('spesialisasi_dokter'),
        ]);

        return redirect()->route('admin-dokter.index')->with('success', 'Data dokter berhasil diperbarui');
    }
}
