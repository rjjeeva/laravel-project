{{-- resources/views/welcome.blade.php --}}
@extends('layouts.app')

@section('title','Home')

@section('content')

<!-- HERO SLIDER -->
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="hero-slide" style="background-image:url('https://images.unsplash.com/photo-1502741338009-cac2772e18bc');">
        <div class="text-center">
          <h1 class="display-4 fw-bold">Fast Delivery</h1>
          <p class="lead">Pure Water Delivered to Your Doorstep</p>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <div class="hero-slide" style="background-image:url('https://images.unsplash.com/photo-1502741338009-cac2772e18bc');">
        <div class="text-center">
          <h1 class="display-4 fw-bold">Trusted Quality</h1>
          <p class="lead">Clean, Safe and Healthy Drinking Water</p>
        </div>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>

<!-- AVAILABLE CANS -->
<section class="py-5">
  <div class="container py-4">

   <h2 class="mb-4">Our Products</h2>

<div class="row">
    @foreach ($products as $product)
    <div class="col-md-3 mb-4">
        <div class="card shadow-sm">

            <img src="{{ asset('storage/'.$product->image) }}"
                class="card-img-top"
                style="height:200px;object-fit:cover">

            <div class="card-body">
                <h5 class="card-title">{{ $product->title }}</h5>
                <p class="text-muted">₹{{ $product->price }}</p>

               <a href="{{ route('product.details', $product->slug) }}" class="btn btn-primary btn-sm">View</a>

            </div>
        </div>
    </div>
    @endforeach
</div>

    </div>

  </div>
</section>


<!-- CUSTOMER REVIEWS -->
<section class="py-5 bg-light">
  <div class="container">
    <h2 class="fw-bold text-center mb-4">Customer Reviews</h2>
    <div class="row g-4">

      <div class="col-md-4">
        <div class="card h-100 shadow-sm p-3 text-center">
          <p class="fw-bold mb-1">⭐⭐⭐⭐⭐</p>
          <p>Super fast delivery and excellent water quality.</p>
          <small class="text-muted">- Ravi</small>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card h-100 shadow-sm p-3 text-center">
          <p class="fw-bold mb-1">⭐⭐⭐⭐</p>
          <p>Very affordable and reliable service.</p>
          <small class="text-muted">- Priya</small>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card h-100 shadow-sm p-3 text-center">
          <p class="fw-bold mb-1">⭐⭐⭐⭐⭐</p>
          <p>Using weekly! Highly satisfied.</p>
          <small class="text-muted">- Aravind</small>
        </div>
      </div>

    </div>
  </div>
</section>

@endsection