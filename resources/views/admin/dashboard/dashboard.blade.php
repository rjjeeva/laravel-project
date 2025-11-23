@extends('admin.layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg p-5 text-center">
        <h1 class="fw-bold mb-3">Welcome Admin 🎉</h1>
        <p class="text-muted">Admin panel successfully loaded.</p>

        <a href="{{ route('admin.logout') }}" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
           class="btn btn-danger mt-4">
           Logout
        </a>

        <form id="logout-form" method="POST" action="{{ route('admin.logout') }}">
            @csrf
        </form>

    </div>
</div>
@endsection
 <!-- #region  -->