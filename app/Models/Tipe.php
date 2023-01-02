<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
    public $table = "tipe";

    protected $fillable = [
        'id', 'id_produk', 'nama_tipe', 'harga', 'harga_automatic', 'minimal_angsuran', 'bayar_pertama', 'bonus',
    ];
}
