@extends('layouts.admin.app')
@section('title', 'Edit User')
@section('content')

<div class="py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="#">
                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active">Edit User</li>
        </ol>
    </nav>

    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Edit User</h1>
            <p class="mb-0">Form untuk mengubah data pengguna.</p>
        </div>
        <div>
            <a href="{{ route('user.index') }}" class="btn btn-primary">
                <i class="far fa-question-circle me-1"></i> Kembali
            </a>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12 mb-4">
        <div class="card border-0 shadow components-section">
            <div class="card-body">

                {{-- Pesan sukses --}}
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                {{-- Pesan error --}}
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                {{-- Form Update --}}
                <form action="{{ route('user.update', $dataUser->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row mb-4">

                        {{-- Kolom kiri --}}
                        <div class="col-lg-4 col-sm-6">

                            {{-- Nama --}}
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $dataUser->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $dataUser->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Kolom tengah --}}
                        <div class="col-lg-4 col-sm-6">

                            {{-- Password --}}
                            <div class="mb-3">
                                <label class="form-label">Password (Opsional)</label>
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Isi jika ingin mengganti password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Konfirmasi Password --}}
                            <div class="mb-3">
                                <label class="form-label">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    placeholder="Ulangi password baru">
                                @error('password_confirmation')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Kolom kanan --}}
                        <div class="col-lg-4 col-sm-6">

                            {{-- Role --}}
                            <div class="mb-3">
                                <label class="form-label">Pilih Role</label>
                                <select name="role" class="form-control" required>
                                    <option value="">-- Pilih --</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}"
                                            {{ $dataUser->hasRole($role->name) ? 'selected' : '' }}>
                                            {{ ucfirst($role->name) }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Foto --}}
                            <div class="mb-3">
                                <label class="form-label fw-bold">Foto Profil</label>

                                @if ($dataUser->avatar)
                                    <div class="card card-shadow-sm mb-2">
                                        <div class="card-body text-center p-3">
                                            <img src="{{ asset('storage/' . $dataUser->avatar) }}"
                                                class="img-fluid rounded mb-2"
                                                style="max-height: 150px; object-fit: cover;">
                                            <p class="small text-muted mb-0">Foto saat ini</p>
                                        </div>
                                    </div>
                                @endif

                                <input type="file" name="avatar" class="form-control">
                                <div class="form-text text-muted">
                                    Kosongkan jika tidak ingin mengubah foto. <br>
                                    Format: JPG, PNG, JPEG. Maks: 2MB.
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- Submit --}}
                    <div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan!</button>
                        <a href="{{ route('user.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

@endsection

<script>
    function previewFile() {
        const file = document.getElementById("profile_picture")?.files[0];
        const preview = document.getElementById("previewImage");

        if (file && preview) {
            preview.src = URL.createObjectURL(file);
        }
    }
</script>
