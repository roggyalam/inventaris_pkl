<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $fillable = ['id','nama_barang','id_kategori','kondisi','id_ruangan','alamat'];
    public $timestamps = true;

      // Menambahkan cast agar kondisi otomatis diperlakukan sebagai nilai enum
      protected $casts = [
        'kondisi' => 'string', // Pastikan kondisi disimpan sebagai string
    ];

    // Kamu juga bisa menambahkan helper function untuk kondisi
    const KONDISI_BAIK = 'baik';
    const KONDISI_RUSAK = 'rusak';
    const KONDISI_PERBAIKAN = 'perbaikan';

    public static function getKondisiOptions()
    {
        return [
            self::KONDISI_BAIK => 'Baik',
            self::KONDISI_RUSAK => 'Rusak',
            self::KONDISI_PERBAIKAN => 'Perbaikan',
        ];
    }


    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'id_kategori');
    }
    public function ruangan()
    {
        return $this->belongsTo(ruangan::class,'id_ruangan');
    }
    public function pengadaan_barang()
    {
        return $this->hasMany(pengadaan_barang::class, 'id_barang');
    }
    public function pinjaman()
    {
        return $this->hasMany(pinjaman::class, 'id_barang');
    }
    public function perbaikan_barang()
    {
        return $this->hasMany(perbaikan_barang::class, 'id_barang');
    }
}
