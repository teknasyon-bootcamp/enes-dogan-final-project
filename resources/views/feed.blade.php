@extends('layout.master')

@section('headline')
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 fst-italic">{{$news[0]->title}}</h1>
            <p class="lead my-3">{{$news[0]->preview_content}}</p>
            <p class="lead mb-0"><a href="/news/{{$news[0]->id}}" class="text-white fw-bold">Continue reading...</a></p>
        </div>
    </div>
@endsection

@section('featuredNews')

    <div class="row mb-2">
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary">{{$news[1]->category->name}}</strong>
                    <h3 class="mb-0">{{$news[1]->title}}</h3>
                    <div class="mb-1 text-muted">{{$news[1]->created_at->format('M d')}}</div>
                    <p class="card-text mb-auto">{{$news[1]->preview_content}}</p>
                    <a href="/news/{{$news[1]->id}}" class="stretched-link">Continue reading</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg"
                         role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                         focusable="false"><title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c"/>
                        <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                    </svg>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-success">{{$news[2]->category->name}}</strong>
                    <h3 class="mb-0">{{$news[2]->title}}</h3>
                    <div class="mb-1 text-muted">{{$news[2]->created_at->format('M d')}}</div>
                    <p class="mb-auto">{{$news[2]->preview_content}}</p>
                    <a href="/news/{{$news[2]->id}}" class="stretched-link">Continue reading</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg"
                         role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice"
                         focusable="false"><title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#55595c"/>
                        <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                    </svg>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('content')
    @foreach($news as $new)
        <a href="/news/{{$new->id}}"><h2>{{$new->title}}</h2></a>
        {!!$new->body!!}
        <hr>
    @endforeach
    <div class="d-flex justify-content-center">
        {!! $news->links() !!}
    </div>
@endsection
