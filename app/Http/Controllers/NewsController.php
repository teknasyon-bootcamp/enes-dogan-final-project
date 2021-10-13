<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function detail(int $newsId)
    {

        $new = News::with('comments.user')->findOrFail([$newsId]);
        return view('news-detail',[
            "new" => $new
        ]);
    }

}
