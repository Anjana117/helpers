@extends('layouts.app')

@section('content')

<div class="container mt-5">
    {{-- <h2>Users Assigned to "{{ $books->name }}"</h2> --}}
       {{-- <h2>Books And User Table</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Book Category Name</th>
                <th>Book Name</th>
                <th>Book Author</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books  as $book )
            <tr>
                <td>{{ $book->name }}</td>
                <td>{{ $book->author }}</td>
                @foreach ($bcategories as $bcategory )
                <td>{{ $bcategory->name }}</td>
                @endforeach
            </tr>
            @endforeach


        </tbody>
    </table>

    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to Books</a> --}}

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
