@extends('admin.layout.master')
@section('content')
<h1>Categories
<a href="{{route('admin.categories.create')}}"><i class="fas fa-plus-circle"></i></a>
</h1>
<table class="table table-striped">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Created At</th>
        <th>Action</th>
    </tr>
    @foreach($categories as $category)
    <tr>
        <td>{{$category->id}}</td>
        <td>{{$category->name}}</td>
        <td>{{$category->created_at}}</td>
        <td>
            <a href="{{route('admin.categories.edit',['category' => $category->id])}}"><i class="fas fa-edit"></i></a>
            <form class="d-inline" method="post" action="{{route('admin.categories.destroy',['category' => $category->id])}}">
                @csrf
                @method('delete')
                <button class="btn text-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<div class="d-flex justify-content-center">
    {!! $categories->links() !!}
</div>
@endsection
