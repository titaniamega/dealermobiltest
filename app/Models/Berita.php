<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    public $table = "berita";

    protected $fillable = [
        'id', 'id_produk', 'judul_berita', 'gambar_berita', 'keterangan',
    ];
}
