@extends('layouts.app')

@section('content')
@push('styles')
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
    cursor: default;
    padding-left: 2px;
    padding-right: 5px;
    color: black;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
        color: black;
    }
</style>
@endpush
    <div class="container mt-5">

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card mt-3 p-3">
                        <h2>Book Collection</h2>

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <form action="{{ route('books.store') }}" style="border: 2px solid black" class="p-4" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label>Book Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Author</label>
                                <input type="text" name="author" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="user_id" class="form-label fw-bold">Select Users</label>
                                {{-- <select name="user_id[]" id="user_id" class="form-control" multiple required>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select> --}}

                                <select class="form-control js-example-basic-multiple" name="states[]" multiple="multiple">
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Book</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Initialize Select2 -->

@endsection
@push('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
  </script>
@endpush
