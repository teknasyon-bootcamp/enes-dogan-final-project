@extends('admin.layout.master')
@section('content')
    <h1>News
        <a href="{{route('admin.news.create')}}"><i class="fas fa-plus-circle"></i></a>
    </h1>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Category</th>
            <th>Title</th>
            <th>Content</th>
            <th>Draft</th>
            <th>Created At</th>
            <th>Action</th>
        </tr>
        @foreach($news as $new)
            <tr>
                <td>{{$new->id}}</td>
                <td>{{$new->user->name}}</td>
                <td>{{$new->category->name}}</td>
                <td>{{$new->title}}</td>
                <td>{{$new->getPreviewContentAttribute()}}</td>
                <td>{{$new->is_draft ?'yes':'no'}}</td>
                <td>{{$new->created_at}}</td>
                <td>
                    <a href="{{route('admin.news.edit',['news' => $new->id])}}"><i class="fas fa-edit"></i></a>
                    <form class="d-inline" method="post" action="{{route('admin.news.destroy',['news' => $new->id])}}">
                        @csrf
                        @method('delete')
                        <button class="btn text-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="d-flex justify-content-center">
        {!! $news->links() !!}
    </div>
@endsection
