{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')
@section('title','Dashboard')

@section('css')
<style>
  body { background:#eef2f7; }
  .dash-hero {
    padding:60px 0;
    background: linear-gradient(135deg,#4f8df9,#6bc6ff);
    color:#fff;
    border-radius:0 0 30px 30px;
    animation: fadeSlide 1s ease;
  }
  @keyframes fadeSlide {
    from { opacity:0; transform: translateY(-20px);} 
    to { opacity:1; transform: translateY(0);} 
  }
  .dash-card{
    border-radius:20px;
    transition:0.3s;
    background:#fff;
    box-shadow:0 4px 12px rgba(0,0,0,0.08);
  }
  .dash-card:hover{
    transform:translateY(-5px);
    box-shadow:0 6px 20px rgba(0,0,0,0.12);
  }
  .icon-circle{
    width:60px;
    height:60px;
    background:#4f8df9;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:50%;
    color:#fff;
    font-size:24px;
  }
</style>
@endsection

@section('content')

<div class="dash-hero text-center">
  <h2 class="fw-bold">Welcome, {{ auth()->user()->name ?? 'User' }} 👋</h2>
  <p class="mt-2">Manage your orders & account easily</p>
</div>

<div class="container mt-5">
  <div class="row g-4">

    <div class="col-md-4">
      <a href="/order" class="text-decoration-none text-dark">
        <div class="dash-card p-4 text-center">
          <div class="icon-circle mb-3"><i class="bi bi-bag-plus-fill"></i></div>
          <h5 class="fw-bold">Place New Order</h5>
          <p class="text-muted small">Order water cans instantly</p>
        </div>
      </a>
    </div>

    <div class="col-md-4">
      <a href="/orders/history" class="text-decoration-none text-dark">
        <div class="dash-card p-4 text-center">
          <div class="icon-circle mb-3"><i class="bi bi-clock-history"></i></div>
          <h5 class="fw-bold">Order History</h5>
          <p class="text-muted small">View your past orders</p>
        </div>
      </a>
    </div>

    <div class="col-md-4">
      <a href="/settings/profile" class="text-decoration-none text-dark">
        <div class="dash-card p-4 text-center">
          <div class="icon-circle mb-3"><i class="bi bi-person-fill"></i></div>
          <h5 class="fw-bold">My Profile</h5>
          <p class="text-muted small">Update your info</p>
        </div>
      </a>
    </div>

  </div>
</div>
@endsection
