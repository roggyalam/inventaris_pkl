<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;

    protected $fillable = ['kode_pinjaman', 'tanggal_pinjam', 'tanggal_kembali', 'peminjam'];

    public $timestamps = true;

    // Relasi Many-to-Many dengan Barang
    public function barangs()
    {
        return $this->belongsToMany(Barang::class, 'pinjaman_barang', 'id_pinjaman', 'id_barang') // Menyebutkan nama pivot dan kolom terkait
            ->withPivot('jumlah')                                                                     // Menyertakan kolom tambahan 'jumlah' di pivot table
            ->withTimestamps();
    }

    // Mendapatkan total jumlah barang yang dipinjam
    public function totalBarang()
    {
        return $this->barangs()->sum('pinjaman_barang.jumlah');
    }
}
