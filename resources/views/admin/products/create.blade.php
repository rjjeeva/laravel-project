@extends('admin.layouts.app')

@section('title', 'Add Product')

@section('content')
<div class="container-fluid">

    <div class="card shadow-lg border-0" style="border-radius:20px;">
        <div class="card-header bg-primary text-white" style="border-radius:20px 20px 0 0;">
            <h4 class="mb-0">
                <i class="bi bi-plus-circle me-2"></i> Add New Product
            </h4>
        </div>

        <div class="card-body p-4">

            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Product Title</label>
                        <input type="text" name="title" class="form-control form-control-lg">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="fw-bold">Slug <small class="text-muted">(auto-generate also allowed)</small></label>
                        <input type="text" name="slug" class="form-control form-control-lg">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="fw-bold">Description</label>
                        <textarea name="description" rows="4" class="form-control"></textarea>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="fw-bold">Price (₹)</label>
                        <input type="number" name="price" class="form-control form-control-lg">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="fw-bold">Stock</label>
                        <input type="number" name="stock" class="form-control form-control-lg">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="fw-bold">Status</label>
                        <select name="status" class="form-control form-control-lg">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="fw-bold">Product Image</label>
                        <input type="file" name="image" class="form-control form-control-lg">
                    </div>

                </div>

                <button type="submit" class="btn btn-success btn-lg px-4 mt-3">
                    <i class="bi bi-check2-circle me-2"></i>
                    Save Product
                </button>

            </form>

        </div>
    </div>

</div>
@endsection
