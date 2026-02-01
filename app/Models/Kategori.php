<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    // biar bisa pakai creat method  dari ORM
    public $fillable = [
        'ket_kategori'
    ];

    public $table = 'kategori';
}
