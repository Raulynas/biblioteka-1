@extends('layouts.layout')
@section('content')

<div class="container" style="padding-top: 30px;">
    <div class="row">
    </div>
    <div class="row">
        <div class="col s12 l7 offset-l1">
            <ul class="collection with-header">
                <li class="collection-header"><h4>{{$author->name}} {{$author->surname}}</h4></li>
                @foreach ($author->books as $book)
                <li class="collection-item italic-text"> {{$book->title}}</li>
                
                @endforeach
            </ul>


        </div>
    </div>
</div>
@endsection

