<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporRawat;
use App\Models\DetailLaporRawat;
use App\Models\Lokasi;
use App\Models\sarana;
use App\Models\User;

class LaporRawatController extends Controller
{
    public function index()
    {
        // $laporans = LaporRawat::with('details')->get();
        // return view('laporan.index', compact('laporans'));
        $laporans = LaporRawat::with(['lokasi', 'user'])->get();
        return view('laporan.index', compact('laporans'));
    }

    public function create()
    {
        $lokasi = Lokasi::all(); // Mengambil data lokasi
        $users = User::all(); // Mengambil data user
        $sarana = sarana::all(); // Mengambil data sarana
    
        return view('laporan.create', compact('lokasi', 'users', 'sarana'));
        //return view('laporan.create');
    }
    public function edit($id)
    {
        $laporan = LaporRawat::findOrFail($id);
        $lokasis = Lokasi::all(); // Ambil semua lokasi
        $users = User::all(); // Ambil semua user
    
        return view('laporan.edit', compact('laporan', 'lokasis', 'users'));
    }
    
    public function show($id)
    {
    $laporan = LaporRawat::with('details')->findOrFail($id);
    return view('laporan.show', compact('laporan'));
    }
    public function destroy($id)
    {
        $laporan = LaporRawat::findOrFail($id);

        // Hapus foto-foto yang ada di detail laporan
        foreach ($laporan->details as $detail) {
            if ($detail->upload_poto && file_exists(public_path($detail->upload_poto))) {
                unlink(public_path($detail->upload_poto)); // Hapus foto
            }
        }

        // Hapus laporan beserta detailnya
        $laporan->details()->delete(); // Hapus semua detail laporan
        $laporan->delete(); // Hapus laporan utama

        return redirect()->route('laporan.index')->with('success', 'Laporan perawatan berhasil dihapus');
    }
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'tanggal' => 'required|date',
            'lokasi_id' => 'required|integer',
            'user_id' => 'required|integer',
            'details.*.sarana_id' => 'required|integer',
            'details.*.keterangan' => 'required|string',
            'details.*.upload_poto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);
    
        // Menyimpan laporan utama
        $laporan = LaporRawat::create($request->only('tanggal', 'lokasi_id', 'user_id'));
    
        // Menyimpan detail laporan perawatan dan upload foto
        foreach ($request->details as $detail) {
            if ($detail['upload_poto']) {
                // Simpan foto baru
                $filename = time() . '_' . $detail['upload_poto']->getClientOriginalName();
                $path = $detail['upload_poto']->move(public_path('uploads/potos'), $filename);
                $upload_poto = 'uploads/potos/' . $filename; // Simpan path foto
    
                // Menyimpan detail laporan
                $laporan->details()->create([
                    'sarana_id' => $detail['sarana_id'],
                    'keterangan' => $detail['keterangan'],
                    'upload_poto' => $upload_poto, // Menyimpan path foto
                ]);
            }
        }
    
        return redirect()->route('laporan.index')->with('success', 'Laporan perawatan berhasil ditambahkan');
    }
    
    
}
