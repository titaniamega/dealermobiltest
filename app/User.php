<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;
    protected $table = 'users';
    protected $primaryKey = 'id'; 
    protected $fillable = ['id','name','email','password',
    'role'];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

