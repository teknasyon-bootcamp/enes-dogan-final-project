@extends('admin.layout.master')

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="bg-light p-5 m-1 rounded">
                <h4>{{$userCount}} Users</h4>
                <a class="btn btn-sm btn-primary" href="{{route('admin.users.index')}}" role="button">Manage »</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="bg-light p-5 m-1 rounded">
                <h4>{{$categoryCount}} Categories</h4>
                <a class="btn btn-sm btn-primary" href="{{route('admin.categories.index')}}" role="button">Manage »</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="bg-light p-5 m-1 mt-4 rounded">
                <h4>{{$newsCount}} News</h4>
                <a class="btn btn-sm btn-primary" href="{{route('admin.news.index')}}" role="button">Manage »</a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="bg-light p-5 m-1 mt-4 rounded">
                <h4>{{$commentsCount}} Comments</h4>
                <a class="btn btn-sm btn-primary" href="{{route('admin.comments.index')}}" role="button">Manage »</a>
            </div>
        </div>
    </div>

@endsection
