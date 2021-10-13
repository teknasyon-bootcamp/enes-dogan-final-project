@extends('admin.layout.master')
@section('content')
    <h1>Users</h1>
    <table class="table table-striped">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created at</th>
            <th>Action</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
                <td>
                    <form class="d-inline" method="post"
                          action="{{route('admin.users.destroy',['user' => $user->id])}}">
                        @csrf
                        @method('delete')
                        <button class="btn btn-danger" type="submit">Confirm Delete Request</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="d-flex justify-content-center">
        {!! $users->links() !!}
    </div>
@endsection
