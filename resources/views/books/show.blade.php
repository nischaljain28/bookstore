@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card my-4">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{ $book->image }}" alt="{{ $book->title }}" class="card-img">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title">{{ $book->title }}</h2>
                        <p class="card-text">By {{ $book->author }} , {{ $book->published }}</p>
                        <p class="card-text">Genre: {{ $book->genre }}</p>
                        <p class="card-text">Description: {{ $book->description }}</p>
                        <p class="card-text">ISBN: {{ $book->isbn }}</p>
                        @if (Auth::user()->role == 'admin')
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary mr-2">Edit</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this book?')">Delete</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
