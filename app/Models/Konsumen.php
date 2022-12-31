<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsumen extends Model
{
    public $table = "konsumen";

    protected $fillable = [
        'id', 'gambar', 'nama_konsumen', 'produk',
    ];
}
