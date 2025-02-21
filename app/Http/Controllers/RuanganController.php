<?php

namespace App\Http\Controllers;

use App\Models\ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ruangan = ruangan::all();
        return view('ruangan.index', compact('ruangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ruangan.create');
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
            'nama_ruangan' => 'required',
            'kode_ruangan' => 'required',
        ]);

        $ruangan = new ruangan();
        $ruangan->nama_ruangan = $request->nama_ruangan;
        $ruangan->kode_ruangan = $request->kode_ruangan;
        $ruangan->save();

        return redirect()->route('ruangan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function show(ruangan $ruangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function edit(ruangan $ruangan)
    {
        return view('ruangan.edit', compact('ruangan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ruangan $ruangan)
    {
        $validated = $request->validate([
            'nama_ruangan' => 'required',
            'kode_ruangan' => 'required',
        ]);

        $ruangan->nama_ruangan = $request->nama_ruangan;
        $ruangan->nama_ruangan = $request->nama_ruangan;
        $ruangan->save();

        return redirect()->route('ruangan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function destroy(ruangan $ruangan)
    {
        $ruangan->delete();

        return redirect()->route('ruangan.index');
    }
}
