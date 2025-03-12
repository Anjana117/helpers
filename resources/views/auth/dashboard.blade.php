@extends('layouts.app')

@section('content')

<div class="container justify-content-center mt-5">
    <div class="row ">
        <div class="col-lg-6">

            <div class="d-flex justify-content-center">
                <a href="{{ route('categories.index') }}" class="btn btn-success ms-2 mb-4">Add Category</a>
            </div>
            <input type="text" id="search" name="name" placeholder="Enter user name"
                class="form-control mb-3">

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

    <div class="d-flex justify-content-center">
        {{ $users->links('pagination::bootstrap-5') }}
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



    <script>
        $(document).ready(function() {
            $("#search").on("keyup", function() {
                var searchValue = $(this).val();

                $.ajax({
                    url: "{{ route('search.user') }}",
                    method: "GET",
                    data: {
                        name: searchValue
                    },
                    success: function(response) {
                        var rows = "";
                        if (response.users.length > 0) {
                            $.each(response.users, function(index, user) {
                                rows += "<tr>";
                                rows += "<td>" + (index + 1) + "</td>";
                                rows += "<td>" + user.name + "</td>";
                                rows += "<td>" + user.email + "</td>";
                                rows += `<td>
                                    <a href='/edit/${user.id}' class='btn btn-primary'>Edit</a>
                                    <form method='POST' action='/delete/${user.id}' class='d-inline delete-form'>
                                        @csrf
                                        @method('DELETE')
                                        <button type='button' class='btn delete-btn btn-danger'>Delete</button>
                                    </form>
                                </td>`;
                                rows += "</tr>";
                            });
                        } else {
                            rows =
                                "<tr><td colspan='4' class='text-center'>No users found</td></tr>";
                        }

                        $("#userTable").html(rows);
                    },
                    error: function() {
                        $("#userTable").html(
                            "<tr><td colspan='4' class='text-center'>Error fetching users</td></tr>"
                            );
                    }
                });
            });

            $(document).on("click", ".delete-btn", function() {
                var form = $(this).closest("form");
                if (confirm("Are you sure you want to delete this user?")) {
                    $.ajax({
                        url: form.attr("action"),
                        method: "POST",
                        data: form.serialize(),
                        success: function(response) {
                            alert(response.message);
                            $("#search").trigger("keyup");
                        },
                        error: function() {
                            alert("Error deleting user.");
                        }
                    });
                }
            });
        });
    </script>
@endsection
