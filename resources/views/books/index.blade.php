@extends('layouts.layout')
@section('content')

<div class="container" style="padding-top: 30px;">
    <div class="row">
        <div class="col s12 l8 offset-l1 center">
            <p>{{session("msg")}}</p>
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
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                    <tr>
                    <td>{{ $book["title"] }}</td>
                    <?php 
                    $name =  ($author = DB::table('authors')->where('id', $book["author_id"] )->first())->name; 
                    $surname =  ($author = DB::table('authors')->where('id',  $book["author_id"] )->first())->surname; 
                    ?>
                    <td><a href=""><?php echo $name," ", $surname?></a></td>
                    <td>{{ $book["publishDate"] }}</td>
                    <td>{{ $book["pages"] }}</td>
                    <td><a href="#"><i class="material-icons green-text text-darken-1">edit</i></a></td>
                    <td>
                        <form id="destroy-form" action="{{route('book.destroy', $book->id)}}" method="post">
                            @method("DELETE")
                            @csrf
                            <button style="background-color: transparent; border: none">
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

