@extends('admin.layout.master')
@section('content')
    <h1>Comments
    </h1>
    <table class="table table-striped">
        <tr>
            <th>Comment ID</th>
            <th>News Title</th>
            <th>Content</th>
            <th>Author</th>
            <th>Anonymous</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        @foreach($comments as $comment)
            <tr>
                <td>{{$comment->id}}</td>
                <td>{{$comment->news->title}}</td>
                <td>{{$comment->body}}</td>
                <td>{{$comment->user->name}}</td>
                <td>{{$comment->is_anon ?'yes':'no'}}</td>
                <td>{{$comment->created_at}}</td>
                <td>
                    <a href="{{route('admin.comments.edit',['comment' => $comment->id])}}"><i class="fas fa-edit"></i></a>
                    <form class="d-inline" method="post" action="{{route('admin.comments.destroy',['comment' => $comment->id])}}">
                        @csrf
                        @method('delete')
                        <button class="btn text-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="d-flex justify-content-center">
        {!! $comments->links() !!}
    </div>
@endsection
