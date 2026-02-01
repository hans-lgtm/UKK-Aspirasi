<x-app-layout>
    <div class="app">

        <div class="siswa-create">

            <h1>Tambah siswa</h1>
            <form action="/siswa" method="POST">
                @csrf

                <div class="input">
                    <label for="nis">NIS</label>
                    <input type="text" name="nis" id="nis" placeholder="Masukkan NIS siswa" required maxlength="10">
                </div>

                <div class="input">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" placeholder="Masukkan nama siswa" required maxlength="150">
                </div>

                <div class="input">
                    <label for="kelas">Kelas</label>
                    <input type="text" name="kelas" id="kelas" placeholder="Masukkan kelas siswa" required maxlength="50">
                </div>

                <button type="submit">
                    Tambah
                </button>
            </form>
        </div>

    </div>
</x-app-layout>