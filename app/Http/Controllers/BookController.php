<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $searchType = $request->input('search_type');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        $books = Books::when($search, function ($query, $search) use ($searchType) {
                return $query->when($searchType, function ($query, $searchType) use ($search) {
                        return $query->where($searchType, 'like', '%' . $search . '%');
                    }, function ($query) use ($search) {
                        return $query->where(function ($query) use ($search) {
                                $query->where('title', 'like', '%' . $search . '%')
                                    ->orWhere('author', 'like', '%' . $search . '%')
                                    ->orWhere('genre', 'like', '%' . $search . '%')
                                    ->orWhere('isbn', 'like', '%' . $search . '%');
                            });
                    });
            })
            ->when($start_date, function ($query, $start_date) {
                return $query->whereDate('published', '>=', $start_date);
            })
            ->when($end_date, function ($query, $end_date) {
                return $query->whereDate('published', '<=', $end_date);
            })
            ->paginate(10);

        return view('books.index', compact('books', 'search', 'searchType', 'start_date', 'end_date'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->middleware('role:admin');
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware('role:admin');
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'genre' => 'required|max:255',
            'description' => 'required',
            'isbn' => 'required|unique:books,isbn',
            'image' => 'required|url',
            'published' => 'required|date',
            'publisher' => 'required|max:255',
        ]);

        Books::create($validatedData);

        return redirect()->route('books.index')
            ->with('success', 'Book created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Books $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Books $book)
    {
        $this->middleware('role:admin');
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Books $book)
    {
        $this->middleware('role:admin');
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'genre' => 'required|max:255',
            'description' => 'required',
            'isbn' => 'required|unique:books,isbn,'.$book->id,
            'image' => 'required|url',
            'published' => 'required|date',
            'publisher' => 'required|max:255',
        ]);
        
        $book->update($validatedData);

        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Books $book)
    {
        $this->middleware('role:admin');
        $book->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully.');
    }
}
