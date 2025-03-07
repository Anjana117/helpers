@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card mt-3 p-3">
                    <h2 class="mb-4 text-center">Welcome {{ Auth::user()->name }}</h2>
 <table class="table table-hover mt-2 table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">S.No.</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Category Description</th>
                                <th scope="col">action</th>
                          </tr>
                        </thead>
                        <tbody id="userTable">
                            @foreach ($category as $key =>  $categories)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $categories->name }}</td>
                                    <td>{{ $categories->description }}</td>
                                    <td>
                                        <a href="{{ route('edit', $category->id) }}" class="btn btn-primary">Add Product</a>
                                        {{-- <form method="POST" action="{{ route('delete', $userdata->id) }}" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn delete-btn btn-danger">Delete</button>
                                        </form> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>





@endsection
