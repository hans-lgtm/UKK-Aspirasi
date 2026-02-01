<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ambil data kategori yang ada di database
        $data = Kategori::all();


        return view('kategori.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // memvalidasi data yang dikirim oleh pengguna
        $validated = $request->validate([
            'ket_kategori' => ['required']
        ]);

        // lalu disimpan ke database table kategori
        Kategori::create($validated);

        // arahkan pengguna ke halaman kategori.index
        return redirect('/kategori')->with('success', 'Kategori berhasil ditambahkan');
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
        $data = Kategori::find($id);

        return view('kategori.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // memvalidasi data yang dikirim oleh pengguna
        $validated = $request->validate([
            'ket_kategori' => ['sometimes', 'required']
        ]);

        // mencari data kategori berdasarkan id
        $kategori = Kategori::find($id);

        // mengupdate data kategori dengan data yang sudah di validasi
        $kategori->update($validated);

        // mengarahkan pengguna ke halaman kategori index
        return redirect('/kategori')->with('success', "Kategori berhasil diupdate ( {$validated['ket_kategori']} ) ");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // cari id kategori dulu, id yg sama yg mau di hapus 
        $kategori_id = Kategori::find($id);

        // data kategori yang memiliki id tersebut 
        $kategori_id->delete();
        
        // mengarahkan penggunaka ke index
        return redirect('/kategori')->with('success', 'Kategori berhasil dihapus');
    }
}
