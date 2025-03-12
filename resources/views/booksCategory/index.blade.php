@extends('layouts.app')

@section('content')
    <div class="container justify-content-center mt-5">
        <div class="row ">
            <div class="col-lg-6">

                <h2 class="text-center mb-4">Add Book Category</h2>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('books.category.store') }}" style="border: 2px solid black" class="p-4"
                    method="POST">
                    @csrf
                    <div class="mb-3">
                        <label>Book Category Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="book_id" class="form-label fw-bold">Select Books</label>
                        <select name="book_id[]" id="book_id" class="form-control" multiple required>
                            @foreach ($books as $book)
                                <option value="{{ $book->id }}">{{ $book->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Book</button>
                </form>
            </div>
        </div>
    </div>
@endsection
