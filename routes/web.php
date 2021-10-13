<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminCommentController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminPanelController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\FollowingCategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FeedController::class, 'index'])->name('feed');
Route::get('/news/{newsId}', [NewsController::class, 'detail']);
Route::get('/category/{category}', [CategoryController::class, 'index'])->name('category');
Route::post('/follow', [FollowingCategoryController::class, 'follow'])->name('follow');
Route::post('/news/{news}/comment', [CommentController::class, 'comment'])->name('comment');


Route::get('/login', [CustomAuthController::class, 'index'])->name('login');
Route::post('/login', [CustomAuthController::class, 'customLogin']);
Route::get('/register', [CustomAuthController::class, 'registration'])->name('register');
Route::post('/register', [CustomAuthController::class, 'customRegistration']);
Route::get('/signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/edit', [ProfileController::class, 'update']);
Route::get('/profile/delete-request', [ProfileController::class, 'deleteRequest'])->name('profile.deleteRequest');


Route::prefix('admin')->as('admin.')->group(function () {

    Route::get('/', [AdminPanelController::class, 'index'])->name('panel');


    Route::get('/users/delete-request', [AdminUserController::class, 'deleteRequestedUsersList'])->name('users.deleteRequest');
    Route::resource('users', AdminUserController::class);
    Route::get('/news/drafts', [AdminNewsController::class, 'drafts'])->name('news.drafts');
    Route::resource('news', AdminNewsController::class);
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('comments', AdminCommentController::class);

});




