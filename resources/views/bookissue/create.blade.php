@extends('layouts.app')

@section('content')
<div class="container justify-content-center mt-5">
    <div class="row ">
        <div class="col-lg-6">
            <div class="card p-4 shadow">
                <h2 class="text-center mb-4">Issue Book</h2>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('book_issues.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Select Student</label>
                        <select name="student_id" class="form-control" required>
                            <option value="">Choose Student</option>

                            @foreach($students as $student)
                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Select Book</label>
                        <select name="book_id" class="form-control" required>
                            <option value="">Choose Book</option>
                            @foreach($books as $book)
                                <option value="{{ $book->id }}"   min="{{ date('Y-m-d') }}">{{ $book->name }} </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Issue Date</label>
                        <input type="date" name="issue_date" class="form-control"
                            value="{{ old('issue_date', $issue->issue_date ?? date('Y-m-d')) }}"
                            min="{{ date('Y-m-d') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Return Date</label>
                        <input type="date" name="return_date" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Issue Book</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
