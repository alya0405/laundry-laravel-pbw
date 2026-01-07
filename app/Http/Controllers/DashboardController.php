<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung jumlah data
        $totalPesanan     = Pesanan::count();
        $pesananSelesai   = Pesanan::where('status', 'Selesai')->count();
        $pesananProses    = Pesanan::where('status', '!=', 'Selesai')->count();

        // Pendapatan
        $pendapatanHarian = Pesanan::whereDate('tanggal_selesai', today())->sum('harga');
        $pendapatanBulanan = Pesanan::whereMonth('tanggal_selesai', now()->month)->sum('harga');
        $pendapatanTotal   = Pesanan::sum('harga');

        // Grafik pendapatan 7 hari terakhir
        $grafik = Pesanan::selectRaw('DATE(tanggal_masuk) as tanggal, SUM(harga) as total')
            ->groupBy('tanggal')
            ->orderBy('tanggal', 'ASC')
            ->limit(7)
            ->get();

        return view('dashboard.index', compact(
            'totalPesanan',
            'pesananSelesai',
            'pesananProses',
            'pendapatanHarian',
            'pendapatanBulanan',
            'pendapatanTotal',
            'grafik'
        ));
    }
}
