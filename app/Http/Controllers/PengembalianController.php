<?php

namespace App\Http\Controllers;

use App\Models\pinjaman;
use App\Models\pengembalian;
use App\Models\barang;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengembalian = Pengembalian::all();
        return view('pengembalian.index', compact('pengembalian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
{
    $pinjaman = pinjaman::all();
    $barang = barang::all();
    return view('pengembalian.create', compact('pinjaman', 'barang'));
}


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_peminjaman' => 'required',
            'id_barang' => 'required|array',
            'kondisi_barang' => 'required|in:baik,rusak,rusak ringan',
            'tanggal_kembali' => 'required',
            'kerusakan' => 'required',

        ]);

       $pengembalian = new    pengembalian();
       $pengembalian->id_peminjaman = $request-> id_peminjaman;
       $pengembalian->id_barang = $request-> id_barang;
       $pengembalian->kondisi_barang = $request-> kondisi_barang;
       $pengembalian->tanggal_kembali = $request-> tanggal_kembali;
       $pengembalian->kerusakan = $request-> kerusakan;
       $pengembalian->save();

    return redirect()->route('pengembalian.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function show(pengembalian $pengembalian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function edit(pengembalian $pengembalian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pengembalian $pengembalian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pengembalian  $pengembalian
     * @return \Illuminate\Http\Response
     */
    public function destroy(pengembalian $pengembalian)
    {
        //
    }
}
