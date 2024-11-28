<?php

namespace App\Http\Controllers;

use App\Models\laporan_perawatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanPerawatanController extends Controller
{
    public function index()
    {
        $laporan = laporan_perawatan::with('details')->get();
        return view('laporan.index', compact('laporan'));

        // $laporanPerawatans = LaporanPerawatan::with('details')->get();
        // return view('laporan_perawatan.index', compact('laporanPerawatans'));
    }

    public function create()
    {
        return view('laporan_perawatan.create');
    }

    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $laporan = laporan_perawatan::create([
                'tanggal' => $request->tanggal,
                'user_id' => $request->user_id,
                'lokasi_id' => $request->lokasi_id,
            ]);

            foreach ($request->details as $detail) {
                $laporan->details()->create([
                    'sarana_id' => $detail['sarana_id'],
                    'upload_poto' => $detail['upload_poto'],
                    'keterangan' => $detail['keterangan'],
                ]);
            }
        });

        return redirect()->route('laporan_perawatan.index')->with('success', 'Laporan dan Detail berhasil ditambahkan');
    }

    public function edit($id)
    {
        $laporan = laporan_perawatan::with('details')->findOrFail($id);
        return view('laporan_perawatan.edit', compact('laporan'));
    }

    public function update(Request $request, $id)
    {
        DB::transaction(function () use ($request, $id) {
            $laporan = laporan_perawatan::findOrFail($id);
            $laporan->update([
                'tanggal' => $request->tanggal,
                'user_id' => $request->user_id,
                'lokasi_id' => $request->lokasi_id,
            ]);

            $laporan->details()->delete();
            foreach ($request->details as $detail) {
                $laporan->details()->create([
                    'sarana_id' => $detail['sarana_id'],
                    'upload_poto' => $detail['upload_poto'],
                    'keterangan' => $detail['keterangan'],
                ]);
            }
        });

        return redirect()->route('laporan_perawatan.index')->with('success', 'Laporan dan Detail berhasil diupdate');
    }

    public function destroy($id)
    {
        $laporan = laporan_perawatan::findOrFail($id);
        $laporan->delete();

        return redirect()->route('laporan_perawatan.index')->with('success', 'Laporan berhasil dihapus');
    }
}
