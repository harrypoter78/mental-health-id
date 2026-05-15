@extends('app')

@section('title', 'Login')

@section('content') 
<div class="row justify-content-center align-items-center w-100 m-0">
    <div class="col-md-5 col-lg-5">
        <div class="auth-container">
            {{-- Login Form --}}
            <div id="login-form" class="auth-form active">
                <div class="text-center mb-4">
                    <div class="auth-icon">
                        <i class="bi bi-box-arrow-in-right"></i>
                    </div>
                    <h2 class="auth-title">Selamat Datang</h2>
                    <p class="auth-subtitle">Masuk ke akun Anda</p>
                </div>

                <form method="POST" action="/login">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" value="{{ old('email') }}" required autofocus 
                               placeholder="Masukkan email Anda">
                        @error('email')
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label fw-bold">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                   id="password" name="password" required placeholder="Masukkan password Anda">
                            <button class="btn btn-outline-secondary toggle-password" type="button" data-target="#password">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        @error('password')
                            <small class="invalid-feedback d-block">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-auth w-100 fw-bold mb-3">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </button>
                </form>

                <div class="divider">
                    <span>Atau</span>
                </div>

                <p class="text-center text-muted mb-3">Belum punya akun? <a href="#" class="auth-toggle fw-bold" onclick="toggleAuthForm(event)">Daftar sekarang</a></p>

                <div class="alert alert-info small" role="alert">
                    <strong><i class="bi bi-info-circle"></i> Demo Credentials:</strong><br>
                    Email: admin@example.com<br>
                    Password: admin123
                </div>

                <div class="text-center mt-3">
                    <a href="/" class="text-muted small"><i class="bi bi-arrow-left"></i> Kembali ke Beranda</a>
                </div>
            </div>

            {{-- Register Form --}}
            <div id="register-form" class="auth-form">
                <div class="text-center mb-4">
                    <div class="auth-icon auth-icon-success">
                        <i class="bi bi-person-plus"></i>
                    </div>
                    <h2 class="auth-title">Buat Akun Baru</h2>
                    <p class="auth-subtitle">Bergabunglah dengan kami</p>
                </div>

                <form method="POST" action="/register">
                    @csrf

                    <div class="mb-3">
                        <label for="reg_name" class="form-label fw-bold">Nama Lengkap</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" 
                               id="reg_name" name="name" value="{{ old('name') }}" required
                               placeholder="Masukkan nama lengkap">
                        @error('name')
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="reg_email" class="form-label fw-bold">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" 
                               id="reg_email" name="email" value="{{ old('email') }}" required
                               placeholder="Masukkan email Anda">
                        @error('email')
                            <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="reg_password" class="form-label fw-bold">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" 
                                   id="reg_password" name="password" required
                                   placeholder="Minimal 6 karakter">
                            <button class="btn btn-outline-secondary toggle-password" type="button" data-target="#reg_password">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                        @error('password')
                            <small class="invalid-feedback d-block">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="reg_password_confirmation" class="form-label fw-bold">Konfirmasi Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" 
                                   id="reg_password_confirmation" name="password_confirmation" required
                                   placeholder="Ulangi password Anda">
                            <button class="btn btn-outline-secondary toggle-password" type="button" data-target="#reg_password_confirmation">
                                <i class="bi bi-eye"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-auth btn-auth-success w-100 fw-bold mb-3">
                        <i class="bi bi-person-plus"></i> Daftar
                    </button>
                </form>

                <div class="divider">
                    <span>Atau</span>
                </div>

                <p class="text-center text-muted mb-3">Sudah punya akun? <a href="#" class="auth-toggle fw-bold" onclick="toggleAuthForm(event)">Login di sini</a></p>

                <div class="text-center mt-3">
                    <a href="/" class="text-muted small"><i class="bi bi-arrow-left"></i> Kembali ke Beranda</a>
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
        flex-direction: column;
        align-items: center; 
        justify-content: center; 
        margin: 0 auto; 
        width: 100%; 
    }

    /* Auth Container Styling */
    .auth-container {
        width: 100%;
        perspective: 1000px;
    }

    .auth-form {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        padding: 40px;
        opacity: 0;
        transition: opacity 0.3s ease;
        display: none;
    }

    .auth-form.active {
        opacity: 1;
        display: block;
    }

    /* Auth Icon */
    .auth-icon {
        width: 60px;
        height: 60px;
        margin: 0 auto 20px;
        background: linear-gradient(135deg, #6f42c1 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 30px;
        color: white;
        box-shadow: 0 5px 15px rgba(111, 66, 193, 0.3);
    }

    .auth-icon-success {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
    }

    /* Auth Title & Subtitle */
    .auth-title {
        color: #333;
        font-weight: 700;
        margin-bottom: 8px;
        font-size: 28px;
    }

    .auth-subtitle {
        color: #999;
        font-size: 14px;
        margin-bottom: 0;
    }

    /* Form Controls */
    .form-control {
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        padding: 12px 15px;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #6f42c1;
        box-shadow: 0 0 0 0.2rem rgba(111, 66, 193, 0.15);
    }

    .form-control.is-invalid {
        border-color: #dc3545;
    }

    .form-control.is-invalid:focus {
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.15);
    }

    .form-label {
        color: #333;
        margin-bottom: 8px;
        font-size: 14px;
    }

    /* Input Group */
    .input-group .btn {
        border: 2px solid #e0e0e0;
        color: #6f42c1;
        transition: all 0.3s ease;
    }

    .input-group .form-control:focus + .btn {
        border-color: #6f42c1;
    }

    /* Auth Buttons */
    .btn-auth {
        background: linear-gradient(135deg, #6f42c1 0%, #764ba2 100%);
        color: white;
        border: none;
        padding: 12px 24px;
        font-weight: 600;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .btn-auth:hover {
        background: linear-gradient(135deg, #764ba2 0%, #6f42c1 100%);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(111, 66, 193, 0.3);
        color: white;
    }

    .btn-auth-success {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
    }

    .btn-auth-success:hover {
        background: linear-gradient(135deg, #20c997 0%, #28a745 100%);
        box-shadow: 0 8px 20px rgba(40, 167, 69, 0.3);
    }

    /* Divider */
    .divider {
        display: flex;
        align-items: center;
        margin: 25px 0;
        color: #999;
    }

    .divider::before,
    .divider::after {
        content: '';
        flex: 1;
        height: 1px;
        background: #e0e0e0;
    }

    .divider span {
        padding: 0 15px;
        font-size: 12px;
    }

    /* Auth Toggle Link */
    .auth-toggle {
        color: #6f42c1;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .auth-toggle:hover {
        color: #764ba2;
        text-decoration: underline;
    }

    /* Invalid Feedback */
    .invalid-feedback {
        font-size: 13px;
        margin-top: 5px;
        display: block;
        color: #dc3545;
    }

    /* Alert */
    .alert {
        border-radius: 10px;
        border: none;
        margin-top: 20px;
    }

    .alert-info {
        background-color: #f0f7ff;
        color: #004085;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .auth-form {
            padding: 30px 20px;
        }

        .auth-title {
            font-size: 24px;
        }
    }
</style>
@endsection

@section('scripts')
<script>
    function toggleAuthForm(event) {
        event.preventDefault();
        const loginForm = document.getElementById('login-form');
        const registerForm = document.getElementById('register-form');
        
        loginForm.classList.toggle('active');
        registerForm.classList.toggle('active');
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Determine which form to show based on errors
        // If there's a 'name' error, it's from register form
        // If there's a 'password_confirmation' old value, it's from register form
        // Otherwise stay on login form
        const hasNameError = document.querySelector('#reg_name.is-invalid') !== null;
        const hasPasswordConfirmationValue = @json(old('password_confirmation')) !== null;
        
        const shouldShowRegister = hasNameError || hasPasswordConfirmationValue;
        
        if (shouldShowRegister) {
            const loginForm = document.getElementById('login-form');
            const registerForm = document.getElementById('register-form');
            loginForm.classList.remove('active');
            registerForm.classList.add('active');
        }

        // Handle password visibility toggle
        const togglePasswordBtns = document.querySelectorAll('.toggle-password');
        togglePasswordBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('data-target');
                const passwordInput = document.querySelector(targetId);
                const icon = this.querySelector('i');

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    icon.classList.remove('bi-eye');
                    icon.classList.add('bi-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    icon.classList.remove('bi-eye-slash');
                    icon.classList.add('bi-eye');
                }
            });
        });
    });
</script>
@endsection