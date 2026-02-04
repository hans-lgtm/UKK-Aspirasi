<?php

namespace App\Http\Controllers;

use App\Models\InputAspirasi;
use App\Models\Kategori;
use App\Models\Siswa;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
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

    public function histori(Request $request)
    {   
        // Siapkan query builder
        $query = InputAspirasi::query();


        // Filter berdasarkan bulan (mengabaikan tanggal jika bulan dipilih)
        if ($request->filled('cari-bulan')) {
            $data_waktu = Carbon::parse($request->input('cari-bulan'));
            $query->whereYear('created_at', $data_waktu->year)
                  ->whereMonth('created_at', $data_waktu->month);
        } else if ($request->filled('cari-tanggal')) {
            // Filter berdasarkan tanggal
            $data_tanggal = Carbon::parse($request->input('cari-tanggal'));
            $query->whereDate('created_at', $data_tanggal->toDateString());
        }

        // Filter berdasarkan siswa
        if($request->input('cari-siswa')){
            // menyimpan data ketikan user
            $keyword_siswa = $request->input('cari-siswa');

            // proses megambil dengan realationship data, karena beda tabel
            $query->whereHas('siswa', function (Builder $sub_query) use ($keyword_siswa){
                $sub_query->where('nama', 'like', "%{$keyword_siswa}%");
            });
        }

        // Filter berdasarkan kategori
        if($request->input('cari-kategori')){
            // menyimpan data ketikan user
            $keyword_kategori = $request->input('cari-kategori');

            // proses megambil dengan realationship data, karena beda tabel
            $query->whereHas('kategori', function (Builder $sub_query) use ($keyword_kategori){
                $sub_query->where('ket_kategori', 'like', "%{$keyword_kategori}%");
            });
        }

        // Ambil data hasil filter (atau semua jika tidak ada filter)
        $data = $query->get();

        return view('input-aspirasi.histori', ['data' => $data]);
    }
}
