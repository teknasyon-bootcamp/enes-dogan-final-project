<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile', [
            "user" => Auth::user()
        ]);
    }

    /**
     * name
     * email
     * password
     */
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
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('profile')->with('message', 'Profile updated');
    }

    public function deleteRequest()
    {
        auth()->user()->delete_request = !auth()->user()->delete_request;
        auth()->user()->save();

        return redirect()->back();
    }
}
