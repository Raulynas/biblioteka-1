@extends('layouts.layout')

@section('content')
<div class="container center">
    @if (session('status'))
    <div>
        <h2>{{ session('status') }}</h2>
    </div>
    @endif

    <h4 class="grey-text text-darken-2">You are logged in!</h4>

</div>
@endsection