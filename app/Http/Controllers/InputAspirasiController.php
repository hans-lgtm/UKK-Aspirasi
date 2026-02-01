<?php

namespace App\Http\Controllers;

use App\Models\InputAspirasi;
use App\Models\Kategori;
use App\Models\Siswa;
use Illuminate\Http\Request;

class InputAspirasiController extends Controller
{
    public function create()
    {
        // ambil data kategori
        $kategori = Kategori::all();

        return view('input-aspirasi.create', ['kategori' =>$kategori]);
    }

    public function store(Request $request) {
        // validasi input 
        $validated = $request->validate([
            'nis' => ['required'],
            'kategori_id' => ['required'],
            'lokasi' => ['required'],
            'keterangan' => ['required']
        ]);

        // mencari siswa apakha ada yang punya ns terrsebut 
        $siswa = Siswa::where('nis', $validated['nis'])->first();

        // hapus nis dalam validated 
        unset($validated['nis']);

        // tambah id siswa ke valriabel array validated
        $validated['siswa_id'] = $siswa->id;

        // menyimpan ke table input aspirasi
        InputAspirasi::create($validated);

        // balik dengan berhasil
        return redirect('/input-aspirasi/histori')->with('success', 'Aspirasi berhasil di tambahkan');
    }

    public function histori()
    {   
        // ambil semua data aspirasi
        $data = InputAspirasi::all();

        return view('input-aspirasi.histori', ['data' => $data]);
    }
}
