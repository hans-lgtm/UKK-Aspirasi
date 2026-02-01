<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    public $fillable = [
        'nis',
        'kelas',
        'nama'
    ];

    public $table = 'siswa';
}
