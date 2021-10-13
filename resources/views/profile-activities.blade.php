@extends('layout.master')

@section('content')
    <h1>My Comments</h1>
    <table class="table table-striped">
        <tr>
            <th>Activity</th>
            <th>Message</th>
            <th>Date</th>
        </tr>
        @foreach($activities as $activity)
            <tr>
                <td>{{$activity->activity}}</td>
                <td>{{$activity->message}}</td>
                <td>{{$activity->created_at}}</td>
            </tr>
        @endforeach
    </table>

    <div class="d-flex justify-content-center">
        {!! $activities->links() !!}
    </div>
@endsection


