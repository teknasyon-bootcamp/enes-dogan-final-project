@extends('layout.master')

@section('content')
    <h2>Profile</h2><br><br>
    <h4>Edit {{$user->name}}</h4>


    <form action="{{route('profile.edit')}}" method="post">
    @csrf
    @php($model = $user)
    @include('forms.generic')
    @include('forms.save')
    </form>
@endsection

