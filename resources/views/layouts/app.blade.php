{{-- layouts/app.blade.php reusable layout for all pages --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title','Water Delivery System')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet" />
  <style>
    body { background:#f7f7f7; }
    .hero-slide {
      height:80vh;
      background-size:cover;
      background-position:center;
      display:flex;
      align-items:center;
      justify-content:center;
      color:#fff;
      text-shadow:0 2px 6px rgba(0,0,0,0.5);
    }
    .social-icons a { transition:0.3s; }
    .social-icons a:hover { color:#0dcaf0 !important; transform:scale(1.2); }
  </style>
  @yield('css')
</head>
<body class="d-flex flex-column min-vh-100">


{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="/"><i class="bi bi-droplet-half me-1"></i>WaterCan</a>

    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto">

        <!-- Common Menu -->
        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="/order">Order</a></li>
        <li class="nav-item"><a class="nav-link" href="/orders/history">History</a></li>

        <!-- If user is logged in -->
        @auth
        <li class="nav-item ms-3">
          <a href="/dashboard" class="nav-link">
            <i class="bi bi-person-circle fs-4 text-white"></i>
          </a>
        </li>
        @endauth

        <!-- If user is NOT logged in -->
        @guest
        <li class="nav-item"><a class="btn btn-light ms-2" href="/login">Login</a></li>
        <li class="nav-item"><a class="btn btn-warning ms-2" href="/register">Register</a></li>
        @endguest

      </ul>
    </div>
  </div>
</nav>


{{-- MAIN CONTENT --}}
<main>
  @yield('content')
</main>

{{-- FOOTER --}}
<footer class="bg-dark text-white pt-4">
  <div class="container text-center">
    <div class="row mb-3">
      <div class="col-md-4 mb-3">
        <h6 class="fw-bold">Quick Links</h6>
        <a href="/terms" class="d-block text-white-50 footer-link">Terms & Conditions</a>
        <a href="/privacy" class="d-block text-white-50 footer-link">Privacy Policy</a>
      </div>
      <div class="col-md-4 mb-3">
        <h6 class="fw-bold">Follow Us</h6>
        <div class="d-flex justify-content-center gap-3 social-icons">
          <a href="#" class="text-white"><i class="bi bi-facebook fs-4"></i></a>
          <a href="#" class="text-white"><i class="bi bi-instagram fs-4"></i></a>
          <a href="#" class="text-white"><i class="bi bi-youtube fs-4"></i></a>
          <a href="#" class="text-white"><i class="bi bi-linkedin fs-4"></i></a>
        </div>
      </div>
    </div>
    <p class="mb-0 small text-white-50">© 2025 WaterCan Delivery. All rights reserved.</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@yield('js')
</body>
</html>
