@extends('layouts.app')

@section('content')
<div class="container mt-4">
    
    

    <h3 class="mb-3 text-center py-5">Add New Category</h3>

    <div class="card shadow-lg p-4 rounded">
       
        
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            
            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Category Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter category name" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Category Description</label>
                <textarea name="description" id="description" class="form-control" rows="3" placeholder="Enter category description" required></textarea>
            </div>

            <button type="submit" class="btn btn-success">
                <i class="fas fa-plus-circle"></i> Add Category
            </button>
        </form>
    </div>
</div>
@endsection
