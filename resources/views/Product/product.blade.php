@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 py-5 text-center">Add Product</h2>
    <div class="card shadow-lg p-4 rounded">
        

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="product_name" class="form-label fw-bold">Product Name</label>
                <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Enter product name" required>
            </div>

            <div class="mb-3">
                <label for="product_description" class="form-label fw-bold">Product Description</label>
                <textarea name="product_description" id="product_description" class="form-control" rows="3" placeholder="Enter product description"></textarea>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label fw-bold">Select Category</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success shadow">
                <i class="fas fa-plus-circle"></i> Add Product
            </button>
        </form>
    </div>
</div>
@endsection
