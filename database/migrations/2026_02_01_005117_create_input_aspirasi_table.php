<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('input_aspirasi', function (Blueprint $table) {
            // id bisa sebagai id funcion
            $table->id();
            // pakai id siswa saja sebagai foreign key, karena mereka otomatis terisi nis
            $table->foreignId('siswa_id')->constrained(
                table: 'siswa', indexName: 'input_aspirasi_siswa'
            )->onUpdate('cascade')->onDelete('cascade');
            
            // foreign key kategori
            $table->foreignId('kategori_id')->constrained(
                table: 'kategori', indexName: 'input_aspirasi_kategori'
            )->onUpdate('cascade')->onDelete('cascade');


            $table->string('lokasi');
            // dari ket ganti ke keterangan 
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('input_aspirasi');
    }
};
