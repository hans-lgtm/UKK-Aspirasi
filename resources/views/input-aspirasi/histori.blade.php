<x-app-layout>

    <div class="app">

        <div class="input-aspirasi-histori">

            <h1>Histori Input Aspirasi</h1>

            <table border="2">

                <thead>
                    <tr>
                        <th>No Pelapor</th>
                        <th>Nama Siswa</th>
                        <th>Kategori</th>
                        <th>Lokasi</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $dt )
                        <tr>
                            <td>P{{ $dt->id }}</td>
                            <td>{{ $dt->siswa->nama }}</td>
                            <td>{{ $dt->kategori->ket_kategori }}</td>
                            <td>{{ $dt->lokasi }}</td>
                            <td>{{ $dt->keterangan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
</x-app-layout>