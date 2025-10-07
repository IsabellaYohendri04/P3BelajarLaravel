<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $name = "Isabella Yohendri";
        $birth_date = new \DateTime('2006-04-18');
        $tgl_harus_wisuda = new \DateTime('2027-07-20');
        $today = new \DateTime();

        $my_age = $today->diff($birth_date)->y;

        $hobbies = ["Mandi", "Makan", "Main Gitar", "Nyanyi", "Gaming"];

        $selisih_hari = $today->diff($tgl_harus_wisuda);
        $time_to_study_left = $selisih_hari->invert ? -$selisih_hari->days : $selisih_hari->days;

        $current_semester = 3;

        $info = $current_semester < 3
            ? "Masih Awal, Kejar TAK!"
            : "Jangan main-main, kurang-kurangi main game!";

        $future_goal = "Menjadi Engineer";

        return view('pegawai', [
            'name' => $name,
            'my_age' => $my_age,
            'hobbies' => $hobbies,
            'tgl_harus_wisuda' => $tgl_harus_wisuda->format('Y-m-d'),
            'time_to_study_left' => $time_to_study_left,
            'current_semester' => $current_semester,
            'info' => $info,
            'future_goal' => $future_goal
        ]);
    }
}
