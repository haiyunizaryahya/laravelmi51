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
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'lokasi_id' => 'required|integer',
            'user_id' => 'required|integer',
            'details.*.sarana_id' => 'required|integer',
            'details.*.keterangan' => 'required|string',
            'details.*.upload_poto' => 'required|image'
        ]);

        $laporan = LaporRawat::create($request->only('tanggal', 'lokasi_id', 'user_id'));

        foreach ($request->details as $detail) {
            $upload_poto = $detail['upload_poto']->store('uploads/potos');
            $laporan->details()->create([
                'sarana_id' => $detail['sarana_id'],
                'keterangan' => $detail['keterangan'],
                'upload_poto' => $upload_poto,
            ]);
        }

        return redirect()->route('laporan.index')->with('success', 'Laporan perawatan berhasil ditambahkan');
    }
}
