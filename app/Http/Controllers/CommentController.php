<?php

namespace App\Http\Controllers;

use App\Http\Service\MyLogger;
use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function comment(Request $request, News $news)
    {
        $userId = Auth::user()->id;

        Comment::create([
            "user_id" => $userId,
            "news_id" => $news->id,
            "body" => $request->commentBody,
            "is_anonymous" => $request->isAnon ? 1 : 0,
        ]);

        MyLogger::info('Comment', 'User made comment to ' . $news->title);

        return redirect()->back();
    }
}
