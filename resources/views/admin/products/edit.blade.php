@extends('admin.layouts.app')

@section('content')
<div class="card p-4">
    <h3 class="fw-bold mb-3">Edit Product</h3>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label>Product Title</label>
        <input type="text" name="title" value="{{ $product->title }}" class="form-control">

        <label>Slug</label>
        <input type="text" name="slug" value="{{ $product->slug }}" class="form-control">

        <label>Description</label>
        <textarea name="description" class="form-control">{{ $product->description }}</textarea>

        <label>Price</label>
        <input type="number" name="price" value="{{ $product->price }}" class="form-control">

        <label>Stock</label>
        <input type="number" name="stock" value="{{ $product->stock }}" class="form-control">

        <label>Current Image</label><br>
        <img src="{{ asset('storage/'.$product->image) }}" width="120">

        <label class="mt-2">Change Image</label>
        <input type="file" name="image" class="form-control">

        <label>Status</label>
        <select name="status" class="form-control">
            <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Active</option>
            <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Inactive</option>
        </select>

        <button class="btn btn-primary mt-3">Update</button>
    </form>
</div>
@endsection
