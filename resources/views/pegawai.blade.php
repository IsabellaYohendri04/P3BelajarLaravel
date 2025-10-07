<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f2f7ff;
            font-family: 'Poppins', sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.1);
        }
        h1 {
            color: #0d6efd;
            font-weight: bold;
        }
        .list-group-item {
            font-size: 16px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card p-4">
        <h1 class="text-center mb-4">📋 Data Pegawai</h1>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>Nama:</b> {{ $nama }}</li>
            <li class="list-group-item"><b>Umur:</b> {{ $umur }} tahun</li>
            <li class="list-group-item"><b>Hobi:</b>
                <ul>
                    @foreach($hobi as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </li>
            <li class="list-group-item"><b>Tanggal Wisuda:</b> {{ $tanggal_wisuda }}</li>
            <li class="list-group-item"><b>Hari Menuju Wisuda:</b> {{ $hari_menuju_wisuda }} hari lagi</li>
            <li class="list-group-item"><b>Semester Sekarang:</b> {{ $semester_sekarang }}</li>
            <li class="list-group-item"><b>Pesan:</b> <em>{{ $pesan }}</em></li>
            <li class="list-group-item"><b>Cita-cita:</b> {{ $cita_cita }}</li>
        </ul>
    </div>
</div>
</body>
</html>
