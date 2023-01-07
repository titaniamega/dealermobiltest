<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $table = "contact_person";

    protected $fillable = [
        'id', 'nama', 'telepon', 'telepon2', 'whatsapp','email','nama_dealer','alamat_kantor','foto_profil',
    ];
}
