@extends('admin.layout.master')

@section('content')
    @php($model=new \App\Models\News())
    @include('forms.generic')
@endsection
