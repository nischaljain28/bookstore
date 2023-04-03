@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Bookstore</h2>
    <div class="row mb-3">
        <div class="col-md-10">
            <form action="{{ route('books.index') }}" method="GET" class="form-inline">
                <div class="row">
                <div class="form-group col-2">
                    <select class="form-control" id="search_type" name="search_type">
                        <option value="">All</option>
                        <option value="title">Title</option>
                        <option value="author">Author</option>
                        <option value="genre">Genre</option>
                        <option value="isbn">ISBN</option>
                    </select>
                </div>
                <div class="form-group col-2">
                    <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ old('search', $search) }}">
                </div>
                <div class="form-group col-2">
                    <input type="date" name="start_date" class="form-control" placeholder="Start Date" value="{{ old('start_date', $start_date) }}">
                </div>
                <div class="form-group col-2">
                    <input type="date" name="end_date" class="form-control" placeholder="End Date" value="{{ old('end_date', $end_date) }}">
                </div>
                <button type="submit" class="btn btn-primary col-4">Search</button>
                </div>
            </form>
        </div>
        @if (Auth::user()->role == 'admin')
        <div class="col-md-2 text-right">
            <a href="{{ route('books.create') }}" class="btn btn-primary">Add Book</a>
        </div>
        @endif
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Publication Date</th>
                <th>ISBN</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->genre}}</td>
                    <td>{{ $book->published }}</td>
                    <td>{{ $book->isbn}}</td>
                    <td>
                        @if ($book->image)
                            <img src="{{ $book->image }}" alt="{{ $book->title }}" width="50" height="50">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-sm btn-primary">View</a>
                        @if (Auth::user()->role == 'admin')
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                        </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $books->appends(request()->except('page'))->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection