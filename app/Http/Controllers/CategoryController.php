<?php

namespace App\Http\Controllers;

use App\Http\Service\MyLogger;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        MyLogger::info('Visit', 'User visited ' . $category->name . ' category.');

        return view('feed', [
            "news" => $category->news()->latest()->paginate(10)
        ]);
    }
}
