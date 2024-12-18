<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lokasi;
use App\Models\Lantai;

class LokasiController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');
        
        // Fetch lokasi with optional searching
        if ($query) {
            $lokasis = Lokasi::with('lantai')
                ->where('nama_lokasi', 'LIKE', "%{$query}%")
                ->orWhere('kategori', 'LIKE', "%{$query}%")
                ->get();
        } else {
            $lokasis = Lokasi::with('lantai')->get();
        }

        return view('lokasi.index', compact('lokasis'));
    }

    public function create()
    {
        $lantais = Lantai::all();
        return view('lokasi.create', compact('lantais'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required',
            'nama_lokasi' => 'required',
            'lantai_id' => 'required|exists:lantais,id',
        ]);

        Lokasi::create($request->all());
        return redirect()->route('lokasi.index')->with('success', 'Lokasi created successfully.');
    }

    public function edit($id)
    {
        $lokasi = Lokasi::find($id);

        // Check if the location exists
        if (!$lokasi) {
            return redirect()->route('lokasi.index')->with('error', 'Lokasi tidak ditemukan.');
        }

        // Return the edit view with the location data
        return view('lokasi.edit', compact('lokasi'));
    }

    public function update(Request $request, Lokasi $lokasi)
    {
        $request->validate([
            'kategori' => 'required',
            'nama_lokasi' => 'required',
            'lantai_id' => 'required|exists:lantais,id',
        ]);

        $lokasi->update($request->all());
        return redirect()->route('lokasi.index')->with('success', 'Lokasi updated successfully.');
    }

    public function destroy(Lokasi $lokasi)
    {
        $lokasi->delete();
        return redirect()->route('lokasi.index')->with('success', 'Lokasi deleted successfully.');
    }
}