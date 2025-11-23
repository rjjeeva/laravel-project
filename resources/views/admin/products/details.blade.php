@extends('layouts.app')

@section('content')

<div class="container py-5">

    <div class="row">

        <!-- Left: Product Image -->
        <div class="col-md-6">
            <img src="{{ asset('storage/'.$product->image) }}"
                 class="img-fluid rounded shadow"
                 alt="{{ $product->title }}">
        </div>


        <!-- Right: Product Info -->
        <div class="col-md-6">

            <h2 class="fw-bold">{{ $product->title }}</h2>
            <p class="text-muted">{{ $product->description }}</p>

            <h3 class="mt-3 text-primary">₹{{ $product->price }}</h3>

            @if($product->stock > 0)
                <span class="badge bg-success">Available ({{ $product->stock }})</span>
            @else
                <span class="badge bg-danger">Out of Stock</span>
            @endif

            <hr>

            <!-- Quantity -->
            <h5>Quantity:</h5>

            <div class="d-flex align-items-center mb-3">

                <button id="qty-minus" class="btn btn-outline-secondary">-</button>

                <input type="text"
                       id="qty-input"
                       value="1"
                       class="form-control text-center mx-2"
                       style="width: 70px;"
                       readonly>

                <button id="qty-plus" class="btn btn-outline-secondary">+</button>

            </div>

            <!-- Error Message -->
            <p id="qty-error" class="text-danger fw-bold" style="display:none;">
                Maximum available stock reached!
            </p>

            <!-- Add to Cart -->
            <button class="btn btn-primary px-4">Add to cart</button>

            <a href="{{ url('/') }}" class="btn btn-light ms-3">Back</a>

        </div>
    </div>
</div>


<!-- JS LOGIC -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    let qtyInput = document.getElementById("qty-input");
    let qtyMinus = document.getElementById("qty-minus");
    let qtyPlus  = document.getElementById("qty-plus");
    let errorMsg = document.getElementById("qty-error");

    let maxStock = {{ $product->stock }};

    // Decrease Button
    qtyMinus.addEventListener("click", function() {
        let current = parseInt(qtyInput.value);

        if (current > 1) {
            qtyInput.value = current - 1;
            errorMsg.style.display = "none";
        }
    });

    // Increase Button
    qtyPlus.addEventListener("click", function() {
        let current = parseInt(qtyInput.value);

        if (current < maxStock) {
            qtyInput.value = current + 1;
            errorMsg.style.display = "none";
        } else {
            errorMsg.style.display = "block"; // show error
        }
    });

});
</script>

@endsection
