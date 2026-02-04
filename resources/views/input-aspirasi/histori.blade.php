<x-app-layout>

    <div class="app">

        <div class="input-aspirasi-histori">

            <h1>Histori Input Aspirasi</h1>

            <h3>Cari berdasarkan : </h3>

            <div class="pencarian-histori-aspirasi">

                <form action="">

                    <div class="inputt" method="GET">
                        <label for="cari-tanggal">Tanggal</label>
                        <input type="date" maxlength="10" id="cari-tanggal" name="cari-tanggal" value="{{ request('cari-tanggal') }}">
                        <p>Jika mencari dengan tanggal, maka pencarian bulan akan dibatalkan</p>
                    </div>

                    <div class="inputt">
                        <label for="cari-bulan">Bulan</label>
                        <input type="month" id="cari-bulan" name="cari-bulan" value="{{ request('cari-bulan') }}">
                        <p>Jikas mencari dengan bulan, maka pencarian tanggal akan dibatalkan</p>
                    </div>

                    <div class="inputt">
                        <label for="cari-siswa">Siswa</label>
                        <input type="text" id="cari-siswa" name="cari-siswa" value="{{ request('cari-siswa') }}">
                    </div>

                    <div class="inputt">
                        <label for="cari-kategori">Kategori</label>
                        <input type="text" id="cari-kategori" name="cari-kategori" value="{{ request('cari-kategori') }}">
                    </div>

                    <button type="submit">Cari </button>

                </form>
            </div>

            <table border="2">

                <thead>
                    <tr>
                        <th>No Pelaporan</th>
                        <th>Nama Siswa</th>
                        <th>Kategori</th>
                        <th>Lokasi</th>
                        <th>Keterangan</th>
                        <th>Dibuat pada</th>
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
                            <td>{{ $dt->created_at->format('d-m-Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
</x-app-layout>