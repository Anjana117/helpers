@extends('layouts.app')

@section('content')

<div class="container mt-5">

    @extends('layouts.app')

    @section('content')

    <div class="container mt-5">
        <h2>Books and User Table</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Book Category Name</th>
                    <th>Book Name</th>
                    <th>Book Author</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bcategories as $bcategory)
                    <tr>
                        <td>{{ $bcategory->name }}</td>
                        <td>
                            @foreach ($bcategory->books as $book)
                                {{ $book->name }}<br>
                            @endforeach
                        </td>
                        <td>
                            @foreach ($bcategory->books as $book)
                                {{ $book->author }}<br>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to Books</a>
    </div>

    @endsection

</div>
@endsection
