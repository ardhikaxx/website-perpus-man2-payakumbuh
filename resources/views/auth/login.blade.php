@extends('layouts.auth')

@section('title', 'Login - Sistem Perpustakaan MAN 2 Kota Payakumbuh')

@section('content')
    <div class="auth-container">
        <div class="auth-header">
            <img src="{{ asset('assets/logo-website.png') }}" alt="Logo MAN 2 Payakumbuh">
            <h4 class="fw-medium text-muted">Sistem Perpustakaan</h4>
            <h1 class="fw-bolder text-uppercase">MAN 2 Kota Payakumbuh</h1>
        </div>

        <div class="auth-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            name="email" placeholder="Masukkan email Anda" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group password-input-group">
                        <span class="input-group-text">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                            name="password" placeholder="Masukkan password Anda" required>
                        <button type="button" class="password-toggle" id="togglePassword" aria-label="Toggle password visibility">
                            <i class="fas fa-eye"></i>
                        </button>
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input border-2" id="remember" name="remember">
                        <label class="form-check-label text-dark fw-medium" for="remember">Ingat saya</label>
                    </div>
                    <div class="form-check">
                        <a href="" class="text-dark fw-bold text-decoration-none">Lupa Password?</a>
                    </div>
                </div>

                <button type="submit" class="btn btn-auth mb-3">
                    <i class="fas fa-sign-in-alt me-2"></i>Masuk
                </button>
            </form>

            <div class="auth-footer">
                <p>&copy; {{ date('Y') }} Perpustakaan MAN 2 KOTA PAYAKUMBUH. All rights reserved.</p>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');

            if (togglePassword && password) {
                togglePassword.addEventListener('click', function() {
                    const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                    password.setAttribute('type', type);
                    const icon = this.querySelector('i');
                    if (icon) {
                        icon.classList.toggle('fa-eye');
                        icon.classList.toggle('fa-eye-slash');
                    }
                });

                togglePassword.addEventListener('touchstart', function(e) {
                    e.preventDefault();
                });
            }
        });

        document.addEventListener('DOMContentLoaded', function() {
            let viewport = document.querySelector('meta[name="viewport"]');
            
            window.addEventListener('focusin', function() {
                viewport.setAttribute('content', 'width=device-width, initial-scale=1.0, user-scalable=no');
            });
            
            window.addEventListener('focusout', function() {
                viewport.setAttribute('content', 'width=device-width, initial-scale=1.0, user-scalable=yes');
            });
        });
    </script>
@endpush