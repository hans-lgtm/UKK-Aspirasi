<x-app-layout>
    <div class="app">
        <div class="kategori-container">
            <h1>Data Kategori</h1>

            <a href="/kategori/create">Tambah kategori</a>

            <div class="table-wrapper">
                <table class="kategori-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Keterangan Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $dt)
                        <tr>
                            <td class="garis">{{ $loop->iteration }}</td>
                            <td>{{ $dt->ket_kategori }}</td>
                            <td class="aksi">
                                {{-- tombol hapus --}}
                               <form action="/kategori/{{ $dt->id }}" method="POST">
                                @csrf
                                @method('delete')

                                <button type="submit" onclick="confirm('Apakah anda yakin ingin mengahapus data ini? ')">
                                    Hapus
                                </button>
                               </form>

                               {{-- tombol edit --}}
                               <a href="/kategori/{{ $dt->id }}/edit" class="edit">Edit</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" style="text-align: center; color: #999;">Tidak ada data kategori</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>