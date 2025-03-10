<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\Product\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function create($category)
    {
        $categories = Category::all();
        return view('product.product', compact('categories', 'category'));
    }

    public function show(Request $request)
    {
        $categoryId = (int) $request->get('category');
        $products = $this->productRepository->getByCategory($categoryId);
        return view('product.showproduct', compact('products'));
    }

    public function delete($id)
    {
        $this->productRepository->delete($id);

        return redirect()
            ->route('products.show')
            ->with('success', 'Category deleted successfully!');
    }

    public function store(ProductRequest $request)
    {
        $validatedData = $request->all();
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $validatedData['image'] = $imagePath;
        }
        $this->productRepository->store($validatedData);
        return redirect()->route('products.show')->with('success', 'Product added successfully!');
    }
}
