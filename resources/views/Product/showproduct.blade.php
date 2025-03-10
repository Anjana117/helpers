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

              @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="Product Image">

                @endif
                    <div class="card-body">
                        <h5 class="card-title text-dark fw-bold">{{ $product->product_name }}</h5>
                        <p class="card-text text-muted">{{ $product->product_description }}</p>
                        <p class="fw-bold text-success">Price: ₹{{ $product->price }}</p>
                        <div class="d-flex justify-content-between">
                            <a href="#" class="btn btn-sm btn-primary">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            {{-- <a href="#" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i> Delete
                            </a> --}}
                            <form  action="{{ route('products.delete', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger me-2"><i class="fas fa-trash"></i>Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
