<?php
namespace App\Http\Controllers;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    // Memproses data form login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => [
                'required',
                'min:3',
                function ($attribute, $value, $fail) {
                    if (! preg_match('/[A-Z]/', $value)) {
                        $fail('Password harus mengandung minimal 1 huruf kapital.');
                    }
                },
            ],
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min'      => 'Password minimal 3 karakter.',
        ]);

        // Contoh cek login (username: admin, password: Admin123)
        if ($request->username === 'admin' && $request->password === 'Admin123') {
            // Jika sukses, arahkan ke halaman dashboard (bisa sesuaikan)
            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        }

        // Jika gagal, kembali ke login dengan pesan error
        return redirect()->route('auth.index')->withErrors(['login' => 'Username atau password salah'])->withInput();
    }
}
