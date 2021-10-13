@extends('admin.layout.master')

@section('content')
    <h1>Edit Comment</h1>
    <form method="post" action="{{route('admin.comments.update',['comment' => $model->id])}}">
        @csrf
        @method('put')
        @include('forms.generic')
        @include('forms.save')
    </form>

@endsection
