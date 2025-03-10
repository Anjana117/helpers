@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="text-center  mb-4">Product List</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4">
                <div class="card shadow-lg rounded p-3 mb-4">
                    <div class="card-body">
                        <h5 class="card-title text-dark fw-bold">{{ $product->product_name }}</h5>
                        <p class="card-text text-muted">{{ $product->product_description }}</p>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="#" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Delete
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
