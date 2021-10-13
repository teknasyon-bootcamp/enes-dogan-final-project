<?php

namespace App\Http\Controllers;

use App\Http\Service\MyLogger;
use App\Models\News;

class NewsController extends Controller
{
    public function detail(int $newsId)
    {

        $new = News::with('comments.user')->findOrFail($newsId);
        MyLogger::info('Visit', 'User visited news: ' . $new->title);
        return view('news-detail', [
            "new" => $new
        ]);
    }

}
