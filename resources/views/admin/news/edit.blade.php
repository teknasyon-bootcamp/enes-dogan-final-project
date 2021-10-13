@extends('admin.layout.master')

@section('content')
    <h1>Edit News</h1>
    <form method="post" action="{{route('admin.news.update',['news' => $model->id])}}">
        @csrf
        @method('put')
        @include('forms.generic')
        @include('forms.save')
    </form>

@endsection
