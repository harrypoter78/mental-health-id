@extends('app')

@section('title', 'Admin Login')

@section('content') 
{{-- Tambahkan w-100 dan m-0 pada row agar tidak menyusut saat di dalam flex container --}}
<div class="row justify-content-center align-items-center w-100 m-0">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0 text-center"><i class="bi bi-shield-lock"></i> Admin Login</h4>
            </div>
            <div class="card-body p-5">
                <form method="POST" action="/login">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-bold">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                               id="password" name="password" required>
                        @error('password')
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100 fw-bold">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </button>
                </form>

                <hr>

                <div class="alert alert-info small" role="alert">
                    <strong>Demo Credentials:</strong><br>
                    Email: admin@example.com<br>
                    Password: admin123
                </div>

                <div class="text-center mt-3">
                    <a href="/" class="text-muted">Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Pastikan body mengisi penuh layar */
    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }
    
    /* Buat container-main mengisi sisa ruang kosong dan menengahkan konten */
    .container-main {
        flex: 1; 
        display: flex; 
        flex-direction: column; /* <--- TAMBAHKAN BARIS INI */
        align-items: center; 
        justify-content: center; 
        margin: 0 auto; 
        width: 100%; 
    }
    
    /* Opsional: Agar kotak error lebarnya tidak terlalu kecil atau kepanjangan, 
       samakan maksimal lebarnya dengan form login */
    .container-main > .alert {
        width: 100%;
        max-width: 500px; /* Menyesuaikan dengan lebar form kira-kira */
        margin-bottom: 20px;
    }
</style>
@endsection