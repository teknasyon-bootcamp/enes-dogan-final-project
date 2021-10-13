@extends('layout.master')

@section('content')
    <h2>Profile</h2><br><br>
    <h4>Welcome {{$user->name}}</h4>

    @php($model = $user)
    @include('forms.generic')

    <a href="{{route('profile.edit')}}">
        <button class="w-100 btn btn-lg btn-primary" type="">Edit</button>
    </a>
@endsection

