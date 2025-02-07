<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $fillable = ['id_peminjaman', 'tanggal_kembali', 'catatan'];

    public $timestamps = true;

    protected $casts = [
        'kondisi_barang' => 'string',
    ];

    const KONDISI_BAIK = 'baik';
    const KONDISI_RUSAK = 'rusak';
    const KONDISI_HILANG = 'hilang';

    public static function getKondisiOptions()
    {
        return [
            self::KONDISI_BAIK => 'Baik',
            self::KONDISI_RUSAK => 'Rusak',
            self::KONDISI_HILANG => 'Hilang',
        ];
    }

    // Relasi Many-to-Many dengan Barang
    public function barangs()
    {
        return $this->belongsToMany(Barang::class, 'pengembalian_barang')
                    ->withPivot('kondisi_barang')  // Menyertakan kolom tambahan 'kondisi_barang' di pivot table
                    ->withTimestamps();
    }
}
