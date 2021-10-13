@extends('admin.layout.master')

@section('content')
    <h1>Edit Category</h1>
    <form method="post" action="{{route('admin.categories.update',['category' => $model->id])}}">
        @csrf
        @method('put')
        @include('forms.generic')
        @include('forms.save')
    </form>

@endsection
