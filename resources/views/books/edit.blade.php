@extends('layouts.app')

@section('content')
    <div class="container my-4">
        <h2 class="mb-4">Edit Book</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ route('books.update', $book->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}" required>
                    </div>
                    <div class="form-group">
                        <label for="author">Author:</label>
                        <input type="text" name="author" id="author" class="form-control" value="{{ $book->author }}" required>
                    </div>
                    <div class="form-group">
                        <label for="genre">Genre:</label>
                        <input type="text" name="genre" id="genre" class="form-control" value="{{ $book->genre }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" id="description" class="form-control" rows="5" required>{{ $book->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image_url">Image URL:</label>
                        <input type="text" name="image" id="image_url" class="form-control" value="{{ $book->image }}" required>
                    </div>
                    <div class="form-group">
                        <label for="isbn">ISBN:</label>
                        <input type="text" name="isbn" id="isbn" class="form-control" value="{{ $book->isbn }}" required>
                    </div>
                    <div class="form-group">
                        <label for="publication_date">Publication Date:</label>
                        <input type="date" name="published" id="publication_date" class="form-control" value="{{ $book->published }}" required>
                    </div>
                    <div class="form-group">
                        <label for="publisher">Publisher:</label>
                        <input type="text" name="publisher" id="publisher" class="form-control" value="{{ $book->publisher }}" required>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Update Book</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection