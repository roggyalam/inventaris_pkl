<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\perbaikan_barang;
use Illuminate\Http\Request;

class PerbaikanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perbaikan_barang = perbaikan_barang::all();
        return view('perbaikanbarang.index', compact('perbaikan_barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = barang::all();
        return view('perbaikanbarang.create', compact('barang'));
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
            'tanggal_perbaikan' => 'required',
            'tindakan' => 'required',
            'status_perbaikan' => 'required',

        ]);

       $barang = new    pinjaman();
       $barang->id_barang = $request-> id_barang;
       $barang->tanggal_perbaikan = $request-> tanggal_perbaikan;
       $barang->tindakan = $request-> tindakan;
       $barang-> status_perbaikan = $request->status_perbaikan;
       $barang->save();

    return redirect()->route('pinjaman.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\perbaikan_barang  $perbaikan_barang
     * @return \Illuminate\Http\Response
     */
    public function show(perbaikan_barang $perbaikan_barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\perbaikan_barang  $perbaikan_barang
     * @return \Illuminate\Http\Response
     */
    public function edit(perbaikan_barang $perbaikan_barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\perbaikan_barang  $perbaikan_barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, perbaikan_barang $perbaikan_barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\perbaikan_barang  $perbaikan_barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(perbaikan_barang $perbaikan_barang)
    {
        //
    }
}
