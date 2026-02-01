<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Siswa::all();

        return view('siswa.index', ['data' => $data]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // memvalidasi data yang dikirim oleh pengguna
        $validated = $request->validate([
            'nis' => ['required', 'max:10'],
            'kelas' => ['required', 'max:50'],
            'nama' => ['required', 'max:150']
        ]);

        // lalu disimpan ke database table siswa
        Siswa::create($validated);

        // arahkan pengguna ke halaman siswa.index
        return redirect('/siswa')->with('success', "Siswa {$request['nama']} berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // mengambil data dari id yang di berikan 
        $data = Siswa::find($id);

        return view('siswa.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // memvalidasi data yang dikirim oleh pengguna
        $validated = $request->validate([
            'nis' => ['sometimes', 'required'],
            'nama' => ['sometimes', 'required'],
            'kelas' => ['sometimes', 'required']
        ]);

        // mencari data siswa berdasarkan id
        $siswa = Siswa::find($id);

        // mengupdate data siswa dengan data yang sudah di validasi
        $siswa->update($validated);

        // mengarahkan pengguna ke halaman siswa index
        return redirect('/siswa')->with('success', "Data Siswa {$validated['nama']} berhasil diupdate  ");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Siswa::destroy($id);

        return redirect('/siswa')->with('success', 'Data siswa berhasil dihapus');
    }
}
