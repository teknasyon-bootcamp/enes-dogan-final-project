<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('admin.news.index', [
            "news" => News::with('user')->latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function drafts()
    {
        $news = News::where('is_draft', true)->latest()->paginate(10);
        return view('admin.news.drafts', [
            "news" => $news
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(Request $request)
    {
        News::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'is_draft' => $request->is_draft ? true : false
        ]);

        return redirect()->route('admin.news.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\News $news
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', [
            'model' => $news
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\News $news
     */
    public function update(Request $request, News $news)
    {
        $news->title = $request->title;
        $news->body = $request->body;
        $news->is_draft = $request->is_draft ? true : false;
        $news->save();
        return redirect()->route('admin.news.index')->with('message', 'Successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\News $news
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.newss.index')->with('message', 'Successfully deleted.');
    }
}
