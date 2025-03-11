<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Collection</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Book Collection</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Book name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Author</label>
            <input type="text" name="author" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Book</button>
    </form>

    <hr>

    <h3>Books</h3>
    <ul class="list-group">
        @foreach($books as $book)
            <li class="list-group-item">
                <strong>{{ $book->title }}</strong> by {{ $book->author }}

                <form action="{{ route('books.attach', $book->id) }}" method="POST" class="d-inline">
                    @csrf
                    <select name="user_id" class="form-select d-inline w-auto">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-sm btn-success">Assign User</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
</body>
</html>
