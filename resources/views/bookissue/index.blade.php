@extends('layouts.app')

@section('content')
<div class="container justify-content-center mt-5">
    <div class="row ">
        <div class="col-lg-10">

                <h2 class="text-center mb-4">Issued Books List</h2>
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>S.No.</th>
                        <th>Student Name</th>
                        <th>Book Name</th>
                        <th>Status</th>
                        <th>Issued Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookIssues as $index => $issue)

                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $issue->student->name }}</td>
                        <td>{{ $issue->book->name }}</td>
                        <td>
                            @if($issue->status == 'issued')
                                <span class="badge bg-warning text-dark">Issued</span>
                            @else
                                <span class="badge bg-success">Returned</span>
                            @endif
                        </td>
                         <td>{{ $issue->issue_date }}</td>
                        <td>
                            @if($issue->status == 'issued')
                                <form action="{{ route('book_issues.return', $issue->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">Return Book</button>
                                </form>
                            @else
                                <span class="text-success">Already Returned</span>
                            @endif
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
