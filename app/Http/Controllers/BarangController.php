<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Ruangan;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Menampilkan daftar barang.
     */
    public function index()
    {
        $barang = Barang::all();
        return view('barang.index', compact('barang'));
    }

    /**
     * Menampilkan form tambah barang.
     */
    public function create()
    {
        $kategori = Kategori::all();
        $ruangan = Ruangan::all();
        return view('barang.create', compact('kategori', 'ruangan'));
    }

    /**
     * Menyimpan barang baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required|string|max:255',
            'id_kategori' => 'required|exists:kategoris,id',
            'kondisi' => 'required|in:Baik,Rusak,Perbaikan',
            'id_ruangan' => 'required|exists:ruangans,id',
            'jumlah' => 'required|integer|min:1',
        ]);

        // Generate kode barang otomatis (format: BRG-YYYYMMDD-His)
        $kode_barang = 'BRG-' . date('Ymd-His');

        Barang::create([
            'kode_barang' => $kode_barang,
            'nama_barang' => $validated['nama_barang'],
            'id_kategori' => $validated['id_kategori'],
            'kondisi' => $validated['kondisi'],
            'id_ruangan' => $validated['id_ruangan'],
            'jumlah' => $validated['jumlah'],

        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail barang tertentu.
     */
    public function show(Barang $barang)
    {
        return view('barang.show', compact('barang'));
    }

    /**
     * Menampilkan form edit barang.
     */
    public function edit(Barang $barang)
    {
        $kategori = Kategori::all();
        $ruangan = Ruangan::all();
        return view('barang.edit', compact('barang', 'kategori', 'ruangan'));
    }

    /**
     * Memperbarui data barang.
     */
    public function update(Request $request, Barang $barang)
    {
        $validated = $request->validate([
            'kode_barang' => 'required',
            'nama_barang' => 'required|string|max:255',
            'id_kategori' => 'required|exists:kategoris,id',
            'kondisi' => 'required|in:Baik,Rusak,Perbaikan',
            'id_ruangan' => 'required|exists:ruangans,id',
            'jumlah' => 'required|integer|min:0',
        ]);

        $barang->update($validated);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui!');
    }

    /**
     * Menghapus barang dari database.
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
    }
}
