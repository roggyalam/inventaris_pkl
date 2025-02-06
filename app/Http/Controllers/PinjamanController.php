<?php


namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\pinjaman;
use Illuminate\Http\Request;

class PinjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pinjaman = Pinjaman::all();
        return view('pinjaman.index', compact('pinjaman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = barang::all();
        return view('pinjaman.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_barang' => 'required|array',  // pastikan id_barang adalah array
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date',
            'peminjam' => 'required|string',
        ]);

        // Loop melalui barang yang dipilih
        foreach ($request->id_barang as $barangId) {
            // Simpan data pinjaman
            Pinjaman::create([
                'id_barang' => $barangId,
                'tanggal_pinjam' => $request->tanggal_pinjam,
                'tanggal_kembali' => $request->tanggal_kembali,
                'peminjam' => $request->peminjam,
            ]);
        }

        return redirect()->route('pinjaman.index')->with('success', 'Data pinjaman berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function show(pinjaman $pinjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function edit(pinjaman $pinjaman)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pinjaman $pinjaman)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pinjaman  $pinjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(pinjaman $pinjaman)
    {
        //
    }
}
