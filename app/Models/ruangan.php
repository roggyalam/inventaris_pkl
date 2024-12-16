<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ruangan extends Model
{
    use HasFactory;
    protected $fillable = ['id','nama_ruangan'];
    public $timestamps = true;

    public function barang()
    {
        return $this->hasMany(barang::class, 'id_ruangan');
    }
}
