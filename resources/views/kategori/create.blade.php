<x-app-layout>
    <div class="app">

        <div class="kategori-create">

            <h1>Tambah kategori</h1>
            <form action="/kategori" method="POST">
                @csrf

                <div class="input">
                    {{-- <label for="ket_kategori">Keterangan Kategori</label> --}}
                    <textarea name="ket_kategori" id="ket_kategori" cols="30" rows="10" placeholder="Masukkan keterangan kategori" required></textarea>
                </div>

                <button type="submit">
                    Tambah
                </button>
            </form>
        </div>

    </div>
</x-app-layout>