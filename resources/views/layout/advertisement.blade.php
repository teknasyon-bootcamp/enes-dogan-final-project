<div class="position-sticky" style="top: 2rem;">
    <div class="p-4 mb-3 bg-light rounded">
        <h3>Categories to Follow</h3>
        <form method="post" action="{{route('follow')}}">
            @csrf
        @foreach(\App\Models\Category::all() as $category)

            <div class="form-check form-switch">
                <input name="category[{{$category->id}}]" type="hidden" value="0">
                <input name="category[{{$category->id}}]"
                       @if($category->isFollowedByUser())
                           checked
                       @endif
                       class="form-check-input" type="checkbox" value="1" role="switch">
                <a class="p-2 link-secondary" href="{{route('category', $category->id)}}">{{$category->name}}</a>
            </div>

            <br>

        @endforeach
        <button class="btn btn-primary" type="submit">Save</button>
        </form>
        @if(Session::has('message'))
            <br>
            <div class="alert alert-success" role="alert">
                {{Session::get('message')}}
            </div>
        @endif
    </div>
</div>
