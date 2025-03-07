@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card mt-3 p-3">
                    <h2 class="mb-4 text-center">Welcome {{ Auth::user()->name }}</h2>

                    <div class="d-flex justify-content-center">
                        <a href="{{ route('logout') }}" class="btn btn-danger mb-4">Logout</a>
                    </div>

                    <!-- Search Form -->
                    <input type="text"  id="search" name="name" placeholder="Enter user name" class="form-control mb-3">
                    
                    <!-- User Table -->
                    <table class="table table-hover mt-2 table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">S.No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody id="userTable">
                            @foreach ($users as $index => $userdata)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $userdata->name }}</td>
                                    <td>{{ $userdata->email }}</td>
                                    <td>
                                        <a href="{{ route('edit', $userdata->id) }}" class="btn btn-primary">Edit</a>
                                        <form method="POST" action="{{ route('delete', $userdata->id) }}" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn delete-btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

    <!-- AJAX for Search -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#search").on("keyup", function () {
                var searchValue = $(this).val(); 
                
                $.ajax({
                    url: "{{ route('search.user') }}",
                    method: "GET",
                    data: { name: searchValue },
                    success: function (response) {
                        var rows = "";
                        if (response.users.length > 0) {
                            $.each(response.users, function (index, user) {
                                rows += "<tr>";
                                rows += "<td>" + (index + 1) + "</td>";
                                rows += "<td>" + user.name + "</td>";
                                rows += "<td>" + user.email + "</td>";
                                rows += `<td>
                                    <a href='/edit/${user.id}' class='btn btn-primary'>Edit</a>
                                    <form method='POST' action='/delete/${user.id}' class='d-inline'>
                                        @csrf
                                        @method('DELETE')
                                        <button type='button' class='btn delete-btn btn-danger'>Delete</button>
                                    </form>
                                </td>`;
                                rows += "</tr>";
                            });
                        } else {
                            rows = "<tr><td colspan='4' class='text-center'>No users found</td></tr>";
                        }

                        $("#userTable").html(rows);
                    },
                    error: function () {
                        $("#userTable").html("<tr><td colspan='4' class='text-center'>Error fetching users</td></tr>");
                    }
                });
            });
        });
    </script>
@endsection
