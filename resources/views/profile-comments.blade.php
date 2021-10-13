@extends('layout.master')

@section('content')
    <h1>My Comments</h1>
    <table class="table table-striped">
        <tr>
            <th>News Title</th>
            <th>Content</th>
            <th>Anonymous</th>
            <th>Created At</th>
        </tr>
        @foreach($comments as $comment)
            <tr>
                <td>{{$comment->news->title}}</td>
                <td>{{$comment->body}}</td>
                <td>{{$comment->is_anon ?'yes':'no'}}</td>
                <td>{{$comment->created_at}}</td>
            </tr>
        @endforeach
    </table>

    <div class="d-flex justify-content-center">
        {!! $comments->links() !!}
    </div>
@endsection


