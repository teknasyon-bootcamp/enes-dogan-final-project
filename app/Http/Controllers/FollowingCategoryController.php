<?php

namespace App\Http\Controllers;

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
            } elseif (!$isFollowed) {
                if ($followingCategory) {
                    $followingCategory->delete();
                }
            }
        }
        return redirect()->back()->with("message", "Saved successfully!");
    }
}
