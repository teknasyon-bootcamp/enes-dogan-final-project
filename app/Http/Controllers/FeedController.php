<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FeedController extends Controller
{
    public function index()
    {

        if (Auth::check() && Auth::user()->followingCategories->count()) {
            $user = Auth::user();
            $categories = $user->followingCategories;
            $news = News::whereIn("category_id", $categories->pluck('category_id'))->latest()->paginate(10);

            return view('feed', [
                "news" => $news
            ]);
        } else {
            $news = News::latest()->paginate(10);
        }

        return view('feed', [
            "news" => $news
        ]);
    }
}
