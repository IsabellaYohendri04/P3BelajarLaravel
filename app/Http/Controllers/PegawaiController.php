<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $nama = "Isabella Yohendri";
        $tanggal_lahir = new \DateTime('2006-04-18');
        $tanggal_wisuda = new \DateTime('2027-07-20');
        $tanggal_sekarang = new \DateTime();

        $umur = $tanggal_sekarang->diff($tanggal_lahir)->y;

        $hobi = ["Mandi", "Makan", "Main Gitar", "Nyanyi", "Gaming"];

        $selisih_hari = $tanggal_sekarang->diff($tanggal_wisuda);
        $hari_menuju_wisuda = $selisih_hari->invert ? -$selisih_hari->days : $selisih_hari->days;

        $semester_sekarang = 3;

        $pesan = $semester_sekarang < 3
            ? "Yang Penting Jangan lupa minum "
            : "Sama jangan lupa makan";

        $cita_cita = "Menjadi Engineer";

        return view('pegawai', [
            'nama' => $nama,
            'umur' => $umur,
            'hobi' => $hobi,
            'tanggal_wisuda' => $tanggal_wisuda->format('Y-m-d'),
            'hari_menuju_wisuda' => $hari_menuju_wisuda,
            'semester_sekarang' => $semester_sekarang,
            'pesan' => $pesan,
            'cita_cita' => $cita_cita
        ]);
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $nama = "Isabella Yohendri";
        $tanggal_lahir = new \DateTime('2006-04-18');
        $tanggal_wisuda = new \DateTime('2027-07-20');
        $tanggal_sekarang = new \DateTime();

        $umur = $tanggal_sekarang->diff($tanggal_lahir)->y;

        $hobi = ["Mandi", "Makan", "Main Gitar", "Nyanyi", "Gaming"];

        $selisih_hari = $tanggal_sekarang->diff($tanggal_wisuda);
        $hari_menuju_wisuda = $selisih_hari->invert ? -$selisih_hari->days : $selisih_hari->days;

        $semester_sekarang = 3;

        $pesan = $semester_sekarang < 3
            ? "Yang Penting Jangan lupa minum "
            : "Sama jangan lupa makan";

        $cita_cita = "Menjadi Engineer";

        return view('pegawai', [
            'nama' => $nama,
            'umur' => $umur,
            'hobi' => $hobi,
            'tanggal_wisuda' => $tanggal_wisuda->format('Y-m-d'),
            'hari_menuju_wisuda' => $hari_menuju_wisuda,
            'semester_sekarang' => $semester_sekarang,
            'pesan' => $pesan,
            'cita_cita' => $cita_cita
        ]);
    }
}
