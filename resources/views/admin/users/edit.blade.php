@extends('admin.layout.master')

@section('content')
    <h1>Edit User</h1>
    <form method="post" action="{{route('admin.users.update',['user' => $model->id])}}">
        @csrf
        @method('put')
        @include('forms.generic')
        @include('forms.save')
    </form>

@endsection
