<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all()->sortByDesc('created_at');
        return view('books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $publishers = Publisher::all();
        return view('books.create', ['publishers' => $publishers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'editorial_id' => 'required',
            'edicion' => 'required',
            'pais' => 'required',
            'precio' => 'required',
        ]);
        Book::create($request->all());
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = Book::findOrFail($id);
        $publishers = Publisher::all();
        return view('books.edit', ['book' => $book, 'publishers' => $publishers]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'titulo' => 'required',
            'editorial_id' => 'required',
            'edicion' => 'required',
            'pais' => 'required',
            'precio' => 'required',
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index');
    }
}
