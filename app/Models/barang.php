<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = ['nama_barang', 'id_kategori', 'kondisi', 'id_ruangan', 'alamat', 'kode_barang', 'kode_ruangan'];

    public $timestamps = true;

    // Relasi Many-to-Many dengan Pinjaman
    public function pinjaman()
    {
        return $this->belongsToMany(Pinjaman::class, 'pinjaman_barang')
                    ->withPivot('jumlah')
                    ->withTimestamps();
    }

    // Relasi Many-to-Many dengan Pengembalian
    public function pengembalian()
    {
        return $this->belongsToMany(Pengembalian::class, 'pengembalian_barang')
                    ->withPivot('kondisi_barang')
                    ->withTimestamps();
    }
}
