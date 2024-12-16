<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengadaan_barang extends Model
{
    use HasFactory;
    protected $fillable = ['id','id_barang','tanggal','jumlah'];
    public $timestamps = true;

    public function barang()
    {
        return $this->belongsTo(barang::class,'id_barang');
    }
}
