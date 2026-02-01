{{-- untuk menampilkan halaman login --}}

<x-app-layout>
    <div class="app">
        <div class="login">
            <h1>Login Admin</h1>

            <form action="/login" method="POST">
                @csrf

                <div>
                    <label for="username">Username</label>
                    <input 
                        type="text" 
                        id="username" 
                        name="username" 
                        placeholder="Masukkan username"
                        required>      
                </div>

                <div>
                    <label for="password">Password</label>
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        placeholder="Masukkan password"
                        required>
                </div>

                <button type="submit">Login</button>

                @error('username')
                    <div class="error">{{ $message }}</div>
                @enderror
            </form>
        </div>
    </div>
</x-app-layout>