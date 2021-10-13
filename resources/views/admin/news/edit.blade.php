@extends('admin.layout.master')

@section('content')
    <h1>Edit News</h1>
    <form method="post" action="{{route('admin.news.update',['news' => $model->id])}}">
        @csrf
        @method('put')
        @include('forms.generic')
        @include('forms.save')
    </form>

@endsection


@section('scripts')
    <!-- Main Quill library -->
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endsection
