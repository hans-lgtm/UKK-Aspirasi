<x-app-layout>
    <div class="app">
        <div class="kategori-container">
            <h1>Kategori Siswa</h1>

            <a href="/siswa/create">Tambah Siswa</a>

            <div class="pilihan-tambah">
                {{-- bagian excel --}}
                <div class="excel">
                    <form action="/excel/preview" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="input">
                            <label for="input-excel">📁 Import File Excel</label>
                            <input type="file" id="input-excel" name="excel" accept=".xlsx, .xls" required>
                        </div>

                        <button type="submit">Preview Excel</button>

                    </form>
                </div>
            </div>

            <div class="table-wrapper">
                <table class="kategori-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $dt)
                        <tr>
                            <td class="garis">{{ $loop->iteration }}</td>
                            <td>{{ $dt->nis}}</td>
                            <td>{{ $dt->nama }}</td>
                            <td>{{ $dt->kelas }}</td>
                            <td class="aksi">
                                {{-- tombol hapus --}}
                               <form action="/siswa/{{ $dt->id }}" method="POST">
                                @csrf
                                @method('delete')

                                <button type="submit" onclick="confirm('Apakah anda yakin ingin mengahapus data ini? ')">
                                    Hapus
                                </button>
                               </form>

                               {{-- tombol edit --}}
                               <a href="/siswa/{{ $dt->id }}/edit" class="edit">Edit</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" style="text-align: center; color: #999;">Tidak ada data siswa</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>