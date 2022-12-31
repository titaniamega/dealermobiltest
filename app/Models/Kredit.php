<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kredit extends Model
{
    public $table = "kredit";

    protected $fillable = [
        'id', 'produk', 'harga_mulai', 'dp_mulai', 'cicilan_mulai', 'tenor',
    ];
}
