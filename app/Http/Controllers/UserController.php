<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataUser'] = User::all();

        return view('admin.user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // tambahkan validasi
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        User::create($data);

        return redirect()->route('user.index')->with('success', 'Penambahan Data Berhasil!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataUser = User::findOrFail($id);

        return view('admin.user.edit', compact('dataUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        // Tambahkan validasi
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|min:8|confirmed',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);


        // ---- Tambahan dari ProfileController (Upload Foto Profil) ----
        if ($request->hasFile('profile_picture')) {

            // Validasi file
            $request->validate([
                'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Hapus foto lama
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            // Upload foto baru
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $data['profile_picture'] = $path;
        }
        $user->update($data);

        return redirect()->route('user.index')->with('success', 'Perubahan Data Berhasil!');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        // hapus foto jika ada
        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
        }

        $user->delete();

        return redirect()->route('user.index')->with('success', 'Penghapusan Data Berhasil!');
    }
}
