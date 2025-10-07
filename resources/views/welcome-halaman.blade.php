<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Selamat Datang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="text-center">
        <h4>Selamat datang, {{ $username }} 👋</h4>
        <a href="/auth" class="btn btn-outline-primary mt-3">Kembali ke Login</a>
    </div>
</body>
</html>
