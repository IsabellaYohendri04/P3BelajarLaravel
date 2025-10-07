<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.'
        ]);

        $username = $request->username;
        $password = $request->password;


        $userDB = [
            'username' => 'Isabella',
            'password' => 'Admin123'
        ];

        if ($username === $userDB['username'] && $password === $userDB['password']) {
            return view('welcome-halaman', ['username' => $username]);
        } else {
            return back()->with('error', 'Username atau password salah.');
        }
    }
}
