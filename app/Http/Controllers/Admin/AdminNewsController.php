<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Service\MyLogger;
use App\Models\News;
use Illuminate\Http\Request;

class AdminNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        MyLogger::info('Visit', 'User visited admin news index');

        return view('admin.news.index', [
            "news" => News::with('user', 'category')->latest()->paginate(10)
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
     * @param Request $request
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
        MyLogger::info('Store', 'User created news: ' . $request->title);

        return redirect()->route('admin.news.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
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
     * @param Request $request
     * @param News $news
     */
    public function update(Request $request, News $news)
    {
        $news->title = $request->title;
        $news->body = $request->body;
        $news->is_draft = $request->is_draft ? true : false;
        $news->save();
        MyLogger::info('Update', 'User updated news: ' . $news->id);

        return redirect()->route('admin.news.index')->with('message', 'Successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     */
    public function destroy(News $news)
    {
        $news->delete();
        MyLogger::info('Delete', 'User deleted news: ' . $news->title);
        return redirect()->route('admin.newss.index')->with('message', 'Successfully deleted.');
    }
}
