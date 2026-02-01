<x-app-layout>

    <div class="app">

        <div class="preview-excel">

            <h1>preview data dari import excel</h1>

            <table border="1">

                <thead>
                        <tr>
                            <th>No.</th>
                             @foreach ($header as $head )
                                <th>{{ $head }}</th>
                             @endforeach
                        </tr>
                    
                </thead>
                <tbody>
                    @foreach ($data as $dt )
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $dt['NIS'] }}</td>
                            <td>{{ $dt['Nama'] }}</td>
                            <td>{{ $dt['Kelas'] }}</td>
                        </tr>
                    @endforeach
            </table>

            <div class="button-container mt-5">
                <form action="/excel/simpan" method="POST" style="margin-right: 10px;">
                    @csrf
                    <button type="submit" class="btn btn-primary">
                        Simpan Data
                    </button>
                </form>

                <a href="/siswa" class="btn btn-secondary">
                    ← Kembali
                </a>
            </div>
        </div>

        

    </div>

</x-app-layout>