@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title mb-0">Search Books</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('books.index') }}" method="GET">
                        <div class="mb-3">
                            <label for="search_type" class="form-label">Search Type</label>
                            <select class="form-select" id="search_type" name="search_type">
                                <option value="">All</option>
                                <option value="title" {{ old('searchType') == 'title' ? 'selected' : '' }}>Title</option>
                                <option value="author" {{ old('searchType') == 'author' ? 'selected' : '' }}>Author</option>
                                <option value="genre" {{ old('searchType') == 'genre' ? 'selected' : '' }}>Genre</option>
                                <option value="isbn" {{ old('searchType') == 'isbn' ? 'selected' : '' }}>ISBN</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="search" class="form-label">Search</label>
                            <input type="text" class="form-control" id="search" name="search" value="{{ old('search') }}">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="start_date" class="form-label">Published Date Start</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="end_date" class="form-label">Published Date End</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}">
                                </div>
                            </div>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
