@extends('admin.layout.master')
@section('content')
    <form method="post" action="{{route('admin.news.store')}}">
        @csrf
        @php($model=new \App\Models\News())
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
