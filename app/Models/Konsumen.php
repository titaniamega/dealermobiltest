<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsumen extends Model
{
    public $table = "konsumen";

    protected $fillable = [
        'id', 'id_produk', 'gambar', 'nama_konsumen',
    ];
}
