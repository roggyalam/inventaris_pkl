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
        $validated = $request->validate([
            'id_barang' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            'peminjam' => 'required',

        ]);

       $pinjaman = new    pinjaman();
       $pinjaman->id_barang = $request-> id_barang;
       $pinjaman->tanggal_pinjam = $request-> tanggal_pinjam;
       $pinjaman->tanggal_kembali = $request-> tanggal_kembali;
       $pinjaman->peminjam = $request-> peminjam;
       $pinjaman->save();

    return redirect()->route('pinjaman.index');
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
