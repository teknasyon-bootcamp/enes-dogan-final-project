@extends('layout.master')

@section('content')
    <h2>{{$new->title}}</h2>
    {!!$new->body !!}

    <div class="bg-light p-5 rounded mt-3">
        <h4>Comments</h4>
        @if(auth()->check())
            <form method="post" action="{{route('comment',["news"=>$new->id])}}">
                @csrf

                <textarea required name="commentBody" class="w-100" placeholder="Enter your comment here..."></textarea>
                <div class="form-check form-switch">
                    <input name="isAnon" class="form-check-input" type="checkbox" role="switch">Anonymous?
                </div>
                <button class="btn btn-primary" type="submit">Send</button>
            </form>
        @endif
        @foreach($new->comments as $comment)
            <hr>
            <h5>@if(!$comment->is_anonymous)
                    {{$comment->user->name}}
                @else
                    Anonymous
                @endif
            </h5><span>{{$comment->created_at}}</span>
            <p>{{$comment->body}}</p>
        @endforeach

    </div>

@endsection

