@extends('layouts.layout')
@section('content')

<div class="section container">
    <div class="row">
        <div class="col s12 l5 offset-l3">
            {{-- <form method="post" action="{{route('authors.store')}}"> --}}
            <form method="post" action="">
                @csrf
                <div class="input-field">
                    <input type="text" name="name" id="name" required>
                    <label for="name">Author name</label>
                </div>
                <div class="input-field">
                    <input type="text" name="surname" id="surname" required>
                    <label for="surname">Author surname</label>
                </div>
                <div class="input-field">
                    <input type="text" name="nationality" id="age" required>
                    <label for="nationality">Nationality</label>
                </div>
                <div class="input-field center">
                    <input class="btn" type="submit" value="Create Author">
                </div>

            </form>
        </div>


    </div>
</div>
@endsection