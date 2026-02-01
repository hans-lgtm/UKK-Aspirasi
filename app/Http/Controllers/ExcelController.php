<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ExcelController extends Controller
{
    public function preview(Request $request){
    // install package untuk handle data di excel
    // buka terminal ketik, compser require phpoffice/phpspreadsheet

    // memvalidasi reuest excel
    $request->validate([
        'excel' => ['required', 'file', 'mimes:xls,xlsx']
    ]);

    // membaca file excel
    $excel = IOFactory::load($request->file('excel')->getPathname());

    // akses lembar excel yang aktif
    $lembar_excel = $excel->getActiveSheet();

    // mengubah data-data di excel ke bentuk data array 
    $rows = $lembar_excel->toArray(null, true, true, true);

    // mengambil header, yang paling atas
    // data di rows yang oaling atas akan dihilangkan dan dipindah ke header
    $header = array_shift($rows);

    // data array kosong
    $data = [];

    // menganggabung tiap kolom ke masing-masing baris data
    foreach($rows as $row){
        // menggabugnkan data
            $data[] = array_combine($header, $row);
        }

       

    // masukkan ke session, agar dapat tersimpan ke databse nanti
    $request->session()->put('data_excel', $data);

    return view('excel.preview', [
        'header' => $header,
        'data' => $data
    ]);
    }


    public function simpanSiswa(Request $request){
        // ambil data dari session yang sudah dibuat di preview 
        $data = $request->session()->get('data_excel', []);

        // menyimpan ke siswa tabel siswa secara berurutan, kan datanya banyak 
        DB::transaction(function () use ($data){
            // setiap baris per data 
            foreach($data as $dt){
                Siswa::create([
                    'nis' => $dt['NIS'],
                    'nama' => $dt['Nama'],
                    'kelas' => $dt['Kelas']
                ]);
            }
        });

        // menghapus data yang ada di session 
        $request->session()->forget('data_excel');

        return redirect('/siswa')->with('success', 'Data siswa berhasil di tambah melalui impor data excel');
    }
}
