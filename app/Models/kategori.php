<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    protected $fillable = ['id','kategori'];
    public $timestamps = true;

    public function barang()
    {
        return $this->hasMany(Barang::class, 'id_kategori');
    }
}
