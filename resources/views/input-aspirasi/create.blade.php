<x-app-layout>

    <div class="app">
        <div class="input-aspirasi-create">
            
            <h1>Membuat laporan pengaduan aspirasi</h1>

            <form action="/input-aspirasi" method="POST">
                @csrf


                {{-- NIS --}}
                <div class="input">
                    <label for="nis">NIS</label>
                    <input type="text" maxlength="10" inputmode="numeric" id="nis" name="nis" required>
                </div>

                {{-- kategori --}}
                <div class="input">
                    <label for="kategori_id">Kategori</label>
                    <select name="kategori_id" id="kategori_id" required>
                        <option value="" selected disabled>Pilih kategori</option>
                        @foreach ($kategori as $kt )
                            <option value="{{ $kt->id }}">{{ $kt->ket_kategori }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" name="lokasi" id="lokasi" required>
                </div>

                 <div class="input">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" cols="30" rows="10" required></textarea>
                </div>

                <button type="submit">
                    Laporkan Aspirasi
                </button>

            </form>

        </div>
    </div>

</x-app-layout>
