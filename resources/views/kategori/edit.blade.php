<x-app-layout>
    <div class="app">
        <div class="kategori-container">
            <h1>Edit Kategori</h1>

            <form action="/kategori/{{ $data->id }}" method="POST" class="kategori-form">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="ket_kategori">Keterangan Kategori</label>
                    <input type="text" id="ket_kategori" name="ket_kategori" value="{{ $data->ket_kategori }}" required>
                </div>
                <button type="submit" class="btn-submit">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>