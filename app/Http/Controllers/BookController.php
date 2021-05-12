<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy("title")->get();
        $authors = Author::orderBy("name") -> get();
        return view('books/index', ['books' => $books], ["authors" => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::orderBy("name")->get();

        return view('books.create', ["authors" => $authors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book();
        $book->title = ucfirst($request->title);
        $book->author_id = $request->author_id;
        $book->publishDate = $request->publishDate;
        $book->pages = $request->pages;
        $book->coverType = $request->cover;
        $book->save();
        return redirect()->route('books.index')->with("msg", "Book:  \"$book->title\" was added successfully");

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return view('books/show', ['author' => $author]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::orderBy("name") -> get();

        return view("books/edit", ["book" => $book] , ["authors" => $authors]);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book->title = ucfirst($request->title);
        $book->author_id = $request->author_id;
        $book->publishDate = $request->publishDate;
        $book->pages = $request->pages;
        $book->coverType = $request->cover;
        $book->save();
        return redirect()->route('books.index')->with("msg", "Book:  \"$book->title\" was updated successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index')->with("msg", "\"$book->title\" was deleted successfully");
    }
}
