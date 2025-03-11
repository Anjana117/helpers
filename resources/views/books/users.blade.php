<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Users Assigned to "{{ $book->name }}"</h2>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User ID</th>
                <th>User Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $book as $user )
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
            @endforeach
                
            
        </tbody>
    </table>

    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back to Books</a>
</div>
</body>
</html>
