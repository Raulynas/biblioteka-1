@extends('layouts.layout')
@section('content')


<div class="section container">
    <div class="row">
        <div class="col s12 l5 offset-l3">
            <form method="post" action="">
                @csrf
                <div class="input-field">
                    <input type="text" name="title" id="title" maxlength="100" minlength="8" required>
                    <label for="title">Title</label>
                </div>
                <div class="input-field">
                    <select name="author_id" id="author">
                        <option value="" disabled selected>Choose Author</option>
                        @foreach ($authors as $author)
                        <option value="{{ $author["id"] }}" required>{{ $author["name"]}} {{ $author["surname"]}}</option>"
                        @endforeach
                    </select>
                    <label for="author">Author</label>
                </div>
                <div class="input-field">
                    <input type="text" id="publishDate" name="publishDate" class="datepicker" required>
                    <label for="publishDate">Published</label>
                </div>
                <div class="input-field">
                    <input type="number" name="pages" id="pages" maxlength="20000" minlength="1" required>
                    <label for="pages">Pages</label>
                </div>
                <div class="input-field">
                    <select name="cover" id="cover" required>
                        <option value="" disabled selected>Choose cover</option>
                        <option value="Hard cover">Hard cover</option>
                        <option value="Paperback">Paperback</option>
                    </select>
                    <label>Cover Type</label>

                </div>

                <div class="input-field center">

                    <input class="btn" type="submit" value="Add Book">
                </div>
            </form>
        </div>


    </div>
</div>
@endsection