@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 py-5 text-center">Add Product</h2>
    <div class="card shadow-lg p-4 rounded">


        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('products.store') }}" method="POST"  enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="categoryname" class="form-label fw-bold">Category Name</label>
                <input type="text" name="categoryname" id="categoryname" class="form-control"
                    placeholder="Enter Category name" required>
            </div>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-plus-circle"></i> Add Category
            </button>
        </form>
    </div>
</div>
@endsection

