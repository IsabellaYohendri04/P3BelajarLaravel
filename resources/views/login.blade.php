<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f9ff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Poppins', sans-serif;
        }
        .card {
            width: 380px;
            border-radius: 15px;
            box-shadow: 0px 6px 15px rgba(0,0,0,0.1);
        }
        .btn-primary {
            width: 100%;
            border-radius: 10px;
        }
        h3 {
            color: black;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="card p-4">
    <h3 class="text-center mb-4">Form Login</h3>
    @if(session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif

    <form action="/auth/login" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Masukkan username.." required>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Masukkan password.." required>
        </div>

        <button type="submit" class="btn btn-danger mt-2">Login</button>
    </form>
</div>

</body>
</html>
