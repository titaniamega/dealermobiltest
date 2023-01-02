<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    public $table = "produk";

    protected $fillable = [
        'id', 'nama_produk', 'harga', 'gambar', 'gambarslide', 'deskripsi',
    ];
}
