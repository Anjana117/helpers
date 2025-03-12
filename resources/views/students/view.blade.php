 @extends('layouts.app')

@section('content ')
<div class="container  justify-content-center">
    <h2 class="text-center py-5">Category List</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Centering the table -->
    <div class="d-flex justify-content-center">
        <div class="table-responsive">
            <table class="table table-bordered shadow-lg p-4 rounded text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Student Name</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Class</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->gender }}</td>
                            <td>{{ $student->phone }}</td>
                            <td>{{ $student->address }}</td>
                            <td>{{ $student->class }}</td>
                            <td>
                                <a href="{{ route('products.create', ['category' => $category->id]) }}" class="btn btn-primary">
                                    Add Product
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
