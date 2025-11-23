@extends('layouts.app')

@section('title','My Order History')

@section('content')


<h2>Order Water Can</h2>

@if(session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

@if(session('error'))
    <p style="color: red">{{ session('error') }}</p>
@endif

<form method="POST" action="{{ route('order.store') }}">
    @csrf

    <label>Quantity</label>
    <input type="number" name="quantity" required>

    <br><br>

    <label>Address (Manual)</label>
    <input type="text" id="address" name="address" placeholder="Enter your address manually">

    <p><b>OR</b></p>

    <button type="button" onclick="detectLocation()">Use My Current Location</button>

    <input type="hidden" id="lat" name="lat">
    <input type="hidden" id="lon" name="lon">

    <br><br>
    <button type="submit">Place Order</button>
</form>

<script>
    function detectLocation() {
        navigator.geolocation.getCurrentPosition(function(position) {
            document.getElementById('lat').value = position.coords.latitude;
            document.getElementById('lon').value = position.coords.longitude;

            // Just message
            alert("Location detected!");
        });
    }
</script>
@endsection