<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\ruangan;
use App\Models\barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = barang::all();
        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = kategori::all();
        $ruangan = ruangan::all();
        return view('barang.create', compact('kategori', 'ruangan'));
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
            'nama_barang' => 'required',
            'id_kategori' => 'required',
            'kondisi' => 'required|in:baik,rusak,perbaikan',
            'id_ruangan' => 'required',
            'alamat' => 'required',
        ]);

        $barang = new barang();
        $barang->nama_barang = $request->nama_barang;
        $barang->id_kategori = $request->id_kategori;
        $barang->kondisi = $request->kondisi;
        $barang->id_ruangan = $request->id_ruangan;
        $barang->alamat = $request->alamat;
        $barang->save();

        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(barang $barang)
    {
        $kategori = kategori::all();
        $ruangan = ruangan::all();
        return view('barang.edit', compact('barang', 'kategori', 'ruangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, barang $barang)
    {
        $validated = $request->validate([
            'nama_barang' => 'required',
            'id_kategori' => 'required',
            'kondisi' => 'required|in:baik,rusak,perbaikan',
            'id_ruangan' => 'required',
            'alamat' => 'required',
        ]);

        $barang->nama_barang = $request->nama_barang;
        $barang->id_kategori = $request->id_kategori;
        $barang->kondisi = $request->kondisi;
        $barang->id_ruangan = $request->id_ruangan;
        $barang->alamat = $request->alamat;
        $barang->save();

        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(barang $barang)
    {
        $barang->delete();
        return redirect()->route('barang.index');
    }
}
