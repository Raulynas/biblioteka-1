<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::get()->sortBy("name");
        return view('authors/index', ['authors' => $authors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'name' => ['required', 'string', "min:2", 'max:30'],
                'surname' => ['required', 'string', "min:2", 'max:30'],
                'nationality' => ['required', 'string', "min:2", 'max:30'],
            ]


        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }





        $author = new Author();
        $author->name = ucfirst(strtolower($request->name));
        $author->surname = ucfirst(strtolower($request->surname));
        $author->nationality = ucfirst(strtolower($request->nationality));
        $author->save();
        return redirect()->route('authors.index')->with("msg", "Author: \"$author->name $author->surname\" was created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     return Author::findOrFail($id);

    // }
    public function show(Author $author)
    {
        return view('authors/show', ['author' => $author]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view("authors/edit", ["author" => $author]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $author->name = ucfirst(strtolower($request->name));
        $author->surname = ucfirst(strtolower($request->surname));
        $author->nationality = ucfirst(strtolower($request->nationality));
        $author->save();
        return redirect()->route('authors.index')->with("msg", "Author: \"$author->name $author->surname\" was updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::findOrFail($id);
        $author->delete();
        return redirect()->route('authors.index')->with("msg", "\"$author->name $author->surname\" was deleted successfully");
    }
}
