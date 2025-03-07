@extends('layouts.app')


@section('content')
    <div class="container mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card mt-3 p-3">
                        <h2 class="mb-4 text-center">Welcome {{ Auth::user()->name }}</h2>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('logout') }}" class="btn delete-btn btn-danger mb-4">Logout</a>
                        </div>
                        <form action="{{ url('/search-user') }}" method="GET">
                            <input type="text" name="name" placeholder="Enter user name">
                            <button type="submit">Search</button>
                        </form>
                        <table class="table table-hover mt-2 table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">S.No.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
        
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $userdata)
                                    <tr>
        
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $userdata->name }}</td>
                                        <td>{{ $userdata->email }}</td>
        
                                        <td><a href="{{route('edit', $userdata->id) }}" class="btn btn-primary">Edit</a>
                                            <form method="POST" action="{{route('delete', $userdata->id) }}"
                                                class="d-inline">
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
    </div>
    
    <script>
        $(document).ready(function() {

            $('.delete-btn').on('click', function() {
                const form = $(this).closest('form');


                $.confirm({
                    title: 'Confirm Delete',
                    content: 'Are you sure you want to delete this User data?',
                    buttons: {
                        confirm: {
                            text: 'Delete',
                            btnClass: 'btn-danger',
                            action: function() {

                                form.submit();
                            }
                        },
                        cancel: {
                            text: 'Cancel',
                            btnClass: 'btn-secondary',
                            action: function() {

                                $.alert('Deletion canceled!');
                            }
                        }
                    }
                });
            });
        });
    </script>
   
@endsection
