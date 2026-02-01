<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InputAspirasi extends Model
{
    protected $fillable = [
        'siswa_id',
        'kategori_id',
        'lokasi',
        'keterangan'
    ];

    protected $table = 'input_aspirasi';

    public function siswa(): BelongsTo 
    {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function kategori(): BelongsTo 
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
