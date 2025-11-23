<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Admin Panel')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: #0f172a;
            color: #e5e7eb;
            min-height: 100vh;
        }
        .admin-wrapper {
            display: flex;
            min-height: 100vh;
        }
        .admin-sidebar {
            width: 240px;
            background: linear-gradient(180deg,#111827,#020617);
            padding: 20px 15px;
            position: sticky;
            top: 0;
            height: 100vh;
        }
        .admin-logo {
            font-weight: 700;
            color: #38bdf8;
            font-size: 22px;
            margin-bottom: 25px;
        }
        .admin-nav a {
            color: #9ca3af;
            text-decoration: none;
            display: block;
            padding: 10px 12px;
            border-radius: 10px;
            margin-bottom: 6px;
            transition: .2s;
        }
        .admin-nav a:hover,
        .admin-nav a.active {
            background: rgba(56,189,248,0.1);
            color: #e5e7eb;
        }
        .admin-content {
            flex: 1;
            padding: 20px 24px;
            background: radial-gradient(circle at top left, #1e293b, #020617);
        }
        .admin-topbar {
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:25px;
        }
        .card-glass {
            background: rgba(15,23,42,0.85);
            border-radius: 18px;
            border: 1px solid rgba(148,163,184,0.3);
            box-shadow: 0 18px 45px rgba(15,23,42,0.6);
        }
    </style>

    @yield('css')
</head>
<body>
<div class="admin-wrapper">

    {{-- Sidebar --}}
    <aside class="admin-sidebar">
        <div class="admin-logo">
            <i class="bi bi-droplet-half me-1"></i> WaterCan Admin
        </div>

        <nav class="admin-nav">
            <a href="{{ route('admin.dashboard') }}"
               class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
              <a href="{{ route('admin.orders') }}"  class="{{ request()->routeIs('admin.orders') ? 'active' : '' }}">
      <i class="bi bi-bag-check me-2"></i> Orders
   </a>
   
<a href="{{ route('admin.products.index') }}"
   class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
    <i class="bi bi-box"></i>
    Products
</a>



            {{-- later: products, shops, orders list, etc. --}}
        </nav>
    </aside>

    {{-- Main Content --}}
    <main class="admin-content">
        <div class="admin-topbar">
            <h4 class="mb-0">@yield('page_title','Dashboard')</h4>

            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button class="btn btn-sm btn-outline-light">
                    <i class="bi bi-box-arrow-right me-1"></i> Logout
                </button>
            </form>
        </div>

        @yield('content')
    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@yield('js')
</body>
</html>
