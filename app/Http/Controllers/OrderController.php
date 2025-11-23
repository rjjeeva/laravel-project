<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
public function store(Request $request)
{



    $user = Auth::user();

    // If user gave address manually
    if ($request->address) {
        $user->address = $request->address;
    }

    // If GPS detected
    if ($request->lat && $request->lon) {
        $user->lat = $request->lat;
        $user->lon = $request->lon;
    }

    $user->save();

    // Find nearest shop
    $shops = Shop::all();
    $selectedShop = null;

    foreach ($shops as $shop) {
        $distance = $this->distance($user->lat, $user->lon, $shop->lat, $shop->lon);
        if ($distance <= $shop->radius_km) {
            $selectedShop = $shop;
            break;
        }
    }

    if (!$selectedShop) {
        return back()->with('error', 'Sorry, delivery is not available in your location.');
    }

    Order::create([
        'user_id' => $user->id,
        'shop_id' => $selectedShop->id,
        'quantity' => $request->quantity,
        'address' => $user->address,
        'lat' => $user->lat,
        'lon' => $user->lon,
        'status' => 'pending'
    ]);

    return back()->with('success', 'Your water can order has been placed!');
}
public function history()
{
    $orders = Order::where('user_id', auth()->id())
                    ->orderBy('id', 'DESC')
                    ->get();

    return view('order.history', compact('orders'));
}
public function create()
{
    return view('order.create');
}
private function distance($lat1, $lon1, $lat2, $lon2)
{
    $earthRadius = 6371; // KM

    $dLat = deg2rad($lat2 - $lat1);
    $dLon = deg2rad($lon2 - $lon1);

    $a = sin($dLat / 2) * sin($dLat / 2) +
         cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
         sin($dLon / 2) * sin($dLon / 2);

    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    return $earthRadius * $c;
}

}

