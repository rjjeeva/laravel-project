@extends('layouts.app') {{-- or create a separate minimal admin-auth layout if you want --}}

@section('title','Admin Login')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height:80vh; background:#020617;">
    <div class="card border-0 shadow-lg p-4"
         style="max-width:420px; width:100%; border-radius:24px;
                background:rgba(15,23,42,0.85); color:#e5e7eb;
                backdrop-filter:blur(18px);">
        <h3 class="fw-bold text-center mb-1">
            <i class="bi bi-droplet-half text-info me-2"></i> Admin Login
        </h3>
        <p class="text-center text-secondary mb-4 small">
            WaterCan management access
        </p>

        @if ($errors->any())
            <div class="alert alert-danger small py-2">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label small">Email</label>
                <input type="email" name="email" class="form-control form-control-lg"
                       value="{{ old('email') }}" required autofocus>
            </div>
            <div class="mb-3">
                <label class="form-label small">Password</label>
                <input type="password" name="password" class="form-control form-control-lg" required>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label small" for="remember">
                    Remember me
                </label>
            </div>

            <button class="btn btn-info w-100 py-2 fw-semibold">
                <i class="bi bi-box-arrow-in-right me-1"></i> Login
            </button>
        </form>
    </div>
</div>
@endsection
