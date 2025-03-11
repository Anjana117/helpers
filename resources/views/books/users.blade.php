@extends('layouts.app')

@section('content')

<div class="container mt-5">
    {{-- <h2>Users Assigned to "{{ $books->name }}"</h2> --}}
       <h2>Books And User Table</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User ID</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Book Name</th>
                <th>Book Author</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @foreach ($user->books as $book)
                        {{ $book->name }}<br>
                    @endforeach
                </td>
                <td>
                    @foreach ($user->books as $book)
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
