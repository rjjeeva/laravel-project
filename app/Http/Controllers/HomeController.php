<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
  public function index()
{
    $products = Product::where('status', 1)->latest()->get();
    return view('welcome', compact('products'));
}

}
