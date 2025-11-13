<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email'    => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $user = User::where('email', $request->email)->first();

        // Jika email tidak ditemukan
        if (! $user) {
            return back()->withErrors(['login' => 'Email tidak ditemukan.'])->withInput();
        }

        // Jika password salah
        if (! Hash::check($request->password, $user->password)) {
            return back()->withErrors(['login' => 'Password yang Anda masukkan salah.'])->withInput();
        }

        // Jika berhasil login
        session([
            'user_id'    => $user->id,
            'user_name'  => $user->name,
            'user_email' => $user->email,
        ]);

        return view('admin.dashboard', [
            'title' => 'Dashboard',
            'user'  => $user,
        ])->with('success', 'Login berhasil!');
    }

    public function logout()
    {
        session()->flush();
        return redirect()->route('auth.index')->with('success', 'Logout berhasil!');
    }
}
