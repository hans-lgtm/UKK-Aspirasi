<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    // biar bisa pakai creat method  dari ORM
    protected $fillable = [
        'ket_kategori'
    ];

    protected $table = 'kategori';
}
