<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\RedirectResponse;

class LoginController extends Controller
{
    public function tampillogin()
    //buat show.blade.php lebih dulu di folder show
    {
        return view('login.show');
    }

    public function authenticate(Request $request): RedirectResponse{
        // pastika ada data admin (buat dulu table admin)
        // buat model admin
        // lalu isi data lewat seeder

        // akan menerima data username dan password
        $creedentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);
        
    //    agar bisa login table admin
    // pastikan sudah mengatur model admin menjadi authenticatable
    // dan mengatur guard pada config agar auth kenal dengan admin 

    // mengecek data yang dimasukan 
        if (Auth::guard('admin')->attempt($creedentials)) {
            // membuat session
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        // apabila salah username atau password
        return back()->withErrors([
            'username' => 'Terdapat kesalahan'
        ])->onlyInput('username');
    }

    public function logout(Request $request): RedirectResponse{
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}
