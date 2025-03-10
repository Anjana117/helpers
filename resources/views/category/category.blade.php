@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-lg p-4 rounded">
            <h2 class="text-center py-5">Category List</h2>
            <table class="table table-bordered shadow-lg p-4 rounded">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <a href="{{ route('products.create', ['category' => $category->id]) }}"
                                        class="btn btn-primary me-2">
                                        Add Product
                                    </a>
                                    <a href="{{ route('products.show', ['category' => $category->id]) }}"
                                        class="btn btn-success me-2">
                                        Show Product
                                    </a>
                                    <form  action="{{ route('categories.delete', $category->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger me-2">Delete</button>
                                    </form>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h3 class="mb-3 text-center py-5">Add New Category</h3>

        <div class="card shadow-lg p-4 rounded">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Category Name</label>
                    <input type="text" name="name" id="name" class="form-control"
                        placeholder="Enter category name" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label fw-bold">Category Description</label>
                    <textarea name="description" id="description" class="form-control" rows="3"
                        placeholder="Enter category description" required></textarea>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fas fa-plus-circle"></i> Add Category
                </button>
            </form>


        </div>

    </div>
@endsection
