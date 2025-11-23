<script>
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(setPosition, showError);
    } else {
        alert("Geolocation is not supported by this browser.");
    }
}

function setPosition(position) {
    document.getElementById("lat").value = position.coords.latitude;
    document.getElementById("lon").value = position.coords.longitude;
}

function showError(error) {
    alert("Location access denied! Please enable location.");
}
</script>

<body onload="getLocation()">

<form method="POST" action="{{ route('order.store') }}">
    @csrf

    <input type="hidden" id="lat" name="lat">
    <input type="hidden" id="lon" name="lon">

    Quantity:
    <input type="number" name="quantity" required>

    <button type="submit">Place Order</button>
</form>
</body>
