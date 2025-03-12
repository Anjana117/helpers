@extends('layouts.app')

@section('content')
<div class="container  justify-content-center mt-5">
    <div class="row ">
        <div class="col-lg-8">
            <div class="card p-4 shadow">
                <h2 class="text-center mb-4">Add Student</h2>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('students.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter student name" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <select name="gender" class="form-control" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" placeholder="Enter phone number" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Address</label>
                        <textarea name="address" class="form-control" rows="3" placeholder="Enter address" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Class</label>
                        <input type="text" name="class" class="form-control" placeholder="Enter class name" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Add Student</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
