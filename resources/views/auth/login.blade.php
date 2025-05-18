@extends('themes.warungSoto.layouts.app')

@section('content')
<div class="container py-5" style="min-height: 80vh;">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header text-center bg-white border-0">
                    <h3 class="fw-bold">{{ __('Login') }}</h3>
                    <p class="text-muted mb-0">Selamat datang kembali! Silakan masuk untuk melanjutkan.</p>
                </div>

                <div class="card-body px-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autofocus>
                            @error('email')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password" required>
                            @error('password')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                   {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-warning rounded-pill fw-bold">
                                {{ __('Login') }}
                            </button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link text-decoration-none" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-center mt-3">
                <p class="text-muted">Belum punya akun?
                    <a href="{{ route('register') }}" class="text-decoration-none fw-semibold">Daftar sekarang</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
