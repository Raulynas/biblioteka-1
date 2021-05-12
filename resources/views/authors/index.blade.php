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
                        <th>Name</th>
                        <th>Surname</th>
                        <th>Nationality</th>
                        <th>Books</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($authors as $author)
                    <tr>
                        <td>{{ $author["name"] }}</td>
                        <td>{{ $author["surname"] }}</td>
                        <td>{{ $author["nationality"] }}</td>
                        <td><a href="{{ route("authors.show", $author) }}"><i class="material-icons teal-text text-lighten-1 ">book</i></a></td>
                        <td><a href="{{ route("authors.edit", $author) }}"><i class="material-icons green-text text-darken-1">edit</i></a></td>
                        <td>
                            <form id="destroy-form" action="{{route('author.destroy', $author->id)}}" method="post">
                                @method("DELETE")
                                @csrf
                                <button style="background-color: transparent; border: none; cursor: pointer;" class="tooltipped" data-position="right" data-tooltip="Delete Author">
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

<!-- onclick="document.getElementById('destroy-form').submit()" -->