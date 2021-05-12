@extends('layouts.layout')
@section('content')


<div class="section container">
    <div class="row">
        <div class="col s12 l5 offset-l3">
            {{-- <form method="post" action="{{route('books.store')}}"> --}}
            <form method="post" action="">
                @csrf
                <div class="input-field">
                    <input type="text" name="title" id="title" value="{{ $book->title }}" required>
                    <label for="title">Title</label>
                </div>
                <div class="input-field">
                    <select name="author_id" id="author" required>
                        <option value="" disabled selected required>Choose Author</option>
                        @foreach ($authors as $author)
{{($author->id == $book->author_id)? $selected = "selected": $selected = "" }}
                            <option value="{{ $author["id"] }}" {{$selected}}>{{ $author["name"]}} {{ $author["surname"]}}</option>"
                            @endforeach
                    </select>
                        <label for="author">Author</label>
                </div>
                <div class="input-field">
                    <input type="text" id="publishDate" name="publishDate" class="datepicker" value="{{ $book->publishDate }}"  required>
                    <label for="publishDate">Published</label>
                </div>
                <div class="input-field">
                    <input type="number" name="pages" id="pages" value="{{ $book->pages }}" required>
                    <label for="pages">Pages</label>
                </div>
                <div class="input-field">
                    <select name="cover" id="cover" value="{{ $book->cover }}" required>
                        <option value="" disabled selected>Choose cover</option>
                        {{($book->coverType == "Hard cover") ?  $selected = "selected" : $selected = ""  }}
                        <option value="Hard cover" {{$selected}} >Hard cover</option>
                        {{($book->coverType == "Paperback") ?  $selected = "selected" : $selected = ""  }}
                        <option value="Paperback" {{$selected}}>Paperback</option>
                    </select>
                    <label>Cover Type</label>

                </div>

                <div class="input-field center">

                    <input class="btn" type="submit" value="Save">
                </div>
            </form>
        </div>


    </div>
</div>
@endsection
