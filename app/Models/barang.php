<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'id_kategori',
        'kondisi',
        'id_ruangan',

        'jumlah',
    ];

    public $timestamps = true;

    // Relasi ke Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    // Relasi ke Ruangan
    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'id_ruangan');
    }

    // Relasi Many-to-Many dengan Pinjaman
    // Barang.php
    public function pinjaman()
    {
        return $this->belongsToMany(Pinjaman::class, 'pinjaman_barang', 'id_barang', 'id_pinjaman')
            ->withPivot('jumlah');
    }

    // Relasi Many-to-Many dengan Pengembalian
    public function pengembalian()
    {
        return $this->belongsToMany(Pengembalian::class, 'pengembalian_barang')
            ->withPivot('kondisi_barang')
            ->withTimestamps();
    }

    // Fungsi untuk mengurangi jumlah barang saat dipinjam
    public function kurangiStok($jumlah)
    {
        if ($this->jumlah >= $jumlah) {
            $this->decrement('jumlah', $jumlah);
        }
    }

    // Fungsi untuk menambah jumlah barang saat dikembalikan atau dihapus
    public function tambahStok($jumlah)
    {
        $this->increment('jumlah', $jumlah);
    }
}
