@extends('layouts.app')

@section('content')
<div class="container my-4">
    <h2 class="mb-4">Add Book</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('books.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="author">Author:</label>
                    <input type="text" name="author" id="author" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="genre">Genre:</label>
                    <input type="text" name="genre" id="genre" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" class="form-control" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image URL:</label>
                    <input type="text" name="image" id="image" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="isbn">ISBN:</label>
                    <input type="text" name="isbn" id="isbn" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="publication_date">Publication Date:</label>
                    <input type="date" name="published" id="publication_date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="publisher">Publisher:</label>
                    <input type="text" name="publisher" id="publisher" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Book</button>
            </form>
        </div>
    </div>
</div>
@endsection