<x-app-layout>
    <div class="app">
        <div class="kategori-container">
            <h1>Edit Siswa</h1>

            <form action="/siswa/{{ $data->id }}" method="POST" class="kategori-form">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nis">NIS</label>
                    <input type="text" name="nis" id="nis" value="{{ $data->nis }}" required maxlength="10">
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" value="{{ $data->nama }}" required maxlength="100">
                </div>
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" name="kelas" id="kelas" value="{{ $data->kelas }}" required maxlength="50">
                </div>
                <button type="submit" class="btn-submit">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>