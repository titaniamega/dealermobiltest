<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    public $table = "promo";

    protected $fillable = [
        'id', 'gambar', 'judul', 'produk',
    ];
}

