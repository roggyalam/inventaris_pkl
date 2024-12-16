<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\pengadaan_barang;
use Illuminate\Http\Request;

class PengadaanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengadaan_barang = pengadaan_barang::all();
        return view('pengadaanbarang.index', compact('pengadaan_barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = barang::all();
        return view('pengadaanbarang.create', compact('barang'));
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
            'id_barang' => 'required',
            'tanggal' => 'required',
            'jumlah' => 'required',

        ]);

       $barang = new    pengadaan_barang();
       $barang->id_barang = $request-> id_barang;
       $barang->tanggal = $request-> tanggal;
       $barang->jumlah = $request-> jumlah;
       $barang->save();

    return redirect()->route('pengadaanbarang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pengadaan_barang  $pengadaan_barang
     * @return \Illuminate\Http\Response
     */
    public function show(pengadaan_barang $pengadaan_barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pengadaan_barang  $pengadaan_barang
     * @return \Illuminate\Http\Response
     */
    public function edit(pengadaan_barang $pengadaan_barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pengadaan_barang  $pengadaan_barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pengadaan_barang $pengadaan_barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pengadaan_barang  $pengadaan_barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(pengadaan_barang $pengadaan_barang)
    {
        //
    }
}
