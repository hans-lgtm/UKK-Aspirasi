<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi Aspirasi sekolah</title>
    {{-- untuk menyambungkan css --}}
    <link rel="stylesheet" href="{{ asset('styles/style.css') }}">
</head>
<body>

    <nav>
        <div class="nav-links">
            <a href="/">Home</a>

            <a href="/input-aspirasi/histori">Histori Input Histori</a>
        </div>
        
        <div class="nav-right">
            @if(Auth::guard('admin')->check())
                <a href="">List Aspirasi</a>

                <a href="/kategori">Kategori</a>

                <a href="/siswa">Siswa</a>

                <div class="active-admin">
                    <p>Admin</p>
                </div>
                <form action="/logout" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="btn-logout">Logout</button>
                </form>
            @else
            {{-- bukan admin /  --}}
                <a href="/input-aspirasi/create">Input Aspirasi</a>
                <a href="">List Aspirasi</a>
                <a href="/login" class="nav-login">Login</a>
            @endif    
        </div>
    </nav>

    @session('success')
        <div class="flash success" id="auto-hide-notification">
            {{ session('success') }}
        </div>
    @endsession

    @session('error')
        <div class="flash error" id="auto-hide-notification">
            {{ session('error') }}
        </div>
    @endsession

    @session('warning')
        <div class="flash warning" id="auto-hide-notification">
            {{ session('warning') }}
        </div>
    @endsession

    @session('info')
        <div class="flash info" id="auto-hide-notification">
            {{ session('info') }}
        </div>
    @endsession

    {{-- untuk menerima code apabila app-layout dipanggil --}}
    {{ $slot }}

    <script>
        // Fungsi untuk menyembunyikan notifikasi setelah 3 detik
        function autoHideNotification() {
            const notifications = document.querySelectorAll('#auto-hide-notification');
            
            notifications.forEach(notification => {
                // Set timeout untuk menambahkan kelas hide setelah 3 detik
                setTimeout(() => {
                    notification.classList.add('hide');
                    
                    // Hapus elemen dari DOM setelah animasi selesai
                    setTimeout(() => {
                        if (notification.parentNode) {
                            notification.parentNode.removeChild(notification);
                        }
                    }, 500); // Sesuaikan dengan durasi transisi CSS
                }, 3000); // 3000ms = 3 detik
            });
        }
        
        // Jalankan fungsi saat halaman selesai dimuat
        document.addEventListener('DOMContentLoaded', autoHideNotification);
        
        // Jika menggunakan Turbolinks atau Livewire
        if (typeof Livewire !== 'undefined') {
            Livewire.hook('message.processed', autoHideNotification);
        }
    </script>
</body>
</html>