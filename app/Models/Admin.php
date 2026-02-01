<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    //ini agar dapat menggunakan method create() untuk membuat data
    public $fillable = [
        'username',
        'password'
    ];

    // nama table yang digunakan
    protected $table = 'admin';
}
