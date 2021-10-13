<?php

namespace App\Http\Controllers;

use App\Http\Service\MyLogger;
use App\Models\Category;
use App\Models\FollowingCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowingCategoryController extends Controller
{

    public function follow(Request $request)
    {
        $userId = Auth::user()->id;
        foreach ($request->category as $categoryId => $isFollowed) {
            $followingCategory = FollowingCategory::where('user_id', $userId)->where('category_id', $categoryId)->first();

            if ($isFollowed && !$followingCategory) {
                FollowingCategory::create([
                    "category_id" => $categoryId,
                    "user_id" => $userId
                ]);
                MyLogger::info('Follow', 'User followed ' . Category::find($categoryId)->name);
            } elseif (!$isFollowed) {
                if ($followingCategory) {
                    $followingCategory->delete();
                    MyLogger::info('Unfollow', 'User unfollowed ' . Category::find($categoryId)->name);
                }
            }
        }
        return redirect()->back()->with("message", "Saved successfully!");
    }
}
