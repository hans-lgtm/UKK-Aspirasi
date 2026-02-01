<x-app-layout>

    <div class="app">
        <div class="input-aspirasi-create">
            
            <h1>Membuat laporan pengaduan aspirasi</h1>

            <form action="">

                {{-- NIS --}}
                <div class="input">
                    <label for="nis">NIS</label>
                    <input type="text" maxlength="10" inputmode="numeric" id="nis" name="nis">
                </div>

                {{-- kategori --}}
                <div class="input">
                    <label for="kategori_id">Kategori</label>
                    <select name="kategori_id" id="kategori_id">
                        <option value="" selected disabled>Pilih kategori</option>
                        <option value="">Bahan bahan elektronik</option>
                        <option value="">bahan bahan rpl</option>
                    </select>
                </div>

                <div class="input">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" name="lokasi" id="lokasi">
                </div>

                 <div class="input">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" cols="30" rows="10"></textarea>
                </div>

                <button type="submit">
                    Laporkan Aspirasi
                </button>

            </form>

        </div>
    </div>

</x-app-layout>
