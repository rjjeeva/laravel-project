@extends('admin.layouts.app')

@section('content')

<div class="card p-4">

    <div class="d-flex justify-content-between mb-3">
        <h3 class="fw-bold">All Products</h3>
        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">+ Add Product</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Title</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Status</th>
                <th width="150">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>

                <td>
                    <img src="{{ asset('storage/'.$product->image) }}" width="60" class="rounded">
                </td>

                <td>{{ $product->title }}</td>
                <td>₹{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>

                <td>
                    @if($product->status == 1)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </td>

                <td>
                    <a href="{{ route('admin.products.edit', $product->id) }}" 
                       class="btn btn-sm btn-warning">
                        Edit
                    </a>

                    <form action="{{ route('admin.products.delete', $product->id) }}" 
                          method="POST" 
                          class="d-inline"
                          onsubmit="return confirm('Are you sure?');">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>

            </tr>
            @endforeach
        </tbody>

    </table>
</div>

@endsection
