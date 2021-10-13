<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Service\MyLogger;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        MyLogger::info('Visit', 'User visited admin users index');

        return view('admin.users.index', [
            "users" => User::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        Users::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        MyLogger::info('Store', 'User created user: ' . $request->email);

        return redirect()->route('admin.users.index')->with('message', 'Successfully created.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', [
            'model' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     */
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->roles()->detach();
        $user->assignRole($request->role);
        $user->save();

        MyLogger::info('Update', 'User updated user: ' . $user->id);
        return redirect()->route('admin.users.index')->with('message', 'Successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     */
    public function destroy(User $user)
    {
        $user->delete();
        MyLogger::info('Delete', 'User deleted user: ' . $user->email);
        return redirect()->route('admin.users.index')->with('message', 'Successfully deleted.');
    }

    public function deleteRequestedUsersList()
    {
        return view('admin.users.delete-requested-users', [
            "users" => User::where('delete_request', true)->paginate(10)
        ]);
    }
}
