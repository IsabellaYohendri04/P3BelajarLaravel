<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $input = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($input)) {
            // Regenerasi session setelah login berhasil untuk mencegah Session Fixation
            $request->session()->regenerate();

            // Arahkan ke rute yang dituju sebelumnya, atau ke '/dashboard' sebagai default
            return redirect()->intended('/dashboard');
        }

        // Jika Login Gagal, kembalikan user ke halaman sebelumnya dengan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Proses Logout
    public function logout(Request $request)
    {
        // Logout user
        Auth::logout();

        // Invalidate (hapus) session user saat ini
        $request->session()->invalidate();

        // Regenerasi token CSRF (Token) baru
        $request->session()->regenerateToken();

        // Redirect user ke halaman utama ('/')
        return redirect('/');
    }
}