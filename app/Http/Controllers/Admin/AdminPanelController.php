<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    public function index()
    {
        return view('admin.home', [
            "userCount" => User::count(),
            "categoryCount" => Category::count(),
            "newsCount" => News::count(),
            "commentsCount" => Comment::count()
        ]);
    }
}
