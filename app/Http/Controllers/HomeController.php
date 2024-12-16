<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Ruangan;
use App\Models\pinjaman;


class HomeController extends Controller
{
    public function index()
    {
        // Fetch data for Barang, Kategori, Ruangan, etc.
        $barang = Barang::all(); // You can modify this to get specific data
        $kategoris = Kategori::all();
        $ruangans = Ruangan::all();
        $pinjaman = Pinjaman::all();

        // Return the view with the data
        return view('home', compact('barang', 'kategoris', 'ruangans', 'pinjaman'));
    }
}


