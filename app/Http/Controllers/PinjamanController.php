<?php
namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pinjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PinjamanController extends Controller
{
    public function index()
    {
        $pinjaman = Pinjaman::with('barangs')->paginate(10); // Menggunakan 'barangs' untuk relasi yang benar dan menambahkan pagination
        return view('pinjaman.index', compact('pinjaman'));
    }

    public function create()
    {
        // Hanya tampilkan barang yang memiliki jumlah lebih dari 0
        $barang = Barang::where('jumlah', '>', 0)->get();
        return view('pinjaman.create', compact('barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_barang'       => 'required|array',
            'id_barang.*'     => 'exists:barangs,id',
            'jumlah'          => 'required|array',
            'jumlah.*'        => 'integer|min:1',
            'tanggal_pinjam'  => 'required|date',
            'tanggal_kembali' => 'required|date|after:tanggal_pinjam',
            'peminjam'        => 'required|string|max:255',
        ]);

        DB::transaction(function () use ($request) {
            try {
                // Generate kode pinjaman unik
                $kodePinjaman = 'PNJ-' . strtoupper(Str::random(6));

                // Simpan pinjaman
                $pinjaman = Pinjaman::create([
                    'kode_pinjaman'   => $kodePinjaman,
                    'tanggal_pinjam'  => $request->tanggal_pinjam,
                    'tanggal_kembali' => $request->tanggal_kembali,
                    'peminjam'        => $request->peminjam,
                ]);

                // Proses untuk setiap barang yang dipinjam
                foreach ($request->id_barang as $index => $barangId) {
                    $barang         = Barang::findOrFail($barangId); // Cari barang berdasarkan ID
                    $jumlahDipinjam = $request->jumlah[$index];

                    // Cek apakah stok barang cukup
                    if ($barang->jumlah < $jumlahDipinjam) {
                        throw new \Exception("Jumlah barang {$barang->nama_barang} tidak mencukupi untuk dipinjam.");
                    }

                    // Kurangi stok barang yang dipinjam
                    $barang->decrement('jumlah', $jumlahDipinjam);

                    // Simpan detail pinjaman
                    DB::table('pinjaman_barang')->insert([
                        'id_pinjaman' => $pinjaman->id,
                        'id_barang'   => $barangId,
                        'jumlah'      => $jumlahDipinjam,
                    ]);
                }
            } catch (\Exception $e) {
                // Jika terjadi error, rollback transaksi dan tampilkan pesan error
                DB::rollBack();
                return back()->withErrors($e->getMessage())->withInput();
            }
        });

        return redirect()->route('pinjaman.index')->with('success', 'Data pinjaman berhasil ditambahkan.');
    }

    public function destroy(Pinjaman $pinjaman)
    {
        DB::transaction(function () use ($pinjaman) {
            // Mengembalikan stok barang yang dipinjam
            foreach ($pinjaman->barangs as $barang) {
                $barang->increment('jumlah', $barang->pivot->jumlah); // Menambahkan kembali jumlah barang yang dipinjam
            }

            // Hapus data pinjaman dan relasi barang
            $pinjaman->barangs()->detach();
            $pinjaman->delete();
        });

        return redirect()->route('pinjaman.index')->with('success', 'Data pinjaman berhasil dihapus.');
    }
}
