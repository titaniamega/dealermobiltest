<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public $table = "video";

    protected $fillable = [
        'id', 'id_produk', 'judul_video', 'link_video',
    ];
}
