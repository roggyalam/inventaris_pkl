<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pinjaman extends Model
{
    use HasFactory;
    protected $fillable = ['id','id_barang','tanggal_pinjam','tanggal_kembali','peminjam'];
    public $timestamps = true;

    public function barang()
    {
        return $this->belongsTo(barang::class,'id_barang');
    }

    public function pengembalian()
    {
        return $this->hasMany(pengembalian::class, 'id_peminjaman');
    }
}
