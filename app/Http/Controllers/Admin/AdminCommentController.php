<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Service\MyLogger;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        MyLogger::info('Visit', 'User visited admin comments index');

        return view('admin.comments.index', [
            "comments" => Comment::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Comment $comment
     */
    public function edit(Comment $comment)
    {
        return view('admin.comments.edit', [
            "model" => $comment
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Comment $comment
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->user_id = $request->user_id;
        $comment->news_id = $request->news_id;
        $comment->body = $request->body;
        $comment->is_anonymous = $request->is_anonymous;
        $comment->save();
        MyLogger::info('Update', 'User updated comment: ' . $comment->id);
        return redirect()->route('admin.comments.index')->with('message', 'Successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Comment $comment
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        MyLogger::info('Delete', 'User deleted comment: ' . $comment->body);
        return redirect()->route('admin.comments.index')->with('message', 'Successfully deleted.');
    }
}
