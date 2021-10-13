@extends('admin.layout.master')

@section('content')
    <h1>Edit User</h1>
    <form method="post" action="{{route('admin.users.update',['user' => $model->id])}}">
        @csrf
        @method('put')
        @include('forms.generic')

        <div class="mb-3 row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Role</label>
            <div class="col-sm-10">
                <select name="role" class="form-select" aria-label="Default select example">
                    <option selected>Select a role</option>
                    @foreach(\Spatie\Permission\Models\Role::all() as $role)
                        <option @if($model->getRoleNames()[0] === $role->name) selected @endif value="{{$role->name}}">{{$role->name}}</option>
                    @endforeach

                </select>
            </div>
        </div>

        @include('forms.save')


    </form>

@endsection
