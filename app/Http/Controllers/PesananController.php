<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::with('pelanggan')->get();
        return view('pesanan.index', compact('pesanans'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();
        return view('pesanan.create', compact('pelanggans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id' => 'required',
            'layanan' => 'required',
            'jumlah' => 'nullable|numeric',
            'harga' => 'required|numeric',
            'tanggal_masuk' => 'required|date',
            'tanggal_selesai' => 'nullable|date',
        ]);

        Pesanan::create($request->all());

        return redirect()->route('pesanan.index')
            ->with('success', 'Pesanan berhasil ditambahkan!');
    }

    public function edit(string $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pelanggans = Pelanggan::all();
        return view('pesanan.edit', compact('pesanan', 'pelanggans'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'pelanggan_id' => 'required',
            'layanan' => 'required',
            'jumlah' => 'nullable|numeric',
            'harga' => 'required|numeric',
            'status' => 'required',
            'tanggal_masuk' => 'required|date',
            'tanggal_selesai' => 'nullable|date',
        ]);

        $pesanan = Pesanan::findOrFail($id);
        $pesanan->update($request->all());

        return redirect()->route('pesanan.index')
            ->with('success', 'Pesanan berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        Pesanan::findOrFail($id)->delete();

        return redirect()->route('pesanan.index')
            ->with('success', 'Pesanan berhasil dihapus!');
    }

    public function updateStatus($id, $status)
    {
        $allowed = ['Diterima', 'Dicuci', 'Dijemur', 'Disetrika', 'Selesai'];

        if (!in_array($status, $allowed)) {
            return back()->with('error', 'Status tidak valid!');
        }

        $pesanan = Pesanan::findOrFail($id);
        $pesanan->update(['status' => $status]);

        return back()->with('success', 'Status berhasil diupdate!');
    }
}
