<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;  
class ProductController extends Controller
{public function create()
{
    return view('admin.products.create');
}
public function index()
{
    $products = Product::latest()->get();
    return view('admin.products.index', compact('products'));
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required',
        'slug' => 'required|unique:products',
        'price' => 'required|numeric',
        'stock' => 'required|numeric',
        'image' => 'nullable|image'
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
    }

    Product::create([
        'title' => $request->title,
        'slug' => $request->slug,
        'description' => $request->description,
        'price' => $request->price,
        'stock' => $request->stock,
        'image' => $imagePath,
        'status' => $request->status,
    ]);

    return redirect()->route('admin.products.index')
       
->with('success', 'Product added successfully');
}
public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required',
        'price' => 'required|numeric',
        'stock' => 'required|numeric',
        'image' => 'nullable|image'
    ]);

    $product = Product::findOrFail($id);

    $imagePath = $product->image;

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
    }

    $product->update([
        'title' => $request->title,
        'slug' => $request->slug,
        'description' => $request->description,
        'price' => $request->price,
        'stock' => $request->stock,
        'status' => $request->status,
        'image' => $imagePath,
    ]);

    return redirect()->route('admin.products')
        ->with('success', 'Product updated successfully');
}

public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('admin.products.edit', compact('product'));
}
public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('admin.products.index')
        ->with('success', 'Product deleted successfully');
}
public function show($slug)
{
    $product = Product::where('slug', $slug)
                      ->where('status', 1)
                      ->firstOrFail();

    return view('admin.products.details', compact('product'));
}

}
