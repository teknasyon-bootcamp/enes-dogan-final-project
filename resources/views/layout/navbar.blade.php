<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 pt-1">
            </div>
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark" href="/">Large</a>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                {{--                <a class="link-secondary" href="#" aria-label="Search">--}}
                {{--                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>--}}
                {{--                </a>--}}
                @if(!auth()->check())
                    <a class="btn btn-sm btn-outline-secondary" href="{{route('register')}}">Sign up</a>
                    <a class="btn btn-sm btn-outline-secondary ms-2" href="{{route('login')}}">Sign in</a>
                @else
                    <a class="btn btn-sm btn-outline-secondary" href="{{route('signout')}}">Sign out {{auth()->user()->name}}</a>

                @endif

            </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            @foreach(\App\Models\Category::all() as $category)
                <a class="p-2 link-secondary" href="{{route('category', $category->id)}}">{{$category->name}}</a>
            @endforeach
        </nav>
    </div>
</div>
