@extends('admin.layout.master')
@section('content')
    <form method="post" action="{{route('admin.news.store')}}">
        @csrf
        @php($model=new \App\Models\News())
        @include('forms.generic')
        @include('forms.save')
    </form>
@endsection
