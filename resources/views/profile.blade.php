@extends('layout.master')

@section('content')
    <h2>Profile</h2><br><br>
    <h4>Welcome {{$user->name}}</h4>

    @php($model = $user)
    @include('forms.generic')

    <a href="{{route('profile.edit')}}">
        <button class="w-100 btn btn-lg btn-primary" type="">Edit</button>
    </a>

    <a href="{{route('profile.deleteRequest')}}">

        @if($user->delete_request)
            <button class="w-100 btn btn-lg btn-secondary mt-2" type="">
                Cancel Delete Request
            </button>

        @else
            <button class="w-100 btn btn-lg btn-danger mt-2" type="">
                Delete My Account
            </button>

        @endif
    </a>


    <a href="{{route('profile.comments')}}">
        <button class="w-100 btn btn-lg btn-primary mt-2" type="">My Comments</button>
    </a>

    <a href="{{route('profile.activities')}}">
        <button class="w-100 btn btn-lg btn-primary mt-2" type="">My Activities</button>
    </a>

@endsection

