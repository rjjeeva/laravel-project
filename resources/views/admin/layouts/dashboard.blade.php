@extends('admin.layouts.app')

@section('title','Admin Dashboard')
@section('page_title','Dashboard')

@section('content')
<div class="container-fluid">

    {{-- Stats cards --}}
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card-glass p-3">
                <p class="text-secondary small mb-1">Total Orders</p>
                <h3 class="fw-bold">{{ $totalOrders }}</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-glass p-3">
                <p class="text-secondary small mb-1">Today</p>
                <h3 class="fw-bold text-info">{{ $todayOrders }}</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-glass p-3">
                <p class="text-secondary small mb-1">Pending</p>
                <h3 class="fw-bold text-warning">{{ $pendingOrders }}</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card-glass p-3">
                <p class="text-secondary small mb-1">Delivered</p>
                <h3 class="fw-bold text-success">{{ $deliveredOrders }}</h3>
            </div>
        </div>
    </div>

    {{-- Recent orders table --}}
    <div class="card-glass p-3">
        <h5 class="mb-3">Recent Orders</h5>
        <div class="table-responsive">
            <table class="table table-dark table-borderless align-middle mb-0">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Qty</th>
                    <th>Status</th>
                    <th>Placed</th>
                </tr>
                </thead>
                <tbody>
                @forelse($recentOrders as $order)
                    <tr>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->user->name ?? 'N/A' }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>
                            <span class="badge bg-{{ $order->status === 'pending' ? 'warning' : 'success' }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td>{{ $order->created_at->format('d M Y, h:i A') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-secondary">No orders yet.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
