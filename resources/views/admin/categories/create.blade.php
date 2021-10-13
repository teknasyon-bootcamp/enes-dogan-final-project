@extends('admin.layout.master')

@section('content')
    <h1>Create Category</h1>
    <form method="post" action="{{route('admin.categories.store')}}">
        @csrf
        @php($model=new \App\Models\Category())
        @include('forms.generic')
        @include('forms.save')
    </form>

@endsection
