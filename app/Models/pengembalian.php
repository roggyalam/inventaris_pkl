<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengembalian extends Model
{
    use HasFactory;
    protected $fillable = ['id','id_peminjaman','kondisi_barang','tanggal_kembali','kerusakan'];
    public $timestamps = true;

    protected $casts = [
        'kondisi_barang' => 'string', // Pastikan kondisi disimpan sebagai string
    ];

    // Kamu juga bisa menambahkan helper function untuk kondisi
    const KONDISI_BAIK = 'baik';
    const KONDISI_RUSAK = 'rusak';
    const KONDISI_RUSAK_RINGAN = 'rusak ringan';

    public static function getKondisiOptions()
    {
        return [
            self::KONDISI_BAIK => 'Baik',
            self::KONDISI_RUSAK => 'Rusak',
            self::KONDISI_RUSAK_RINGAN => 'Rusak Ringan',
        ];
    }

    public function pinjaman()
    {
        return $this->belongsTo(pinjaman::class,'id_pinjaman');
    }
}
