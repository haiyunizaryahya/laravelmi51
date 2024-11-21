<?php

namespace App\Http\Controllers;

use App\Models\lantai;
use App\Models\LaporRawat;
use App\Models\sarana;
use App\Models\User;
use Illuminate\Database\Console\DbCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahlantai = lantai::count();
        $jumlahsarana = sarana::count();
        // Menghitung jumlah laporan
        $jumlahLaporan = LaporRawat::count();
        $rekapLaporan = DB::select("
        SELECT 
        YEAR(tanggal) AS tahun,
        MONTH(tanggal) AS bulan,
        COUNT(*) AS jumlah_laporan
        FROM 
        lapor_rawats
        GROUP BY 
        YEAR(tanggal), MONTH(tanggal)
        ORDER BY 
        YEAR(tanggal), MONTH(tanggal)
        ");
        $chartData = [
            'categories' => array_map(
                fn($item) => $item->tahun . '-' . str_pad($item->bulan, 2, '0', STR_PAD_LEFT),
                $rekapLaporan
            ),
            'series' => array_map(fn($item) => $item->jumlah_laporan, $rekapLaporan),
        ];

        // Menghitung jumlah pengguna
        $jumlahUser = User::count();
       
        // Mengirim data ke view
        return view('dashboard', compact('jumlahsarana','jumlahlantai','jumlahLaporan', 'jumlahUser','rekapLaporan','chartData'));
    }
}
