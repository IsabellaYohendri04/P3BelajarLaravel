<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
 public function index(){
		$data['dataUser'] = User::all();
		return view('admin.user.index',$data);
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
    public function store(Request $request){

		// tambahkan validasi
		$request->validate([
			'name' => 'required|string|max:100',
			'email' => 'required|email|unique:users,email',
			'password' => 'required|min:8|confirmed',
		]);

		//dd($request->all());

		 $data['name'] = $request->name;
		 $data['email'] = $request->email;
		 $data['password'] = Hash::make($request->password);

        User::create($data);

		 return redirect()->route('user.index')->with('success','Penambahan Data Berhasil!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    $user_id = $id;
    $user = User::findOrFail($user_id);

    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->birthday = $request->birthday;
    $user->gender = $request->gender;
    $user->email = $request->email;
    $user->phone = $request->phone;

     $user = User::findOrFail($id);
    $user->update($request->all());
    return redirect()->route('user.index')->with('success', 'Perubahan Data Berhasil!');
}



    public function destroy(string $id)
    {
        $user= User:: findOrFail($id);
        $user-> delete();
         return redirect()->route('user.index')->with('success', 'Penghapusan Data Berhasil!');

    }
}
