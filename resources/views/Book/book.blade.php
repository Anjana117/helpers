@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 py-5 text-center">Add Product</h2>
    <div class="card shadow-lg p-4 rounded">


        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('book.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Book Name</label>
                <input type="text" name="name" id="name" class="form-control"
                    placeholder="Enter Book name" required>
            </div>
            <div class="mb-3">
                <label for="author" class="form-label fw-bold">Author Name</label>
                <input type="text" name="author" id="author" class="form-control"
                    placeholder="Enter Author name" required>
            </div>
            <button type="submit" class="btn btn-success">
                <i class="fas fa-plus-circle"></i> Add Book
            </button>
        </form>
    </div>
</div>
@endsection
