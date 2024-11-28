<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\User;
use App\Models\Lantai;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::all();
        return view('jadwal.index', compact('jadwal'));
    }

    public function create()
    {
        $users = User::pluck('email', 'id');
        $lantai = Lantai::pluck('nama_lantai', 'id');
        return view('jadwal.create', compact('users', 'lantai'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_staff' => 'required',
            'tanggal_awal' => 'required|date',
            'tanggal_akhir' => 'required|date',
            'lokasi_tugas' => 'required|array',
            'keterangan' => 'nullable',
        ]);

        Jadwal::create([
            'nama_staff' => $request->nama_staff,
            'tanggal_awal' => $request->tanggal_awal,
            'tanggal_akhir' => $request->tanggal_akhir,
            'lokasi_tugas' => json_encode($request->lokasi_tugas), // Simpan sebagai JSON
            'keterangan' => $request->keterangan,
        ]);
    
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dibuat.');
    }
    public function edit(Jadwal $jadwal)
{
   // $users = User::pluck('email', 'id');
    //$lantai = Lantai::pluck('nama_lantai', 'id');
    //$jadwal->lokasi_tugas = json_decode($jadwal->lokasi_tugas, true); // Decode JSON ke array

    //return view('jadwal.edit', compact('jadwal', 'users', 'lantai'));
    // Ambil daftar email dari tabel User untuk dropdown "Nama Staff"
    $users = User::pluck('email', 'id');

    // Ambil daftar nama lantai dari tabel Lantai untuk dropdown "Lokasi Tugas"
    $lantai = Lantai::pluck('nama_lantai', 'id');

    // Decode JSON di kolom lokasi_tugas agar menjadi array
    $jadwal->lokasi_tugas = is_string($jadwal->lokasi_tugas) 
        ? json_decode($jadwal->lokasi_tugas, true) 
        : $jadwal->lokasi_tugas;

    // Return view edit dengan data yang diperlukan
    return view('jadwal.edit', compact('jadwal', 'users', 'lantai'));
}

public function update(Request $request, Jadwal $jadwal)
{
    $request->validate([
        'nama_staff' => 'required',
        'tanggal_awal' => 'required|date',
        'tanggal_akhir' => 'required|date',
        'lokasi_tugas' => 'required|array',
        'keterangan' => 'nullable|string',
    ]);

    $jadwal->update([
        'nama_staff' => $request->nama_staff,
        'tanggal_awal' => $request->tanggal_awal,
        'tanggal_akhir' => $request->tanggal_akhir,
        'lokasi_tugas' => json_encode($request->lokasi_tugas), // Pastikan disimpan sebagai JSON
        'keterangan' => $request->keterangan,
    ]);

    return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
}

    
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
