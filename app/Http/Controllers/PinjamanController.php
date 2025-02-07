<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pinjaman;
use App\Models\PinjamanBarang;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PinjamanController extends Controller
{
    public function index()
    {
        $pinjaman = Pinjaman::with('barang')->get();
        return view('pinjaman.index', compact('pinjaman'));
    }

    public function create()
    {
        $barang = Barang::where('jumlah', '>', 0)->get(); // Hanya tampilkan barang yang tersedia
        return view('pinjaman.create', compact('barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_barang' => 'required|array',
            'id_barang.*' => 'exists:barangs,id',
            'jumlah' => 'required|array',
            'jumlah.*' => 'integer|min:1',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after:tanggal_pinjam',
            'peminjam' => 'required|string|max:255',
        ]);

        DB::transaction(function () use ($request) {
            // Generate kode pinjaman unik
            $kodePinjaman = 'PNJ-' . strtoupper(Str::random(6));

            // Simpan pinjaman
            $pinjaman = Pinjaman::create([
                'kode_pinjaman' => $kodePinjaman,
                'tanggal_pinjam' => $request->tanggal_pinjam,
                'tanggal_kembali' => $request->tanggal_kembali,
                'peminjam' => $request->peminjam,
            ]);

            foreach ($request->id_barang as $index => $barangId) {
                $barang = Barang::findOrFail($barangId);
                $jumlahDipinjam = $request->jumlah[$index];

                if ($barang->jumlah < $jumlahDipinjam) {
                    throw new \Exception("Jumlah barang tidak mencukupi untuk dipinjam.");
                }

                // Kurangi stok barang
                $barang->decrement('jumlah', $jumlahDipinjam);

                // Simpan detail pinjaman
                PinjamanBarang::create([
                    'id_pinjaman' => $pinjaman->id,
                    'id_barang' => $barangId,
                    'jumlah' => $jumlahDipinjam,
                ]);
            }
        });

        return redirect()->route('pinjaman.index')->with('success', 'Data pinjaman berhasil ditambahkan.');
    }

    public function destroy(Pinjaman $pinjaman)
    {
        DB::transaction(function () use ($pinjaman) {
            foreach ($pinjaman->barang as $barang) {
                // Kembalikan stok barang
                $barang->increment('jumlah', $barang->pivot->jumlah);
            }

            // Hapus data pinjaman dan relasi barangnya
            $pinjaman->barang()->detach();
            $pinjaman->delete();
        });

        return redirect()->route('pinjaman.index')->with('success', 'Data pinjaman berhasil dihapus.');
    }
}
