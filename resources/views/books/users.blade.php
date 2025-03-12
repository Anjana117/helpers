@extends('layouts.app')

@section('content')
    <div class="container justify-content-center mt-5">
        <div class="row ">
            <div class="col-lg-6">

                <h2 class="text-center mb-4">Books And User Table</h2>
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

            </div>
        </div>
    </div>
@endsection
</div>
</body>

</html>
