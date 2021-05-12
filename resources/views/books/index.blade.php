@extends('layouts.layout')
@section('content')

<div class="container" style="padding-top: 30px;">
    <div class="row">
        <div class="col s12 l8 offset-l1 center">
            <span class="indigo-text" style="font-style: italic">{{session("msg")}}</span>
        </div>
    </div>
    <div class="row">
        <div class="col s12 l8 offset-l1">

            <table class="highlight centered">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Published</th>
                        <th>Pages</th>
                        <th>Cover</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                    <tr>
                    <td>{{ $book["title"] }}</td>
                    <td><a href="{{ route("authors.show", $book->author) }}">{{ $book->author->name }} {{ $book->author->surname }}</a></td>
                    <td>{{ $book["publishDate"] }}</td>
                    <td>{{ $book["pages"] }}</td>
                    <td>{{ $book["coverType"] }}</td>
                    <td><a href="{{ route("books.edit", $book) }}"><i class="material-icons green-text text-darken-1">edit</i></a></td>
                    <td>
                        <form id="destroy-form" action="{{route('book.destroy', $book->id)}}" method="post">
                            @method("DELETE")
                            @csrf
                            <button style="background-color: transparent; border: none" class="tooltipped" data-position="right" data-tooltip="Delete Book">
                                <i class="material-icons red-text">delete</i>
                            </button>
                        </form>
                    </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

