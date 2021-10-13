<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Http\Service\MyLogger;
use App\Models\ActivityLog;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile', [
            "user" => Auth::user()
        ]);
    }

    public function edit()
    {
        return view('profile-edit', [
            "user" => Auth::user()
        ]);
    }

    public function update(ProfileUpdateRequest $request)
    {
        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        MyLogger::info('Update', 'User updated profile');
        return redirect()->route('profile')->with('message', 'Profile updated');
    }

    public function deleteRequest()
    {
        auth()->user()->delete_request = !auth()->user()->delete_request;
        auth()->user()->save();
        MyLogger::info('Update', 'User made delete request');
        return redirect()->back();
    }

    public function comments()
    {
        MyLogger::info('Visit', 'User visited comments');
        return view('profile-comments', [
            "comments" => Comment::where('user_id', Auth::user()->id)->paginate(10)
        ]);
    }

    public function activities()
    {
        MyLogger::info('Visit', 'User visited activities');
        return view('profile-activities', [
            "activities" => ActivityLog::where('user_id', Auth::user()->id)->latest()->paginate(10)
        ]);
    }
}
