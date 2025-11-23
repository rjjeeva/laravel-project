@extends('layouts.app')

@section('title','My Order History')

@section('content')

<div class="container py-5">

    <h2 class="fw-bold mb-4 text-center">My Order History</h2>

    @if($orders->count() == 0)
        <div class="alert alert-info text-center">
            You have not placed any orders yet.
        </div>
    @endif

    <div class="row g-4">
        @foreach($orders as $order)
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm h-100">
                <div class="card-body">

                    <h5 class="fw-bold mb-2">
                        Order #{{ $order->id }}
                    </h5>

                    <p class="mb-1">
                        <strong>Quantity:</strong> 
                        {{ $order->quantity }} Cans
                    </p>

                    <p class="mb-1">
                        <strong>Address:</strong> 
                        {{ $order->address }}
                    </p>

                    <p class="mb-1">
                        <strong>Date:</strong> 
                        {{ $order->created_at->format('d M Y, h:i A') }}
                    </p>

                    <p class="mb-2">
                        <strong>Status:</strong>
                        @if($order->status == 'pending')
                            <span class="badge bg-warning text-dark">Pending</span>
                        @elseif($order->status == 'completed')
                            <span class="badge bg-success">Completed</span>
                        @else
                            <span class="badge bg-secondary">Unknown</span>
                        @endif
                    </p>

                    <a href="{{ route('orders.view', $order->id) }}" 
                       class="btn btn-primary btn-sm w-100">
                        View Details
                    </a>

                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
