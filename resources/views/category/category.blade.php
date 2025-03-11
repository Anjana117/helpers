@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-lg p-4 rounded">
            <div class="d-flex justify-content-between align-items-center py-5">
                <h2 class="m-0">Category List</h2>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                    <i class="fas fa-plus-circle"></i> Add Category
                </button>
            </div>


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
        <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
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

                            <button type="submit" class="btn btn-success w-100">
                                <i class="fas fa-plus-circle"></i> Add Category
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
