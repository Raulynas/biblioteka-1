@extends('layouts.layout')
@section('content')

<div class="container center" style="margin-top: 50px; margin-bottom: 50px;">
    <div>
        <a class="btn orange darken-1" href="{{ route('login') }}">Login</a>
    </div>
</div>
<div class="parallax-container">
    <div class="parallax">
        <img src="https://img-cdn.inc.com/image/upload/w_1920,h_1080,c_fill/images/panoramic/GettyImages-900301626_437925_t2i3bm.jpg" alt="stars" class="responsive-img">
    </div>
</div>

@endsection