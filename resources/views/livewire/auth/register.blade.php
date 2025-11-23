{{-- resources/views/auth/register.blade.php --}}
@extends('layouts.app')

@section('title', 'Register')

@section('css')
<style>
    body {
        background: radial-gradient(circle at top, #52b6ff, #1b2a4a 60%);
    }

    .auth-wrapper {
        min-height: calc(100vh - 120px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 15px;
    }

    .glass-card {
        width: 100%;
        max-width: 460px;
        border-radius: 22px;
        padding: 26px 24px 28px;
        background: rgba(255, 255, 255, 0.14);
        backdrop-filter: blur(18px);
        -webkit-backdrop-filter: blur(18px);
        border: 1px solid rgba(255, 255, 255, 0.25);
        box-shadow: 0 14px 40px rgba(0, 0, 0, 0.35);
        color: #fff;
        position: relative;
        overflow: hidden;
        animation: popIn 0.6s ease-out;
    }

    .glass-card::before,
    .glass-card::after {
        content: "";
        position: absolute;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.12);
        filter: blur(4px);
        z-index: -1;
    }
    .glass-card::before {
        top: -50px;
        left: -40px;
    }
    .glass-card::after {
        bottom: -50px;
        right: -40px;
    }

    @keyframes popIn {
        from { opacity: 0; transform: translateY(20px) scale(0.98); }
        to   { opacity: 1; transform: translateY(0) scale(1); }
    }

    .auth-title {
        font-weight: 600;
        font-size: 1.4rem;
        text-align: center;
        margin-bottom: 4px;
    }
    .auth-sub {
        font-size: 0.9rem;
        text-align: center;
        color: rgba(255,255,255,0.75);
        margin-bottom: 18px;
    }

    .form-label {
        font-size: 0.85rem;
        color: rgba(255,255,255,0.85);
    }

    .form-control,
    .form-control:focus {
        border-radius: 12px;
        border: 1px solid rgba(255,255,255,0.35);
        background: rgba(8, 15, 40, 0.25);
        color: #fff;
        box-shadow: none;
    }

    .form-control::placeholder {
        color: rgba(255,255,255,0.5);
    }

    .btn-glass {
        width: 100%;
        border-radius: 12px;
        padding: 10px;
        font-weight: 600;
        border: 1px solid rgba(255,255,255,0.55);
        background: linear-gradient(135deg, #00d492, #00a86b);
        color: #fff;
        box-shadow: 0 10px 24px rgba(0, 168, 107, 0.45);
        transition: 0.2s transform, 0.2s box-shadow;
    }
    .btn-glass:hover {
        transform: translateY(-1px);
        box-shadow: 0 14px 32px rgba(0, 168, 107, 0.6);
    }

    .small-helper {
        font-size: 0.78rem;
        color: rgba(255,255,255,0.7);
    }

    .text-link {
        color: #ffe680;
        font-size: 0.85rem;
        text-decoration: none;
    }
    .text-link:hover {
        text-decoration: underline;
    }
</style>
@endsection

@section('content')
<div class="auth-wrapper">
    <div class="glass-card">
        <div class="mb-2 text-center">
            <span class="badge bg-success bg-opacity-75 rounded-pill px-3 py-1 mb-2">
                <i class="bi bi-person-plus me-1"></i> Create WaterCan Account
            </span>
        </div>

        <h2 class="auth-title">Register</h2>
        <p class="auth-sub">Fill your details to start ordering water cans</p>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="row g-3 mb-1">
                <div class="col-md-6">
                    <label class="form-label" for="name">Full Name</label>
                    <input id="name" type="text"
                           class="form-control @error('name') is-invalid @enderror"
                           name="name" value="{{ old('name') }}" required autocomplete="name"
                           placeholder="Your name">
                    @error('name')
                    <div class="small text-warning mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label" for="mobile">Mobile Number</label>
                    <input id="mobile" type="text"
                           class="form-control @error('mobile') is-invalid @enderror"
                           name="mobile" value="{{ old('mobile') }}" required
                           placeholder="10-digit mobile">
                    @error('mobile')
                    <div class="small text-warning mt-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="email">Email</label>
                <input id="email" type="email"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}" required autocomplete="email"
                       placeholder="you@example.com">
                @error('email')
                <div class="small text-warning mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="row g-3">
                <div class="col-md-6 mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input id="password" type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           name="password" required autocomplete="new-password"
                           placeholder="Minimum 8 characters">
                    @error('password')
                    <div class="small text-warning mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                    <input id="password_confirmation" type="password"
                           class="form-control"
                           name="password_confirmation" required autocomplete="new-password"
                           placeholder="Re-enter password">
                </div>
            </div>

            <button type="submit" class="btn-glass mb-2">
                Create Account
            </button>

            <div class="text-center small-helper">
                Already have an account?
                <a href="{{ route('login') }}" class="text-link">Login</a>
            </div>
        </form>
    </div>
</div>
@endsection
