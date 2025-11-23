{{-- resources/views/auth/login.blade.php --}}
@extends('layouts.app')

@section('title', 'Login')

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
        max-width: 420px;
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
        width: 140px;
        height: 140px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.12);
        filter: blur(4px);
        z-index: -1;
    }
    .glass-card::before {
        top: -40px;
        left: -40px;
    }
    .glass-card::after {
        bottom: -40px;
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

    .auth-toggle {
        display: flex;
        gap: 6px;
        background: rgba(0, 0, 0, 0.12);
        border-radius: 999px;
        padding: 4px;
        margin-bottom: 18px;
    }
    .auth-toggle button {
        flex: 1;
        border: none;
        background: transparent;
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.85rem;
        padding: 8px 0;
        border-radius: 999px;
        cursor: pointer;
        transition: 0.25s;
    }
    .auth-toggle button.active {
        background: rgba(255, 255, 255, 0.3);
        color: #10203c;
        font-weight: 600;
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
        background: linear-gradient(135deg, #35d1ff, #007bff);
        color: #fff;
        box-shadow: 0 10px 24px rgba(0, 123, 255, 0.45);
        transition: 0.2s transform, 0.2s box-shadow;
    }
    .btn-glass:hover {
        transform: translateY(-1px);
        box-shadow: 0 14px 32px rgba(0, 123, 255, 0.6);
    }

    .otp-input-group {
        display: flex;
        gap: 10px;
        justify-content: center;
        margin-bottom: 16px;
    }

    .otp-input {
        width: 52px;
        height: 52px;
        text-align: center;
        font-size: 20px;
        border-radius: 14px !important;
    }

    .text-link {
        color: #ffe680;
        font-size: 0.85rem;
        text-decoration: none;
    }
    .text-link:hover {
        text-decoration: underline;
    }

    .small-helper {
        font-size: 0.78rem;
        color: rgba(255,255,255,0.7);
    }
</style>
@endsection

@section('content')
<div class="auth-wrapper">
    <div class="glass-card">
        <div class="mb-2 text-center">
            <span class="badge bg-info bg-opacity-75 rounded-pill px-3 py-1 mb-2">
                <i class="bi bi-droplet-half me-1"></i> WaterCan Login
            </span>
        </div>
        <h2 class="auth-title">Welcome back 👋</h2>
        <p class="auth-sub">Login with mobile OTP or your email & password</p>

        {{-- Toggle buttons --}}
        <div class="auth-toggle">
            <button type="button" id="btnMobile" class="active" onclick="switchLogin('mobile')">
                Mobile OTP
            </button>
            <button type="button" id="btnEmail" onclick="switchLogin('email')">
                Email Login
            </button>
        </div>

        {{-- Mobile OTP LOGIN (UI only for now) --}}
        <div id="mobileLogin">
            <div class="mb-3">
                <label class="form-label">Mobile Number</label>
                <input type="text" class="form-control" placeholder="Enter mobile number" maxlength="10">
                <div class="small-helper mt-1">OTP will be sent to this number.</div>
            </div>

            <button type="button" class="btn-glass mb-3" onclick="showOtpBox()">
                Send OTP
            </button>

            <div id="otpArea" style="display:none;">
                <div class="otp-input-group">
                    <input type="text" class="form-control otp-input" maxlength="1">
                    <input type="text" class="form-control otp-input" maxlength="1">
                    <input type="text" class="form-control otp-input" maxlength="1">
                    <input type="text" class="form-control otp-input" maxlength="1">
                </div>
                <button type="button" class="btn-glass mb-2" onclick="fakeOtpLogin()">
                    Verify & Login
                </button>
                <div class="text-center small-helper">
                    Didn’t get OTP? <a href="javascript:void(0)" class="text-link">Resend</a>
                </div>
            </div>
        </div>

        {{-- EMAIL + PASSWORD LOGIN (REAL Fortify form) --}}
        <div id="emailLogin" style="display:none;">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input id="email" type="email"
                           class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                           placeholder="you@example.com">

                    @error('email')
                    <div class="small text-warning mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label class="form-label" for="password">Password</label>
                    <input id="password" type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           name="password" required autocomplete="current-password"
                           placeholder="••••••••">
                    @error('password')
                    <div class="small text-warning mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="form-check small">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember">
                        <label class="form-check-label text-white-50" for="remember">
                            Remember me
                        </label>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="text-link" href="{{ route('password.request') }}">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <button type="submit" class="btn-glass">
                    Login
                </button>
            </form>
        </div>

        <div class="mt-3 text-center small-helper">
            New to WaterCan?
            <a href="{{ route('register') }}" class="text-link">Create an account</a>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    function switchLogin(type) {
        const mobileBox = document.getElementById('mobileLogin');
        const emailBox  = document.getElementById('emailLogin');
        const btnMobile = document.getElementById('btnMobile');
        const btnEmail  = document.getElementById('btnEmail');

        if (type === 'mobile') {
            mobileBox.style.display = 'block';
            emailBox.style.display  = 'none';
            btnMobile.classList.add('active');
            btnEmail.classList.remove('active');
        } else {
            mobileBox.style.display = 'none';
            emailBox.style.display  = 'block';
            btnMobile.classList.remove('active');
            btnEmail.classList.add('active');
        }
    }

    function showOtpBox() {
        document.getElementById('otpArea').style.display = 'block';
    }

    function fakeOtpLogin() {
        // Ippo just UI demo da – later real OTP logic potalaam
        alert('OTP verified (demo). Implement real login later.');
    }
</script>
@endsection
