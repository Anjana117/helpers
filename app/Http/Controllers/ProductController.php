<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    
    public function create($category)
{
    $categories = Category::all();
    return view('product.product', compact('categories', 'category'));
}


public function show()
{
    $products = Product::all();
   
    return view('product.showproduct',compact('products'));
}


    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        Product::create([
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('products.show')->with('success', 'Product added successfully!');
    }
}
