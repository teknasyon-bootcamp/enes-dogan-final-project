<?php

namespace App\Http\Controllers;

use App\Http\Service\MyLogger;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CustomAuthController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }


    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, $request->remember)) {
            MyLogger::info('Login', 'User logged in.');
            return redirect()->route('feed');
        }

        return redirect("login")->withErrors('Login details are not valid');
    }


    public function registration()
    {
        return view('auth.registration');
    }


    public function customRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
        $user->assignRole('user');
        Auth::login($user);
        MyLogger::info('Register', 'User registered.');

        return redirect()->route('feed');
    }

    public function signOut()
    {
        MyLogger::info('Auth', 'User signed out.');

        Session::flush();
        Auth::logout();

        return redirect()->route('feed');
    }
}
