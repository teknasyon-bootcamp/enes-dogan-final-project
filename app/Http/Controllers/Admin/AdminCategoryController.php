<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Service\MyLogger;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        MyLogger::info('Visit', 'User visited admin category index');

        return view('admin.categories.index', [
            "categories" => Category::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name
        ]);
        MyLogger::info('Store', 'User created category: ' . $request->name);

        return redirect()->route('admin.categories.index')->with('message', 'Successfully created.');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', [
            'model' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     */
    public function update(Request $request, Category $category)
    {
        $category->name = $request->name;
        $category->save();

        return redirect()->route('admin.categories.index')->with('message', 'Successfully updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     */
    public function destroy(Category $category)
    {
        $category->delete();
        MyLogger::info('Delete', 'User deleted category: ' . $category->name);
        return redirect()->route('admin.categories.index')->with('message', 'Successfully deleted.');
    }
}
