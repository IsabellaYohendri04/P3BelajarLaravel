<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($param1)
    {
        return "Selamat Datang Mahasiswa !" . $param1;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($param1)
    {
        return "Hai ini create" . $param1;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(string $param1 = '')
    {
        if ($param1 == 'ST445') {
            return view('halaman-st445');
        } else if ($param1) {
            return 'Ini adalah ' . $param1;
        } else {
            return view('halaman-404');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $param1)
    {
        return "Hai ini edit" . $param1;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $param1)
    {
        return "Hai ini hapus" . $param1;
    }
}
