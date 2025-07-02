<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Ambil kredensial dari request
        $credentials = $request->only('username', 'password');

        // Coba autentikasi
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate(); // mencegah session fixation

            $user = Auth::user(); // dapatkan user setelah login
            // dd($user);

            // Arahkan berdasarkan role
            switch ($user->role) {
                case 'admin':
                    return redirect()->intended('/');
                case 'pegawai_unit_kerja':
                case 'pimpinan_unit_kerja':
                case 'pimpinan_bkn':
                    return redirect()->intended('/skp');
                case 'pegawai_bkn':
                    return redirect()->intended('/buat-surat');
                default:
                    Auth::logout();
                    return back()->withErrors([
                        'username' => 'Role tidak dikenali.',
                    ]);
            }
        }

        // Jika gagal login
        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->withInput();
    }


    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}
